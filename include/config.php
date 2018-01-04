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


$moduleDirName = basename(dirname(__DIR__));
$capsDirName   = strtoupper($moduleDirName);

//Configurator
return (object)[
    'name'          => strtoupper($moduleDirName) .' Module Configurator',
    'paths'         => [
        'dirname'    => $moduleDirName,
        'admin'      => XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/admin',
        'modPath'    => XOOPS_ROOT_PATH . '/modules/' . $moduleDirName,
        'modUrl'     => XOOPS_URL . '/modules/' . $moduleDirName,
        'uploadPath' => XOOPS_UPLOAD_PATH . '/' . $moduleDirName,
        'uploadUrl'  => XOOPS_UPLOAD_URL . '/' . $moduleDirName,
    ],
    'uploadFolders' => [
        constant($capsDirName . '_UPLOAD_PATH'),
        constant($capsDirName . '_UPLOAD_PATH') . '/category',
        constant($capsDirName . '_UPLOAD_PATH') . '/screenshots',
        //XOOPS_UPLOAD_PATH . '/flags'
    ],
    'copyBlankFiles'     => [
        constant($capsDirName . '_UPLOAD_PATH'),
        constant($capsDirName . '_UPLOAD_PATH') . '/category',
        constant($capsDirName . '_UPLOAD_PATH') . '/screenshots',
        //XOOPS_UPLOAD_PATH . '/flags'
    ],

    'copyTestFolders' => [
        //        constant($capsDirName . '_UPLOAD_PATH'),
        //[
        //    constant($capsDirName . '_PATH') . '/testdata/images',
        //    constant($capsDirName . '_UPLOAD_PATH') . '/images',
        //]
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
