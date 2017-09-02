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
// defined('XOOPS_ROOT_PATH') || exit('Restricted access.');
/**
 * wfs_gethandler()
 *
 * @param         $name
 * @param boolean $optional
 *
 * @return bool
 */
function &wfl_gethandler($name, $optional = false)
{
    global $handlers, $xoopsModule;

    $name = strtolower(trim($name));
    if (!isset($handlers[$name])) {
        if (file_exists($hnd_file = XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/class/class_' . $name . '.php')) {
            require_once $hnd_file;
        }
        $class = 'wfl' . ucfirst($name) . 'Handler';
        if (class_exists($class)) {
            $handlers[$name] = new $class($GLOBALS['xoopsDB']);
        }
    }
    if (!isset($handlers[$name]) && !$optional) {
        trigger_error('<div>Class <b>' . $class . '</b> does not exist.</div>
                        <div>Handler Name: ' . $name, E_USER_ERROR) . '</div>';
    }

    return isset($handlers[$name]) ? $handlers[$name] : false;
}

/**
 * @param int    $cid
 * @param string $permType
 * @param bool   $redirect
 *
 * @return bool
 */
function wfl_checkgroups($cid = 0, $permType = 'WFLinkCatPerm', $redirect = false)
{
    global $xoopsUser, $xoopsModule;

    $groups       = is_object($xoopsUser) ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;
    $gpermHandler = xoops_getHandler('groupperm');
    if (!$gpermHandler->checkRight($permType, $cid, $groups, $xoopsModule->getVar('mid'))) {
        if ($redirect === false) {
            return false;
        } else {
            redirect_header('index.php', 3, _NOPERM);
        }
    }

    return true;
}

/**
 * @param int $lid
 * @return array|bool|false
 */
function wfl_getVoteDetails($lid = 0)
{
    global $xoopsDB;

    $sql = 'SELECT
        COUNT(rating) AS rate,
        MIN(rating) AS min_rate,
        MAX(rating) AS max_rate,
        AVG(rating) AS avg_rate,
        COUNT(ratinguser) AS rating_user,
        MAX(ratinguser) AS max_user,
        MAX(title) AS max_title,
        MIN(title) AS min_title,
        sum(ratinguser = 0) AS null_ratinguser
        FROM ' . $xoopsDB->prefix('wflinks_votedata');
    if ($lid > 0) {
        $sql .= " WHERE lid = $lid";
    }
    if (!$result = $xoopsDB->query($sql)) {
        return false;
    }
    $ret = $xoopsDB->fetchArray($result);

    return $ret;
}

/**
 * @param int $sel_id
 *
 * @return array|bool
 */
function wfl_calcVoteData($sel_id = 0)
{
    $ret                  = array();
    $ret['useravgrating'] = 0;

    $sql = 'SELECT rating FROM ' . $xoopsDB->prefix('wflinks_votedata');
    if ($sel_id != 0) {
        ' WHERE lid = ' . $sel_id;
    }
    if (!$result = $xoopsDB->query($sql)) {
        return false;
    }
    $ret['uservotes'] = $xoopsDB->getRowsNum($result);
    while (list($rating) = $xoopsDB->fetchRow($result)) {
        $ret['useravgrating'] += (int)$rating;
    }
    if ($ret['useravgrating'] > 0) {
        $ret['useravgrating'] = number_format($ret['useravgrating'] / $ret['uservotes'], 2);
    }

    return $ret;
}

/**
 * @param      $array
 * @param null $name
 * @param null $def
 * @param bool $strict
 * @param int  $lengthcheck
 *
 * @return array|int|mixed|null|string
 */
function wfl_cleanRequestVars($array, $name = null, $def = null, $strict = false, $lengthcheck = 15)
{
    // Sanitise $_request for further use.  This method gives more control and security.
    // Method is more for functionality rather than beauty at the moment, will correct later.
    unset($array['usercookie'], $array['PHPSESSID']);

    if (is_array($array) && $name == null) {
        $globals = array();
        foreach (array_keys($array) as $k) {
            $value = strip_tags(trim($array[$k]));
            if (strlen($value >= $lengthcheck)) {
                return null;
            }
            if (ctype_digit($value)) {
                $value = (int)$value;
            } else {
                if ($strict === true) {
                    $value = preg_replace('/\W/', '', trim($value));
                }
                $value = strtolower((string)$value);
            }
            $globals[$k] = $value;
        }

        return $globals;
    }
    if (!isset($array[$name]) || !array_key_exists($name, $array)) {
        return $def;
    } else {
        $value = strip_tags(trim($array[$name]));
    }
    if (ctype_digit($value)) {
        $value = (int)$value;
    } else {
        if ($strict === true) {
            $value = preg_replace('/\W/', '', trim($value));
        }
        $value = strtolower((string)$value);
    }

    return $value;
}

// toolbar()
// @return
/**
 * @param int $cid
 *
 * @return string
 */
function wfl_toolbar($cid = 0)
{
    $toolbar = '[ ';
    if (true === wfl_checkgroups($cid, 'WFLinkSubPerm')) {
        $toolbar .= "<a href='submit.php?cid=" . $cid . "'>" . _MD_WFL_SUBMITLINK . '</a> | ';
    }
    $toolbar .= "<a href='newlist.php?newlinkshowdays=7'>" . _MD_WFL_LATESTLIST . "</a> | <a href='topten.php?list=hit'>" . _MD_WFL_POPULARITY . '</a>  ]';

    return $toolbar;
}

// wfl_serverstats()
// @return
function wfl_serverstats()
{
    echo "
    <fieldset><legend style='font-weight: bold; color: #0A3760;'>" . _AM_WFL_LINK_IMAGEINFO . "</legend>\n
        <div style='padding: 8px;'>\n
        <div>" . _AM_WFL_LINK_SPHPINI . "</div>\n";

    $safemode        = ini_get('safe_mode') ? _AM_WFL_LINK_ON . _AM_WFL_LINK_SAFEMODEPROBLEMS : _AM_WFL_LINK_OFF;
    $registerglobals = (ini_get('register_globals') === '') ? _AM_WFL_LINK_OFF : _AM_WFL_LINK_ON;
    $links           = ini_get('file_uploads') ? _AM_WFL_LINK_ON : _AM_WFL_LINK_OFF;

    $gdlib = function_exists('gd_info') ? _AM_WFL_LINK_GDON : _AM_WFL_LINK_GDOFF;
    echo '<li>' . _AM_WFL_LINK_GDLIBSTATUS . $gdlib;
    if (function_exists('gd_info')) {
        if (true == $gdlib = gd_info()) {
            echo '<li>' . _AM_WFL_LINK_GDLIBVERSION . '<b>' . $gdlib['GD Version'] . '</b>';
        }
    }
    echo "<br><br>\n\n";
    echo '<li>' . _AM_WFL_LINK_SAFEMODESTATUS . $safemode;
    echo '<li>' . _AM_WFL_LINK_REGISTERGLOBALS . $registerglobals;
    echo '<li>' . _AM_WFL_LINK_SERVERUPLOADSTATUS . $links;
    echo '</div>';
    echo '</fieldset><br>';
}

// displayicons()
// @param  $time
// @param integer $status
// @param integer $counter
// @return
/**
 * @param     $time
 * @param int $status
 * @param int $counter
 *
 * @return string
 */
function wfl_displayicons($time, $status = 0, $counter = 0)
{
    global $xoopsModuleConfig, $xoopsModule;

    $new = '';
    $pop = '';

    $newdate = (time() - (86400 * (int)$xoopsModuleConfig['daysnew']));
    $popdate = (time() - (86400 * (int)$xoopsModuleConfig['daysupdated']));

    if ($xoopsModuleConfig['displayicons'] != 3) {
        if ($newdate < $time) {
            if ((int)$status > 1) {
                if ($xoopsModuleConfig['displayicons'] == 1) {
                    $new = '&nbsp;<img src="' . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/assets/images/icon/update.png" alt="" align="top">';
                }
                if ($xoopsModuleConfig['displayicons'] == 2) {
                    $new = '<i>Updated!</i>';
                }
            } else {
                if ($xoopsModuleConfig['displayicons'] == 1) {
                    $new = '&nbsp;<img src="' . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/assets/images/icon/new.png" alt="" align="top">';
                }
                if ($xoopsModuleConfig['displayicons'] == 2) {
                    $new = '<i>New!</i>';
                }
            }
        }
        if ($popdate > $time) {
            if ($counter >= $xoopsModuleConfig['popular']) {
                if ($xoopsModuleConfig['displayicons'] == 1) {
                    $pop = '&nbsp;<img src ="' . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/assets/images/icon/popular.png" alt="" align="top">';
                }
                if ($xoopsModuleConfig['displayicons'] == 2) {
                    $pop = '<i>Popular!</i>';
                }
            }
        }
    }
    $icons = $new . ' ' . $pop;

    return $icons;
}

if (!function_exists('wfl_convertorderbyin')) {
    // Reusable Link Sorting Functions
    // wfl_convertorderbyin()
    // @param  $orderby
    // @return
    /**
     * @param $orderby
     *
     * @return string
     */
    function wfl_convertorderbyin($orderby)
    {
        switch (trim($orderby)) {
            case 'titleA':
                $orderby = 'title ASC';
                break;
            case 'dateA':
                $orderby = 'published ASC';
                break;
            case 'hitsA':
                $orderby = 'hits ASC';
                break;
            case 'ratingA':
                $orderby = 'rating ASC';
                break;
            case 'countryA':
                $orderby = 'country ASC';
                break;
            case 'titleD':
                $orderby = 'title DESC';
                break;
            case 'hitsD':
                $orderby = 'hits DESC';
                break;
            case 'ratingD':
                $orderby = 'rating DESC';
                break;
            case'dateD':
                $orderby = 'published DESC';
                break;
            case 'countryD':
                $orderby = 'country DESC';
                break;
        }

        return $orderby;
    }
}
if (!function_exists('wfl_convertorderbytrans')) {
    /**
     * @param $orderby
     *
     * @return string
     */
    function wfl_convertorderbytrans($orderby)
    {
        if ($orderby === 'hits ASC') {
            $orderbyTrans = _MD_WFL_POPULARITYLTOM;
        }
        if ($orderby === 'hits DESC') {
            $orderbyTrans = _MD_WFL_POPULARITYMTOL;
        }
        if ($orderby === 'title ASC') {
            $orderbyTrans = _MD_WFL_TITLEATOZ;
        }
        if ($orderby === 'title DESC') {
            $orderbyTrans = _MD_WFL_TITLEZTOA;
        }
        if ($orderby === 'published ASC') {
            $orderbyTrans = _MD_WFL_DATEOLD;
        }
        if ($orderby === 'published DESC') {
            $orderbyTrans = _MD_WFL_DATENEW;
        }
        if ($orderby === 'rating ASC') {
            $orderbyTrans = _MD_WFL_RATINGLTOH;
        }
        if ($orderby === 'rating DESC') {
            $orderbyTrans = _MD_WFL_RATINGHTOL;
        }
        if ($orderby === 'country ASC') {
            $orderbyTrans = _MD_WFL_COUNTRYLTOH;
        }
        if ($orderby === 'country DESC') {
            $orderbyTrans = _MD_WFL_COUNTRYHTOL;
        }

        return $orderbyTrans;
    }
}
if (!function_exists('wfl_convertorderbyout')) {
    /**
     * @param $orderby
     *
     * @return string
     */
    function wfl_convertorderbyout($orderby)
    {
        if ($orderby === 'title ASC') {
            $orderby = 'titleA';
        }
        if ($orderby === 'published ASC') {
            $orderby = 'dateA';
        }
        if ($orderby === 'hits ASC') {
            $orderby = 'hitsA';
        }
        if ($orderby === 'rating ASC') {
            $orderby = 'ratingA';
        }
        if ($orderby === 'country ASC') {
            $orderby = 'countryA';
        }
        if ($orderby === 'weight ASC') {
            $orderby = 'weightA';
        }
        if ($orderby === 'title DESC') {
            $orderby = 'titleD';
        }
        if ($orderby === 'published DESC') {
            $orderby = 'dateD';
        }
        if ($orderby === 'hits DESC') {
            $orderby = 'hitsD';
        }
        if ($orderby === 'rating DESC') {
            $orderby = 'ratingD';
        }
        if ($orderby === 'country DESC') {
            $orderby = 'countryD';
        }

        return $orderby;
    }
}

// updaterating()
// @param  $sel_id
// @return updates rating data in itemtable for a given item
/**
 * @param $sel_id
 */
function wfl_updaterating($sel_id)
{
    global $xoopsDB;
    $query       = 'SELECT rating FROM ' . $xoopsDB->prefix('wflinks_votedata') . ' WHERE lid=' . $sel_id;
    $voteresult  = $xoopsDB->query($query);
    $votesDB     = $xoopsDB->getRowsNum($voteresult);
    $totalrating = 0;
    while (list($rating) = $xoopsDB->fetchRow($voteresult)) {
        $totalrating += $rating;
    }
    $finalrating = $totalrating / $votesDB;
    $finalrating = number_format($finalrating, 4);
    $sql         = sprintf('UPDATE %s SET rating = %u, votes = %u WHERE lid = %u', $xoopsDB->prefix('wflinks_links'), $finalrating, $votesDB, $sel_id);
    $xoopsDB->query($sql);
}

// totalcategory()
// @param integer $pid
// @return
/**
 * @param int $pid
 *
 * @return int
 */
function wfl_totalcategory($pid = 0)
{
    global $xoopsDB;

    $sql = 'SELECT cid FROM ' . $xoopsDB->prefix('wflinks_cat');
    if ($pid > 0) {
        $sql .= ' WHERE pid=0';
    }
    $result     = $xoopsDB->query($sql);
    $catlisting = 0;
    while (list($cid) = $xoopsDB->fetchRow($result)) {
        if (wfl_checkgroups($cid)) {
            ++$catlisting;
        }
    }

    return $catlisting;
}

// wfl_getTotalItems()
// @param integer $sel_id
// @param integer $get_child
// @param integer $return_sql
// @return
/**
 * @param int $sel_id
 * @param int $get_child
 * @param int $return_sql
 *
 * @return mixed
 */
function wfl_getTotalItems($sel_id = 0, $get_child = 0, $return_sql = 0)
{
    global $xoopsDB, $mytree, $_check_array;

    if ($sel_id > 0) {
        $sql = 'SELECT DISTINCT a.lid, a.cid, published FROM '
               . $xoopsDB->prefix('wflinks_links')
               . ' a LEFT JOIN '
               . $xoopsDB->prefix('wflinks_altcat')
               . ' b '
               . 'ON b.lid=a.lid '
               . 'WHERE published > 0 AND published <= '
               . time()
               . ' AND (expired = 0 OR expired > '
               . time()
               . ') AND offline = 0 '
               . ' AND (b.cid=a.cid OR (a.cid='
               . $sel_id
               . ' OR b.cid='
               . $sel_id
               . ')) ';
    } else {
        $sql = 'SELECT lid, cid, published FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE offline = 0 AND published > 0 AND published <= ' . time() . ' AND (expired = 0 OR expired > ' . time() . ')';
    }
    if ($return_sql == 1) {
        return $sql;
    }

    $count          = 0;
    $published_date = 0;

    $arr    = array();
    $result = $xoopsDB->query($sql);
    while (list($lid, $cid, $published) = $xoopsDB->fetchRow($result)) {
        if (true === wfl_checkgroups()) {
            ++$count;
            $published_date = ($published > $published_date) ? $published : $published_date;
        }
    }

    $child_count = 0;
    if ($get_child == 1) {
        $arr  = $mytree->getAllChildId($sel_id);
        $size = count($arr);
        for ($i = 0, $iMax = count($arr); $i < $iMax; ++$i) {
            $query2 = 'SELECT DISTINCT a.lid, a.cid, published FROM '
                      . $xoopsDB->prefix('wflinks_links')
                      . ' a LEFT JOIN '
                      . $xoopsDB->prefix('wflinks_altcat')
                      . ' b '
                      . 'ON b.lid=a.lid '
                      . 'WHERE published > 0 AND published <= '
                      . time()
                      . ' AND (expired = 0 OR expired > '
                      . time()
                      . ') AND offline = 0 '
                      . ' AND (b.cid=a.cid OR (a.cid='
                      . $arr[$i]
                      . ' OR b.cid='
                      . $arr[$i]
                      . ')) ';

            $result2 = $xoopsDB->query($query2);
            while (list($lid, $published) = $xoopsDB->fetchRow($result2)) {
                if ($published == 0) {
                    continue;
                }
                $published_date = ($published > $published_date) ? $published : $published_date;
                ++$child_count;
            }
        }
    }
    $info['count']     = $count + $child_count;
    $info['published'] = $published_date;

    return $info;
}

/**
 * @param string $indeximage
 * @param string $indexheading
 *
 * @return string
 */
function wfl_imageheader($indeximage = '', $indexheading = '')
{
    global $xoopsDB, $xoopsModuleConfig;

    if ($indeximage == '') {
        $result = $xoopsDB->query('SELECT indeximage, indexheading FROM ' . $xoopsDB->prefix('wflinks_indexpage'));
        list($indeximage, $indexheading) = $xoopsDB->fetchRow($result);
    }

    $image = '';
    if (!empty($indeximage)) {
        $image = wfl_displayimage($indeximage, "'index.php'", $xoopsModuleConfig['mainimagedir'], $indexheading);
    }

    return $image;
}

/**
 * @param string $image
 * @param string $path
 * @param string $imgsource
 * @param string $alttext
 *
 * @return string
 */
function wfl_displayimage($image = '', $path = '', $imgsource = '', $alttext = '')
{
    global $xoopsConfig, $xoopsUser, $xoopsModule;

    $showimage = '';
    // Check to see if link is given
    if ($path) {
        $showimage = '<a href=' . $path . '>';
    }

    // checks to see if the file is valid else displays default blank image
    if (!is_dir(XOOPS_ROOT_PATH . "/{$imgsource}/{$image}")
        && file_exists(XOOPS_ROOT_PATH . "/{$imgsource}/{$image}")) {
        $showimage .= "<img src='" . XOOPS_URL . "/{$imgsource}/{$image}' border='0' alt='" . $alttext . "'></a>";
    } else {
        if ($xoopsUser && $xoopsUser->isAdmin($xoopsModule->getVar('mid'))) {
            $showimage .= "<img src='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . "/assets/images/brokenimg.gif' alt='" . _MD_WFL_ISADMINNOTICE . "'></a>";
        } else {
            $showimage .= "<img src='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . "/assets/images/blank.gif' alt='" . $alttext . "'></a>";
        }
    }
    clearstatcache();

    return $showimage;
}

/**
 * @return string
 */
function wfl_letters()
{
    global $xoopsModule;

    $letterchoice = '<div>' . _MD_WFL_BROWSETOTOPIC . '</div>';
    $letterchoice .= '[  ';
    $alphabet     = array(
        '0',
        '1',
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
        'A',
        'B',
        'C',
        'D',
        'E',
        'F',
        'G',
        'H',
        'I',
        'J',
        'K',
        'L',
        'M',
        'N',
        'O',
        'P',
        'Q',
        'R',
        'S',
        'T',
        'U',
        'V',
        'W',
        'X',
        'Y',
        'Z'
    );
    $num          = count($alphabet) - 1;
    $counter      = 0;
    //    while (list(, $ltr) = each($alphabet)) {
    foreach ($alphabet as $key => $ltr) {
        $letterchoice .= "<a href='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . "/viewcat.php?list=$ltr'>$ltr</a>";
        if ($counter == round($num / 2)) {
            $letterchoice .= ' ]<br>[ ';
        } elseif ($counter != $num) {
            $letterchoice .= '&nbsp;|&nbsp;';
        }
        ++$counter;
    }
    $letterchoice .= ' ]';

    return $letterchoice;
}

/**
 * @param $published
 *
 * @return mixed
 */
function wfl_isnewimage($published)
{
    global $xoopsModule, $xoopsDB;

    $oneday    = (time() - (86400 * 1));
    $threedays = (time() - (86400 * 3));
    $week      = (time() - (86400 * 7));

    $path = 'modules/' . $xoopsModule->getVar('dirname') . '/assets/images/icon';

    if ($published > 0 && $published < $week) {
        $indicator['image']   = "$path/linkload4.gif";
        $indicator['alttext'] = _MD_WFL_NEWLAST;
    } elseif ($published >= $week && $published < $threedays) {
        $indicator['image']   = "$path/linkload3.gif";
        $indicator['alttext'] = _MD_WFL_NEWTHIS;
    } elseif ($published >= $threedays && $published < $oneday) {
        $indicator['image']   = "$path/linkload2.gif";
        $indicator['alttext'] = _MD_WFL_THREE;
    } elseif ($published >= $oneday) {
        $indicator['image']   = "$path/linkload1.gif";
        $indicator['alttext'] = _MD_WFL_TODAY;
    } else {
        $indicator['image']   = "$path/linkload.gif";
        $indicator['alttext'] = _MD_WFL_NO_FILES;
    }

    return $indicator;
}

/**
 * @param $haystack
 * @param $needle
 *
 * @return string
 */
function wfl_strrrchr($haystack, $needle)
{
    return substr($haystack, 0, strpos($haystack, $needle) + 1);
}

/**
 * @param string $header
 * @param string $menu
 * @param string $extra
 * @param int    $scount
 *
 * @return null
 */
function wfl_adminmenu($header = '', $menu = '', $extra = '', $scount = 4)
{
    global $xoopsConfig, $xoopsModule, $xoopsModuleConfig;

    $_named_url = xoops_getenv('PHP_SELF');
    if ($_named_url) {
        $thispage = basename($_named_url);
    }

    if (file_exists(__DIR__ . '/../docs/' . $xoopsConfig['language'] . '/readme.html')) {
        $docs = '<a href="../docs/' . $xoopsConfig['language'] . '/readme.html" target="_blank">' . _AM_WFL_DOCUMENTATION . '</a> |';
    } elseif (file_exists(__DIR__ . '/../docs/english/readme.html')) {
        $docs = '<a href="../docs/english/readme.html" target="_blank">' . _AM_WFL_DOCUMENTATION . '</a> |';
    } else {
        $docs = '';
    }

    $op = isset($_GET['op']) ? $op = '?op=' . $_GET['op'] : '';

    echo "<h4 style='color: #2F5376;'>" . _AM_WFL_MODULE_NAME . '</h4>';
    echo "
        <table width='100%' cellspacing='0' cellpadding='0' border='0' class='outer'>\n
        <tr>\n
        <td style='font-size: 10px; text-align: left; color: #2F5376; padding: 2px 6px; line-height: 18px;'>\n
        <a href='../admin/index.php'>" . _AM_WFL_BINDEX . "</a> | \n
        <a href='../index.php'>" . _AM_WFL_GOMODULE . "</a> | \n
        <a href='../../system/admin.php?fct=preferences&op=showmod&mod=" . $xoopsModule->getVar('mid') . "'>" . _AM_WFL_PREFS . "</a> | \n
        <a href='../../system/admin.php?fct=modulesadmin&op=update&module=" . $xoopsModule->getVar('dirname') . "'>" . _AM_WFL_BUPDATE . "</a> | \n
        <a href='../admin/permissions.php'>" . _AM_WFL_BPERMISSIONS . "</a> | \n
        <a href='../admin/myblocksadmin.php'>" . _AM_WFL_BLOCKADMIN . "</a> | \n
        " . $docs . "
        <a href='../admin/about.php'>" . _AM_WFL_ABOUT . "</a> \n
        </td>\n
        </tr>\n
        </table><br>\n
        ";

    if (empty($menu)) {
        // You can change this part to suit your own module. Defining this here will save you form having to do this each time.
        $menu = array(
            _AM_WFL_INDEXPAGE      => 'indexpage.php',
            _AM_WFL_MCATEGORY      => 'category.php',
            _AM_WFL_MLINKS         => 'main.php?op=edit',
            _AM_WFL_MUPLOADS       => 'upload.php',
            _AM_WFL_MVOTEDATA      => 'votedata.php',
            _AM_WFL_MLISTPINGTIMES => 'main.php?op=pingtime',
            _AM_WFL_MCOMMENTS      => '../../system/admin.php?module=' . $xoopsModule->getVar('mid') . '&status=0&limit=100&fct=comments&selsubmit=Go',
        );
    }

    if (!is_array($menu)) {
        echo "<table width='100%' cellpadding= '2' cellspacing= '1' class='outer'>\n";
        echo "<tr><td class ='even' align ='center'><b>" . _AM_WFL_NOMENUITEMS . "</b></td></tr></table><br>\n";

        return false;
    }

    $oddnum = array(1 => '1', 3 => '3', 5 => '5', 7 => '7', 9 => '9', 11 => '11', 13 => '13');
    // number of rows per menu
    $menurows = count($menu) / $scount;
    // total amount of rows to complete menu
    $menurow = ceil($menurows) * $scount;
    // actual number of menuitems per row
    $rowcount = $menurow / ceil($menurows);
    $count    = 0;
    for ($i = count($menu); $i < $menurow; ++$i) {
        $tempArray = array(1 => null);
        $menu      = array_merge($menu, $tempArray);
        ++$count;
    }

    // Sets up the width of each menu cell
    $width = 100 / $scount;
    $width = ceil($width);

    $menucount = 0;
    $count     = 0;

    // Menu table output
    echo "<table width='100%' cellpadding= '2' cellspacing= '1' class='outer'><tr>";

    // Check to see if $menu is and array
    if (is_array($menu)) {
        $classcounts = 0;
        $classcol[0] = 'even';

        for ($i = 1; $i < $menurow; ++$i) {
            ++$classcounts;
            if ($classcounts >= $scount) {
                if ($classcol[$i - 1] === 'odd') {
                    $classcol[$i] = ($classcol[$i - 1] === 'odd' && in_array($classcounts, $oddnum)) ? 'even' : 'odd';
                } else {
                    $classcol[$i] = ($classcol[$i - 1] === 'even' && in_array($classcounts, $oddnum)) ? 'odd' : 'even';
                }
                $classcounts = 0;
            } else {
                $classcol[$i] = ($classcol[$i - 1] === 'even') ? 'odd' : 'even';
            }
        }
        unset($classcounts);

        foreach ($menu as $menutitle => $menulink) {
            if ($thispage . $op == $menulink) {
                $classcol[$count] = 'outer';
            }
            echo "<td class='" . $classcol[$count] . "' class='txtcenter;' valign='middle' width='$width%'>";
            if (is_string($menulink)) {
                echo "<a href='" . $menulink . "'><small>" . $menutitle . '</small></a></td>';
            } else {
                echo '&nbsp;</td>';
            }
            ++$menucount;
            ++$count;

            // Break menu cells to start a new row if $count > $scount
            if ($menucount >= $scount) {
                echo '</tr>';
                $menucount = 0;
            }
        }
        echo '</table><br>';
        unset($count, $menucount);
    }
    // ###### Output warn messages for security ######
    if (is_dir(XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/update/')) {
        xoops_error(sprintf(_AM_WFL_WARNINSTALL1, XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/update/'));
        echo '<br>';
    }

    $_file = XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/update.php';
    if (file_exists($_file)) {
        xoops_error(sprintf(_AM_WFL_WARNINSTALL2, XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/update.php'));
        echo '<br>';
    }

    $path1 = XOOPS_ROOT_PATH . '/' . $xoopsModuleConfig['mainimagedir'];
    if (!is_dir($path1)) {
        xoops_error(sprintf(_AM_WFL_WARNINSTALL3, $path1));
        echo '<br>';
    }
    if (!is_writable($path1)) {
        xoops_error(sprintf(_AM_WFL_WARNINSTALL4, $path1));
        echo '<br>';
    }

    $path1_t = XOOPS_ROOT_PATH . '/' . $xoopsModuleConfig['mainimagedir'] . '/thumbs';
    if (!is_dir($path1_t)) {
        xoops_error(sprintf(_AM_WFL_WARNINSTALL3, $path1_t));
        echo '<br>';
    }
    if (!is_writable($path1_t)) {
        xoops_error(sprintf(_AM_WFL_WARNINSTALL4, $path1_t));
        echo '<br>';
    }

    $path2 = XOOPS_ROOT_PATH . '/' . $xoopsModuleConfig['screenshots'];
    if (!is_dir($path2)) {
        xoops_error(sprintf(_AM_WFL_WARNINSTALL3, $path2));
        echo '<br>';
    }
    if (!is_writable($path2)) {
        xoops_error(sprintf(_AM_WFL_WARNINSTALL4, $path2));
        echo '<br>';
    }

    $path2_t = XOOPS_ROOT_PATH . '/' . $xoopsModuleConfig['screenshots'] . '/thumbs';
    if (!is_dir($path2_t)) {
        xoops_error(sprintf(_AM_WFL_WARNINSTALL3, $path2_t));
        echo '<br>';
    }
    if (!is_writable($path2_t)) {
        xoops_error(sprintf(_AM_WFL_WARNINSTALL4, $path2_t));
        echo '<br>';
    }

    $path3 = XOOPS_ROOT_PATH . '/' . $xoopsModuleConfig['catimage'];
    if (!is_dir($path3)) {
        xoops_error(sprintf(_AM_WFL_WARNINSTALL3, $path3));
        echo '<br>';
    }
    if (!is_writable($path3)) {
        xoops_error(sprintf(_AM_WFL_WARNINSTALL4, $path3));
        echo '<br>';
    }

    $path3_t = XOOPS_ROOT_PATH . '/' . $xoopsModuleConfig['catimage'] . '/thumbs';
    if (!is_dir($path3_t)) {
        xoops_error(sprintf(_AM_WFL_WARNINSTALL3, $path3_t));
        echo '<br>';
    }
    if (!is_writable($path3_t)) {
        xoops_error(sprintf(_AM_WFL_WARNINSTALL4, $path3_t));
        echo '<br>';
    }

    echo "<h3 style='color: #2F5376;'>" . $header . '</h3>';
    if ($extra) {
        echo "<div>$extra</div>";
    }

    return null;
}

/**
 * @param $selected
 * @param $dirarray
 * @param $namearray
 */
function wfl_getDirSelectOption($selected, $dirarray, $namearray)
{
    echo "<select size='1' name='workd' onchange='location.href=\"upload.php?rootpath=\"+this.options[this.selectedIndex].value'>";
    echo "<option value=''>--------------------------------------</option>";
    foreach ($namearray as $namearray => $workd) {
        if ($workd === $selected) {
            $opt_selected = 'selected';
        } else {
            $opt_selected = '';
        }
        echo "<option value='" . htmlspecialchars($namearray, ENT_QUOTES) . "' $opt_selected>" . $workd . '</option>';
    }
    echo '</select>';
}

/**
 * @param        $FILES
 * @param string $uploaddir
 * @param string $allowed_mimetypes
 * @param string $redirecturl
 * @param int    $num
 * @param int    $redirect
 * @param int    $usertype
 *
 * @return array|null
 */
function wfl_uploading(
    $FILES,
    $uploaddir = 'uploads',
    $allowed_mimetypes = '',
    $redirecturl = 'index.php',
    $num = 0,
    $redirect = 0,
    $usertype = 1
) {
    global $FILES, $xoopsConfig, $xoopsModuleConfig, $xoopsModule;

    $down = array();
    require_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/class/uploader.php';
    if (empty($allowed_mimetypes)) {
        $allowed_mimetypes = wfl_retmime($FILES['userfile']['name'], $usertype);
    }
    $upload_dir = XOOPS_ROOT_PATH . '/' . $uploaddir . '/';

    $maxfilesize   = $xoopsModuleConfig['maxfilesize'];
    $maxfilewidth  = $xoopsModuleConfig['maximgwidth'];
    $maxfileheight = $xoopsModuleConfig['maximgheight'];

    $uploader = new XoopsMediaUploader($upload_dir, $allowed_mimetypes, $maxfilesize, $maxfilewidth, $maxfileheight);
    $uploader->noAdminSizeCheck(1);
    if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
        if (!$uploader->upload()) {
            $errors = $uploader->getErrors();
            redirect_header($redirecturl, 2, $errors);
        } else {
            if ($redirect) {
                redirect_header($redirecturl, 1, _AM_PDD_UPLOADFILE);
            } else {
                if (is_file($uploader->savedDestination)) {
                    $down['url']  = XOOPS_URL . '/' . $uploaddir . '/' . strtolower($uploader->savedFileName);
                    $down['size'] = filesize(XOOPS_ROOT_PATH . '/' . $uploaddir . '/' . strtolower($uploader->savedFileName));
                }

                return $down;
            }
        }
    } else {
        $errors = $uploader->getErrors();
        redirect_header($redirecturl, 1, $errors);
    }

    return null;
}

/**
 * @param $forumid
 *
 * @return mixed
 */
function wfl_getforum($forumid)
{
    global $xoopsDB, $xoopsConfig;

    echo "<select name='forumid'>";
    echo "<option value='0'>----------------------</option>";
    if ($forumid < 4) {
        $result = $xoopsDB->query('SELECT forum_name, forum_id FROM ' . $xoopsDB->prefix('bb_forums') . ' ORDER BY forum_id');
    } else {
        $result = $xoopsDB->query('SELECT forum_name, forum_id FROM ' . $xoopsDB->prefix('bbex_forums') . ' ORDER BY forum_id');
    }
    while (list($forum_name, $forum_id) = $xoopsDB->fetchRow($result)) {
        if ($forum_id == $forumid) {
            $opt_selected = 'selected';
        } else {
            $opt_selected = '';
        }
        echo "<option value='" . $forum_id . "' $opt_selected>" . $forum_name . '</option>';
    }
    echo '</select></div>';

    return $forumid;
}

/**
 * @param $heading
 */
function wfl_linklistheader($heading)
{
    echo "
<!--        <h4 style='font-weight: bold; color: #0A3760;'>" . $heading . "</h4>\n -->
        <table width='100%' cellspacing='1' class='outer' style='font-size: smaller;' summary>\n
        <tr>\n
        <th class='txtcenter;'>" . _AM_WFL_MINDEX_ID . "</th>\n
        <th style='text-align: left;'><b>" . _AM_WFL_MINDEX_TITLE . "</th>\n
        <th style='text-align: left;'><b>" . _AM_WFL_CATTITLE . "</th>\n
        <th class='txtcenter;'>" . _AM_WFL_MINDEX_POSTER . "</th>\n
        <th class='txtcenter;'>" . _AM_WFL_MINDEX_PUBLISH . "</th>\n
        <th class='txtcenter;'>" . _AM_WFL_MINDEX_EXPIRE . "</th>\n
        <th class='txtcenter;'>" . _AM_WFL_MINDEX_ONLINE . "</th>\n
        <th class='txtcenter;'>" . _AM_WFL_MINDEX_ACTION . "</th>\n
        </tr>\n
        ";
}

/**
 * @param $published
 */
function wfl_linklistbody($published)
{
    global $wfmyts, $imagearray, $xoopsModuleConfig, $xoopsModule;
    xoops_load('XoopsUserUtility');
    $lid = $published['lid'];
    $cid = $published['cid'];

    $title     = "<a href='../singlelink.php?cid=" . $published['cid'] . '&amp;lid=' . $published['lid'] . "'>" . $wfmyts->htmlSpecialCharsStrip(trim($published['title'])) . '</a>';
    $maintitle = urlencode($wfmyts->htmlSpecialChars(trim($published['title'])));
    $cattitle  = wfl_cattitle($published['cid']);
    $submitter = XoopsUserUtility::getUnameFromId($published['submitter']);
    $hwhoisurl = str_replace('http://', '', $published['url']);
    $submitted = formatTimestamp($published['date'], $xoopsModuleConfig['dateformat']);
    $publish   = ($published['published'] > 0) ? formatTimestamp($published['published'], $xoopsModuleConfig['dateformatadmin']) : 'Not Published';
    $expires   = $published['expired'] ? formatTimestamp($published['expired'], $xoopsModuleConfig['dateformatadmin']) : _AM_WFL_MINDEX_NOTSET;
    //    if ( ( $published['published'] && $published['published'] < time() ) && $published['offline'] == 0 ) {
    //        $published_status = $imagearray['online'];
    //    } else {
    //        $published_status = ( $published['published'] == 0 ) ? "<a href='newlinks.php'>" . $imagearray['offline'] . "</a>" : $imagearray['offline'];
    //    }
    if ((($published['expired'] && $published['expired'] > time()) or $published['expired'] == 0)
        && ($published['published'] && $published['published'] < time())
        && $published['offline'] == 0) {
        $published_status = $imagearray['online'];
    } elseif (($published['expired'] && $published['expired'] < time()) && $published['offline'] == 0) {
        $published_status = $imagearray['expired'];
    } else {
        $published_status = ($published['published'] == 0) ? "<a href='newlinks.php'>" . $imagearray['offline'] . '</a>' : $imagearray['offline'];
    }
    $icon = "<a href='main.php?op=edit&amp;lid=" . $lid . "' title='" . _AM_WFL_ICO_EDIT . "'>" . $imagearray['editimg'] . '</a>&nbsp;';
    $icon .= "<a href='main.php?op=delete&amp;lid=" . $lid . "' title='" . _AM_WFL_ICO_DELETE . "'>" . $imagearray['deleteimg'] . '</a>&nbsp;';
    $icon .= "<a href='altcat.php?op=main&amp;cid=" . $cid . '&amp;lid=' . $lid . '&amp;title=' . $wfmyts->htmlSpecialCharsStrip(trim($published['title'])) . "' title='" . _AM_WFL_ALTCAT_CREATEF . "'>" . $imagearray['altcat'] . '</a>&nbsp;';
    $icon .= '<a href="http://whois.domaintools.com/' . $hwhoisurl . '" target="_blank"><img src="' . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/assets/images/icon/domaintools.png" alt="WHOIS" title="WHOIS" align="absmiddle"></a>';

    echo "
        <tr class='txtcenter;'>\n
        <td class='head'><small>" . $lid . "</small></td>\n
        <td class='even' style='text-align: left;'><small>" . $title . "</small></td>\n
        <td class='even' style='text-align: left;'><small>" . $cattitle . "</small></td>\n
        <td class='even'><small>" . $submitter . "</small></td>\n
        <td class='even'><small>" . $publish . "</small></td>\n
        <td class='even'><small>" . $expires . "</small></td>\n
        <td class='even' width='4%'>" . $published_status . "</td>\n
        <td class='even' style='text-align: center; width: 6%; white-space: nowrap;'>$icon</td>\n
        </tr>\n
        ";
    unset($published);
}

/**
 * @param $catt
 *
 * @return mixed
 */
function wfl_cattitle($catt)
{
    global $xoopsDB;
    $sql    = 'SELECT title FROM ' . $xoopsDB->prefix('wflinks_cat') . ' WHERE cid=' . $catt;
    $result = $xoopsDB->query($sql);
    $result = $xoopsDB->fetchArray($result);

    return $result['title'];
}

function wfl_linklistfooter()
{
    echo "<tr class='txtcenter;'>\n<td class='head' colspan='7'>" . _AM_WFL_MINDEX_NOLINKSFOUND . "</td>\n</tr>\n";
}

/**
 * @param        $pubrowamount
 * @param        $start
 * @param string $art
 * @param string $_this
 *
 * @return null
 */
function wfl_linklistpagenav($pubrowamount, $start, $art = 'art', $_this = '')
{
    global $xoopsModuleConfig;
    echo "</table>\n";
    if ($pubrowamount < $xoopsModuleConfig['admin_perpage']) {
        return false;
    }
    // Display Page Nav if published is > total display pages amount.
    require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
    //    $page = ( $pubrowamount > $xoopsModuleConfig['admin_perpage'] ) ? _AM_WFL_MINDEX_PAGE : '';
    $pagenav = new XoopsPageNav($pubrowamount, $xoopsModuleConfig['admin_perpage'], $start, 'st' . $art, $_this);
    echo '<div align="right" style="padding: 8px;">' . $pagenav->renderNav() . '</div>';

    return null;
}

/**
 * @param        $pubrowamount
 * @param        $start
 * @param string $art
 * @param string $_this
 *
 * @return null
 */
function wfl_linklistpagenavleft($pubrowamount, $start, $art = 'art', $_this = '')
{
    global $xoopsModuleConfig;
    //    echo "</table>\n";
    if ($pubrowamount < $xoopsModuleConfig['admin_perpage']) {
        return false;
    }
    // Display Page Nav if published is > total display pages amount.
    require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
    //    $page = ( $pubrowamount > $xoopsModuleConfig['admin_perpage'] ) ? _AM_WFL_MINDEX_PAGE : '';
    $pagenav = new XoopsPageNav($pubrowamount, $xoopsModuleConfig['admin_perpage'], $start, 'st' . $art, $_this);
    echo '<div align="left" style="padding: 8px;">' . $pagenav->renderNav() . '</div>';

    return null;
}

// Retreive an editor according to the module's option "form_options"
/**
 * @param $caption
 * @param $name
 * @param $value
 *
 * @return bool|\XoopsFormDhtmlTextArea|\XoopsFormEditor|\XoopsFormFckeditor|\XoopsFormHtmlarea|\XoopsFormTextArea
 */
function wfl_getWysiwygForm($caption, $name, $value)
{
    global $xoopsModuleConfig, $xoopsUser, $xoopsModule;

    $editor = false;
    $x22    = false;
    $xv     = str_replace('XOOPS ', '', XOOPS_VERSION);
    if (substr($xv, 2, 1) == '2') {
        $x22 = true;
    }
    $editor_configs           = array();
    $editor_configs['name']   = $name;
    $editor_configs['value']  = $value;
    $editor_configs['rows']   = 35;
    $editor_configs['cols']   = 60;
    $editor_configs['width']  = '100%';
    $editor_configs['height'] = '400px';

    $isadmin = ((is_object($xoopsUser) && !empty($xoopsUser))
                && $xoopsUser->isAdmin($xoopsModule->mid()));
    if ($isadmin === true) {
        $formuser = $xoopsModuleConfig['form_options'];
    } else {
        $formuser = $xoopsModuleConfig['form_optionsuser'];
    }

    switch ($formuser) {
        case 'fck':
            if (!$x22) {
                if (is_readable(XOOPS_ROOT_PATH . '/class/xoopseditor/fckeditor/formfckeditor.php')) {
                    require_once XOOPS_ROOT_PATH . '/class/xoopseditor/fckeditor/formfckeditor.php';
                    $editor = new XoopsFormFckeditor($editor_configs, true);
                } else {
                    if ($dhtml) {
                        $editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 20, 60);
                    } else {
                        $editor = new XoopsFormTextArea($caption, $name, $value, 7, 60);
                    }
                }
            } else {
                $editor = new XoopsFormEditor($caption, 'fckeditor', $editor_configs);
            }
            break;

        case 'htmlarea':
            if (!$x22) {
                if (is_readable(XOOPS_ROOT_PATH . '/class/htmlarea/formhtmlarea.php')) {
                    require_once XOOPS_ROOT_PATH . '/class/htmlarea/formhtmlarea.php';
                    $editor = new XoopsFormHtmlarea($caption, $name, $value);
                }
            } else {
                $editor = new XoopsFormEditor($caption, 'htmlarea', $editor_configs);
            }
            break;

        case 'dhtml':
            if (!$x22) {
                $editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 20, 60);
            } else {
                $editor = new XoopsFormEditor($caption, 'dhtmltextarea', $editor_configs);
            }
            break;

        case 'textarea':
            $editor = new XoopsFormTextArea($caption, $name, $value);
            break;

        case 'koivi':
            if (!$x22) {
                if (is_readable(XOOPS_ROOT_PATH . '/class/xoopseditor/koivi/formwysiwygtextarea.php')) {
                    require_once XOOPS_ROOT_PATH . '/class/xoopseditor/koivi/formwysiwygtextarea.php';
                    $editor = new XoopsFormWysiwygTextArea($caption, $name, $value, '100%', '400px');
                } else {
                    if ($dhtml) {
                        $editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 20, 60);
                    } else {
                        $editor = new XoopsFormTextArea($caption, $name, $value, 7, 60);
                    }
                }
            } else {
                $editor = new XoopsFormEditor($caption, 'koivi', $editor_configs);
            }
            break;

        case 'tinyeditor':
            if (!$x22) {
                if (is_readable(XOOPS_ROOT_PATH . '/class/xoopseditor/tinyeditor/formtinyeditortextarea.php')) {
                    require_once XOOPS_ROOT_PATH . '/class/xoopseditor/tinyeditor/formtinyeditortextarea.php';
                    $editor = new XoopsFormTinyeditorTextArea(array(
                                                                  'caption' => $caption,
                                                                  'name'    => $name,
                                                                  'value'   => $value,
                                                                  'width'   => '100%',
                                                                  'height'  => '400px'
                                                              ));
                } else {
                    if ($dhtml) {
                        $editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 50, 60);
                    } else {
                        $editor = new XoopsFormTextArea($caption, $name, $value, 7, 60);
                    }
                }
            } else {
                $editor = new XoopsFormEditor($caption, 'tinyeditor', $editor_configs);
            }
            break;

        case 'dhtmlext':
            if (!$x22) {
                if (is_readable(XOOPS_ROOT_PATH . '/class/xoopseditor/dhtmlext/dhtmlext.php')) {
                    require_once XOOPS_ROOT_PATH . '/class/xoopseditor/dhtmlext/dhtmlext.php';
                    $editor = new XoopsFormDhtmlTextAreaExtended($caption, $name, $value, 10, 50);
                } else {
                    if ($dhtml) {
                        $editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 50, 60);
                    } else {
                        $editor = new XoopsFormTextArea($caption, $name, $value, 7, 60);
                    }
                }
            } else {
                $editor = new XoopsFormEditor($caption, 'dhtmlext', $editor_configs);
            }
            break;

        case 'tinymce':
            if (!$x22) {
                if (is_readable(XOOPS_ROOT_PATH . '/class/xoopseditor/tinymce/formtinymce.php')) {
                    require_once XOOPS_ROOT_PATH . '/class/xoopseditor/tinymce/formtinymce.php';
                    $editor = new XoopsFormTinymce(array(
                                                       'caption' => $caption,
                                                       'name'    => $name,
                                                       'value'   => $value,
                                                       'width'   => '100%',
                                                       'height'  => '400px'
                                                   ));
                } elseif (is_readable(XOOPS_ROOT_PATH . '/editors/tinymce/formtinymce.php')) {
                    require_once XOOPS_ROOT_PATH . '/editors/tinymce/formtinymce.php';
                    $editor = new XoopsFormTinymce(array(
                                                       'caption' => $caption,
                                                       'name'    => $name,
                                                       'value'   => $value,
                                                       'width'   => '100%',
                                                       'height'  => '400px'
                                                   ));
                } else {
                    if ($dhtml) {
                        $editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 20, 60);
                    } else {
                        $editor = new XoopsFormTextArea($caption, $name, $value, 7, 60);
                    }
                }
            } else {
                $editor = new XoopsFormEditor($caption, 'tinymce', $editor_configs);
            }
            break;
    }

    return $editor;
}

