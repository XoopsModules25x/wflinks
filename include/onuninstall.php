<?php
/**
 * uninstall.php - cleanup on module uninstall
 *
 * @author          XOOPS Module Development Team
 * @copyright       {@link https://xoops.org 2001-2016 XOOPS Project}
 * @license         {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @link            https://xoops.org XOOPS
 */

use Xmf\Request;
use XoopsModules\Wflinks;

/**
 * Prepares system prior to attempting to uninstall module
 * @param XoopsModule $module {@link XoopsModule}
 *
 * @return bool true if ready to uninstall, false if not
 */

function xoops_module_pre_uninstall_wflinks(\XoopsModule $module)
{
    // Do some synchronization
    return true;
}

/**
 *
 * Performs tasks required during uninstallation of the module
 * @param XoopsModule $module {@link XoopsModule}
 *
 * @return bool true if uninstallation successful, false if not
 */
function xoops_module_uninstall_wflinks(\XoopsModule $module)
{
//    return true;

    $moduleDirName = basename(dirname(__DIR__));
    $helper = Wflinks\Helper::getInstance();

    /** @var Wflinks\Utility $utilityClass */
    $utilityClass     = ucfirst($moduleDirName) . 'Utility';
    if (!class_exists($utilityClass)) {
        xoops_load('utility', $moduleDirName);
    }

    $success = true;
    xoops_loadLanguage('admin', $moduleDirName);


    //------------------------------------------------------------------
    // Remove uploads folder (and all subfolders) if they exist
    //------------------------------------------------------------------

//    $ok     = Request::getInt('ok', 0, 'POST');
//    if ($ok == 1) {
    $old_directories = [$GLOBALS['xoops']->path("uploads/{$moduleDirName}")];
    foreach ($old_directories as $old_dir) {
        $dirInfo = new \SplFileInfo($old_dir);
        if ($dirInfo->isDir()) {
            // The directory exists so delete it
            if (false === $utilityClass::rrmdir($old_dir)) {
                $module->setErrors(sprintf(_AM_WFL_ERROR_BAD_DEL_PATH, $old_dir));
                $success = false;
            }
        }
        unset($dirInfo);
    }
//    } else {
//        xoops_confirm(['op' => 'del', '', 'ok' => 1, ''], $_SERVER['REQUEST_URI'], _AM_WFL_FOLDERS_DELETE, _DELETE, true);
//    }

    /*
    //------------ START ----------------
    //------------------------------------------------------------------
    // Remove xsitemap.xml from XOOPS root folder if it exists
    //------------------------------------------------------------------
    $xmlfile = $GLOBALS['xoops']->path('xsitemap.xml');
    if (is_file($xmlfile)) {
        if (false === ($delOk = unlink($xmlfile))) {
            $module->setErrors(sprintf(_AM_XXXXX_ERROR_BAD_REMOVE, $xmlfile));
        }
    }
//    return $success && $delOk; // use this if you're using this routine
*/

    return $success;
    //------------ END  ----------------
}
