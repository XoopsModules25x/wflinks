<{if $show_categort_title == true}>
    <div style="margin-bottom: 4px;"><b><{$smarty.const._MD_WFL_CATEGORYC}></b><{$wfllink.category}></div>
<{/if}>
<table width="100%" cellspacing="0" cellpadding="2">
    <tr>
        <td align="left"><a
                    href="<{$xoops_url}>/modules/<{$wfllink.module_dir}>/visit.php?cid=<{$wfllink.cid}>&amp;lid=<{$wfllink.id}>"
                    target="_blank"><{$wfllink.title}></a> <{$wfllink.icons}></td>
        <{if $wfllink.published > 0 }>
            <td align="right"><a
                        href="<{$xoops_url}>/modules/<{$wfllink.module_dir}>/singlelink.php?cid=<{$wfllink.cid}>&amp;lid=<{$wfllink.id}>"><span
                            class="itemTitle style4"><{$smarty.const._MD_WFL_VIEWDETAILS}></span></a></td>
        <{/if}>
    </tr>

    <tr>
        <td height="1" colspan="2" bgcolor="#000000"></td>
    </tr>
    <tr>
        <td colspan="2">
            <table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr class="even">
                    <td width="65%">
                        <small><b><{$smarty.const._MD_WFL_SUBMITTER}>
                                :</b> <{$wfllink.submitter}> <{if $xoops_isadmin}><{$wfllink.adminlink}> <{/if}></small>
                    </td>
                    <td>
                        <div align="right">
                            <small><b><{$lang_subdate}>:</b>&nbsp;&nbsp;<{$wfllink.updated}></small>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td width="65%"
                        valign="top"> <{if $wfllink.autoscrshot == 0}> <{if $show_screenshot == true}> <{if $wfllink.screenshot_full != ''}>
                            <div>
                                <a href="<{$xoops_url}>/modules/<{$wfllink.module_dir}>/visit.php?cid=<{$wfllink.cid}>&amp;lid=<{$wfllink.id}>"
                                   target="_blank"><img
                                            src="<{$wfllink.screenshot_thumb}>" alt="" hspace="7" vspace="3" border="0"
                                            align="right"></a></div>
                        <{/if}> <{/if}> <{/if}>
                        <{if $wfllink.autoscrshot == 1}>
                            <div>
                                <a href="<{$xoops_url}>/modules/<{$wfllink.module_dir}>/visit.php?cid=<{$wfllink.cid}>&lid=<{$wfllink.id}>"
                                   target="_blank"><img
                                            src="https://blinky.nemui.org/shot/large?<{$wfllink.url}>"
                                            align="right"></a></div>
                        <{/if}>
                        <div style="margin-left: 6px;" align="left">
                            <a href="<{$xoops_url}>/modules/<{$wfllink.module_dir}>/visit.php?cid=<{$wfllink.cid}>&amp;lid=<{$wfllink.id}>"
                               target="_blank">
                                <img src="<{$xoops_url}>/modules/<{$wfllink.module_dir}>/assets/images/icon/links.gif"
                                     alt="" align="absmiddle">
                            </a>&nbsp;
                            <a href="<{$xoops_url}>/modules/<{$wfllink.module_dir}>/visit.php?cid=<{$wfllink.cid}>&amp;lid=<{$wfllink.id}>"
                               target="_blank">
                                <{$smarty.const._MD_WFL_LINKNOW}>
                            </a></div>
                        <br>
                        <div><b><{$smarty.const._MD_WFL_DESCRIPTIONC}></b><br>
                            <{$wfllink.description}></div>
                    </td>
                    <td width="35%">
                        <div class="outer style2"
                             style="margin-left: 10px; margin-right: 10px; padding: 4px; background-color:#E6E6E6; border-color:#999999;">
                            <div>
                                <small><b><{$smarty.const._MD_WFL_PUBLISHER}>:</b>&nbsp;<{$wfllink.publisher}></small>
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
                                    &nbsp;<img
                                            src="<{$xoops_url}>/modules/<{$wfllink.module_dir}>/assets/images/icon/pr<{$wfllink.pagerank}>.png"
                                            alt="<{$smarty.const._MD_WFL_PAGERANKALT}><{$wfllink.pagerank}>"
                                            title="<{$smarty.const._MD_WFL_PAGERANKALT}><{$wfllink.pagerank}>"
                                            align="absmiddle">&nbsp;
                                    <small>(<{$wfllink.pagerank}>/10)</small>
                                </div>
                            <{/if}>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" valign="top">&nbsp;</td>
                </tr>
                <{if $wfllink.published == 0 }>
                    <tr>
                        <td colspan="2" valign="top">
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
                <{/if}>
            </table>
    </tr>

    <{if $wfllink.quickview}>
        <script language="javascript"
                src="<{$xoops_url}>/modules/<{$wfllink.module_dir}>/include/quickview.js"></script>
        <tr>
            <td class="even" colspan="2" align="center" valign="center" style="padding-bottom: 3px;">
                <i>
                    <small>
                        <script>
                            ppreview("<{$xoops_url}>/modules/<{$wfllink.module_dir}>/visit.php?cid=<{$wfllink.cid}>&amp;lid=<{$wfllink.id}>",<{$wfllink.id}>);
                            potherfunctions("<{$xoops_url}>/modules/<{$wfllink.module_dir}>/visit.php?cid=<{$wfllink.cid}>&amp;lid=<{$wfllink.id}>",<{$wfllink.id}>, '');
                        </script>
                    </small>
                </i>
            </td>
        </tr>
        <tr>
            <td height="1" colspan="2" bgcolor="#000000"></td>
        </tr>
    <{/if}>
</table><br>
