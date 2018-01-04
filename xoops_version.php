<?php
/**
 *
 * Module: WF-Links
 * Version: v1.0.9
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */
include __DIR__ . '/preloads/autoloader.php';

$moduleDirName = basename(__DIR__);

// ------------------- Informations ------------------- //
$modversion = [
    'version'                => '1.11',
    'module_status'          => 'RC 1',
    'release_date'           => '2017/09/04',
    'name'                   => _MI_WFL_NAME,
    'description'            => _MI_WFL_DESC,
    'help'                   => 'page=help',
    'license'                => 'GNU GPL 2.0',
    'license_url'            => 'www.gnu.org/licenses/gpl-2.0.html',
    'author'                 => 'Catzwolf, McDonald, Aerograf, Mamba',
    'credits'                => 'WF-Projects Team: Based on WF-Downloads, thanks to the dream-team for some code snippits.',
    'teammembers'            => 'amayer, bender, david, dqflyer, draven, frankblack, gladiac, hervet, jackj, mercibe, John N, phppp, predator, reliableSol, tom, xpider, xtheme, mcdonald (version 1.03B and higher)',
    'author_realname'        => 'WF-Project Team',
    'author_email'           => '',
    'support_site_url'       => 'www.xoops.org',
    'support_site_name'      => 'XOOPS Project',
    'submit_bug'             => 'https://github.com/XoopsModules25x/' . $moduleDirName . '/issues',
    'warning'                => _MI_WFL_WARNINGTEXT,
    'author_credits'         => _MI_WFL_AUTHOR_CREDITSTEXT,
    'developer_website_url'  => 'www.xoops.org/',
    'developer_website_name' => 'XOOPS Project',
    'dirname'                => basename(__DIR__),
    'image'                  => 'assets/images/logoModule.png',
    'iconsmall'              => 'assets/images/logo_small.png',
    'iconbig'                => 'assets/images/logo_large.png',
    'modicons16'             => 'assets/images/icons/16',
    'modicons32'             => 'assets/images/icons/32',
    'release_file'           => XOOPS_URL . '/modules/' . $moduleDirName . '/docs/changelog.txt',
    'module_website_url'     => 'www.xoops.org/',
    'module_website_name'    => 'XOOPS',
    'min_php'                => '5.5',
    'min_xoops'              => '2.5.9',
    'min_admin'              => '1.2',
    'min_db'                 => ['mysql' => '5.5'],
    // ------------------- Admin Menu -------------------
    'system_menu'            => 1,
    'hasAdmin'               => 1,
    'adminindex'             => 'admin/index.php',
    'adminmenu'              => 'admin/menu.php',
    // ------------------- Install/Update -------------------
    'onInstall'              => 'include/oninstall.php',
    'onUpdate'               => 'include/onupdate.php',
    'onUninstall'            => 'include/onuninstall.php',
    // ------------------- Mysql -----------------------------
    'sqlfile'                => ['mysql' => 'sql/mysql.sql'],
    // ------------------- Tables ----------------------------
    'tables'                 => [
        $moduleDirName . '_' . 'broken',
        $moduleDirName . '_' . 'cat',
        $moduleDirName . '_' . 'links',
        $moduleDirName . '_' . 'mod',
        $moduleDirName . '_' . 'votedata',
        $moduleDirName . '_' . 'indexpage',
        $moduleDirName . '_' . 'altcat'
    ],
    // -------------------  PayPal ---------------------------
    'paypal'                 => [
        'business'      => 'foundation@xoops.org',
        'item_name'     => 'Donation : ' . _MI_WFL_NAME,
        'amount'        => 25,
        'currency_code' => 'USD'
    ],
    // ------------------- Search ---------------------------
    'hasSearch'              => 1,
    'search'                 => [
        'file' => 'include/search.inc.php',
        'func' => 'pedigree_search'
    ],
];

// Launch additional install script to check
// the existence of tables 'wf_resources_types' and 'wf_resources'
//$modversion['onUpdate'] = '';
//$modversion['onUpdate'] = 'include/update.php';

