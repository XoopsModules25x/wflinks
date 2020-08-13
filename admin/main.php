<?php
/**
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

use Xmf\Module\Admin;
use Xmf\Request;
use XoopsModules\Tag\FormTag;
use XoopsModules\Wflinks;

require_once __DIR__ . '/admin_header.php';

$mytree = new Wflinks\Tree($xoopsDB->prefix('wflinks_cat'), 'cid', 'pid');

$op  = Wflinks\Utility::cleanRequestVars($_REQUEST, 'op', '');
$lid = (int)Wflinks\Utility::cleanRequestVars($_REQUEST, 'lid', 0);

/**
 * @param int $lid
 * @return bool|null
 */
function edit($lid = 0)
{
    global $xoopsDB, $myts, $mytree, $imageArray, $xoopsConfig, $xoopsModule, $xoopsUser;
    /** @var Wflinks\Helper $helper */
    $helper = Wflinks\Helper::getInstance();

    $sql = 'SELECT * FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE lid=' . $lid;
    if (!$result = $xoopsDB->query($sql)) {
        /** @var \XoopsLogger $logger */
        $logger = \XoopsLogger::getInstance();
        $logger->handleError(E_USER_WARNING, $sql, __FILE__, __LINE__);

        return false;
    }
    $link_array = $xoopsDB->fetchArray($xoopsDB->query($sql));

    $directory    = $helper->getConfig('screenshots');
    $lid          = $link_array['lid'] ?: 0;
    $cid          = $link_array['cid'] ?: 0;
    $title        = $link_array['title'] ? $myts->htmlSpecialChars($link_array['title']) : '';
    $url          = $link_array['url'] ? $myts->htmlSpecialChars($link_array['url']) : 'http://';
    $publisher    = $link_array['publisher'] ? $myts->htmlSpecialChars($link_array['publisher']) : '';
    $submitter    = $link_array['submitter'] ? $myts->htmlSpecialChars($link_array['submitter']) : '';
    $screenshot   = $link_array['screenshot'] ? $myts->htmlSpecialChars($link_array['screenshot']) : '';
    $descriptionb = $link_array['description'] ? $myts->htmlSpecialChars($link_array['description']) : '';
    $published    = $link_array['published'] ?: time();
    $expired      = $link_array['expired'] ?: 0;
    $updated      = $link_array['updated'] ?: 0;
    $offline      = $link_array['offline'] ?: 0;
    $forumid      = $link_array['forumid'] ?: 0;
    $ipaddress    = $link_array['ipaddress'] ?: 0;
    $notifypub    = $link_array['notifypub'] ?: 0;
    $country      = $link_array['country'] ? $myts->htmlSpecialChars($link_array['country']) : '-';
    $keywords     = $link_array['keywords'] ? $myts->htmlSpecialChars($link_array['keywords']) : '';
    $item_tag     = $link_array['item_tag'] ? $myts->htmlSpecialChars($link_array['item_tag']) : '';
    $googlemap    = $link_array['googlemap'] ? $myts->htmlSpecialChars($link_array['googlemap']) : 'http://maps.google.com';
    $yahoomap     = $link_array['yahoomap'] ? $myts->htmlSpecialChars($link_array['yahoomap']) : 'http://maps.yahoo.com';
    $multimap     = $link_array['multimap'] ? $myts->htmlSpecialChars($link_array['multimap']) : 'http://www.multimap.com';
    $street1      = $link_array['street1'] ? $myts->htmlSpecialChars($link_array['street1']) : '';
    $street2      = $link_array['street2'] ? $myts->htmlSpecialChars($link_array['street2']) : '';
    $town         = $link_array['town'] ? $myts->htmlSpecialChars($link_array['town']) : '';
    $state        = $link_array['state'] ? $myts->htmlSpecialChars($link_array['state']) : '';
    $zip          = $link_array['zip'] ? $myts->htmlSpecialChars($link_array['zip']) : '';
    $tel          = $link_array['tel'] ? $myts->htmlSpecialChars($link_array['tel']) : '';
    $mobile       = $link_array['mobile'] ? $myts->htmlSpecialChars($link_array['mobile']) : '';
    $voip         = $link_array['voip'] ? $myts->htmlSpecialChars($link_array['voip']) : '';
    $fax          = $link_array['fax'] ? $myts->htmlSpecialChars($link_array['fax']) : '';
    $email        = $link_array['email'] ? $myts->htmlSpecialChars($link_array['email']) : '';
    $vat          = $link_array['vat'] ? $myts->htmlSpecialChars($link_array['vat']) : '';

    require_once __DIR__ . '/admin_header.php';
    xoops_cp_header();
    xoops_load('XoopsUserUtility');

    if ($lid > 0) {
        $_vote_data = Wflinks\Utility::getVoteDetails($lid);
        $text_info  = "<table style='width:100%;'>
             <tr>
              <td width='33%' valign='top'>
               <div><b>" . _AM_WFL_LINK_ID . ' </b>' . $lid . '</div>
               <div><b>' . _AM_WFL_MINDEX_SUBMITTED . ': </b>' . formatTimestamp($link_array['date'], $helper->getConfig('dateformat')) . '</div>
               <div><b>' . _AM_WFL_LINK_SUBMITTER . ' </b>' . \XoopsUserUtility::getUnameFromId($submitter) . '</div>
               <div><b>' . _AM_WFL_LINK_IP . ' </b>' . $ipaddress . '</div>
               <div><b>' . _AM_WFL_PAGERANK . ' </b>' . Wflinks\Utility::pagerank($link_array['url']) . '</div>
               <div><b>' . _AM_WFL_HITS . ' </b>' . $link_array['hits'] . "</div>

              </td>
              <td valign='top'>
               <div><b>" . _AM_WFL_VOTE_TOTALRATE . ': </b>' . Request::getInt('rate', 0, 'vote_data') . '</div>
               <div><b>' . _AM_WFL_VOTE_USERAVG . ': </b>' . (int)round($_vote_data['avg_rate'], 2) . '</div>
               <div><b>' . _AM_WFL_VOTE_MAXRATE . ': </b>' . Request::getInt('min_rate', 0, 'vote_data') . '</div>
               <div><b>' . _AM_WFL_VOTE_MINRATE . ': </b>' . Request::getInt('max_rate', 0, 'vote_data') . "</div>
              </td>
              <td valign='top'>
               <div><b>" . _AM_WFL_VOTE_MOSTVOTEDTITLE . ': </b>' . Request::getInt('max_title', 0, 'vote_data') . '</div>
                   <div><b>' . _AM_WFL_VOTE_LEASTVOTEDTITLE . ': </b>' . Request::getInt('min_title', 0, 'vote_data') . '</div>
               <div><b>' . _AM_WFL_VOTE_REGISTERED . ': </b>' . $_vote_data['rate'] - $_vote_data['null_ratinguser'] . '</div>
               <div><b>' . _AM_WFL_VOTE_NONREGISTERED . ': </b>' . Request::getInt('null_ratinguser', 0, 'vote_data') . '</div>
              </td>
             </tr>
            </table>';
        echo "<fieldset style='border: #e8e8e8 1px solid;'><legend style='display: inline; font-weight: bold; color: #0A3760;'>" . _AM_WFL_INFORMATION . "</legend>\n
            <div style='padding: 8px;'>" . $text_info . "</div>\n
        <!--    <div style='padding: 8px;'><li>" . $imageArray['deleteimg'] . ' ' . _AM_WFL_VOTE_DELETEDSC . "</li></div>\n  -->
            </fieldset>\n
            <br>\n";
    }
    unset($_vote_data);

    $caption = $lid ? _AM_WFL_LINK_MODIFYFILE : _AM_WFL_LINK_CREATENEWFILE;
    $sform   = new \XoopsThemeForm($caption, 'storyform', xoops_getenv('SCRIPT_NAME'), 'post', true);
    $sform->setExtra('enctype="multipart / form - data"');

    if ('' === $submitter) {
        $sform->addElement(new \XoopsFormHidden('submitter', $submitter));
    }

    // Link publisher form
    if ($publisher) {
        $sform->addElement(new \XoopsFormText(_AM_WFL_LINK_PUBLISHER, 'publisher', 70, 255, $publisher));
        //$sform -> addElement( new \XoopsFormHidden( 'publisher', $publisher ) ) ;
    } else {
        $publisher = $xoopsUser->uname();
        $sform->addElement(new \XoopsFormHidden('publisher', $publisher));
    }

    // Link title form
    $sform->addElement(new \XoopsFormText(_AM_WFL_LINK_TITLE, 'title', 70, 255, $title), true);

    // Link url form
    $url_text = new \XoopsFormText('', 'url', 70, 255, $url);
    $url_tray = new \XoopsFormElementTray(_AM_WFL_LINK_DLURL, '');
    $url_tray->addElement($url_text, true);
    $url_tray->addElement(new \XoopsFormLabel("&nbsp;<img src='../assets/images/icon/world.png' onClick=\"window.open(document.storyform.url.value,'','');return(false);\" alt='Check URL'>"));
    $sform->addElement($url_tray);

    // Category form
    ob_start();
    $mytree->makeMySelBox('title', 'title', $cid, 0);
    $sform->addElement(new \XoopsFormLabel(_AM_WFL_LINK_CATEGORY, ob_get_contents()));
    ob_end_clean();

    // Link description form
    //    $editor = Wflinks\Utility::getWysiwygForm( _AM_WFL_LINK_DESCRIPTION, 'descriptionb', $descriptionb, 15, 60 );
    //    $sform -> addElement($editor, false);
    $optionsTrayNote = new \XoopsFormElementTray(_AM_WFL_LINK_DESCRIPTION, '<br>');
    if (class_exists('XoopsFormEditor')) {
        $options['name']   = 'descriptionb';
        $options['value']  = $descriptionb;
        $options['rows']   = 5;
        $options['cols']   = '100%';
        $options['width']  = '100%';
        $options['height'] = '200px';
        $descriptionb      = new \XoopsFormEditor('', $helper->getConfig('form_options'), $options, $nohtml = false, $onfailure = 'textarea');
        $optionsTrayNote->addElement($descriptionb);
    } else {
        $descriptionb = new \XoopsFormDhtmlTextArea('', 'descriptionb', $item->getVar('descriptionb', 'e'), '100%', '100%');
        $optionsTrayNote->addElement($descriptionb);
    }

    $sform->addElement($optionsTrayNote, false);

    // Meta keywords form
    $keywords = new \XoopsFormTextArea(_AM_WFL_KEYWORDS, 'keywords', $keywords, 7, 60, false);
    $keywords->setDescription('<small>' . _AM_WFL_KEYWORDS_NOTE . '</small>');
    $sform->addElement($keywords);

    // Insert tags if Tag-module is installed
    if (Wflinks\Utility::isTagModuleIncluded()) {
        require_once XOOPS_ROOT_PATH . '/modules/tag/include/formtag.php';
        $text_tags = new FormTag('item_tag', 70, 255, $link_array['item_tag'], 0);
        $sform->addElement($text_tags);
    } else {
        $sform->addElement(new \XoopsFormHidden('item_tag', $link_array['item_tag']));
    }

    // Screenshot
    $graph_array       = Wflinks\Lists::getListTypeAsArray(XOOPS_ROOT_PATH . '/' . $helper->getConfig('screenshots'), $type = 'images');
    $indeximage_select = new \XoopsFormSelect('', 'screenshot', $screenshot);
    $indeximage_select->addOptionArray($graph_array);
    $indeximage_select->setExtra("onchange = 'showImgSelected(\"image\", \"screenshot\", \"" . $helper->getConfig('screenshots') . '", "", "' . XOOPS_URL . "\")'");
    $indeximage_tray = new \XoopsFormElementTray(_AM_WFL_LINK_SHOTIMAGE, '&nbsp;');
    $indeximage_tray->setDescription(sprintf(_AM_WFL_LINK_MUSTBEVALID, '<b>' . $directory . '</b>'));
    $indeximage_tray->addElement($indeximage_select);
    if (!empty($imgurl)) {
        $indeximage_tray->addElement(new \XoopsFormLabel('', " <br><br>< img src='" . XOOPS_URL . '/' . $helper->getConfig('screenshots') . '/' . $screenshot . "' name = 'image' id = 'image' alt = '' / > "));
    } else {
        $indeximage_tray->addElement(new \XoopsFormLabel('', " <br><br><img src='" . XOOPS_URL . "/uploads/blank.gif' name='image' id='image' alt='' / > "));
    }
    $sform->addElement($indeximage_tray);

    if ($helper->getConfig('useaddress')) {
        $sform->insertBreak(_AM_WFL_LINK_CREATEADDRESS, 'bg3');
        // Google Maps
        $googlemap_text = new \XoopsFormText('', 'googlemap', 70, 1024, $googlemap);
        $googlemap_tray = new \XoopsFormElementTray(_AM_WFL_LINK_GOOGLEMAP, '');
        $googlemap_tray->addElement($googlemap_text, false);
        $googlemap_tray->addElement(new \XoopsFormLabel("&nbsp;<img src='../assets/images/icon/google_map.png' onClick=\"window.open(document.storyform.googlemap.value,'','');return(false);\" alt='" . _AM_WFL_LINK_CHECKMAP . "'>"));
        $sform->addElement($googlemap_tray);
        // Yahoo Maps
        $yahoomap_text = new \XoopsFormText('', 'yahoomap', 70, 1024, $yahoomap);
        $yahoomap_tray = new \XoopsFormElementTray(_AM_WFL_LINK_YAHOOMAP, '');
        $yahoomap_tray->addElement($yahoomap_text, false);
        $yahoomap_tray->addElement(new \XoopsFormLabel("&nbsp;<img src='../assets/images/icon/yahoo_map.png' onClick=\"window.open(document.storyform.yahoomap.value,'','');return(false);\" alt='" . _AM_WFL_LINK_CHECKMAP . "'>"));
        $sform->addElement($yahoomap_tray);
        // MS Live Maps
        $multimap_text = new \XoopsFormText('', 'multimap', 70, 1024, $multimap);
        $multimap_tray = new \XoopsFormElementTray(_AM_WFL_LINK_MULTIMAP, '');
        $multimap_tray->addElement($multimap_text, false);
        $multimap_tray->addElement(new \XoopsFormLabel("&nbsp;<img src='../assets/images/icon/multimap.png' onClick=\"window.open(document.storyform.multimap.value,'','');return(false);\" alt='" . _AM_WFL_LINK_CHECKMAP . "'>"));
        $sform->addElement($multimap_tray);

        // Address
        $street1 = new \XoopsFormText(_AM_WFL_STREET1, 'street1', 70, 255, $street1);
        $sform->addElement($street1, false);
        $street2 = new \XoopsFormText(_AM_WFL_STREET2, 'street2', 70, 255, $street2);
        $sform->addElement($street2, false);
        $town = new \XoopsFormText(_AM_WFL_TOWN, 'town', 70, 255, $town);
        $sform->addElement($town, false);
        $state = new \XoopsFormText(_AM_WFL_STATE, 'state', 70, 255, $state);
        $sform->addElement($state, false);
        $zip = new \XoopsFormText(_AM_WFL_ZIPCODE, 'zip', 25, 25, $zip);
        $sform->addElement($zip, false);
        $tel = new \XoopsFormText(_AM_WFL_TELEPHONE, 'tel', 25, 25, $tel);
        $sform->addElement($tel, false);
        $mobile = new \XoopsFormText(_AM_WFL_MOBILE, 'mobile', 25, 25, $mobile);
        $sform->addElement($mobile, false);
        $voip = new \XoopsFormText(_AM_WFL_VOIP, 'voip', 25, 25, $voip);
        $sform->addElement($voip, false);
        $fax = new \XoopsFormText(_AM_WFL_FAX, 'fax', 25, 25, $fax);
        $sform->addElement($fax, false);
        $email = new \XoopsFormText(_AM_WFL_EMAIL, 'email', 25, 60, $email);
        $sform->addElement($email, false);
        $vat = new \XoopsFormText(_AM_WFL_VAT, 'vat', 25, 25, $vat);
        $vat->setDescription(_AM_WFL_VATWIKI);
        $sform->addElement($vat, false);
        //  $sform -> addElement( new \XoopsFormHidden( 'vat', $link_array['vat'] ) ); /* If you don't want to use the VAT form,  */
        /* use this line and comment-out the 3 lines above  */
    }

    // Country form
    $country_select = new \XoopsFormSelectCountry(_AM_WFL_COUNTRY, 'country', $country);
    $sform->addElement($country_select, false);

    // Miscellaneous Link settings
    $sform->insertBreak(_AM_WFL_LINK_MISCLINKSETTINGS, 'bg3');

    // Set Publish date
    $sform->addElement(new \XoopsFormDateTime(_AM_WFL_LINK_SETPUBLISHDATE, 'was_published', $size = 15, $published));

    if ($lid) {
        $sform->addElement(new \XoopsFormHidden('was_published', $published));
        $sform->addElement(new \XoopsFormHidden('was_expired', $expired));
    }

    // Set Expire date
    $isexpired           = ($expired > time()) ? 1 : 0;
    $expiredates         = ($expired > time()) ? _AM_WFL_LINK_EXPIREDATESET . formatTimestamp($expired, $helper->getConfig('dateformat')) : _AM_WFL_LINK_SETDATETIMEEXPIRE;
    $warning             = ($published > $expired && $expired > time()) ? _AM_WFL_LINK_EXPIREWARNING : '';
    $expiredate_checkbox = new \XoopsFormCheckBox('', 'expiredateactivate', $isexpired);
    $expiredate_checkbox->addOption(1, $expiredates . ' <br> <br> ');

    $expiredate_tray = new \XoopsFormElementTray(_AM_WFL_LINK_EXPIREDATE . $warning, '');
    $expiredate_tray->addElement($expiredate_checkbox);
    $expiredate_tray->addElement(new \XoopsFormDateTime(_AM_WFL_LINK_SETEXPIREDATE . ' <br> ', 'expired', 15, $expired));
    $expiredate_tray->addElement(new \XoopsFormRadioYN(_AM_WFL_LINK_CLEAREXPIREDATE, 'clearexpire', 0, ' ' . _YES . '', ' ' . _NO . ''));
    $sform->addElement($expiredate_tray);

    // Set Link offline
    $linkstatus_radio = new \XoopsFormRadioYN(_AM_WFL_LINK_FILESSTATUS, 'offline', $offline, ' ' . _YES . '', ' ' . _NO . '');
    $sform->addElement($linkstatus_radio);

    // Set Link updated
    $up_dated           = (0 == $updated) ? 0 : 1;
    $link_updated_radio = new \XoopsFormRadioYN(_AM_WFL_LINK_SETASUPDATED, 'up_dated', $up_dated, ' ' . _YES . '', ' ' . _NO . '');
    $sform->addElement($link_updated_radio);

    $result = $xoopsDB->query('SELECT COUNT( * ) FROM ' . $xoopsDB->prefix('wflinks_broken') . ' WHERE lid = ' . $lid);
    list($broken_count) = $xoopsDB->fetchRow($result);
    if ($broken_count > 0) {
        $link_updated_radio = new \XoopsFormRadioYN(_AM_WFL_LINK_DELEDITMESS, 'delbroken', 1, ' ' . _YES . '', ' ' . _NO . '');
        $sform->addElement($link_updated_radio);
    }

    // Select forum
    ob_start();
    Wflinks\Lists::getForum($helper->getConfig('selectforum'), $forumid);
    $sform->addElement(new \XoopsFormLabel(_AM_WFL_LINK_DISCUSSINFORUM, ob_get_contents()));
    ob_end_clean();

    //Create News Story
    if (Wflinks\Utility::isNewsModuleIncluded()) {
        $sform->insertBreak(_AM_WFL_LINK_CREATENEWSSTORY, 'bg3');
        $submitNews_radio = new \XoopsFormRadioYN(_AM_WFL_LINK_SUBMITNEWS, 'submitnews', 0, ' ' . _YES . '', ' ' . _NO . '');
        $sform->addElement($submitNews_radio);

        require_once XOOPS_ROOT_PATH . '/class/xoopstopic.php';
        $xt = new \XoopsTopic($xoopsDB->prefix('news_topics'));
        ob_start();
        $xt->makeTopicSelBox(1, 0, 'newstopicid');
        $sform->addElement(new \XoopsFormLabel(_AM_WFL_LINK_NEWSCATEGORY, ob_get_contents()));
        ob_end_clean();
        $sform->addElement(new \XoopsFormText(_AM_WFL_LINK_NEWSTITLE, 'topic_id', 70, 255, ''), false);
    }

    if ($lid && 0 == $published) {
        $approved         = (0 == $published) ? 0 : 1;
        $approve_checkbox = new \XoopsFormCheckBox(_AM_WFL_LINK_EDITAPPROVE, 'approved', 1);
        $approve_checkbox->addOption(1, ' ');
        $sform->addElement($approve_checkbox);
    }

    if (!$lid) {
        $buttonTray = new \XoopsFormElementTray('', '');
        $buttonTray->addElement(new \XoopsFormHidden('status', 1));
        $buttonTray->addElement(new \XoopsFormHidden('notifypub', $notifypub));
        $buttonTray->addElement(new \XoopsFormHidden('op', 'save'));
        $buttonTray->addElement(new \XoopsFormButton('', '', _AM_WFL_BSAVE, 'submit'));
        $sform->addElement($buttonTray);
    } else {
        $buttonTray = new \XoopsFormElementTray('', '');
        $buttonTray->addElement(new \XoopsFormHidden('lid', $lid));
        $buttonTray->addElement(new \XoopsFormHidden('status', 2));
        $hidden = new \XoopsFormHidden('op', 'save');
        $buttonTray->addElement($hidden);

        $butt_dup = new \XoopsFormButton('', '', _AM_WFL_BMODIFY, 'submit');
        $butt_dup->setExtra('onclick="this . form . elements . op . value = \'save\'"');
        $buttonTray->addElement($butt_dup);
        $butt_dupct = new \XoopsFormButton('', '', _AM_WFL_BDELETE, 'submit');
        $butt_dupct->setExtra('onclick="this.form.elements.op.value=\'delete\'"');
        $buttonTray->addElement($butt_dupct);
        $butt_dupct2 = new \XoopsFormButton('', '', _AM_WFL_BCANCEL, 'submit');
        $butt_dupct2->setExtra('onclick="this.form.elements.op.value=\'linksConfigMenu\'"');
        $buttonTray->addElement($butt_dupct2);
        $sform->addElement($buttonTray);
    }
    $sform->display();
    unset($hidden);
    require_once __DIR__ . '/admin_footer.php';

    return null;
}

