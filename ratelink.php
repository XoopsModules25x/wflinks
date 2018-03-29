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

global $wfmyts, $xoTheme;

// Check if linkload POSTER is voting (UNLESS Anonymous users allowed to post)
$lid = Wflinks\Utility::cleanRequestVars($_REQUEST, 'lid', 0);
$lid = (int)$lid;

$ip         = getenv('REMOTE_ADDR');
$ratinguser = (!is_object($xoopsUser)) ? 0 : $xoopsUser->getVar('uid');

if (0 != $ratinguser) {
    $result = $xoopsDB->query('SELECT cid, submitter FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE lid=' . $lid);
    while (false !== (list($cid, $ratinguserDB) = $xoopsDB->fetchRow($result))) {
        if ($ratinguserDB == $ratinguser) {
            $ratemessage = _MD_WFL_CANTVOTEOWN;
            redirect_header('singlelink.php?cid=' . (int)$cid . '&amp;lid=' . $lid, 4, $ratemessage);
        }
    }
    // Check if REG user is trying to vote twice.
    $result = $xoopsDB->query('SELECT cid, ratinguser FROM ' . $xoopsDB->prefix('wflinks_votedata') . ' WHERE lid=' . $lid);
    while (false !== (list($cid, $ratinguserDB) = $xoopsDB->fetchRow($result))) {
        if ($ratinguserDB == $ratinguser) {
            $ratemessage = _MD_WFL_VOTEONCE;
            redirect_header('singlelink.php?cid=' . (int)$cid . '&amp;lid=' . $lid, 4, $ratemessage);
        }
    }
} else {
    // Check if ANONYMOUS user is trying to vote more than once per day.
    $yesterday = (time() - (86400 * $anonwaitdays));
    $result    = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wflinks_votedata') . ' WHERE lid=' . $lid . ' AND ratinguser=0 AND ratinghostname=' . $ip . '  AND ratingtimestamp > ' . $yesterday);
    list($anonvotecount) = $xoopsDB->fetchRow($result);
    if ($anonvotecount >= 1) {
        redirect_header('singlelink.php?cid=' . (int)$cid . '&amp;lid=' . $lid, 4, _MD_WFL_VOTEONCE);
    }
}

if (!empty($_POST['submit'])) {
    $ratinguser = (!is_object($xoopsUser)) ? 0 : $xoopsUser->getVar('uid');
    // Make sure only 1 anonymous from an IP in a single day.
    $anonwaitdays = 1;
    $ip           = getenv('REMOTE_ADDR');
    $lid          = Wflinks\Utility::cleanRequestVars($_REQUEST, 'lid', 0);
    $cid          = Wflinks\Utility::cleanRequestVars($_REQUEST, 'cid', 0);
    $rating       = Wflinks\Utility::cleanRequestVars($_REQUEST, 'rating', 0);
    $title        = $wfmyts->addSlashes(trim($_POST['title']));
    $lid          = (int)$lid;
    $cid          = (int)$cid;
    $rating       = (int)$rating;
    // Check if Rating is Null
    if ('--' == $rating) {
        redirect_header('ratelink.php?cid=' . $cid . '&amp;lid=' . $lid, 4, _MD_WFL_NORATING);
    }
    // All is well.  Add to Line Item Rate to DB.
    $newid    = $xoopsDB->genId($xoopsDB->prefix('wflinks_votedata') . '_ratingid_seq');
    $datetime = time();
    $sql      = sprintf('INSERT INTO %s (ratingid, lid, ratinguser, rating, ratinghostname, ratingtimestamp, title) VALUES (%u, %u, %u, %u, %s, %u, %s)', $xoopsDB->prefix('wflinks_votedata'), $newid, $lid, $ratinguser, $rating, $xoopsDB->quoteString($ip), $datetime, $xoopsDB->quoteString($title));
    if (!$result = $xoopsDB->query($sql)) {
        $ratemessage = _MD_WFL_ERROR;
    } else {
        // All is well.  Calculate Score & Add to Summary (for quick retrieval & sorting) to DB.
        Wflinks\Utility::updateRating($lid);
        $ratemessage = _MD_WFL_VOTEAPPRE . '<br>' . sprintf(_MD_WFL_THANKYOU, $xoopsConfig['sitename']);
    }
    redirect_header('singlelink.php?cid=' . $cid . '&amp;lid=' . $lid, 4, $ratemessage);
} else {
    $GLOBALS['xoopsOption']['template_main'] = 'wflinks_ratelink.tpl';
    include XOOPS_ROOT_PATH . '/header.php';

    $catarray['imageheader'] = Wflinks\Utility::getImageHeader();
    $cid                     = Wflinks\Utility::cleanRequestVars($_REQUEST, 'cid', 0);
    $cid                     = (int)$cid;

    $catarray['imageheader'] = Wflinks\Utility::getImageHeader();
    $catarray['letters']     = Wflinks\Utility::getLetters();
    $catarray['toolbar']     = Wflinks\Utility::getToolbar();
    $xoopsTpl->assign('catarray', $catarray);

    $result = $xoopsDB->query('SELECT title FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE lid=' . $lid);
    list($title) = $xoopsDB->fetchRow($result);
    $xoopsTpl->assign('link', ['id' => $lid, 'cid' => $cid, 'title' => $wfmyts->htmlSpecialCharsStrip($title)]);

    if (is_object($xoTheme)) {
        $xoTheme->addMeta('meta', 'robots', 'noindex,nofollow');
    } else {
        $xoopsTpl->assign('xoops_meta_robots', 'noindex,nofollow');
    }

    $xoopsTpl->assign('module_dir', $xoopsModule->getVar('dirname'));
    include XOOPS_ROOT_PATH . '/footer.php';
}

if (is_object($xoTheme)) {
    $xoTheme->addMeta('meta', 'robots', 'noindex,nofollow');
} else {
    $xoopsTpl->assign('xoops_meta_robots', 'noindex,nofollow');
}

$xoopsTpl->assign('module_dir', $xoopsModule->getVar('dirname'));
include XOOPS_ROOT_PATH . '/footer.php';
