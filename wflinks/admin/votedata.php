<?php
/**
 * $Id: votedata.php 9706 2012-06-24 20:24:10Z beckmi $
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

include 'admin_header.php';

$op = wfl_cleanRequestVars( $_REQUEST, 'op', '' );
$rid = wfl_cleanRequestVars( $_REQUEST, 'rid', 0 );
$lid = wfl_cleanRequestVars( $_REQUEST, 'lid', 0 );

switch ( strtolower($op) ) {
    case "delvote":
        $sql = "DELETE FROM " . $xoopsDB -> prefix( 'wflinks_votedata' ) . " WHERE ratingid=" . $rid;
        $result = $xoopsDB -> queryF( $sql );
        wfl_updaterating( $lid );
        redirect_header( "votedata.php", 1, _AM_WFL_VOTEDELETED );
        break;

    case 'main':
    default:
	$start = wfl_cleanRequestVars( $_REQUEST, 'start', 0 );
        xoops_cp_header();
        //wfl_adminmenu( _AM_WFL_VOTE_RATINGINFOMATION );
        $_vote_data = wfl_getVoteDetails( $lid );

        $text_info = "
		<table width='100%'>
		 <tr>
		  <td width='50%' valign='top'>
		   <div><b>" . _AM_WFL_VOTE_TOTALRATE . ": </b>" . intval( $_vote_data['rate'] ) . "</div>
		   <div><b>" . _AM_WFL_VOTE_USERAVG . ": </b>" . intval( round( $_vote_data['avg_rate'], 2 ) ) . "</div>
		   <div><b>" . _AM_WFL_VOTE_MAXRATE . ": </b>" . intval( $_vote_data['min_rate'] ) . "</div>
		   <div><b>" . _AM_WFL_VOTE_MINRATE . ": </b>" . intval( $_vote_data['max_rate'] ) . "</div>
		  </td>
		  <td>		 
		   <div><b>" . _AM_WFL_VOTE_MOSTVOTEDTITLE . ": </b>" . intval( $_vote_data['max_title'] ) . "</div>
           <div><b>" . _AM_WFL_VOTE_LEASTVOTEDTITLE . ": </b>" . intval( $_vote_data['min_title'] ) . "</div>
		   <div><b>" . _AM_WFL_VOTE_REGISTERED . ": </b>" . ( intval( $_vote_data['rate'] - $_vote_data['null_ratinguser'] ) ) . "</div>
		   <div><b>" . _AM_WFL_VOTE_NONREGISTERED . ": </b>" . intval( $_vote_data['null_ratinguser'] ) . "</div>
		  </td>
		 </tr>
		</table>";





        echo "
        <fieldset><legend style='font-weight: bold; color: #0A3760;'>" . _AM_WFL_VOTE_DISPLAYVOTES . "</legend>\n
		<div style='padding: 8px;'>$text_info</div>\n	
		<div style='padding: 8px;'><li>" . $imagearray['deleteimg'] . " " . _AM_WFL_VOTE_DELETEDSC . "</li></div>\n
		</fieldset>\n
		<br />\n

		<table width='100%' cellspacing='1' cellpadding='2' class='outer'>\n
		<tr>\n
		<th style='text-align: center;'>" . _AM_WFL_VOTE_ID . "</th>\n
		<th style='text-align: center;'>" . _AM_WFL_VOTE_USER . "</th>\n
		<th style='text-align: center;'>" . _AM_WFL_VOTE_IP . "</th>\n
		<th style='text-align: center;'>" . _AM_WFL_VOTE_FILETITLE . "</th>\n
		<th style='text-align: center;'>" . _AM_WFL_VOTE_RATING . "</th>\n
		<th style='text-align: center;'>" . _AM_WFL_VOTE_DATE . "</th>\n
		<th style='text-align: center;'>" . _AM_WFL_MINDEX_ACTION . "</th></tr>\n";

        $sql = "SELECT * FROM " . $xoopsDB -> prefix( 'wflinks_votedata' );
        if ( $lid > 0 ) {
            $sql .= " WHERE lid=" . $lid;
        } 
        $sql .= " ORDER BY ratingtimestamp DESC";

        $results = $xoopsDB -> query( $sql, $xoopsModuleConfig['admin_perpage'], $start );
        $votes = $xoopsDB -> getRowsNum( $xoopsDB -> query( $sql ) );

        if ( $votes == 0 ) {
            echo "<tr><td style='text-align: center;' colspan='7' class='head'>" . _AM_WFL_VOTE_NOVOTES . "</td></tr>";
        } else {
            while ( list( $ratingid, $lid, $ratinguser, $rating, $ratinghostname, $ratingtimestamp, $title ) = $xoopsDB -> fetchRow( $results ) ) {
                $formatted_date = formatTimestamp( $ratingtimestamp, $xoopsModuleConfig['dateformatadmin'] );
                $ratinguname = XoopsUser :: getUnameFromId( $ratinguser );
                echo "
					<tr style='text-align: center;'>\n
					<td class='head'>$ratingid</td>\n
					<td class='even'>$ratinguname</td>\n
					<td class='even'>$ratinghostname</td>\n
					<td class='even'>$title</td>\n
					<td class='even'>$rating</td>\n
					<td class='even'>$formatted_date</td>\n
					<td class='even'><a href='votedata.php?op=delvote&amp;lid=".$lid."&amp;rid=".$ratingid."'>" . $imagearray['deleteimg'] . "</a></td>\n
					</tr>\n";
            } 
        } 
        echo "</table>"; 
        // Include page navigation
        include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $page = ( $votes > $xoopsModuleConfig['admin_perpage'] ) ? _AM_WFL_MINDEX_PAGE : '';
        $pagenav = new XoopsPageNav( $page, $xoopsModuleConfig['admin_perpage'], $start, 'start' );
        echo '<div align="right" style="padding: 8px;">' . $pagenav -> renderNav() . '</div>';
        break;
} 
include_once 'admin_footer.php';

?>