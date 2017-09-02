<?php
/**
 * $Id: mylinks_update.php v 1.00 21 June 2005 John N Exp $
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */
include( "../header.php" );

global $xoopsDB, $xoopsConfig, $xoopsUser, $xoopsModule;

if ( !is_object( $xoopsUser ) || !is_object( $xoopsModule ) || !$xoopsUser -> isAdmin( $xoopsModule -> getVar( 'mid' ) ) )
{
    exit( "Access Denied" );
} 
include XOOPS_ROOT_PATH . '/header.php';

$error = array();
$output = array();

/**
 * Update broken links
 */
$result = $xoopsDB -> queryF( "ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_broken' ) . " ADD title varchar(255) NOT NULL default ''" );

$result = $xoopsDB -> queryF( "ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " DROP groupid" );
$result = $xoopsDB -> queryF( "ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " DROP subgroups" );
$result = $xoopsDB -> queryF( "ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " DROP modgroups" );

echo "<p>...Updating</p>\n";
if ( count( $error ) )
{
    foreach( $error as $err )
    {
        echo $err . "<br>";
    } 
} 
if ( count( $output ) )
{
    echo "<p><span style='color:#0000FF;font-weight:bold'>There where updates made to your database.</span></p>\n";
    foreach( $output as $nonerr )
    {
        echo $nonerr . "<br>";
    } 
} 
echo "<p><span><a href='../../admin.php'><b>Finish updating Module</b></a></span></p>\n";

?>