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

include XOOPS_ROOT_PATH . '/header.php';
include XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

$mytree = new WflinksXoopsTree($xoopsDB->prefix('wflinks_cat'), 'cid', 'pid');
global $wfmyts, $xoopsModuleConfig;

$cid = WfLinksUtility::cleanRequestVars($_REQUEST, 'cid', 0);
$lid = WfLinksUtility::cleanRequestVars($_REQUEST, 'lid', 0);
$cid = (int)$cid;
$lid = (int)$lid;

if (false === WfLinksUtility::checkGroups($cid, 'WFLinkSubPerm')) {
    redirect_header('index.php', 1, _MD_WFL_NOPERMISSIONTOPOST);
}

if (true === WfLinksUtility::checkGroups($cid, 'WFLinkSubPerm')) {
    if (WfLinksUtility::cleanRequestVars($_REQUEST, 'submit', 0)) {
        if (false === WfLinksUtility::checkGroups($cid, 'WFLinkSubPerm')) {
            redirect_header('index.php', 1, _MD_WFL_NOPERMISSIONTOPOST);
        }

        $submitter    = (is_object($xoopsUser) && !empty($xoopsUser)) ? $xoopsUser->getVar('uid') : 0;
        $forumid      = WfLinksUtility::cleanRequestVars($_REQUEST, 'forumid', 0);
        $offline      = WfLinksUtility::cleanRequestVars($_REQUEST, 'offline', 0);
        $notifypub    = WfLinksUtility::cleanRequestVars($_REQUEST, 'notifypub', 0);
        $approve      = WfLinksUtility::cleanRequestVars($_REQUEST, 'approve', 0);
        $url          = $wfmyts->addSlashes(ltrim($_POST['url']));
        $title        = $wfmyts->addSlashes(ltrim($_REQUEST['title']));
        $descriptionb = $wfmyts->addSlashes(ltrim($_REQUEST['descriptionb']));
        $keywords     = $wfmyts->addSlashes(trim(substr($_POST['keywords'], 0, $xoopsModuleConfig['keywordlength'])));

        if ($xoopsModuleConfig['usercantag']) {
            $item_tag = $wfmyts->addSlashes(ltrim($_REQUEST['item_tag']));
        } else {
            $item_tag = '';
        }

        if ($xoopsModuleConfig['useaddress']) {
            $googlemap = ($_POST['googlemap'] !== 'http://maps.google.com') ? $wfmyts->addSlashes($_POST['googlemap']) : '';
            $yahoomap  = ($_POST['yahoomap'] !== 'http://maps.yahoo.com') ? $wfmyts->addSlashes($_POST['yahoomap']) : '';
            $multimap  = ($_POST['multimap'] !== 'http://www.multimap.com') ? $wfmyts->addSlashes($_POST['multimap']) : '';
            $street1   = $wfmyts->addSlashes(ltrim($_REQUEST['street1']));
            $street2   = $wfmyts->addSlashes(ltrim($_REQUEST['street2']));
            $town      = $wfmyts->addSlashes(ltrim($_REQUEST['town']));
            $state     = $wfmyts->addSlashes(ltrim($_REQUEST['state']));
            $zip       = $wfmyts->addSlashes(ltrim($_REQUEST['zip']));
            $tel       = $wfmyts->addSlashes(ltrim($_REQUEST['tel']));
            $fax       = $wfmyts->addSlashes(ltrim($_REQUEST['fax']));
            $voip      = $wfmyts->addSlashes(ltrim($_REQUEST['voip']));
            $mobile    = $wfmyts->addSlashes(ltrim($_REQUEST['mobile']));
            $email     = WfLinksUtility::convertEmail($wfmyts->addSlashes(ltrim($_REQUEST['email'])));
            $vat       = $wfmyts->addSlashes(ltrim($_REQUEST['vat']));
        } else {
            $googlemap = $yahoomap = $multimap = $street1 = $street2 = $town = $state = $zip = $tel = $fax = $voip = $mobile = $email = $vat = '';
        }

        $country = $wfmyts->addSlashes(ltrim($_REQUEST['country']));

        $date        = time();
        $publishdate = 0;
        $ipaddress   = $_SERVER['REMOTE_ADDR'];

        if ($lid == 0) {
            $status      = 0;
            $publishdate = 0;
            $message     = _MD_WFL_THANKSFORINFO;
            if (true === WfLinksUtility::checkGroups($cid, 'WFLinkAutoApp')) {
                $publishdate = time();
                $status      = 1;
                $message     = _MD_WFL_ISAPPROVED;
            }

            $sql = 'INSERT INTO '
                   . $xoopsDB->prefix('wflinks_links')
                   . ' (lid, cid, title, url, submitter, status, date, hits, rating, votes, comments, forumid, published, expired, offline, description, ipaddress, notifypub, country, keywords, item_tag, googlemap, yahoomap, multimap, street1, street2, town, state, zip, tel, fax, voip, mobile, email, vat ) ';

            $sql .= " VALUES    (0, $cid, '$title', '$url', '$submitter', '$status', '$date', 0, 0, 0, 0, '$forumid', '$publishdate', 0, '$offline', '$descriptionb', '$ipaddress', '$notifypub', '$country', '$keywords', '$item_tag', '$googlemap', '$yahoomap', '$multimap', '$street1', '$street2', '$town', '$state', '$zip', '$tel', '$fax', '$voip', '$mobile', '$email', '$vat' )";

            if (!$result = $xoopsDB->query($sql)) {
                $_error = $xoopsDB->error() . ' : ' . $xoopsDB->errno();
                XoopsErrorHandler_HandleError(E_USER_WARNING, $_error, __FILE__, __LINE__);
            }
            // $newid = $xoopsDB -> getInsertId();
            $newid = $GLOBALS['xoopsDB']->getInsertId();

            // Add item_tag to Tag-module
            if ($lid == 0) {
                $tagupdate = WfLinksUtility::updateTag($newid, $item_tag);
            } else {
                $tagupdate = WfLinksUtility::updateTag($lid, $item_tag);
            }

            // Notify of new link (anywhere) and new link in category
            $notificationHandler = xoops_getHandler('notification');

            $tags              = array();
            $tags['LINK_NAME'] = $title;
            $tags['LINK_URL']  = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/singlelink.php?cid=' . $cid . '&amp;lid=' . (int)$newid;

            $sql    = 'SELECT title FROM ' . $xoopsDB->prefix('wflinks_cat') . ' WHERE cid=' . $cid;
            $result = $xoopsDB->query($sql);
            $row    = $xoopsDB->fetchArray($result);

            $tags['CATEGORY_NAME'] = $row['title'];
            $tags['CATEGORY_URL']  = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/viewcat.php?cid=' . $cid;
            if (true === WfLinksUtility::checkGroups($cid, 'WFLinkAutoApp')) {
                $notificationHandler->triggerEvent('global', 0, 'new_link', $tags);
                $notificationHandler->triggerEvent('category', $cid, 'new_link', $tags);
                redirect_header('index.php', 2, _MD_WFL_ISAPPROVED);
            } else {
                $tags['WAITINGFILES_URL'] = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/admin/newlinks.php';
                $notificationHandler->triggerEvent('global', 0, 'link_submit', $tags);
                $notificationHandler->triggerEvent('category', $cid, 'link_submit', $tags);
                if ($notifypub) {
                    require_once XOOPS_ROOT_PATH . '/include/notification_constants.php';
                    $notificationHandler->subscribe('link', $newid, 'approve', XOOPS_NOTIFICATION_MODE_SENDONCETHENDELETE);
                }
                redirect_header('index.php', 2, _MD_WFL_THANKSFORINFO);
            }
        } else {
            if (true === WfLinksUtility::checkGroups($cid, 'WFLinkAutoApp') || $approve == 1) {
                $updated = time();
                $sql     = 'UPDATE '
                           . $xoopsDB->prefix('wflinks_links')
                           . " SET cid=$cid, title='$title', url='$url', updated='$updated', offline='$offline', description='$descriptionb', ipaddress='$ipaddress', notifypub='$notifypub', country='$country', keywords='$keywords', item_tag='$item_tag', googlemap='$googlemap', yahoomap='$yahoomap', multimap='$multimap', street1='$street1', street2='$street2', town='$town', state='$state',  zip='$zip', tel='$tel', fax='$fax', voip='$voip', mobile='$mobile', email='$email', vat='$vat' WHERE lid="
                           . $lid;
                if (!$result = $xoopsDB->query($sql)) {
                    $_error = $xoopsDB->error() . ' : ' . $xoopsDB->errno();
                    XoopsErrorHandler_HandleError(E_USER_WARNING, $_error, __FILE__, __LINE__);
                }

                $notificationHandler   = xoops_getHandler('notification');
                $tags                  = array();
                $tags['LINK_NAME']     = $title;
                $tags['LINK_URL']      = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/singlelink.php?cid=' . $cid . '&amp;lid=' . $lid;
                $sql                   = 'SELECT title FROM ' . $xoopsDB->prefix('wflinks_cat') . ' WHERE cid=' . $cid;
                $result                = $xoopsDB->query($sql);
                $row                   = $xoopsDB->fetchArray($result);
                $tags['CATEGORY_NAME'] = $row['title'];
                $tags['CATEGORY_URL']  = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/viewcat.php?cid=' . $lid;

                $notificationHandler->triggerEvent('global', 0, 'new_link', $tags);
                $notificationHandler->triggerEvent('category', $cid, 'new_link', $tags);
                $_message = _MD_WFL_ISAPPROVED;
            } else {
                $modifysubmitter = $xoopsUser->uid();
                $requestid       = $modifysubmitter;
                $requestdate     = time();
                $updated         = WfLinksUtility::cleanRequestVars($_REQUEST, 'up_dated', time());
                $sql             = 'INSERT INTO '
                                   . $xoopsDB->prefix('wflinks_mod')
                                   . ' (requestid, lid, cid, title, url, forumid, description, modifysubmitter, requestdate, country, keywords, item_tag, googlemap, yahoomap, multimap, street1, street2, town, state, zip, tel, fax, voip, mobile, email, vat)';
                $sql             .= " VALUES (0, $lid, $cid, '$title', '$url', '$forumid', '$descriptionb', '$modifysubmitter', '$requestdate', '$country', '$keywords', '$item_tag', '$googlemap', '$yahoomap', '$multimap', '$street1', '$street2', '$town', '$state', '$zip', '$tel', '$fax', '$voip', '$mobile', '$email', '$vat')";
                if (!$result = $xoopsDB->query($sql)) {
                    $_error = $xoopsDB->error() . ' : ' . $xoopsDB->errno();
                    XoopsErrorHandler_HandleError(E_USER_WARNING, $_error, __FILE__, __LINE__);
                }

                $tags                      = array();
                $tags['MODIFYREPORTS_URL'] = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/admin/main.php?op=listModReq';
                $notificationHandler       = xoops_getHandler('notification');
                $notificationHandler->triggerEvent('global', 0, 'link_modify', $tags);

                $tags['WAITINGFILES_URL'] = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/admin/main.php?op=listNewlinks';
                $notificationHandler->triggerEvent('global', 0, 'link_submit', $tags);
                $notificationHandler->triggerEvent('category', $cid, 'link_submit', $tags);
                if ($notifypub) {
                    require_once XOOPS_ROOT_PATH . '/include/notification_constants.php';
                    $notificationHandler->subscribe('link', $newid, 'approve', XOOPS_NOTIFICATION_MODE_SENDONCETHENDELETE);
                }
                $_message = _MD_WFL_THANKSFORINFO;
            }
            redirect_header('index.php', 2, $_message);
        }
    } else {
        global $xoopsModuleConfig;

        $approve = WfLinksUtility::cleanRequestVars($_REQUEST, 'approve', 0);

        //Show disclaimer
        if ($xoopsModuleConfig['showdisclaimer'] && !isset($_GET['agree']) && $approve == 0) {
            $GLOBALS['xoopsOption']['template_main'] = 'wflinks_disclaimer.tpl';
            include XOOPS_ROOT_PATH . '/header.php';

            $xoopsTpl->assign('image_header', WfLinksUtility::getImageHeader());
            $xoopsTpl->assign('disclaimer', $wfmyts->displayTarea($xoopsModuleConfig['disclaimer'], 1, 1, 1, 1, 1));
            $xoopsTpl->assign('cancel_location', XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/index.php');
            $xoopsTpl->assign('link_disclaimer', false);
            if (!isset($_REQUEST['lid'])) {
                $xoopsTpl->assign('agree_location', XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/submit.php?agree=1');
            } elseif (isset($_REQUEST['lid'])) {
                $lid = (int)$_REQUEST['lid'];
                $xoopsTpl->assign('agree_location', XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/submit.php?agree=1&amp;lid=' . $lid);
            }
            include XOOPS_ROOT_PATH . '/footer.php';
            exit();
        }

        echo "<br><div class='txtcenter;'>" . WfLinksUtility::getImageHeader() . "</div><br>\n";
        echo '<div>' . _MD_WFL_SUB_SNEWMNAMEDESC . "</div>\n<br>\n";

        $sql        = 'SELECT * FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE lid=' . $lid;
        $link_array = $xoopsDB->fetchArray($xoopsDB->query($sql));

        $lid          = $link_array['lid'] ?: 0;
        $cid          = $link_array['cid'] ?: 0;
        $title        = $link_array['title'] ? $wfmyts->htmlSpecialCharsStrip($link_array['title']) : '';
        $url          = $link_array['url'] ? $wfmyts->htmlSpecialCharsStrip($link_array['url']) : 'http://';
        $publisher    = $link_array['publisher'] ? $wfmyts->htmlSpecialCharsStrip($link_array['publisher']) : '';
        $screenshot   = $link_array['screenshot'] ? $wfmyts->htmlSpecialCharsStrip($link_array['screenshot']) : '';
        $descriptionb = $link_array['description'] ? $wfmyts->htmlSpecialCharsStrip($link_array['description']) : '';
        $published    = $link_array['published'] ?: 0;
        $expired      = $link_array['expired'] ?: 0;
        $updated      = $link_array['updated'] ?: 0;
        $offline      = $link_array['offline'] ?: 0;
        $forumid      = $link_array['forumid'] ?: 0;
        $ipaddress    = $link_array['ipaddress'] ?: 0;
        $notifypub    = $link_array['notifypub'] ?: 0;
        $country      = $link_array['country'] ? $wfmyts->htmlSpecialCharsStrip($link_array['country']) : '-';
        $keywords     = $link_array['keywords'] ? $wfmyts->htmlSpecialCharsStrip($link_array['keywords']) : '';
        $item_tag     = $link_array['item_tag'] ? $wfmyts->htmlSpecialCharsStrip($link_array['item_tag']) : '';

        $googlemap = $link_array['googlemap'] ? $wfmyts->htmlSpecialCharsStrip($link_array['googlemap']) : 'http://maps.google.com';
        $yahoomap  = $link_array['yahoomap'] ? $wfmyts->htmlSpecialCharsStrip($link_array['yahoomap']) : 'http://maps.yahoo.com';
        $multimap  = $link_array['multimap'] ? $wfmyts->htmlSpecialCharsStrip($link_array['multimap']) : 'http://www.multimap.com';

        $street1 = $link_array['street1'] ? $wfmyts->htmlSpecialCharsStrip($link_array['street1']) : '';
        $street2 = $link_array['street2'] ? $wfmyts->htmlSpecialCharsStrip($link_array['street2']) : '';
        $town    = $link_array['town'] ? $wfmyts->htmlSpecialCharsStrip($link_array['town']) : '';
        $state   = $link_array['state'] ? $wfmyts->htmlSpecialCharsStrip($link_array['state']) : '';
        $zip     = $link_array['zip'] ? $wfmyts->htmlSpecialCharsStrip($link_array['zip']) : '';
        $tel     = $link_array['tel'] ? $wfmyts->htmlSpecialCharsStrip($link_array['tel']) : '';
        $mobile  = $link_array['mobile'] ? $wfmyts->htmlSpecialCharsStrip($link_array['mobile']) : '';
        $voip    = $link_array['voip'] ? $wfmyts->htmlSpecialCharsStrip($link_array['voip']) : '';
        $fax     = $link_array['fax'] ? $wfmyts->htmlSpecialCharsStrip($link_array['fax']) : '';
        $email   = $link_array['email'] ? $wfmyts->htmlSpecialCharsStrip($link_array['email']) : '';
        $vat     = $link_array['vat'] ? $wfmyts->htmlSpecialCharsStrip($link_array['vat']) : '';

        $sform = new XoopsThemeForm(_MD_WFL_SUBMITCATHEAD, 'storyform', xoops_getenv('PHP_SELF'), 'post', true);
        $sform->setExtra('enctype="multipart/form-data"');

        // Title form
        $sform->addElement(new XoopsFormText(_MD_WFL_FILETITLE, 'title', 70, 255, $title), true);

        // Link url form
        $url_text = new XoopsFormText('', 'url', 70, 255, $url);
        $url_tray = new XoopsFormElementTray(_MD_WFL_DLURL, '');
        $url_tray->addElement($url_text, true);
        $url_tray->addElement(new XoopsFormLabel("&nbsp;<img src='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . "/assets/images/icon/world.png' onClick=\"window.open(document.storyform.url.value,'','');return(false);\" alt='Check URL'>"));
        $sform->addElement($url_tray);

        // Category selection menu
        $mytree     = new WflinksXoopsTree($xoopsDB->prefix('wflinks_cat'), 'cid', 'pid');
        $submitcats = array();
        $sql        = 'SELECT * FROM ' . $xoopsDB->prefix('wflinks_cat') . ' ORDER BY title';
        $result     = $xoopsDB->query($sql);
        while ($myrow = $xoopsDB->fetchArray($result)) {
            if (true === WfLinksUtility::checkGroups($myrow['cid'], 'WFLinkSubPerm')) {
                $submitcats[$myrow['cid']] = $myrow['title'];
            }
        }
        ob_start();
        $mytree->makeMySelBox('title', 'title', $cid, 0);
        $sform->addElement(new XoopsFormLabel(_MD_WFL_CATEGORYC, ob_get_contents()));
        ob_end_clean();

        // Link description form
        //    $editor = WfLinksUtility::getWysiwygForm( _MD_WFL_DESCRIPTIONC, 'descriptionb', $descriptionb, 15, 60 );
        //    $sform -> addElement($editor,false);

        $optionsTrayNote = new XoopsFormElementTray(_MD_WFL_DESCRIPTIONC, '<br>');
        if (class_exists('XoopsFormEditor')) {
            $options['name']   = 'descriptionb';
            $options['value']  = $descriptionb;
            $options['rows']   = 5;
            $options['cols']   = '100%';
            $options['width']  = '100%';
            $options['height'] = '200px';
            $editor            = new XoopsFormEditor('', $xoopsModuleConfig['form_optionsuser'], $options, $nohtml = false, $onfailure = 'textarea');
            $optionsTrayNote->addElement($editor);
        } else {
            $editor = new XoopsFormDhtmlTextArea('', 'descriptionb', $item->getVar('descriptionb', 'e'), '100%', '100%');
            $optionsTrayNote->addElement($editor);
        }

        $sform->addElement($optionsTrayNote, false);

        // Keywords form
        $keywords = new XoopsFormTextArea(_MD_WFL_KEYWORDS, 'keywords', $keywords, 7, 60, false);
        $keywords->setDescription('<small>' . _MD_WFL_KEYWORDS_NOTE . '</small>');
        $sform->addElement($keywords);

        // Insert tags if Tag-module is installed and if user is allowed
        if ($xoopsModuleConfig['usercantag']) {
            if (WfLinksUtility::isTagModuleIncluded()) {
                require_once XOOPS_ROOT_PATH . '/modules/tag/include/formtag.php';
                $text_tags = new TagFormTag('item_tag', 70, 255, $link_array['item_tag'], 0);
                $sform->addElement($text_tags);
            } else {
                $sform->addElement(new XoopsFormHidden('item_tag', $link_array['item_tag']));
            }
        }
        if ($xoopsModuleConfig['useaddress']) {
            $sform->insertBreak(_MD_WFL_LINK_CREATEADDRESS, 'even');
            // Google Maps
            $googlemap_text = new XoopsFormText('', 'googlemap', 70, 1024, $googlemap);
            $googlemap_tray = new XoopsFormElementTray(_MD_WFL_LINK_GOOGLEMAP, '');
            $googlemap_tray->addElement($googlemap_text, false);
            $googlemap_tray->addElement(new XoopsFormLabel("&nbsp;<img src='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . "/assets/images/icon/google_map.png' onClick=\"window.open(document.storyform.googlemap.value,'','');return(false);\" alt='" . _MD_WFL_LINK_CHECKMAP . "'>"));
            $sform->addElement($googlemap_tray);

            // Yahoo Maps
            $yahoomap_text = new XoopsFormText('', 'yahoomap', 70, 1024, $yahoomap);
            $yahoomap_tray = new XoopsFormElementTray(_MD_WFL_LINK_YAHOOMAP, '');
            $yahoomap_tray->addElement($yahoomap_text, false);
            $yahoomap_tray->addElement(new XoopsFormLabel("&nbsp;<img src='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . "/assets/images/icon/yahoo_map.png' onClick=\"window.open(document.storyform.yahoomap.value,'','');return(false);\" alt='" . _MD_WFL_LINK_CHECKMAP . "'>"));
            $sform->addElement($yahoomap_tray);

            // Multimap
            $multimap_text = new XoopsFormText('', 'multimap', 70, 1024, $multimap);
            $multimap_tray = new XoopsFormElementTray(_MD_WFL_LINK_MULTIMAP, '');
            $multimap_tray->addElement($multimap_text, false);
            $multimap_tray->addElement(new XoopsFormLabel("&nbsp;<img src='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . "/assets/images/icon/multimap.png' onClick=\"window.open(document.storyform.multimap.value,'','');return(false);\" alt='" . _MD_WFL_LINK_CHECKMAP . "'>"));
            $sform->addElement($multimap_tray);

            // Address forms
            $street1 = new XoopsFormText(_MD_WFL_STREET1, 'street1', 70, 255, $street1);
            $sform->addElement($street1, false);
            $street2 = new XoopsFormText(_MD_WFL_STREET2, 'street2', 70, 255, $street2);
            $sform->addElement($street2, false);
            $town = new XoopsFormText(_MD_WFL_TOWN, 'town', 70, 255, $town);
            $sform->addElement($town, false);
            $state = new XoopsFormText(_MD_WFL_STATE, 'state', 70, 255, $state);
            $sform->addElement($state, false);
            $zip = new XoopsFormText(_MD_WFL_ZIPCODE, 'zip', 25, 25, $zip);
            $sform->addElement($zip, false);
            $tel = new XoopsFormText(_MD_WFL_TELEPHONE, 'tel', 25, 25, $tel);
            $sform->addElement($tel, false);
            $mobile = new XoopsFormText(_MD_WFL_MOBILE, 'mobile', 25, 25, $mobile);
            $sform->addElement($mobile, false);
            $voip = new XoopsFormText(_MD_WFL_VOIP, 'voip', 25, 25, $voip);
            $sform->addElement($voip, false);
            $fax = new XoopsFormText(_MD_WFL_FAX, 'fax', 25, 25, $fax);
            $sform->addElement($fax, false);
            $email = new XoopsFormText(_MD_WFL_EMAIL, 'email', 25, 25, $email);
            $sform->addElement($email, false);
            $vat = new XoopsFormText(_MD_WFL_VAT, 'vat', 25, 25, $vat);
            $vat->setDescription(_MD_WFL_VATWIKI);
            $sform->addElement($vat, false);
            //  $sform -> addElement( new XoopsFormHidden( 'vat', $link_array['vat'] ) ); /* If you don't want to use the VAT form,  */
            /* use this line and comment-out the 3 lines above  */
        }

        // Country form
        $sform->addElement(new XoopsFormSelectCountry(_MD_WFL_COUNTRY, 'country', $country), false);

        $option_tray = new XoopsFormElementTray(_MD_WFL_OPTIONS, '<br>');
        if (!$approve) {
            $notify_checkbox = new XoopsFormCheckBox('', 'notifypub');
            $notify_checkbox->addOption(1, _MD_WFL_NOTIFYAPPROVE);
            $option_tray->addElement($notify_checkbox);
        } else {
            $sform->addElement(new XoopsFormHidden('notifypub', 0));
        }
        if (true === WfLinksUtility::checkGroups($cid, 'WFLinkAppPerm') && $lid > 0) {
            $approve_checkbox = new XoopsFormCheckBox('', 'approve', $approve);
            $approve_checkbox->addOption(1, _MD_WFL_APPROVE);
            $option_tray->addElement($approve_checkbox);
        } elseif (true === WfLinksUtility::checkGroups($cid, 'WFLinkAutoApp')) {
            $sform->addElement(new XoopsFormHidden('approve', 1));
        } else {
            $sform->addElement(new XoopsFormHidden('approve', 0));
        }
        $sform->addElement($option_tray);
        $button_tray = new XoopsFormElementTray('', '');
        $button_tray->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
        $button_tray->addElement(new XoopsFormHidden('lid', $lid));
        $sform->addElement($button_tray);
        $sform->display();
        include XOOPS_ROOT_PATH . '/footer.php';
    }
} else {
    redirect_header('index.php', 2, _MD_WFL_NOPERMISSIONTOPOST);
}