/**
 * @param     $url
 * @param int $timeout
 *
 * @return float|null|string
 */
function fetchURL($url, $timeout = 2)
{
    /** @var Wflinks\Helper $helper */
    $helper     = Wflinks\Helper::getInstance();
    $url        = urldecode($url);
    $url_parsed = parse_url($url);
    if (!isset($url_parsed['host'])) {
        return '';
    }

    $host = $url_parsed['host'];
    $host = preg_replace('#http://#', '', $host);
    $port = isset($url_parsed['port']) ? $url_parsed['port'] : 80;
    // Open the socket
    $handle = @fsockopen('http://' . $host, $port, $errno, $errstr, $timeout);
    if (!$handle) {
        return null;
    }

    // Set read timeout
    stream_set_timeout($handle, $timeout);
    for ($i = 0; $i < 1; ++$i) {
        // Time the responce
        list($usec, $sec) = explode(' ', microtime(true));
        $start = (float)$usec + (float)$sec;
        // send somthing
        $write = fwrite($handle, "return ping\n");
        if (!$write) {
            return '';
        }
        fread($handle, 1024);
        // Work out if we got a responce and time it
        list($usec, $sec) = explode(' ', microtime(true));
        $laptime = ((float)$usec + (float)$sec) - $start;
        if ($laptime > $timeout) {
            return 'No Reply';
        }

        return round($laptime, 3);
    }
    fclose($handle);

    return null;
}

