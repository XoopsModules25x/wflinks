<{if $catarray.imageheader != ""}>
    <br>
    <div style="padding-bottom: 12px; text-align: center;"><{$catarray.imageheader}></div>
<{/if}> <br>
<!-- <div style="padding-bottom: 12px; text-align: center;" class="itemPermaLink"><{$catarray.letters}></div>
<div style="padding-bottom: 12px; text-align: center;"><{$catarray.toolbar}></div> -->
<div><h2><{$smarty.const._MD_WFL_NEWLINKS}></h2></div>

<table width="100%" border="0" cellspacing="2" cellpadding="0">
    <tr>
        <td height="5" colspan="2" class="even"><b><{$smarty.const._MD_WFL_TOTALNEWLINKS}>:</b></td>
        <td width="60%">&nbsp;</td>
    </tr>
    <tr>
        <td width="30%" class="odd"><{$smarty.const._MD_WFL_LASTWEEK}></td>
        <td width="10%" class="odd"><{$allweeklinks}></td>
        <td width="60%">&nbsp;</td>
    </tr>
    <tr>
        <td width="30%" class="odd"><{$smarty.const._MD_WFL_LAST30DAYS}></td>
        <td width="10%" class="odd"><{$allmonthlinks}></td>
        <td width="60%">&nbsp;</td>
    </tr>
</table>
<br>
<table border="0" cellspacing="2" cellpadding="0" style="white-space: nowrap;">
    <tr>
        <td class="even" width="50" align="left"><b><{$smarty.const._MD_WFL_SHOW}>:</b></td>
        <td class="odd" style="text-align: center; white-space: nowrap;"><a
                    href="<{$xoops_url}>/modules/<{$module_dir}>/newlist.php?newlinkshowdays=7"><{$smarty.const._MD_WFL_1WEEK}></a>
        </td>
        <td class="odd" style="text-align: center; white-space: nowrap;"><a
                    href="<{$xoops_url}>/modules/<{$module_dir}>/newlist.php?newlinkshowdays=14"><{$smarty.const._MD_WFL_2WEEKS}></a>
        </td>
        <td class="odd" style="text-align: center; white-space: nowrap;"><a
                    href="<{$xoops_url}>/modules/<{$module_dir}>/newlist.php?newlinkshowdays=30"><{$smarty.const._MD_WFL_30DAYS}></a>
        </td>
        <td width="525" align="center">&nbsp;</td>
    </tr>
</table>

<br>

<table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tr>
        <td class="even" width="230">
            <b><{$smarty.const._MD_WFL_DTOTALFORLAST}> <{$newlinkshowdays}> <{$smarty.const._MD_WFL_DAYS}></b></td>
        <td>&nbsp;</td>
    </tr>
</table>

<{if count($dailylinks) gt 0}>
    <!-- Start day loop -->
    <{foreach item=dailylink from=$dailylinks}>
        <table width="100%" border="0" cellspacing="1" cellpadding="0">
            <tr>
                <td class="odd" width="199"><a
                            href="<{$xoops_url}>/modules/<{$module_dir}>/viewcat.php?selectdate=<{$dailylink.newlinkdayRaw}>"><{$dailylink.newlinkView}></a>
                </td>
                <td class="odd" width="20" align="center"><{$dailylink.totallinks}></td>
                <td>&nbsp;</td>
            </tr>
        </table>
    <{/foreach}>
    <!-- End day loop -->

    <!-- <h4><{$smarty.const._MD_WFL_LATESTLIST}></h4> -->
    <table width="100%" cellspacing="0" cellpadding="2" border="0">
        <tr>
            <td width="100%">
                <!-- Start link loop -->
                <{section name=i loop=$link}>
                    <{include file="db:wflinks_linkload.tpl" link=$link[i]}>
                <{/section}>
                <!-- End link loop -->
            </td>
        </tr>
    </table>
<{/if}>
