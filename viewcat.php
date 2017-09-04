<?php
/**
 * File: viewcat.php
 * Module: WF-Links
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

require_once __DIR__ . '/header.php';

// Begin Main page Heading etc
$cid        = WflinksUtility::cleanRequestVars($_REQUEST, 'cid', 0);
$selectdate = WflinksUtility::cleanRequestVars($_REQUEST, 'selectdate', '');
$list       = WflinksUtility::cleanRequestVars($_REQUEST, 'list', '');
$cid        = (int)$cid;
$catsort    = $xoopsModuleConfig['sortcats'];

$mytree = new WflinksXoopsTree($xoopsDB->prefix('wflinks_cat'), 'cid', 'pid');
$arr    = $mytree->getFirstChild($cid, $catsort);

if (is_array($arr) > 0 && !$list && !$selectdate) {
    if (false === WflinksUtility::checkGroups($cid)) {
        redirect_header('index.php', 1, _MD_WFL_MUSTREGFIRST);
    }
}
$GLOBALS['xoopsOption']['template_main'] = 'wflinks_viewcat.tpl';
include XOOPS_ROOT_PATH . '/header.php';

global $xoopsModuleConfig;

// Breadcrumb
$pathstring = '<a href="' . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/index.php">' . _MD_WFL_MAIN . '</a>&nbsp;:&nbsp;';
$pathstring .= $mytree->getNicePathFromId($cid, 'title', 'viewcat.php?op=');
$xoopsTpl->assign('category_path', $pathstring);
$xoopsTpl->assign('category_id', $cid);

$time = time();

// Display Sub-categories for selected Category
if (is_array($arr) > 0 && !$list && !$selectdate) {
    $scount = 1;
    foreach ($arr as $ele) {
        if (WflinksUtility::checkGroups($ele['cid']) === false) {
            continue;
        }
        $sub_arr         = array();
        $sub_arr         = $mytree->getFirstChild($ele['cid'], 'title');
        $space           = 1;
        $chcount         = 1;
        $infercategories = '';
        foreach ($sub_arr as $sub_ele) {
            // Subitem file count
            $hassubitems = WflinksUtility::getTotalItems($sub_ele['cid']);
            // Filter group permissions
            if (true === WflinksUtility::checkGroups($sub_ele['cid'])) {
                // If subcategory count > 5 then finish adding subcats to $infercategories and end
                if ($chcount > 5) {
                    $infercategories .= '...';
                    break;
                }
                if ($space > 0) {
                    $infercategories .= ', ';
                }
                $infercategories .= "<a href='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/viewcat.php?cid=' . $sub_ele['cid'] . "'>" . $wfmyts->htmlSpecialCharsStrip($sub_ele['title']) . '</a> (' . $hassubitems['count'] . ')';
                ++$space;
                ++$chcount;
            }
        }
        $totallinks = WflinksUtility::getTotalItems($ele['cid']);
        $indicator  = WflinksUtility::isNewImage($totallinks['published']);

        // This code is copyright WF-Projects
        // Using this code without our permission or removing this code voids the license agreement
        $_image = $ele['imgurl'] ? urldecode($ele['imgurl']) : '';
        if ($_image !== '' && $xoopsModuleConfig['usethumbs']) {
            $_thumb_image = new WfThumbsNails($_image, $xoopsModuleConfig['catimage'], 'thumbs');
            if ($_thumb_image) {
                $_thumb_image->setUseThumbs(1);
                $_thumb_image->setImageType('gd2');
                $_image = $_thumb_image->createThumb($xoopsModuleConfig['shotwidth'], $xoopsModuleConfig['shotheight'], $xoopsModuleConfig['imagequality'], $xoopsModuleConfig['updatethumbs'], $xoopsModuleConfig['keepaspect']);
            }
        }
        $imgurl = "{$xoopsModuleConfig['catimage']}/$_image";
        if (empty($_image) || $_image === '') {
            $imgurl = $indicator['image'];
        }
        // End
        $xoopsTpl->append('subcategories', array(
            'title'           => $wfmyts->htmlSpecialCharsStrip($ele['title']),
            'id'              => $ele['cid'],
            'image'           => XOOPS_URL . "/$imgurl",
            'infercategories' => $infercategories,
            'totallinks'      => $totallinks['count'],
            'count'           => $scount,
            'alttext'         => $ele['description']
        ));
        ++$scount;
    }
}

// Show Description for Category listing
$sql      = 'SELECT title, description, nohtml, nosmiley, noxcodes, noimages, nobreak, imgurl, client_id, banner_id FROM ' . $xoopsDB->prefix('wflinks_cat') . ' WHERE cid =' . $cid;
$head_arr = $xoopsDB->fetchArray($xoopsDB->query($sql));
$html     = $head_arr['nohtml'] ? 0 : 1;
$smiley   = $head_arr['nosmiley'] ? 0 : 1;
$xcodes   = $head_arr['noxcodes'] ? 0 : 1;
$images   = $head_arr['noimages'] ? 0 : 1;
$breaks   = $head_arr['nobreak'] ? 1 : 0;

$description = $wfmyts->displayTarea($head_arr['description'], $html, $smiley, $xcodes, $images, $breaks);
$xoopsTpl->assign('description', $description);
$xoopsTpl->assign('xoops_pagetitle', $head_arr['title']);
//$xoopsTpl -> assign( 'client_banner', WflinksUtility::getBannerFromIdClient($head_arr['client_id']) );

if ($head_arr['client_id'] > 0) {
    $catarray['imageheader'] = WflinksUtility::getBannerFromIdClient($head_arr['client_id']);
} elseif ($head_arr['banner_id'] > 0) {
    $catarray['imageheader'] = WflinksUtility::getBannerFromIdBanner($head_arr['banner_id']);
} else {
    $catarray['imageheader'] = WflinksUtility::getImageHeader();
}
$catarray['letters'] = WflinksUtility::getLetters();
$catarray['toolbar'] = WflinksUtility::getToolbar();
$xoopsTpl->assign('catarray', $catarray);

// Extract linkload information from database
$xoopsTpl->assign('show_categort_title', true);

$start   = WflinksUtility::cleanRequestVars($_REQUEST, 'start', 0);
$orderby = (isset($_REQUEST['orderby'])
            && !empty($_REQUEST['orderby'])) ? WflinksUtility::convertOrderByIn(htmlspecialchars($_REQUEST['orderby'])) : WflinksUtility::convertOrderByIn($xoopsModuleConfig['linkxorder']);

if ($selectdate) {
    $d = date('j', $selectdate);
    $m = date('m', $selectdate);
    $y = date('Y', $selectdate);

    $stat_begin = mktime(0, 0, 0, $m, $d, $y);
    $stat_end   = mktime(23, 59, 59, $m, $d, $y);

    $query = ' WHERE published >= ' . $stat_begin . ' AND published <= ' . $stat_end . '
        AND (expired = 0 OR expired > ' . $time . ')
        AND offline = 0
        AND cid > 0';

    $sql    = 'SELECT * FROM ' . $xoopsDB->prefix('wflinks_links') . $query . ' ORDER BY ' . $orderby;
    $result = $xoopsDB->query($sql, $xoopsModuleConfig['perpage'], $start);

    $sql = 'SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wflinks_links') . $query;
    list($count) = $xoopsDB->fetchRow($xoopsDB->query($sql));

    $list_by = 'selectdate=' . $selectdate;
} elseif ($list) {
    $query = " WHERE title LIKE '$list%' AND (published > 0 AND published <= " . $time . ') AND (expired = 0 OR expired > ' . $time . ') AND offline = 0 AND cid > 0';

    $sql    = 'SELECT * FROM ' . $xoopsDB->prefix('wflinks_links') . $query . ' ORDER BY ' . $orderby;
    $result = $xoopsDB->query($sql, $xoopsModuleConfig['perpage'], $start);

    $sql = 'SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wflinks_links') . $query;
    list($count) = $xoopsDB->fetchRow($xoopsDB->query($sql));
    $list_by = 'list=' . $list;
} else {
    $sql    = 'SELECT DISTINCT a.* FROM '
              . $xoopsDB->prefix('wflinks_links')
              . ' a LEFT JOIN '
              . $xoopsDB->prefix('wflinks_altcat')
              . ' b '
              . ' ON b.lid = a.lid'
              . ' WHERE a.published > 0 AND a.published <= '
              . $time
              . ' AND (a.expired = 0 OR a.expired > '
              . $time
              . ') AND a.offline = 0'
              . ' AND (b.cid=a.cid OR (a.cid='
              . $cid
              . ' OR b.cid='
              . $cid
              . '))'
              . ' ORDER BY '
              . $orderby;
    $result = $xoopsDB->query($sql, $xoopsModuleConfig['perpage'], $start);
    $xoopsTpl->assign('show_categort_title', false);

    $sql2 = 'SELECT COUNT(*) FROM '
            . $xoopsDB->prefix('wflinks_links')
            . ' a LEFT JOIN '
            . $xoopsDB->prefix('wflinks_altcat')
            . ' b '
            . ' ON b.lid = a.lid'
            . ' WHERE a.published > 0 AND a.published <= '
            . $time
            . ' AND (a.expired = 0 OR a.expired > '
            . $time
            . ') AND a.offline = 0'
            . ' AND (b.cid=a.cid OR (a.cid='
            . $cid
            . ' OR b.cid='
            . $cid
            . '))';
    list($count) = $xoopsDB->fetchRow($xoopsDB->query($sql2));
    $order   = WflinksUtility::convertOrderByOut($orderby);
    $cid     = $cid;
    $list_by = 'cid=' . $cid . '&orderby=' . $order;
}
$pagenav  = new XoopsPageNav($count, $xoopsModuleConfig['perpage'], $start, 'start', $list_by);
$page_nav = $pagenav->renderNav();
$istrue   = (isset($page_nav) && !empty($page_nav));
$xoopsTpl->assign('page_nav', $istrue);
$xoopsTpl->assign('pagenav', $page_nav);
$xoopsTpl->assign('module_dir', $xoopsModule->getVar('dirname'));

// Show links
if ($count > 0) {
    $moderate = 0;
    while ($link_arr = $xoopsDB->fetchArray($result)) {
        $res_type = 0;
        require XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/include/linkloadinfo.php';
        $xoopsTpl->append('wfllink', $link);
    }

    // Show order box
    $xoopsTpl->assign('show_links', false);
    if ($count > 1 && $cid != 0) {
        $xoopsTpl->assign('show_links', true);
        $orderbyTrans = WflinksUtility::convertOrderByTrans($orderby);
        $xoopsTpl->assign('lang_cursortedby', sprintf(_MD_WFL_CURSORTBY, WflinksUtility::convertOrderByTrans($orderby)));
        $orderby = WflinksUtility::convertOrderByOut($orderby);
    }

    // Screenshots display
    $xoopsTpl->assign('show_screenshot', false);
    if (isset($xoopsModuleConfig['screenshot']) && $xoopsModuleConfig['screenshot'] == 1) {
        $xoopsTpl->assign('shots_dir', $xoopsModuleConfig['screenshots']);
        $xoopsTpl->assign('shotwidth', $xoopsModuleConfig['shotwidth']);
        $xoopsTpl->assign('shotheight', $xoopsModuleConfig['shotheight']);
        $xoopsTpl->assign('show_screenshot', true);
    }
}
unset($link_arr);

include XOOPS_ROOT_PATH . '/footer.php';
