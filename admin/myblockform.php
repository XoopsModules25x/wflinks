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

// defined('XOOPS_ROOT_PATH') || die('Restricted access');

require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
$form = new \XoopsThemeForm($block['form_title'], 'blockform', 'admin.php');
if (isset($block['name'])) {
    $form->addElement(new \XoopsFormLabel(_AM_NAME, $block['name']));
}
$side_select = new \XoopsFormSelect(_AM_BLKTYPE, 'bside', $block['side']);
$side_select->addOptionArray([
                                 1 => _AM_SBLEFT,
                                 2 => _AM_SBRIGHT,
                                 3 => _AM_CBLEFT,
                                 5 => _AM_CBRIGHT,
                                 4 => _AM_CBCENTER,
                                 6 => _AM_CBBOTTOMLEFT,
                                 7 => _AM_CBBOTTOM,
                                 8 => _AM_CBBOTTOMRIGHT
                             ]);
$form->addElement($side_select);
$form->addElement(new \XoopsFormText(_AM_WEIGHT, 'bweight', 2, 5, $block['weight']));
$form->addElement(new \XoopsFormRadioYN(_AM_VISIBLE, 'bvisible', $block['visible']));
$mod_select = new \XoopsFormSelect(_AM_VISIBLEIN, 'bmodule', $block['modules'], 5, true);
/** @var XoopsModuleHandler $moduleHandler */
$moduleHandler = xoops_getHandler('module');
$criteria      = new \CriteriaCompo(new \Criteria('hasmain', 1));
$criteria->add(new \Criteria('isactive', 1));
$module_list     = $moduleHandler->getList($criteria);
$module_list[-1] = _AM_TOPPAGE;
$module_list[0]  = _AM_ALLPAGES;
ksort($module_list);
$mod_select->addOptionArray($module_list);
$form->addElement($mod_select);
$form->addElement(new \XoopsFormText(_AM_TITLE, 'btitle', 50, 255, $block['title']), false);
if ($block['is_custom']) {
    $textarea = new \XoopsFormDhtmlTextArea(_AM_CONTENT, 'bcontent', $block['content'], 15, 70);
    $textarea->setDescription('<span style="font-size:x-small;font-weight:bold;">' . _AM_USEFULTAGS . '</span><br><span style="font-size:x-small;font-weight:normal;">' . sprintf(_AM_BLOCKTAG1, '{X_SITEURL}', XOOPS_URL . '/') . '</span>');
    $form->addElement($textarea, true);
    $ctype_select = new \XoopsFormSelect(_AM_CTYPE, 'bctype', $block['ctype']);
    $ctype_select->addOptionArray(['H' => _AM_HTML, 'P' => _AM_PHP, 'S' => _AM_AFWSMILE, 'T' => _AM_AFNOSMILE]);
    $form->addElement($ctype_select);
} else {
    if (!defined('XOOPS_ORETEKI') && '' !== $block['template']) {
        $tplfileHandler = xoops_getHandler('tplfile');
        $btemplate      = $tplfileHandler->find($GLOBALS['xoopsConfig']['template_set'], 'block', $block['bid']);
        if (count($btemplate) > 0) {
            $form->addElement(new \XoopsFormLabel(_AM_CONTENT, '<a href="' . XOOPS_URL . '/modules/system/admin.php?fct=tplsets&op=edittpl&id=' . $btemplate[0]->getVar('tpl_id') . '">' . _AM_EDITTPL . '</a>'));
        } else {
            $btemplate2 = $tplfileHandler->find('default', 'block', $block['bid']);
            if (count($btemplate2) > 0) {
                $form->addElement(new \XoopsFormLabel(_AM_CONTENT, '<a href="' . XOOPS_URL . '/modules/system/admin.php?fct=tplsets&op=edittpl&id=' . $btemplate2[0]->getVar('tpl_id') . '" target="_blank">' . _AM_EDITTPL . '</a>'));
            }
        }
    }
    if (false !== $block['edit_form']) {
        $form->addElement(new \XoopsFormLabel(_AM_OPTIONS, $block['edit_form']));
    }
}
$cache_select = new \XoopsFormSelect(_AM_BCACHETIME, 'bcachetime', $block['cachetime']);
$cache_select->addOptionArray([
                                  '0'       => _NOCACHE,
                                  '30'      => sprintf(_SECONDS, 30),
                                  '60'      => _MINUTE,
                                  '300'     => sprintf(_MINUTES, 5),
                                  '1800'    => sprintf(_MINUTES, 30),
                                  '3600'    => _HOUR,
                                  '18000'   => sprintf(_HOURS, 5),
                                  '86400'   => _DAY,
                                  '259200'  => sprintf(_DAYS, 3),
                                  '604800'  => _WEEK,
                                  '2592000' => _MONTH
                              ]);
$form->addElement($cache_select);
if (isset($block['bid'])) {
    $form->addElement(new \XoopsFormHidden('bid', $block['bid']));
}
// $form -> addElement(new \XoopsFormHidden('options', $block['options']));
$form->addElement(new \XoopsFormHidden('op', $block['op']));
$form->addElement(new \XoopsFormHidden('fct', 'blocksadmin'));
$button_tray = new \XoopsFormElementTray('', '&nbsp;');
if ($block['is_custom']) {
    $button_tray->addElement(new \XoopsFormButton('', 'previewblock', _PREVIEW, 'submit'));
}
$button_tray->addElement(new \XoopsFormButton('', 'submitblock', $block['submit_button'], 'submit'));
$form->addElement($button_tray);
