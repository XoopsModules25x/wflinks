<?php
/**
 * $Id: singlelink.php v 1.00 21 June 2005 John N Exp $
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

include 'header.php';

global $xoopsTpl, $xoTheme;

$lid = intval( wfl_cleanRequestVars( $_REQUEST, 'lid', 0 ) );
$cid = intval( wfl_cleanRequestVars( $_REQUEST, 'cid', 0 ) );

$sql2 = "SELECT count(*) FROM " . $xoopsDB -> prefix( 'wflinks_links' ) . " a LEFT JOIN "
      . $xoopsDB -> prefix( 'wflinks_altcat' ) . " b "
      . " ON b.lid = a.lid"
      . " WHERE a.published > 0 AND a.published <= " . time()
      . " AND (a.expired = 0 OR a.expired > " . time() . ") AND a.offline = 0"
      . " AND (b.cid=a.cid OR (a.cid=" . intval($cid) . " OR b.cid=" . intval($cid) . "))";
list( $count ) = $xoopsDB -> fetchRow( $xoopsDB -> query( $sql2 ) );

if ( false == wfl_checkgroups( $cid = 0 ) && $count == 0  ) {
    redirect_header( 'index.php', 1, _MD_WFL_MUSTREGFIRST );
    exit();
}

$sql = "SELECT * FROM " . $xoopsDB -> prefix( 'wflinks_links' ) . " WHERE lid=" . intval($lid) . "
        AND (published > 0 AND published <= " . time() . ")
        AND (expired = 0 OR expired > " . time() . ")
        AND offline = 0
        AND cid > 0";
$result = $xoopsDB -> query( $sql );
$link_arr = $xoopsDB -> fetchArray( $result );

if ( !is_array( $link_arr ) ) {
    redirect_header( 'index.php', 1, _MD_WFL_NOLINKLOAD );
    exit();
}

$xoopsOption['template_main'] = 'wflinks_singlelink.tpl';

include XOOPS_ROOT_PATH . '/header.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule -> getvar( 'dirname' ) . '/sbookmarks.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule -> getvar( 'dirname' ) . '/include/address.php';

// tags support
if (wfl_tag_module_included()) {
  include_once XOOPS_ROOT_PATH . "/modules/tag/include/tagbar.php";
  $xoopsTpl -> assign('tagbar', tagBar($link_arr['lid'], 0));
}

//$link['imageheader'] = wfl_imageheader();
$link['id'] = $link_arr['lid'];
$link['cid'] = $link_arr['cid'];
$link['description2'] = $wfmyts -> displayTarea( $link_arr['description'], 1, 1, 1, 1, 1 );
$link['sbmarks'] = wflinks_sbmarks($link_arr['lid']);

// Address
$street1 = $link_arr['street1'];
$street2 = $link_arr['street2'];
$town = $link_arr['town'];
$state = $link_arr['state'];
$zip = $link_arr['zip'];
$tel = $link_arr['tel'];
$mobile = $link_arr['mobile'];
$voip = $link_arr['voip'];
$fax = $link_arr['fax'];
$email = $link_arr['email'];
$vat = $link_arr['vat'];
$country = wfl_countryname( $link_arr['country'] );

if ($street1 == '' || $town == '' || $xoopsModuleConfig['useaddress'] == 0) {
  $link['addryn'] = 0;
} else {
  $link['addryn'] = 1;
  $link['address'] = '<br />' . wfl_address( $street1, $street2, $town, $state, $zip, $country ) . '<br />' . $country;
}

if ($xoopsModuleConfig['useaddress'] == 1) {
  $link['addryn'] = 1;

  if ($link_arr['tel'] == true) {
    $link['tel'] = '<br />' . '<img src="' . XOOPS_URL . '/modules/' . $xoopsModule -> getvar( 'dirname' ) . '/assets/images/icon/telephone.png" title="'._MD_WFL_TELEPHONE.'" alt="'._MD_WFL_TELEPHONE.'" align="absmiddle" />&nbsp;' . $tel;
  }

  if ($link_arr['mobile'] == true) {
    $link['mobile'] = '<br />' . '<img src="' . XOOPS_URL . '/modules/' . $xoopsModule -> getvar( 'dirname' ) . '/assets/images/icon/phone.png" title="'._MD_WFL_MOBILE.'" alt="'._MD_WFL_MOBILE.'" align="absmiddle" />&nbsp;' . $mobile;
  }

  if ($link_arr['voip'] == true) {
    $link['voip'] = '<br />' .'<img src="' . XOOPS_URL . '/modules/' . $xoopsModule -> getvar( 'dirname' ) . '/assets/images/icon/voip.png" title="'._MD_WFL_VOIP.'" alt="'._MD_WFL_VOIP.'" align="absmiddle" />&nbsp;'  . $voip;
  }

  if ($link_arr['fax'] == true) {
    $link['fax'] = '<br />' . '<img src="' . XOOPS_URL . '/modules/' . $xoopsModule -> getvar( 'dirname' ) . '/assets/images/icon/fax.png" title="'._MD_WFL_FAX.'" alt="'._MD_WFL_FAX.'" align="absmiddle" />&nbsp;' . $fax;
  }

  if ($link_arr['email'] == true) {
    $link['email'] = '<br />' . '<img src="' . XOOPS_URL . '/modules/' . $xoopsModule -> getvar( 'dirname' ) . '/assets/images/icon/email.png" title="'._MD_WFL_EMAIL . '" alt="' ._MD_WFL_EMAIL.'" align="absmiddle" />&nbsp;' . $email;
  }

  if ($link_arr['vat'] == true) {
    $link['vat'] = '<br />' . _MD_WFL_VAT . ':&nbsp;' . $vat;
  }
}

if ($link_arr['street1'] == true || $link_arr['tel'] == true || $link_arr['mobile'] == true || $link_arr['fax'] == true || $link_arr['email'] == true) {
  $xoopsTpl -> assign( 'contactdetails', '<b>' . _MD_WFL_ADDRESS . '</b>' );
  $xoopsTpl -> assign( 'vcard' , '<br />' . '<a href="' . XOOPS_URL . '/modules/' . $xoopsModule -> getvar( 'dirname' ) . '/vcard.php?lid=' . $link_arr['lid'] .'"><img src="' . XOOPS_URL . '/modules/' . $xoopsModule -> getvar( 'dirname' ) . '/assets/images/icon/vcard.png" title="vCard" alt="vCard" /></a>' );
}

// Maps
if ($xoopsModuleConfig['useaddress'] == 1) {
  $googlemap = $link_arr['googlemap'];
  $yahoomap = $link_arr['yahoomap'];
  $mslivemap = $link_arr['multimap'];

  if ($link_arr['googlemap'] == true) {
    $link['googlemap'] = '<a href="' . $googlemap . '" target="_blank"><img src="' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/assets/images/icon/google_map.png" alt="' . _MD_WFL_GETMAP . '" title="' . _MD_WFL_GETMAP . '" align="absmiddle"/></a>&nbsp;';
  }

  if ($link_arr['yahoomap'] == true) {
    $link['yahoomap'] = '<a href="' . $yahoomap . '" target="_blank"><img src="' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/assets/images/icon/yahoo_map.png" alt="' . _MD_WFL_GETMAP . '" title="' . _MD_WFL_GETMAP . '" align="absmiddle"/></a>&nbsp;';
  }

  if ($link_arr['multimap'] == true) {
    $link['multimap'] = '<a href="' . $multimap . '" target="_blank"><img src="' . XOOPS_URL . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/assets/images/icon/multimap.png" alt="' . _MD_WFL_GETMAP . '" title="' . _MD_WFL_GETMAP . '" align="absmiddle"/></a>';
  }
}

$mytree = new XoopsTree( $xoopsDB -> prefix( 'wflinks_cat' ), 'cid', 'pid' );
$pathstring = "<a href='index.php'>" . _MD_WFL_MAIN . "</a>&nbsp;:&nbsp;";
$pathstring .= $mytree -> getNicePathFromId( $link['cid'], "title", "viewcat.php?op=" );
$link['path'] = $pathstring;

// Start of meta tags
$maxWords = 100;
$words = array();
$words = explode( ' ', wfl_html2text( $link_arr['description'] ) );
$newWords = array();
$i = 0;

while ( $i < $maxWords-1 && $i < count($words) ) {
if ( isset( $words[$i] ) ) {
  $newWords[] = trim( $words[$i] );
  }
++$i;
}
$link_meta_description = implode( ' ', $newWords );

if ( is_object($xoTheme) ) {
  $xoTheme -> addMeta( 'meta', 'keywords', $link_arr['keywords'] );
  $xoTheme -> addMeta( 'meta', 'title', $link_arr['title'] );
  $xoTheme -> addMeta( 'meta', 'description', $link_meta_description );
} else {
  $xoopsTpl -> assign( 'xoops_meta_keywords', $link_arr['keywords'] );
  $xoopsTpl -> assign( 'xoops_meta_description', $link_meta_description );
}
$xoopsTpl -> assign( 'xoops_pagetitle', $link_arr['title'] );
// End of meta tags

$moderate = 0;
$res_type = 1;
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule -> getvar( 'dirname' ) . '/include/linkloadinfo.php';

$xoopsTpl -> assign( 'show_screenshot', false );
if ( isset( $xoopsModuleConfig['screenshot'] ) && $xoopsModuleConfig['screenshot'] == 1 ) {
    $xoopsTpl -> assign( 'shots_dir', $xoopsModuleConfig['screenshots'] );
    $xoopsTpl -> assign( 'shotwidth', $xoopsModuleConfig['shotwidth'] );
    $xoopsTpl -> assign( 'shotheight', $xoopsModuleConfig['shotheight'] );
    $xoopsTpl -> assign( 'show_screenshot', true );
}

// Show other author links
$sql = "SELECT lid, cid, title, published FROM " . $xoopsDB -> prefix( 'wflinks_links' ) . "
    WHERE submitter=" . $link_arr['submitter'] . "
    AND published > 0 AND published <= " . time() . " AND (expired = 0 OR expired > " . time() . ")
    AND offline = 0 ORDER by published DESC";
$result = $xoopsDB -> query( $sql, 10, 0 );

while ( $arr = $xoopsDB -> fetchArray( $result ) ) {
    $linkuid['title'] = $wfmyts -> htmlSpecialCharsStrip( $arr['title'] );
    $linkuid['lid'] = $arr['lid'];
    $linkuid['cid'] = $arr['cid'];
    $linkuid['published'] = formatTimestamp( $arr['published'], $xoopsModuleConfig['dateformat'] );
    $xoopsTpl -> append( 'link_uid', $linkuid );
}

// Copyright notice
if ( isset( $xoopsModuleConfig['copyright'] ) && $xoopsModuleConfig['copyright'] == 1 ) {
    $xoopsTpl -> assign( 'lang_copyright', "" . $link['title'] . " &copy; " . _MD_WFL_COPYRIGHT . " " . formatTimestamp( time(), "Y" ) . " - <a href='" . XOOPS_URL . "'>" . $xoopsConfig['sitename'] . "</a>" );
}

if ( isset( $xoopsModuleConfig['otherlinks'] ) && $xoopsModuleConfig['otherlinks'] == 1 ) {
    $xoopsTpl -> assign( 'other_links', "" . "<b>" ._MD_WFL_OTHERBYUID . "</b>"  . $link['submitter'] . "<br />" );
}

$link['otherlinx'] = $xoopsModuleConfig['otherlinks'];
$link['showsbookmarx'] = $xoopsModuleConfig['showsbookmarks'];
$link['showpagerank'] = $xoopsModuleConfig['showpagerank'];
$xoopsTpl -> assign( 'wfllink', $link );

$xoopsTpl -> assign( 'back' , '<a href="javascript:history.go(-1)"><img src="' . XOOPS_URL . '/modules/' . $xoopsModule -> getvar( 'dirname' ) . '/assets/images/icon/back.png" /></a>' ); // Displays Back button

$xoopsTpl -> assign( 'module_dir', $xoopsModule -> getVar( 'dirname' ) );

include XOOPS_ROOT_PATH . '/include/comment_view.php';
include XOOPS_ROOT_PATH . '/footer.php';
