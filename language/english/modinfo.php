<?php
/**
 * $Id: modinfo.php 11245 2013-03-18 03:29:10Z cesag $
 * Module: WF-links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 * Format: UTF-8
 */
// Module Info
// The name of this module
define("_MI_WFL_NAME","WF-Links");
// A brief description of this module
define("_MI_WFL_DESC","Creates a links section where users can link/submit/rate various links.");
// Names of blocks for this module (Not all module has blocks)
define("_MI_WFL_BNAME1","Recent WF-Links");
define("_MI_WFL_BNAME2","Top WF-Links");
// Sub menu titles
define("_MI_WFL_SMNAME1","Submit");
define("_MI_WFL_SMNAME2","Popular");
define("_MI_WFL_SMNAME3","Top Rated");
define("_MI_WFL_SMNAME4","Latest Listings");
// Names of admin menu items
define("_MI_WFL_BINDEX","Admin");
define("_MI_WFL_INDEXPAGE","Index Page");
define("_MI_WFL_MCATEGORY","Categories");
define("_MI_WFL_MLINKS","Links Admin");
define("_MI_WFL_MUPLOADS","Image Upload");
define("_MI_WFL_PERMISSIONS","Permission Settings");
define("_MI_WFL_BLOCKADMIN","Block Settings");
define("_MI_WFL_MVOTEDATA","Votes");
// Title of config items
define("_MI_WFL_POPULAR","link Popular Count");
define("_MI_WFL_POPULARDSC","The number of hits before a link status will be considered as popular.");
//Display Icons
define("_MI_WFL_ICONDISPLAY","links Popular and New:");
define("_MI_WFL_DISPLAYICONDSC","Select how to display the popular and new icons in link listing.");
define("_MI_WFL_DISPLAYICON1","Display As Icons");
define("_MI_WFL_DISPLAYICON2","Display As Text");
define("_MI_WFL_DISPLAYICON3","Do Not Display");
define("_MI_WFL_DAYSNEW","links Days New:");
define("_MI_WFL_DAYSNEWDSC","The number of days a link status will be considered as new.");
define("_MI_WFL_DAYSUPDATED","links Days Updated:");
define("_MI_WFL_DAYSUPDATEDDSC","The amount of days a link status will be considered as updated.");
define("_MI_WFL_PERPAGE","link Listing Count:");
define("_MI_WFL_PERPAGEDSC","Number of links to display in each category listing.");
define("_MI_WFL_USESHOTS","Display Screenshot Images?");
define("_MI_WFL_USESHOTSDSC","Select yes to display screenshot images for each link item");
define("_MI_WFL_SHOTWIDTH","Image Display Width");
define("_MI_WFL_SHOTWIDTHDSC","Display width for screenshot image");
define("_MI_WFL_SHOTHEIGHT","Image Display Height");
define("_MI_WFL_SHOTHEIGHTDSC","Display height for screenshot image");
define("_MI_WFL_CHECKHOST","Disallow direct link linking? (leeching)");
define("_MI_WFL_REFERERS","These sites can directly link to your links <br />Separate with #");
define("_MI_WFL_ANONPOST","Anonymous User Submission:");
define("_MI_WFL_ANONPOSTDSC","Allow Anonymous users to submit or upload to your website?");
define("_MI_WFL_AUTOAPPROVE","Auto Approve Submitted links");
define("_MI_WFL_AUTOAPPROVEDSC","Select to approve submitted links without moderation.");
define("_MI_WFL_MAXFILESIZE","Upload Size (KB)");
define("_MI_WFL_MAXFILESIZEDSC","Maximum link size permitted with link uploads.");
define("_MI_WFL_IMGWIDTH","Upload Image width");
define("_MI_WFL_IMGWIDTHDSC","Maximum image width permitted when uploading image links");
define("_MI_WFL_IMGHEIGHT","Upload Image height");
define("_MI_WFL_IMGHEIGHTDSC","Maximum image height permitted when uploading image links");
define("_MI_WFL_UPLOADDIR","Upload Directory (No trailing slash)");
define("_MI_WFL_ALLOWSUBMISS","User Submissions:");
define("_MI_WFL_ALLOWSUBMISSDSC","Allow Users to Submit new links");
define("_MI_WFL_ALLOWUPLOADS","User Uploads:");
define("_MI_WFL_ALLOWUPLOADSDSC","Allow Users to upload links directly to your website");
define("_MI_WFL_SCREENSHOTS","Screenshots Upload Directory");
define("_MI_WFL_CATEGORYIMG","Category Image Upload Directory");
define("_MI_WFL_MAINIMGDIR","Main Image Directory");
define("_MI_WFL_USETHUMBS","Use Thumb Nails:");
define("_MI_WFL_USETHUMBSDSC",'Supported link types: JPG, GIF, PNG.<div style="padding-top: 8px;">WF-Links will use thumb nails for images. Set to "No" to use orginal image if the server does not support this option.</div>');
define("_MI_WFL_DATEFORMAT","Timestamp:");
define("_MI_WFL_DATEFORMATDSC",'Default Timestamp for WF-links.<br />See <a href="http://jp.php.net/manual/en/function.date.php" target="_blank">PHP manual</a>');
define("_MI_WFL_SHOWDISCLAIMER","Show Disclaimer before User Submission?");
define("_MI_WFL_SHOWDISCLAIMERDSC","Before a User can submit a Link show the Entry regulations?");
define("_MI_WFL_SHOWLINKDISCL","Show Disclaimer before User link?");
define("_MI_WFL_SHOWLINKDISCLDSC","Show link regulations before open a link?");
define("_MI_WFL_DISCLAIMER","Enter Submission Disclaimer Text:");
define("_MI_WFL_LINKDISCLAIMER","Enter link Disclaimer Text:");
define("_MI_WFL_SUBCATS","Sub-Categories:");
define("_MI_WFL_SUBMITART","link Submission:");
define("_MI_WFL_SUBMITARTDSC","Select groups that can submit new links.");
define("_MI_WFL_RATINGGROUPS","link Ratings:");
define("_MI_WFL_RATINGGROUPSDSC","Select groups that can rate a link.");
define("_MI_WFL_IMGUPDATE","Update Thumbnails?");
define("_MI_WFL_IMGUPDATEDSC","If selected Thumbnail images will be updated at each page render, otherwise the first thumbnail image will be used regardless. <br /><br />");
define("_MI_WFL_QUALITY","Thumb Nail Quality:");
define("_MI_WFL_QUALITYDSC","Quality Lowest: 0 Highest: 100");
define("_MI_WFL_KEEPASPECT","Keep Image Aspect Ratio?");
define("_MI_WFL_KEEPASPECTDSC","");
define("_MI_WFL_ADMINPAGE","Admin Index Links Count:");
define("_MI_WFL_AMDMINPAGEDSC","Number of new links to display in module admin area.");
define("_MI_WFL_ARTICLESSORT","Default link Order:");
define("_MI_WFL_ARTICLESSORTDSC","Select the default order for the link listings.");
define("_MI_WFL_TITLE","Title");
define("_MI_WFL_RATING","Rating");
define("_MI_WFL_WEIGHT","Weight");
define("_MI_WFL_POPULARITY","Popularity");
define("_MI_WFL_SUBMITTED2","Submission Date");
define("_MI_WFL_COPYRIGHT","Copyright Notice:");
define("_MI_WFL_COPYRIGHTDSC","Select to display a copyright notice on link page.");
// Description of each config items
define("_MI_WFL_SUBCATSDSC","Select Yes to display sub-categories. Selecting No will hide sub-categories from the listings");
// Text for notifications
define("_MI_WFL_GLOBAL_NOTIFY","Global");
define("_MI_WFL_GLOBAL_NOTIFYDSC","Global links notification options.");
define("_MI_WFL_CATEGORY_NOTIFY","Category");
define("_MI_WFL_CATEGORY_NOTIFYDSC","Notification options that apply to the current link category.");
define("_MI_WFL_LINK_NOTIFY","Link");
define("_MI_WFL_FILE_NOTIFYDSC","Notification options that apply to the current link.");
define("_MI_WFL_GLOBAL_NEWCATEGORY_NOTIFY","New Category");
define("_MI_WFL_GLOBAL_NEWCATEGORY_NOTIFYCAP","Notify me when a new link category is created.");
define("_MI_WFL_GLOBAL_NEWCATEGORY_NOTIFYDSC","Receive notification when a new link category is created.");
define("_MI_WFL_GLOBAL_NEWCATEGORY_NOTIFYSBJ","[{X_SITENAME}] {X_MODULE} auto-notify : New link category");                              
define("_MI_WFL_GLOBAL_LINKMODIFY_NOTIFY","Modify Link Requested");
define("_MI_WFL_GLOBAL_LINKMODIFY_NOTIFYCAP","Notify me of any link modification request.");
define("_MI_WFL_GLOBAL_LINKMODIFY_NOTIFYDSC","Receive notification when any link modification request is submitted.");
define("_MI_WFL_GLOBAL_LINKMODIFY_NOTIFYSBJ","[{X_SITENAME}] {X_MODULE} auto-notify : Link Modification Requested");
define("_MI_WFL_GLOBAL_LINKBROKEN_NOTIFY","Broken Link Submitted");
define("_MI_WFL_GLOBAL_LINKBROKEN_NOTIFYCAP","Notify me of any broken link report.");
define("_MI_WFL_GLOBAL_LINKBROKEN_NOTIFYDSC","Receive notification when any broken link report is submitted.");
define("_MI_WFL_GLOBAL_LINKBROKEN_NOTIFYSBJ","[{X_SITENAME}] {X_MODULE} auto-notify : Broken Link Reported");
define("_MI_WFL_GLOBAL_LINKSUBMIT_NOTIFY","Link Submitted");
define("_MI_WFL_GLOBAL_LINKSUBMIT_NOTIFYCAP","Notify me when any new link is submitted (awaiting approval).");
define("_MI_WFL_GLOBAL_LINKSUBMIT_NOTIFYDSC","Receive notification when any new link is submitted (awaiting approval).");
define("_MI_WFL_GLOBAL_LINKSUBMIT_NOTIFYSBJ","[{X_SITENAME}] {X_MODULE} auto-notify : New link submitted");
define("_MI_WFL_GLOBAL_NEWLINK_NOTIFY","New Link");
define("_MI_WFL_GLOBAL_NEWLINK_NOTIFYCAP","Notify me when any new link is posted.");
define("_MI_WFL_GLOBAL_NEWLINK_NOTIFYDSC","Receive notification when any new link is posted.");
define("_MI_WFL_GLOBAL_NEWLINK_NOTIFYSBJ","[{X_SITENAME}] {X_MODULE} auto-notify : New link");
define("_MI_WFL_CATEGORY_FILESUBMIT_NOTIFY","Link Submitted");
define("_MI_WFL_CATEGORY_FILESUBMIT_NOTIFYCAP","Notify me when a new link is submitted (awaiting approval) to the current category.");   
define("_MI_WFL_CATEGORY_FILESUBMIT_NOTIFYDSC","Receive notification when a new link is submitted (awaiting approval) to the current category.");      
define("_MI_WFL_CATEGORY_FILESUBMIT_NOTIFYSBJ","[{X_SITENAME}] {X_MODULE} auto-notify : New link submitted in category"); 
define("_MI_WFL_CATEGORY_NEWLINK_NOTIFY","New Link");
define("_MI_WFL_CATEGORY_NEWLINK_NOTIFYCAP","Notify me when a new link is posted to the current category.");   
define("_MI_WFL_CATEGORY_NEWLINK_NOTIFYDSC","Receive notification when a new link is posted to the current category.");      
define("_MI_WFL_CATEGORY_NEWLINK_NOTIFYSBJ","[{X_SITENAME}] {X_MODULE} auto-notify : New link in category"); 
define("_MI_WFL_LINK_APPROVE_NOTIFY","Link Approved");
define("_MI_WFL_LINK_APPROVE_NOTIFYCAP","Notify me when this link is approved.");
define("_MI_WFL_LINK_APPROVE_NOTIFYDSC","Receive notification when this link is approved.");
define("_MI_WFL_LINK_APPROVE_NOTIFYSBJ","[{X_SITENAME}] {X_MODULE} auto-notify : Link Approved");
define("_MI_WFL_AUTHOR_INFO","Developer Information");
define("_MI_WFL_AUTHOR_NAME","Developer");
define("_MI_WFL_AUTHOR_DEVTEAM","Development Team");
define("_MI_WFL_AUTHOR_WEBSITE","Developer website");
define("_MI_WFL_AUTHOR_EMAIL","Developer email");
define("_MI_WFL_AUTHOR_CREDITS","Credits");
define("_MI_WFL_MODULE_INFO","Module Development Information");
define("_MI_WFL_MODULE_STATUS","Development Status");
define("_MI_WFL_MODULE_DEMO","Demo Site");
define("_MI_WFL_MODULE_SUPPORT","Official support site");
define("_MI_WFL_MODULE_BUG","Report a bug for this module");
define("_MI_WFL_MODULE_FEATURE","Suggest a new feature for this module");
define("_MI_WFL_MODULE_DISCLAIMER","Disclaimer");
define("_MI_WFL_RELEASE","Release Date: ");
define("_MI_WFL_MODULE_MAILLIST","WF-Project Mailing Lists");
define("_MI_WFL_MODULE_MAILANNOUNCEMENTS","Announcements Mailing List");
define("_MI_WFL_MODULE_MAILBUGS","Bug Mailing List");
define("_MI_WFL_MODULE_MAILFEATURES","Features Mailing List");
define("_MI_WFL_MODULE_MAILANNOUNCEMENTSDSC","Get the latest announcements from WF-Project.");
define("_MI_WFL_MODULE_MAILBUGSDSC","Bug Tracking and submission mailing list");
define("_MI_WFL_MODULE_MAILFEATURESDSC","Request New Features mailing list.");
define("_MI_WFL_WARNINGTEXT","THE SOFTWARE IS PROVIDED BY WF-PROJECTS \"AS IS\" AND \"WITH ALL FAULTS.\"
WF-PROJECTS MAKES NO REPRESENTATIONS OR WARRANTIES OF ANY KIND CONCERNING
THE QUALITY, SAFETY OR SUITABILITY OF THE SOFTWARE, EITHER EXPRESS OR
IMPLIED, INCLUDING WITHOUT LIMITATION ANY IMPLIED WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NON-INFRINGEMENT.
FURTHER, WF-PROJECTS MAKES NO REPRESENTATIONS OR WARRANTIES AS TO THE TRUTH,
ACCURACY OR COMPLETENESS OF ANY STATEMENTS, INFORMATION OR MATERIALS
CONCERNING THE SOFTWARE THAT IS CONTAINED IN WF-Project WEBSITE. IN NO
EVENT WILL WF-PROJECTS BE LIABLE FOR ANY INDIRECT, PUNITIVE, SPECIAL,
INCIDENTAL OR CONSEQUENTIAL DAMAGES HOWEVER THEY MAY ARISE AND EVEN IF
WF-PROJECT HAS BEEN PREVIOUSLY ADVISED OF THE POSSIBILITY OF SUCH DAMAGES..");
define("_MI_WFL_AUTHOR_CREDITSTEXT","The WF-Projects Team would like to thank the following people for their help and support during the development phase of this module.<br /></br />EdStacey, maumed, banned, krobi, Pnooka, MarcoFr, cosmodrum, placebo333, GibaPhp");
define("_MI_WFL_AUTHOR_BUGFIXES","Bug Fix History");
define("_MI_WFL_COPYRIGHT2","Copyright");
define("_MI_WFL_COPYRIGHTIMAGE","Unless stated otherwise, this Module (WF-Links) and its images are copyright to the WF-Projects team.<br /><br />You have the permission to copy, edit and change WF-Links to suit your personal requirements. You agree not to modify, adapt and redistribute the source code of the Software without the express permission from the WF-Projects team.<br /><br />PageRank is a trademark of Google Inc.");
define("_MI_WFL_SELECTFORUM","Select Forum:");
define("_MI_WFL_SELECTFORUMDSC","Select the forum you have installed and will be used by WF-Links.");
define("_MI_WFL_DISPLAYFORUM1","Newbb (all)");
define("_MI_WFL_DISPLAYFORUM2","IPB Forum");
define("_MI_WFL_DISPLAYFORUM3","PHPBB2 Module");
// added by McDonald
define("_MI_WFL_COUNTRY","Country:");
define("_MI_WFL_EDITOR","Editor to use (admin):");
define("_MI_WFL_EDITORCHOICE","Select the editor to use for admin side. If you have a ‘simple’ install (e.g you use only XOOPS core editor class, provided in the standard xoops core package), then you can just select DHTML and Compact");
define("_MI_WFL_EDITORUSER","Editor to use (user):");
define("_MI_WFL_EDITORCHOICEUSER","Select the editor to use for user side. If you have a ‘simple’ install (e.g you use only XOOPS core editor class, provided in the standard xoops core package), then you can just select DHTML and Compact");
define("_MI_WFL_FORM_DHTML","DHTML");
define("_MI_WFL_FORM_COMPACT","Compact");
define("_MI_WFL_FORM_SPAW","Spaw Editor");
define("_MI_WFL_FORM_HTMLAREA","HtmlArea Editor");
define("_MI_WFL_FORM_FCK","FCK Editor");
define("_MI_WFL_FORM_KOIVI","Koivi Editor");
define("_MI_WFL_FORM_INBETWEEN","Inbetween");
define("_MI_WFL_FORM_TINYEDITOR","TinyEditor");
define("_MI_WFL_FORM_TINYMCE","TinyMCE");
define("_MI_WFL_FORM_DHTMLEXT","DHTML Extended");
define("_MI_WFL_SORTCATS","Sort categories by:");
define("_MI_WFL_SORTCATSDSC","Select how categories and sub-categories are sorted.");
define("_MI_WFL_KEYLENGTH","Enter max. characters for meta keywords:");
define("_MI_WFL_KEYLENGTHDSC","Default is 255 characters");
define("_MI_WFL_OTHERLINKS","Show other links submitted by Submitter?");
define("_MI_WFL_OTHERLINKSDSC","Select if other links of the submitter will be displayed.");
define("_MI_WFL_TOTALCHARS","Set total amount of characters for description?");
define("_MI_WFL_TOTALCHARSDSC","Set total amount of characters for description in category view.");
define("_MI_WFL_QUICKVIEW","Show Quick View option?");
define("_MI_WFL_QUICKVIEWDSC","This turns on/off the Quick View option.");
define("_MI_WFL_ICONS_CREDITS","Icons by");
define("_MI_WFL_SHOWSBOOKMARKS","Show Social Bookmarks?");
define("_MI_WFL_SHOWSBOOKMARKSDSC","Select Yes if you want Social Bookmark icons to be displayed under article.");
define("_MI_WFL_SHOWPAGERANK","Show Google PageRankâ„¢?");
define("_MI_WFL_SHOWPAGERANKSDSC","Select Yes if you want Google PageRankâ„¢ to be displayed.");
define("_MI_WFL_USERTAGDESCR","User can submit Tags:");
define("_MI_WFL_USERTAGDSC","Select Yes if user is allowed to submit tags.");
// Version 1.05 RC5
define("_MI_WFL_DATEFORMATADMIN","Timestamp administration:");
define("_MI_WFL_DATEFORMATADMINDSC",'Default admininstration Timestamp for WF-Links<br />See <a href="http://jp.php.net/manual/en/function.date.php" target="_blank">PHP manual</a>');
define("_MI_WFL_USEADDRESSDESCR","Use address and map options?");
define("_MI_WFL_USEADDRESSDSC","Select Yes to use the address and maps feature.");
define("_MI_WFL_HEADERPRINT","[PRINT OPTIONS] Print page header");
define("_MI_WFL_HEADERPRINTDSC","Header that will be printed for each link");
define("_MI_WFL_LOGOURLPRINT","[PRINT OPTIONS] Logo print url");
define("_MI_WFL_LOGOURLDSCPRINT","Url of the logo that will be printed at the top of the page");
define("_MI_WFL_FOOTERPRINT","[PRINT OPTIONS] Print page footer");
define("_MI_WFL_FOOTERPRINTDSC","Footer that will be printed for each link");
define("_MI_WFL_BNAME3","WF-Links Sponsor Statistics");
define("_MI_WFL_VCARD_CREDITS","vCard script by");
// Version 1.05 RC6
define("_MI_WFL_FLAGIMG","Country Flag Image Directory");
define("_MI_WFL_FLAGIMGDSC","Enter the url without a trailing slash");
define("_MI_WFL_CATEGORYIMGDSC","Enter the url without a trailing slash");
define("_MI_WFL_SCREENSHOTSDSC","Enter the url without a trailing slash");
define("_MI_WFL_MAINIMGDIRDSC","Enter the url without a trailing slash");
define("_MI_WFL_USEAUTOSCRSHOT","Use Auto Screenshot");
define("_MI_WFL_USEAUTOSCRSHOTDSC","This will automatically create a screenshot based on the url. This overrules uploaded screenshots and might not work for all websites.");
define("_MI_WFL_MOZSHOT_CREDITS","Auto Screenshot by");
define("_MI_WFL_MOZSHOT_CREDITSTXT", '<a href="http://mozshot.nemui.org" target=_blank>Mozshot</a> (all source code provided under <a href="http://www.ruby-lang.org/en/" target=_blank>Ruby</a> lisence)');
// Version 1.06 RC-1
define("_MI_WFL_BNAME4","WF-Links Tag Cloud");
define("_MI_WFL_BNAME5","WF-Links Top Tags");
// Version 1.06 RC-3
define("_MI_WFL_DISPLAYFORUM4","Newbbex");
define("_MI_WFL_TITLE_A","Title (A)");
define("_MI_WFL_TITLE_D","Title (D)");
define("_MI_WFL_RATING_A","Rating (A)");
define("_MI_WFL_RATING_D","Rating (D)");
define("_MI_WFL_SUBMITTED_A","Submission Date (A)");
define("_MI_WFL_SUBMITTED_D","Submission Date (D)");
define("_MI_WFL_POPULARITY_A","Popularity (A)");
define("_MI_WFL_POPULARITY_D","Popularity (D)");
define("_MI_WFL_COUNTRY_A","Country (A)");
define("_MI_WFL_COUNTRY_D","Country (D)");
// Version 1.08
// Admin Summary
//define("_MI_WFL_SCATEGORY","Category");
define("_MI_WFL_SNEWFILESVAL","Submitted");
define("_MI_WFL_SMODREQUEST","Modified");
//define("_MI_WFL_SREVIEWS","Reviews: ");
define("_MI_WFL_SBROKENSUBMIT","Broken");
define("_MI_WFL_DOCUMENTATION","Docs");
define("_MI_WFL_ADD_LINK","Add Link");
define("_MI_WFL_ADD_CATEGORY","Add Category");