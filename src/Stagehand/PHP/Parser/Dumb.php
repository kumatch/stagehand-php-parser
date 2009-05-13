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

// {{{ Stagehand_PHP_Parser_Dumb

/**
 * A *dumb* filter class for PHP parser.
 *
 * @package    sh-php-parser
 * @copyright  1998-2009 Zend Technologies Ltd. (http://www.zend.com)
 * @copyright  2009 KUMAKURA Yousuke <kumatch@gmail.com>
 * @license    http://www.zend.com/license/2_00.txt.  Zend License
 * @version    Release: @package_version@
 * @since      Class available since Release 0.1.0
 */
class Stagehand_PHP_Parser_Dumb
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

    private $_parser;

    /**#@-*/

    /**#@+
     * @access public
     */

    // }}}
    // {{{ execute()

    /**
     * Executes parser filter.
     *
     * @param string $name
     * @param string $params
     * @return Stagehand_PHP_Parser_YYToken
     */
    public function execute($name, $params)
    {
        return new Stagehand_PHP_Parser_YYToken($name, $params);
    }

    // }}}
    // {{{ setParser()

    /**
     * Sets a parser class.
     *
     * @param object $parser
     */
    public function setParser($parser)
    {
        $this->_parser = $parser;
    }

    // }}}
    // {{{ setParser()

    /**
     * Gets a parser class.
     *
     * @return object
     */
    public function getParser()
    {
        return $this->_parser;
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
