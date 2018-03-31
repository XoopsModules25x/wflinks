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

use Xmf\Request;
use XoopsModules\Wflinks;
/** @var Wflinks\Helper $helper */
$helper = Wflinks\Helper::getInstance();

require_once __DIR__ . '/admin_header.php';
require_once XOOPS_ROOT_PATH . '/class/xoopsform/grouppermform.php';

$op = '';

if (isset($_POST)) {
    foreach ($_POST as $k => $v) {
        ${$k} = $v;
    }
}
if (isset($_GET)) {
    foreach ($_GET as $k => $v) {
        ${$k} = $v;
    }
}

/**
 * @param int $cid
 */
function createCat($cid = 0)
{
    // require_once __DIR__ . '/../class/wfllists.php';
    require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

    global $xoopsDB, $wfmyts,  $totalcats, $xoopsModule;
    /** @var Wflinks\Helper $helper */
    $helper = Wflinks\Helper::getInstance();

    $lid          = 0;
    $title        = '';
    $imgurl       = '';
    $description  = '';
    $pid          = '';
    $weight       = 0;
    $nohtml       = 0;
    $nosmiley     = 0;
    $noxcodes     = 0;
    $noimages     = 0;
    $nobreak      = 1;
    $spotlighttop = 0;
    $spotlighthis = 0;
    $client_id    = 0;
    $banner_id    = 0;
    $heading      = _AM_WFL_CCATEGORY_CREATENEW;
    $totalcats    = Wflinks\Utility::getTotalCategory();

    if ($cid) {
        $sql          = 'SELECT * FROM ' . $xoopsDB->prefix('wflinks_cat') . " WHERE cid=$cid";
        $cat_arr      = $xoopsDB->fetchArray($xoopsDB->query($sql));
        $title        = $wfmyts->htmlSpecialChars($cat_arr['title']);
        $imgurl       = $wfmyts->htmlSpecialChars($cat_arr['imgurl']);
        $description  = $wfmyts->htmlSpecialChars($cat_arr['description']);
        $nohtml       = (int)$cat_arr['nohtml'];
        $nosmiley     = (int)$cat_arr['nosmiley'];
        $noxcodes     = (int)$cat_arr['noxcodes'];
        $noimages     = (int)$cat_arr['noimages'];
        $nobreak      = (int)$cat_arr['nobreak'];
        $spotlighthis = (int)$cat_arr['spotlighthis'];
        $spotlighttop = (int)$cat_arr['spotlighttop'];
        $weight       = $cat_arr['weight'];
        $client_id    = $cat_arr['client_id'];
        $banner_id    = $cat_arr['banner_id'];
        $heading      = _AM_WFL_CCATEGORY_MODIFY;

        $gpermHandler = xoops_getHandler('groupperm');
        $groups       = $gpermHandler->getGroupIds('WFLinkCatPerm', $cid, $xoopsModule->getVar('mid'));
        $groups       = $groups;
    } else {
        $groups = true;
    }

    $sform = new \XoopsThemeForm($heading, 'op', xoops_getenv('PHP_SELF'), 'post', true);
    $sform->setExtra('enctype="multipart/form-data"');

    $sform->addElement(new \XoopsFormText(_AM_WFL_FCATEGORY_TITLE, 'title', 50, 80, $title), true);
    $sform->addElement(new \XoopsFormText(_AM_WFL_FCATEGORY_WEIGHT, 'weight', 10, 80, $weight), false);

    if ($totalcats > 0 && $cid) {
        $mytreechose = new WflinksXoopsTree($xoopsDB->prefix('wflinks_cat'), 'cid', 'pid');
        ob_start();
        $mytreechose->makeMySelBox('title', 'title', $cat_arr['pid'], 1, 'pid');
        $sform->addElement(new \XoopsFormLabel(_AM_WFL_FCATEGORY_SUBCATEGORY, ob_get_contents()));
        ob_end_clean();
    } else {
        $mytreechose = new WflinksXoopsTree($xoopsDB->prefix('wflinks_cat'), 'cid', 'pid');
        ob_start();
        $mytreechose->makeMySelBox('title', 'title', $cid, 1, 'pid');
        $sform->addElement(new \XoopsFormLabel(_AM_WFL_FCATEGORY_SUBCATEGORY, ob_get_contents()));
        ob_end_clean();
    }

    $graph_array       = WflLists:: getListTypeAsArray(XOOPS_ROOT_PATH . '/' . $helper->getConfig('catimage'), $type = 'images');
    $indeximage_select = new \XoopsFormSelect('', 'imgurl', $imgurl);
    $indeximage_select->addOptionArray($graph_array);
    $indeximage_select->setExtra("onchange='showImgSelected(\"image\", \"imgurl\", \"" . $helper->getConfig('catimage') . '", "", "' . XOOPS_URL . "\")'");
    $indeximage_tray = new \XoopsFormElementTray(_AM_WFL_FCATEGORY_CIMAGE, '&nbsp;');
    $indeximage_tray->addElement($indeximage_select);
    if (!empty($imgurl)) {
        $indeximage_tray->addElement(new \XoopsFormLabel('', "<br><br><img src='" . XOOPS_URL . '/' . $helper->getConfig('catimage') . '/' . $imgurl . "' name='image' id='image' alt=''>"));
    } else {
        $indeximage_tray->addElement(new \XoopsFormLabel('', "<br><br><img src='" . XOOPS_URL . "/uploads/blank.gif' name='image' id='image' alt=''>"));
    }
    $sform->addElement($indeximage_tray);

    $editor = Wflinks\Utility::getWysiwygForm(_AM_WFL_FCATEGORY_DESCRIPTION, 'description', $description, 15, 60, '');
    $sform->addElement($editor, false);

    // Select Client/Sponsor
    $client_select   = new \XoopsFormSelect(_AM_WFL_CATSPONSOR, 'client_id', $client_id, false);
    $sql             = 'SELECT cid, name FROM ' . $xoopsDB->prefix('bannerclient') . ' ORDER BY name ASC';
    $result          = $xoopsDB->query($sql);
    $client_array    = [];
    $client_array[0] = '&nbsp;';
    while (false !== ($myrow = $xoopsDB->fetchArray($result))) {
        $client_array[$myrow['cid']] = $myrow['name'];
    }
    $client_select->addOptionArray($client_array);
    $client_select->setDescription(_AM_WFL_CATSPONSORDSC);
    $sform->addElement($client_select);

    // Select Banner
    $banner_select   = new \XoopsFormSelect(_AM_WFL_BANNERID, 'banner_id', $banner_id, false);
    $sql             = 'SELECT bid, cid FROM ' . $xoopsDB->prefix('banner') . ' ORDER BY bid ASC';
    $result          = $xoopsDB->query($sql);
    $banner_array    = [];
    $banner_array[0] = '&nbsp;';
    while (false !== ($myrow = $xoopsDB->fetchArray($result))) {
        $banner_array[$myrow['bid']] = $myrow['bid'];
    }
    $banner_select->addOptionArray($banner_array);
    $banner_select->setDescription(_AM_WFL_BANNERIDDSC);
    $sform->addElement($banner_select);

    $options_tray = new \XoopsFormElementTray(_AM_WFL_TEXTOPTIONS, '<br>');

    $html_checkbox = new \XoopsFormCheckBox('', 'nohtml', $nohtml);
    $html_checkbox->addOption(1, _AM_WFL_DISABLEHTML);
    $options_tray->addElement($html_checkbox);

    $smiley_checkbox = new \XoopsFormCheckBox('', 'nosmiley', $nosmiley);
    $smiley_checkbox->addOption(1, _AM_WFL_DISABLESMILEY);
    $options_tray->addElement($smiley_checkbox);

    $xcodes_checkbox = new \XoopsFormCheckBox('', 'noxcodes', $noxcodes);
    $xcodes_checkbox->addOption(1, _AM_WFL_DISABLEXCODE);
    $options_tray->addElement($xcodes_checkbox);

    $noimages_checkbox = new \XoopsFormCheckBox('', 'noimages', $noimages);
    $noimages_checkbox->addOption(1, _AM_WFL_DISABLEIMAGES);
    $options_tray->addElement($noimages_checkbox);

    $breaks_checkbox = new \XoopsFormCheckBox('', 'nobreak', $nobreak);
    $breaks_checkbox->addOption(1, _AM_WFL_DISABLEBREAK);
    $options_tray->addElement($breaks_checkbox);
    $sform->addElement($options_tray);

    //    $sform -> addElement(new \XoopsFormSelectGroup(_AM_WFL_FCATEGORY_GROUPPROMPT, "groups", true, $groups, 5, true));

    $sform->addElement(new \XoopsFormHidden('cid', $cid));

    $sform->addElement(new \XoopsFormHidden('spotlighttop', $cid));

    $button_tray = new \XoopsFormElementTray('', '');
    $hidden      = new \XoopsFormHidden('op', 'save');
    $button_tray->addElement($hidden);

    if (!$cid) {
        $butt_create = new \XoopsFormButton('', '', _AM_WFL_BSAVE, 'submit');
        $butt_create->setExtra('onclick="this.form.elements.op.value=\'addCat\'"');
        $button_tray->addElement($butt_create);

        $butt_clear = new \XoopsFormButton('', '', _AM_WFL_BRESET, 'reset');
        $button_tray->addElement($butt_clear);

        $butt_cancel = new \XoopsFormButton('', '', _AM_WFL_BCANCEL, 'button');
        $butt_cancel->setExtra('onclick="history.go(-1)"');
        $button_tray->addElement($butt_cancel);
    } else {
        $butt_create = new \XoopsFormButton('', '', _AM_WFL_BMODIFY, 'submit');
        $butt_create->setExtra('onclick="this.form.elements.op.value=\'addCat\'"');
        $button_tray->addElement($butt_create);

        $butt_delete = new \XoopsFormButton('', '', _AM_WFL_BDELETE, 'submit');
        $butt_delete->setExtra('onclick="this.form.elements.op.value=\'del\'"');
        $button_tray->addElement($butt_delete);

        $butt_cancel = new \XoopsFormButton('', '', _AM_WFL_BCANCEL, 'button');
        $butt_cancel->setExtra('onclick="history.go(-1)"');
        $button_tray->addElement($butt_cancel);
    }
    $sform->addElement($button_tray);
    $sform->display();

    $result2 = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wflinks_cat') . '');
    list($numrows) = $xoopsDB->fetchRow($result2);
}

