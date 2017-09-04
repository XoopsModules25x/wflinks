<?php

/**
 * @param $options
 *
 * @return array|null
 */
function wflinks_tag_block_cloud_show($options)
{
    $moduleDirName = basename(dirname(__DIR__));
    require_once XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/class/utility.php';
    if (WfLinksUtility::isTagModuleIncluded()) {
        require_once XOOPS_ROOT_PATH . '/modules/tag/blocks/block.php';

        return tag_block_cloud_show($options, $moduleDirName);
    }

    return null;
}

/**
 * @param $options
 *
 * @return null|string
 */
function wflinks_tag_block_cloud_edit($options)
{
    $moduleDirName = basename(dirname(__DIR__));
    require_once XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/class/utility.php';
    if (WfLinksUtility::isTagModuleIncluded()) {
        require_once XOOPS_ROOT_PATH . '/modules/tag/blocks/block.php';

        return tag_block_cloud_edit($options);
    }

    return null;
}

/**
 * @param $options
 *
 * @return array|null
 */
function wflinks_tag_block_top_show($options)
{
    $moduleDirName = basename(dirname(__DIR__));
    require_once XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/class/utility.php';
    if (WfLinksUtility::isTagModuleIncluded()) {
        require_once XOOPS_ROOT_PATH . '/modules/tag/blocks/block.php';

        return tag_block_top_show($options, $moduleDirName);
    }

    return null;
}

/**
 * @param $options
 *
 * @return null|string
 */
function wflinks_tag_block_top_edit($options)
{
    $moduleDirName = basename(dirname(__DIR__));
    require_once XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/class/utility.php';
    if (WfLinksUtility::isTagModuleIncluded()) {
        require_once XOOPS_ROOT_PATH . '/modules/tag/blocks/block.php';

        return tag_block_top_edit($options);
    }

    return null;
}