/**
 * @param $countryn
 *
 * @return mixed
 */
function wfl_countryname($countryn)
{
    $country_array = array(
        ''   => 'Unknown',
        '-'  => 'Unknown',
        'AD' => 'Andorra',
        'AE' => 'United Arab Emirates',
        'AF' => 'Afghanistan',
        'AG' => 'Antigua and Barbuda',
        'AI' => 'Anguilla',
        'AL' => 'Albania',
        'AM' => 'Armenia',
        'AN' => 'Netherlands Antilles',
        'AO' => 'Angola',
        'AQ' => 'Antarctica',
        'AR' => 'Argentina',
        'AS' => 'American Samoa',
        'AT' => 'Austria',
        'AU' => 'Australia',
        'AW' => 'Aruba',
        'AX' => 'Åland Islands',   // Added
        'AZ' => 'Azerbaijan',
        'BA' => 'Bosnia and Herzegovina',
        'BB' => 'Barbados',
        'BD' => 'Bangladesh',
        'BE' => 'Belgium',
        'BF' => 'Burkina Faso',
        'BG' => 'Bulgaria',
        'BH' => 'Bahrain',
        'BI' => 'Burundi',
        'BJ' => 'Benin',
        'BL' => 'Saint Barthélemy',   // Added
        'BM' => 'Bermuda',
        'BN' => 'Brunei Darussalam',
        'BO' => 'Bolivia',
        'BR' => 'Brazil',
        'BS' => 'Bahamas',
        'BT' => 'Bhutan',
        'BV' => 'Bouvet Island',
        'BW' => 'Botswana',
        'BY' => 'Belarus',
        'BZ' => 'Belize',
        'CA' => 'Canada',
        'CC' => 'Cocos (Keeling) Islands',
        'CD' => 'Congo (Dem. Rep.)',   // Added
        'CF' => 'Central African Republic',
        'CG' => 'Congo',
        'CH' => 'Switzerland',
        'CI' => "Cote D'Ivoire", // Removed: (Ivory Coast)
        'CK' => 'Cook Islands',
        'CL' => 'Chile',
        'CM' => 'Cameroon',
        'CN' => 'China',
        'CO' => 'Colombia',
        'CR' => 'Costa Rica',
        'CS' => 'Czechoslovakia (former)',   // Not listed anymore
        'CU' => 'Cuba',
        'CV' => 'Cape Verde',
        'CX' => 'Christmas Island',
        'CY' => 'Cyprus',
        'CZ' => 'Czech Republic',
        'DE' => 'Germany',
        'DJ' => 'Djibouti',
        'DK' => 'Denmark',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'DZ' => 'Algeria',
        'EC' => 'Ecuador',
        'EE' => 'Estonia',
        'EG' => 'Egypt',
        'EH' => 'Western Sahara',
        'ER' => 'Eritrea',
        'ES' => 'Spain',
        'EU' => 'Europe',
        'ET' => 'Ethiopia',
        'FI' => 'Finland',
        'FJ' => 'Fiji',
        'FK' => 'Falkland Islands (Malvinas)',
        'FM' => 'Micronesia',
        'FO' => 'Faroe Islands',
        'FR' => 'France',
        'FX' => 'France, Metropolitan',   // Not listed anymore
        'GA' => 'Gabon',
        'GB' => 'Great Britain',     // Name was: Great Britain (UK)
        'GD' => 'Grenada',
        'GE' => 'Georgia',
        'GF' => 'French Guiana',
        'GG' => 'Guernsey',   // Added
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GL' => 'Greenland',
        'GM' => 'Gambia',
        'GN' => 'Guinea',
        'GP' => 'Guadeloupe',
        'GQ' => 'Equatorial Guinea',
        'GR' => 'Greece',
        'GS' => 'S. Georgia and S. Sandwich Isls.',
        'GT' => 'Guatemala',
        'GU' => 'Guam',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HK' => 'Hong Kong',
        'HM' => 'Heard and McDonald Islands',
        'HN' => 'Honduras',
        'HR' => 'Croatia',
        'HT' => 'Haiti',
        'HU' => 'Hungary',
        'ID' => 'Indonesia',
        'IE' => 'Ireland',
        'IL' => 'Israel',
        'IM' => 'Isle of Man',    //  Added
        'IN' => 'India',
        'IO' => 'British Indian Ocean Territory',
        'IQ' => 'Iraq',
        'IR' => 'Iran',   //  Changed name
        'IS' => 'Iceland',
        'IT' => 'Italy',
        'JE' => 'Jersey',
        'JM' => 'Jamaica',
        'JO' => 'Jordan',
        'JP' => 'Japan',
        'KE' => 'Kenya',
        'KG' => 'Kyrgyzstan',
        'KH' => 'Cambodia',
        'KI' => 'Kiribati',
        'KM' => 'Comoros',
        'KN' => 'Saint Kitts and Nevis',
        'KP' => 'Korea (North)',    // Official name: Korea, Democratic People's Republic of
        'KR' => 'Korea (South)',    // Official name: Korea, Republic of
        'KW' => 'Kuwait',
        'KY' => 'Cayman Islands',
        'KZ' => 'Kazakhstan',
        'LA' => 'Laos',             // Official name: Lao People's Democratic Republic
        'LB' => 'Lebanon',
        'LC' => 'Saint Lucia',
        'LI' => 'Liechtenstein',
        'LK' => 'Sri Lanka',
        'LR' => 'Liberia',
        'LS' => 'Lesotho',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'LV' => 'Latvia',
        'LY' => 'Libya',            // Official name: Libyan Arab Jamahiriya
        'MA' => 'Morocco',
        'MC' => 'Monaco',
        'MD' => 'Moldova',          // Official name: Moldova, Republic of
        'ME' => 'Montenegro',       // Added
        'MF' => 'Saint Martin',     // Added
        'MG' => 'Madagascar',
        'MH' => 'Marshall Islands',
        'MK' => 'Macedonia',        // Official name: Macedonia, The Former Yugoslav Republic of
        'ML' => 'Mali',
        'MM' => 'Myanmar',
        'MN' => 'Mongolia',
        'MO' => 'Macao',            // Corrected name
        'MP' => 'Northern Mariana Islands',
        'MQ' => 'Martinique',
        'MR' => 'Mauritania',
        'MS' => 'Montserrat',
        'MT' => 'Malta',
        'MU' => 'Mauritius',
        'MV' => 'Maldives',
        'MW' => 'Malawi',
        'MX' => 'Mexico',
        'MY' => 'Malaysia',
        'MZ' => 'Mozambique',
        'NA' => 'Namibia',
        'NC' => 'New Caledonia',
        'NE' => 'Niger',
        'NF' => 'Norfolk Island',
        'NG' => 'Nigeria',
        'NI' => 'Nicaragua',
        'NL' => 'Netherlands',
        'NO' => 'Norway',
        'NP' => 'Nepal',
        'NR' => 'Nauru',
        'NT' => 'Neutral Zone',
        'NU' => 'Niue',
        'NZ' => 'New Zealand',
        'OM' => 'Oman',
        'PA' => 'Panama',
        'PE' => 'Peru',
        'PF' => 'French Polynesia',
        'PG' => 'Papua New Guinea',
        'PH' => 'Philippines',
        'PK' => 'Pakistan',
        'PL' => 'Poland',
        'PM' => 'St. Pierre and Miquelon',
        'PN' => 'Pitcairn',
        'PR' => 'Puerto Rico',
        'PS' => 'Palestinian Territory, Occupied',   // Added
        'PT' => 'Portugal',
        'PW' => 'Palau',
        'PY' => 'Paraguay',
        'QA' => 'Qatar',
        'RE' => 'Reunion',
        'RO' => 'Romania',
        'RS' => 'Serbia',     // Added
        'RU' => 'Russian Federation',
        'RW' => 'Rwanda',
        'SA' => 'Saudi Arabia',
        'SB' => 'Solomon Islands',
        'SC' => 'Seychelles',
        'SD' => 'Sudan',
        'SE' => 'Sweden',
        'SG' => 'Singapore',
        'SH' => 'St. Helena',
        'SI' => 'Slovenia',
        'SJ' => 'Svalbard and Jan Mayen Islands',
        'SK' => 'Slovakia',              // Changed name, was: Slovak Republic
        'SL' => 'Sierra Leone',
        'SM' => 'San Marino',
        'SN' => 'Senegal',
        'SO' => 'Somalia',
        'SR' => 'Suriname',
        'ST' => 'Sao Tome and Principe',
        'SU' => 'USSR (former)',          // Removed from ISO list, doesn' exsist anymore
        'SV' => 'El Salvador',
        'SY' => 'Syrian Arab Republic',   // Changed name, was: Syria
        'SZ' => 'Swaziland',
        'TC' => 'Turks and Caicos Islands',
        'TD' => 'Chad',
        'TF' => 'French Southern Territories',
        'TG' => 'Togo',
        'TH' => 'Thailand',
        'TJ' => 'Tajikistan',
        'TK' => 'Tokelau',
        'TL' => 'Timor-Leste',    // Added
        'TM' => 'Turkmenistan',
        'TN' => 'Tunisia',
        'TO' => 'Tonga',
        'TP' => 'East Timor',             // Removed from ISO list, doesn' exsist anymore
        'TR' => 'Turkey',
        'TT' => 'Trinidad and Tobago',
        'TV' => 'Tuvalu',
        'TW' => 'Taiwan',         // Official name acc. to iso-list: Taiwan, Province of China
        'TZ' => 'Tanzania',
        'UA' => 'Ukraine',
        'UG' => 'Uganda',
        'UK' => 'United Kingdom',      // Doesn't exsist in iso-list ?
        'UM' => 'US Minor Outlying Islands',
        'US' => 'United States',
        'UY' => 'Uruguay',
        'UZ' => 'Uzbekistan',
        'VA' => 'Vatican City State',
        'VC' => 'Saint Vincent and the Grenadines',
        'VE' => 'Venezuela',
        'VG' => 'Virgin Islands, British',
        'VI' => 'Virgin Islands, U.S.',
        'VN' => 'Viet Nam',
        'VU' => 'Vanuatu',
        'WF' => 'Wallis and Futuna Islands',
        'WS' => 'Samoa',
        'YE' => 'Yemen',
        'YT' => 'Mayotte',
        'YU' => 'Yugoslavia',        // Removed from iso list
        'ZA' => 'South Africa',
        'ZM' => 'Zambia',
        'ZR' => 'Zaire',             // Removed from iso list
        'ZW' => 'Zimbabwe'
    );

    return $country_array[$countryn];
}