// ------------------- Help files ------------------- //
$modversion['helpsection'] = [
    ['name' => _MI_WFL_HELP_OVERVIEW, 'link' => 'page=help'],
    ['name' => _MI_WFL_HELP_INSTALL, 'link' => 'page=install'],
    ['name' => _MI_WFL_HELP_UPDATE, 'link' => 'page=update'],
    ['name' => _MI_WFL_HELP_CONVERT, 'link' => 'page=convert'],
    ['name' => _MI_WFL_HELP_PREFERENCES, 'link' => 'page=preferences'],
    ['name' => _MI_WFL_HELP_INDEXPAGE, 'link' => 'page=indexpage'],
    ['name' => _MI_WFL_HELP_CATEGORY, 'link' => 'page=category'],
    ['name' => _MI_WFL_HELP_PERMISSION, 'link' => 'page=permission'],
    ['name' => _MI_WFL_HELP_LINKS, 'link' => 'page=links'],
    ['name' => _MI_WFL_HELP_DISCLAIMER, 'link' => 'page=disclaimer'],
    ['name' => _MI_WFL_HELP_LICENSE, 'link' => 'page=license'],
    ['name' => _MI_WFL_HELP_SUPPORT, 'link' => 'page=support'],
];

// ------------------- Blocks ------------------- //
$modversion['blocks'][] = [
    'file'        => 'wflinks_top.php',
    'name'        => _MI_WFL_BNAME1,
    'description' => 'Shows recently added links',
    'show_func'   => 'b_wflinks_top_show',
    'edit_func'   => 'b_wflinks_top_edit',
    'options'     => 'published|10|19|d/m/Y',
    'template'    => 'wflinks_block_new.tpl',
    'can_clone'   => true,
];

$modversion['blocks'][] = [
    'file'        => 'wflinks_top.php',
    'name'        => _MI_WFL_BNAME2,
    'description' => 'Shows top clicked links',
    'show_func'   => 'b_wflinks_top_show',
    'edit_func'   => 'b_wflinks_top_edit',
    'options'     => 'hits|10|19|d/m/Y',
    'template'    => 'wflinks_block_top.tpl',
    'can_clone'   => true,
];

$modversion['blocks'][] = [
    'file'        => 'wflinks_banner.php',
    'name'        => _MI_WFL_BNAME3,
    'description' => 'Shows top clicked banners',
    'show_func'   => 'b_wflinks_banner_show',
    'edit_func'   => 'b_wflinks_banner_edit',
    'options'     => 'hits|10|19',
    'template'    => 'wflinks_block_banner.tpl',
    'can_clone'   => true,
];

$modversion['blocks'][] = [
    'file'        => 'wflinks_block_tag.php',
    'name'        => _MI_WFL_BNAME4,
    'description' => 'Show tag cloud',
    'show_func'   => 'wflinks_tag_block_cloud_show',
    'edit_func'   => 'wflinks_tag_block_cloud_edit',
    'options'     => '100|0|150|80',
    'template'    => 'wflinks_tag_block_cloud.tpl',
    'can_clone'   => true,
];

$modversion['blocks'][] = [
    'file'        => 'wflinks_block_tag.php',
    'name'        => _MI_WFL_BNAME5,
    'description' => 'Show top tag',
    'show_func'   => 'wflinks_tag_block_top_show',
    'edit_func'   => 'wflinks_tag_block_top_edit',
    'options'     => '50|30|c',
    'template'    => 'wflinks_tag_block_tag.tpl',
    'can_clone'   => true,
];

// Menu
$modversion['hasMain'] = 1;

// This part inserts the selected topics as sub items in the Xoops main menu
/** @var XoopsModuleHandler $moduleHandler */
$moduleHandler = xoops_getHandler('module');
$module        = $moduleHandler->getByDirname($modversion['dirname']);
$cansubmit     = 0;
if (is_object($module)) {
    global $xoopsUser;
    $groups       = is_object($xoopsUser) ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;
    $gpermHandler = xoops_getHandler('groupperm');
    if ($gpermHandler->checkRight('WFLinkSubPerm', 0, $groups, $module->getVar('mid'))) {
        $cansubmit = 1;
    }
}
if (1 == $cansubmit) {
    $modversion['sub'][0]['name'] = _MI_WFL_SMNAME1;
    $modversion['sub'][0]['url']  = 'submit.php';
}
unset($cansubmit);

