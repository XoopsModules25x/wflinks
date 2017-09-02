<?php
/*
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * @copyright      {@link https://xoops.org/ XOOPS Project}
 * @license        {@link http://www.gnu.org/licenses/gpl-2.0.html GNU GPL 2 or later}
 * @package
 * @since
 * @author         XOOPS Development Team
 */

require_once __DIR__ . '/../../mainfile.php';
$com_itemid = isset($_GET['com_itemid']) ? (int)$_GET['com_itemid'] : 0;
if ($com_itemid > 0) {
    // Get file title
    $sql            = 'SELECT title FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE lid=' . $com_itemid;
    $result         = $xoopsDB->query($sql);
    $row            = $xoopsDB->fetchArray($result);
    $com_replytitle = $row['title'];
    include XOOPS_ROOT_PATH . '/include/comment_new.php';
}
