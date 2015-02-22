<?php
if (!defined('IS_UPDATE_FILE')) {
	echo "Cannot access this file directly!";
	exit();
}

/**
 * $Id: weblinks_update.php v 1.00 19 february 2005 WF-Project Team $
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
    $table_array = array(wflinks_broken,
        wflinks_cat,
        wflinks_links,
        wflinks_mod,
        wflinks_votedata,
        wflinks_indexpage
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
    $table_array = array("weblinks_broken" => wflinks_broken,
        "weblinks_category" => wflinks_cat,
        "weblinks_link" => wflinks_links,
        "weblinks_modify" => wflinks_mod,
        "weblinks_votedata" => wflinks_votedata,
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
	 //Add some Fields
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_broken' ) . " ADD date varchar(11) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_broken' ) . " ADD confirmed enum('0', '1') NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_broken' ) . " ADD acknowledged enum('0', '1') NOT null default '0'");
	
	//Change some Fields
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_broken' ) . " CHANGE bid reportid int(5) NOT NULL auto_increment");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_broken' ) . " CHANGE sender sender int(11) NOT NULL default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_broken' ) . " CHANGE lid lid int(11) NOT NULL default '0'");

    /**
     * Update category
     */	 
	//Change some Fields
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " CHANGE imgurl imgurl varchar(150) NOT NULL default ''");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " CHANGE description description varchar(255) NOT NULL default ''");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " CHANGE orders weight int(11) NOT NULL default ''");

	//Add some Fields
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD spotlighttop int(1) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD spotlighthis int(11) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD nohtml int(1) NOT null default '1'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD nosmiley int(1) NOT null default '1'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD noxcodes int(1) NOT null default '1'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD noimages int(1) NOT null default '1'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD nobreak int(1) NOT null default '0'");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD total int(11) NOT NULL default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD groupid text NOT null");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD subgroups text NOT null");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ADD modgroups text NOT null");

	//Delete some Fields
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " DROP cflag");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " DROP lflag");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " DROP tflag");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " DROP displayimg");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " DROP catdescription");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " DROP catfooter");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " DROP groupid");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat' ) . " DROP editaccess");

    /**
     * Update links database
     */	 
	//Change some Fields
	$time = time();
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " CHANGE uid submitter int(11) NOT NULL default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " CHANGE cids cid int(5) unsigned NOT NULL default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " CHANGE time_create date int(10) NOT NULL default '$time'");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " CHANGE time_update updated int(11) NOT NULL default '0'");
	
    //Add new fields
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD screenshot varchar(255) NOT null default ''");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD publisher varchar(255) NOT null default ''");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD forumid int(11) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD expired int(10) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD offline tinyint(1) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD ipaddress varchar(120) NOT NULL default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD notifypub int(1) NOT NULL default '0'");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD status tinyint(2) NOT NULL default '0'");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD published int(11) NOT NULL default '$time'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " ADD urlrating tinyint(1) NOT NULL default '6'");
		
	//Delete some Fields
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP banner");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP name");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP nameflag");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP mail");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP mailflag");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP company");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP addr");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP tel");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP search");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP passwd");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP admincomment");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP mark");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP width");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP height");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP recommend");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP mutual");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP broken");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP rss_url");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP rss_flag");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP rss_xml");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP rss_update");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP usercomment");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP zip");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP state");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP city");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP addr2");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links' ) . " DROP fax");

    /**
     * links modified
     */
	//Change some Fields
	$time = time();
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " CHANGE mid requestid int(11) NOT NULL auto_increment");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " CHANGE mode status tinyint(2) NOT NULL default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " CHANGE cids cid int(5) unsigned NOT NULL default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " CHANGE muid modifysubmitter int(11) NOT NULL default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " CHANGE title title varchar(255) NOT NULL default ''");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " CHANGE description description text NOT NULL");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " CHANGE time_create date int(10) NOT NULL default '$time'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " CHANGE time_update updated int(11) NOT NULL default '$time'");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " CHANGE uid submitter int(11) NOT NULL default '0'");
	
    // Add new fields
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD screenshot varchar(255) NOT null default ''");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD publisher varchar(255) NOT null default ''");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD forumid int(11) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD published int(10) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD expired int(10) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD offline tinyint(1) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD requestdate int(11) NOT null default '0'");
    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " ADD urlrating tinyint(1) NOT NULL default '0'");

    $result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_votedata' ) . " ADD title varchar(255) NOT null default ''");
	
	//Delete some Fields
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP recommend");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP mutual");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP broken");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP rss_url");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP rss_flag");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP rss_xml");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP rss_update");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP usercomment");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP zip");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP state");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP city");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP addr2");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP fax");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP nameflag");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP mail");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP mailflag");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP company");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP addr");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP tel");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP search");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP passwd");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP admincomment");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP mark");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP banner");
	$result = $xoopsDB -> queryF("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod' ) . " DROP name");
	
	/**
     * Deleting some Tabels
     */
	$result = $xoopsDB->queryF("DROP TABLE ".$xoopsDB->prefix("weblinks_catlink")." ");
	$result = $xoopsDB->queryF("DROP TABLE ".$xoopsDB->prefix("weblinks_atomfeed")." ");
	$result = $xoopsDB->queryF("DROP TABLE ".$xoopsDB->prefix("weblinks_config")." ");

    /**
     * Update comments
     */
    $modhandler = & xoops_gethandler('module');
    $wflinksModule = & $modhandler -> getByDirname("weblinks");
    $PD_id = $wflinksModule -> getVar('mid');

    $modhandler = & xoops_gethandler('module');
    $linksModule = & $modhandler -> getByDirname("weblinks");
    $my_id = $linksModule -> getVar('mid');
    echo $my_id;
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