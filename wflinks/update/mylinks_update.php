<?php
if (!defined('IS_UPDATE_FILE')) {
	echo "Cannot access this file directly!";
	exit();
}

/**
 * $Id: mylinks_update.php v 1.00 21 June 2005 John N Exp $
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

    $error = array();
    $output = array();
    /**
     * Delete newly created tables in WF-Links
     */
    $table_array = array(
		WFLINKS_BROKEN,
        WFLINKS_CAT,
        WFLINKS_LINKS,
        WFLINKS_MOD,
        WFLINKS_VOTEDATA,
        WFLINKS_INDEXPAGE
        );
    foreach ($table_array as $table_arr)
    {
        $result = $xoopsDB -> queryF("DROP TABLE " . $xoopsDB -> prefix($table_arr) . " ");
        if (!$result)
        {
            $error[]="<b>Error:</b> Could <span style='color:#ff0000;font-weight:bold'>not delete</span> table <b>$table_arr</b> as it does not exist!";
        } 
        else
        {
            $output[]="<b>Success:</b> Table <b>$table_arr</b> was <span style='color:#FF0000;font-weight:bold'>delete</span> Successfully";
        } 
    } 
    /**
     * Copy over old links tables without delete;
     */
    $table_array = array("mylinks_broken" => WFLINKS_BROKEN,
        "mylinks_cat" => WFLINKS_CAT,
        "mylinks_links" => WFLINKS_LINKS,
        "mylinks_mod" => WFLINKS_MOD,
        "mylinks_votedata" => WFLINKS_VOTEDATA,
        ); 
    foreach ($table_array as $table1 => $table2)
    {
        $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix(trim($table1)) . " RENAME TO " . $xoopsDB -> prefix(trim($table2)) . " ");
        if (!$result)
        {
            $error[]="<b>Error:</b> Could <span style='color:#ff0000;font-weight:bold'>not rename</span> table $table1 to table <b>$table2</b>!";
        } 
        else
        {
            $output[]="<b>Success:</b> Table <b>$table1</b> was <span style='color:#FF0000;font-weight:bold'>renamed</span> to $table2 Successfully";
        } 
        unset($result);
    } 

    /**
     * Create Index Page tables
     */
    $result = $xoopsDB -> queryF("CREATE TABLE " . $xoopsDB -> prefix( 'wflinks_indexpage' ) . " (
  		indeximage varchar(255) NOT NULL default 'blank.gif',
  		indexheading varchar(255) NOT NULL default 'WF-Links',
  		indexheader text NOT NULL,
 		indexfooter text NOT NULL,
 		nohtml tinyint(8) NOT NULL default '1',
		nosmiley tinyint(8) NOT NULL default '1',
		noxcodes tinyint(8) NOT NULL default '1',
		noimages tinyint(8) NOT NULL default '1',
		nobreak tinyint(4) NOT NULL default '0',
		indexheaderalign varchar(25) NOT NULL default 'left',
		indexfooteralign varchar(25) NOT NULL default 'center',
		FULLTEXT KEY indexheading (indexheading),
  		FULLTEXT KEY indexheader (indexheader),
  		FULLTEXT KEY indexfooter (indexfooter)
		)
  	"); 
    # Dumping data for table `WFLINKS_INDEXPAGE`
    $xoopsDB -> query("INSERT INTO " . $xoopsDB -> prefix( 'wflinks_indexpage' ) . " VALUES ('logo-en.gif', 'WF-Links', '<div><b>Welcome to the WF-Links Section.</b></div>', 'WF-Links', 0, 0, 0, 0, 1, 'left', 'Center')");
    /**
     * Update broken links
     */
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_broken' ) . " ADD date varchar(11) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_broken' ) . " ADD confirmed enum('0', '1') NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_broken' ) . " ADD acknowledged enum('0', '1') NOT null default '0'");
    /**
     * Update category
     */
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD description text NOT null");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD spotlighttop int(1) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD spotlighthis int(11) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD nohtml int(1) NOT null default '1'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD nosmiley int(1) NOT null default '1'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD noxcodes int(1) NOT null default '1'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD noimages int(1) NOT null default '1'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD nobreak int(1) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD weight int(11) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD groupid text NOT null");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD subgroups text NOT null");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD modgroups text NOT null");
    /**
     * Update links database
     */
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " CHANGE url url varchar(255) NOT NULL default ''");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " CHANGE logourl screenshot varchar(255) NOT NULL default ''");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " CHANGE homepage title varchar(255) NOT NULL default ''");
    /**
     * Add new fields
     */
    $time = time();
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD screenshot varchar(255) NOT null default ''");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD publisher varchar(255) NOT null default ''");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD forumid int(11) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD published int(10) NOT null default '$time'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD expired int(10) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD updated int(11) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD offline tinyint(1) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD description text NOT null");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD ipaddress varchar(120) NOT NULL default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD notifypub int(1) NOT NULL default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD urlrating tinyint(1) NOT NULL default '6'");

    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_votedata' ) . " ADD title varchar(255) NOT null default ''");

    /**
     * links modified
     */
    /**
     * Change some fields
     */
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " CHANGE title title varchar(255) NOT NULL default ''");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " CHANGE url url varchar(255) NOT NULL default ''");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " CHANGE logourl screenshot varchar(255) NOT NULL default ''");
    // Add new fields
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD screenshot varchar(255) NOT null default ''");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD publisher varchar(255) NOT null default ''");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD forumid int(11) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD published int(10) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD expired int(10) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD updated int(11) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD offline tinyint(1) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD description text NOT null");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD modifysubmitter int(11) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD requestdate int(11) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD urlrating tinyint(1) NOT NULL default '0'");

    /**
     * Update decription fields by moving them to the links database table
     */
    $sql="SELECT * FROM " . $xoopsDB -> prefix('mylinks_text') . "" ;
    $result2 = $xoopsDB -> query($sql);
    while ($arr = $xoopsDB -> fetchArray($result2))
    {
        $xoopsDB -> queryF("UPDATE " . $xoopsDB -> prefix( 'wflinks_links' ) . " SET description='" . $arr['description'] . "' WHERE lid=" . $arr['lid'] . "");
    } 
	$result = $xoopsDB->queryF("DROP TABLE ".$xoopsDB->prefix("mylinks_text")." ");
    /**
     * Update comments
     */
    $modhandler = & xoops_gethandler('module');
    $wflinksModule = & $modhandler -> getByDirname("wflinks");
    $PD_id = $wflinksModule -> getVar('mid');

    $modhandler = & xoops_gethandler('module');
    $linksModule = & $modhandler -> getByDirname("mylinks");
    $my_id = $linksModule -> getVar('mid');

    $sql="UPDATE " . $xoopsDB -> prefix( 'xoopscomments' ) . " SET com_modid = $PD_id WHERE com_modid = $my_id";
    $result2 = $xoopsDB -> queryF($sql);

    echo "<p>...Updating</p>\n";
    if (count($error))
    {
        foreach($error as $err)
        {
            echo $err . "<br>";
        } 
    } 
    if (count($output))
    {
        echo "<p><span style='color:#0000FF;font-weight:bold'>There where updates made to your database.</span></p>\n";
        foreach($output as $nonerr)
        {
            echo $nonerr . "<br>";
        } 
    } 
    echo "<p><span><a href='../../admin.php'><b>Finish updating Module</b></a></span></p>\n";

?>