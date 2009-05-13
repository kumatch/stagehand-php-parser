<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

/**
 * PHP version 5
 *
 * Copyright (c) 1998-2009 Zend Technologies Ltd. (http://www.zend.com)
 *
 * This source file is subject to version 2.00 of the Zend license,
 * that is bundled with this package in the file LICENSE, and is
 * available through the world-wide-web at the following url:
 * http://www.zend.com/license/2_00.txt.
 * If you did not receive a copy of the Zend license and are unable to
 * obtain it through the world-wide-web, please send a note to
 * license@zend.com so we can mail you a copy immediately.
 *
 * @package    sh-php-parser
 * @copyright  1998-2009 Zend Technologies Ltd. (http://www.zend.com)
 * @copyright  2009 KUMAKURA Yousuke <kumatch@gmail.com>
 * @license    http://www.zend.com/license/2_00.txt.  Zend License
 * @version    Release: @package_version@
 * @since      File available since Release 0.1.0
 */

// {{{ Stagehand_PHP_Parser_YYToken

/**
 * A class for token of Stagehand_PHP_Parser.
 *
 * @package    sh-php-parser
 * @copyright  1998-2009 Zend Technologies Ltd. (http://www.zend.com)
 * @copyright  2009 KUMAKURA Yousuke <kumatch@gmail.com>
 * @license    http://www.zend.com/license/2_00.txt.  Zend License
 * @version    Release: @package_version@
 * @since      Class available since Release 0.1.0
 */
class Stagehand_PHP_Parser_YYToken
{
    // {{{ properties

    /**#@+
     * @access public
     */

    /**#@-*/

    /**#@+
     * @access protected
     */

    /**#@-*/

    /**#@+
     * @access private
     */

    private $_name;
    private $_values;

    /**#@-*/

    /**#@+
     * @access public
     */

    // }}}
    // {{{ __construct()

    /**
     * Creates token.
     *
     * @param string $name
     * @param string $params
     */
    public function __construct($name, $values)
    {
        $this->_name = $name;
        $this->_values = $values;
    }

    // }}}
    // {{{ getName()

    /**
     * Gets token name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    // }}}
    // {{{ getValues()

    /**
     * Gets token values.
     *
     * @return mixed
     */
    public function getValues()
    {
        return $this->_values;
    }

    // }}}
    // {{{ addValue()

    /**
     * Adds token value.
     *
     * @param mixed $value
     */
    public function addValue($value)
    {
        $this->_values[] = $value;
    }

    /**#@-*/

    /**#@+
     * @access protected
     */

    /**#@-*/

    /**#@+
     * @access private
     */

    /**#@-*/

    // }}}
}

// }}}

/*
 * Local Variables:
 * mode: php
 * coding: iso-8859-1
 * tab-width: 4
 * c-basic-offset: 4
 * c-hanging-comment-ender-p: nil
 * indent-tabs-mode: nil
 * End:
 */
