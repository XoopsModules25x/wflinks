<?php
/**
 *
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

use XoopsModules\Wflinks;

$moduleDirName = basename(__DIR__);

require_once __DIR__ . '/../../mainfile.php';
include XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/include/common.php';
require_once XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/class/WfThumbsNails.php';
require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
require_once XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/class/xoopstree.php';

/** @var Wflinks\Helper $helper */
$helper = Wflinks\Helper::getInstance();
$helper->loadLanguage('main');

require_once XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/class/wfltextsanitizer.php';
$wfmyts = new WflTextSanitizer(); // MyTextSanitizer object

global $xoopModuleConfig;
