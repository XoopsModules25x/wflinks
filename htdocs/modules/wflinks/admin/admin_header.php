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
 * @copyright      The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license        http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 * @package        WF-Links
 * @since          1.0.5
 * @author         XOOPS Development Team
 * @version        $Id $
 **/

$mydirname = basename( dirname( dirname( __FILE__ ) ) );
$path = dirname(dirname(dirname(dirname(__FILE__))));
include_once $path . '/mainfile.php';
include_once $path . '/include/cp_functions.php';
require_once $path . '/include/cp_header.php';

global $xoopsModule;

$thisModuleDir  = $GLOBALS['xoopsModule']->getVar('dirname');
$thisModulePath = dirname(dirname(__FILE__));

//if functions.php file exist
//require_once dirname(dirname(__FILE__)) . '/include/functions.php';
//require_once $thisModulePath . '/include/functions.php';

// Load language files
xoops_loadLanguage('admin', $thisModuleDir);
xoops_loadLanguage('modinfo', $thisModuleDir);
xoops_loadLanguage('main', $thisModuleDir);

$pathIcon16      = '../' . $xoopsModule->getInfo('icons16');
$pathIcon32      = '../' . $xoopsModule->getInfo('icons32');
$pathModuleAdmin = $xoopsModule->getInfo('dirmoduleadmin');

include_once $GLOBALS['xoops']->path($pathModuleAdmin.'/moduleadmin.php');

include XOOPS_ROOT_PATH . '/modules/' . $mydirname . '/include/config.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $mydirname . '/include/functions.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $mydirname . '/class/wfl_lists.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $mydirname . '/class/myts_extended.php';

include_once XOOPS_ROOT_PATH . '/class/xoopstree.php';
include_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

$wfmyts = new wflTextSanitizer(); // MyTextSanitizer object

$imagearray = array(
            'editimg' => "<img src='$pathIcon16/edit.png' alt='" . _AM_WFL_ICO_EDIT . "' align='middle'>",
            'deleteimg' => "<img src='$pathIcon16/delete.png' alt='" . _AM_WFL_ICO_DELETE . "' align='middle'>",
        'altcat' => "<img src='$pathIcon16/folder_add.png' alt='" . _AM_WFL_ALTCAT_CREATEF . "' align='middle'>",
            'online' => "<img src='$pathIcon16/1.png' alt='" . _AM_WFL_ICO_ONLINE . "' align='middle'>",
            'offline' => "<img src='$pathIcon16/0.png' alt='" . _AM_WFL_ICO_OFFLINE . "' align='middle'>",
            'expired' => "<img src='../assets/images/icon/clock_red.png' alt='" . _AM_WFL_ICO_EXPIRE . "' align='middle'>",
            'approved' => "<img src='$pathIcon16/1.png' alt=''" . _AM_WFL_ICO_APPROVED . "' align='middle'>",
            'notapproved' => "<img src='$pathIcon16/0.png' alt='" . _AM_WFL_ICO_NOTAPPROVED . "' align='middle'>",
            'relatedfaq' => "<img src='../assets/images/icon/link.gif' alt='" . _AM_WFL_ICO_LINK . "' align='absmiddle'>",
            'relatedurl' => "<img src='../assets/images/icon/urllink.gif' alt='" . _AM_WFL_ICO_URL . "' align='middle'>",
            'addfaq' => "<img src='../assets/images/icon/add.gif' alt='" . _AM_WFL_ICO_ADD . "' align='middle'>",
            'approve' => "<img src='$pathIcon16/1.png' alt='" . _AM_WFL_ICO_APPROVE . "' align='middle'>",
            'statsimg' => "<img src='../assets/images/icon/stats.gif' alt='" . _AM_WFL_ICO_STATS . "' align='middle'>",
            'ignore' => "<img src='$pathIcon16/0.png' alt='" . _AM_WFL_ICO_IGNORE . "' align='middle'>",
            'ack_yes' => "<img src='$pathIcon16/1.png' alt='" . _AM_WFL_ICO_ACK . "' align='middle'>",
            'ack_no' => "<img src='$pathIcon16/0.png' alt='" . _AM_WFL_ICO_REPORT . "' align='middle'>",
            'con_yes' => "<img src='$pathIcon16/1.png' alt='" . _AM_WFL_ICO_CONFIRM . "' align='middle'>",
            'con_no' => "<img src='$pathIcon16/0.png' alt='" . _AM_WFL_ICO_CONBROKEN . "' align='middle'>",
            'view' => "<img src='$pathIcon16/search.png' alt='" . _AM_WFL_ICO_VIEW . "' align='middle'>"
    );
