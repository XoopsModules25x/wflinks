<?php
/**
 * $Id: wflinks_top.php v 1.00 21 June 2005 John N Exp $
 * Module: WF-links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

defined('XOOPS_ROOT_PATH') || die('XOOPS root path not defined');

// checkBlockgroups()
//
// @param integer $cid
// @param string $permType
// @param boolean $redirect
// @return
function checkBlockgroups( $cid = 0, $permType = 'WFLinkCatPerm', $redirect = false )
{
    $mydirname = basename( dirname(  dirname( __FILE__ ) ) );
    global $xoopsUser;

    $groups = is_object( $xoopsUser ) ? $xoopsUser -> getGroups() : XOOPS_GROUP_ANONYMOUS;
    $gperm_handler = &xoops_gethandler( 'groupperm' );

    $module_handler = &xoops_gethandler( 'module' );
    $module = &$module_handler -> getByDirname( $mydirname );

    if ( !$gperm_handler -> checkRight( $permType, $cid, $groups, $module -> getVar( 'mid' ) ) ) {
        if ($redirect == false) {
            return false;
        } else {
            redirect_header( 'index.php', 3, _NOPERM );
            exit();
        }
    }
    unset( $module );

    return true;
}

// Function: b_mylinks_top_show
// Input   : $options[0] = date for the most recent links
// 		           hits for the most popular links
//           $options[1] = How many links are displayes
//           $options[2] = Length of title
//           $options[3] = Date format
//           $block['content'] = The optional above content
// Output  : Returns the most recent or most popular links
function b_wflinks_top_show( $options )
{
    $mydirname = basename( dirname(  dirname( __FILE__ ) ) );
    global $xoopsDB;

    $block = array();
    $time = time();
    $modhandler = &xoops_gethandler( 'module' );
    $wflModule = &$modhandler -> getByDirname( $mydirname );
    $config_handler = &xoops_gethandler( 'config' );
    $wflModuleConfig = &$config_handler -> getConfigsByCat( 0, $wflModule -> getVar( 'mid' ) );
    $wfmyts = &MyTextSanitizer :: getInstance();

    $result = $xoopsDB -> query( "SELECT lid, cid, title, published, hits FROM " . $xoopsDB -> prefix( 'wflinks_links' ) . " WHERE published > 0 AND published <= " . $time . " AND (expired = 0 OR expired > " . $time . ") AND offline = 0 ORDER BY " . $options[0] . " DESC", $options[1], 0 );
    while ( $myrow = $xoopsDB -> fetchArray( $result ) ) {
        if ( false == checkBlockgroups( $myrow['cid'] ) || $myrow['cid'] == 0 ) {
            continue;
        }
        $linkload = array();
        $title = $wfmyts -> htmlSpecialChars( $wfmyts -> stripSlashesGPC( $myrow["title"] ) );
        if (!XOOPS_USE_MULTIBYTES) {
            if ( strlen( $myrow['title'] ) >= $options[2] ) {
                $title = substr( $myrow['title'], 0, ( $options[2] -1 ) ) . "...";
            }
        }
        $linkload['id'] = intval( $myrow['lid'] );
        $linkload['cid'] = intval( $myrow['cid'] );
        $linkload['title'] = $title;
        if ($options[0] == "published") {
            $linkload['date'] = formatTimestamp( $myrow['published'], $options[3] );
        } elseif ($options[0] == "hits") {
            $linkload['hits'] = $myrow['hits'];
        }
        $linkload['dirname'] = $wflModule -> getVar( 'dirname' );
        $block['links'][] = $linkload;
    }
    unset( $_block_check_array );

    return $block;
}

// b_wflinks_top_edit()
//
// @param $options
// @return
function b_wflinks_top_edit( $options )
{
    $form = "" . _MB_WFL_DISP . "&nbsp;";
    $form .= "<input type='hidden' name='options[]' value='";
    if ($options[0] == "published") {
        $form .= "published'";
    } else {
        $form .= "hits'";
    }
    $form .= " />";
    $form .= "<input type='text' name='options[]' value='" . $options[1] . "' />&nbsp;" . _MB_WFL_FILES . "";
    $form .= "&nbsp;<br />" . _MB_WFL_CHARS . "&nbsp;<input type='text' name='options[]' value='" . $options[2] . "' />&nbsp;" . _MB_WFL_LENGTH . "";
    $form .= "&nbsp;<br />" . _MB_WFL_DATEFORMAT . "&nbsp;<input type='text' name='options[]' value='" . $options[3] . "' />&nbsp;" . _MB_WFL_DATEFORMATMANUAL;

    return $form;
}
