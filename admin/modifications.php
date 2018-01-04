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

global $mytree, $xoopsModuleConfig;
xoops_load('XoopsUserUtility');
$op        = Wflinks\Utility::cleanRequestVars($_REQUEST, 'op', '');
$requestid = Wflinks\Utility::cleanRequestVars($_REQUEST, 'requestid', 0);

switch (strtolower($op)) {
    case 'listmodreqshow':

        xoops_cp_header();

        $sql       = 'SELECT modifysubmitter, requestid, lid, cid, title, url, description, screenshot, forumid, country, keywords, item_tag, googlemap, yahoomap, multimap, street1, street2, town, state, zip, tel, fax, voip, mobile, email, vat FROM '
                     . $xoopsDB->prefix('wflinks_mod')
                     . ' WHERE requestid='
                     . $requestid;
        $mod_array = $xoopsDB->fetchArray($xoopsDB->query($sql));
        unset($sql);

        $sql        = 'SELECT submitter, lid, cid, title, url, description, screenshot, forumid, country, keywords, item_tag, googlemap, yahoomap, multimap, street1, street2, town, state, zip, tel, fax, voip, mobile, email, vat FROM '
                      . $xoopsDB->prefix('wflinks_links')
                      . ' WHERE lid='
                      . $mod_array['lid'];
        $orig_array = $xoopsDB->fetchArray($xoopsDB->query($sql));
        unset($sql);

        $orig_user      = new \XoopsUser($orig_array['submitter']);
        $submittername  = \XoopsUserUtility::getUnameFromId($orig_array['submitter']);
        $submitteremail = $orig_user->getUnameFromId('email');

        echo '<div><b>' . _AM_WFL_MOD_MODPOSTER . "</b> $submittername</div>";
        $not_allowed = ['lid', 'submitter', 'requestid', 'modifysubmitter'];
        $sform       = new \XoopsThemeForm(_AM_WFL_MOD_ORIGINAL, 'storyform', 'index.php');
        foreach ($orig_array as $key => $content) {
            if (in_array($key, $not_allowed)) {
                continue;
            }
            $lang_def = constant('_AM_WFL_MOD_' . strtoupper($key));

            if ('cid' === $key) {
                $sql     = 'SELECT title FROM ' . $xoopsDB->prefix('wflinks_cat') . ' WHERE cid=' . $content;
                $row     = $xoopsDB->fetchArray($xoopsDB->query($sql));
                $content = $row['title'];
            }
            if ('forumid' === $key) {
                $content          = '';
                $moduleHandler    = xoops_getHandler('module');
                $xoopsforumModule = $moduleHandler->getByDirname('newbb');
                $sql              = 'SELECT title FROM ' . $xoopsDB->prefix('bb_categories') . ' WHERE cid=' . $content;
                if ($xoopsforumModule && $content > 0) {
                    $content = "<a href='" . XOOPS_URL . '/modules/newbb/viewforum.php?forum=' . $content . "'>Forumid</a>";
                }
            }
            if ('screenshot' === $key) {
                $content = '';
                if ($content > 0) {
                    $content = "<img src='" . XOOPS_URL . '/' . $xoopsModuleConfig['screenshots'] . '/' . $logourl . "' width='" . $xoopsModuleConfig['shotwidth'] . "' alt=''>";
                }
            }
            if ('country' === $key) {
                $content = Wflinks\Utility::getCountryName($mod_array['country']);
            }
            $sform->addElement(new \XoopsFormLabel($lang_def, $content));
        }
        $sform->display();

        $orig_user      = new \XoopsUser($mod_array['modifysubmitter']);
        $submittername  = \XoopsUserUtility::getUnameFromId($mod_array['modifysubmitter']);
        $submitteremail = $orig_user->getUnameFromId('email');

        echo '<div><b>' . _AM_WFL_MOD_MODIFYSUBMITTER . "</b> $submittername</div>";
        $sform = new \XoopsThemeForm(_AM_WFL_MOD_PROPOSED, 'storyform', 'modifications.php');
        foreach ($mod_array as $key => $content) {
            if (in_array($key, $not_allowed)) {
                continue;
            }
            $lang_def = constant('_AM_WFL_MOD_' . strtoupper($key));

            if ('cid' === $key) {
                $sql     = 'SELECT title FROM ' . $xoopsDB->prefix('wflinks_cat') . ' WHERE cid=' . $content;
                $row     = $xoopsDB->fetchArray($xoopsDB->query($sql));
                $content = $row['title'];
            }
            if ('forumid' === $key) {
                $content          = '';
                $moduleHandler    = xoops_getHandler('module');
                $xoopsforumModule = $moduleHandler->getByDirname('newbb');
                $sql              = 'SELECT title FROM ' . $xoopsDB->prefix('bb_categories') . ' WHERE cid=' . $content;
                $content          = '';
                if ($xoopsforumModule && $content > 0) {
                    $content = "<a href='" . XOOPS_URL . '/modules/newbb/viewforum.php?forum=' . $content . "'>Forumid</a>";
                }
            }
            if ('screenshot' === $key) {
                $content = '';
                if ($content > 0) {
                    $content = "<img src='" . XOOPS_URL . '/' . $xoopsModuleConfig['screenshots'] . '/' . $logourl . "' width='" . $xoopsModuleConfig['shotwidth'] . "' alt=''>";
                }
            }
            if ('country' === $key) {
                $content = Wflinks\Utility::getCountryName($mod_array['country']);
            }
            $sform->addElement(new \XoopsFormLabel($lang_def, $content));
        }
        $button_tray = new \XoopsFormElementTray('', '');
        $button_tray->addElement(new \XoopsFormHidden('requestid', $requestid));
        $button_tray->addElement(new \XoopsFormHidden('lid', $mod_array['requestid']));
        $hidden = new \XoopsFormHidden('op', 'changemodreq');
        $button_tray->addElement($hidden);
        if ($mod_array) {
            $butt_dup = new \XoopsFormButton('', '', _AM_WFL_BAPPROVE, 'submit');
            $butt_dup->setExtra('onclick="this.form.elements.op.value=\'changemodreq\'"');
            $button_tray->addElement($butt_dup);
        }
        $butt_dupct2 = new \XoopsFormButton('', '', _AM_WFL_BIGNORE, 'submit');
        $butt_dupct2->setExtra('onclick="this.form.elements.op.value=\'ignoremodreq\'"');
        $button_tray->addElement($butt_dupct2);
        $sform->addElement($button_tray);
        $sform->display();
        xoops_cp_footer();
        break;

    case 'changemodreq':
        $sql        = 'SELECT * FROM ' . $xoopsDB->prefix('wflinks_mod') . ' WHERE requestid=' . $requestid;
        $link_array = $xoopsDB->fetchArray($xoopsDB->query($sql));

        $lid         = $link_array['lid'];
        $cid         = $link_array['cid'];
        $title       = $link_array['title'];
        $url         = $link_array['url'];
        $publisher   = $xoopsUser->uname();
        $screenshot  = $link_array['screenshot'];
        $description = $link_array['description'];
        $submitter   = $link_array['modifysubmitter'];
        $country     = $link_array['country'];
        $keywords    = $link_array['keywords'];
        $item_tag    = $link_array['item_tag'];
        $googlemap   = $link_array['googlemap'];
        $yahoomap    = $link_array['yahoomap'];
        $multimap    = $link_array['multimap'];
        $street1     = $link_array['street1'];
        $street2     = $link_array['street2'];
        $town        = $link_array['town'];
        $state       = $link_array['state'];
        $zip         = $link_array['zip'];
        $tel         = $link_array['tel'];
        $fax         = $link_array['fax'];
        $voip        = $link_array['voip'];
        $mobile      = $link_array['mobile'];
        $email       = $link_array['email'];
        $vat         = $link_array['vat'];
        $updated     = time();

        $xoopsDB->query('UPDATE '
                        . $xoopsDB->prefix('wflinks_links')
                        . " SET cid = $cid, title='$title', url='$url', submitter='$submitter', screenshot='$screenshot', publisher='$publisher', status='2', updated='$updated', description='$description', country='$country', keywords='$keywords', item_tag='$item_tag', googlemap='$googlemap', yahoomap='$yahoomap', multimap='$multimap', street1='$street1', street2='$street2', town='$town', state='$state',  zip='$zip', tel='$tel', fax='$fax', voip='$voip', mobile='$mobile', email='$email', vat='$vat' WHERE lid = "
                        . $lid);
        $sql    = 'DELETE FROM ' . $xoopsDB->prefix('wflinks_mod') . ' WHERE requestid=' . $requestid;
        $result = $xoopsDB->query($sql);
        redirect_header('index.php', 1, _AM_WFL_MOD_REQUPDATED);
        break;

    case 'ignoremodreq':
        $sql = sprintf('DELETE FROM ' . $xoopsDB->prefix('wflinks_mod') . ' WHERE requestid=' . $requestid);
        $xoopsDB->query($sql);
        redirect_header('index.php', 1, _AM_WFL_MOD_REQDELETED);
        break;

    case 'main':
    default:

        $start            = isset($_GET['start']) ? (int)$_GET['start'] : 0;
        $mytree           = new WflinksXoopsTree($xoopsDB->prefix('wflinks_mod'), 'requestid', 0);
        $sql              = 'SELECT * FROM ' . $xoopsDB->prefix('wflinks_mod') . ' ORDER BY requestdate DESC';
        $result           = $xoopsDB->query($sql, $xoopsModuleConfig['admin_perpage'], $start);
        $totalmodrequests = $xoopsDB->getRowsNum($xoopsDB->query($sql));

        xoops_cp_header();

        echo "<fieldset><legend style='font-weight: bold; color: #0A3760;'>" . _AM_WFL_MOD_MODREQUESTSINFO . "</legend>\n";
        echo "<div style='padding: 8px;'>" . _AM_WFL_MOD_TOTMODREQUESTS . " <b>$totalmodrequests<></div>\n";
        echo "</fieldset><br>\n";

        echo "<table width='100%' cellspacing='1' class='outer'>\n";
        echo "<tr class='center;'>\n";
        echo '<th>' . _AM_WFL_MOD_MODID . "</th>\n";
        echo "<th style='text-align: left;'>" . _AM_WFL_MOD_MODTITLE . "</th>\n";
        echo '<th>' . _AM_WFL_MOD_MODIFYSUBMIT . "</th>\n";
        echo '<th>' . _AM_WFL_MOD_DATE . "</th>\n";
        echo '<th>' . _AM_WFL_MINDEX_ACTION . "</th>\n";
        echo "</tr>\n";
        if ($totalmodrequests > 0) {
            while ($link_arr = $xoopsDB->fetchArray($result)) {
                $path        = $mytree->getNicePathFromId($link_arr['requestid'], 'title', 'modifications.php?op=listmodreqshow&requestid');
                $path        = str_replace('/', '', $path);
                $path        = str_replace(':', '', trim($path));
                $title       = trim($path);
                $submitter   = \XoopsUserUtility::getUnameFromId($link_arr['modifysubmitter']);
                $requestdate = formatTimestamp($link_arr['requestdate'], $xoopsModuleConfig['dateformatadmin']);

                echo "<tr class='center;'>\n";
                echo "<td class='head'>" . $link_arr['requestid'] . "</td>\n";
                echo "<td class='even' style='text-align: left;'>" . $title . "</td>\n";
                echo "<td class='even'>" . $submitter . "</td>\n";
                echo "<td class='even'>" . $requestdate . "</td>\n";
                echo "<td class='even'> <a href='modifications.php?op=listmodreqshow&amp;requestid=" . $link_arr['requestid'] . "'>" . $imageArray['view'] . "</a></td>\n";
                echo "</tr>\n";
            }
        } else {
            echo "<tr class='center;'><td class='head' colspan='7'>" . _AM_WFL_MOD_NOMODREQUEST . '</td></tr>';
        }
        echo "</table>\n";

        require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        //        $page = ( $totalmodrequests > $xoopsModuleConfig['admin_perpage'] ) ? _AM_WFL_MINDEX_PAGE : '';
        $pagenav = new \XoopsPageNav($totalmodrequests, $xoopsModuleConfig['admin_perpage'], $start, 'start');
        echo "<div style='text-align: right; padding: 8px;'>" . $pagenav->renderNav() . '</div>';
        require_once __DIR__ . '/admin_footer.php';
}
