<?php

class Stagehand_PHP_Parser_Token
{
    private $_value;
    private $_pos;

    public function __construct($value, $pos)
    {
        $this->_value = $value;
        $this->_pos = $pos;
    }

    public function getValue()
    {
        return $this->_value;
    }

    public function getPos()
    {
        return $this->_pos;
    }

    public function __toString()
    {
        return $this->_value . '';
    }
}
