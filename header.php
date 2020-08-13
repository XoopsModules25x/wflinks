<?php
/**
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

use XoopsModules\Wflinks\{
    Helper
};

require dirname(__DIR__, 2) . '/mainfile.php';
require XOOPS_ROOT_PATH . '/header.php';

require __DIR__ . '/preloads/autoloader.php';
//require_once XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/class/WfThumbsNails.php';
require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
//require_once XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/class/xoopstree.php';

$moduleDirName = basename(__DIR__);

/** @var Helper $helper */
$helper = Helper::getInstance();

$myts = \MyTextSanitizer::getInstance();

if (!isset($GLOBALS['xoTheme']) || !is_object($GLOBALS['xoTheme'])) {
    require $GLOBALS['xoops']->path('class/theme.php');
    $GLOBALS['xoTheme'] = new \xos_opal_Theme();
}

// Load language files
$helper->loadLanguage('main');

if (!isset($GLOBALS['xoopsTpl']) || !($GLOBALS['xoopsTpl'] instanceof XoopsTpl)) {
    require $GLOBALS['xoops']->path('class/template.php');
    $xoopsTpl = new XoopsTpl();
}

global $xoopModuleConfig;
