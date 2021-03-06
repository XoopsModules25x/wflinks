<?php
/**
 * File: viewcat.php
 * Module: WF-Links
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

use XoopsModules\Wflinks;

require_once __DIR__ . '/header.php';

/** @var Wflinks\Helper $helper */
$helper = Wflinks\Helper::getInstance();

// Begin Main page Heading etc
$cid        = Wflinks\Utility::cleanRequestVars($_REQUEST, 'cid', 0);
$selectdate = Wflinks\Utility::cleanRequestVars($_REQUEST, 'selectdate', '');
$list       = Wflinks\Utility::cleanRequestVars($_REQUEST, 'list', '');
$cid        = (int)$cid;
$catsort    = $helper->getConfig('sortcats');

$mytree = new Wflinks\Tree($xoopsDB->prefix('wflinks_cat'), 'cid', 'pid');
$arr    = $mytree->getFirstChild($cid, $catsort);

if (is_array($arr) > 0 && !$list && !$selectdate) {
    if (false === Wflinks\Utility::checkGroups($cid)) {
        redirect_header('index.php', 1, _MD_WFL_MUSTREGFIRST);
    }
}
$GLOBALS['xoopsOption']['template_main'] = 'wflinks_viewcat.tpl';
require XOOPS_ROOT_PATH . '/header.php';

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
        if (false === Wflinks\Utility::checkGroups($ele['cid'])) {
            continue;
        }
        $sub_arr         = [];
        $sub_arr         = $mytree->getFirstChild($ele['cid'], 'title');
        $space           = 1;
        $chcount         = 1;
        $infercategories = '';
        foreach ($sub_arr as $sub_ele) {
            // Subitem file count
            $hassubitems = Wflinks\Utility::getTotalItems($sub_ele['cid']);
            // Filter group permissions
            if (true === Wflinks\Utility::checkGroups($sub_ele['cid'])) {
                // If subcategory count > 5 then finish adding subcats to $infercategories and end
                if ($chcount > 5) {
                    $infercategories .= '...';
                    break;
                }
                if ($space > 0) {
                    $infercategories .= ', ';
                }
                $infercategories .= "<a href='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/viewcat.php?cid=' . $sub_ele['cid'] . "'>" . htmlspecialchars($sub_ele['title']) . '</a> (' . $hassubitems['count'] . ')';
                ++$space;
                ++$chcount;
            }
        }
        $totallinks = Wflinks\Utility::getTotalItems($ele['cid']);
        $indicator  = Wflinks\Utility::isNewImage($totallinks['published']);

        // This code is copyright WF-Projects
        // Using this code without our permission or removing this code voids the license agreement
        $_image = $ele['imgurl'] ? urldecode($ele['imgurl']) : '';
        if ('' !== $_image && $helper->getConfig('usethumbs')) {
            $_thumb_image = new Wflinks\ThumbsNails($_image, $helper->getConfig('catimage'), 'thumbs');
            if ($_thumb_image) {
                $_thumb_image->setUseThumbs(1);
                $_thumb_image->setImageType('gd2');
                $_image = $_thumb_image->createThumb($helper->getConfig('shotwidth'), $helper->getConfig('shotheight'), $helper->getConfig('imagequality'), $helper->getConfig('updatethumbs'), $helper->getConfig('keepaspect'));
            }
        }
        $imgurl = "{$helper->getConfig('catimage')}/$_image";
        if (empty($_image) || '' === $_image) {
            $imgurl = $indicator['image'];
        }
        // End
        $xoopsTpl->append(
            'subcategories',
            [
                'title'           => htmlspecialchars($ele['title']),
                'id'              => $ele['cid'],
                'image'           => XOOPS_URL . "/$imgurl",
                'infercategories' => $infercategories,
                'totallinks'      => $totallinks['count'],
                'count'           => $scount,
                'alttext'         => $ele['description'],
            ]
        );
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

$description = $myts->displayTarea($head_arr['description'], $html, $smiley, $xcodes, $images, $breaks);
$xoopsTpl->assign('description', $description);
$xoopsTpl->assign('xoops_pagetitle', $head_arr['title']);
//$xoopsTpl -> assign( 'client_banner', Wflinks\Utility::getBannerFromIdClient($head_arr['client_id']) );

