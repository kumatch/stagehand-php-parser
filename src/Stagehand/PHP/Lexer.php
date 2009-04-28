<?php
require_once 'Stagehand/PHP/Parser.php';

class Stagehand_PHP_Lexer
{
    private $_pos;
    private $_tokens;
    private $_parserName = 'Stagehand_PHP_Parser';

    function __construct($file)
    {
        $this->_pos = 0;
        $this->_tokens = token_get_all(file_get_contents($file));
    }

    function yylex(&$yylval)
    {
        while (1) {
            $token = @$this->_tokens[$this->_pos];
            ++$this->_pos;

            if (!$token) {
                return 0;
            }

            if (is_string($token)) {
                $yylval = $token;
                return ord($yylval);
            } else {
                $name = token_name($token[0]);
                $yylval = $token[1];

                $ignoreList = array('T_OPEN_TAG', 'T_CLOSE_TAG', 'T_WHITESPACE',
                                    'T_COMMENT', 'T_DOC_COMMENT', 'T_INLINE_HTML', 
                                    );
                if (in_array($name, $ignoreList)) {
                    continue;
                }

                if ($name === 'T_DOUBLE_COLON') {
                    return Stagehand_PHP_Parser::T_PAAMAYIM_NEKUDOTAYIM;
                }

                return constant("Stagehand_PHP_Parser::{$name}");
            }
        }
    }
}