$i                             = 1;
$modversion['sub'][$i]['name'] = _MI_WFL_SMNAME2;
$modversion['sub'][$i]['url']  = 'topten.php?list=hit';
++$i;
$modversion['sub'][$i]['name'] = _MI_WFL_SMNAME3;
$modversion['sub'][$i]['url']  = 'topten.php?list=rate';
++$i;
$modversion['sub'][$i]['name'] = _MI_WFL_SMNAME4;
$modversion['sub'][$i]['url']  = 'newlist.php?newlinkshowdays=7';
unset($i);

// Search
$modversion['hasSearch']      = 1;
$modversion['search']['file'] = 'include/search.inc.php';
$modversion['search']['func'] = 'wflinks_search';

// Comments
$modversion['hasComments']             = 1;
$modversion['comments']['itemName']    = 'lid';
$modversion['comments']['pageName']    = 'singlelink.php';
$modversion['comments']['extraParams'] = ['cid'];

// Comment callback functions
$modversion['comments']['callbackFile']        = 'include/comment_functions.php';
$modversion['comments']['callback']['approve'] = 'wflinks_com_approve';
$modversion['comments']['callback']['update']  = 'wflinks_com_update';

// ------------------- Templates ------------------- //
$modversion['templates'] = [
    ['file' => 'wflinks_brokenlink.tpl', 'description' => ''],
    ['file' => 'wflinks_linkload.tpl', 'description' => ''],
    ['file' => 'wflinks_index.tpl', 'description' => ''],
    ['file' => 'wflinks_ratelink.tpl', 'description' => ''],
    ['file' => 'wflinks_singlelink.tpl', 'description' => ''],
    ['file' => 'wflinks_topten.tpl', 'description' => ''],
    ['file' => 'wflinks_viewcat.tpl', 'description' => ''],
    ['file' => 'wflinks_newlistindex.tpl', 'description' => ''],
    ['file' => 'wflinks_print.tpl', 'description' => ''],
    ['file' => 'wflinks_disclaimer.tpl', 'description' => '']
];

// Module config setting

