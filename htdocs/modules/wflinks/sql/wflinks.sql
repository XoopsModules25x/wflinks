# phpMyAdmin SQL Dump
# version 2.6.0-pl3
# http://www.phpmyadmin.net
# 

# 
# Table structure for table 'wflinks_altcat'
#

CREATE TABLE wflinks_altcat (
  lid int(11) unsigned NOT NULL default '0',
  cid int(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (lid,cid)
) ENGINE=MyISAM;

# 
# Table structure for table 'wflinks_broken'
#

CREATE TABLE wflinks_broken (
  reportid int(5) NOT NULL auto_increment,
  lid int(11) NOT NULL default '0',
  sender int(11) NOT NULL default '0',
  ip varchar(20) NOT NULL default '',
  `date` varchar(11) NOT NULL default '0',
  confirmed enum('0','1') NOT NULL default '0',
  acknowledged enum('0','1') NOT NULL default '0',
  title varchar(255) NOT NULL default '',
  PRIMARY KEY  (reportid),
  KEY lid (lid),
  KEY sender (sender),
  KEY ip (ip)
) ENGINE=MyISAM;

#
# Table structure for table 'wflinks_cat'
#

CREATE TABLE wflinks_cat (
  cid int(5) unsigned NOT NULL auto_increment,
  pid int(5) unsigned NOT NULL default '0',
  title varchar(50) NOT NULL default '',
  imgurl varchar(150) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  total int(11) NOT NULL default '0',
  spotlighttop int(11) NOT NULL default '0',
  spotlighthis int(11) NOT NULL default '0',
  nohtml int(1) NOT NULL default '0',
  nosmiley int(1) NOT NULL default '0',
  noxcodes int(1) NOT NULL default '0',
  noimages int(1) NOT NULL default '0',
  nobreak int(1) NOT NULL default '1',
  weight int(11) NOT NULL default '0',
  client_id int(5) NOT NULL default '0',
  banner_id int(5) NOT NULL default '0',
  PRIMARY KEY  (cid),
  KEY pid (pid)
) ENGINE=MyISAM;

#
# Table structure for table 'wflinks_indexpage'
#

CREATE TABLE wflinks_indexpage (
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
  lastlinksyn tinyint(1) NOT NULL default '0',
  lastlinkstotal varchar(5) NOT NULL default '50',
  FULLTEXT KEY `indexheading` (`indexheading`),
  FULLTEXT KEY `indexheader` (`indexheader`),
  FULLTEXT KEY `indexfooter` (`indexfooter`)
) ENGINE=MyISAM;

#
# Dumping data for table 'wflinks_indexpage'
#

INSERT INTO wflinks_indexpage (indeximage,indexheading,indexheader,indexfooter,nohtml,nosmiley,noxcodes,noimages,nobreak,indexheaderalign,indexfooteralign,lastlinksyn,lastlinkstotal) VALUES ('logo-en.gif', 'WF-Links', 'Welcome to the WF-Links.', 'WF-Links Footer', 0, 0, 0, 0, 1, 'left', 'left', 0, 5);

# ############################

#
# Table structure for table 'wflinks_links'
#

CREATE TABLE `wflinks_links` (
  `lid` int(11) unsigned NOT NULL auto_increment,
  `cid` int(5) unsigned NOT NULL default '0',
  `title` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `screenshot` varchar(255) NOT NULL,
  `submitter` int(11) NOT NULL default '0',
  `publisher` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL default '0',
  `date` int(10) NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  `rating` double(6,4) NOT NULL default '0.0000',
  `votes` int(11) unsigned NOT NULL default '0',
  `comments` int(11) unsigned NOT NULL default '0',
  `forumid` int(11) NOT NULL default '0',
  `published` int(11) NOT NULL default '0',
  `expired` int(10) NOT NULL default '0',
  `updated` int(11) NOT NULL default '0',
  `offline` tinyint(1) NOT NULL default '0',
  `description` text NOT NULL,
  `ipaddress` varchar(120) NOT NULL default '0',
  `notifypub` int(1) NOT NULL default '0',
  `urlrating` tinyint(1) NOT NULL default '0',
  `country` varchar(5) NOT NULL default '',
  `keywords` text NOT NULL,
  `item_tag` text NOT NULL,
  `googlemap` text NOT NULL,
  `yahoomap` text NOT NULL,
  `multimap` text NOT NULL,
  `street1` varchar(255) NOT NULL,
  `street2` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `zip` varchar(25) NOT NULL,
  `state` varchar(255) NOT NULL,
  `tel` varchar(25) NOT NULL,
  `fax` varchar(25) NOT NULL,
  `voip` varchar(25) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `vat` varchar(25) NOT NULL,
  PRIMARY KEY  (`lid`),
  KEY `cid` (`cid`),
  KEY `status` (`status`),
  KEY `title` (`title`(40))
) ENGINE=MyISAM;

#
# Table structure for table 'wflinks_mod'
#

CREATE TABLE `wflinks_mod` (
  `requestid` int(11) NOT NULL auto_increment,
  `lid` int(11) unsigned NOT NULL default '0',
  `cid` int(5) unsigned NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `screenshot` varchar(255) NOT NULL default '',
  `submitter` int(11) NOT NULL default '0',
  `publisher` text NOT NULL,
  `status` tinyint(2) NOT NULL default '0',
  `date` int(10) NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  `rating` double(6,4) NOT NULL default '0.0000',
  `votes` int(11) unsigned NOT NULL default '0',
  `comments` int(11) unsigned NOT NULL default '0',
  `forumid` int(11) NOT NULL default '0',
  `published` int(10) NOT NULL default '0',
  `expired` int(10) NOT NULL default '0',
  `updated` int(11) NOT NULL default '0',
  `offline` tinyint(1) NOT NULL default '0',
  `description` text NOT NULL,
  `modifysubmitter` int(11) NOT NULL default '0',
  `requestdate` int(11) NOT NULL default '0',
  `urlrating` tinyint(1) NOT NULL default '0',
  `country` varchar(5) NOT NULL default '',
  `keywords` text NOT NULL default '',
  `item_tag` text NOT NULL,
  `googlemap` text NOT NULL,
  `yahoomap` text NOT NULL,
  `multimap` text NOT NULL,
  `street1` varchar(255) NOT NULL default '',
  `street2` varchar(255) NOT NULL default '',
  `town` varchar(255) NOT NULL default '',
  `zip` varchar(25) NOT NULL default '',
  `state` varchar(255) NOT NULL default '',
  `tel` varchar(25) NOT NULL default '',
  `fax` varchar(25) NOT NULL default '',
  `voip` varchar(25) NOT NULL default '',
  `mobile` varchar(25) NOT NULL default '',
  `email` varchar(60) NOT NULL default '',
  `vat` varchar(25) NOT NULL default '',
  PRIMARY KEY  (`requestid`)
) ENGINE=MyISAM;

#
# Table structure for table 'wflinks_votedata'
#

CREATE TABLE wflinks_votedata (
  ratingid int(11) unsigned NOT NULL auto_increment,
  lid int(11) unsigned NOT NULL default '0',
  ratinguser int(11) NOT NULL default '0',
  rating tinyint(3) unsigned NOT NULL default '0',
  ratinghostname varchar(60) NOT NULL default '',
  ratingtimestamp int(10) NOT NULL default '0',
  title varchar(255) NOT NULL default '',
  PRIMARY KEY  (ratingid),
  KEY ratinguser (ratinguser),
  KEY ratinghostname (ratinghostname),
  KEY lid (lid)
) ENGINE=MyISAM;
