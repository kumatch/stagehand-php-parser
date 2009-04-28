<?php

error_reporting(E_ALL);

set_include_path(realpath(dirname(__FILE__)) . PATH_SEPARATOR .
                 realpath(dirname(__FILE__) . '/../src') . PATH_SEPARATOR .
                 get_include_path()
                 );

require_once 'Stagehand/PHP/Parser.php';

class Lexer
{
    public $pos;

    private $_tokens;
    private $_parserName = 'Stagehand_PHP_Parser';

    function __construct($file)
    {
        $this->pos = 0;
        $this->_tokens = token_get_all(file_get_contents($file));
    }

    function yylex(&$yylval) {

        while (1) {
            
            $token = @$this->_tokens[$this->pos];
            ++$this->pos;

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
                    return constant("{$this->_parserName}::T_PAAMAYIM_NEKUDOTAYIM");
                }

                return constant("{$this->_parserName}::{$name}");
            }
        }

    }
}


$l = new Lexer('./example.php');
$p = new Stagehand_PHP_Parser();
$p->yyparse($l);

var_dump($p->yyval());