$modversion['config'][] = [
    'name'        => 'popular',
    'title'       => '_MI_WFL_POPULAR',
    'description' => '_MI_WFL_POPULARDSC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'default'     => 100,
    'options'     => [
        '5'    => 5,
        '10'   => 10,
        '50'   => 50,
        '100'  => 100,
        '200'  => 200,
        '500'  => 500,
        '1000' => 1000,
        '1500' => 1500,
        '2000' => 2000
    ],
];
$modversion['config'][] = [
    'name'        => 'displayicons',
    'title'       => '_MI_WFL_ICONDISPLAY',
    'description' => '_MI_WFL_DISPLAYICONDSC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'default'     => 1,
    'options'     => [
        '_MI_WFL_DISPLAYICON1' => 1,
        '_MI_WFL_DISPLAYICON2' => 2,
        '_MI_WFL_DISPLAYICON3' => 3
    ],
];
$modversion['config'][] = [
    'name'        => 'daysnew',
    'title'       => '_MI_WFL_DAYSNEW',
    'description' => '_MI_WFL_DAYSNEWDSC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10,
];
$modversion['config'][] = [
    'name'        => 'daysupdated',
    'title'       => '_MI_WFL_DAYSUPDATED',
    'description' => '_MI_WFL_DAYSUPDATEDDSC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10,
];
$modversion['config'][] = [
    'name'        => 'perpage',
    'title'       => '_MI_WFL_PERPAGE',
    'description' => '_MI_WFL_PERPAGEDSC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'default'     => 10,
    'options'     => [
        '5'   => 5,
        '10'  => 10,
        '15'  => 15,
        '20'  => 20,
        '25'  => 25,
        '30'  => 30,
        '50'  => 50,
        '75'  => 75,
        '100' => 100,
        '200' => 200
    ],
];
$modversion['config'][] = [
    'name'        => 'admin_perpage',
    'title'       => '_MI_WFL_ADMINPAGE',
    'description' => '_MI_WFL_AMDMINPAGEDSC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'default'     => 10,
    'options'     => [
        '5'   => 5,
        '10'  => 10,
        '15'  => 15,
        '20'  => 20,
        '25'  => 25,
        '30'  => 30,
        '50'  => 50,
        '75'  => 75,
        '100' => 100,
        '200' => 200
    ],
];
$modversion['config'][] = [
    'name'        => 'linkxorder',
    'title'       => '_MI_WFL_ARTICLESSORT',
    'description' => '_MI_WFL_ARTICLESSORTDSC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'title ASC',
    'options'     => [
        '_MI_WFL_TITLE_A'      => 'title ASC',
        '_MI_WFL_TITLE_D'      => 'title DESC',
        '_MI_WFL_SUBMITTED_A'  => 'published ASC',
        '_MI_WFL_SUBMITTED_D'  => 'published DESC',
        '_MI_WFL_RATING_A'     => 'rating ASC',
        '_MI_WFL_RATING_D'     => 'rating DESC',
        '_MI_WFL_POPULARITY_A' => 'hits ASC',
        '_MI_WFL_POPULARITY_D' => 'hits DESC',
        '_MI_WFL_COUNTRY_A'    => 'country ASC',
        '_MI_WFL_COUNTRY_D'    => 'country DESC'
    ],
];
$modversion['config'][] = [
    'name'        => 'sortcats',
    'title'       => '_MI_WFL_SORTCATS',
    'description' => '_MI_WFL_SORTCATSDSC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'title',
    'options'     => ['_MI_WFL_TITLE' => 'title', '_MI_WFL_WEIGHT' => 'weight'],
];

$modversion['config'][] = [
    'name'        => 'subcats',
    'title'       => '_MI_WFL_SUBCATS',
    'description' => '_MI_WFL_SUBCATSDSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0,
];
//--------------------------------------------------------------------
//++$i;
//'name' =>  'form_options',
//'title' =>  '_MI_WFL_EDITOR',
//'description' =>  '_MI_WFL_EDITORCHOICE',
//'formtype' =>  'select',
//'valuetype' =>  'text',
//'default' =>  'dhtml',
//'options' =>  array(    _MI_WFL_FORM_DHTML => 'dhtml',
//                                                _MI_WFL_FORM_DHTMLEXT => 'dhtmlext',
//                                              _MI_WFL_FORM_COMPACT => 'textarea',
//                                              _MI_WFL_FORM_HTMLAREA => 'htmlarea',
//                                              _MI_WFL_FORM_KOIVI => 'koivi',
//                                              _MI_WFL_FORM_FCK => 'fck',
//                                              _MI_WFL_FORM_TINYEDITOR => 'tinyeditor',
//                                              _MI_WFL_FORM_TINYMCE => 'tinymce'
//                                              );
//++$i;
//'name' =>  'form_optionsuser',
//'title' =>  '_MI_WFL_EDITORUSER',
//'description' =>  '_MI_WFL_EDITORCHOICEUSER',
//'formtype' =>  'select',
//'valuetype' =>  'text',
//'default' =>  'dhtml',
//'options' =>  array(  _MI_WFL_FORM_DHTML => 'dhtml',
//                                                _MI_WFL_FORM_DHTMLEXT => 'dhtmlext',
//                                              _MI_WFL_FORM_COMPACT => 'textarea',
//                                              _MI_WFL_FORM_HTMLAREA => 'htmlarea',
//                                              _MI_WFL_FORM_KOIVI => 'koivi',
//                                              _MI_WFL_FORM_FCK => 'fck',
//                                              _MI_WFL_FORM_TINYEDITOR => 'tinyeditor',
//                                              _MI_WFL_FORM_TINYMCE => 'tinymce'
//                                              );
//--------------------------------------------------------------------