/**
 * @param $document
 *
 * @return mixed
 */
function wfl_html2text($document)
{
    $search = array(
        "'<script[^>]*?>.*?</script>'si", // Strip out javascript
        "'<img.*?>'si", // Strip out img tags
        "'<[\/\!]*?[^<>]*?>'si", // Strip out HTML tags
        "'([\r\n])[\s]+'", // Strip out white space
        "'&(quot|#34);'i", // Replace HTML entities
        "'&(amp|#38);'i",
        "'&(lt|#60);'i",
        "'&(gt|#62);'i",
        "'&(nbsp|#160);'i",
        "'&(iexcl|#161);'i",
        "'&(cent|#162);'i",
        "'&(pound|#163);'i",
        "'&(copy|#169);'i"
    ); // evaluate as php

    $replace = array(
        '',
        '',
        '',
        "\\1",
        '"',
        '&',
        '<',
        '>',
        ' ',
        chr(161),
        chr(162),
        chr(163),
        chr(169),
    );

    $text = preg_replace($search, $replace, $document);

    preg_replace_callback('/&#(\d+);/', function ($matches) {
        return chr($matches[1]);
    }, $document);

    return $text;
}

//    Start functions for Google PageRank
//    Source: http://www.sws-tech.com/scripts/googlepagerank.php
//    This code is released under the public domain
/**
 * @param $a
 * @param $b
 *
 * @return float|int
 */
