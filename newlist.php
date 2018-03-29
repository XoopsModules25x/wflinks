<?php
/**
 *
 * Module: WF-links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

use XoopsModules\Wflinks;
/** @var Wflinks\Helper $helper */
$helper = Wflinks\Helper::getInstance();

require_once __DIR__ . '/header.php';

$GLOBALS['xoopsOption']['template_main'] = 'wflinks_newlistindex.tpl';
include XOOPS_ROOT_PATH . '/header.php';

global $xoopsDB, $xoopsModule;

$catarray['imageheader'] = Wflinks\Utility::getImageHeader();
//$catarray['letters'] = Wflinks\Utility::getLetters();
//$catarray['toolbar'] = Wflinks\Utility::getToolbar();
$xoopsTpl->assign('catarray', $catarray);

if (isset($_GET['newlinkshowdays'])) {
    $newlinkshowdays = (int)$_GET['newlinkshowdays'] ?: 7;
    if (7 != $newlinkshowdays) {
        if (14 != $newlinkshowdays) {
            if (30 != $newlinkshowdays) {
                redirect_header('newlist.php?newlinkshowdays=7', 5, _MD_WFL_STOPIT . '<br><img src="' . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/assets/images/icon/security.png">');
            }
        }
    }
    $time_cur      = time();
    $duration      = ($time_cur - (86400 * 30));
    $duration_week = ($time_cur - (86400 * 7));
    $allmonthlinks = 0;
    $allweeklinks  = 0;
    $result        = $xoopsDB->query('SELECT lid, cid, published, updated FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE (published >= ' . $duration . ' AND published <= ' . $time_cur . ') OR updated >= ' . $duration . ' AND (expired = 0 OR expired > ' . $time_cur . ') AND offline = 0');
    while (false !== ($myrow = $xoopsDB->fetchArray($result))) {
        $published = ($myrow['updated'] > 0) ? $myrow['updated'] : $myrow['published'];
        ++$allmonthlinks;
        if ($published > $duration_week) {
            ++$allweeklinks;
        }
    }
    $xoopsTpl->assign('allweeklinks', $allweeklinks);
    $xoopsTpl->assign('allmonthlinks', $allmonthlinks);

    // List Last VARIABLE Days of links
    $newlinkshowdays = (!isset($_GET['newlinkshowdays'])) ? 7 : $_GET['newlinkshowdays'];
    $xoopsTpl->assign('newlinkshowdays', (int)$newlinkshowdays);

    $dailylinks = [];
    for ($i = 0; $i < $newlinkshowdays; ++$i) {
        $key                               = $newlinkshowdays - $i - 1;
        $time                              = $time_cur - (86400 * $key);
        $dailylinks[$key]['newlinkdayRaw'] = $time;
        $dailylinks[$key]['newlinkView']   = formatTimestamp($time, $helper->getConfig('dateformat'));
        $dailylinks[$key]['totallinks']    = 0;
    }
}

$duration = ($time_cur - (86400 * ((int)$newlinkshowdays - 1)));
$result   = $xoopsDB->query('SELECT lid, cid, published, updated FROM '
                            . $xoopsDB->prefix('wflinks_links')
                            . ' WHERE (published > '
                            . $duration
                            . ' AND published <= '
                            . $time_cur
                            . ') OR (updated >= '
                            . $duration
                            . ' AND updated <= '
                            . $time_cur
                            . ') AND (expired = 0 OR expired > '
                            . $time_cur
                            . ') AND offline = 0');
while (false !== ($myrow = $xoopsDB->fetchArray($result))) {
    $published = ($myrow['updated'] > 0) ? $myrow['updated'] : $myrow['published'];
    $d         = date('j', $published);
    $m         = date('m', $published);
    $y         = date('Y', $published);
    $key       = (int)(($time_cur - mktime(0, 0, 0, $m, $d, $y)) / 86400);
    $dailylinks[$key]['totallinks']++;
}
ksort($dailylinks);
reset($dailylinks);
$xoopsTpl->assign('dailylinks', $dailylinks);
unset($dailylinks);

$mytree = new WflinksXoopsTree($xoopsDB->prefix('wflinks_cat'), 'cid', 'pid');
$sql    = 'SELECT * FROM ' . $xoopsDB->prefix('wflinks_links');
$sql    .= 'WHERE   (published > 0 AND published <= ' . $time_cur . ')
                OR
        (updated > 0 AND updated <= ' . $time_cur . ')
        AND
        (expired = 0 OR expired > ' . $time_cur . ')
        AND
        offline = 0
        ORDER BY ' . $helper->getConfig('linkxorder');
$result = $xoopsDB->query($sql, 10, 0);
while (false !== ($link_arr = $xoopsDB->fetchArray($result))) {
    include XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/include/linkloadinfo.php';
}

// Screenshots display
if ($helper->getConfig('screenshot')) {
    $xoopsTpl->assign('shots_dir', $helper->getConfig('screenshots'));
    $xoopsTpl->assign('shotwidth', $helper->getConfig('shotwidth'));
    $xoopsTpl->assign('shotheight', $helper->getConfig('shotheight'));
    $xoopsTpl->assign('show_screenshot', true);
}
$xoopsTpl->assign('module_dir', $xoopsModule->getVar('dirname'));
include XOOPS_ROOT_PATH . '/footer.php';
