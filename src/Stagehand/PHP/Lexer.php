<?php
require_once 'Stagehand/PHP/Parser.php';
require_once 'Stagehand/PHP/Parser/Token.php';

class Stagehand_PHP_Lexer
{
    private $_pos;
    private $_tokens;

    function __construct($file)
    {
        $this->_pos = 0;
        $this->_tokens = token_get_all(file_get_contents($file));
    }

    function yylex(&$yylval)
    {
        while (1) {
            $pos = $this->_pos;
            $token = @$this->_tokens[$pos];
            ++$this->_pos;

            if (!$token) {
                return 0;
            }

            if (!is_array($token)) {
                $yylval = new Stagehand_PHP_Parser_Token($token, $pos);
                return ord($yylval);
            } else {
                $name = token_name($token[0]);
                $yylval = new Stagehand_PHP_Parser_Token($token[1], $pos);

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

    function getTokens($from = 0, $to = -1)
    {
        if ($to < 0) {
            $to = count($this->_tokens) - 1;
        }

        $tokens = array();
        for ($i = $from; $i <= $to; ++$i) {
            if (isset($this->_tokens[$i])) {
                array_push($tokens, $this->_tokens[$i]);
            }
        }

        return $tokens;
    }
}
