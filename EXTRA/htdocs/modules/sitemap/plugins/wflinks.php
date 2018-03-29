<?php
/**
 * -----------------------------------------------------------------------------
 * About this sitemap plug-in : wflinks for sitemap
 *
 * Name                    :    wflinks.php
 * Author                :    DuGris (http://www.dugris.info)
 *
 * Necessary modules    :
 *                                sitemap 1.30 (http://xoops.peak.ne.jp/)
 *                                wflinks 3.30 (http://www.wf-projects.com - http://members.lycos.nl/mcdonaldsstore/)
 *
 * -----------------------------------------------------------------------------
 **/

function b_sitemap_wflinks()
{
    global $sitemap_configs;
    global $xoopsDB, $xoopsUser, $xoopsModule;
    $myts = \MyTextSanitizer::getInstance();

    require_once XOOPS_ROOT_PATH . '/class/xoopstree.php';
    $mytree = new \XoopsTree($xoopsDB->prefix('wflinks_cat'), 'cid', 'pid');

    $MyModule     = xoops_getHandler('module');
    $wflinkModule = $MyModule->getByDirname('wflinks');

    $MyConfig     = xoops_getHandler('config');
    $wflinkConfig = $MyConfig->getConfigsByCat(0, $wflinkModule->getVar('mid'));

    $groups       = is_object($xoopsUser) ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;
    $gpermHandler = xoops_getHandler('groupperm');

    $sitemap = [];
    $sql     = 'SELECT * FROM ' . $xoopsDB->prefix('wflinks_cat') . ' WHERE pid=0 ORDER BY weight';
    $result  = $xoopsDB->queryF($sql);
    while (false !== ($myrow = $xoopsDB->fetchArray($result))) {
        if ($gpermHandler->checkRight('WFLinkCatPerm', $myrow['cid'], $groups, $wflinkModule->getVar('mid'))) {
            $i                              = (int)$myrow['cid'];
            $sitemap['parent'][$i]['id']    = (int)$myrow['cid'];
            $sitemap['parent'][$i]['title'] = $myts->htmlSpecialChars($myrow['title']);
            $sitemap['parent'][$i]['url']   = 'viewcat.php?cid=' . (int)$myrow['cid'];
            $arr = [];
            if ($sitemap_configs['show_subcategoris']) {
                $arr = $mytree->getFirstChild($myrow['cid'], 'title');
                foreach ($arr as $key => $ele) {
                    if ($gpermHandler->checkRight('WFLinkCatPerm', $ele['cid'], $groups, $wflinkModule->getVar('mid'))) {
                        $j                                           = $key;
                        $sitemap['parent'][$i]['child'][$j]['id']    = (int)$ele['cid'];
                        $sitemap['parent'][$i]['child'][$j]['title'] = $myts->htmlSpecialChars($ele['title']);
                        $sitemap['parent'][$i]['child'][$j]['image'] = 2;
                        $sitemap['parent'][$i]['child'][$j]['url']   = 'viewcat.php?cid=' . (int)$ele['cid'];
                    }
                }
            }
        }
    }

    return $sitemap;
}
