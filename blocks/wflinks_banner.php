<?php
/**
 *
 * Module: WF-links
 * Developer: McDonald
 * Licence: GNU
 */

// defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * @param $options
 *
 * @return array
 */
function b_wflinks_banner_show($options)
{
    $moduleDirName = basename(__DIR__);
    global $xoopsDB;

    $block         = [];
    $time          = time();
    $moduleHandler = xoops_getHandler('module');
    $wflModule     = $moduleHandler->getByDirname($moduleDirName);

    $result = $xoopsDB->query('SELECT a.cid AS acid, a.title, a.client_id, a.banner_id, b.bid, b.cid, b.imptotal, b.impmade, b.clicks FROM '
                              . $xoopsDB->prefix('wflinks_cat')
                              . ' a, '
                              . $xoopsDB->prefix('banner')
                              . ' b WHERE (b.cid = a.client_id) OR (b.bid = a.banner_id) ORDER BY b.cid, b.bid, a.title ASC');

    while (false !== ($myrow = $xoopsDB->fetchArray($result))) {
        $impmade    = $myrow['impmade'];
        $clicks     = $myrow['clicks'];
        $imptotal   = $myrow['imptotal'];
        $bannerload = [];
        $result2    = $xoopsDB->query('SELECT name FROM ' . $xoopsDB->prefix('bannerclient') . ' WHERE cid=' . (int)$myrow['cid']);
        $myclient   = $xoopsDB->fetchArray($result2);
        if (0 == $impmade) {
            $percent = 0;
        } else {
            $percent = substr(100 * $clicks / $impmade, 0, 5);
        }
        if (0 == $imptotal) {
            $left = 'Unlimited';
        } else {
            $left = (int)($imptotal - $impmade);
        }
        $bannerload['cat']      = (int)$myrow['acid'];
        $bannerload['bid']      = (int)$myrow['bid'];
        $bannerload['cid']      = (int)$myrow['cid'];
        $bannerload['imptotal'] = (int)$myrow['imptotal'];
        $bannerload['impmade']  = (int)$myrow['impmade'];
        $bannerload['impleft']  = $left;
        $bannerload['clicks']   = (int)$myrow['clicks'];
        $bannerload['client']   = $myclient['name'];
        $bannerload['percent']  = $percent;
        $bannerload['cattitle'] = $myrow['title'];
        $bannerload['dirname']  = $wflModule->getVar('dirname');
        $block['banners'][]     = $bannerload;
    }
    unset($_block_check_array);

    return $block;
}

/**
 * @param $options
 *
 * @return string
 */
function b_wflinks_banner_edit($options)
{
    $form = '';

    return $form;
}
