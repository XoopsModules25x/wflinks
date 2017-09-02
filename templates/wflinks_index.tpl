<{if $catarray.imageheader != ""}>
    <div style="padding-top: 12px; padding-bottom: 12px; text-align: center;"><{$catarray.imageheader}></div>
<{/if}>
<{if $catarray.indexheading != ""}>
    <h4 style="text-align: center;"><{$catarray.indexheading}></h4>
<{/if}>
<div style="padding-bottom: 12px; text-align: <{$catarray.indexheaderalign}>;"><{$catarray.indexheader}></div>
<div style="padding-bottom: 12px; text-align: center;" class="itemPermaLink"><{$catarray.letters}></div>
<div style="padding-bottom: 12px; text-align: center;"><{$catarray.toolbar}></div>

<{if count($categories) gt 0}>
    <div class="even" style="font-weight: bold;"><{$smarty.const._MD_WFL_MAINLISTING}></div>
    <table width="100%" cellspacing="1" cellpadding="3" summary='' style="text-align: center;">
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <!-- Start category loop -->
            <{foreach item=category from=$categories}>
            <td width="5%" style="text-align: center; ">
                <a href="<{$xoops_url}>/modules/<{$module_dir}>/viewcat.php?cid=<{$category.id}>"><img
                            src="<{$category.image}>" alt="<{$category.alttext}>" title="<{$category.alttext}>"
                            align="top"></a>
            </td>
            <td width="35%" style="text-align: left; vertical-align: text-top;">
                <a href="<{$xoops_url}>/modules/<{$module_dir}>/viewcat.php?cid=<{$category.id}>"><b><{$category.title}></b></a>&nbsp;(<{$category.totallinks}>
                )
                <{if $category.subcategories}>
                    <div style="margin-bottom: 3px; margin-left: 16px; font-size: smaller; vertical-align: top;"><{$category.subcategories}></div>
                <{/if}>
            </td>
            <{if $category.count is div by 2}>
        </tr>
        <tr> <{/if}> <{/foreach}>
            <!-- End category loop -->
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        <tr>
    </table>
    <div class="odd" style="text-align: left; font-size: smaller;"><{$lang_thereare}></div>
    <div style="padding-bottom: 12px; padding-top: 12px; text-align: right; font-size: smaller; vertical-align: middle;">
        <img src="<{$xoops_url}>/modules/<{$module_dir}>/assets/images/icon/linkload1_small.gif"
             title="<{$smarty.const._MD_WFL_LEGENDTEXTNEW}>" alt=""
             align="middle">&nbsp;<{$smarty.const._MD_WFL_LEGENDTEXTNEW}>
        <img src="<{$xoops_url}>/modules/<{$module_dir}>/assets/images/icon/linkload2_small.gif"
             title="<{$smarty.const._MD_WFL_LEGENDTEXTNEWTHREE}>" alt=""
             align="middle">&nbsp;<{$smarty.const._MD_WFL_LEGENDTEXTNEWTHREE}>
        <img src="<{$xoops_url}>/modules/<{$module_dir}>/assets/images/icon/linkload3_small.gif"
             title="<{$smarty.const._MD_WFL_LEGENDTEXTTHISWEEK}>" alt=""
             align="middle">&nbsp;<{$smarty.const._MD_WFL_LEGENDTEXTTHISWEEK}>
        <img src="<{$xoops_url}>/modules/<{$module_dir}>/assets/images/icon/linkload4_small.gif"
             title="<{$smarty.const._MD_WFL_LEGENDTEXTNEWLAST}>" alt=""
             align="middle">&nbsp;<{$smarty.const._MD_WFL_LEGENDTEXTNEWLAST}>
    </div>
<{/if}>
<div style="padding-bottom: 12px; text-align: <{$catarray.indexfooteralign}>;"><{$catarray.indexfooter}></div>

<{if $showlatest}>
    <br>
    <br>
    <div class="odd" style="font-size: larger; font-weight: bold;"><{$smarty.const._MD_WFL_LATESTLIST}></div>
    <br>
    <{if $pagenav}>
        <div><{$pagenav}></div>
        <br>
    <{/if}>
    <table width="100%" cellspacing="0" cellpadding="10" border="0">
        <tr>
            <td width="100%">
                <!-- Start link loop -->
                <{section name=i loop=$link}>
                    <{include file="db:wflinks_linkload.tpl" wfllink=$link[i]}>
                <{/section}>
                <!-- End link loop -->
            </td>
        </tr>
    </table>
    <{if $pagenav}>
        <div align="right"><{$pagenav}></div>
    <{/if}>
<{/if}>

<{include file="db:system_notification_select.tpl"}>
