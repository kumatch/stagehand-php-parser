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
 
require_once 'PEAR/PackageFileManager2.php';
require_once 'PEAR.php';
 
PEAR::staticPushErrorHandling(PEAR_ERROR_CALLBACK, create_function('$error', 'var_dump($error); exit();'));
 
$releaseVersion = '0.1.0';
$releaseStability = 'beta';
$apiVersion = '0.1.0';
$apiStability = 'beta';
$notes = 'The initial release of Stagehand_PHP_Parser.';
 
$package = new PEAR_PackageFileManager2();
$package->setOptions(array('filelistgenerator' => 'file',
                           'changelogoldtonew' => false,
                           'simpleoutput' => true,
                           'baseinstalldir' => '/',
                           'packagefile' => 'package.xml',
                           'packagedirectory' => '.',
                           'dir_roles' => array('bin' => 'script',
                                                'doc' => 'doc',
                                                'src' => 'php',
                                                'tests' => 'test'),
                           'ignore' => array('package.php', 'data/'))
                     );
 
$package->setPackage('Stagehand_PHP_Lexer');
$package->setPackageType('php');
$package->setSummary('A class for parsing PHP script.');
$package->setDescription('A class for parsing PHP script.');
$package->setChannel('pear.piece-framework.com');
$package->setLicense('Zend License', 'http://www.zend.com/license/2_00.txt');
$package->setAPIVersion($apiVersion);
$package->setAPIStability($apiStability);
$package->setReleaseVersion($releaseVersion);
$package->setReleaseStability($releaseStability);
$package->setNotes($notes);
$package->setPhpDep('5.0.0');
$package->setPearinstallerDep('1.4.3');
$package->addMaintainer('lead', 'kumatch', 'KUMAKURA Yousuke', 'kumatch@gmail.com');
$package->addGlobalReplacement('package-info', '@package_version@', 'version');
$package->generateContents();
 
if (array_key_exists(1, $_SERVER['argv']) && $_SERVER['argv'][1] == 'make') {
    $package->writePackageFile();
} else {
    $package->debugPackageFile();
}
 
exit(); 

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
