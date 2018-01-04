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

require_once __DIR__ . '/admin_header.php';

global $xoopsModuleConfig;

$op       = (isset($_REQUEST['op']) && !empty($_REQUEST['op'])) ? $_REQUEST['op'] : '';
$rootpath = isset($_GET['rootpath']) ? (int)$_GET['rootpath'] : 0;

switch (strtolower($op)) {
    case 'upload':
        if ('' !== $_FILES['uploadfile']['name']) {
            if (file_exists(XOOPS_ROOT_PATH . '/' . $_POST['uploadpath'] . '/' . $_FILES['uploadfile']['name'])) {
                redirect_header('upload.php', 2, _AM_WFL_LINK_IMAGEEXIST);
            }
            $allowed_mimetypes = ['image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png'];
            Wflinks\Utility::uploadFiles($_FILES, $_POST['uploadpath'], $allowed_mimetypes, 'upload.php', 1, 0);
            redirect_header('upload.php', 2, _AM_WFL_LINK_IMAGEUPLOAD);
        } else {
            redirect_header('upload.php', 2, _AM_WFL_LINK_NOIMAGEEXIST);
        }
        break;

    case 'delfile':

        if (isset($_POST['confirm']) && 1 == $_POST['confirm']) {
            $filetodelete = XOOPS_ROOT_PATH . '/' . $_POST['uploadpath'] . '/' . $_POST['linkfile'];
            if (file_exists($filetodelete)) {
                chmod($filetodelete, 0666);
                if (@unlink($filetodelete)) {
                    redirect_header('upload.php', 1, _AM_WFL_LINK_FILEDELETED);
                } else {
                    redirect_header('upload.php', 1, _AM_WFL_LINK_FILEERRORDELETE);
                }
            }
            exit();
        } else {
            if (empty($_POST['linkfile'])) {
                redirect_header('upload.php', 1, _AM_WFL_LINK_NOFILEERROR);
            }
            xoops_cp_header();
            xoops_confirm([
                              'op'         => 'delfile',
                              'uploadpath' => $_POST['uploadpath'],
                              'linkfile'   => $_POST['linkfile'],
                              'confirm'    => 1
                          ], 'upload.php', _AM_WFL_LINK_DELETEFILE . '<br><br>' . $_POST['linkfile'], _AM_WFL_BDELETE);
        }
        break;

    case 'default':
    default:
        $displayimage = '';
        xoops_cp_header();

        $dirarray  = [
            1 => $xoopsModuleConfig['catimage'],
            2 => $xoopsModuleConfig['screenshots'],
            3 => $xoopsModuleConfig['mainimagedir']
        ];
        $namearray = [1 => _AM_WFL_LINK_CATIMAGE, 2 => _AM_WFL_LINK_SCREENSHOTS, 3 => _AM_WFL_LINK_MAINIMAGEDIR];
        $listarray = [
            1 => _AM_WFL_LINK_FCATIMAGE,
            2 => _AM_WFL_LINK_FSCREENSHOTS,
            3 => _AM_WFL_LINK_FMAINIMAGEDIR
        ];

        Wflinks\Utility::getServerStats();
        if ($rootpath > 0) {
            echo '<div><b>' . _AM_WFL_LINK_FUPLOADPATH . '</b> ' . XOOPS_ROOT_PATH . '/' . $dirarray[$rootpath] . "</div>\n";
            echo '<div><b>' . _AM_WFL_LINK_FUPLOADURL . '</b> ' . XOOPS_URL . '/' . $dirarray[$rootpath] . "</div><br>\n";
        }
        $pathlist = isset($listarray[$rootpath]) ? $namearray[$rootpath] : '';
        $namelist = isset($listarray[$rootpath]) ? $namearray[$rootpath] : '';

        $iform = new \XoopsThemeForm(_AM_WFL_LINK_FUPLOADIMAGETO . $pathlist, 'op', xoops_getenv('PHP_SELF'), 'post', true);
        $iform->setExtra('enctype="multipart/form-data"');
        ob_start();
        $iform->addElement(new \XoopsFormHidden('dir', $rootpath));
        Wflinks\Utility::getDirSelectOption($namelist, $dirarray, $namearray);
        $iform->addElement(new \XoopsFormLabel(_AM_WFL_LINK_FOLDERSELECTION, ob_get_contents()));
        ob_end_clean();

        if ($rootpath > 0) {
            $graph_array       = WflLists:: getListTypeAsArray(XOOPS_ROOT_PATH . '/' . $dirarray[$rootpath], $type = 'images');
            $indeximage_select = new \XoopsFormSelect('', 'linkfile', '');
            $indeximage_select->addOptionArray($graph_array);
            $indeximage_select->setExtra("onchange='showImgSelected(\"image\", \"linkfile\", \"" . $dirarray[$rootpath] . '", "", "' . XOOPS_URL . "\")'");
            $indeximage_tray = new \XoopsFormElementTray(_AM_WFL_LINK_FSHOWSELECTEDIMAGE, '&nbsp;');
            $indeximage_tray->addElement($indeximage_select);
            if (!empty($imgurl)) {
                $indeximage_tray->addElement(new \XoopsFormLabel('', "<br><br><img src='" . XOOPS_URL . '/' . $dirarray[$rootpath] . '/' . $linkfile . "' name='image' id='image' alt=''>"));
            } else {
                $indeximage_tray->addElement(new \XoopsFormLabel('', "<br><br><img src='" . XOOPS_URL . "/uploads/blank.gif' name='image' id='image' alt=''>"));
            }
            $iform->addElement($indeximage_tray);
            $iform->addElement(new \XoopsFormFile(_AM_WFL_LINK_FUPLOADIMAGE, 'uploadfile', 0));
            $iform->addElement(new \XoopsFormHidden('uploadpath', $dirarray[$rootpath]));
            $iform->addElement(new \XoopsFormHidden('rootnumber', $rootpath));

            $dup_tray = new \XoopsFormElementTray('', '');
            $dup_tray->addElement(new \XoopsFormHidden('op', 'upload'));
            $butt_dup = new \XoopsFormButton('', '', _AM_WFL_BUPLOAD, 'submit');
            $butt_dup->setExtra('onclick="this.form.elements.op.value=\'upload\'"');
            $dup_tray->addElement($butt_dup);

            $butt_dupct = new \XoopsFormButton('', '', _AM_WFL_BDELETEIMAGE, 'submit');
            $butt_dupct->setExtra('onclick="this.form.elements.op.value=\'delfile\'"');
            $dup_tray->addElement($butt_dupct);
            $iform->addElement($dup_tray);
        }
        $iform->display();
}
require_once __DIR__ . '/admin_footer.php';
