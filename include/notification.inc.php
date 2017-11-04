<?php
/*
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

/**
 * @param $category
 * @param $item_id
 *
 * @return bool|null
 */
function wflinks_notify_iteminfo($category, $item_id)
{
    $moduleDirName = basename(dirname(__DIR__));
    global $xoopsModule, $xoopsModuleConfig, $xoopsConfig;

    if (empty($xoopsModule) || $xoopsModule->getVar('dirname') != $moduleDirName) {
        /** @var XoopsModuleHandler $moduleHandler */
        $moduleHandler = xoops_getHandler('module');
        $module        = $moduleHandler->getByDirname($moduleDirName);
        $configHandler = xoops_getHandler('config');
        $config        = $configHandler->getConfigsByCat(0, $module->getVar('mid'));
    } else {
        $module = $xoopsModule;
        $config = $xoopsModuleConfig;
    }

    if ('global' === $category) {
        $item['name'] = '';
        $item['url']  = '';

        return $item;
    }

    global $xoopsDB;
    if ('category' === $category) {
        // Assume we have a valid category id
        $sql = 'SELECT title FROM ' . $xoopsDB->prefix('wflinks_cat') . ' WHERE cid=' . $item_id;
        if (!$result = $xoopsDB->query($sql)) {
            return false;
        }
        $result_array = $xoopsDB->fetchArray($result);
        $item['name'] = $result_array['title'];
        $item['url']  = XOOPS_URL . '/modules/' . $moduleDirName . '/viewcat.php?cid=' . $item_id;

        return $item;
    }

    if ('link' === $category) {
        // Assume we have a valid file id
        $sql = 'SELECT cid,title FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE lid=' . $item_id;
        if (!$result = $xoopsDB->query($sql)) {
            return false;
        }
        $result_array = $xoopsDB->fetchArray($result);
        $item['name'] = $result_array['title'];
        $item['url']  = XOOPS_URL . '/modules/' . $moduleDirName . '/singlelink.php?cid=' . $result_array['cid'] . '&amp;lid=' . $item_id;

        return $item;
    }

    return null;
}
