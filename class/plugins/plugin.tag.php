<?php
/**
 * Tag info
 *
 * @copyright      XOOPS Project (https://xoops.org)
 * @license        http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author         Taiwen Jiang (phppp or D.J.) <php_pp@hotmail.com>
 * @since          1.00
 * @package        module::tag
 */

// defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * Get item fields:
 * title
 * content
 * time
 * link
 * uid
 * uname
 * tags
 *
 * @var array $items associative array of items: [modid][catid][itemid]
 *
 * @return boolean
 *
 */

function wflinks_tag_iteminfo(&$items)
{
    $moduleDirName = basename(dirname(__DIR__));

    if (empty($items) || !is_array($items)) {
        return false;
    }

    global $xoopsDB;
    $myts = \MyTextSanitizer::getInstance();

    $items_id = [];

    foreach (array_keys($items) as $cat_id) {
        // Some handling here to build the link upon catid
        // If catid is not used, just skip it
        foreach (array_keys($items[$cat_id]) as $item_id) {
            // In article, the item_id is "art_id"
            $items_id[] = (int)$item_id;
        }
    }

    foreach (array_keys($items) as $cat_id) {
        foreach (array_keys($items[$cat_id]) as $item_id) {
            $sql                      = 'SELECT l.lid, l.cid AS lcid, l.title AS ltitle, l.date, l.cid, l.submitter, l.description, l.item_tag, c.title AS ctitle FROM '
                                        . $xoopsDB->prefix('wflinks_links')
                                        . ' l, '
                                        . $xoopsDB->prefix('wflinks_cat')
                                        . ' c WHERE l.lid='
                                        . $item_id
                                        . ' AND l.cid=c.cid AND l.status > 0 ORDER BY l.date DESC';
            $result                   = $xoopsDB->query($sql);
            $row                      = $xoopsDB->fetchArray($result);
            $lcid                     = $row['lcid'];
            $items[$cat_id][$item_id] = [
                'title'   => '<img src="' . XOOPS_URL . '/modules/' . $moduleDirName . '/assets/images/icon/wflinks.gif" alt="">&nbsp;' . $row['ltitle'],
                'uid'     => $row['submitter'],
                'link'    => "singlelink.php?cid=$lcid&amp;lid=$item_id",
                'time'    => $row['date'],
                'tags'    => $row['item_tag'],
                'content' => $row['description']
            ];
        }
    }

    return null;
}

/** Remove orphan tag-item links *
 * @param $mid
 */
function wflinks_tag_synchronization($mid)
{
    // Optional
}
