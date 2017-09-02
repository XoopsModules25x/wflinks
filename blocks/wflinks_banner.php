<?php
/**
 * $Id: wflinks_banner.php v 1.00 McDonald $
 * Module: WF-links
 * Developer: McDonald
 * Licence: GNU
 */

defined('XOOPS_ROOT_PATH') || die('XOOPS root path not defined');

function b_wflinks_banner_show( $options )
{
    $mydirname = basename( dirname( __FILE__ ) );
    global $xoopsDB;

    $block = array();
    $time = time();
    $modhandler = xoops_gethandler( 'module' );
    $wflModule = $modhandler -> getByDirname( $mydirname );

    $result = $xoopsDB -> query( "SELECT a.cid as acid, a.title, a.client_id, a.banner_id, b.bid, b.cid, b.imptotal, b.impmade, b.clicks FROM " . $xoopsDB -> prefix( 'wflinks_cat' ) . " a, " . $xoopsDB -> prefix( 'banner' ) . " b WHERE (b.cid = a.client_id) OR (b.bid = a.banner_id) ORDER BY b.cid, b.bid, a.title ASC" );

    while ( $myrow = $xoopsDB -> fetchArray( $result ) ) {

        $impmade = $myrow['impmade'];
        $clicks = $myrow['clicks'];
        $imptotal = $myrow['imptotal'];
        $bannerload = array();
        $result2 = $xoopsDB -> query( "SELECT name FROM " . $xoopsDB -> prefix( 'bannerclient' ) . " WHERE cid=" . intval($myrow['cid']) );
        $myclient = $xoopsDB -> fetchArray( $result2 );
        if ($impmade == 0) {
            $percent = 0;
        } else {
            $percent = substr(100 * $clicks / $impmade, 0, 5);
        }
        if ($imptotal == 0) {
            $left = 'Unlimited';
        } else {
            $left = intval($imptotal-$impmade);
        }
        $bannerload['cat'] = intval($myrow['acid']);
        $bannerload['bid'] = intval($myrow['bid']);
        $bannerload['cid'] = intval($myrow['cid']);
        $bannerload['imptotal'] = intval($myrow['imptotal']);
        $bannerload['impmade'] = intval($myrow['impmade']);
        $bannerload['impleft'] = $left;
        $bannerload['clicks'] = intval($myrow['clicks']);
        $bannerload['client'] = $myclient['name'];
        $bannerload['percent'] = $percent;
        $bannerload['cattitle'] = $myrow['title'];
        $bannerload['dirname'] = $wflModule -> getVar( 'dirname' );
        $block['banners'][] = $bannerload;
    }
    unset( $_block_check_array );

    return $block;
}

function b_wflinks_banner_edit( $options )
{
    $form = "";

    return $form;
}
