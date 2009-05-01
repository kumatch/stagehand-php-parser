<?php
class Stagehand_PHP_Parser_YYToken
{
    private $_name;
    private $_values;

    public function __construct($name, $values)
    {
        $this->_name = $name;
        $this->_values = $values;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getValues()
    {
        return $this->_values;
    }

    public function addValue($value)
    {
        $this->_values[] = $value;
    }
}
