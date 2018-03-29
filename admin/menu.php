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

//

use XoopsModules\Wflinks;

// require_once __DIR__ . '/../class/Helper.php';
//require_once __DIR__ . '/../include/common.php';
$helper = Wflinks\Helper::getInstance();

$pathIcon32 = \Xmf\Module\Admin::menuIconPath('');
$pathModIcon32 = $helper->getModule()->getInfo('modicons32');

$adminmenu = [
    [
        'title' => _MI_WFL_HOME,
        'link'  => 'admin/index.php',
//        'desc'  => _MI_WFL_HOME_DESC,
        'icon'  => $pathIcon32 . '/home.png'
    ],
    [
        'title' => _MI_WFL_MCATEGORY,
        'link'  => 'admin/category.php',
        'desc'  => _MI_WFL_MCATEGORY_DESC,
        'icon'  => $pathIcon32 . '/category.png',
    ],
    [
        'title' => _MI_WFL_MLINKS,
        'link'  => 'admin/main.php',
        'desc'  => _MI_WFL_MLINKS_DESC,
        'icon'  => $pathIcon32 . '/manage.png'
    ],
    [
        'title' => _MI_WFL_SNEWFILESVAL,
        'link'  => 'admin/newlinks.php',
        'desc'  => _MI_WFL_SNEWFILESVAL,
        'icon'  => $pathIcon32 . '/add.png'
    ],
    [
        'title' => _MI_WFL_SMODREQUEST,
        'link'  => 'admin/modifications.php',
        'desc'  => _MI_WFL_SMODREQUEST,
        'icon'  => $pathIcon32 . '/update.png'
    ],
    [
        'title' => _MI_WFL_SBROKENSUBMIT,
        'link'  => 'admin/brokenlink.php',
        'desc'  => _MI_WFL_SBROKENSUBMIT,
        'icon'  => $pathIcon32 . '/brokenlink.png'
    ],
    [
        'title' => _MI_WFL_MUPLOADS,
        'link'  => 'admin/upload.php',
        'desc'  => _MI_WFL_MUPLOADS,
        'icon'  => $pathIcon32 . '/photo.png'
    ],
    [
        'title' => _MI_WFL_INDEXPAGE,
        'link'  => 'admin/indexpage.php',
        'desc'  => _MI_WFL_INDEXPAGE_DESC,
        'icon'  => $pathIcon32 . '/index.png'
    ],
    [
        'title' => _MI_WFL_MVOTEDATA,
        'link'  => 'admin/votedata.php',
        'desc'  => _MI_WFL_MVOTEDATA_DESC,
        'icon'  => $pathIcon32 . '/poll.png'
    ],
    [
        'title' => _MI_WFL_PERMISSIONS,
        'link'  => 'admin/permissions.php',
        'desc'  => _MI_WFL_PERMISSIONS_DESC,
        'icon'  => $pathIcon32 . '/permissions.png'
    ],
    [
        'title' => _MI_WFL_ABOUT,
        'link'  => 'admin/about.php',
//        'desc'  => _MI_WFL_ABOUTS_DESC,
        'icon'  => $pathIcon32 . '/about.png'
    ],
];