function zeroFill($a, $b)
{
    $z = hexdec(80000000);
    //echo $z;
    if ($z & $a) {
        $a = ($a >> 1);
        $a &= (~$z);
        $a |= 0x40000000;
        $a = ($a >> ($b - 1));
    } else {
        $a = ($a >> $b);
    }

    return $a;
}

/**
 * @param $a
 * @param $b
 * @param $c
 *
 * @return array
 */
function mix($a, $b, $c)
{
    $a -= $b;
    $a -= $c;
    $a ^= zeroFill($c, 13);
    $b -= $c;
    $b -= $a;
    $b ^= ($a << 8);
    $c -= $a;
    $c -= $b;
    $c ^= zeroFill($b, 13);
    $a -= $b;
    $a -= $c;
    $a ^= zeroFill($c, 12);
    $b -= $c;
    $b -= $a;
    $b ^= ($a << 16);
    $c -= $a;
    $c -= $b;
    $c ^= zeroFill($b, 5);
    $a -= $b;
    $a -= $c;
    $a ^= zeroFill($c, 3);
    $b -= $c;
    $b -= $a;
    $b ^= ($a << 10);
    $c -= $a;
    $c -= $b;
    $c ^= zeroFill($b, 15);

    return array($a, $b, $c);
}

/**
 * @param      $url
 * @param null $length
 * @param int  $init
 *
 * @return mixed
 */
