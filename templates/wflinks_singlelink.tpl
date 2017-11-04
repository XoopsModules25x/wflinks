<style type="text/css">
    div.wflinks_socbookmark a img {
        opacity: .4;
        -moz-opacity: .4;
        filter: alpha(opacity=40);
    }

    div.wflinks_socbookmark a:hover img {
        opacity: 1;
        -moz-opacity: 1;
        filter: alpha(opacity=100);
    }
</style>

<{if $wfllink.imageheader != ""}>
    <div style="text-align: center; line-height: 120%; padding-bottom: 12px;"><{$wfllink.imageheader}></div>
<{/if}>
<div>&nbsp;</div>
<div>
    <div style="float: left; margin-left: 4px; font-size: smaller;"><{$wfllink.path}></div>
    <div style="float: right; margin-right: 4px;"><{$back}></div>
</div>
<div>&nbsp;</div>

<h4 class='even' style="width: 100%; color: #2F5376;"><a
            href="<{$xoops_url}>/modules/<{$wfllink.module_dir}>/visit.php?cid=<{$wfllink.cid}>&amp;lid=<{$wfllink.id}>"
            target="_blank"><{$wfllink.title}></a>&nbsp;<{$wfllink.icons}><{if $xoops_isadmin}>&nbsp;<{$wfllink.adminlink}><{/if}>
</h4>