xoops_load('XoopsEditorHandler');
$editorHandler = \XoopsEditorHandler::getInstance();
$editorList    = array_flip($editorHandler->getList());

$modversion['config'][] = [
    'name'        => 'form_options',
    'title'       => '_MI_WFL_EDITOR',
    'description' => '_MI_WFL_EDITORCHOICE',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => $editorList,
    'default'     => 'dhtmltextarea'
];

$modversion['config'][] = [
    'name'        => 'form_optionsuser',
    'title'       => '_MI_WFL_EDITORUSER',
    'description' => '_MI_WFL_EDITORCHOICEUSER',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => $editorList,
    'default'     => 'dhtmltextarea'
];

$modversion['config'][] = [
    'name'        => 'screenshot',
    'title'       => '_MI_WFL_USESHOTS',
    'description' => '_MI_WFL_USESHOTSDSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
$modversion['config'][] = [
    'name'        => 'usethumbs',
    'title'       => '_MI_WFL_USETHUMBS',
    'description' => '_MI_WFL_USETHUMBSDSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0,
];
$modversion['config'][] = [
    'name'        => 'updatethumbs',
    'title'       => '_MI_WFL_IMGUPDATE',
    'description' => '_MI_WFL_IMGUPDATEDSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
$modversion['config'][] = [
    'name'        => 'imagequality',
    'title'       => '_MI_WFL_QUALITY',
    'description' => '_MI_WFL_QUALITYDSC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 100,
];
$modversion['config'][] = [
    'name'        => 'keepaspect',
    'title'       => '_MI_WFL_KEEPASPECT',
    'description' => '_MI_WFL_KEEPASPECTDSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0,
];
$modversion['config'][] = [
    'name'        => 'shotwidth',
    'title'       => '_MI_WFL_SHOTWIDTH',
    'description' => '_MI_WFL_SHOTWIDTHDSC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 140,
];
$modversion['config'][] = [
    'name'        => 'shotheight',
    'title'       => '_MI_WFL_SHOTHEIGHT',
    'description' => '_MI_WFL_SHOTHEIGHTDSC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 79,
];
$modversion['config'][] = [
    'name'        => 'maxfilesize',
    'title'       => '_MI_WFL_MAXFILESIZE',
    'description' => '_MI_WFL_MAXFILESIZEDSC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 200000,
];
$modversion['config'][] = [
    'name'        => 'maximgwidth',
    'title'       => '_MI_WFL_IMGWIDTH',
    'description' => '_MI_WFL_IMGWIDTHDSC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 600,
];
$modversion['config'][] = [
    'name'        => 'maximgheight',
    'title'       => '_MI_WFL_IMGHEIGHT',
    'description' => '_MI_WFL_IMGHEIGHTDSC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 600,
];
$modversion['config'][] = [
    'name'        => 'useautothumb',
    'title'       => '_MI_WFL_USEAUTOSCRSHOT',
    'description' => '_MI_WFL_USEAUTOSCRSHOTDSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0,
];
$modversion['config'][] = [
    'name'        => 'mainimagedir',
    'title'       => '_MI_WFL_MAINIMGDIR',
    'description' => '_MI_WFL_MAINIMGDIRDSC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'modules/' . $modversion['dirname'] . '/assets/images',
];
$modversion['config'][] = [
    'name'        => 'screenshots',
    'title'       => '_MI_WFL_SCREENSHOTS',
    'description' => '_MI_WFL_SCREENSHOTSDSC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'uploads/wflinks/screenshots',
];
$modversion['config'][] = [
    'name'        => 'catimage',
    'title'       => '_MI_WFL_CATEGORYIMG',
    'description' => '_MI_WFL_CATEGORYIMGDSC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'uploads/wflinks/category',
];
$modversion['config'][] = [
    'name'        => 'flagimage',
    'title'       => '_MI_WFL_FLAGIMG',
    'description' => '_MI_WFL_FLAGIMGDSC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'uploads/flags/flags_small',
];
$modversion['config'][] = [
    'name'        => 'dateformat',
    'title'       => '_MI_WFL_DATEFORMAT',
    'description' => '_MI_WFL_DATEFORMATDSC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'd-M-Y',
];
$modversion['config'][] = [
    'name'        => 'dateformatadmin',
    'title'       => '_MI_WFL_DATEFORMATADMIN',
    'description' => '_MI_WFL_DATEFORMATADMINDSC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'd-M-Y - G:i',
];
$modversion['config'][] = [
    'name'        => 'totalchars',
    'title'       => '_MI_WFL_TOTALCHARS',
    'description' => '_MI_WFL_TOTALCHARSDSC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'default'     => 200,
    'options'     => [
        '100' => 100,
        '200' => 200,
        '300' => 300,
        '400' => 400,
        '500' => 500,
        '750' => 750
    ],
];
$modversion['config'][] = [
    'name'        => 'keywordlength',
    'title'       => '_MI_WFL_KEYLENGTH',
    'description' => '_MI_WFL_KEYLENGTHDSC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 255,
];
$modversion['config'][] = [
    'name'        => 'otherlinks',
    'title'       => '_MI_WFL_OTHERLINKS',
    'description' => '_MI_WFL_OTHERLINKSDSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
$modversion['config'][] = [
    'name'        => 'quickview',
    'title'       => '_MI_WFL_QUICKVIEW',
    'description' => '_MI_WFL_QUICKVIEWDSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0,
];
$modversion['config'][] = [
    'name'        => 'showsbookmarks',
    'title'       => '_MI_WFL_SHOWSBOOKMARKS',
    'description' => '_MI_WFL_SHOWSBOOKMARKSDSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
$modversion['config'][] = [
    'name'        => 'showpagerank',
    'title'       => '_MI_WFL_SHOWPAGERANK',
    'description' => '_MI_WFL_SHOWPAGERANKSDSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
$modversion['config'][] = [
    'name'        => 'usercantag',
    'title'       => '_MI_WFL_USERTAGDESCR',
    'description' => '_MI_WFL_USERTAGDSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0,
];
$modversion['config'][] = [
    'name'        => 'useaddress',
    'title'       => '_MI_WFL_USEADDRESSDESCR',
    'description' => '_MI_WFL_USEADDRESSDSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
$modversion['config'][] = [
    'name'        => 'footerprint',
    'title'       => '_MI_WFL_FOOTERPRINT',
    'description' => '_MI_WFL_FOOTERPRINTDSC',
    'formtype'    => 'textarea',
    'valuetype'   => 'text',
    'default'     => XOOPS_URL,
    //++$i;
    //'name' =>  'printheader',
    //'title' =>  '_MI_WFL_HEADERPRINT',
    //'description' =>  '_MI_WFL_HEADERPRINTDSC',
    //'formtype' =>  'textarea',
    //'valuetype' =>  'text',
    //'default' =>  '',
];
$modversion['config'][] = [
    'name'        => 'printlogourl',
    'title'       => '_MI_WFL_LOGOURLPRINT',
    'description' => '_MI_WFL_LOGOURLDSCPRINT',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => XOOPS_URL . '/modules/' . $modversion['dirname'] . '/assets/images/logo-en.gif',
];
$modversion['config'][] = [
    'name'        => 'showdisclaimer',
    'title'       => '_MI_WFL_SHOWDISCLAIMER',
    'description' => '_MI_WFL_SHOWDISCLAIMERDSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0,
];
$modversion['config'][] = [
    'name'        => 'disclaimer',
    'title'       => '_MI_WFL_DISCLAIMER',
    'description' => '_MI_WFL_DISCLAIMERDSC',
    'formtype'    => 'textarea',
    'valuetype'   => 'text',
    'default'     => 'We have the right, but not the obligation to monitor and review submissions submitted by users, in the forums. We shall not be responsible for any of the content of these messages. We further reserve the right, to delete, move or edit submissions that the we, in its exclusive discretion, deems abusive, defamatory, obscene or in violation of any Copyright or Trademark laws or otherwise objectionable.',
];
$modversion['config'][] = [
    'name'        => 'showlinkdisclaimer',
    'title'       => '_MI_WFL_SHOWLINKDISCL',
    'description' => '_MI_WFL_SHOWLINKDISCLDSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0,
];
$modversion['config'][] = [
    'name'        => 'linkdisclaimer',
    'title'       => '_MI_WFL_LINKDISCLAIMER',
    'description' => '_MI_WFL_LINKDISCLAIMERDSC',
    'formtype'    => 'textarea',
    'valuetype'   => 'text',
    'default'     => 'The links on this site are provided as is without warranty either expressed or implied. linkloaded files should be checked for possible virus infection using the most up-to-date detection and security packages. If you have a question concerning a particular piece of software, feel free to contact the developer. We refuse liability for any damage or loss resulting from the use or misuse of any software offered from this site for linkloading. If you have any doubt at all about the safety and operation of software made available to you on this site, do not linkload it.<br><br>Contact us if you have questions concerning this disclaimer.',
];
$modversion['config'][] = [
    'name'        => 'copyright',
    'title'       => '_MI_WFL_COPYRIGHT',
    'description' => '_MI_WFL_COPYRIGHTDSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
$modversion['config'][] = [
    'name'        => 'selectforum',
    'title'       => '_MI_WFL_SELECTFORUM',
    'description' => '_MI_WFL_SELECTFORUMDSC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'default'     => 1,
    'options'     => [
        '_MI_WFL_DISPLAYFORUM1' => 1,
        '_MI_WFL_DISPLAYFORUM2' => 2,
        '_MI_WFL_DISPLAYFORUM3' => 3,
        '_MI_WFL_DISPLAYFORUM4' => 4
    ]
];

// Notification
$modversion['hasNotification']             = 1;
$modversion['notification']['lookup_file'] = 'include/notification.inc.php';
$modversion['notification']['lookup_func'] = 'wflinks_notify_iteminfo';

$modversion['notification']['category'][] = [
    'name'           => 'global',
    'title'          => _MI_WFL_GLOBAL_NOTIFY,
    'description'    => _MI_WFL_GLOBAL_NOTIFYDSC,
    'subscribe_from' => ['index.php', 'viewcat.php', 'singlelink.php'],
];

$modversion['notification']['category'][] = [
    'name'           => 'category',
    'title'          => _MI_WFL_CATEGORY_NOTIFY,
    'description'    => _MI_WFL_CATEGORY_NOTIFYDSC,
    'subscribe_from' => ['viewcat.php', 'singlelink.php'],
    'item_name'      => 'cid',
    'allow_bookmark' => 1,
];

$modversion['notification']['category'][] = [
    'name'           => 'link',
    'title'          => _MI_WFL_LINK_NOTIFY,
    'description'    => _MI_WFL_FILE_NOTIFYDSC,
    'subscribe_from' => 'singlelink.php',
    'item_name'      => 'lid',
    'allow_bookmark' => 1,
];

$modversion['notification']['event'][] = [
    'name'          => 'new_category',
    'category'      => 'global',
    'title'         => _MI_WFL_GLOBAL_NEWCATEGORY_NOTIFY,
    'caption'       => _MI_WFL_GLOBAL_NEWCATEGORY_NOTIFYCAP,
    'description'   => _MI_WFL_GLOBAL_NEWCATEGORY_NOTIFYDSC,
    'mail_template' => 'global_newcategory_notify',
    'mail_subject'  => _MI_WFL_GLOBAL_NEWCATEGORY_NOTIFYSBJ,
];

$modversion['notification']['event'][] = [
    'name'          => 'link_modify',
    'category'      => 'global',
    'admin_only'    => 1,
    'title'         => _MI_WFL_GLOBAL_LINKMODIFY_NOTIFY,
    'caption'       => _MI_WFL_GLOBAL_LINKMODIFY_NOTIFYCAP,
    'description'   => _MI_WFL_GLOBAL_LINKMODIFY_NOTIFYDSC,
    'mail_template' => 'global_linkmodify_notify',
    'mail_subject'  => _MI_WFL_GLOBAL_LINKMODIFY_NOTIFYSBJ,
];

$modversion['notification']['event'][] = [
    'name'          => 'link_broken',
    'category'      => 'global',
    'admin_only'    => 1,
    'title'         => _MI_WFL_GLOBAL_LINKBROKEN_NOTIFY,
    'caption'       => _MI_WFL_GLOBAL_LINKBROKEN_NOTIFYCAP,
    'description'   => _MI_WFL_GLOBAL_LINKBROKEN_NOTIFYDSC,
    'mail_template' => 'global_linkbroken_notify',
    'mail_subject'  => _MI_WFL_GLOBAL_LINKBROKEN_NOTIFYSBJ,
];

$modversion['notification']['event'][] = [
    'name'          => 'link_submit',
    'category'      => 'global',
    'admin_only'    => 1,
    'title'         => _MI_WFL_GLOBAL_LINKSUBMIT_NOTIFY,
    'caption'       => _MI_WFL_GLOBAL_LINKSUBMIT_NOTIFYCAP,
    'description'   => _MI_WFL_GLOBAL_LINKSUBMIT_NOTIFYDSC,
    'mail_template' => 'global_linksubmit_notify',
    'mail_subject'  => _MI_WFL_GLOBAL_LINKSUBMIT_NOTIFYSBJ,
];

$modversion['notification']['event'][] = [
    'name'          => 'new_link',
    'category'      => 'global',
    'title'         => _MI_WFL_GLOBAL_NEWLINK_NOTIFY,
    'caption'       => _MI_WFL_GLOBAL_NEWLINK_NOTIFYCAP,
    'description'   => _MI_WFL_GLOBAL_NEWLINK_NOTIFYDSC,
    'mail_template' => 'global_newfile_notify',
    'mail_subject'  => _MI_WFL_GLOBAL_NEWLINK_NOTIFYSBJ,
];

$modversion['notification']['event'][] = [
    'name'          => 'link_submit',
    'category'      => 'category',
    'admin_only'    => 1,
    'title'         => _MI_WFL_CATEGORY_FILESUBMIT_NOTIFY,
    'caption'       => _MI_WFL_CATEGORY_FILESUBMIT_NOTIFYCAP,
    'description'   => _MI_WFL_CATEGORY_FILESUBMIT_NOTIFYDSC,
    'mail_template' => 'category_linksubmit_notify',
    'mail_subject'  => _MI_WFL_CATEGORY_FILESUBMIT_NOTIFYSBJ,
];

$modversion['notification']['event'][] = [
    'name'          => 'new_link',
    'category'      => 'category',
    'title'         => _MI_WFL_CATEGORY_NEWLINK_NOTIFY,
    'caption'       => _MI_WFL_CATEGORY_NEWLINK_NOTIFYCAP,
    'description'   => _MI_WFL_CATEGORY_NEWLINK_NOTIFYDSC,
    'mail_template' => 'category_newfile_notify',
    'mail_subject'  => _MI_WFL_CATEGORY_NEWLINK_NOTIFYSBJ,
];

$modversion['notification']['event'][] = [
    'name'          => 'approve',
    'category'      => 'link',
    'invisible'     => 1,
    'title'         => _MI_WFL_LINK_APPROVE_NOTIFY,
    'caption'       => _MI_WFL_LINK_APPROVE_NOTIFYCAP,
    'description'   => _MI_WFL_LINK_APPROVE_NOTIFYDSC,
    'mail_template' => 'link_approve_notify',
    'mail_subject'  => _MI_WFL_LINK_APPROVE_NOTIFYSBJ,
];
// On Update
if (!empty($_POST['fct']) && !empty($_POST['op']) && !empty($_POST['diranme']) && 'modulesadmin' === $_POST['fct']
    && 'update_ok' === $_POST['op']
    && $_POST['dirname'] == $modversion['dirname']) {
    include __DIR__ . '/include/onupdate.inc.php';
}