if ($head_arr['client_id'] > 0) {
    $catarray['imageheader'] = Wflinks\Utility::getBannerFromIdClient($head_arr['client_id']);
} elseif ($head_arr['banner_id'] > 0) {
    $catarray['imageheader'] = Wflinks\Utility::getBannerFromIdBanner($head_arr['banner_id']);
} else {
    $catarray['imageheader'] = Wflinks\Utility::getImageHeader();
}
$catarray['letters'] = Wflinks\Utility::getLetters();
$catarray['toolbar'] = Wflinks\Utility::getToolbar();
$xoopsTpl->assign('catarray', $catarray);

// Extract linkload information from database
$xoopsTpl->assign('show_categort_title', true);

$start   = Wflinks\Utility::cleanRequestVars($_REQUEST, 'start', 0);
$orderby = (isset($_REQUEST['orderby'])
            && !empty($_REQUEST['orderby'])) ? Wflinks\Utility::convertOrderByIn(htmlspecialchars($_REQUEST['orderby'], ENT_QUOTES | ENT_HTML5)) : Wflinks\Utility::convertOrderByIn($helper->getConfig('linkxorder'));

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
    $result = $xoopsDB->query($sql, $helper->getConfig('perpage'), $start);

    $sql = 'SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wflinks_links') . $query;
    list($count) = $xoopsDB->fetchRow($xoopsDB->query($sql));

    $list_by = 'selectdate=' . $selectdate;
} elseif ($list) {
    $query = " WHERE title LIKE '$list%' AND (published > 0 AND published <= " . $time . ') AND (expired = 0 OR expired > ' . $time . ') AND offline = 0 AND cid > 0';

    $sql    = 'SELECT * FROM ' . $xoopsDB->prefix('wflinks_links') . $query . ' ORDER BY ' . $orderby;
    $result = $xoopsDB->query($sql, $helper->getConfig('perpage'), $start);

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
    $result = $xoopsDB->query($sql, $helper->getConfig('perpage'), $start);
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
    $order   = Wflinks\Utility::convertOrderByOut($orderby);
    $cid     = $cid;
    $list_by = 'cid=' . $cid . '&orderby=' . $order;
}
$pagenav  = new \XoopsPageNav($count, $helper->getConfig('perpage'), $start, 'start', $list_by);
$page_nav = $pagenav->renderNav();
$istrue   = (isset($page_nav) && !empty($page_nav));
$xoopsTpl->assign('page_nav', $istrue);
$xoopsTpl->assign('pagenav', $page_nav);
$xoopsTpl->assign('module_dir', $xoopsModule->getVar('dirname'));

// Show links
if ($count > 0) {
    $moderate = 0;
    while (false !== ($link_arr = $xoopsDB->fetchArray($result))) {
        $res_type = 0;
        require XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/include/linkloadinfo.php';
        $xoopsTpl->append('wfllink', $link);
    }

    // Show order box
    $xoopsTpl->assign('show_links', false);
    if ($count > 1 && 0 != $cid) {
        $xoopsTpl->assign('show_links', true);
        $orderbyTrans = Wflinks\Utility::convertOrderByTrans($orderby);
        $xoopsTpl->assign('lang_cursortedby', sprintf(_MD_WFL_CURSORTBY, Wflinks\Utility::convertOrderByTrans($orderby)));
        $orderby = Wflinks\Utility::convertOrderByOut($orderby);
    }

    // Screenshots display
    $xoopsTpl->assign('show_screenshot', false);
    if (null !== $helper->getConfig('screenshot') && 1 == $helper->getConfig('screenshot')) {
        $xoopsTpl->assign('shots_dir', $helper->getConfig('screenshots'));
        $xoopsTpl->assign('shotwidth', $helper->getConfig('shotwidth'));
        $xoopsTpl->assign('shotheight', $helper->getConfig('shotheight'));
        $xoopsTpl->assign('show_screenshot', true);
    }
}
unset($link_arr);

require XOOPS_ROOT_PATH . '/footer.php';
