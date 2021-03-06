<?php

use Xmf\Module\Admin;
use XoopsModules\Wflinks\{Common,
    Helper,
    Utility
};

/** @var Admin $adminObject */
/** @var Helper $helper */
/** @var Utility $utility */

require_once __DIR__ . '/admin_header.php';
// Display Admin header
xoops_cp_header();

$adminObject = Admin::getInstance();

global $xoopsDB;

$start     = Utility::cleanRequestVars($_REQUEST, 'start', 0);
$start1    = Utility::cleanRequestVars($_REQUEST, 'start1', 0);
$start2    = Utility::cleanRequestVars($_REQUEST, 'start2', 0);
$start3    = Utility::cleanRequestVars($_REQUEST, 'start3', 0);
$start4    = Utility::cleanRequestVars($_REQUEST, 'start4', 0);
$totalcats = Utility::getTotalCategory();

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

//check or upload folders
$configurator = new Common\Configurator();
foreach (array_keys($configurator->uploadFolders) as $i) {
    $utility::createFolder($configurator->uploadFolders[$i]);
    $adminObject->addConfigBoxLine($configurator->uploadFolders[$i], 'folder');
}

$adminObject->displayNavigation(basename(__FILE__));
//------------- Test Data ----------------------------

if ($helper->getConfig('displaySampleButton')) {
    $yamlFile            = dirname(__DIR__) . '/config/admin.yml';
    $config              = loadAdminConfig($yamlFile);
    $displaySampleButton = $config['displaySampleButton'];

    if (1 == $displaySampleButton) {
        xoops_loadLanguage('admin/modulesadmin', 'system');
        require_once dirname(__DIR__) . '/testdata/index.php';

        $adminObject->addItemButton(constant('CO_' . $moduleDirNameUpper  . '_' . 'ADD_SAMPLEDATA'), '__DIR__ . /../../testdata/index.php?op=load', 'add');
        $adminObject->addItemButton(constant('CO_' . $moduleDirNameUpper . '_' . 'SAVE_SAMPLEDATA'), '__DIR__ . /../../testdata/index.php?op=save', 'add');
        //    $adminObject->addItemButton(constant('CO_' . $moduleDirNameUpper . '_' . 'EXPORT_SCHEMA'), '__DIR__ . /../../testdata/index.php?op=exportschema', 'add');
        $adminObject->addItemButton(constant('CO_' . $moduleDirNameUpper . '_' . 'HIDE_SAMPLEDATA_BUTTONS'), '?op=hide_buttons', 'delete');
    } else {
        $adminObject->addItemButton(constant('CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLEDATA_BUTTONS'), '?op=show_buttons', 'add');
        $displaySampleButton = $config['displaySampleButton'];
    }
    $adminObject->displayButton('left', '');
}

//------------- End Test Data ----------------------------

$adminObject->displayIndex();

/**
 * @param $yamlFile
 * @return array|bool
 */
function loadAdminConfig($yamlFile)
{
    $config = \Xmf\Yaml::readWrapped($yamlFile); // work with phpmyadmin YAML dumps
    return $config;
}

/**
 * @param $yamlFile
 */
function hideButtons($yamlFile)
{
    $app['displaySampleButton'] = 0;
    \Xmf\Yaml::save($app, $yamlFile);
    redirect_header('index.php', 0, '');
}

/**
 * @param $yamlFile
 */
function showButtons($yamlFile)
{
    $app['displaySampleButton'] = 1;
    \Xmf\Yaml::save($app, $yamlFile);
    redirect_header('index.php', 0, '');
}

$op = \Xmf\Request::getString('op', 0, 'GET');

switch ($op) {
    case 'hide_buttons':
        hideButtons($yamlFile);
        break;
    case 'show_buttons':
        showButtons($yamlFile);
        break;
}

echo $utility::getServerStats();

require __DIR__ . '/admin_footer.php';
