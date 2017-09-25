<?php
/**
 *
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

require_once __DIR__ . '/header.php';

define('IS_UPDATE_FILE', true);

global $xoopsDB, $xoopsConfig, $xoopsUser, $xoopsModule;
if (!is_object($xoopsUser) || !is_object($xoopsModule) || !$xoopsUser->isAdmin($xoopsModule->getVar('mid'))) {
    exit('Access Denied');
}
include XOOPS_ROOT_PATH . '/header.php';

function install_header()
{
    ?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
    <html>
    <head>
        <title>WF-Links Upgrade</title>
        <meta http-equiv="Content-Type" content="text/html; charset=">
    </head>
    <body>
    <br><div style="text-align:center;"><img src="./assets/images/logo-en.gif" alt=""><h4>WF-Links Update</h4>
    <?php
}

function install_footer()
{
    ?>
    <img src="assets/images/wfl_slogo.gif" alt="WF-Projects" border="0"></div>
    </body>
    </html>
    <?php
}

// echo "Welcome to the WF-Links update script";
foreach ($_POST as $k => $v) {
    ${$k} = $v;
}

foreach ($_GET as $k => $v) {
    ${$k} = $v;
}

if (!isset($action) || '' === $action) {
    $action = 'message';
}

if ('message' === $action) {
    install_header();

    $moduleHandler = xoops_getHandler('module');
    $mylinks       = $moduleHandler->getByDirname('mylinks');
    if ($mylinks) {
        $mylinks_version = round($mylinks->getVar('version') / 100, 2);
    }

    $moduleHandler = xoops_getHandler('module');
    $weblinks      = $moduleHandler->getByDirname('weblinks');
    if ($weblinks) {
        $weblinks_version = round($weblinks->getVar('version') / 100, 2);
    }

    $act_wflinks = $moduleHandler->getByDirname('wflinks');
    if ($act_wflinks) {
        $act_wflinks_version = $act_wflinks->getInfo('version');
    }

    echo $act_wflinks_version;

    /**
     * Set version number
     */

    if (1.0 == $act_wflinks_version && !$mylinks_version && !$weblinks_version) {
        echo '<h4>Latest version of WF-Links installed. No Update Required</h4>';
        install_footer();
        include XOOPS_ROOT_PATH . '/footer.php';
        exit();
    }

    $link_num = 0;
    if (isset($mylinks_version)) {
        $link_num = $mylinks_version;
    }

    if (isset($weblinks_version)) {
        $link_num = $weblinks_version;
    }

    if (isset($wflinks_version) && 1.0 != $act_wflinks_version) {
        $link_num = $wflinks_version;
    }

    echo '<div><b>Welcome to the WF-Links Update script</b></div><br>';
    echo '<div>This script will upgrade My-links or weblinks.</div><br><br>';

    if (0 != $link_num) {
        echo "<div><span style='color:#ff0000;font-weight:bold;'>WARNING: If upgrading from My links or weblinks. The My links Module or weblinks Module will **NOT** function after the upgrade and should be unistalled. </span></div><br>";
        echo '<div><b>Before upgrading WF-Links, make sure that you have:</b></div><br>';
        echo "<div><span style='color:#ff0000; '>1. <b>Important:</b> First, create a back-up from your database before proceeding further. </span></div>";
        echo '<div>2. Upload all the contents of the WF-Links package to your server.</div><br>';
        echo '<div>3. After the upgrade you must update WF-Links in System Admin -> Modules.</div><br>';

        echo '<div><b>Press the button below to ';
        switch ($link_num) {
            case '1.0.1':
            case '1.10':
            case '1.1':
                echo "update My links $link_num</b></div>";
                break;
            case '0.93':
                echo "update weblinks $link_num</b></div>";
                break;
        }

        echo "<form action='" . $HTTP_SERVER_VARS['PHP_SELF'] . "' method='post'>";
        echo $GLOBALS['xoopsSecurity']->getTokenHTML();
        echo "<input type='submit' value='Start Upgrade'>
            <input type='hidden' value='upgrade' name='action'>
            <input type='hidden' name='link_num' value=$link_num>
            </form>";
    } else {
        echo '<h4>No module installed to update</h4>';
    }

    install_footer();
    include XOOPS_ROOT_PATH . '/footer.php';
    exit();
}
// THIS IS THE UPDATE DATABASE FROM HERE!!!!!!!!! DO NOT TOUCH THIS!!!!!!!!
if ('upgrade' === $action) {
    install_header();

    $num = $_POST['link_num'];
    switch ($num) {
        case '1.0.1':
        case '1.10':
        case '1.1':
            echo "Updating Mylinks $num";
            require_once __DIR__ . '/update/mylinks_update.php';
            break;
        case '0.93':
            echo "Updating weblinks $num";
            require_once __DIR__ . '/update/weblinks_update.php';
            break;
        case '0':
        default:
            echo "Version: $num not supported yet. Please contact the developers of this module";
            break;
    }
    echo 'To complete the upgrade, You must update WF-Links in Xoops System Admin -> Modules';
    echo 'Please enjoy using WF-Links, the WF-Project Team';
    include XOOPS_ROOT_PATH . '/footer.php';
}
