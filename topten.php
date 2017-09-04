<?php
/**
 *
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

require_once __DIR__ . '/header.php';

$GLOBALS['xoopsOption']['template_main'] = 'wflinks_topten.tpl';
include XOOPS_ROOT_PATH . '/header.php';

$mytree = new WflinksXoopsTree($xoopsDB->prefix('wflinks_cat'), 'cid', 'pid');

$action_array = array('hit' => 0, 'rate' => 1);
$list_array   = array('hits', 'rating');
$lang_array   = array(_MD_WFL_HITS, _MD_WFL_RATING);
$rankings     = array();

$sort     = (isset($_GET['list']) && in_array($_GET['list'], $action_array)) ? $_GET['list'] : 'rate';
$sort_arr = $action_array[$sort];
$sortDB   = $list_array[$sort_arr];

$catarray['imageheader'] = WfLinksUtility::getImageHeader();
$catarray['letters']     = WfLinksUtility::getLetters();
$catarray['toolbar']     = WfLinksUtility::getToolbar();
$xoopsTpl->assign('catarray', $catarray);

$arr    = array();
$result = $xoopsDB->query('SELECT cid, title, pid FROM ' . $xoopsDB->prefix('wflinks_cat') . ' WHERE pid=0 ORDER BY ' . $xoopsModuleConfig['sortcats']);

$e = 0;
while (list($cid, $ctitle) = $xoopsDB->fetchRow($result)) {
    if (true === WfLinksUtility::checkGroups($cid)) {
        $query = 'SELECT lid, cid, title, hits, rating, votes FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE published > 0 AND published <= ' . time() . ' AND (expired = 0 OR expired > ' . time() . ') AND offline = 0 AND (cid=' . (int)$cid;
        $arr   = $mytree->getAllChildId($cid);
        for ($i = 0, $iMax = count($arr); $i < $iMax; ++$i) {
            $query .= ' or cid=' . $arr[$i] . '';
        }
        $query     .= ') order by ' . $sortDB . ' DESC';
        $result2   = $xoopsDB->query($query, 10, 0);
        $filecount = $xoopsDB->getRowsNum($result2);

        if ($filecount > 0) {
            $rankings[$e]['title'] = $wfmyts->htmlSpecialCharsStrip($ctitle);
            $rank                  = 1;
            while (list($did, $dcid, $dtitle, $hits, $rating, $votes) = $xoopsDB->fetchRow($result2)) {
                $catpath                = basename($mytree->getPathFromId($dcid, 'title'));
                $dtitle                 = $wfmyts->htmlSpecialCharsStrip($dtitle);
                $rankings[$e]['file'][] = array(
                    'id'       => $did,
                    'cid'      => $dcid,
                    'rank'     => $rank,
                    'title'    => $dtitle,
                    'category' => $catpath,
                    'hits'     => $hits,
                    'rating'   => number_format($rating, 2),
                    'votes'    => $votes
                );
                ++$rank;
            }
            ++$e;
        }
    }
}
$xoopsTpl->assign('back', '<a href="javascript:history.go(-1)"><img src="' . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/assets/images/icon/back.png"></a>');
$xoopsTpl->assign('lang_sortby', $lang_array[$sort_arr]);
$xoopsTpl->assign('rankings', $rankings);
$xoopsTpl->assign('module_dir', $xoopsModule->getVar('dirname'));
include XOOPS_ROOT_PATH . '/footer.php';
