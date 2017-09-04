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

$moduleDirName = basename(__DIR__);

require_once __DIR__ . '/../../mainfile.php';
include XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/include/config.php';
include XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/class/utility.php';
require_once XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/class/WfThumbsNails.php';
require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
require_once XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/class/xoopstree.php';

if (!file_exists(__DIR__ . '/language/' . $xoopsConfig['language'] . '/main.php')) {
    require_once __DIR__ . '/language/english/main.php';
}

require_once XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/class/myts_extended.php';
$wfmyts = new wflTextSanitizer(); // MyTextSanitizer object

global $xoopModuleConfig;
