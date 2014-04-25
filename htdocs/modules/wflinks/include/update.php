<?php
/**
 * $Id: update.php
 * Module: WF-Links
 * Developer: McDonald
 * Licence: GNU
 */

if (!defined("XOOPS_ROOT_PATH")) {
     die("XOOPS root path not defined");
}

global $xoopsDB;

$i=0;
//Make changes to table wflinks_links
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " ADD COLUMN country VARCHAR(5) NOT NULL default '' AFTER urlrating");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " ADD COLUMN keywords TEXT NOT NULL default '' AFTER country");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " ADD COLUMN item_tag TEXT NOT NULL default '' AFTER keywords");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " ADD COLUMN googlemap TEXT NOT NULL default '' AFTER item_tag");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " ADD COLUMN yahoomap TEXT NOT NULL default '' AFTER googlemap");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " ADD COLUMN mslivemap TEXT NOT NULL default '' AFTER yahoomap");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " ADD COLUMN street1 VARCHAR(255) NOT NULL default '' AFTER mslivemap");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " ADD COLUMN street2 VARCHAR(255) NOT NULL default '' AFTER street1");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " ADD COLUMN town VARCHAR(255) NOT NULL default '' AFTER street2");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " ADD COLUMN zip VARCHAR(25) NOT NULL default '' AFTER town");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " ADD COLUMN state VARCHAR(255) NOT NULL default '' AFTER zip");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " ADD COLUMN tel VARCHAR(25) NOT NULL default '' AFTER state");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " ADD COLUMN fax VARCHAR(25) NOT NULL default '' AFTER tel");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " ADD COLUMN voip VARCHAR(25) NOT NULL default '' AFTER fax");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " ADD COLUMN mobile VARCHAR(25) NOT NULL default '' AFTER voip");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " ADD COLUMN email VARCHAR(60) NOT NULL default '' AFTER mobile");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " ADD COLUMN vat VARCHAR(25) NOT NULL default '' AFTER email");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " ADD COLUMN multimap TEXT NOT NULL AFTER yahoomap");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " MODIFY keywords TEXT NOT NULL default ''");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " MODIFY zip VARCHAR(25) NOT NULL default ''");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " MODIFY tel VARCHAR(25) NOT NULL default ''");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " MODIFY fax VARCHAR(25) NOT NULL default ''");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " MODIFY voip VARCHAR(25) NOT NULL default ''");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_links') . " DROP mslivemap");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);

//Make changes to table wflinks_mod
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " ADD COLUMN country VARCHAR(5) NOT NULL default '' AFTER urlrating");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " ADD COLUMN keywords TEXT NOT NULL default '' AFTER country");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " ADD COLUMN item_tag TEXT NOT NULL default '' AFTER keywords");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " ADD COLUMN googlemap TEXT NOT NULL default '' AFTER item_tag");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " ADD COLUMN yahoomap TEXT NOT NULL default '' AFTER googlemap");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " ADD COLUMN mslivemap TEXT NOT NULL default '' AFTER yahoomap");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " ADD COLUMN street1 VARCHAR(255) NOT NULL default '' AFTER mslivemap");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " ADD COLUMN street2 VARCHAR(255) NOT NULL default '' AFTER street1");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " ADD COLUMN town VARCHAR(255) NOT NULL default '' AFTER street2");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " ADD COLUMN zip VARCHAR(25) NOT NULL default '' AFTER town");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " ADD COLUMN state VARCHAR(255) NOT NULL default '' AFTER zip");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " ADD COLUMN tel VARCHAR(20) NOT NULL default '' AFTER state");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " ADD COLUMN fax VARCHAR(20) NOT NULL default '' AFTER tel");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " ADD COLUMN voip VARCHAR(20) NOT NULL default '' AFTER fax");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " ADD COLUMN mobile VARCHAR(25) NOT NULL default '' AFTER voip");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " MODIFY keywords TEXT NOT NULL default ''");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " MODIFY zip VARCHAR(25) NOT NULL default ''");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " MODIFY tel VARCHAR(25) NOT NULL default ''");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " MODIFY fax VARCHAR(25) NOT NULL default ''");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_mod') . " MODIFY voip VARCHAR(25) NOT NULL default ''");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);

//Make changes to table wflinks_cat
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat') . " ADD COLUMN client_id INT(5) NOT NULL default '0' AFTER weight");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_cat') . " ADD COLUMN banner_id INT(5) NOT NULL default '0' AFTER client_id");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);

//Make changes to table wflinks_indexpage
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_indexpage') . " ADD COLUMN lastlinksyn TINYINT(1) NOT NULL default '0' AFTER indexfooteralign");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);
++$i;
$ret[$i] = true;
$query[$i] = sprintf("ALTER TABLE " . $xoopsDB -> prefix( 'wflinks_indexpage') . " ADD COLUMN lastlinkstotal VARCHAR(5) NOT NULL default '5' AFTER lastlinksyn");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);

// Drop table wf_resources
++$i;
$ret[$i] = true;
$query[$i] = sprintf("DROP TABLE " . $xoopsDB -> prefix( 'wf_resources') . " ");
$ret[$i] = $ret[$i] && $xoopsDB->query($query[$i]);

//$i = 0;
