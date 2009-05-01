<?php
require_once 'Stagehand/PHP/Parser/YYToken.php';

class Stagehand_PHP_Parser_Dumb
{
    public function execute($name, $params)
    {
        return new Stagehand_PHP_Parser_YYToken($name, $params);
    }
}