switch (mb_strtolower($op)) {
    case 'pingtime':
    case 'is_broken':

        $_type = ('pingtime' === $op) ? 'is_broken' : 'pingtime';

        $start = Wflinks\Utility::cleanRequestVars($_REQUEST, 'start', 0);
        $ping  = Wflinks\Utility::cleanRequestVars($_REQUEST, 'ping', 0);
        $cid   = Wflinks\Utility::cleanRequestVars($_REQUEST, 'cid', 0);

        $sql = 'SELECT * FROM ' . $xoopsDB->prefix('wflinks_links');
        if ($cid > 0) {
            $sql .= ' WHERE cid=' . $cid;
        }
        $sql .= ' ORDER BY lid DESC';
        if (!$result = $xoopsDB->query($sql)) {
            /** @var \XoopsLogger $logger */
            $logger = \XoopsLogger::getInstance();
            $logger->handleError(E_USER_WARNING, $sql, __FILE__, __LINE__);

            return false;
        }
        $broken_array       = $xoopsDB->query($sql, $helper->getConfig('admin_perpage'), $start);
        $broken_array_count = $xoopsDB->getRowsNum($result);

        $heading = ('pingtime' === $op) ? _AM_WFL_PINGTIMES : _AM_WFL_LISTBROKEN;

        require_once __DIR__ . '/admin_header.php';
        xoops_cp_header();

        echo "
            <table width='100%' cellspacing='1' cellpadding='2' border='0' class='outer'>\n
            <tr>\n
            <th class='txtcenter;'>" . _AM_WFL_MINDEX_ID . "</th>\n
            <th style='text-align: left;'>" . _AM_WFL_MINDEX_TITLE . "</th>\n
            <th class='txtcenter;'>" . _AM_WFL_MINDEX_POSTER . "</th>\n
            <th class='txtcenter;'>" . _AM_WFL_MINDEX_PUBLISHED . "</th>\n
                    <th class='txtcenter;'>" . _AM_WFL_MINDEX_RESPONSE . "</th>\n
                        <th class='txtcenter;'>PR</th>\n
                    <th class='txtcenter;'>" . _AM_WFL_MINDEX_ACTION . "</th>\n
            </tr>\n
        ";

        if ($broken_array_count > 0) {
            while (false !== ($published = $xoopsDB->fetchArray($broken_array))) {
                $_ping_results = fetchURL($published['url']);

                if (!$_ping_results) {
                    $_ping_results = _AM_WFL_LINK_NORESPONSE;
                } else {
                    $_ping_results .= '(s)';
                }

                $lid   = $published['lid'];
                $cid   = $published['cid'];
                $title = "<a href='../singlelink.php?cid=" . $published['cid'] . '&amp;lid=' . $published['lid'] . "'>" . $myts->htmlSpecialChars(trim($published['title'])) . '</a>';

                $maintitle = urlencode($myts->htmlSpecialChars(trim($published['title'])));
                $submitter = \XoopsUserUtility::getUnameFromId($published['submitter']);
                $publish   = formatTimestamp($published['published'], $helper->getConfig('dateformatadmin'));
                $status    = ($published['published'] > 0) ? $imageArray['online'] : "<a href='newlinks.php'>" . $imageArray['offline'] . '</a>';
                $icon      = "<a href='main.php?op=edit&amp;lid=" . $lid . "'>" . $imageArray['editimg'] . '</a>&nbsp;';
                $icon      .= "<a href='main.php?op=delete&amp;lid=" . $lid . "'>" . $imageArray['deleteimg'] . '</a>';
                echo "<tr class='txtcenter;'>\n
                        <td class='head'><small>" . $lid . "</small></td>\n
                        <td class='even' style='text-align: left;'><small>" . $title . "</small></td>\n
                        <td class='even'><small>" . $submitter . "</small></td>\n
                        <td class='even'><small>" . $publish . "</small></td>\n
                        <td class='even'><small>" . $_ping_results . "</small></td>\n
                        <td class='even'><small>" . Wflinks\Utility::pagerank($published['url']) . "</small></td>\n
                        <td class='even'>$icon</td>\n
                        </tr>\n";
                unset($published);
            }
        } else {
            Wflinks\Utility::getLinkListFooter();
        }
        Wflinks\Utility::getLinkListPageNav($broken_array_count, $start, 'art', 'op=' . $op);
        require_once __DIR__ . '/admin_footer.php';
        break;
    case 'edit':
        edit($lid);
        break;
    case 'save':
        $groups    = isset($_POST['groups']) ? $_POST['groups'] : [];
        $lid       = !empty($_POST['lid']) ? $_POST['lid'] : 0;
        $cid       = !empty($_POST['cid']) ? $_POST['cid'] : 0;
        $urlrating = !empty($_POST['urlrating']) ? $_POST['urlrating'] : 6;
        $status    = !empty($_POST['status']) ? $_POST['status'] : 2;
        $url       = ('http://' !== $_POST['url']) ? $myts->addSlashes($_POST['url']) : '';
        $title     = $myts->addSlashes(trim($_POST['title']));

        // Get data from form
        $screenshot   = ('blank.gif' !== $_POST['screenshot']) ? $myts->addSlashes($_POST['screenshot']) : '';
        $descriptionb = $myts->addSlashes(trim($_POST['descriptionb']));
        $country      = $myts->addSlashes(trim($_POST['country']));
        $keywords     = $myts->addSlashes(trim(mb_substr($_POST['keywords'], 0, $helper->getConfig('keywordlength'))));
        $item_tag     = $myts->addSlashes(trim($_POST['item_tag']));
        $forumid      = (isset($_POST['forumid']) && $_POST['forumid'] > 0) ? Request::getInt('forumid', 0, 'POST') : 0;
        if ($helper->getConfig('useaddress')) {
            $googlemap = ('http://maps.google.com' !== $_POST['googlemap']) ? $myts->addSlashes($_POST['googlemap']) : '';
            $yahoomap  = ('http://maps.yahoo.com' !== $_POST['yahoomap']) ? $myts->addSlashes($_POST['yahoomap']) : '';
            $multimap  = ('http://www.multimap.com' !== $_POST['multimap']) ? $myts->addSlashes($_POST['multimap']) : '';
            $street1   = $myts->addSlashes(trim($_POST['street1']));
            $street2   = $myts->addSlashes(trim($_POST['street2']));
            $town      = $myts->addSlashes(trim($_POST['town']));
            $state     = $myts->addSlashes(trim($_POST['state']));
            $zip       = $myts->addSlashes(trim($_POST['zip']));
            $tel       = $myts->addSlashes(trim($_POST['tel']));
            $fax       = $myts->addSlashes(trim($_POST['fax']));
            $voip      = $myts->addSlashes(trim($_POST['voip']));
            $mobile    = $myts->addSlashes(trim($_POST['mobile']));
            $email     = Wflinks\Utility::convertEmail($myts->addSlashes(trim($_POST['email'])));
            $vat       = $myts->addSlashes(trim($_POST['vat']));
        } else {
            $googlemap = $yahoomap = $multimap = $street1 = $street2 = $town = $state = $zip = $tel = $fax = $voip = $mobile = $email = $vat = '';
        }

        $submitter = $xoopsUser->uid();
        $publisher = $myts->addSlashes(trim($_POST['publisher']));

        $published = strtotime($_POST['published']['date']) + $_POST['published']['time'];
        $updated   = (isset($_POST['was_published']) && 0 == $_POST['was_published']) ? 0 : time();
        if (0 == $_POST['up_dated']) {
            $updated = 0;
            $status  = 1;
        }
        $offline   = (1 == $_POST['offline']) ? 1 : 0;
        $approved  = (isset($_POST['approved']) && 1 == $_POST['approved']) ? 1 : 0;
        $notifypub = (isset($_POST['notifypub']) && 1 == $_POST['notifypub']);
        if (!$lid) {
            $date        = time();
            $publishdate = time();
            $expiredate  = '0';
        } else {
            $publishdate = $_POST['was_published'];
            $expiredate  = $_POST['was_expired'];
        }
        if (1 == $approved && empty($publishdate)) {
            $publishdate = time();
        }
        if (Request::hasVar('expiredateactivate', 'POST')) {
            $expiredate = strtotime($_POST['expired']['date']) + $_POST['expired']['time'];
        }
        if ($_POST['clearexpire']) {
            $expiredate = '0';
        }

        // Update or insert linkload data into database
        if (!$lid) {
            $date        = time();
            $publishdate = time();
            $ipaddress   = $_SERVER['REMOTE_ADDR'];
            $sql         = 'INSERT INTO '
                           . $xoopsDB->prefix('wflinks_links')
                           . ' (lid, cid, title, url, screenshot, submitter, publisher, status, date, hits, rating, votes, comments, forumid, published, expired, updated, offline, description, ipaddress, notifypub, urlrating, country, keywords, item_tag, googlemap, yahoomap, multimap, street1, street2, town, state, zip, tel, fax, voip, mobile, email, vat )';
            $sql         .= " VALUES    (0, $cid, '$title', '$url', '$screenshot', '$submitter', '$publisher','$status', '$date', 0, 0, 0, 0, '$forumid', '$published', '$expiredate', '$updated', '$offline', '$descriptionb', '$ipaddress', '0', '$urlrating', '$country', '$keywords', '$item_tag', '$googlemap', '$yahoomap', '$multimap', '$street1', '$street2', '$town', '$state', '$zip', '$tel', '$fax', '$voip', '$mobile', '$email', '$vat' )";
            // $newid = $xoopsDB -> getInsertId();
        } else {
            $sql = 'UPDATE '
                   . $xoopsDB->prefix('wflinks_links')
                   . " SET cid = $cid, title='$title', url='$url', screenshot='$screenshot', publisher='$publisher', status='$status', forumid='$forumid', published='$published', expired='$expiredate', updated='$updated', offline='$offline', description='$descriptionb', urlrating='$urlrating', country='$country', keywords='$keywords', item_tag='$item_tag', googlemap='$googlemap', yahoomap='$yahoomap', multimap='$multimap', street1='$street1', street2='$street2', town='$town', state='$state',  zip='$zip', tel='$tel', fax='$fax', voip='$voip', mobile='$mobile', email='$email', vat='$vat' WHERE lid="
                   . $lid;
        }
        if (!$result = $xoopsDB->queryF($sql)) {
            $logger->handleError(E_USER_WARNING, $sql, __FILE__, __LINE__);

            return false;
        }

        $newid = $GLOBALS['xoopsDB']->getInsertId();

        // Add item_tag to Tag-module
        if (!$lid) {
            $tagupdate = Wflinks\Utility::updateTag($newid, $item_tag);
        } else {
            $tagupdate = Wflinks\Utility::updateTag($lid, $item_tag);
        }

        // Send notifications
        if (!$lid) {
            $tags                  = [];
            $tags['LINK_NAME']     = $title;
            $tags['LINK_URL']      = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/singlelink.php?cid=' . $cid . '&amp;lid=' . $newid;
            $sql                   = 'SELECT title FROM ' . $xoopsDB->prefix('wflinks_cat') . ' WHERE cid=' . $cid;
            $result                = $xoopsDB->query($sql);
            $row                   = $xoopsDB->fetchArray($xoopsDB->query($sql));
            $tags['CATEGORY_NAME'] = $row['title'];
            $tags['CATEGORY_URL']  = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/viewcat.php?cid=' . $cid;
            $notificationHandler   = xoops_getHandler('notification');
            $notificationHandler->triggerEvent('global', 0, 'new_link', $tags);
            $notificationHandler->triggerEvent('category', $cid, 'new_link', $tags);
        }
        if ($lid && $approved && $notifypub) {
            $tags                  = [];
            $tags['LINK_NAME']     = $title;
            $tags['LINK_URL']      = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/singlelink.php?cid=' . $cid . '&amp;lid=' . $lid;
            $sql                   = 'SELECT title FROM ' . $xoopsDB->prefix('wflinks_cat') . ' WHERE cid=' . $cid;
            $result                = $xoopsDB->query($sql);
            $row                   = $xoopsDB->fetchArray($result);
            $tags['CATEGORY_NAME'] = $row['title'];
            $tags['CATEGORY_URL']  = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/viewcat.php?cid=' . $cid;
            $notificationHandler   = xoops_getHandler('notification');
            $notificationHandler->triggerEvent('global', 0, 'new_link', $tags);
            $notificationHandler->triggerEvent('category', $cid, 'new_link', $tags);
            $notificationHandler->triggerEvent('link', $lid, 'approve', $tags);
        }
        $message = (!$lid) ? _AM_WFL_LINK_NEWFILEUPLOAD : _AM_WFL_LINK_FILEMODIFIEDUPDATE;
        $message = ($lid && !$_POST['was_published'] && $approved) ? _AM_WFL_LINK_FILEAPPROVED : $message;
        if (Wflinks\Utility::cleanRequestVars($_REQUEST, 'delbroken', 0)) {
            $sql = 'DELETE FROM ' . $xoopsDB->prefix('wflinks_broken') . ' WHERE lid=' . $lid;
            if (!$result = $xoopsDB->queryF($sql)) {
                $logger->handleError(E_USER_WARNING, $sql, __FILE__, __LINE__);

                return false;
            }
        }
        if (Wflinks\Utility::cleanRequestVars($_REQUEST, 'submitnews', 0)) {
            require_once __DIR__ . '/newstory.php';
        }
        redirect_header('main.php', 1, $message);
        break;
    case 'delete':
        if (Wflinks\Utility::cleanRequestVars($_REQUEST, 'confirm', 0)) {
            $title = Wflinks\Utility::cleanRequestVars($_REQUEST, 'title', 0);
            /** @var \XoopsLogger $logger */
            $logger = \XoopsLogger::getInstance();

            // delete link
            $sql = 'DELETE FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE lid=' . $lid;
            if (!$result = $xoopsDB->query($sql)) {
                $logger->handleError(E_USER_WARNING, $sql, __FILE__, __LINE__);

                return false;
            }

            // delete from altcat
            $sql = 'DELETE FROM ' . $xoopsDB->prefix('wflinks_altcat') . ' WHERE lid=' . $lid;
            if (!$result = $xoopsDB->query($sql)) {
                $logger->handleError(E_USER_WARNING, $sql, __FILE__, __LINE__);

                return false;
            }

            // delete vote data
            $sql = 'DELETE FROM ' . $xoopsDB->prefix('wflinks_votedata') . ' WHERE lid=' . $lid;
            if (!$result = $xoopsDB->query($sql)) {
                $logger->handleError(E_USER_WARNING, $sql, __FILE__, __LINE__);

                return false;
            }

            // delete comments
            xoops_comment_delete($xoopsModule->getVar('mid'), $lid);
            redirect_header('main.php', 1, sprintf(_AM_WFL_LINK_FILEWASDELETED, $title));
        } else {
            $sql = 'SELECT lid, title, item_tag, url FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE lid=' . $lid;
            if (!$result = $xoopsDB->query($sql)) {
                $logger->handleError(E_USER_WARNING, $sql, __FILE__, __LINE__);

                return false;
            }
            list($lid, $title) = $xoopsDB->fetchRow($result);
            $item_tag = $result->fetchArray['item_tag'];
            require_once __DIR__ . '/admin_header.php';
            xoops_cp_header();

            xoops_confirm(['op' => 'delete', 'lid' => $lid, 'confirm' => 1, 'title' => $title], 'main.php', _AM_WFL_LINK_REALLYDELETEDTHIS . '<br><br>' . $title, _DELETE);

            // Remove item_tag from Tag-module
            $tagupdate = Wflinks\Utility::updateTag($lid, $item_tag);

            require_once __DIR__ . '/admin_footer.php';
        }
        break;
    case 'delvote':
        $rid = Wflinks\Utility::cleanRequestVars($_REQUEST, 'rid', 0);
        $sql = 'DELETE FROM ' . $xoopsDB->prefix('wflinks_votedata') . ' WHERE ratingid=' . $rid;
        if (!$result = $xoopsDB->queryF($sql)) {
            $logger->handleError(E_USER_WARNING, $sql, __FILE__, __LINE__);

            return false;
        }
        Wflinks\Utility::updateRating($rid);
        redirect_header('main.php', 1, _AM_WFL_VOTE_VOTEDELETED);
        break;
    case 'main':
    default:
        $start     = Wflinks\Utility::cleanRequestVars($_REQUEST, 'start', 0);
        $start1    = Wflinks\Utility::cleanRequestVars($_REQUEST, 'start1', 0);
        $start2    = Wflinks\Utility::cleanRequestVars($_REQUEST, 'start2', 0);
        $start3    = Wflinks\Utility::cleanRequestVars($_REQUEST, 'start3', 0);
        $start4    = Wflinks\Utility::cleanRequestVars($_REQUEST, 'start4', 0);
        $totalcats = Wflinks\Utility::getTotalCategory();

        $result = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wflinks_broken'));
        list($totalbrokenlinks) = $xoopsDB->fetchRow($result);
        $result2 = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wflinks_mod'));
        list($totalmodrequests) = $xoopsDB->fetchRow($result2);
        $result3 = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE published = 0');
        list($totalnewlinks) = $xoopsDB->fetchRow($result3);
        $result4 = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE published > 0');
        list($totallinks) = $xoopsDB->fetchRow($result4);

        xoops_cp_header();

        $adminObject = Admin::getInstance();
        $adminObject->displayNavigation(basename(__FILE__));
        $adminObject->addItemButton(_MI_WFL_ADD_LINK, 'main.php?op=edit', 'add', '');
        $adminObject->addItemButton(_MI_WFL_ADD_CATEGORY, 'category.php', 'add', '');
        $adminObject->displayButton('left', '');

        //        echo "
        //          <fieldset style='border: #e8e8e8 1px solid;'><legend style='display: inline; font-weight: bold; color: #0A3760;'>" . _AM_WFL_MINDEX_LINKSUMMARY . "</legend>\n
        //          <div style='padding: 8px;'><small>\n
        //          <a href='category.php'>" . _AM_WFL_SCATEGORY . "</a><b>" . $totalcats . "</b> | \n
        //          <a href='main.php'>" . _AM_WFL_SFILES . "</a><b>" . $totallinks . "</b> | \n
        //          <a href='newlinks.php'>" . _AM_WFL_SNEWFILESVAL . "</a><b>" . $totalnewlinks . "</b> | \n
        //          <a href='modifications.php'>" . _AM_WFL_SMODREQUEST . "</a><b>" . $totalmodrequests . "</b> | \n
        //          <a href='brokenlink.php'>" . _AM_WFL_SBROKENSUBMIT . "</a><b>" . $totalbrokenlinks . "</b>\n
        //          </small></div></fieldset><br>\n
        //      ";

        //        if ($totalcats > 0) {
        //            $sform = new \XoopsThemeForm( _AM_WFL_CCATEGORY_MODIFY, "category", "category.php" );
        //            ob_start();
        //            $mytree -> makeMySelBox( "title", "title" );
        //            $sform -> addElement( new \XoopsFormLabel( _AM_WFL_CCATEGORY_MODIFY_TITLE, ob_get_contents() ) );
        //            ob_end_clean();
        //            $dup_tray = new \XoopsFormElementTray( '', '' );
        //            $dup_tray -> addElement( new \XoopsFormHidden( 'op', 'modCat' ) );
        //            $butt_dup = new \XoopsFormButton( '', '', _AM_WFL_BMODIFY, 'submit' );
        //            $butt_dup -> setExtra( 'onclick="this.form.elements.op.value=\'modCat\'"' );
        //            $dup_tray -> addElement( $butt_dup );
        //            $butt_dupct = new \XoopsFormButton( '', '', _AM_WFL_BDELETE, 'submit' );
        //            $butt_dupct -> setExtra( 'onclick="this.form.elements.op.value=\'del\'"' );
        //            $dup_tray -> addElement( $butt_dupct );
        //            $sform -> addElement( $dup_tray );
        //            $sform -> display();
        //        }

        if ($totallinks > 0) {
            $sql                   = 'SELECT * FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE published > 0  ORDER BY lid DESC';
            $published_array       = $xoopsDB->query($sql, $helper->getConfig('admin_perpage'), $start);
            $published_array_count = $xoopsDB->getRowsNum($xoopsDB->query($sql));
            Wflinks\Utility::getLinkListHeader(_AM_WFL_MINDEX_PUBLISHEDLINK);
            Wflinks\Utility::getLinkListPageNavLeft($published_array_count, $start, 'art');
            if ($published_array_count > 0) {
                while (false !== ($published = $xoopsDB->fetchArray($published_array))) {
                    Wflinks\Utility::getLinkListBody($published);
                }
            } else {
                Wflinks\Utility::getLinkListFooter();
            }
            Wflinks\Utility::getLinkListPageNav($published_array_count, $start, 'art');
        }
        require_once __DIR__ . '/admin_footer.php';
        break;
}
