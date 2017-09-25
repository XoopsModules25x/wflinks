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

require_once __DIR__ . '/header.php';

$start = WflinksUtility::cleanRequestVars($_REQUEST, 'start', 0);
$start = (int)$start;

$GLOBALS['xoopsOption']['template_main'] = 'wflinks_index.tpl';
include XOOPS_ROOT_PATH . '/header.php';

global $xoopsModuleConfig;
$mytree = new WflinksXoopsTree($xoopsDB->prefix('wflinks_cat'), 'cid', 'pid');

// Begin Main page Heading etc
$sql      = 'SELECT * FROM ' . $xoopsDB->prefix('wflinks_indexpage');
$head_arr = $xoopsDB->fetchArray($xoopsDB->query($sql));

$catarray['imageheader']      = WflinksUtility::getImageHeader($head_arr['indeximage'], $head_arr['indexheading']);
$catarray['indexheading']     = $wfmyts->displayTarea($head_arr['indexheading']);
$catarray['indexheaderalign'] = $wfmyts->htmlSpecialCharsStrip($head_arr['indexheaderalign']);
$catarray['indexfooteralign'] = $wfmyts->htmlSpecialCharsStrip($head_arr['indexfooteralign']);

$html   = $head_arr['nohtml'] ? 0 : 1;
$smiley = $head_arr['nosmiley'] ? 0 : 1;
$xcodes = $head_arr['noxcodes'] ? 0 : 1;
$images = $head_arr['noimages'] ? 0 : 1;
$breaks = $head_arr['nobreak'] ? 1 : 0;

$catarray['indexheader'] = $wfmyts->displayTarea($head_arr['indexheader'], $html, $smiley, $xcodes, $images, $breaks);
$catarray['indexfooter'] = $wfmyts->displayTarea($head_arr['indexfooter'], $html, $smiley, $xcodes, $images, $breaks);
$catarray['letters']     = WflinksUtility::getLetters();
$catarray['toolbar']     = WflinksUtility::getToolbar();
$xoopsTpl->assign('catarray', $catarray);

// End main page Headers
$count   = 1;
$chcount = 0;
$countin = 0;

// Begin Main page linkload info
$listings  = WflinksUtility::getTotalItems();
$total_cat = WflinksUtility::getTotalCategory();  // get total amount of categories
$catsort   = $xoopsModuleConfig['sortcats'];
$sql       = 'SELECT * FROM ' . $xoopsDB->prefix('wflinks_cat') . ' WHERE pid=0 ORDER BY ' . $catsort;
$result    = $xoopsDB->query($sql);
while ($myrow = $xoopsDB->fetchArray($result)) {
    ++$countin;
    $subtotallinkload = 0;
    $totallinkload    = WflinksUtility::getTotalItems($myrow['cid'], 1);
    $indicator        = WflinksUtility::isNewImage($totallinkload['published']);
    if (WflinksUtility::checkGroups($myrow['cid'])) {
        $title = $wfmyts->htmlSpecialCharsStrip($myrow['title']);

        $arr = [];
        $arr = $mytree->getFirstChild($myrow['cid'], 'title');

        $space         = 1;
        $chcount       = 1;
        $subcategories = '';
        foreach ($arr as $ele) {
            if (true === WflinksUtility::checkGroups($ele['cid'])) {
                if (1 == $xoopsModuleConfig['subcats']) {
                    $chtitle = $wfmyts->htmlSpecialCharsStrip($ele['title']);
                    if ($chcount > 5) {
                        $subcategories .= '...';
                        break;
                    }
                    if ($space > 0) {
                        $subcategories .= "<a href='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/viewcat.php?cid=' . $ele['cid'] . "'>" . $chtitle . '</a><br>';
                    }
                    ++$space;
                    ++$chcount;
                }
            }
        }

        // This code is copyright WF-Projects
        // Using this code without our permission or removing this code voids the license agreement
        $_image = $myrow['imgurl'] ? urldecode($myrow['imgurl']) : '';
        if ('' !== $_image && $xoopsModuleConfig['usethumbs']) {
            $_thumb_image = new WfThumbsNails($_image, $xoopsModuleConfig['catimage'], 'thumbs');
            if ($_thumb_image) {
                $_thumb_image->setUseThumbs(1);
                $_thumb_image->setImageType('gd2');
                $_image = $_thumb_image->createThumb($xoopsModuleConfig['imagequality'], $xoopsModuleConfig['updatethumbs'], $xoopsModuleConfig['keepaspect']);
            }
        }
        $imgurl = "{$xoopsModuleConfig['catimage']}/$_image";
        if (empty($_image) || '' === $_image) {
            $imgurl = $indicator['image'];
        }
        // End

        $xoopsTpl->append('categories', [
            'image'         => XOOPS_URL . "/$imgurl",
            'id'            => $myrow['cid'],
            'title'         => $title,
            'subcategories' => $subcategories,
            'totallinks'    => $totallinkload['count'],
            'count'         => $count,
            'alttext'       => $myrow['description']
        ]);
        ++$count;
    }
}
switch ($total_cat) {
    case '1':
        $lang_thereare = _MD_WFL_THEREIS;
        break;
    default:
        $lang_thereare = _MD_WFL_THEREARE;
        break;
}
$xoopsTpl->assign('lang_thereare', sprintf($lang_thereare, $total_cat, $listings['count']));
$xoopsTpl->assign('module_dir', $xoopsModule->getVar('dirname'));

