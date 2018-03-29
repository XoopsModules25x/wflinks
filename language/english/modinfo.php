<?php
/**
 *
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
define('_MI_WFL_NAME', 'WF-Links');

// A brief description of this module
define('_MI_WFL_DESC', 'Creates a links section where users can link/submit/rate various links.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_WFL_BNAME1', 'Recent WF-Links');
define('_MI_WFL_BNAME2', 'Top WF-Links');

// Sub menu titles
define('_MI_WFL_SMNAME1', 'Submit');
define('_MI_WFL_SMNAME2', 'Popular');
define('_MI_WFL_SMNAME3', 'Top Rated');
define('_MI_WFL_SMNAME4', 'Latest Listings');

// Names of admin menu items
define('_MI_WFL_BINDEX', 'Admin');
define('_MI_WFL_INDEXPAGE', 'Index Page');
define('_MI_WFL_MCATEGORY', 'Categories');
define('_MI_WFL_MLINKS', 'Links Admin');
define('_MI_WFL_MUPLOADS', 'Image Upload');
define('_MI_WFL_PERMISSIONS', 'Permission Settings');
define('_MI_WFL_BLOCKADMIN', 'Block Settings');
define('_MI_WFL_MVOTEDATA', 'Votes');

define('_MI_WFL_HOME', 'Home');
define('_MI_WFL_ABOUT', 'About');

// Title of config items
define('_MI_WFL_POPULAR', 'link Popular Count');
define('_MI_WFL_POPULARDSC', 'The number of hits before a link status will be considered as popular.');

//Display Icons
define('_MI_WFL_ICONDISPLAY', 'links Popular and New:');
define('_MI_WFL_DISPLAYICONDSC', 'Select how to display the popular and new icons in link listing.');
define('_MI_WFL_DISPLAYICON1', 'Display As Icons');
define('_MI_WFL_DISPLAYICON2', 'Display As Text');
define('_MI_WFL_DISPLAYICON3', 'Do Not Display');

define('_MI_WFL_DAYSNEW', 'links Days New:');
define('_MI_WFL_DAYSNEWDSC', 'The number of days a link status will be considered as new.');
define('_MI_WFL_DAYSUPDATED', 'links Days Updated:');
define('_MI_WFL_DAYSUPDATEDDSC', 'The amount of days a link status will be considered as updated.');

define('_MI_WFL_PERPAGE', 'link Listing Count:');
define('_MI_WFL_PERPAGEDSC', 'Number of links to display in each category listing.');

define('_MI_WFL_USESHOTS', 'Display Screenshot Images?');
define('_MI_WFL_USESHOTSDSC', 'Select yes to display screenshot images for each link item');
define('_MI_WFL_SHOTWIDTH', 'Image Display Width');
define('_MI_WFL_SHOTWIDTHDSC', 'Display width for screenshot image');
define('_MI_WFL_SHOTHEIGHT', 'Image Display Height');
define('_MI_WFL_SHOTHEIGHTDSC', 'Display height for screenshot image');
define('_MI_WFL_CHECKHOST', 'Disallow direct link linking? (leeching)');
define('_MI_WFL_REFERERS', 'These sites can directly link to your links <br>Separate with #');
define('_MI_WFL_ANONPOST', 'Anonymous User Submission:');
define('_MI_WFL_ANONPOSTDSC', 'Allow Anonymous users to submit or upload to your website?');
define('_MI_WFL_AUTOAPPROVE', 'Auto Approve Submitted links');
define('_MI_WFL_AUTOAPPROVEDSC', 'Select to approve submitted links without moderation.');

define('_MI_WFL_MAXFILESIZE', 'Upload Size (KB)');
define('_MI_WFL_MAXFILESIZEDSC', 'Maximum link size permitted with link uploads.');
define('_MI_WFL_IMGWIDTH', 'Upload Image width');
define('_MI_WFL_IMGWIDTHDSC', 'Maximum image width permitted when uploading image links');
define('_MI_WFL_IMGHEIGHT', 'Upload Image height');
define('_MI_WFL_IMGHEIGHTDSC', 'Maximum image height permitted when uploading image links');

define('_MI_WFL_UPLOADDIR', 'Upload Directory (No trailing slash)');
define('_MI_WFL_ALLOWSUBMISS', 'User Submissions:');
define('_MI_WFL_ALLOWSUBMISSDSC', 'Allow Users to Submit new links');
define('_MI_WFL_ALLOWUPLOADS', 'User Uploads:');
define('_MI_WFL_ALLOWUPLOADSDSC', 'Allow Users to upload links directly to your website');
define('_MI_WFL_SCREENSHOTS', 'Screenshots Upload Directory');
define('_MI_WFL_CATEGORYIMG', 'Category Image Upload Directory');
define('_MI_WFL_MAINIMGDIR', 'Main Image Directory');
define('_MI_WFL_USETHUMBS', 'Use Thumb Nails:');
define('_MI_WFL_USETHUMBSDSC', "Supported link types: JPG, GIF, PNG.<div style='padding-top: 8px;'>WF-Links will use thumb nails for images. Set to 'No' to use orginal image if the server does not support this option.</div>");
define('_MI_WFL_DATEFORMAT', 'Timestamp:');
define('_MI_WFL_DATEFORMATDSC', 'Default Timestamp for WF-links.<br>See <a href="http://jp.php.net/manual/en/function.date.php" target="_blank">PHP manual</a>');
define('_MI_WFL_SHOWDISCLAIMER', 'Show Disclaimer before User Submission?');
define('_MI_WFL_SHOWDISCLAIMERDSC', 'Before a User can submit a Link show the Entry regulations?');
define('_MI_WFL_SHOWLINKDISCL', 'Show Disclaimer before User link?');
define('_MI_WFL_SHOWLINKDISCLDSC', 'Show link regulations before open a link?');
define('_MI_WFL_DISCLAIMER', 'Enter Submission Disclaimer Text:');
define('_MI_WFL_LINKDISCLAIMER', 'Enter link Disclaimer Text:');
define('_MI_WFL_SUBCATS', 'Sub-Categories:');
define('_MI_WFL_SUBMITART', 'link Submission:');
define('_MI_WFL_SUBMITARTDSC', 'Select groups that can submit new links.');
define('_MI_WFL_RATINGGROUPS', 'link Ratings:');
define('_MI_WFL_RATINGGROUPSDSC', 'Select groups that can rate a link.');
define('_MI_WFL_IMGUPDATE', 'Update Thumbnails?');
define('_MI_WFL_IMGUPDATEDSC', 'If selected Thumbnail images will be updated at each page render, otherwise the first thumbnail image will be used regardless. <br><br>');
define('_MI_WFL_QUALITY', 'Thumb Nail Quality:');
define('_MI_WFL_QUALITYDSC', 'Quality Lowest: 0 Highest: 100');
define('_MI_WFL_KEEPASPECT', 'Keep Image Aspect Ratio?');
define('_MI_WFL_KEEPASPECTDSC', '');
define('_MI_WFL_ADMINPAGE', 'Admin Index Links Count:');
define('_MI_WFL_AMDMINPAGEDSC', 'Number of new links to display in module admin area.');
define('_MI_WFL_ARTICLESSORT', 'Default link Order:');
define('_MI_WFL_ARTICLESSORTDSC', 'Select the default order for the link listings.');
define('_MI_WFL_TITLE', 'Title');
define('_MI_WFL_RATING', 'Rating');
define('_MI_WFL_WEIGHT', 'Weight');
define('_MI_WFL_POPULARITY', 'Popularity');
define('_MI_WFL_SUBMITTED2', 'Submission Date');
define('_MI_WFL_COPYRIGHT', 'Copyright Notice:');
define('_MI_WFL_COPYRIGHTDSC', 'Select to display a copyright notice on link page.');
// Description of each config items
define('_MI_WFL_SUBCATSDSC', 'Select YES to display sub-categories. Selecting NO will hide sub-categories from the listings');

// Text for notifications
define('_MI_WFL_GLOBAL_NOTIFY', 'Global');
define('_MI_WFL_GLOBAL_NOTIFYDSC', 'Global links notification options.');
define('_MI_WFL_CATEGORY_NOTIFY', 'Category');
define('_MI_WFL_CATEGORY_NOTIFYDSC', 'Notification options that apply to the current link category.');
define('_MI_WFL_LINK_NOTIFY', 'Link');
define('_MI_WFL_FILE_NOTIFYDSC', 'Notification options that apply to the current link.');
define('_MI_WFL_GLOBAL_NEWCATEGORY_NOTIFY', 'New Category');
define('_MI_WFL_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Notify me when a new link category is created.');
define('_MI_WFL_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Receive notification when a new link category is created.');
define('_MI_WFL_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New link category');

define('_MI_WFL_GLOBAL_LINKMODIFY_NOTIFY', 'Modify Link Requested');
define('_MI_WFL_GLOBAL_LINKMODIFY_NOTIFYCAP', 'Notify me of any link modification request.');
define('_MI_WFL_GLOBAL_LINKMODIFY_NOTIFYDSC', 'Receive notification when any link modification request is submitted.');
define('_MI_WFL_GLOBAL_LINKMODIFY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Link Modification Requested');

define('_MI_WFL_GLOBAL_LINKBROKEN_NOTIFY', 'Broken Link Submitted');
define('_MI_WFL_GLOBAL_LINKBROKEN_NOTIFYCAP', 'Notify me of any broken link report.');
define('_MI_WFL_GLOBAL_LINKBROKEN_NOTIFYDSC', 'Receive notification when any broken link report is submitted.');
define('_MI_WFL_GLOBAL_LINKBROKEN_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Broken Link Reported');

define('_MI_WFL_GLOBAL_LINKSUBMIT_NOTIFY', 'Link Submitted');
define('_MI_WFL_GLOBAL_LINKSUBMIT_NOTIFYCAP', 'Notify me when any new link is submitted (awaiting approval).');
define('_MI_WFL_GLOBAL_LINKSUBMIT_NOTIFYDSC', 'Receive notification when any new link is submitted (awaiting approval).');
define('_MI_WFL_GLOBAL_LINKSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New link submitted');

define('_MI_WFL_GLOBAL_NEWLINK_NOTIFY', 'New Link');
define('_MI_WFL_GLOBAL_NEWLINK_NOTIFYCAP', 'Notify me when any new link is posted.');
define('_MI_WFL_GLOBAL_NEWLINK_NOTIFYDSC', 'Receive notification when any new link is posted.');
define('_MI_WFL_GLOBAL_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New link');

define('_MI_WFL_CATEGORY_FILESUBMIT_NOTIFY', 'Link Submitted');
define('_MI_WFL_CATEGORY_FILESUBMIT_NOTIFYCAP', 'Notify me when a new link is submitted (awaiting approval) to the current category.');
define('_MI_WFL_CATEGORY_FILESUBMIT_NOTIFYDSC', 'Receive notification when a new link is submitted (awaiting approval) to the current category.');
define('_MI_WFL_CATEGORY_FILESUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New link submitted in category');

define('_MI_WFL_CATEGORY_NEWLINK_NOTIFY', 'New Link');
define('_MI_WFL_CATEGORY_NEWLINK_NOTIFYCAP', 'Notify me when a new link is posted to the current category.');
define('_MI_WFL_CATEGORY_NEWLINK_NOTIFYDSC', 'Receive notification when a new link is posted to the current category.');
define('_MI_WFL_CATEGORY_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New link in category');

define('_MI_WFL_LINK_APPROVE_NOTIFY', 'Link Approved');
define('_MI_WFL_LINK_APPROVE_NOTIFYCAP', 'Notify me when this link is approved.');
define('_MI_WFL_LINK_APPROVE_NOTIFYDSC', 'Receive notification when this link is approved.');
define('_MI_WFL_LINK_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Link Approved');

define('_MI_WFL_AUTHOR_INFO', 'Developer Information');
define('_MI_WFL_AUTHOR_NAME', 'Developer');
define('_MI_WFL_AUTHOR_DEVTEAM', 'Development Team');
define('_MI_WFL_AUTHOR_WEBSITE', 'Developer website');
define('_MI_WFL_AUTHOR_EMAIL', 'Developer email');
define('_MI_WFL_AUTHOR_CREDITS', 'Credits');
define('_MI_WFL_MODULE_INFO', 'Module Development Information');
define('_MI_WFL_MODULE_STATUS', 'Development Status');
define('_MI_WFL_MODULE_DEMO', 'Demo Site');
define('_MI_WFL_MODULE_SUPPORT', 'Official support site');
define('_MI_WFL_MODULE_BUG', 'Report a bug for this module');
define('_MI_WFL_MODULE_FEATURE', 'Suggest a new feature for this module');
define('_MI_WFL_MODULE_DISCLAIMER', 'Disclaimer');
define('_MI_WFL_RELEASE', 'Release Date: ');

define('_MI_WFL_MODULE_MAILLIST', 'WF-Project Mailing Lists');
define('_MI_WFL_MODULE_MAILANNOUNCEMENTS', 'Announcements Mailing List');
define('_MI_WFL_MODULE_MAILBUGS', 'Bug Mailing List');
define('_MI_WFL_MODULE_MAILFEATURES', 'Features Mailing List');
define('_MI_WFL_MODULE_MAILANNOUNCEMENTSDSC', 'Get the latest announcements from WF-Project.');
define('_MI_WFL_MODULE_MAILBUGSDSC', 'Bug Tracking and submission mailing list');
define('_MI_WFL_MODULE_MAILFEATURESDSC', 'Request New Features mailing list.');

define('_MI_WFL_WARNINGTEXT', 'THE SOFTWARE IS PROVIDED BY WF-PROJECTS "AS IS" AND "WITH ALL FAULTS."
WF-PROJECTS MAKES NO REPRESENTATIONS OR WARRANTIES OF ANY KIND CONCERNING
THE QUALITY, SAFETY OR SUITABILITY OF THE SOFTWARE, EITHER EXPRESS OR
IMPLIED, INCLUDING WITHOUT LIMITATION ANY IMPLIED WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NON-INFRINGEMENT.
FURTHER, WF-PROJECTS MAKES NO REPRESENTATIONS OR WARRANTIES AS TO THE TRUTH,
ACCURACY OR COMPLETENESS OF ANY STATEMENTS, INFORMATION OR MATERIALS
CONCERNING THE SOFTWARE THAT IS CONTAINED IN WF-Project WEBSITE. IN NO
EVENT WILL WF-PROJECTS BE LIABLE FOR ANY INDIRECT, PUNITIVE, SPECIAL,
INCIDENTAL OR CONSEQUENTIAL DAMAGES HOWEVER THEY MAY ARISE AND EVEN IF
WF-PROJECT HAS BEEN PREVIOUSLY ADVISED OF THE POSSIBILITY OF SUCH DAMAGES..');

define('_MI_WFL_AUTHOR_CREDITSTEXT', 'The WF-Projects Team would like to thank the following people for their help and support during the development phase of this module.<br></br />EdStacey, maumed, banned, krobi, Pnooka, MarcoFr, cosmodrum, placebo333, GibaPhp');
define('_MI_WFL_AUTHOR_BUGFIXES', 'Bug Fix History');

define('_MI_WFL_COPYRIGHT2', 'Copyright');
define(
    '_MI_WFL_COPYRIGHTIMAGE',
       'Unless stated otherwise, this Module (WF-Links) and its images are copyright to the WF-Projects team.<br><br>You have the permission to copy, edit and change WF-Links to suit your personal requirements. You agree not to modify, adapt and redistribute the source code of the Software without the express permission from the WF-Projects team.<br><br>PageRank is a trademark of Google Inc.'
);

define('_MI_WFL_SELECTFORUM', 'Select Forum:');
define('_MI_WFL_SELECTFORUMDSC', 'Select the forum you have installed and will be used by WF-Links.');

define('_MI_WFL_DISPLAYFORUM1', 'Newbb (all)');
define('_MI_WFL_DISPLAYFORUM2', 'IPB Forum');
define('_MI_WFL_DISPLAYFORUM3', 'PHPBB2 Module');

// added by McDonald
define('_MI_WFL_COUNTRY', 'Country:');
define('_MI_WFL_EDITOR', 'Editor to use (admin):');
define('_MI_WFL_EDITORCHOICE', "Select the editor to use for admin side. If you have a 'simple' install (e.g you use only XOOPS core editor class, provided in the standard xoops core package), then you can just select DHTML and Compact");
define('_MI_WFL_EDITORUSER', 'Editor to use (user):');
define('_MI_WFL_EDITORCHOICEUSER', "Select the editor to use for user side. If you have a 'simple' install (e.g you use only XOOPS core editor class, provided in the standard xoops core package), then you can just select DHTML and Compact");
define('_MI_WFL_FORM_DHTML', 'DHTML');
define('_MI_WFL_FORM_COMPACT', 'Compact');
define('_MI_WFL_FORM_SPAW', 'Spaw Editor');
define('_MI_WFL_FORM_HTMLAREA', 'HtmlArea Editor');
define('_MI_WFL_FORM_FCK', 'FCK Editor');
define('_MI_WFL_FORM_KOIVI', 'Koivi Editor');
define('_MI_WFL_FORM_INBETWEEN', 'Inbetween');
define('_MI_WFL_FORM_TINYEDITOR', 'TinyEditor');
define('_MI_WFL_FORM_TINYMCE', 'TinyMCE');
define('_MI_WFL_FORM_DHTMLEXT', 'DHTML Extended');
define('_MI_WFL_SORTCATS', 'Sort categories by:');
define('_MI_WFL_SORTCATSDSC', 'Select how categories and sub-categories are sorted.');
define('_MI_WFL_KEYLENGTH', 'Enter max. characters for meta keywords:');
define('_MI_WFL_KEYLENGTHDSC', 'Default is 255 characters');
define('_MI_WFL_OTHERLINKS', 'Show other links submitted by Submitter?');
define('_MI_WFL_OTHERLINKSDSC', 'Select if other links of the submitter will be displayed.');
define('_MI_WFL_TOTALCHARS', 'Set total amount of characters for description?');
define('_MI_WFL_TOTALCHARSDSC', 'Set total amount of characters for description in category view.');
define('_MI_WFL_QUICKVIEW', 'Show Quick View option?');
define('_MI_WFL_QUICKVIEWDSC', 'This turns on/off the Quick View option.');
define('_MI_WFL_ICONS_CREDITS', 'Icons by');
define('_MI_WFL_SHOWSBOOKMARKS', 'Show Social Bookmarks?');
define('_MI_WFL_SHOWSBOOKMARKSDSC', 'Select Yes if you want Social Bookmark icons to be displayed under article.');
define('_MI_WFL_SHOWPAGERANK', 'Show Google PageRank?');
define('_MI_WFL_SHOWPAGERANKSDSC', 'Select Yes if you want Google PageRank to be displayed.');
define('_MI_WFL_USERTAGDESCR', 'User can submit Tags:');
define('_MI_WFL_USERTAGDSC', 'Select Yes if user is allowed to submit tags.');

// Version 1.05 RC5
define('_MI_WFL_DATEFORMATADMIN', 'Timestamp administration:');
define('_MI_WFL_DATEFORMATADMINDSC', 'Default admininstration Timestamp for WF-Links<br>See <a href="http://jp.php.net/manual/en/function.date.php" target="_blank">PHP manual</a>');
define('_MI_WFL_USEADDRESSDESCR', 'Use address and map options?');
define('_MI_WFL_USEADDRESSDSC', 'Select Yes to use the address and maps feature.');
define('_MI_WFL_HEADERPRINT', '[PRINT OPTIONS] Print page header');
define('_MI_WFL_HEADERPRINTDSC', 'Header that will be printed for each link');
define('_MI_WFL_LOGOURLPRINT', '[PRINT OPTIONS] Logo print url');
define('_MI_WFL_LOGOURLDSCPRINT', 'Url of the logo that will be printed at the top of the page');
define('_MI_WFL_FOOTERPRINT', '[PRINT OPTIONS] Print page footer');
define('_MI_WFL_FOOTERPRINTDSC', 'Footer that will be printed for each link');
define('_MI_WFL_BNAME3', 'WF-Links Sponsor Statistics');
define('_MI_WFL_VCARD_CREDITS', 'vCard script by');

// Version 1.05 RC6
define('_MI_WFL_FLAGIMG', 'Country Flag Image Directory');
define('_MI_WFL_FLAGIMGDSC', 'Enter the url without a trailing slash');
define('_MI_WFL_CATEGORYIMGDSC', 'Enter the url without a trailing slash');
define('_MI_WFL_SCREENSHOTSDSC', 'Enter the url without a trailing slash');
define('_MI_WFL_MAINIMGDIRDSC', 'Enter the url without a trailing slash');
define('_MI_WFL_USEAUTOSCRSHOT', 'Use Auto Screenshot');
define('_MI_WFL_USEAUTOSCRSHOTDSC', 'This will automatically create a screenshot based on the url. This overrules uploaded screenshots and might not work for all websites.');
define('_MI_WFL_MOZSHOT_CREDITS', 'Auto Screenshot by');
define('_MI_WFL_MOZSHOT_CREDITSTXT', '<a href="http://mozshot.nemui.org" target=_blank>Mozshot</a> (all source code provided under <a href="http://www.ruby-lang.org/en/" target=_blank>Ruby</a> lisence)');

// Version 1.06 RC-1
define('_MI_WFL_BNAME4', 'WF-Links Tag Cloud');
define('_MI_WFL_BNAME5', 'WF-Links Top Tags');

// Version 1.06 RC-3
define('_MI_WFL_DISPLAYFORUM4', 'Newbbex');
define('_MI_WFL_TITLE_A', 'Title (A)');
define('_MI_WFL_TITLE_D', 'Title (D)');
define('_MI_WFL_RATING_A', 'Rating (A)');
define('_MI_WFL_RATING_D', 'Rating (D)');
define('_MI_WFL_SUBMITTED_A', 'Submission Date (A)');
define('_MI_WFL_SUBMITTED_D', 'Submission Date (D)');
define('_MI_WFL_POPULARITY_A', 'Popularity (A)');
define('_MI_WFL_POPULARITY_D', 'Popularity (D)');
define('_MI_WFL_COUNTRY_A', 'Country (A)');
define('_MI_WFL_COUNTRY_D', 'Country (D)');

// Version 1.08

// Admin Summary
//define("_MI_WFL_SCATEGORY","Category");
define('_MI_WFL_SNEWFILESVAL', 'Submitted');
define('_MI_WFL_SMODREQUEST', 'Modified');
//define("_MI_WFL_SREVIEWS","Reviews: ");
define('_MI_WFL_SBROKENSUBMIT', 'Broken');
define('_MI_WFL_DOCUMENTATION', 'Docs');

define('_MI_WFL_ADD_LINK', 'Add Link');
define('_MI_WFL_ADD_CATEGORY', 'Add Category');

//1.11 Beta 1
define('_MI_WFL_HELP_OVERVIEW', 'Overview');
define('_MI_WFL_HELP_INSTALL', 'Install');
define('_MI_WFL_HELP_UPDATE', 'Update');
define('_MI_WFL_HELP_CONVERT', 'Convert');
define('_MI_WFL_HELP_PREFERENCES', 'Preferences');
define('_MI_WFL_HELP_INDEXPAGE', 'Index Page');
define('_MI_WFL_HELP_CATEGORY', 'Category');
define('_MI_WFL_HELP_PERMISSION', 'Permissions');
define('_MI_WFL_HELP_LINKS', 'Links');

//1.11 Beta 2
define('_MI_WFL_DISPLAYFORUM5', 'X-Forum');

// The Directory of this module
define('_MI_WFL_DIRNAME', basename(dirname(dirname(__DIR__))));

// ----------------- Help -----------------

define('_MI_WFL_HELP_HEADER', __DIR__ . '/help/helpheader.tpl');
define('_MI_WFL_BACK_2_ADMIN', 'Back to Administration of ');
define('_MI_WFL_OVERVIEW', 'Overview');
define('_MI_WFL_HELP', 'Help');
define('_MI_WFL_HELP_DISCLAIMER', 'Disclaimer');
define('_MI_WFL_HELP_LICENSE', 'License');
define('_MI_WFL_HELP_SUPPORT', 'Support');
// Links
define('_MI_WFL_MLINKS_DESC', 'Use the Link Management to call the submit form for creating a new link.');
define('_MI_WFL_HELP_LINKS_DESCRIPTION', '
    This form has the following fields/options:<br>
    <br>
    <span style="text-decoration: underline;"><b>Link title</b></span><br>
    Enter here the title for the new link.<br>
    <br>
    <span style="text-decoration: underline;"><b>Link url</b></span><br>
    Enter the url of the new link.<br>
    Click the globe icon to open a browser tab/window with the entered url. You can use this icon or button to check the url.<br>
    <br>
    <span style="text-decoration: underline;"><b>Link main category</b></span><br>
    Select the main category for the link.<br>
    <br>
    <span style="text-decoration: underline;"><b>Link description</b></span><br>
    Here you can enter a description of the new link.<br>
    <br>
    <span style="text-decoration: underline;"><b>Keywords</b></span><br>
    In this field you can enter the meta keywords. Enter the keywords as: keyword1, keyword2, keyword3, ...<br>
    The maximum amount of characters can be set in the Preferences.<br>
    <br>
    <span style="text-decoration: underline;"><b>Link screenshot image</b></span><br>
    Screenshot image must be a valid image link under uploads/images/screenshots directory (ex. shot.gif).<br>
    Choose Show no image if you don\'t want to display a screenshot.<br>
    <br>
    <span style="text-decoration: underline;"><b>Google Maps, Yahoo Maps and Multimap</b></span><br>
    These three fields can be used to enter an url to an online map.<br>
    Click the appropriate icon behind the field to open a new tab/window in the browser. <br>
    The url used for this action is the url entered in the field. <br>
    You can use this icons or buttons to check or modify the map-url entered.<br>
    <br>
    <span style="text-decoration: underline;"><b>Address fields</b></span><br>
    Use these fields for add Contact Details to the link. The way the address is formatted is based on the selected country.<br>
    If you want another address format you have to modify the file ../include/address.php<br>
    For address formats see the Universal Postal Union website.<br>
    Email addresses can be entered in 2 ways:<br>
    <br>
    <ul>
     <li>name@address.com</li>
     <li>mailto:name@address.com</li>
    </ul>
    <br>
    Both email formats are automatic converted to: name AT address DOT com<br>
    <br>
    <span style="text-decoration: underline;"><b>Set publish date</b></span><br>
    Enter the date and time when the link will be published.<br>
    <br>
    <span style="text-decoration: underline;"><b>Link expire date</b></span><br>
    Use the options here to set an expiration date for the link. The link will no longer be visible for visitors.<br>
    This option can be used for removing the expiration date also.<br>
    <br>
    <span style="text-decoration: underline;"><b>Set link offline</b></span><br>
    Select Yes to set the link offline. The link will no longer be viewable for visitors.<br>
    Default: No<br>
    <br>
    <span style="text-decoration: underline;"><b>Set link status as updated</b></span><br>
    Select Yes to set the link as updated. An icon will appear behind the title of the link to notify visitors that the content of that link has been changed.<br>
    Default: No<br>
    <br>
    <span style="text-decoration: underline;"><b>Add Discuss in this Forum</b></span><br>
    Selecting the forum in use will result in an icon for discussing the link in that forum.<br>
    <br>
    <span style="text-decoration: underline;"><b>Submit New link as News item*</b></span><br>
    Select Yes to submit the new link as an article in the News module.<br>
    Default: No<br>
    <br>
    <span style="text-decoration: underline;"><b>Select News Category to submit News*</b></span><br>
    Select the News category for submitting the article.<br>
    <br>
    <span style="text-decoration: underline;"><b>News Title*</b></span><br>
    Give a title for the article or leave blank to use the link title.<br>
    <br>
    <br>
    * These fields appear when the News module is installed only.
');
// Category
define('_MI_WFL_MCATEGORY_DESC', 'The Category Management consists of 2 sections, one for modifying an existing category and one for creating a new category.');
define('_MI_WFL_HELP_CATEGORY_DESCRIPTION', '
    <h4>Modify category</h4>
    Select a category from the selection menu and click one of the three buttons: Modify, Move Links or Delete.<br>
    <br>
    <b>Modify</b><br>
    This will open the page with all settings of the selected category so you can make modification to it.<br>
    <br>
    <b>Move Links</b><br>
    With the button Move Links you can move all links from a category to another category.<br>
    Select a category and this button. In the page that follows select the destination category and click Move Links to move all the links.<br>
    If you decide not to continue with this operation click the Cancel button.<br>
    <em><i><b>Note</b>: Moving links from one category to another category can not be undone!!</i></em><br>
    <br>
    <b>Delete</b><br>
    If you want to delete a category use the Delete button.<br>
    <em><i><b>Note</b>: This will delete the category and ALL links and comments too. This operation can not be undone!!</i></em><br>
    <h4>Create new category</h4>
    Go here for creating a new category.<br>
    <br>
    <b>Category title</b><br>
    Enter the title for the new category.<br>
    You have to enter a title here otherwise it can\'t be saved to the database.<br>
    <br>
    <b>Category weight</b><br>
    Enter a weight for sorting multiple categories. You can skip this (leave it 0) if you\'ve set to have the categories to be sorted by title in Preferences.<br>
    <br>
    <b>Set as sub-category</b><br>
    Select a category which will act as main category for the new category.<br>
    <br>
    <b>Select category image</b><br>
    Select an image for the category. Selecting Show no image to use the default category image.<br>
    <br>
    <b>Set category description</b><br>
    Enter a description for the category.<br>
    <br>
    <b>Select category sponsor</b><br>
    Select a client for sponsoring the category. You can create clients in the section Banners of the Control Panel.<br>
    If you select a client than the banner ID (next setting) will not be saved.<br>
    <br>
    <b>Select banner ID</b><br>
    Select the ID of a specific banner to display above the category.<br>
    <br>
');
// Index Page
define('_MI_WFL_INDEXPAGE_DESC', 'Here you can setup the \'look\' of the main page of WF-Links.');
define('_MI_WFL_HELP_INDEXPAGE_DESCRIPTION', '
    You can select the logo to display above each page, set the header, description and footer.<br/><br/>At the bottom are 2 special
    settings for displaying the latest x links submitted, complete with pagination:<br/><br/><b>Show latest listings</b><br/>Select Yes will display the latest links in the main page.<br/>Default:
    No<br/><br/><b>How many links to show</b><br/>Give the total of new links to be displayed. The amount of links displayed per page depends on the setting \'Link listing count\' in
    Preferences.<br/>With the default settings this mean 10 links per page and 5 pages.<br/>A value of 0 will turn this option off.<br/>Default: 50
');
// Permission
define('_MI_WFL_PERMISSIONS_DESC', 'Here you can set the following permissions for the categories per user group');
define('_MI_WFL_HELP_PERMISSION_DESCRIPTION', '
    <b>Categories permissions</b><br>
    Select here the categories that each group is allowed to view.<br>
    <br>
    <b>Submitter permissions</b><br>
    Select the groups who can submit new links to selected categories.<br>
    <br>
    <b>Moderator groups</b><br>
    Select the groups who have moderator privligages for the selected categories.<br>
    <br>
    <b>Auto approve links</b><br>
    Select the groups that will have new links auto approved without admin intervention.<br>
    <br>
    <b>Rate permissions</b><br>
    Select the groups that can rate a link in the selected categories.
');
// Convert
define('_MI_WFL_CONVERT_DESC', '');
define('_MI_WFL_HELP_CONVERT_DESCRIPTION', '
    <span style="background-color: #ffff99;">Instructions for converting from myLinks to WF-Links.</span><br/><span style="background-color: #ffff99;">If you want to do a fresh install of WF-Links please select \'Install\'.</span><br/><br/><b><span style="color: #ff0000;">Remember: It is always a good idea to make a database backup before installing any modules.</span></b><br/>
    <h4>Conversion from Xoops myLinks/webLinks ==> WF-Links</h4>
    <p><br/>Note: When you do the conversion the update script will convert the myLinks/webLinks tables in the database into WF-Links tables. After the conversion you can\'t use myLinks/webLinks
        anymore because it is missing tables then. If you want to keep your myLinks/webLinks working you would have to backup the myLinks/webLinks tables before you start updating and restore them
        afterwards. It is possible to have WF-Links and myLinks/webLinks running at the same time (though we don\'t know why you would won\'t that). <br/><br/><b>1) Make a backup</b></p>
    <p><span style="color: #000000; ">&nbsp; &nbsp; Backup the myLinks/webLinks tables from your database<br/><br/></span><b>2) Upload the module to your website</b></p>
    <p>&nbsp; &nbsp; &nbsp;Upload the \'modules\' and \'uploads\' folder to your {xoops-rootdirectory}<br/><br></p>
    <p><b>3) Change and verify folder permissions</b><br/><br/>CHMOD the following folders to 777:</p>
    <p><br/><em>{xoops-rootdirectory}/uploads/images</em><br/><em>{xoops-rootdirectory}/uploads/images/category</em><br/><em>{xoops-rootdirectory}/uploads/images/category/thumbs</em><br/><em>{xoops-rootdirectory}/uploads/images/flags</em><br/><em>{xoops-rootdirectory}/uploads/images/flags/flags_small</em><br/><em>{xoops-rootdirectory}/uploads/images/screenshots</em><br/><em>{xoops-rootdirectory}/uploads/images/screenshots/thumbs</em><br/><em>{xoops-rootdirectory}/uploads/images/thumbs</em><br/><br/><b>4)
        Install the module</b></p>
    <p>&nbsp; &nbsp; &nbsp;Login as administrator and enter Xoops Administration page. Select System --> modules and install WF-Links<br/><br/><b>5) Start the conversion script</b></p>
    <ul>
        <li>Point your browser to {xoops-rootdirectory}/modules/wflinks/update.php and execute the update script.</li>
        <li>Follow the instructions provided during the install procedure.</li>
        <li>The script will try to determine which version or versions of myLinks or webLinks you have installed and will try to update it.</li>
    </ul><br>
    <p><b>6) Update the module</b></p>
    <p>&nbsp; &nbsp;Return to System --> Modules and update WF-Links, otherwise the templates will be for the previous version and the pages will display correctly.<br/><br></p>
    <p><b>7) Configure the module</b></p>
    <p>&nbsp; &nbsp; Most importent steps now will be to setup the group permissions for the module and its blocks via System --> Groups<br/><br/><b>8) Restore or remove myLinks/webLinks</b></p>
    <p>If you want to continue using myLinks or webLinks in addition to WF-Links then restore your myLinks/webLinks tables<br/>now from the backup you did in step 1. If you don\'t want to use those
        anymore deactivate the old module and uninstall it.<br/><br/></p>
');
// Overview
define('_MI_WFL_OVERVIEW_DESC', '');
define('_MI_WFL_HELP_OVERVIEW_DESCRIPTION', '
    WF-Links is a module for XOOPS that helps you to create a link section with multiple categories and sub-categories..<br/><br/>
    <p>
    Here is a short selection of features offered:</p>
    <ul>
    	<li>Create multiple categories and subcategories for your links</li>
    	<li>Submission permissions per Category</li>
    	<li>Moderation permissions per Category</li>
    	<li>Choose to validate link submissions first or have them automaticly
    	accepted</li>
    	<li>Automatic approval for selected groups</li>
    	<li>Validate links</li>
    	<li>Add (automatic) screenshots to your links</li>
    	<li>Add a description to your links</li>
    	<li>Add an address incl. Google Maps,Yahoo Maps and vCard</li>
    	<li>Print option</li>
    	<li>Allow user ratings and comments for your links</li>
    	<li>Define publishing and expiration times for every link (optional)</li>
    	<li>And Many more...</li>
    </ul>
    <br/>
    <h4 class="odd">Install/uninstall</h4><br/>
    No special measures necessary, follow the standard installation process,
    extract the "xoopstube" folder into the ../modules directory. Install the
    module through Admin -> System Module -> Modules. If you need detailed
    instructions on how to install a module, please see the
    <a href="http://goo.gl/adT2i">XOOPS Operations Manual</a>.<br/><br/>
    <h4 class="odd">Tutorial</h4>
    <p class="even">There is no tutorial available at the moment.</p>
');
// Install
define('_MI_WFL_HELP_INSTALL1', 'Installation (Fresh Installation)');
define('_MI_WFL_INSTALL_DESC', '');
define('_MI_WFL_HELP_INSTALL_DESCRIPTION', '
    <span style="background-color: #ffff99;">These instructions are for a fresh install.</span><br/><span style="background-color: #ffff99;">If you want to convert from myLinks/webLinks please select \'Convert\' from the menu.</span><br/><br/><span style="color: #ff0000;">Remember: It is always a good idea to make a database backup before installing any modules.</span><br/><br/>
    <b>Fresh installation of WF-Links</b><br/><br/>
    <b>1) Upload the module to your website</b><br/><br/>
    Upload the \'modules/Wflinks\' and \'uploads/images\' folder to your
    {xoops-rootdirectory}.<br/><br/>
    If you want to rename the folder \'modules/Wflinks\' in for example \'modules/weblinks\' you have to do so before you continue with the installation.<br/><br/>
    <b>2) Change and verify folder permissions</b><br/><br/>
    If it is not done yet, CHMOD the following folders to 777:<br/><br/>
    <em>{xoops-rootdirectory}/uploads/images</em><br/>
    <em>{xoops-rootdirectory}/uploads/images/category</em><br/>
    <em>{xoops-rootdirectory}/uploads/images/category/thumbs</em><br/>
    <em>{xoops-rootdirectory}/uploads/images/flags</em><br/>
    <em>{xoops-rootdirectory}/uploads/images/flags/flags_small</em><br/>
    <em>{xoops-rootdirectory}/uploads/images/screenshots</em><br/>
    <em>{xoops-rootdirectory}/uploads/images/screenshots/thumbs</em><br/>
    <em>{xoops-rootdirectory}/uploads/images/thumbs</em><br/><br/>
    <b>3) Install the module</b><br/><br/>
    Login as administrator and enter Xoops Administration page. Select <em>System --> modules</em> and install WF-Links<br/><br/>
    <b>4) Configure the
    module</b><br/><br/>Most important step now will be to setup the group permissions for the module and its blocks via <em>System --> groups</em>
');
// Preferences
define('_MI_WFL_PREFERENCES_DESC', '');
define('_MI_WFL_HELP_PREFERENCES_DESCRIPTION', '
    First we pay a visit to the Preferences of WF-Links to configure the module.<br/><br/><br/><b>Link popular count</b><br/>Set here the amount of hits needed for a link for setting it as
    being a popular link.<br/>Default: 100<br/><br/><b>Links popular and new</b> <br/>Here you can set how a link will be displayed as popular and new.<br/>There are the following
    options:<br/><br/>
    <ul>
        <li>Display as icons</li>
        <li>Display as text</li>
        <li>Do not display</li>
    </ul>
    <br/>Default: Display as icons<br/><br/><b>Links days new</b><br/>The number of days a link status will be considered as new.<br/>Default: 10<br/><br/><b>Links days updated</b><br/>The
    amount of days a link status will be considered as updated.<br/>Default: 10<br/><br/><b>Link listing count</b><br/>Number of links to display in each category listing.<br/>Default:
    10<br/><br/><b>Admin index links count</b><br/>Number of new links to display in module admin area.<br/>Default: 10<br/><br/><b>Default link order</b><br/>Select the default
    order for the link listings.<br/><br/>
    <ul>
        <li>Title</li>
        <li>Submission date</li>
        <li>Rating</li>
        <li>Popularity</li>
        <li>Country</li>
    </ul>
    <br/>Each option can be set to ascending (A) or descending (D).<br/>Default: Title (A)<br/><br/><b>Sort categories by</b><br/>Select how categories and sub-categories are
    sorted.<br/><br/>
    <ul>
        <li>Title</li>
        <li>Weight</li>
    </ul>
    <br/>Default: Title<br/><br/><b>Sub-Categories</b><br/>Select Yes to display sub-categories. Selecting No will hide sub-categories from the listings.<br/>Default: No<br/><br/><b>Editor
    to use (admin)</b><br/>Select the editor to use for admin side.<br/>If you have a \'simple\' install (e.g you use only XOOPS core editor class, provided in the standard xoops core package),
    then you can just select DHTML and Compact.<br/>When selecting DHTML than this might be overruled by the setting Default Editor in ImpressCMS Preferences.<br/>Default: DHTML<br/><br/><b>Editor
    to use (user)</b><br/>Select the editor to use for user side.<br/>If you have a \'simple\' install (e.g you use only XOOPS core editor class, provided in the standard xoops core package), then
    you can just select DHTML and Compact.<br/>When selecting DHTML than this might be overruled by the setting Default Editor in ImpressCMS Preferences.<br/>Default: DHTML<br/><br/><b>Display
    screenshot images</b><br/>Select Yes to display screenshot images for each link item.<br/>Default: Yes<br/><br/><b>Use thumb nails</b><br/>Supported link types: JPG, GIF, PNG.<br/>WF-Links
    will use thumb nails for images. Set to No to use orginal image if the server does not support this option.<br/>Default: No<br/><br/><b>Update thumbnails</b><br/>If selected Thumbnail
    images will be updated at each page render, otherwise the first thumbnail image will be used regardless.<br/>Default: Yes<br/><br/><b>Thumb nail quality</b><br/>Quality:<br/><br/>
    <ul>
        <li>Lowest: 0</li>
        <li>Highest: 100</li>
    </ul>
    <br/>Default: 100<br/><br/><b>Keep image aspect ratio</b><br/>Default: No<br/><br/><b>Image display width</b><br/>Display width (px) for screenshot image.<br/>Default: 100<br/><br/><b>Image
    display height</b><br/>Display height (px) for screenshot image.<br/>Default: 79<br/><br/><b>Upload size (KB)</b><br/>Maximum link size permitted with link uploads.<br/>Default:
    200000<br/><br/><b>Upload image width</b><br/>Maximum image width (px) permitted when uploading image links<br/>Default: 600<br/><br/><b>Upload image height</b><br/>Maximum
    image height (px) permitted when uploading image links.<br/>Default: 600<br/><br/><b>Use auto screenshot</b><br/>This will automatically create a screenshot based on the url. This
    overrules uploaded screenshots and might not work for all websites.<br/>Default: No<br/><br/><b>Main image directory</b><br/>Enter the url without a trailing slash.<br/>Default:
    modules/wflinks/images<br/><br/><b>Screenshots upload directory</b><br/>Enter the url without a trailing slash.<br/>Default: uploads/images/screenshots<br/><br/><b>Category image
    upload directory</b><br/>Enter the url without a trailing slash.<br/>Default: uploads/images/category<br/><br/><b>Country flag image directory</b><br/>Enter the url without a
    trailing slash.<br/>Default: uploads/images/flags/flags_small<br/><br/><b>Timestamp</b><br/>Default timestamp for WF-links.<br/>Here you can configure how the date is formatted. This
    setting is not for the WF-Links blocks.<br/>See also the <a href="http://php.net/manual/en/function.date.php" target="_blank">PHP Manual.</a><br/>Default: <em>D, d-M-Y</em><br/><br/><b>Timestamp
    administration</b><br/>Default admininstration timestamp for WF-Links.<br/>Here you can configure how the date is formatted for the WF-Links administration.<br/>See also the
    <a href="http://php.net/manual/en/function.date.php" target="_blank">PHP Manual.</a><br/>Default: <em>D, d-M-Y - G:i</em><br/><br/><b>Set total amount of characters for
    description</b><br/>Set total amount of characters for description in category view.<br/>Default: 200<br/><br/><b>Enter max. characters for meta keywords</b><br/>This is maximum
    amount of characters that can be used for meta keywords.<br/>See <a href="http://en.wikipedia.org/wiki/Meta_element#The_keywords_attribute" target="_blank">Wikipedia </a>for more information.<br/>Default:
    255<br/><br/><b>Show other links submitted by Submitter</b><br/>Select Yes if other links of the submitter will be displayed.<br/>Default: Yes<br/><br/><b>Show Quick View
    option</b><br/>Select Yes to turn the Quick View option on.<br/>Default: No<br/><br/><b>Show Social Bookmarks</b><br/>Select Yes if you want Social Bookmark icons to be displayed
    under article.<br/>Default: Yes<br/><br/><b>Show Google PageRank&trade;</b><br/>Select Yes if you want Google PageRank&trade; to be displayed.<br/>Default: Yes<br/><br/><b>User can
    submit Tags</b><br/>Select Yes if user is allowed to submit tags.<br/>Note: The Tag module needs to be installed otherwise the form doesn\'t show in the submit form.<br/>Default:
    No<br/><br/><b>Use address and map options</b><br/>Select Yes to use the address and maps feature in submit forms.<br/>Default: Yes<br/><br/><b>Print page footer</b><br/>Footer
    that will be printed for each link.<br/>Default: <website_url><br/><br/><b>Logo print url</b><br/>Url of the logo that will be printed at the top of the page.<br/>Default: <website_url>/modules/wflinks/assets/images/logo-en.gif<br/><br/><b>Show
    disclaimer before user submission</b><br/>Before a user can submit a link show the entry regulations.<br/>Default: No<br/><br/><b>Enter submission disclaimer text</b><br/>Default:
    We have the right, but not the obligation to monitor and review submissions submitted by users, in the forums. We shall not be responsible for any of the content of these messages. We further
    reserve the right, to delete, move or edit submissions that the we, in its exclusive discretion, deems abusive, defamatory, obscene or in violation of any Copyright or Trademark laws or otherwise
    objectionable.<br/><br/><b>Show disclaimer before user link</b><br/>Show link regulations before open a link.<br/>Default: No<br/><br/><b>Enter link disclaimer text</b><br/>Default:
    The links on this site are provided as is without warranty either expressed or implied. linkloaded files should be checked for possible virus infection using the most up-to-date detection and
    security packages. If you have a question concerning a particular piece of software, feel free to contact the developer. We refuse liability for any damage or loss resulting from the use or misuse
    of any software offered from this site for linkloading. If you have any doubt at all about the safety and operation of software made available to you on this site, do not linkload it. Contact us
    if you have questions concerning this disclaimer.<br/><br/><b>Copyright notice</b><br/>Select to display a copyright notice on link page.<br/>Default: Yes<br/><br/><b>Select
    forum</b><br/>Select the forum you have installed and will be used by WF-Links.<br/><br/>
    <ul>
        <li>Newbb</li>
        <li>IPB Forum</li>
        <li>PHPBB Module</li>
        <li>Newbbex</li>
    </ul>
    <br/>Default: Newbb<br/><br/><b>Comment rules</b><br/><br/>
    <ul>
        <li>Disable comments</li>
        <li>Comments are always approved</li>
        <li>Comments by registered users are always approved</li>
        <li>All comments need to be approved by administrators</li>
    </ul>
    <br/>Default: Comments are always approved<br/><br/><b>Allow anonymous post in comments</b><br/>Default: No<br/><br/><b>Enable notification</b><br/>This module allows users to
    be notified when certain events occur. Select if users should be presented with notification options in a Block (Block-style), within the module (Inline-style), or both. For block-style
    notification, the Notification Options block must be enabled for this module.<br/><br/>
    <ul>
        <li>Disable notification</li>
        <li>Enable only block-style</li>
        <li>Enable only inline-syle</li>
        <li>Enable notification (both styles)</li>
    </ul>
    <br/>Default: Enable notification (both styles)<br/><br/><b>Enable specific events</b><br/>Select which notification events to which your users may subscribe.<br/><br/>
    <ul>
        <li>Global : New category</li>
        <li>Global : Modify link requested</li>
        <li>Global : Broken link submitted</li>
        <li>Global : Link submitted</li>
        <li>Global : New link</li>
        <li>Category : Link Submitted</li>
        <li>Category : New Link</li>
        <li>Category : Bookmark</li>
        <li>Link : Comment added</li>
        <li>Link : Comment submitted</li>
        <li>Link : Bookmark</li>
    </ul>
    <br/>Default: All selected<br/><br/> <br/>Click the Go! button to save the preferences in the database.
');
// Update
define('_MI_WFL_UPDATE_DESC', '');
define('_MI_WFL_HELP_UPDATE_DESCRIPTION', '
    <h4>Upgrade from WF-Links prior to version 1.05 RC5</h4><br><br><ol>
    <li>Make a backup of the WF-Links database tables and a backup from the folder ../modules/wflinks on your server.</li>
    <li>Uninstall WF-Links.</li>
    <li>Overwrite the files on your server with the new ones.</li>
    <li>Install WF-Links.</li>
    <li>Restore the database table from point 1.</li>
    <li><strong>Update</strong> WF-Links from the Modules Administration.</li>
    </ol>
');
// Support
define('_MI_WFL_SUPPORT_DESC', '');
define('_MI_WFL_HELP_SUPPORT_DESCRIPTION', '
    <span style="font-family: Arial, sans-serif; font-size: larger;  text-decoration: underline;">For support visit our Support Forums at:</span><br><br>
    <p><span style="font-family: Arial, sans-serif; font-size: 172%; "><a href="https://xoops.org/modules/newbb/viewforum.php?forum=28/" target="_blank">https://xoops.org/modules/newbb/</a><br></span>
    </p>
');

define('_MI_WFL_MVOTEDATA_DESC', '');
