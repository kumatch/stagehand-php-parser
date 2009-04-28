<?php

error_reporting(E_ALL);

set_include_path(realpath(dirname(__FILE__)) . PATH_SEPARATOR .
                 realpath(dirname(__FILE__) . '/../src') . PATH_SEPARATOR .
                 get_include_path()
                 );

require_once 'Stagehand/PHP/Parser.php';
/* require_once 'Stagehand/PHP/Lexer.php'; */

$p = new Stagehand_PHP_Parser();
$p->parse('./example.php');

var_dump($p->yyval());
