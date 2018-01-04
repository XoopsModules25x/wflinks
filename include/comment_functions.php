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

// comment callback functions

/**
 * @param $linkload_id
 * @param $total_num
 */
function wflinks_com_update($linkload_id, $total_num)
{
    $db  = \XoopsDatabaseFactory::getDatabaseConnection();
    $sql = 'UPDATE ' . $db->prefix('wflinks_links') . ' SET comments=' . $total_num . ' WHERE lid=' . $linkload_id;
    $db->query($sql);
}

/**
 * @param $comment
 */
function wflinks_com_approve(&$comment)
{
    // notification mail here
}
