# phpMyAdmin SQL Dump
# version 2.6.0-pl3
# http://www.phpmyadmin.net
#

#
# Table structure for table 'wflinks_altcat'
#

CREATE TABLE wflinks_altcat (
  lid INT(11) UNSIGNED NOT NULL DEFAULT '0',
  cid INT(5) UNSIGNED  NOT NULL DEFAULT '0',
  PRIMARY KEY (lid, cid)
)
  ENGINE = MyISAM;

#
# Table structure for table 'wflinks_broken'
#

CREATE TABLE wflinks_broken (
  reportid     INT(5)          NOT NULL AUTO_INCREMENT,
  lid          INT(11)         NOT NULL DEFAULT '0',
  sender       INT(11)         NOT NULL DEFAULT '0',
  ip           VARCHAR(20)     NOT NULL DEFAULT '',
  `date`       VARCHAR(11)     NOT NULL DEFAULT '0',
  confirmed    ENUM ('0', '1') NOT NULL DEFAULT '0',
  acknowledged ENUM ('0', '1') NOT NULL DEFAULT '0',
  title        VARCHAR(255)    NOT NULL DEFAULT '',
  PRIMARY KEY (reportid),
  KEY lid (lid),
  KEY sender (sender),
  KEY ip (ip)
)
  ENGINE = MyISAM;

#
# Table structure for table 'wflinks_cat'
#

CREATE TABLE wflinks_cat (
  cid          INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  pid          INT(5) UNSIGNED NOT NULL DEFAULT '0',
  title        VARCHAR(50)     NOT NULL DEFAULT '',
  imgurl       VARCHAR(150)    NOT NULL DEFAULT '',
  description  VARCHAR(255)    NOT NULL DEFAULT '',
  total        INT(11)         NOT NULL DEFAULT '0',
  spotlighttop INT(11)         NOT NULL DEFAULT '0',
  spotlighthis INT(11)         NOT NULL DEFAULT '0',
  nohtml       INT(1)          NOT NULL DEFAULT '0',
  nosmiley     INT(1)          NOT NULL DEFAULT '0',
  noxcodes     INT(1)          NOT NULL DEFAULT '0',
  noimages     INT(1)          NOT NULL DEFAULT '0',
  nobreak      INT(1)          NOT NULL DEFAULT '1',
  weight       INT(11)         NOT NULL DEFAULT '0',
  client_id    INT(5)          NOT NULL DEFAULT '0',
  banner_id    INT(5)          NOT NULL DEFAULT '0',
  PRIMARY KEY (cid),
  KEY pid (pid)
)
  ENGINE = MyISAM;

#
# Table structure for table 'wflinks_indexpage'
#

CREATE TABLE wflinks_indexpage (
  indeximage       VARCHAR(255) NOT NULL DEFAULT 'blank.gif',
  indexheading     VARCHAR(255) NOT NULL DEFAULT 'WF-Links',
  indexheader      TEXT         NOT NULL,
  indexfooter      TEXT         NOT NULL,
  nohtml           TINYINT(8)   NOT NULL DEFAULT '1',
  nosmiley         TINYINT(8)   NOT NULL DEFAULT '1',
  noxcodes         TINYINT(8)   NOT NULL DEFAULT '1',
  noimages         TINYINT(8)   NOT NULL DEFAULT '1',
  nobreak          TINYINT(4)   NOT NULL DEFAULT '0',
  indexheaderalign VARCHAR(25)  NOT NULL DEFAULT 'left',
  indexfooteralign VARCHAR(25)  NOT NULL DEFAULT 'center',
  lastlinksyn      TINYINT(1)   NOT NULL DEFAULT '0',
  lastlinkstotal   VARCHAR(5)   NOT NULL DEFAULT '50',
  FULLTEXT KEY `indexheading` (`indexheading`),
  FULLTEXT KEY `indexheader` (`indexheader`),
  FULLTEXT KEY `indexfooter` (`indexfooter`)
)
  ENGINE = MyISAM;

#
# Dumping data for table 'wflinks_indexpage'
#

INSERT INTO wflinks_indexpage (indeximage, indexheading, indexheader, indexfooter, nohtml, nosmiley, noxcodes, noimages, nobreak, indexheaderalign, indexfooteralign, lastlinksyn, lastlinkstotal)
VALUES ('logo-en.gif', 'WF-Links', 'Welcome to the WF-Links.', 'WF-Links Footer', 0, 0, 0, 0, 1, 'left', 'left', 0, 5);

# ############################

#
# Table structure for table 'wflinks_links'
#

