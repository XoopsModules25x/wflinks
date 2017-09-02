<?php
/**
 * $Id: indexpage.php 9706 2012-06-24 20:24:10Z beckmi $
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

include 'admin_header.php';

global $xoopsModuleConfig;

$op = wfl_cleanRequestVars( $_REQUEST, 'op', '' );
$cid = wfl_cleanRequestVars( $_REQUEST, 'cid', 0 );

switch ( strtolower( $op ) ) {
    case "save":
        $indexheading = $wfmyts -> addslashes( xoops_trim($_REQUEST['indexheading']) );
        $indexheader = $wfmyts -> addslashes( xoops_trim($_REQUEST['indexheader']) );
        $indexfooter = $wfmyts -> addslashes( xoops_trim($_REQUEST['indexfooter']) );
        $indeximage = $wfmyts -> addslashes( $_REQUEST['indeximage'] );
        $nohtml = isset( $_REQUEST['nohtml'] ) ? 1 : 0;
        $nosmiley = isset( $_REQUEST['nosmiley'] ) ? 1 : 0;
        $noxcodes = isset( $_REQUEST['noxcodes'] ) ? 1 : 0;
        $noimages = isset( $_REQUEST['noimages'] ) ? 1 : 0;
        $nobreak = isset( $_REQUEST['nobreak'] ) ? 1 : 0;
        $indexheaderalign = $wfmyts -> addslashes( $_REQUEST['indexheaderalign'] );
        $indexfooteralign = $wfmyts -> addslashes( $_REQUEST['indexfooteralign'] );
        $lastlinksyn = $_REQUEST['lastlinksyn'];
        $lastlinkstotal = $wfmyts -> addslashes( $_REQUEST['lastlinkstotal'] );
        $sql = "UPDATE " . $xoopsDB -> prefix( 'wflinks_indexpage' ) . " set indexheading='$indexheading', indexheader='$indexheader', indexfooter='$indexfooter', indeximage='$indeximage', indexheaderalign='$indexheaderalign ', indexfooteralign='$indexfooteralign', nohtml='$nohtml', nosmiley='$nosmiley', noxcodes='$noxcodes', noimages='$noimages', nobreak='$nobreak', lastlinksyn='$lastlinksyn', lastlinkstotal='$lastlinkstotal'";
        if ( !$result = $xoopsDB -> query( $sql ) ) {
            XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
            return false;
        } 
        redirect_header( "index.php", 1, _AM_WFL_IPAGE_UPDATED );
        break;

    default:
        $sql = "SELECT indeximage, indexheading, indexheader, indexfooter, nohtml, nosmiley, noxcodes, noimages, nobreak, indexheaderalign, indexfooteralign, lastlinksyn, lastlinkstotal FROM " . $xoopsDB -> prefix( 'wflinks_indexpage' );
        if ( !$result = $xoopsDB -> query( $sql ) ) {
            XoopsErrorHandler_HandleError( E_USER_WARNING, $sql, __FILE__, __LINE__ );
            return false;
        } 
        list( $indeximage, $indexheading, $indexheader, $indexfooter, $nohtml, $nosmiley, $noxcodes, $noimages, $nobreak, $indexheaderalign, $indexfooteralign, $lastlinksyn, $lastlinkstotal ) = $xoopsDB -> fetchrow( $result );

        xoops_cp_header();

        echo "
		 <fieldset><legend style='font-weight: bold; color: #0A3760;'>" . _AM_WFL_IPAGE_INFORMATION . "</legend>\n
		 <div style='padding: 8px;'>" . _AM_WFL_MINDEX_PAGEINFOTXT . "</div>\n
		 </fieldset><br />\n
		";

        $sform = new XoopsThemeForm( _AM_WFL_IPAGE_MODIFY, "op", xoops_getenv( 'PHP_SELF' ) );
        $sform -> addElement( new XoopsFormText( _AM_WFL_IPAGE_CTITLE, 'indexheading', 60, 60, $indexheading ), false );
        $graph_array = &wflLists :: getListTypeAsArray( XOOPS_ROOT_PATH . "/" . $xoopsModuleConfig['mainimagedir'], $type = "images" );
        $indeximage_select = new XoopsFormSelect( '', 'indeximage', $indeximage );
        $indeximage_select -> addOptionArray( $graph_array );
        $indeximage_select -> setExtra( "onchange='showImgSelected(\"image\", \"indeximage\", \"" . $xoopsModuleConfig['mainimagedir'] . "\", \"\", \"" . XOOPS_URL . "\")'" );
        $indeximage_tray = new XoopsFormElementTray( _AM_WFL_IPAGE_CIMAGE, '&nbsp;' );
        $indeximage_tray -> addElement( $indeximage_select );
        if ( !empty( $indeximage ) ) {
            $indeximage_tray -> addElement( new XoopsFormLabel( '', "<br /><br /><img src='" . XOOPS_URL . "/" . $xoopsModuleConfig['mainimagedir'] . "/" . $indeximage . "' name='image' id='image' alt='' />" ) );
        } else {
            $indeximage_tray -> addElement( new XoopsFormLabel( '', "<br /><br /><img src='" . XOOPS_URL . "/uploads/blank.gif' name='image' id='image' alt='' />" ) );
        } 
        $sform -> addElement( $indeximage_tray );

        $editor = wfl_getWysiwygForm( _AM_WFL_IPAGE_CHEADING, 'indexheader', $indexheader, 15, 60, '');
        $sform -> addElement($editor,false);

        $headeralign_select = new XoopsFormSelect( _AM_WFL_IPAGE_CHEADINGA, "indexheaderalign", $indexheaderalign );
        $headeralign_select -> addOptionArray( array( "left" => _AM_WFL_IPAGE_CLEFT, "right" => _AM_WFL_IPAGE_CRIGHT, "center" => _AM_WFL_IPAGE_CCENTER ) );
        $sform -> addElement( $headeralign_select );
        $sform -> addElement( new XoopsFormTextArea( _AM_WFL_IPAGE_CFOOTER, 'indexfooter', $indexfooter, 10, 60 ) );
        $footeralign_select = new XoopsFormSelect( _AM_WFL_IPAGE_CFOOTERA, "indexfooteralign", $indexfooteralign );
        $footeralign_select -> addOptionArray( array( "left" => _AM_WFL_IPAGE_CLEFT, "right" => _AM_WFL_IPAGE_CRIGHT, "center" => _AM_WFL_IPAGE_CCENTER ) );
        $sform -> addElement( $footeralign_select );

        $options_tray = new XoopsFormElementTray( _AM_WFL_TEXTOPTIONS, '<br />' );
	//html option
        $html_checkbox = new XoopsFormCheckBox( '', 'nohtml', $nohtml );
        $html_checkbox -> addOption( 1, _AM_WFL_DISABLEHTML );
        $options_tray -> addElement( $html_checkbox );
	//smiley option
        $smiley_checkbox = new XoopsFormCheckBox( '', 'nosmiley', $nosmiley );
        $smiley_checkbox -> addOption( 1, _AM_WFL_DISABLESMILEY );
        $options_tray -> addElement( $smiley_checkbox );
	//xcodes option
        $xcodes_checkbox = new XoopsFormCheckBox( '', 'noxcodes', $noxcodes );
        $xcodes_checkbox -> addOption( 1, _AM_WFL_DISABLEXCODE );
        $options_tray -> addElement( $xcodes_checkbox );
	//noimages option
        $noimages_checkbox = new XoopsFormCheckBox( '', 'noimages', $noimages );
        $noimages_checkbox -> addOption( 1, _AM_WFL_DISABLEIMAGES );
        $options_tray -> addElement( $noimages_checkbox );
	//breaks option
        $breaks_checkbox = new XoopsFormCheckBox( '', 'nobreak', $nobreak );
        $breaks_checkbox -> addOption( 1, _AM_WFL_DISABLEBREAK );
        $options_tray -> addElement( $breaks_checkbox );
        $sform -> addElement( $options_tray );
        
        $sform -> addElement(  new XoopsFormRadioYN( _AM_WFL_IPAGE_SHOWLATEST, 'lastlinksyn', $lastlinksyn, ' ' . _YES . '', ' ' . _NO . '' ) );

        $lastlinkstotalform = new XoopsFormText( _AM_WFL_IPAGE_LATESTTOTAL, 'lastlinkstotal', 2, 2, $lastlinkstotal );
		$lastlinkstotalform -> setDescription( "<small>" . _AM_WFL_IPAGE_LATESTTOTAL_DSC . "</small>");
        $sform -> addElement( $lastlinkstotalform, false );

        $button_tray = new XoopsFormElementTray( '', '' );
        $hidden = new XoopsFormHidden( 'op', 'save' );
        $button_tray -> addElement( $hidden );
        $button_tray -> addElement( new XoopsFormButton( '', 'post', _AM_WFL_BSAVE, 'submit' ) );
        $sform -> addElement( $button_tray );
        $sform -> display();
        break;
} 
include_once 'admin_footer.php';

?>
