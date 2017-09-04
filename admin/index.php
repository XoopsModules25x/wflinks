<?php

require_once __DIR__ . '/admin_header.php';
//require_once __DIR__ . '/admin_header.php';
xoops_cp_header();

$adminObject = \Xmf\Module\Admin::getInstance();

global $xoopsDB;

$start     = WfLinksUtility::cleanRequestVars($_REQUEST, 'start', 0);
$start1    = WfLinksUtility::cleanRequestVars($_REQUEST, 'start1', 0);
$start2    = WfLinksUtility::cleanRequestVars($_REQUEST, 'start2', 0);
$start3    = WfLinksUtility::cleanRequestVars($_REQUEST, 'start3', 0);
$start4    = WfLinksUtility::cleanRequestVars($_REQUEST, 'start4', 0);
$totalcats = WfLinksUtility::getTotalCategory();

$result = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wflinks_broken'));
list($totalbrokenlinks) = $xoopsDB->fetchRow($result);
$result2 = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wflinks_mod'));
list($totalmodrequests) = $xoopsDB->fetchRow($result2);
$result3 = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE published = 0');
list($totalnewlinks) = $xoopsDB->fetchRow($result3);
$result4 = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE published > 0');
list($totallinks) = $xoopsDB->fetchRow($result4);

//$xxx='<a href="brokenvideo.php">' . _AM_XTUBE_SBROKENSUBMIT . '</a><b>';

$adminObject->addInfoBox(_AM_WFL_MINDEX_LINKSUMMARY);
if ($totalcats > 0) {
    $adminObject->addInfoBoxLine(sprintf('<infolabel>' . '<a href="category.php">' . _AM_WFL_SCATEGORY . '</a><b>' . '</infolabel>', $totalcats), '', 'Green');
} else {
    $adminObject->addInfoBoxLine(sprintf('<infolabel>' . _AM_WFL_SCATEGORY . '</infolabel>', $totalcats), '', 'Green');
}

if ($totallinks > 0) {
    $adminObject->addInfoBoxLine(sprintf('<infolabel>' . '<a href="main.php">' . _AM_WFL_SFILES . '</a><b>' . '</infolabel>', $totallinks), '', 'Green');
} else {
    $adminObject->addInfoBoxLine(sprintf('<infolabel>' . _AM_WFL_SFILES . '</infolabel>', $totallinks), '', 'Green');
}

if ($totalnewlinks > 0) {
    $adminObject->addInfoBoxLine(sprintf('<infolabel>' . '<a href="newlinks.php">' . _AM_WFL_SNEWFILESVAL . '</a><b>' . '</infolabel>', $totalnewlinks), '', 'Red');
} else {
    $adminObject->addInfoBoxLine(sprintf('<infolabel>' . _AM_WFL_SNEWFILESVAL . '</infolabel>', $totalnewlinks), '', 'Red');
}
if ($totalmodrequests > 0) {
    $adminObject->addInfoBoxLine(sprintf('<infolabel>' . '<a href="modifications.php">' . _AM_WFL_SMODREQUEST . '</a><b>' . '</infolabel>', $totalmodrequests), '', 'Red');
} else {
    $adminObject->addInfoBoxLine(sprintf('<infolabel>' . _AM_WFL_SMODREQUEST . '</infolabel>', $totalmodrequests), '', 'Red');
}

if ($totalbrokenlinks > 0) {
    $adminObject->addInfoBoxLine(sprintf('<infolabel>' . '<a href="brokenlink.php">' . _AM_WFL_SBROKENSUBMIT . '</a><b>' . '</infolabel><infotext>', $totalbrokenlinks . '</infotext>'), '', 'Red');
} else {
    $adminObject->addInfoBoxLine(sprintf('<infolabel>' . _AM_WFL_SBROKENSUBMIT . '</infolabel><infotext>', $totalbrokenlinks . '</infotext>'), '', 'Red');
}


//$adminObject->addInfoBox(_AM_WFL_CHECKINGFOLDER);
if (is_dir('../../../uploads/wflinks/category')) {
    $adminObject->addConfigBoxLine('<img src="../../../Frameworks/moduleclasses/icons/16/1.png"><span class="Green">' . _AM_WFL_CHECKINGFOLDER_FOLDER_CAT_YES . '</span>', '', '');
} else {
    $adminObject->addConfigBoxLine('<label><img src="../../../Frameworks/moduleclasses/icons/16/0.png"><span class="Red">' . _AM_WFL_CHECKINGFOLDER_FOLDER_CAT_NO . '</span></label>', '', '');
}
if (is_dir('../../../uploads/wflinks/screenshots')) {
    $adminObject->addConfigBoxLine('<img src="../../../Frameworks/moduleclasses/icons/16/1.png"><span class="Green">' . _AM_WFL_CHECKINGFOLDER_FOLDER_SCREEN_YES . '</span>', '', '');
} else {
    $adminObject->addConfigBoxLine('<label><img src="../../../Frameworks/moduleclasses/icons/16/0.png"><span class="Red">' . _AM_WFL_CHECKINGFOLDER_FOLDER_SCREEN_NO . '</span></label>', '', '');
}
if (is_dir('../../../uploads/flags')) {
    $adminObject->addConfigBoxLine('<img src="../../../Frameworks/moduleclasses/icons/16/1.png"><span class="Green">' . _AM_WFL_CHECKINGFOLDER_FOLDER_FLAGS_YES . '</span>', '', '');
} else {
    $adminObject->addConfigBoxLine('<label><img src="../../../Frameworks/moduleclasses/icons/16/0.png"><span class="Red">' . _AM_WFL_CHECKINGFOLDER_FOLDER_FLAGS_NO . '</span></label>', '', '');
}


/** @var WflinksUtility $utilityClass */
$utilityClass = ucfirst($moduleDirName) . 'Utility';
if (!class_exists($utilityClass)) {
    xoops_load('utility', $moduleDirName);
}

$configurator = include __DIR__ . '/../include/config.php';
foreach (array_keys($configurator->uploadFolders) as $i) {
    $utilityClass::createFolder($configurator->uploadFolders[$i]);
}


$adminObject->displayNavigation(basename(__FILE__));
$adminObject->displayIndex();

//$moduleDirName = basename(dirname(__DIR__));


echo $utilityClass::getServerStats();

require_once __DIR__ . '/admin_footer.php';
//xoops_cp_footer();
