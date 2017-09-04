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

/*
* WARNING: ONCE SET DO NOT CHANGE! Improper use will render this module useless and unworkable.
* Only Change if you know what you are doing.
*/
if (!defined('WFLINKS_BROKEN')) {
    define('WFLINKS_BROKEN', 'wflinks_broken');
}
if (!defined('WFLINKS_CAT')) {
    define('WFLINKS_CAT', 'wflinks_cat');
}
if (!defined('WFLINKS_LINKS')) {
    define('WFLINKS_LINKS', 'wflinks_links');
}
if (!defined('WFLINKS_MOD')) {
    define('WFLINKS_MOD', 'wflinks_mod');
}
if (!defined('WFLINKS_VOTEDATA')) {
    define('WFLINKS_VOTEDATA', 'wflinks_votedata');
}
if (!defined('WFLINKS_INDEXPAGE')) {
    define('WFLINKS_INDEXPAGE', 'wflinks_indexpage');
}
if (!defined('WFLINKS_ALTCAT')) {
    define('WFLINKS_ALTCAT', 'wflinks_altcat');
}

$moduleDirName = basename(dirname(__DIR__));
$capsDirName   = strtoupper($moduleDirName);

if (!defined($capsDirName . '_DIRNAME')) {
    //if (!defined(constant($capsDirName . '_DIRNAME'))) {
    define($capsDirName . '_DIRNAME', $GLOBALS['xoopsModule']->dirname());
    define($capsDirName . '_PATH', XOOPS_ROOT_PATH . '/modules/' . constant($capsDirName . '_DIRNAME'));
    define($capsDirName . '_URL', XOOPS_URL . '/modules/' . constant($capsDirName . '_DIRNAME'));
    define($capsDirName . '_ADMIN', constant($capsDirName . '_URL') . '/admin/index.php');
    define($capsDirName . '_ROOT_PATH', XOOPS_ROOT_PATH . '/modules/' . constant($capsDirName . '_DIRNAME'));
    define($capsDirName . '_AUTHOR_LOGOIMG', constant($capsDirName . '_URL') . '/assets/images/logoModule.png');
    define($capsDirName . '_UPLOAD_URL', XOOPS_UPLOAD_URL . '/' . $moduleDirName); // WITHOUT Trailing slash
    define($capsDirName . '_UPLOAD_PATH', XOOPS_UPLOAD_PATH . '/' . $moduleDirName); // WITHOUT Trailing slash
}

//Configurator
return (object)[
    'name'          => 'Module Configurator',
    'paths'         => [
        'dirname'    => $moduleDirName,
        'admin'      => XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/admin',
        //        'path'       => XOOPS_ROOT_PATH . '/modules/' . $moduleDirName,
        //        'url'        => XOOPS_URL . '/modules/' . $moduleDirName,
        'uploadPath' => XOOPS_UPLOAD_PATH . '/' . $moduleDirName,
        'uploadUrl'  => XOOPS_UPLOAD_URL . '/' . $moduleDirName,
    ],
    'uploadFolders' => [
        constant($capsDirName . '_UPLOAD_PATH'),
        constant($capsDirName . '_UPLOAD_PATH') . '/category',
        constant($capsDirName . '_UPLOAD_PATH') . '/screenshots',
        //        XOOPS_UPLOAD_PATH . '/flags'
    ],
    'blankFiles'    => [
        constant($capsDirName . '_UPLOAD_PATH'),
        constant($capsDirName . '_UPLOAD_PATH') . '/category',
        constant($capsDirName . '_UPLOAD_PATH') . '/screenshots',
        //        XOOPS_UPLOAD_PATH . '/flags'
    ],

    'templateFolders' => [
        '/templates/',
        '/templates/blocks/',
        '/templates/admin/'

    ],
    'oldFiles'        => [
        '/sql/wflinks.sql',
        '/class/wfl_lists.php',
        '/class/class_thumbnail.php',
        '/vcard.php',
    ],
    'oldFolders'      => [
        '/images',
        '/css',
        '/js',
        '/tcpdf',
        '/images',
    ],
    'modCopyright'    => "<a href='https://xoops.org' title='XOOPS Project' target='_blank'>
                     <img src='" . constant($capsDirName . '_AUTHOR_LOGOIMG') . '\' alt=\'XOOPS Project\' /></a>',
];