function GoogleCH($url, $length = null, $init = 0xE6359A60)
{
    if (null === $length) {
        $length = count($url);
    }
    $a   = $b = 0x9E3779B9;
    $c   = $init;
    $k   = 0;
    $len = $length;
    while ($len >= 12) {
        $a   += ($url[$k + 0] + ($url[$k + 1] << 8) + ($url[$k + 2] << 16) + ($url[$k + 3] << 24));
        $b   += ($url[$k + 4] + ($url[$k + 5] << 8) + ($url[$k + 6] << 16) + ($url[$k + 7] << 24));
        $c   += ($url[$k + 8] + ($url[$k + 9] << 8) + ($url[$k + 10] << 16) + ($url[$k + 11] << 24));
        $mix = mix($a, $b, $c);
        $a   = $mix[0];
        $b   = $mix[1];
        $c   = $mix[2];
        $k   += 12;
        $len -= 12;
    }
    $c += $length;
    switch ($len) {              /* all the case statements fall through */
        case 11:
            $c += ($url[$k + 10] << 24);
        // no break
        case 10:
            $c += ($url[$k + 9] << 16);
        // no break
        case 9:
            $c += ($url[$k + 8] << 8);
        /* the first byte of c is reserved for the length */
        // no break
        case 8:
            $b += ($url[$k + 7] << 24);
        // no break
        case 7:
            $b += ($url[$k + 6] << 16);
        // no break
        case 6:
            $b += ($url[$k + 5] << 8);
        // no break
        case 5:
            $b += $url[$k + 4];
        // no break
        case 4:
            $a += ($url[$k + 3] << 24);
        // no break
        case 3:
            $a += ($url[$k + 2] << 16);
        // no break
        case 2:
            $a += ($url[$k + 1] << 8);
        // no break
        case 1:
            $a += $url[$k + 0];
        /* case 0: nothing left to add */
    }
    $mix = mix($a, $b, $c);
    //echo $mix[0];
    /*-------------------------------------------- report the result */

    return $mix[2];
}

