<?php
/**
 * WF-Links
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright      XOOPS Project (https://xoops.org)
 * @license        http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 * @package        WF-Links
 * @since          1.0.5
 * @author         XOOPS Development Team
 **/

use XoopsModules\Wflinks;

require_once __DIR__ . '/../../../include/cp_header.php';

//require_once __DIR__ . '/../../../class/xoopsformloader.php';
require_once __DIR__ . '/../include/common.php';

$moduleDirName = basename(dirname(__DIR__));
/** @var Wflinks\Helper $helper */
$helper = Wflinks\Helper::getInstance();

/** @var Xmf\Module\Admin $adminObject */
$adminObject = \Xmf\Module\Admin::getInstance();

// Load language files
$helper->loadLanguage('admin');
$helper->loadLanguage('modinfo');
$helper->loadLanguage('main');

$myts = \MyTextSanitizer::getInstance();

if (!isset($GLOBALS['xoopsTpl']) || !($GLOBALS['xoopsTpl'] instanceof XoopsTpl)) {
    require_once $GLOBALS['xoops']->path('class/template.php');
    $xoopsTpl = new \XoopsTpl();
}

include XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/include/config.php';
require_once XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/class/wfllists.php';
require_once XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/class/wfltextsanitizer.php';

require_once XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/class/xoopstree.php';
require_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';


$wfmyts = new WflTextSanitizer(); // MyTextSanitizer object

$imageArray = [
    'editimg'     => "<img src='$pathIcon16/edit.png' alt='" . _AM_WFL_ICO_EDIT . "' align='middle'>",
    'deleteimg'   => "<img src='$pathIcon16/delete.png' alt='" . _AM_WFL_ICO_DELETE . "' align='middle'>",
    'altcat'      => "<img src='$pathIcon16/folder_add.png' alt='" . _AM_WFL_ALTCAT_CREATEF . "' align='middle'>",
    'online'      => "<img src='$pathIcon16/1.png' alt='" . _AM_WFL_ICO_ONLINE . "' align='middle'>",
    'offline'     => "<img src='$pathIcon16/0.png' alt='" . _AM_WFL_ICO_OFFLINE . "' align='middle'>",
    'expired'     => "<img src='../assets/images/icon/clock_red.png' alt='" . _AM_WFL_ICO_EXPIRE . "' align='middle'>",
    'approved'    => "<img src='$pathIcon16/1.png' alt=''" . _AM_WFL_ICO_APPROVED . "' align='middle'>",
    'notapproved' => "<img src='$pathIcon16/0.png' alt='" . _AM_WFL_ICO_NOTAPPROVED . "' align='middle'>",
    'relatedfaq'  => "<img src='../assets/images/icon/link.gif' alt='" . _AM_WFL_ICO_LINK . "' align='absmiddle'>",
    'relatedurl'  => "<img src='../assets/images/icon/urllink.gif' alt='" . _AM_WFL_ICO_URL . "' align='middle'>",
    'addfaq'      => "<img src='../assets/images/icon/add.gif' alt='" . _AM_WFL_ICO_ADD . "' align='middle'>",
    'approve'     => "<img src='$pathIcon16/1.png' alt='" . _AM_WFL_ICO_APPROVE . "' align='middle'>",
    'statsimg'    => "<img src='../assets/images/icon/stats.gif' alt='" . _AM_WFL_ICO_STATS . "' align='middle'>",
    'ignore'      => "<img src='$pathIcon16/0.png' alt='" . _AM_WFL_ICO_IGNORE . "' align='middle'>",
    'ack_yes'     => "<img src='$pathIcon16/1.png' alt='" . _AM_WFL_ICO_ACK . "' align='middle'>",
    'ack_no'      => "<img src='$pathIcon16/0.png' alt='" . _AM_WFL_ICO_REPORT . "' align='middle'>",
    'con_yes'     => "<img src='$pathIcon16/1.png' alt='" . _AM_WFL_ICO_CONFIRM . "' align='middle'>",
    'con_no'      => "<img src='$pathIcon16/0.png' alt='" . _AM_WFL_ICO_CONBROKEN . "' align='middle'>",
    'view'        => "<img src='$pathIcon16/search.png' alt='" . _AM_WFL_ICO_VIEW . "' align='middle'>"
];
