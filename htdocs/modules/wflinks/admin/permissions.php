<?php
/**
 * $Id: permissions.php,v 1.5 2005/02/06 18:29:52 phppp Exp $
 * Module: WF-Downloads
 * Version: v2.0.5a
 * Release Date: 26 july 2004
 * Author: WF-Sections
 * Licence: GNU
 */

include 'admin_header.php';
include_once '../../../include/cp_header.php';
include_once XOOPS_ROOT_PATH . '/class/xoopstopic.php';
include_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
include_once XOOPS_ROOT_PATH . '/class/xoopsform/grouppermform.php';

xoops_cp_header();
//wfl_adminmenu( _AM_WFL_PERM_MANAGEMENT );

$permtoset= isset($_POST['permtoset']) ? intval($_POST['permtoset']) : 1;
$selected=array('','','','','');
$selected[$permtoset-1]=' selected';
echo "<form method='post' name='fselperm' action='permissions.php'><table border=0>
<tr><td><select name='permtoset' onChange='javascript: document.fselperm.submit()'>
<option value='1'".$selected[0].">"._AM_WFL_PERM_CPERMISSIONS."</option>
<option value='2'".$selected[1].">"._AM_WFL_PERM_SPERMISSIONS."</option>
<option value='3'".$selected[2].">"._AM_WFL_PERM_APERMISSIONS."</option>
<option value='4'".$selected[3].">"._AM_WFL_PERM_AUTOPERMISSIONS."</option>
<option value='5'".$selected[4].">"._AM_WFL_PERM_RATEPERMISSIONS."</option>
</select></td></tr><tr><td><input type='submit' name='go'/></td></tr></table></form>";
$module_id = $xoopsModule->getVar('mid');

switch ($permtoset) {
    case 1:
        $title_of_form = _AM_WFL_PERM_CPERMISSIONS;
        $perm_name = 'WFLinkCatPerm';
        $perm_desc = _AM_WFL_PERM_CSELECTPERMISSIONS;
        break;
    case 2:
        $title_of_form = _AM_WFL_PERM_SPERMISSIONS;
        $perm_name = 'WFLinkSubPerm';
        $perm_desc = _AM_WFL_PERM_SPERMISSIONS_TEXT;
        break;
    case 3:
        $title_of_form = _AM_WFL_PERM_APERMISSIONS;
        $perm_name = 'WFLinkAppPerm';
        $perm_desc = _AM_WFL_PERM_APERMISSIONS_TEXT;
        break;
    case 4:
        $title_of_form = _AM_WFL_PERM_AUTOPERMISSIONS;
        $perm_name = 'WFLinkAutoApp';
        $perm_desc = _AM_WFL_PERM_AUTOPERMISSIONS_TEXT;
        break;
    case 5:
        $title_of_form = _AM_WFL_PERM_RATEPERMISSIONS;
        $perm_name = 'WFLinkRatePerms';
        $perm_desc = _AM_WFL_PERM_RATEPERMISSIONS_TEXT;
        break;
}

$permform = new XoopsGroupPermForm($title_of_form, $module_id, $perm_name, $perm_desc, 'admin/permissions.php');
$result = $xoopsDB -> query( "SELECT cid, pid, title FROM " . $xoopsDB -> prefix( 'wflinks_cat' ) . " ORDER BY title ASC" );
if ( $xoopsDB -> getRowsNum( $result ) ) {
    while ( $perm_row = $xoopsDB -> fetcharray( $result ) ) {
        $permform -> addItem( $perm_row['cid'], "&nbsp;" . $perm_row['title'], $perm_row['pid'] );
    }
    echo $permform -> render();
    echo "";
} else {
    echo "<div><b>" . _AM_WFL_PERM_CNOCATEGORY . "</b></div>";
}
unset ( $permform );

echo _AM_WFL_PERM_PERMSNOTE . "<br />";

include_once 'admin_footer.php';