//converts a string into an array of integers containing the numeric value of the char
/**
 * @param $string
 *
 * @return mixed
 */
function strord($string)
{
    for ($i = 0, $iMax = strlen($string); $i < $iMax; ++$i) {
        $result[$i] = ord($string{$i});
    }

    return $result;
}

/**
 * @param $url
 *
 * @return bool|string
 */
function pagerank($url)
{
    $pagerank = '';
    $ch       = '6' . GoogleCH(strord('info:' . $url));
    $fp       = fsockopen('www.google.com', 80, $errno, $errstr, 30);
    if (!$fp) {
        echo "$errstr ($errno)<br>\n";
    } else {
        $out = 'GET /search?client=navclient-auto&ch=' . $ch . '&features=Rank&q=info:' . $url . " HTTP/1.1\r\n";
        $out .= "Host: www.google.com\r\n";
        $out .= "Connection: Close\r\n\r\n";

        fwrite($fp, $out);

        while (!feof($fp)) {
            $data = fgets($fp, 128);
            $pos  = strpos($data, 'Rank_');
            if ($pos === false) {
            } else {
                $pagerank = substr($data, $pos + 9);
            }
        }
        fclose($fp);
    }

    return $pagerank;
}

//  End functions for Google PageRank

// Check if Tag module is installed
/**
 * @return bool
 */
