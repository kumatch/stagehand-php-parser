<?php

error_reporting(E_ALL);

set_include_path(realpath(dirname(__FILE__)) . PATH_SEPARATOR .
                 realpath(dirname(__FILE__) . '/../src') . PATH_SEPARATOR .
                 get_include_path()
                 );

require_once 'Stagehand/PHP/Parser.php';
require_once 'Stagehand/PHP/Parser/Dumb.php';
require_once 'Stagehand/PHP/Lexer.php';

$lexer = new Stagehand_PHP_Lexer('./example.php');
$filter = new Stagehand_PHP_Parser_Dumb();
$parser = new Stagehand_PHP_Parser($lexer, $filter);

$parser->parse();

var_dump($parser->yyval());
