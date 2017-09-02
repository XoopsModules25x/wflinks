<?php
/**
 * $Id: ratelink.php 9692 2012-06-23 18:19:45Z beckmi $
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

include 'header.php';

global $wfmyts, $xoTheme;

// Check if linkload POSTER is voting (UNLESS Anonymous users allowed to post)
$lid = wfl_cleanRequestVars( $_REQUEST, 'lid', 0 );
$lid = intval($lid);

$ip = getenv( "REMOTE_ADDR" );
$ratinguser = ( !is_object( $xoopsUser ) ) ? 0 : $xoopsUser -> getVar( 'uid' );

if ( $ratinguser != 0 ) {
    $result = $xoopsDB -> query( "SELECT cid, submitter FROM " . $xoopsDB -> prefix( 'wflinks_links' ) . " WHERE lid=" . intval($lid) );
    while ( list( $cid, $ratinguserDB ) = $xoopsDB -> fetchRow( $result ) ) {
        if ( $ratinguserDB == $ratinguser ) {
            $ratemessage = _MD_WFL_CANTVOTEOWN;
            redirect_header( 'singlelink.php?cid=' . intval($cid) . '&amp;lid=' . intval($lid), 4, $ratemessage );
            exit();
        } 
    } 
    // Check if REG user is trying to vote twice.
    $result = $xoopsDB -> query( "SELECT cid, ratinguser FROM " . $xoopsDB -> prefix( 'wflinks_votedata' ) . " WHERE lid=" . intval($lid) );
    while ( list( $cid, $ratinguserDB ) = $xoopsDB -> fetchRow( $result ) ) {
        if ( $ratinguserDB == $ratinguser ) {
            $ratemessage = _MD_WFL_VOTEONCE;
            redirect_header( 'singlelink.php?cid=' . intval($cid) . '&amp;lid=' . intval($lid), 4, $ratemessage );
            exit();
        } 
    } 
} else {
    // Check if ANONYMOUS user is trying to vote more than once per day.
    $yesterday = ( time() - ( 86400 * $anonwaitdays ) );
    $result = $xoopsDB -> query( "SELECT COUNT(*) FROM " . $xoopsDB -> prefix( 'wflinks_votedata' ) . " WHERE lid=" . intval($lid) . " AND ratinguser=0 AND ratinghostname=" . $ip . "  AND ratingtimestamp > " . $yesterday );
    list( $anonvotecount ) = $xoopsDB -> fetchRow( $result );
    if ( $anonvotecount >= 1 ) {
        redirect_header( 'singlelink.php?cid=' . intval($cid) . '&amp;lid=' . intval($lid), 4, _MD_WFL_VOTEONCE );
        exit();
    }
}

if ( !empty( $_POST['submit'] ) ) {
    $ratinguser = ( !is_object( $xoopsUser ) ) ? 0 : $xoopsUser -> getVar( 'uid' );
    // Make sure only 1 anonymous from an IP in a single day.
    $anonwaitdays = 1;
    $ip = getenv( "REMOTE_ADDR" );
    $lid = wfl_cleanRequestVars( $_REQUEST, 'lid', 0 );
    $cid = wfl_cleanRequestVars( $_REQUEST, 'cid', 0 );
    $rating = wfl_cleanRequestVars( $_REQUEST, 'rating', 0 );
    $title = $wfmyts -> addslashes( trim($_POST['title']) );
    $lid = intval($lid);
    $cid = intval($cid);
    $rating = intval($rating);
    // Check if Rating is Null
    if ( $rating == "--" ) {
        redirect_header( 'ratelink.php?cid=' . intval($cid) . '&amp;lid=' . intval($lid), 4, _MD_WFL_NORATING );
        exit();
    }
    // All is well.  Add to Line Item Rate to DB.
    $newid = $xoopsDB -> genId( $xoopsDB -> prefix( 'wflinks_votedata' ) . "_ratingid_seq" );
    $datetime = time();
    $sql = sprintf( "INSERT INTO %s (ratingid, lid, ratinguser, rating, ratinghostname, ratingtimestamp, title) VALUES (%u, %u, %u, %u, %s, %u, %s)", $xoopsDB -> prefix( 'wflinks_votedata' ), $newid, intval($lid), $ratinguser, $rating, $xoopsDB -> quoteString( $ip ), $datetime, $xoopsDB -> quoteString( $title ) );
    if ( !$result = $xoopsDB -> query( $sql ) ) {
        $ratemessage = _MD_WFL_ERROR;
    } else {
        // All is well.  Calculate Score & Add to Summary (for quick retrieval & sorting) to DB.
        wfl_updaterating( $lid );
        $ratemessage = _MD_WFL_VOTEAPPRE . "<br />" . sprintf( _MD_WFL_THANKYOU, $xoopsConfig['sitename'] );
    }
    redirect_header( 'singlelink.php?cid=' . intval($cid) . '&amp;lid=' . intval($lid), 4, $ratemessage );
    exit();
} else {
    $xoopsOption['template_main'] = 'wflinks_ratelink.html';
    include XOOPS_ROOT_PATH . '/header.php';

    $catarray['imageheader'] = wfl_imageheader();
    $cid = wfl_cleanRequestVars( $_REQUEST, 'cid', 0 );
    $cid = intval($cid);

    $catarray['imageheader'] = wfl_imageheader();
    $catarray['letters'] = wfl_letters();
    $catarray['toolbar'] = wfl_toolbar();
    $xoopsTpl -> assign( 'catarray', $catarray );

    $result = $xoopsDB -> query( "SELECT title FROM " . $xoopsDB -> prefix( 'wflinks_links' ) . " WHERE lid=" . intval($lid) );
    list( $title ) = $xoopsDB -> fetchRow( $result );
    $xoopsTpl -> assign( 'link', array( 'id' => intval($lid), 'cid' => intval($cid), 'title' => $wfmyts -> htmlSpecialCharsStrip( $title ) ) );

    if ( is_object($xoTheme) ) {
      $xoTheme -> addMeta( 'meta', 'robots', 'noindex,nofollow' );
    } else {
      $xoopsTpl -> assign( 'xoops_meta_robots', 'noindex,nofollow' );
    }

	$xoopsTpl -> assign( 'module_dir', $xoopsModule -> getVar( 'dirname' ) );
    include XOOPS_ROOT_PATH . '/footer.php';
}

if ( is_object($xoTheme) ) {
    $xoTheme -> addMeta( 'meta', 'robots', 'noindex,nofollow' );
} else {
    $xoopsTpl -> assign( 'xoops_meta_robots', 'noindex,nofollow' );
}

$xoopsTpl -> assign( 'module_dir', $xoopsModule -> getVar( 'dirname' ) );
include XOOPS_ROOT_PATH . '/footer.php';
?>