function wfl_tag_module_included()
{
    static $wfl_tag_module_included;
    if (!isset($wfl_tag_module_included)) {
        $modulesHandler = xoops_getHandler('module');
        $tag_mod        = $modulesHandler->getByDirName('tag');
        if (!$tag_mod) {
            $tag_mod = false;
        } else {
            $wfl_tag_module_included = $tag_mod->getVar('isactive') == 1;
        }
    }

    return $wfl_tag_module_included;
}

// Add item_tag to Tag-module
/**
 * @param $lid
 * @param $item_tag
 */
function wfl_tagupdate($lid, $item_tag)
{
    global $xoopsModule;
    if (wfl_tag_module_included()) {
        require_once XOOPS_ROOT_PATH . '/modules/tag/include/formtag.php';
        $tagHandler = xoops_getModuleHandler('tag', 'tag');
        $tagHandler->updateByItem($item_tag, $lid, $xoopsModule->getVar('dirname'), 0);
    }
}

// Check if News module is installed
/**
 * @return bool
 */
function wfl_news_module_included()
{
    static $wfl_news_module_included;
    if (!isset($wfl_news_module_included)) {
        $modulesHandler = xoops_getHandler('module');
        $news_mod       = $modulesHandler->getByDirName('news');
        if (!$news_mod) {
            $news_mod = false;
        } else {
            $wfl_news_module_included = $news_mod->getVar('isactive') == 1;
        }
    }

    return $wfl_news_module_included;
}

