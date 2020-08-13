<?php
/**
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

use XoopsModules\Wflinks;

require_once __DIR__ . '/admin_header.php';

/** @var Wflinks\Helper $helper */
$helper = Wflinks\Helper::getInstance();

$op        = Wflinks\Utility::cleanRequestVars($_REQUEST, 'op', '');
$lid       = Wflinks\Utility::cleanRequestVars($_REQUEST, 'lid', '');
$requestid = Wflinks\Utility::cleanRequestVars($_REQUEST, 'requestid', 0);

switch (mb_strtolower($op)) {
    case 'approve':

        global $xoopsModule;
        $sql = 'SELECT cid, title, notifypub FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE lid=' . $lid;
        if (!$result = $xoopsDB->query($sql)) {
            /** @var \XoopsLogger $logger */
            $logger = \XoopsLogger::getInstance();
            $logger->handleError(E_USER_WARNING, $sql, __FILE__, __LINE__);

            return false;
        }
        list($cid, $title, $notifypub) = $xoopsDB->fetchRow($result);

        // Update the database
        $time      = time();
        $publisher = $xoopsUser->getVar('uname');
        $xoopsDB->queryF('UPDATE ' . $xoopsDB->prefix('wflinks_links') . " SET published='$time.', status='1', publisher='$publisher' WHERE lid=" . $lid);

        $tags              = [];
        $tags['LINK_NAME'] = $title;
        $tags['LINK_URL']  = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/singlelink.php?cid=' . $cid . '&amp;lid=' . $lid;

        $sql = 'SELECT title FROM ' . $xoopsDB->prefix('wflinks_cat') . ' WHERE cid=' . $cid;
        if ($result = $xoopsDB->query($sql)) {
            $row                   = $xoopsDB->fetchArray($result);
            $tags['CATEGORY_NAME'] = $row['title'];
            $tags['CATEGORY_URL']  = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/viewcat.php?cid=' . $cid;
            $notificationHandler   = xoops_getHandler('notification');
            $notificationHandler->triggerEvent('global', 0, 'new_link', $tags);
            $notificationHandler->triggerEvent('category', $cid, 'new_link', $tags);
            if (1 == (int)$notifypub) {
                $notificationHandler->triggerEvent('link', $lid, 'approve', $tags);
            }
        } else {
            $logger->handleError(E_USER_WARNING, $sql, __FILE__, __LINE__);
        }
        redirect_header('newlinks.php', 1, _AM_WFL_SUB_NEWFILECREATED);
        break;
    case 'main':
    default:

        xoops_load('XoopsUserUtility');
        $start = Wflinks\Utility::cleanRequestVars($_REQUEST, 'start', 0);
        $sql   = 'SELECT * FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE published = 0 ORDER BY lid DESC';
        if (!$result = $xoopsDB->query($sql)) {
            $logger->handleError(E_USER_WARNING, $sql, __FILE__, __LINE__);

            return false;
        }
        $new_array       = $xoopsDB->query($sql, $helper->getConfig('admin_perpage'), $start);
        $new_array_count = $xoopsDB->getRowsNum($xoopsDB->query($sql));

        xoops_cp_header();

        echo "<fieldset><legend style='font-weight: bold; color: #0A3760;'>" . _AM_WFL_SUB_FILESWAITINGINFO . "</legend>\n";
        echo "<div style='padding: 8px;'>" . _AM_WFL_SUB_FILESWAITINGVALIDATION . "&nbsp;<b>$new_array_count</b><div>\n";
        echo "<div div style='padding: 8px;'>\n";
        echo '<li>' . $imageArray['approve'] . ' ' . _AM_WFL_SUB_APPROVEWAITINGFILE . "\n";
        echo '<li>' . $imageArray['editimg'] . ' ' . _AM_WFL_SUB_EDITWAITINGFILE . "\n";
        echo '<li>' . $imageArray['deleteimg'] . ' ' . _AM_WFL_SUB_DELETEWAITINGFILE . "</div>\n";
        echo "</fieldset><br>\n";

        echo "<table width='100%' cellspacing='1' class='outer'>\n";
        echo "<tr style='text-align:center;'>\n";
        echo "<th style='text-align:center; width:3%;'>" . _AM_WFL_MINDEX_ID . "</th>\n";
        echo "<th style='text-align: left;' width='30%'>" . _AM_WFL_MINDEX_TITLE . "</th>\n";
        echo "<th width='15%'>" . _AM_WFL_MINDEX_POSTER . "</th>\n";
        echo "<th width='15%'>" . _AM_WFL_MINDEX_SUBMITTED . "</th>\n";
        echo "<th width='7%'>" . _AM_WFL_MINDEX_ACTION . "</th>\n";
        echo "</tr>\n";
        if ($new_array_count > 0) {
            while (false !== ($new = $xoopsDB->fetchArray($new_array))) {
                $lid       = (int)$new['lid'];
                $rating    = number_format($new['rating'], 2);
                $title     = htmlspecialchars($new['title']);
                $url       = urldecode(htmlspecialchars($new['url']));
                $logourl   = htmlspecialchars($new['screenshot']);
                $submitter = \XoopsUserUtility::getUnameFromId($new['submitter']);
                $datetime  = formatTimestamp($new['date'], $helper->getConfig('dateformatadmin'));

                $icon = $new['published'] ? $approved : "<a href='newlinks.php?op=approve&amp;lid=" . $lid . "'>" . $imageArray['approve'] . '</a>&nbsp;';
                $icon .= "<a href='main.php?op=edit&amp;lid=" . $lid . "'>" . $imageArray['editimg'] . '</a>&nbsp;';
                $icon .= "<a href='main.php?op=delete&amp;lid=" . $lid . "'>" . $imageArray['deleteimg'] . '</a>';

                echo "<tr>\n";
                echo "<td class='head' style='text-align:center;'>$lid</td>\n";
                echo "<td class='even' nowrap><a href='newlinks.php?op=edit&amp;lid=" . $lid . "'>$title</a></td>\n";
                echo "<td class='even' style='text-align:center;' nowrap>$submitter</td>\n";
                echo "<td class='even' style='text-align:center;'>$datetime</td>\n";
                echo "<td class='even' style='text-align:center;' nowrap>$icon</td>\n";
                echo "</tr>\n";
            }
        } else {
            echo "<tr><td class='head' colspan='6'>" . _AM_WFL_SUB_NOFILESWAITING . '</td></tr>';
        }
        echo "</table>\n";

        require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        //        $page = ( $new_array_count > $helper->getConfig('admin_perpage') ) ? _AM_WFL_MINDEX_PAGE : '';
        $pagenav = new \XoopsPageNav($new_array_count, $helper->getConfig('admin_perpage'), $start, 'start');
        echo '<div align="right" style="padding: 8px;">' . $pagenav->renderNav() . '</div>';
        require_once __DIR__ . '/admin_footer.php';
        break;
}