<table width="100%" cellspacing="0" cellpadding="2">
    <tr>
        <td colspan="2">
            <table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                    <td width="65%" valign="top">
                        <div style="margin-left: 6px; text-align: left; padding-bottom: 12px;">
                            <a href="<{$xoops_url}>/modules/<{$wfllink.module_dir}>/visit.php?cid=<{$wfllink.cid}>&amp;lid=<{$wfllink.id}>"
                               target="_blank">
                                <img src="<{$xoops_url}>/modules/<{$wfllink.module_dir}>/assets/images/icon/links.gif"
                                     alt="" align="absmiddle"> </a>&nbsp;
                            <a href="<{$xoops_url}>/modules/<{$wfllink.module_dir}>/visit.php?cid=<{$wfllink.cid}>&amp;lid=<{$wfllink.id}>"
                               target="_blank">
                                <{$smarty.const._MD_WFL_LINKNOW}>          </a>
                            <{if $wfllink.forumid > 0}>
                                &nbsp;
                                <a href="<{$xoops_url}><{$wfllink.forum_path}>"><img
                                            src="<{$xoops_url}>/modules/<{$wfllink.module_dir}>/assets/images/icon/forum.png"
                                            title="<{$smarty.const._MD_WFL_INFORUM}>"
                                            alt="<{$smarty.const._MD_WFL_INFORUM}>" border="0"
                                            align="absmiddle"></a>
                                <a href="<{$xoops_url}><{$wfllink.forum_path}>"><{$smarty.const._MD_WFL_INFORUM}></a>
                            <{/if}>        </div>
                        <div style="margin-left: 6px;"><b><{$smarty.const._MD_WFL_DESCRIPTIONC}></b><br>
                            <{$wfllink.description2}></div>
                        <br>
                        <{if $wfllink.addryn == 1}>
                            <div style="margin-left: 6px; text-align: left; padding: 1px;">
                                <div style="float: left;"><{$contactdetails}><{$wfllink.address}>
                                    <{$wfllink.tel}><{$wfllink.mobile}><{$wfllink.voip}><{$wfllink.fax}><{$wfllink.email}><{$vcard}><{$wfllink.vat}></div>
                            </div>
                        <{/if}>
                        <{if $wfllink.googlemap || $wfllink.yahoomap || $wfllink.multimap == true}>
                            <div style="clear: both; margin-left: 6px; text-align: left; white-space: nowrap; padding: 3px;"><{$wfllink.googlemap}><{$wfllink.yahoomap}><{$wfllink.multimap}></div>
                        <{/if}>
                        <br>
                    </td>
                    <td width="35%">
                        <div class="outer"
                             style="margin-left: 10px; margin-right: 10px; padding: 4px; background-color:#E6E6E6; border-color:#999999;">
                            <div>
                                <small><b><{$smarty.const._MD_WFL_SUBMITTER}>:</b>&nbsp;<{$wfllink.submitter}></small>
                            </div>
                            <div>
                                <small><b><{$smarty.const._MD_WFL_PUBLISHER}>:</b>&nbsp;<{$wfllink.publisher}></small>
                            </div>
                            <div>
                                <small><b><{$lang_subdate}>:</b>&nbsp;<{$wfllink.updated|wordwrap:50:"\n":true}></small>
                            </div>
                            <div>
                                <small><{$wfllink.hits|wordwrap:50:"\n":true}></small>
                            </div>
                            <div>
                                <small><{$smarty.const._MD_WFL_COUNTRYB}>&nbsp;</small>
                                <img src="<{$wfllink.country}>" alt="<{$wfllink.countryname}>"
                                     title="<{$wfllink.countryname}>" align="absmiddle"></div>
                        </div>
                        <br>
                        <div style="margin-left: 10px; margin-right: 10px; padding: 4px;" class="outer">
                            <div>
                                <small><b><{$smarty.const._MD_WFL_RATINGC}></b>&nbsp;<img
                                            src="<{$xoops_url}>/modules/<{$wfllink.module_dir}>/assets/images/icon/<{$wfllink.rateimg}>"
                                            alt=""
                                            align="absmiddle">&nbsp;&nbsp;(<{$wfllink.votes}>)
                                </small>
                            </div>
                            <{if $wfllink.showpagerank > 0}>
                                <br>
                                <div>
                                    <small><b><{$smarty.const._MD_WFL_PAGERANK}></b></small>
                                    <img src="<{$xoops_url}>/modules/<{$wfllink.module_dir}>/assets/images/icon/pr<{$wfllink.pagerank}>.png"
                                         alt="<{$smarty.const._MD_WFL_PAGERANKALT}><{$wfllink.pagerank}>"
                                         title="<{$smarty.const._MD_WFL_PAGERANKALT}><{$wfllink.pagerank}>"
                                         align="absmiddle">&nbsp;
                                    <small>(<{$wfllink.pagerank}>/10)</small>
                                </div>
                            <{/if}>          </div>
                        <br>
                        <{if $tagbar}>
                            <div style="margin-left: 10px; margin-right: 10px; padding: 4px; font-size: smaller;"
                                 class="outer">
                                <{include file="db:tag_bar.tpl"}>               </div>
                        <{/if}>
                        <br>
                        <div>
                            &nbsp;</div> <{if $wfllink.autoscrshot == 0}> <{if $show_screenshot == true}> <{if $wfllink.screenshot_full != ''}>
                            <div>
                                <div align="center"><a href="<{$xoops_url}>/<{$shots_dir}>/<{$wfllink.screenshot_full}>"
                                                       target="_blank"><img src="<{$wfllink.screenshot_thumb}>" alt=""
                                                                            vspace="3"
                                                                            hspace="7" align="middle"></a></div>
                            </div>
                        <{/if}><{/if}><{/if}>
                        <{if $wfllink.autoscrshot == 1}>
                            <div align="center"><a
                                        href="<{$xoops_url}>/modules/<{$wfllink.module_dir}>/visit.php?cid=<{$wfllink.cid}>&lid=<{$wfllink.id}>"
                                        target="_blank"><img
                                            src="https://blinky.nemui.org/shot/xlarge?<{$wfllink.url}>"
                                            align="middle" alt=""></a></div>
                        <{/if}>      </td>
                </tr>
                <tr>
                    <td colspan="2" valign="top"></td>
                </tr>

                <{if $wfllink.showsbookmarx > 0}>
                    <tr>
                        <td width="65%"
                            style="vertical-align: middle; text-align: center; padding-top: 25px; padding-bottom: 5px;">
                            <div class="wflinks_socbookmark"><{$wfllink.sbmarks}></div>
                        </td>
                        <td width="35%">&nbsp;</td>
                    </tr>
                <{/if}>

                <tr>
                    <td colspan="2" class="even" style="vertical-align: top; text-align: center;">
                        <div class="even" align="center">
                            <small>
                                [&nbsp;
                                <{if $wfllink.allow_rating}>
                                    <{$ratethislink}>&nbsp;|&nbsp;
                                <{/if}>
                                <{$reportbroken}>&nbsp;|&nbsp;
                                <{if $wfllink.useradminlink}>
                                    <{$wfllink.usermodify}>
                                <{/if}>
                                <{$mailto}>
                                <{if $wfllink.comment_rules > 0}>
                                    &nbsp;|&nbsp;<{$commentz}>
                                <{/if}>
                                &nbsp;|&nbsp;<{$print}>&nbsp;]
                            </small>
                        </div>
                    </td>
                </tr>
            </table>
    </tr>
</table>
<{if $wfllink.otherlinx > 0}>
    <br>
    <{$other_links}>
    <{foreach item=link_user from=$link_uid}>
        <div style="margin-left: 10px;"><a
                    href="<{$xoops_url}>/modules/<{$wfllink.module_dir}>/singlelink.php?cid=<{$link_user.cid}>&amp;lid=<{$link_user.lid}>"><{$link_user.title}></a>
            (<{$link_user.published}>)
        </div>
    <{/foreach}>
<{/if}>
<br>
<div align="center"><{$lang_copyright}></div>
<div style="text-align: center; padding: 3px; margin:3px;">
    <{$commentsnav}> <{$lang_notice}>

</div>
<!-- start comments loop -->
<{if $comment_mode == "flat"}>
    <{include file="db:system_comments_flat.tpl"}>
<{elseif $comment_mode == "thread"}>
    <{include file="db:system_comments_thread.tpl"}>
<{elseif $comment_mode == "nest"}>
    <{include file="db:system_comments_nest.tpl"}>
<{/if}>
<!-- end comments loop -->

<{include file="db:system_notification_select.tpl"}>