if (!isset($_POST['op'])) {
    $op = isset($_GET['op']) ? $_GET['op'] : 'main';
} else {
    $op = isset($_POST['op']) ? $_POST['op'] : 'main';
}

switch ($op) {
    case 'move':
        if (!isset($_POST['ok'])) {
            $cid = isset($_POST['cid']) ? $_POST['cid'] : $_GET['cid'];

            xoops_cp_header();

            require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
            $mytree = new WflinksXoopsTree($xoopsDB->prefix('wflinks_cat'), 'cid', 'pid');
            $sform  = new \XoopsThemeForm(_AM_WFL_CCATEGORY_MOVE, 'move', xoops_getenv('PHP_SELF'), 'post', true);
            ob_start();
            $mytree->makeMySelBox('title', 'title', 0, 0, 'target');
            $sform->addElement(new \XoopsFormLabel(_AM_WFL_BMODIFY, ob_get_contents()));
            ob_end_clean();
            $create_tray = new \XoopsFormElementTray('', '');
            $create_tray->addElement(new \XoopsFormHidden('source', $cid));
            $create_tray->addElement(new \XoopsFormHidden('ok', 1));
            $create_tray->addElement(new \XoopsFormHidden('op', 'move'));
            $butt_save = new \XoopsFormButton('', '', _AM_WFL_BMOVE, 'submit');
            $butt_save->setExtra('onclick="this.form.elements.op.value=\'move\'"');
            $create_tray->addElement($butt_save);
            $butt_cancel = new \XoopsFormButton('', '', _AM_WFL_BCANCEL, 'submit');
            $butt_cancel->setExtra('onclick="this.form.elements.op.value=\'cancel\'"');
            $create_tray->addElement($butt_cancel);
            $sform->addElement($create_tray);
            $sform->display();
            xoops_cp_footer();
        } else {
            global $xoopsDB;

            $source = $_POST['source'];
            $target = $_POST['target'];
            if ($target == $source) {
                redirect_header("category.php?op=move&ok=0&cid=$source", 5, _AM_WFL_CCATEGORY_MODIFY_FAILED);
            }
            if (!$target) {
                redirect_header("category.php?op=move&ok=0&cid=$source", 5, _AM_WFL_CCATEGORY_MODIFY_FAILEDT);
            }
            $sql    = 'UPDATE ' . $xoopsDB->prefix('wflinks_links') . ' set cid = ' . $target . ' WHERE cid =' . $source;
            $result = $xoopsDB->queryF($sql);
            $error  = _AM_WFL_DBERROR . ': <br><br>' . $sql;
            if (!$result) {
                trigger_error($error, E_USER_ERROR);
            }
            redirect_header('category.php?op=default', 1, _AM_WFL_CCATEGORY_MODIFY_MOVED);
        }
        break;

    case 'addCat':

        $groups       = Request::getArray('groups', [], 'POST');
        $cid          = Request::getInt('cid', 0, 'POST');
        $pid          = Request::getInt('pid', 0, 'POST');
        $weight       = (isset($_REQUEST['weight']) && $_REQUEST['weight'] > 0) ? $_REQUEST['weight'] : 0;
        $spotlighthis = Request::getInt('lid', 0, 'POST');
        $spotlighttop = (1 == $_REQUEST['spotlighttop']) ? 1 : 0;
        $title        = Request::getText('title', '', 'POST');
        $descriptionb = Request::getText('description', '', 'POST');
        $imgurl       = ($_REQUEST['imgurl'] && 'blank.gif' !== $_REQUEST['imgurl']) ? Request::getUrl('imgurl', '', 'POST') : '';
        $client_id    = Request::getInt('client_id', 0, 'POST');
        if ($client_id > 0) {
            $banner_id = 0;
        } else {
            $banner_id = Request::getInt('banner_id', 0, 'POST');
        }

        $nohtml   = Request::getInt('nohtml', 0, 'POST');
        $nosmiley = Request::getInt('nosmiley', 0, 'POST');
        $noxcodes = Request::getInt('noxcodes', 0, 'POST');
        $noimages = Request::getInt('noimages', 0, 'POST');
        $nobreak  = Request::getInt('nobreak', 0, 'POST');

        if (!$cid) {
            $cid = 0;
            $sql = 'INSERT INTO '
                   . $xoopsDB->prefix('wflinks_cat')
                   . " (cid, pid, title, imgurl, description, nohtml, nosmiley, noxcodes, noimages, nobreak, weight, spotlighttop, spotlighthis, client_id, banner_id ) VALUES (0, $pid, '$title', '$imgurl', '$descriptionb', '$nohtml', '$nosmiley', '$noxcodes', '$noimages', '$nobreak', '$weight',  '$spotlighttop', '$spotlighthis', '$client_id', '$banner_id' )";
            if (0 == $cid) {
                $newid = $xoopsDB->getInsertId();
            }

            // Notify of new category

            global $xoopsModule;
            $tags                  = [];
            $tags['CATEGORY_NAME'] = $title;
            $tags['CATEGORY_URL']  = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/viewcat.php?cid=' . $newid;
            $notificationHandler   = xoops_getHandler('notification');
            $notificationHandler->triggerEvent('global', 0, 'new_category', $tags);
            $database_mess = _AM_WFL_CCATEGORY_CREATED;
        } else {
            if ($cid == $pid) {
                redirect_header('category.php', 1, _AM_WFL_ERROR_CATISCAT);
            }
            $sql           = 'UPDATE '
                             . $xoopsDB->prefix('wflinks_cat')
                             . " SET title ='$title', imgurl='$imgurl', pid =$pid, description='$descriptionb', spotlighthis='$spotlighthis' , spotlighttop='$spotlighttop', nohtml='$nohtml', nosmiley='$nosmiley', noxcodes='$noxcodes', noimages='$noimages', nobreak='$nobreak', weight='$weight', client_id='$client_id', banner_id='$banner_id' WHERE cid="
                             . $cid;
            $database_mess = _AM_WFL_CCATEGORY_MODIFIED;
        }
        if (!$result = $xoopsDB->query($sql)) {
            /** @var \XoopsLogger $logger */
            $logger = \XoopsLogger::getInstance();
            $logger->handleError(E_USER_WARNING, $sql, __FILE__, __LINE__);

            return false;
        }
        redirect_header('category.php', 1, $database_mess);
        break;

    case 'del':

        global $xoopsDB, $xoopsModule;

        $cid    = (isset($_POST['cid']) && is_numeric($_POST['cid'])) ? (int)$_POST['cid'] : (int)$_GET['cid'];
        $ok     = (isset($_POST['ok']) && 1 == $_POST['ok']) ? (int)$_POST['ok'] : 0;
        $mytree = new WflinksXoopsTree($xoopsDB->prefix('wflinks_cat'), 'cid', 'pid');

        if (1 == $ok) {
            // get all subcategories under the specified category
            $subcategories    = $mytree->getAllChildId($cid);
            foreach ($subcategories as $subcategory) {
                // get all links in each subcategory
                $result = $xoopsDB->query('SELECT lid FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE cid=' . $subcategory . ' ');
                // now for each linkload, delete the text data and vote ata associated with the linkload
                while (false !== (list($lid) = $xoopsDB->fetchRow($result))) {
                    $sql = sprintf('DELETE FROM %s WHERE lid = %u', $xoopsDB->prefix('wflinks_votedata'), $lid);
                    $xoopsDB->query($sql);
                    $sql = sprintf('DELETE FROM %s WHERE lid = %u', $xoopsDB->prefix('wflinks_links'), $lid);
                    $xoopsDB->query($sql);

                    // delete comments
                    xoops_comment_delete($xoopsModule->getVar('mid'), $lid);
                }
                // all links for each subcategory are deleted, now delete the subcategory data
                $sql = sprintf('DELETE FROM %s WHERE cid = %u', $xoopsDB->prefix('wflinks_cat'), $subcategory);
                $xoopsDB->query($sql);
                // delete altcat entries
                $sql = sprintf('DELETE FROM %s WHERE cid = %u', $xoopsDB->prefix('wflinks_altcat'), $subcategory);
                $xoopsDB->query($sql);
            }
            // all subcategory and associated data are deleted, now delete category data and its associated data
            $result = $xoopsDB->query('SELECT lid FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE cid=' . $cid . '');
            while (false !== (list($lid) = $xoopsDB->fetchRow($result))) {
                $sql = sprintf('DELETE FROM %s WHERE lid = %u', $xoopsDB->prefix('wflinks_links'), $lid);
                $xoopsDB->query($sql);
                // delete comments
                xoops_comment_delete($xoopsModule->getVar('mid'), $lid);
                $sql = sprintf('DELETE FROM %s WHERE lid = %u', $xoopsDB->prefix('wflinks_votedata'), $lid);
                $xoopsDB->query($sql);
            }
            // delete altcat entries
            $sql = sprintf('DELETE FROM %s WHERE cid = %u', $xoopsDB->prefix('wflinks_altcat'), $cid);
            $xoopsDB->query($sql);
            // delete category
            $sql   = sprintf('DELETE FROM %s WHERE cid = %u', $xoopsDB->prefix('wflinks_cat'), $cid);
            $error = _AM_WFL_DBERROR . ': <br><br>' . $sql;

            // delete group permissions
            xoops_groupperm_deletebymoditem($xoopsModule->getVar('mid'), 'WFLinkCatPerm', $cid);
            if (!$result = $xoopsDB->query($sql)) {
                trigger_error($error, E_USER_ERROR);
            }

            redirect_header('category.php', 1, _AM_WFL_CCATEGORY_DELETED);
        } else {
            xoops_cp_header();
            xoops_confirm(['op' => 'del', 'cid' => $cid, 'ok' => 1], 'category.php', _AM_WFL_CCATEGORY_AREUSURE);
            xoops_cp_footer();
        }
        break;

    case 'modCat':
        $cid = \Xmf\Request::getInt('cid', 0, POST);
        xoops_cp_header();

        createCat($cid);
        xoops_cp_footer();
        break;

    case 'main':
    default:
        xoops_cp_header();

        $adminObject = \Xmf\Module\Admin::getInstance();
        $adminObject->displayNavigation(basename(__FILE__));
        $adminObject->addItemButton(_MI_WFL_ADD_LINK, 'main.php?op=edit', 'add', '');
        $adminObject->addItemButton(_MI_WFL_ADD_CATEGORY, 'category.php', 'add', '');
        $adminObject->displayButton('left', '');

        require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
        $mytree    = new WflinksXoopsTree($xoopsDB->prefix('wflinks_cat'), 'cid', 'pid');
        $sform     = new \XoopsThemeForm(_AM_WFL_CCATEGORY_MODIFY, 'category', xoops_getenv('PHP_SELF'), 'post', true);
        $totalcats = Wflinks\Utility::getTotalCategory();

        if ($totalcats > 0) {
            ob_start();
            $mytree->makeMySelBox('title', 'title');
            $sform->addElement(new \XoopsFormLabel(_AM_WFL_CCATEGORY_MODIFY_TITLE, ob_get_contents()));
            ob_end_clean();
            $dup_tray = new \XoopsFormElementTray('', '');
            $dup_tray->addElement(new \XoopsFormHidden('op', 'modCat'));
            $butt_dup = new \XoopsFormButton('', '', _AM_WFL_BMODIFY, 'submit');
            $butt_dup->setExtra('onclick="this.form.elements.op.value=\'modCat\'"');
            $dup_tray->addElement($butt_dup);
            $butt_move = new \XoopsFormButton('', '', _AM_WFL_BMOVE, 'submit');
            $butt_move->setExtra('onclick="this.form.elements.op.value=\'move\'"');
            $dup_tray->addElement($butt_move);
            $butt_dupct = new \XoopsFormButton('', '', _AM_WFL_BDELETE, 'submit');
            $butt_dupct->setExtra('onclick="this.form.elements.op.value=\'del\'"');
            $dup_tray->addElement($butt_dupct);
            $sform->addElement($dup_tray);
            $sform->display();
        }
        createCat(0);
        require_once __DIR__ . '/admin_footer.php';
        break;
}