/**
 * @param $banner_id
 *
 * @return null|string
 */
function wfl_getbanner_from_id_banner($banner_id)
{
    ###### Hack by www.stefanosilvestrini.com ######
    global $xoopsConfig;
    $db      = XoopsDatabaseFactory::getDatabaseConnection();
    $bresult = $db->query('SELECT COUNT(*) FROM ' . $db->prefix('banner') . ' WHERE bid=' . $banner_id);
    list($numrows) = $db->fetchRow($bresult);
    if ($numrows > 1) {
        $numrows = $numrows - 1;
        mt_srand((double)microtime() * 1000000);
        $bannum = mt_rand(0, $numrows);
    } else {
        $bannum = 0;
    }
    if ($numrows > 0) {
        $bresult = $db->query('SELECT * FROM ' . $db->prefix('banner') . ' WHERE bid=' . $banner_id, 1, $bannum);
        list($bid, $cid, $imptotal, $impmade, $clicks, $imageurl, $clickurl, $date, $htmlbanner, $htmlcode) = $db->fetchRow($bresult);
        if ($xoopsConfig['my_ip'] == xoops_getenv('REMOTE_ADDR')) {
            // EMPTY
        } else {
            $db->queryF(sprintf('UPDATE %s SET impmade = impmade+1 WHERE bid = %u', $db->prefix('banner'), $bid));
        }
        /* Check if this impression is the last one and print the banner */
        if ($imptotal == $impmade) {
            $newid = $db->genId($db->prefix('bannerfinish') . '_bid_seq');
            $sql   = sprintf('INSERT INTO %s (bid, cid, impressions, clicks, datestart, dateend) VALUES (%u, %u, %u, %u, %u, %u)', $db->prefix('bannerfinish'), $newid, $cid, $impmade, $clicks, $date, time());
            $db->queryF($sql);
            $db->queryF(sprintf('DELETE FROM %s WHERE bid = %u', $db->prefix('banner'), $bid));
        }
        if ($htmlbanner) {
            $bannerobject = $htmlcode;
        } else {
            $bannerobject = '<div align="center"><a href="' . XOOPS_URL . '/banners.php?op=click&bid=' . $bid . '" target="_blank">';
            if (stristr($imageurl, '.swf')) {
                $bannerobject = $bannerobject
                                . '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" width="468" height="60">'
                                . '<param name="movie" value="'
                                . $imageurl
                                . '"></param>'
                                . '<param name="quality" value="high"></param>'
                                . '<embed src="'
                                . $imageurl
                                . '" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="468" height="60">'
                                . '</embed>'
                                . '</object>';
            } else {
                $bannerobject = $bannerobject . '<img src="' . $imageurl . '" alt="">';
            }
            $bannerobject = $bannerobject . '</a></div>';
        }

        return $bannerobject;
    }

    return null;
}

/**
 * @param $client_id
 *
 * @return string
 */
function wfl_getbanner_from_id_client($client_id)
{
    ###### Hack by www.stefanosilvestrini.com ######
    global $xoopsConfig;
    $db      = XoopsDatabaseFactory::getDatabaseConnection();
    $bresult = $db->query('SELECT COUNT(*) FROM ' . $db->prefix('banner') . ' WHERE cid=' . $client_id);
    list($numrows) = $db->fetchRow($bresult);
    if ($numrows > 1) {
        $numrows = $numrows - 1;
        mt_srand((double)microtime() * 1000000);
        $bannum = mt_rand(0, $numrows);
    } else {
        $bannum = 0;
    }
    if ($numrows > 0) {
        $bresult = $db->query('SELECT * FROM ' . $db->prefix('banner') . ' WHERE cid=' . $client_id . ' ORDER BY rand()', 1, $bannum);
        list($bid, $cid, $imptotal, $impmade, $clicks, $imageurl, $clickurl, $date, $htmlbanner, $htmlcode) = $db->fetchRow($bresult);
        if ($xoopsConfig['my_ip'] == xoops_getenv('REMOTE_ADDR')) {
            // EMPTY
        } else {
            $db->queryF(sprintf('UPDATE %s SET impmade = impmade+1 WHERE bid = %u', $db->prefix('banner'), $bid));
        }
        /* Check if this impression is the last one and print the banner */
        if ($imptotal == $impmade) {
            $newid = $db->genId($db->prefix('bannerfinish') . '_bid_seq');
            $sql   = sprintf('INSERT INTO %s (bid, cid, impressions, clicks, datestart, dateend) VALUES (%u, %u, %u, %u, %u, %u)', $db->prefix('bannerfinish'), $newid, $cid, $impmade, $clicks, $date, time());
            $db->queryF($sql);
            $db->queryF(sprintf('DELETE FROM %s WHERE bid = %u', $db->prefix('banner'), $bid));
        }
        if ($htmlbanner) {
            $bannerobject = $htmlcode;
        } else {
            $bannerobject = '<div align="center"><a href="' . XOOPS_URL . '/banners.php?op=click&bid=' . $bid . '" target="_blank">';
            if (stristr($imageurl, '.swf')) {
                $bannerobject = $bannerobject
                                . '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" width="468" height="60">'
                                . '<param name="movie" value="'
                                . $imageurl
                                . '"></param>'
                                . '<param name="quality" value="high"></param>'
                                . '<embed src="'
                                . $imageurl
                                . '" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="468" height="60">'
                                . '</embed>'
                                . '</object>';
            } else {
                $bannerobject = $bannerobject . '<img src="' . $imageurl . '" alt="">';
            }
            $bannerobject = $bannerobject . '</a></div>';
        }

        return $bannerobject;
    }

    return null;
}

/**
 * @param $email
 *
 * @return mixed
 */
function emailcnvrt($email)
{
    $search = array(
        "/\@/",
        "/\./",
        "/\mailto:/",
    );

    $replace = array(
        ' AT ',
        ' DOT ',
        '',
    );

    $text = preg_replace($search, $replace, $email);

    return $text;
}

/**
 * @param $email
 *
 * @return mixed
 */
function printemailcnvrt($email)
{
    $search = array(
        "/\ AT /",
        "/\ DOT /",
    );

    $replace = array(
        '@',
        '.',
    );

    $text = preg_replace($search, $replace, $email);

    return $text;
}

/**
 * @param        $str
 * @param        $start
 * @param        $length
 * @param string $trimmarker
 *
 * @return string
 */
function wfl_substr($str, $start, $length, $trimmarker = '...')
{
    $configHandler          = xoops_getHandler('config');
    $im_multilanguageConfig = $configHandler->getConfigsByCat(IM_CONF_MULILANGUAGE);

    if ($im_multilanguageConfig['ml_enable']) {
        $tags  = explode(',', $im_multilanguageConfig['ml_tags']);
        $strs  = array();
        $hasML = false;
        foreach ($tags as $tag) {
            if (preg_match("/\[" . $tag . "](.*)\[\/" . $tag . "\]/sU", $str, $matches)) {
                if (count($matches) > 0) {
                    $hasML  = true;
                    $strs[] = $matches[1];
                }
            }
        }
    } else {
        $hasML = false;
    }

    if (!$hasML) {
        $strs = array($str);
    }

    for ($i = 0; $i <= count($strs) - 1; ++$i) {
        if (!XOOPS_USE_MULTIBYTES) {
            $strs[$i] = (strlen($strs[$i]) - $start <= $length) ? substr($strs[$i], $start, $length) : substr($strs[$i], $start, $length - strlen($trimmarker)) . $trimmarker;
        }

        if (function_exists('mb_internal_encoding') && @mb_internal_encoding(_CHARSET)) {
            $str2     = mb_strcut($strs[$i], $start, $length - strlen($trimmarker));
            $strs[$i] = $str2 . (mb_strlen($strs[$i]) != mb_strlen($str2) ? $trimmarker : '');
        }

        // phppp patch
        $DEP_CHAR = 127;
        $pos_st   = 0;
        $action   = false;
        for ($pos_i = 0; $pos_i < strlen($strs[$i]); ++$pos_i) {
            if (ord(substr($strs[$i], $pos_i, 1)) > 127) {
                ++$pos_i;
            }
            if ($pos_i <= $start) {
                $pos_st = $pos_i;
            }
            if ($pos_i >= $pos_st + $length) {
                $action = true;
                break;
            }
        }
        $strs[$i] = $action ? substr($strs[$i], $pos_st, $pos_i - $pos_st - strlen($trimmarker)) . $trimmarker : $strs[$i];

        $strs[$i] = $hasML ? '[' . $tags[$i] . ']' . $strs[$i] . '[/' . $tags[$i] . ']' : $strs[$i];
    }
    $str = implode('', $strs);

    return $str;
}