CREATE TABLE `wflinks_links` (
  `lid`         INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cid`         INT(5) UNSIGNED  NOT NULL DEFAULT '0',
  `title`       VARCHAR(100)     NOT NULL,
  `url`         VARCHAR(255)     NOT NULL,
  `screenshot`  VARCHAR(255)     NOT NULL,
  `submitter`   INT(11)          NOT NULL DEFAULT '0',
  `publisher`   VARCHAR(255)     NOT NULL,
  `status`      TINYINT(2)       NOT NULL DEFAULT '0',
  `date`        INT(10)          NOT NULL DEFAULT '0',
  `hits`        INT(11) UNSIGNED NOT NULL DEFAULT '0',
  `rating`      DOUBLE(6, 4)     NOT NULL DEFAULT '0.0000',
  `votes`       INT(11) UNSIGNED NOT NULL DEFAULT '0',
  `comments`    INT(11) UNSIGNED NOT NULL DEFAULT '0',
  `forumid`     INT(11)          NOT NULL DEFAULT '0',
  `published`   INT(11)          NOT NULL DEFAULT '0',
  `expired`     INT(10)          NOT NULL DEFAULT '0',
  `updated`     INT(11)          NOT NULL DEFAULT '0',
  `offline`     TINYINT(1)       NOT NULL DEFAULT '0',
  `description` TEXT             NOT NULL,
  `ipaddress`   VARCHAR(120)     NOT NULL DEFAULT '0',
  `notifypub`   INT(1)           NOT NULL DEFAULT '0',
  `urlrating`   TINYINT(1)       NOT NULL DEFAULT '0',
  `country`     VARCHAR(5)       NOT NULL DEFAULT '',
  `keywords`    TEXT             NOT NULL,
  `item_tag`    TEXT             NOT NULL,
  `googlemap`   TEXT             NOT NULL,
  `yahoomap`    TEXT             NOT NULL,
  `multimap`    TEXT             NOT NULL,
  `street1`     VARCHAR(255)     NOT NULL,
  `street2`     VARCHAR(255)     NOT NULL,
  `town`        VARCHAR(255)     NOT NULL,
  `zip`         VARCHAR(25)      NOT NULL,
  `state`       VARCHAR(255)     NOT NULL,
  `tel`         VARCHAR(25)      NOT NULL,
  `fax`         VARCHAR(25)      NOT NULL,
  `voip`        VARCHAR(25)      NOT NULL,
  `mobile`      VARCHAR(25)      NOT NULL,
  `email`       VARCHAR(60)      NOT NULL,
  `vat`         VARCHAR(25)      NOT NULL,
  PRIMARY KEY (`lid`),
  KEY `cid` (`cid`),
  KEY `status` (`status`),
  KEY `title` (`title`(40))
)
  ENGINE = MyISAM;

#
# Table structure for table 'wflinks_mod'
#

CREATE TABLE `wflinks_mod` (
  `requestid`       INT(11)          NOT NULL AUTO_INCREMENT,
  `lid`             INT(11) UNSIGNED NOT NULL DEFAULT '0',
  `cid`             INT(5) UNSIGNED  NOT NULL DEFAULT '0',
  `title`           VARCHAR(255)     NOT NULL DEFAULT '',
  `url`             VARCHAR(255)     NOT NULL DEFAULT '',
  `screenshot`      VARCHAR(255)     NOT NULL DEFAULT '',
  `submitter`       INT(11)          NOT NULL DEFAULT '0',
  `publisher`       TEXT             NOT NULL,
  `status`          TINYINT(2)       NOT NULL DEFAULT '0',
  `date`            INT(10)          NOT NULL DEFAULT '0',
  `hits`            INT(11) UNSIGNED NOT NULL DEFAULT '0',
  `rating`          DOUBLE(6, 4)     NOT NULL DEFAULT '0.0000',
  `votes`           INT(11) UNSIGNED NOT NULL DEFAULT '0',
  `comments`        INT(11) UNSIGNED NOT NULL DEFAULT '0',
  `forumid`         INT(11)          NOT NULL DEFAULT '0',
  `published`       INT(10)          NOT NULL DEFAULT '0',
  `expired`         INT(10)          NOT NULL DEFAULT '0',
  `updated`         INT(11)          NOT NULL DEFAULT '0',
  `offline`         TINYINT(1)       NOT NULL DEFAULT '0',
  `description`     TEXT             NOT NULL,
  `modifysubmitter` INT(11)          NOT NULL DEFAULT '0',
  `requestdate`     INT(11)          NOT NULL DEFAULT '0',
  `urlrating`       TINYINT(1)       NOT NULL DEFAULT '0',
  `country`         VARCHAR(5)       NOT NULL DEFAULT '',
  `keywords`        TEXT             NOT NULL,
  `item_tag`        TEXT             NOT NULL,
  `googlemap`       TEXT             NOT NULL,
  `yahoomap`        TEXT             NOT NULL,
  `multimap`        TEXT             NOT NULL,
  `street1`         VARCHAR(255)     NOT NULL DEFAULT '',
  `street2`         VARCHAR(255)     NOT NULL DEFAULT '',
  `town`            VARCHAR(255)     NOT NULL DEFAULT '',
  `zip`             VARCHAR(25)      NOT NULL DEFAULT '',
  `state`           VARCHAR(255)     NOT NULL DEFAULT '',
  `tel`             VARCHAR(25)      NOT NULL DEFAULT '',
  `fax`             VARCHAR(25)      NOT NULL DEFAULT '',
  `voip`            VARCHAR(25)      NOT NULL DEFAULT '',
  `mobile`          VARCHAR(25)      NOT NULL DEFAULT '',
  `email`           VARCHAR(60)      NOT NULL DEFAULT '',
  `vat`             VARCHAR(25)      NOT NULL DEFAULT '',
  PRIMARY KEY (`requestid`)
)
  ENGINE = MyISAM;

#
# Table structure for table 'wflinks_votedata'
#

CREATE TABLE wflinks_votedata (
  ratingid        INT(11) UNSIGNED    NOT NULL AUTO_INCREMENT,
  lid             INT(11) UNSIGNED    NOT NULL DEFAULT '0',
  ratinguser      INT(11)             NOT NULL DEFAULT '0',
  rating          TINYINT(3) UNSIGNED NOT NULL DEFAULT '0',
  ratinghostname  VARCHAR(60)         NOT NULL DEFAULT '',
  ratingtimestamp INT(10)             NOT NULL DEFAULT '0',
  title           VARCHAR(255)        NOT NULL DEFAULT '',
  PRIMARY KEY (ratingid),
  KEY ratinguser (ratinguser),
  KEY ratinghostname (ratinghostname),
  KEY lid (lid)
)
  ENGINE = MyISAM;
