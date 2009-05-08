<?php
require_once 'Stagehand/PHP/Parser/YYToken.php';

class Stagehand_PHP_Parser_Dumb
{
    private $_parser;

    public function setParser($parser)
    {
        $this->_parser = $parser;
    }

    public function getParser()
    {
        return $this->_parser;
    }

    public function execute($name, $params)
    {
        return new Stagehand_PHP_Parser_YYToken($name, $params);
    }
}
