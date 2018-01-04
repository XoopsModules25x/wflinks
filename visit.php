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

require_once __DIR__ . '/header.php';

global $xoopsModuleConfig;

$agreed = Wflinks\Utility::cleanRequestVars($_REQUEST, 'agree', 0);
$cid    = Wflinks\Utility::cleanRequestVars($_REQUEST, 'cid', 0);
$lid    = Wflinks\Utility::cleanRequestVars($_REQUEST, 'lid', 0);
$cid    = (int)$cid;
$lid    = (int)$lid;
$agreed = (int)$agreed;

$sql2 = 'SELECT count(*) FROM '
        . $xoopsDB->prefix('wflinks_links')
        . ' a LEFT JOIN '
        . $xoopsDB->prefix('wflinks_altcat')
        . ' b '
        . ' ON b.lid = a.lid'
        . ' WHERE a.published > 0 AND a.published <= '
        . time()
        . ' AND (a.expired = 0 OR a.expired > '
        . time()
        . ') AND a.offline = 0'
        . ' AND (b.cid=a.cid OR (a.cid='
        . $cid
        . ' OR b.cid='
        . $cid
        . '))';
list($count) = $xoopsDB->fetchRow($xoopsDB->query($sql2));

if (0 == $count && false === Wflinks\Utility::checkGroups($cid)) {
    redirect_header('index.php', 1, _MD_WFL_MUSTREGFIRST);
}

if (0 == $agreed && $xoopsModuleConfig['showlinkdisclaimer']) {
    $GLOBALS['xoopsOption']['template_main'] = 'wflinks_disclaimer.tpl';
    include XOOPS_ROOT_PATH . '/header.php';

    $xoopsTpl->assign('image_header', Wflinks\Utility::getImageHeader());
    $xoopsTpl->assign('linkdisclaimer', $wfmyts->displayTarea($xoopsModuleConfig['linkdisclaimer'], 1, 1, 1, 1, 1));
    $xoopsTpl->assign('cancel_location', XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/index.php');
    $xoopsTpl->assign('agree_location', XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/visit.php?agree=1&amp;lid=' . $lid . '&amp;cid=' . $cid);
    $xoopsTpl->assign('link_disclaimer', true);

    include XOOPS_ROOT_PATH . '/footer.php';
    exit();
}

$url    = '';
$sql    = 'UPDATE ' . $xoopsDB->prefix('wflinks_links') . ' SET hits=hits+1 WHERE lid=' . $lid;
$result = $xoopsDB->queryF($sql);

$sql = 'SELECT url FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE lid=' . $lid;
if (!$result = $xoopsDB->queryF($sql)) {
    echo "<br><div style='text-align: center;'>" . Wflinks\Utility::getImageHeader() . '</div>';
    reportBroken($lid);
} else {
    list($url) = $xoopsDB->fetchRow($result);
    $url = htmlspecialchars(preg_replace('/javascript:/si', 'java script:', $url), ENT_QUOTES);
}

if (!empty($url)) {
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0', false);
    // HTTP/1.0
    header('Pragma: no-cache');
    // Date in the past
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    // always modified
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
    echo '<html><head><meta http-equiv="Refresh" content="0; URL=' . $url . '"></meta></head><body></body></html>';
}