// Screenshots display
if (isset($xoopsModuleConfig['screenshot']) && 1 == $xoopsModuleConfig['screenshot']) {
    $xoopsTpl->assign('shots_dir', $xoopsModuleConfig['screenshots']);
    $xoopsTpl->assign('shotwidth', $xoopsModuleConfig['shotwidth']);
    $xoopsTpl->assign('shotheight', $xoopsModuleConfig['shotheight']);
    $xoopsTpl->assign('show_screenshot', true);
}

$time = time();

// Show Latest Listings on Index Page
$sql       = $xoopsDB->query('SELECT lastlinksyn, lastlinkstotal FROM ' . $xoopsDB->prefix('wflinks_indexpage'));
$lastlinks = $xoopsDB->fetchArray($sql);

if (1 == $lastlinks['lastlinksyn'] && $lastlinks['lastlinkstotal'] > 0) {
    $result = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE published > 0
                                AND published <= ' . $time . '
                                AND (expired = 0 OR expired > ' . $time . ')
                                AND offline = 0
                                ORDER BY published DESC', 0, 0);
    list($count) = $xoopsDB->fetchRow($result);

    $count = (($count > $lastlinks['lastlinkstotal'])
              && (0 != $lastlinks['lastlinkstotal'])) ? $lastlinks['lastlinkstotal'] : $count;
    $limit = (($start + $xoopsModuleConfig['perpage']) > $count) ? ($count - $start) : $xoopsModuleConfig['perpage'];

    $result = $xoopsDB->query('SELECT * FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE published > 0
                                AND published <= ' . $time . '
                                AND (expired = 0 OR expired > ' . $time . ')
                                AND offline = 0
                                ORDER BY published DESC', $limit, $start);
    while ($link_arr = $xoopsDB->fetchArray($result)) {
        $res_type = 0;
        $moderate = 0;
        $cid      = $link_arr['cid'];
        require XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/include/linkloadinfo.php';
        $xoopsTpl->append('link', $link);
    }

    $pagenav = new XoopsPageNav($count, $xoopsModuleConfig['perpage'], $start, 'start');
    $xoopsTpl->assign('pagenav', $pagenav->renderNav());

    $xoopsTpl->assign('showlatest', $lastlinks['lastlinksyn']);
}

include XOOPS_ROOT_PATH . '/footer.php';
