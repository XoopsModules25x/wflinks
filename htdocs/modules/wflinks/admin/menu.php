<?php
/**
 * $Id: menu.php 9706 2012-06-24 20:24:10Z beckmi $
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */


defined("XOOPS_ROOT_PATH") or die("XOOPS root path not defined");

$path = dirname(dirname(dirname(dirname(__FILE__))));
include_once $path . '/mainfile.php';

$dirname         = basename(dirname(dirname(__FILE__)));
$module_handler  = xoops_gethandler('module');
$module          = $module_handler->getByDirname($dirname);
$pathIcon32      = $module->getInfo('icons32');
$pathModuleAdmin = $module->getInfo('dirmoduleadmin');
$pathLanguage    = $path . $pathModuleAdmin;


if (!file_exists($fileinc = $pathLanguage . '/language/' . $GLOBALS['xoopsConfig']['language'] . '/' . 'main.php')) {
    $fileinc = $pathLanguage . '/language/english/main.php';
}

include_once $fileinc;

$adminmenu = array();

$i = 1;


$adminmenu[$i]["title"] = _AM_MODULEADMIN_HOME;
$adminmenu[$i]["link"]  = "admin/index.php";
$adminmenu[$i]["icon"]  = $pathIcon32 . '/home.png';
$i++;

$adminmenu[$i]["title"] =  _MI_WFL_MLINKS;
$adminmenu[$i]["link"]  = "admin/main.php";
$adminmenu[$i]["icon"]  = $pathIcon32 . '/manage.png';
$i++;
$adminmenu[$i]['title'] = _MI_WFL_MCATEGORY;
$adminmenu[$i]['link']  = "admin/category.php";
$adminmenu[$i]["icon"]  = $pathIcon32 . '/category.png';
$i++;
$adminmenu[$i]["title"] =  _MI_WFL_INDEXPAGE;
$adminmenu[$i]["link"]  = "admin/indexpage.php";
$adminmenu[$i]["icon"]  = $pathIcon32 . '/index.png';

//$i++;
//$adminmenu[$i]['title'] = _MI_WFL_MLINKS;
//$adminmenu[$i]['link']="admin/main.php?op=edit";
//$adminmenu[$i]["icon"]  = $pathIcon32 . '/category.png';
$i++;
$adminmenu[$i]['title'] = _MI_WFL_SNEWFILESVAL;
$adminmenu[$i]['link']  = "admin/newlinks.php";
$adminmenu[$i]["icon"]  = $pathIcon32 . '/add.png';
$i++;
$adminmenu[$i]['title'] = _MI_WFL_SMODREQUEST;
$adminmenu[$i]['link']  = "admin/modifications.php";
$adminmenu[$i]["icon"]  = $pathIcon32 . '/update.png';
$i++;
$adminmenu[$i]['title'] = _MI_WFL_SBROKENSUBMIT;
$adminmenu[$i]['link']  = "admin/brokenlink.php";
$adminmenu[$i]["icon"]  = $pathIcon32 . '/brokenlink.png';
$i++;
$adminmenu[$i]['title'] = _MI_WFL_MUPLOADS;
$adminmenu[$i]['link']  = "admin/upload.php";
$adminmenu[$i]["icon"]  = $pathIcon32 . '/photo.png';

//$i++;
//$adminmenu[$i]['title'] = _MI_WFL_BLOCKADMIN;
//$adminmenu[$i]['link']  = 'admin/blocksadmin.php';
//$adminmenu[$i]["icon"]  = $pathIcon32 . '/block.png';
$i++;
$adminmenu[$i]['title'] = _MI_WFL_PERMISSIONS;
$adminmenu[$i]['link']  = "admin/permissions.php";
$adminmenu[$i]["icon"]  = $pathIcon32 . '/permissions.png';

$i++;
$adminmenu[$i]['title'] = _MI_WFL_MVOTEDATA;
$adminmenu[$i]['link']  = "admin/votedata.php";
$adminmenu[$i]["icon"]  = $pathIcon32 . '/poll.png';

//$i++;
//$adminmenu[$i]['title'] = _MI_WFL_DOCUMENTATION;
//$adminmenu[$i]['link']  = "docs/english/readme.html";
//$adminmenu[$i]["icon"]  = $pathIcon32 . '/help.png';

$i++;
$adminmenu[$i]['title'] = _AM_MODULEADMIN_ABOUT;
$adminmenu[$i]["link"]  = "admin/about.php";
$adminmenu[$i]["icon"]  = $pathIcon32 . '/about.png';
//$i++;
//$adminmenu[$i]['title'] = _AM_MODULEADMIN_ABOUT;
//$adminmenu[$i]["link"]  = "admin/about2.php";
//$adminmenu[$i]["icon"]  = $pathIcon32 . '/about.png';