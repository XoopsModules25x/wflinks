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

require_once __DIR__ . '/header.php';

require XOOPS_ROOT_PATH . '/header.php';
require XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

/** @var Wflinks\Helper $helper */
$helper = Wflinks\Helper::getInstance();

$mytree = new Wflinks\Tree($xoopsDB->prefix('wflinks_cat'), 'cid', 'pid');
global $myts;

$cid = Wflinks\Utility::cleanRequestVars($_REQUEST, 'cid', 0);
$lid = Wflinks\Utility::cleanRequestVars($_REQUEST, 'lid', 0);
$cid = (int)$cid;
$lid = (int)$lid;

if (false === Wflinks\Utility::checkGroups($cid, 'WFLinkSubPerm')) {
    redirect_header('index.php', 1, _MD_WFL_NOPERMISSIONTOPOST);
}

if (true === Wflinks\Utility::checkGroups($cid, 'WFLinkSubPerm')) {
    if (Wflinks\Utility::cleanRequestVars($_REQUEST, 'submit', 0)) {
        if (false === Wflinks\Utility::checkGroups($cid, 'WFLinkSubPerm')) {
            redirect_header('index.php', 1, _MD_WFL_NOPERMISSIONTOPOST);
        }

        $submitter    = (is_object($xoopsUser) && !empty($xoopsUser)) ? $xoopsUser->getVar('uid') : 0;
        $forumid      = Wflinks\Utility::cleanRequestVars($_REQUEST, 'forumid', 0);
        $offline      = Wflinks\Utility::cleanRequestVars($_REQUEST, 'offline', 0);
        $notifypub    = Wflinks\Utility::cleanRequestVars($_REQUEST, 'notifypub', 0);
        $approve      = Wflinks\Utility::cleanRequestVars($_REQUEST, 'approve', 0);
        $url          = $myts->addSlashes(ltrim($_POST['url']));
        $title        = $myts->addSlashes(ltrim($_REQUEST['title']));
        $descriptionb = $myts->addSlashes(ltrim($_REQUEST['descriptionb']));
        $keywords     = $myts->addSlashes(trim(mb_substr($_POST['keywords'], 0, $helper->getConfig('keywordlength'))));

        $item_tag = '';
        if ($helper->getConfig('usercantag')) {
            $item_tag = $myts->addSlashes(ltrim($_REQUEST['item_tag']));
        }

        if ($helper->getConfig('useaddress')) {
            $googlemap = ('http://maps.google.com' !== $_POST['googlemap']) ? $myts->addSlashes($_POST['googlemap']) : '';
            $yahoomap  = ('http://maps.yahoo.com' !== $_POST['yahoomap']) ? $myts->addSlashes($_POST['yahoomap']) : '';
            $multimap  = ('http://www.multimap.com' !== $_POST['multimap']) ? $myts->addSlashes($_POST['multimap']) : '';
            $street1   = $myts->addSlashes(ltrim($_REQUEST['street1']));
            $street2   = $myts->addSlashes(ltrim($_REQUEST['street2']));
            $town      = $myts->addSlashes(ltrim($_REQUEST['town']));
            $state     = $myts->addSlashes(ltrim($_REQUEST['state']));
            $zip       = $myts->addSlashes(ltrim($_REQUEST['zip']));
            $tel       = $myts->addSlashes(ltrim($_REQUEST['tel']));
            $fax       = $myts->addSlashes(ltrim($_REQUEST['fax']));
            $voip      = $myts->addSlashes(ltrim($_REQUEST['voip']));
            $mobile    = $myts->addSlashes(ltrim($_REQUEST['mobile']));
            $email     = Wflinks\Utility::convertEmail($myts->addSlashes(ltrim($_REQUEST['email'])));
            $vat       = $myts->addSlashes(ltrim($_REQUEST['vat']));
        } else {
            $googlemap = $yahoomap = $multimap = $street1 = $street2 = $town = $state = $zip = $tel = $fax = $voip = $mobile = $email = $vat = '';
        }

        $country = $myts->addSlashes(ltrim($_REQUEST['country']));

        $date        = time();
        $publishdate = 0;
        $ipaddress   = $_SERVER['REMOTE_ADDR'];

        if (0 == $lid) {
            $status      = 0;
            $publishdate = 0;
            $message     = _MD_WFL_THANKSFORINFO;
            if (true === Wflinks\Utility::checkGroups($cid, 'WFLinkAutoApp')) {
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
                /** @var \XoopsLogger $logger */
                $logger = \XoopsLogger::getInstance();
                $logger->handleError(E_USER_WARNING, $_error, __FILE__, __LINE__);
            }
            // $newid = $xoopsDB -> getInsertId();
            $newid = $GLOBALS['xoopsDB']->getInsertId();

            // Add item_tag to Tag-module
            if (0 == $lid) {
                $tagupdate = Wflinks\Utility::updateTag($newid, $item_tag);
            } else {
                $tagupdate = Wflinks\Utility::updateTag($lid, $item_tag);
            }

            // Notify of new link (anywhere) and new link in category
            /** @var \XoopsNotificationHandler $notificationHandler */
            $notificationHandler = xoops_getHandler('notification');

            $tags              = [];
            $tags['LINK_NAME'] = $title;
            $tags['LINK_URL']  = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/singlelink.php?cid=' . $cid . '&amp;lid=' . (int)$newid;

            $sql    = 'SELECT title FROM ' . $xoopsDB->prefix('wflinks_cat') . ' WHERE cid=' . $cid;
            $result = $xoopsDB->query($sql);
            $row    = $xoopsDB->fetchArray($result);

            $tags['CATEGORY_NAME'] = $row['title'];
            $tags['CATEGORY_URL']  = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/viewcat.php?cid=' . $cid;
            if (true === Wflinks\Utility::checkGroups($cid, 'WFLinkAutoApp')) {
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
            if (1 == $approve || true === Wflinks\Utility::checkGroups($cid, 'WFLinkAutoApp')) {
                $updated = time();
                $sql     = 'UPDATE '
                           . $xoopsDB->prefix('wflinks_links')
                           . " SET cid=$cid, title='$title', url='$url', updated='$updated', offline='$offline', description='$descriptionb', ipaddress='$ipaddress', notifypub='$notifypub', country='$country', keywords='$keywords', item_tag='$item_tag', googlemap='$googlemap', yahoomap='$yahoomap', multimap='$multimap', street1='$street1', street2='$street2', town='$town', state='$state',  zip='$zip', tel='$tel', fax='$fax', voip='$voip', mobile='$mobile', email='$email', vat='$vat' WHERE lid="
                           . $lid;
                if (!$result = $xoopsDB->query($sql)) {
                    $_error = $xoopsDB->error() . ' : ' . $xoopsDB->errno();
                    /** @var \XoopsLogger $logger */
                    $logger = \XoopsLogger::getInstance();
                    $logger->handleError(E_USER_WARNING, $_error, __FILE__, __LINE__);
                }

                $notificationHandler   = xoops_getHandler('notification');
                $tags                  = [];
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
                $updated         = Wflinks\Utility::cleanRequestVars($_REQUEST, 'up_dated', time());
                $sql             = 'INSERT INTO '
                                   . $xoopsDB->prefix('wflinks_mod')
                                   . ' (requestid, lid, cid, title, url, forumid, description, modifysubmitter, requestdate, country, keywords, item_tag, googlemap, yahoomap, multimap, street1, street2, town, state, zip, tel, fax, voip, mobile, email, vat)';
                $sql             .= " VALUES (0, $lid, $cid, '$title', '$url', '$forumid', '$descriptionb', '$modifysubmitter', '$requestdate', '$country', '$keywords', '$item_tag', '$googlemap', '$yahoomap', '$multimap', '$street1', '$street2', '$town', '$state', '$zip', '$tel', '$fax', '$voip', '$mobile', '$email', '$vat')";
                if (!$result = $xoopsDB->query($sql)) {
                    $_error = $xoopsDB->error() . ' : ' . $xoopsDB->errno();
                    /** @var \XoopsLogger $logger */
                    $logger = \XoopsLogger::getInstance();
                    $logger->handleError(E_USER_WARNING, $_error, __FILE__, __LINE__);
                }

                $tags                      = [];
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
        /** @var Wflinks\Helper $helper */
        $helper = Wflinks\Helper::getInstance();

        $approve = Wflinks\Utility::cleanRequestVars($_REQUEST, 'approve', 0);

        //Show disclaimer
        if (!isset($_GET['agree']) && $helper->getConfig('showdisclaimer') && 0 == $approve) {
            $GLOBALS['xoopsOption']['template_main'] = 'wflinks_disclaimer.tpl';
            require XOOPS_ROOT_PATH . '/header.php';

            $xoopsTpl->assign('image_header', Wflinks\Utility::getImageHeader());
            $xoopsTpl->assign('disclaimer', $myts->displayTarea($helper->getConfig('disclaimer'), 1, 1, 1, 1, 1));
            $xoopsTpl->assign('cancel_location', XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/index.php');
            $xoopsTpl->assign('link_disclaimer', false);
            if (!isset($_REQUEST['lid'])) {
                $xoopsTpl->assign('agree_location', XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/submit.php?agree=1');
            } elseif (\Xmf\Request::hasVar('lid', 'REQUEST')) {
                $lid = \Xmf\Request::getInt('lid', 0, 'REQUEST');
                $xoopsTpl->assign('agree_location', XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/submit.php?agree=1&amp;lid=' . $lid);
            }
            require XOOPS_ROOT_PATH . '/footer.php';
            exit();
        }

        echo "<br><div class='txtcenter;'>" . Wflinks\Utility::getImageHeader() . "</div><br>\n";
        echo '<div>' . _MD_WFL_SUB_SNEWMNAMEDESC . "</div>\n<br>\n";

        $sql        = 'SELECT * FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE lid=' . $lid;
        $link_array = $xoopsDB->fetchArray($xoopsDB->query($sql));

        $lid          = $link_array['lid'] ?: 0;
        $cid          = $link_array['cid'] ?: 0;
        $title        = $link_array['title'] ? htmlspecialchars($link_array['title']) : '';
        $url          = $link_array['url'] ? htmlspecialchars($link_array['url']) : 'http://';
        $publisher    = $link_array['publisher'] ? htmlspecialchars($link_array['publisher']) : '';
        $screenshot   = $link_array['screenshot'] ? htmlspecialchars($link_array['screenshot']) : '';
        $descriptionb = $link_array['description'] ? htmlspecialchars($link_array['description']) : '';
        $published    = $link_array['published'] ?: 0;
        $expired      = $link_array['expired'] ?: 0;
        $updated      = $link_array['updated'] ?: 0;
        $offline      = $link_array['offline'] ?: 0;
        $forumid      = $link_array['forumid'] ?: 0;
        $ipaddress    = $link_array['ipaddress'] ?: 0;
        $notifypub    = $link_array['notifypub'] ?: 0;
        $country      = $link_array['country'] ? htmlspecialchars($link_array['country']) : '-';
        $keywords     = $link_array['keywords'] ? htmlspecialchars($link_array['keywords']) : '';
        $item_tag     = $link_array['item_tag'] ? htmlspecialchars($link_array['item_tag']) : '';

        $googlemap = $link_array['googlemap'] ? htmlspecialchars($link_array['googlemap']) : 'http://maps.google.com';
        $yahoomap  = $link_array['yahoomap'] ? htmlspecialchars($link_array['yahoomap']) : 'http://maps.yahoo.com';
        $multimap  = $link_array['multimap'] ? htmlspecialchars($link_array['multimap']) : 'http://www.multimap.com';

        $street1 = $link_array['street1'] ? htmlspecialchars($link_array['street1']) : '';
        $street2 = $link_array['street2'] ? htmlspecialchars($link_array['street2']) : '';
        $town    = $link_array['town'] ? htmlspecialchars($link_array['town']) : '';
        $state   = $link_array['state'] ? htmlspecialchars($link_array['state']) : '';
        $zip     = $link_array['zip'] ? htmlspecialchars($link_array['zip']) : '';
        $tel     = $link_array['tel'] ? htmlspecialchars($link_array['tel']) : '';
        $mobile  = $link_array['mobile'] ? htmlspecialchars($link_array['mobile']) : '';
        $voip    = $link_array['voip'] ? htmlspecialchars($link_array['voip']) : '';
        $fax     = $link_array['fax'] ? htmlspecialchars($link_array['fax']) : '';
        $email   = $link_array['email'] ? htmlspecialchars($link_array['email']) : '';
        $vat     = $link_array['vat'] ? htmlspecialchars($link_array['vat']) : '';

        $sform = new \XoopsThemeForm(_MD_WFL_SUBMITCATHEAD, 'storyform', xoops_getenv('SCRIPT_NAME'), 'post', true);
        $sform->setExtra('enctype="multipart/form-data"');

        // Title form
        $sform->addElement(new \XoopsFormText(_MD_WFL_FILETITLE, 'title', 70, 255, $title), true);

        // Link url form
        $url_text = new \XoopsFormText('', 'url', 70, 255, $url);
        $url_tray = new \XoopsFormElementTray(_MD_WFL_DLURL, '');
        $url_tray->addElement($url_text, true);
        $url_tray->addElement(new \XoopsFormLabel("&nbsp;<img src='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . "/assets/images/icon/world.png' onClick=\"window.open(document.storyform.url.value,'','');return(false);\" alt='Check URL'>"));
        $sform->addElement($url_tray);

        // Category selection menu
        $mytree     = new Wflinks\Tree($xoopsDB->prefix('wflinks_cat'), 'cid', 'pid');
        $submitcats = [];
        $sql        = 'SELECT * FROM ' . $xoopsDB->prefix('wflinks_cat') . ' ORDER BY title';
        $result     = $xoopsDB->query($sql);
        while (false !== ($myrow = $xoopsDB->fetchArray($result))) {
            if (true === Wflinks\Utility::checkGroups($myrow['cid'], 'WFLinkSubPerm')) {
                $submitcats[$myrow['cid']] = $myrow['title'];
            }
        }
        ob_start();
        $mytree->makeMySelBox('title', 'title', $cid, 0);
        $sform->addElement(new \XoopsFormLabel(_MD_WFL_CATEGORYC, ob_get_contents()));
        ob_end_clean();

        // Link description form
        //    $editor = Wflinks\Utility::getWysiwygForm( _MD_WFL_DESCRIPTIONC, 'descriptionb', $descriptionb, 15, 60 );
        //    $sform -> addElement($editor,false);

        $optionsTrayNote = new \XoopsFormElementTray(_MD_WFL_DESCRIPTIONC, '<br>');
        if (class_exists('XoopsFormEditor')) {
            $options['name']   = 'descriptionb';
            $options['value']  = $descriptionb;
            $options['rows']   = 5;
            $options['cols']   = '100%';
            $options['width']  = '100%';
            $options['height'] = '200px';
            $editor            = new \XoopsFormEditor('', $helper->getConfig('form_optionsuser'), $options, $nohtml = false, $onfailure = 'textarea');
            $optionsTrayNote->addElement($editor);
        } else {
            $editor = new \XoopsFormDhtmlTextArea('', 'descriptionb', $item->getVar('descriptionb', 'e'), '100%', '100%');
            $optionsTrayNote->addElement($editor);
        }

        $sform->addElement($optionsTrayNote, false);

        // Keywords form
        $keywords = new \XoopsFormTextArea(_MD_WFL_KEYWORDS, 'keywords', $keywords, 7, 60, false);
        $keywords->setDescription('<small>' . _MD_WFL_KEYWORDS_NOTE . '</small>');
        $sform->addElement($keywords);

        // Insert tags if Tag-module is installed and if user is allowed
        if ($helper->getConfig('usercantag')) {
            if (Wflinks\Utility::isTagModuleIncluded()) {
                require_once XOOPS_ROOT_PATH . '/modules/tag/include/formtag.php';
                $text_tags = new \XoopsModules\Tag\FormTag('item_tag', 70, 255, $link_array['item_tag'], 0);
                $sform->addElement($text_tags);
            } else {
                $sform->addElement(new \XoopsFormHidden('item_tag', $link_array['item_tag']));
            }
        }
        if ($helper->getConfig('useaddress')) {
            $sform->insertBreak(_MD_WFL_LINK_CREATEADDRESS, 'even');
            // Google Maps
            $googlemap_text = new \XoopsFormText('', 'googlemap', 70, 1024, $googlemap);
            $googlemap_tray = new \XoopsFormElementTray(_MD_WFL_LINK_GOOGLEMAP, '');
            $googlemap_tray->addElement($googlemap_text, false);
            $googlemap_tray->addElement(new \XoopsFormLabel("&nbsp;<img src='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . "/assets/images/icon/google_map.png' onClick=\"window.open(document.storyform.googlemap.value,'','');return(false);\" alt='" . _MD_WFL_LINK_CHECKMAP . "'>"));
            $sform->addElement($googlemap_tray);

            // Yahoo Maps
            $yahoomap_text = new \XoopsFormText('', 'yahoomap', 70, 1024, $yahoomap);
            $yahoomap_tray = new \XoopsFormElementTray(_MD_WFL_LINK_YAHOOMAP, '');
            $yahoomap_tray->addElement($yahoomap_text, false);
            $yahoomap_tray->addElement(new \XoopsFormLabel("&nbsp;<img src='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . "/assets/images/icon/yahoo_map.png' onClick=\"window.open(document.storyform.yahoomap.value,'','');return(false);\" alt='" . _MD_WFL_LINK_CHECKMAP . "'>"));
            $sform->addElement($yahoomap_tray);

            // Multimap
            $multimap_text = new \XoopsFormText('', 'multimap', 70, 1024, $multimap);
            $multimap_tray = new \XoopsFormElementTray(_MD_WFL_LINK_MULTIMAP, '');
            $multimap_tray->addElement($multimap_text, false);
            $multimap_tray->addElement(new \XoopsFormLabel("&nbsp;<img src='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . "/assets/images/icon/multimap.png' onClick=\"window.open(document.storyform.multimap.value,'','');return(false);\" alt='" . _MD_WFL_LINK_CHECKMAP . "'>"));
            $sform->addElement($multimap_tray);

            // Address forms
            $street1 = new \XoopsFormText(_MD_WFL_STREET1, 'street1', 70, 255, $street1);
            $sform->addElement($street1, false);
            $street2 = new \XoopsFormText(_MD_WFL_STREET2, 'street2', 70, 255, $street2);
            $sform->addElement($street2, false);
            $town = new \XoopsFormText(_MD_WFL_TOWN, 'town', 70, 255, $town);
            $sform->addElement($town, false);
            $state = new \XoopsFormText(_MD_WFL_STATE, 'state', 70, 255, $state);
            $sform->addElement($state, false);
            $zip = new \XoopsFormText(_MD_WFL_ZIPCODE, 'zip', 25, 25, $zip);
            $sform->addElement($zip, false);
            $tel = new \XoopsFormText(_MD_WFL_TELEPHONE, 'tel', 25, 25, $tel);
            $sform->addElement($tel, false);
            $mobile = new \XoopsFormText(_MD_WFL_MOBILE, 'mobile', 25, 25, $mobile);
            $sform->addElement($mobile, false);
            $voip = new \XoopsFormText(_MD_WFL_VOIP, 'voip', 25, 25, $voip);
            $sform->addElement($voip, false);
            $fax = new \XoopsFormText(_MD_WFL_FAX, 'fax', 25, 25, $fax);
            $sform->addElement($fax, false);
            $email = new \XoopsFormText(_MD_WFL_EMAIL, 'email', 25, 25, $email);
            $sform->addElement($email, false);
            $vat = new \XoopsFormText(_MD_WFL_VAT, 'vat', 25, 25, $vat);
            $vat->setDescription(_MD_WFL_VATWIKI);
            $sform->addElement($vat, false);
            //  $sform -> addElement( new \XoopsFormHidden( 'vat', $link_array['vat'] ) ); /* If you don't want to use the VAT form,  */
            /* use this line and comment-out the 3 lines above  */
        }

        // Country form
        $sform->addElement(new \XoopsFormSelectCountry(_MD_WFL_COUNTRY, 'country', $country), false);

        $option_tray = new \XoopsFormElementTray(_MD_WFL_OPTIONS, '<br>');
        if (!$approve) {
            $notify_checkbox = new \XoopsFormCheckBox('', 'notifypub');
            $notify_checkbox->addOption(1, _MD_WFL_NOTIFYAPPROVE);
            $option_tray->addElement($notify_checkbox);
        } else {
            $sform->addElement(new \XoopsFormHidden('notifypub', 0));
        }
        if ($lid > 0 && true === Wflinks\Utility::checkGroups($cid, 'WFLinkAppPerm')) {
            $approve_checkbox = new \XoopsFormCheckBox('', 'approve', $approve);
            $approve_checkbox->addOption(1, _MD_WFL_APPROVE);
            $option_tray->addElement($approve_checkbox);
        } elseif (true === Wflinks\Utility::checkGroups($cid, 'WFLinkAutoApp')) {
            $sform->addElement(new \XoopsFormHidden('approve', 1));
        } else {
            $sform->addElement(new \XoopsFormHidden('approve', 0));
        }
        $sform->addElement($option_tray);
        $buttonTray = new \XoopsFormElementTray('', '');
        $buttonTray->addElement(new \XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
        $buttonTray->addElement(new \XoopsFormHidden('lid', $lid));
        $sform->addElement($buttonTray);
        $sform->display();
        require XOOPS_ROOT_PATH . '/footer.php';
    }
} else {
    redirect_header('index.php', 2, _MD_WFL_NOPERMISSIONTOPOST);
}
