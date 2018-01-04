<?php
/**
 *
 * Module: WF-Links
 * Developer: McDonald
 * Licence: GNU
 */

use XoopsModules\Wflinks;

$moduleDirName = basename(__DIR__);

require_once __DIR__ . '/header.php';
require_once XOOPS_ROOT_PATH . '/class/template.php';

$lid = Wflinks\Utility::cleanRequestVars($_REQUEST, 'lid', 0);
$lid = (int)$lid;

$error_message = _MD_WFL_NOITEMSELECTED;
if (0 == $lid) {
    redirect_header('javascript:history.go(-1)', 1, $error_message);
}

global $xoopsDB, $xoopsConfig, $xoopsModuleConfig, $xoopsModule;

$result = $xoopsDB->query('SELECT * FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE published > 0 AND published <= ' . time() . ' AND offline = 0 AND lid=' . $lid);
$myrow  = $xoopsDB->fetchArray($result);

$result2 = $xoopsDB->query('SELECT title FROM ' . $xoopsDB->prefix('wflinks_cat') . ' WHERE cid=' . $myrow['cid']);
$mycat   = $xoopsDB->fetchArray($result2);

$xoopsTpl = new \XoopsTpl();
$myts     = \MyTextSanitizer::getInstance();

$xoopsTpl->assign('printsitename', XOOPS_URL);
$xoopsTpl->assign('printcategoryname', $mycat['title']);

if ($xoopsModuleConfig['screenshot']) {
    if ($xoopsModuleConfig['useautothumb']) {
        $xoopsTpl->assign('printscrshot', '<img src="http://mozshot.nemui.org/shot/200x200?' . $myrow['url'] . '" alt="" title="" border="0">');
    } else {
        $xoopsTpl->assign('printscrshot', '<img src="' . XOOPS_URL . '/' . $xoopsModuleConfig['screenshots'] . '/' . $myrow['screenshot'] . '" alt="" title="" border="0">');
    }
}

$xoopsTpl->assign('printtitle', $myts->displayTarea($myrow['title']));
$xoopsTpl->assign('printdescription', $myrow['description']);
$xoopsTpl->assign('printfooter', $xoopsModuleConfig['footerprint']);
$xoopsTpl->assign('lang_category', _MD_WFL_CATEGORY);

if ($xoopsModuleConfig['printlogourl']) {
    $xoopsTpl->assign('printlogo', '<img src="' . $xoopsModuleConfig['printlogourl'] . '" alt="" title="" border="0">');
} else {
    $xoopsTpl->assign('printlogo', '');
}

require_once XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/include/address.php';
$street1 = $myrow['street1'];
$street2 = $myrow['street2'];
$town    = $myrow['town'];
$state   = $myrow['state'];
$zip     = $myrow['zip'];
$tel     = $myrow['tel'];
$mobile  = $myrow['mobile'];
$voip    = $myrow['voip'];
$fax     = $myrow['fax'];
$url     = $myrow['url'];
$email   = Wflinks\Utility::printemailcnvrt($myrow['email']);
$country = Wflinks\Utility::getCountryName($myrow['country']);

if ('' === $street1 || '' === $town || 0 == $xoopsModuleConfig['useaddress']) {
    $print['addryn'] = 0;
} else {
    $print['addryn']  = 1;
    $address          = wfl_address($street1, $town, $state, $zip, $country);
    $print['address'] = '<b>' . _MD_WFL_ADDRESS . '</b><br>' . wfl_address($street1, $street2, $town, $state, $zip, $country) . '<br>' . $country;
    if ('' === $tel) {
        $print['tel'] = '';
    } else {
        $print['tel'] = '<br>' . '<img src="' . XOOPS_URL . '/modules/' . $moduleDirName . '/assets/images/icon/telephone.png" title="" alt="" align="absmiddle">&nbsp;' . $tel;
    }
    if ('' === $mobile) {
        $print['mobile'] = '';
    } else {
        $print['mobile'] = '<br>' . '<img src="' . XOOPS_URL . '/modules/' . $moduleDirName . '/assets/images/icon/phone.png" title="" alt="" align="absmiddle">&nbsp;' . $mobile;
    }
    if ('' === $voip) {
        $print['voip'] = '';
    } else {
        $print['voip'] = '<br>' . '<img src="' . XOOPS_URL . '/modules/' . $moduleDirName . '/assets/images/icon/voip.png" title="" alt="" align="absmiddle">&nbsp;' . $voip;
    }
    if ('' === $fax) {
        $print['fax'] = '';
    } else {
        $print['fax'] = '<br>' . '<img src="' . XOOPS_URL . '/modules/' . $moduleDirName . '/assets/images/icon/fax.png" title="" alt="" align="absmiddle">&nbsp;' . $fax;
    }
    if ('' === $email) {
        $print['email'] = '';
    } else {
        $print['email'] = '<br>' . '<img src="' . XOOPS_URL . '/modules/' . $moduleDirName . '/assets/images/icon/email.png" title="" alt="" align="absmiddle">&nbsp;' . $email;
    }
}
$xoopsTpl->assign('print', $print);

$xoopsTpl->assign('worldwideweb', '<br>' . '<img src="' . XOOPS_URL . '/modules/' . $moduleDirName . '/assets/images/icon/world.png" title="" alt="" align="absmiddle">&nbsp;' . $url);

// Start of meta tags
global $xoopsTpl, $xoTheme;

$maxWords = 100;
$words    = [];
$words    = explode(' ', Wflinks\Utility::convertHtml2text($myrow['description']));
$newWords = [];
$i        = 0;

while ($i < $maxWords - 1 && $i < count($words)) {
    if (isset($words[$i])) {
        $newWords[] = trim($words[$i]);
    }
    ++$i;
}

$link_meta_description = implode(' ', $newWords);

if (is_object($xoTheme)) {
    $xoTheme->addMeta('meta', 'keywords', $myrow['keywords']);
    $xoTheme->addMeta('meta', 'title', $myrow['title']);
    $xoTheme->addMeta('meta', 'description', $link_meta_description);
} else {
    $xoopsTpl->assign('xoops_meta_keywords', $myrow['keywords']);
    $xoopsTpl->assign('xoops_meta_description', $link_meta_description);
}
$xoopsTpl->assign('xoops_pagetitle', $myrow['title']);
$xoopsTpl->assign('xoops_meta_author', $myrow['publisher']);
$xoopsTpl->assign('xoops_sitename', $xoopsConfig['sitename']);
$xoopsTpl->assign('xoops_meta_robots', 'noindex,nofollow');
$xoopsTpl->assign('xoops_meta_copyright', $xoopsConfig['sitename']);
// End of meta tags

$xoopsTpl->assign('module_dir', $moduleDirName);
$xoopsTpl->display('db:wflinks_print.tpl');
