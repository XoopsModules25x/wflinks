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

require_once __DIR__ . '/admin_header.php';

global $imageArray, $xoopsModule;

$op  = WflinksUtility::cleanRequestVars($_REQUEST, 'op', '');
$lid = WflinksUtility::cleanRequestVars($_REQUEST, 'lid', 0);

switch (strtolower($op)) {
    case 'updatenotice':
        $ack = WflinksUtility::cleanRequestVars($_REQUEST, 'ack', 0);
        $con = WflinksUtility::cleanRequestVars($_REQUEST, 'con', 1);

        if ($ack && !$con) {
            $acknowledged = (0 == $ack) ? 1 : 0;
            $sql          = 'UPDATE ' . $xoopsDB->prefix('wflinks_broken') . ' SET acknowledged=' . $acknowledged;
            if (0 == $acknowledged) {
                $sql .= ', confirmed=0 ';
            }
            $sql .= ' WHERE lid=' . $lid;
            if (!$result = $xoopsDB->queryF($sql)) {
                XoopsErrorHandler_HandleError(E_USER_WARNING, $sql, __FILE__, __LINE__);

                return false;
            }
            //  $update_mess = _AM_WFL_BROKEN_NOWACK;
            redirect_header('brokenlink.php?op=default', 1, _AM_WFL_BROKEN_NOWACK);
        }

        if ($con) {
            $confirmed = (0 == $con) ? 1 : 0;
            $sql       = 'UPDATE ' . $xoopsDB->prefix('wflinks_broken') . ' SET confirmed=' . $confirmed;
            if (1 == $confirmed) {
                $sql .= ', acknowledged=' . $confirmed;
            }
            $sql .= ' WHERE lid=' . $lid;
            if (!$result = $xoopsDB->queryF($sql)) {
                XoopsErrorHandler_HandleError(E_USER_WARNING, $sql, __FILE__, __LINE__);

                return false;
            }
            // $update_mess = _AM_WFL_BROKEN_NOWCON;
            redirect_header('brokenlink.php?op=default', 1, _AM_WFL_BROKEN_NOWCON);
        }
        //  redirect_header( "brokenlink.php?op=default", 1, $update_mess );
        break;

    case 'delbrokenlinks':
        $xoopsDB->queryF('DELETE FROM ' . $xoopsDB->prefix('wflinks_broken') . ' WHERE lid=' . $lid);
        $xoopsDB->queryF('DELETE FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE lid=' . $lid);
        redirect_header('brokenlink.php?op=default', 1, _AM_WFL_BROKENFILEDELETED);

        break;

    case 'ignorebrokenlinks':
        $xoopsDB->queryF('DELETE FROM ' . $xoopsDB->prefix('wflinks_broken') . ' WHERE lid=' . $lid);
        redirect_header('brokenlink.php?op=default', 1, _AM_WFL_BROKEN_FILEIGNORED);
        break;

    default:
        $result           = $xoopsDB->query('SELECT * FROM ' . $xoopsDB->prefix('wflinks_broken') . ' ORDER BY reportid');
        $totalbrokenlinks = $xoopsDB->getRowsNum($result);

        xoops_cp_header();

        echo "
        <fieldset>
         <legend style='font-weight: bold; color: #0A3760;'>" . _AM_WFL_BROKEN_REPORTINFO . "</legend>\n
          <div style='padding: 8px;'>" . _AM_WFL_BROKEN_REPORTSNO . "&nbsp;<b>$totalbrokenlinks</b><div>\n
          <div style='padding: 8px;'>\n
           <ul>
            <li>" . $imageArray['ignore'] . ' ' . _AM_WFL_BROKEN_IGNOREDESC . "</li>\n
            <li>" . $imageArray['editimg'] . ' ' . _AM_WFL_BROKEN_EDITDESC . '</li>
            <li>' . $imageArray['deleteimg'] . ' ' . _AM_WFL_BROKEN_DELETEDESC . "</li>\n
           </ul>
          </div>\n
         </fieldset>
        <br>\n

        <table width='100%' border='0' cellspacing='1' cellpadding='2' class='outer'>\n
        <tr class='center;'>\n
        <th width='3%' class='center;'>" . _AM_WFL_BROKEN_ID . "</th>\n
        <th width='35%' style='text-align: left;'>" . _AM_WFL_BROKEN_TITLE . "</th>\n
        <th>" . _AM_WFL_BROKEN_REPORTER . "</th>\n
        <th>" . _AM_WFL_BROKEN_FILESUBMITTER . "</th>\n
        <th>" . _AM_WFL_BROKEN_DATESUBMITTED . "</th>\n
        <th>" . _AM_WFL_BROKEN_ACKNOWLEDGED . "</th>\n
        <th>" . _AM_WFL_BROKEN_DCONFIRMED . "</th>\n
        <th style='text-align: center; width: 6%; white-space: nowrap;'>" . _AM_WFL_BROKEN_ACTION . "</th>\n
        </tr>\n";

        if (0 == $totalbrokenlinks) {
            echo "<tr class='center;'><td class='center;' class='head' colspan='8'>" . _AM_WFL_BROKEN_NOFILEMATCH . '</td></tr>';
        } else {
            while (list($reportid, $lid, $sender, $ip, $date, $confirmed, $acknowledged) = $xoopsDB->fetchRow($result)) {
                $result2 = $xoopsDB->query('SELECT cid, title, url, submitter FROM ' . $xoopsDB->prefix('wflinks_links') . " WHERE lid=$lid");
                list($cid, $linkshowname, $url, $submitter) = $xoopsDB->fetchRow($result2);
                if (0 != $sender) {
                    $result3 = $xoopsDB->query('SELECT uname, email FROM ' . $xoopsDB->prefix('users') . ' WHERE uid=' . $sender . '');
                    list($sendername, $email) = $xoopsDB->fetchRow($result3);
                }
                $result4 = $xoopsDB->query('SELECT uname, email FROM ' . $xoopsDB->prefix('users') . ' WHERE uid=' . $sender . '');
                list($ownername, $owneremail) = $xoopsDB->fetchRow($result4);

                $ack_image = $acknowledged ? $imageArray['ack_yes'] : $imageArray['ack_no'];
                $con_image = $confirmed ? $imageArray['con_yes'] : $imageArray['con_no'];

                echo "<tr class='center;'>\n";
                echo "<td class='head'>$reportid</td>\n";
                echo "<td class='even' style='text-align: left;'><a href='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/singlelink.php?cid=' . $cid . '&amp;lid=' . $lid . "' target='_blank'>" . $linkshowname . "</a></td>\n";

                if ('' === $email) {
                    echo "<td class='even'>$sendername ($ip)";
                } else {
                    echo "<td class='even'><a href='mailto:$email'>$sendername</a> ($ip)";
                }
                if ('' === $owneremail) {
                    echo "<td class='even'>$ownername";
                } else {
                    echo "<td class='even'><a href='mailto:$owneremail'>$ownername</a>";
                }
                echo "</td>\n";
                echo "<td class='even' class='center;'>" . formatTimestamp($date, $xoopsModuleConfig['dateformatadmin']) . "</td>\n";
                echo "<td class='even'><a href='brokenlink.php?op=updateNotice&amp;lid=" . $lid . '&ack=' . (int)$acknowledged . "'>" . $ack_image . " </a></td>\n";
                echo "<td class='even'><a href='brokenlink.php?op=updateNotice&amp;lid=" . $lid . '&con=' . (int)$confirmed . "'>" . $con_image . "</a></td>\n";
                echo "<td class='even' class='center;' nowrap>\n";
                echo "<a href='brokenlink.php?op=ignoreBrokenlinks&amp;lid=" . $lid . "'>" . $imageArray['ignore'] . "</a>\n";
                echo "<a href='main.php?op=edit&amp;lid=" . $lid . "'>" . $imageArray['editimg'] . "</a>\n";
                echo "<a href='brokenlink.php?op=delBrokenlinks&amp;lid=" . $lid . "'>" . $imageArray['deleteimg'] . "</a>\n";
                echo "</td></tr>\n";
            }
        }
        echo '</table>';
}
require_once __DIR__ . '/admin_footer.php';
