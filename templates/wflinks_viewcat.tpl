<{if $catarray.imageheader != ""}>
    <br>
    <div align="center"><{$catarray.imageheader}></div>
    <br>
<{/if}>
<div><{$description}></div><br>

<div align="center" class="itemPermaLink"><{$catarray.letters}></div><br>
<div align="center"><{$catarray.toolbar}></div><br>
<div class="even" style="font-size: smaller;"><b><{$category_path}></b></div><br>
<{if $subcategories}>
    <fieldset>
        <legend style="font-weight: bold; color: #639ACE;"><{$smarty.const._MD_WFL_SUBCATLISTING}></legend>
        <div align="left" style="margin-left: 5px; padding: 0;">
            <table width="80%">
                <tr>
                    <{foreach item=subcat from=$subcategories}>
                    <td><a href="viewcat.php?cid=<{$subcat.id}>"><img src="<{$subcat.image}>" alt="<{$subcat.alttext}>"
                                                                      title="<{$subcat.alttext}>" align="top"></a> <a
                                href="viewcat.php?cid=<{$subcat.id}>"><{$subcat.title}></a>&nbsp;(<{$subcat.totallinks}>
                        )<br>
                        <{if $subcat.infercategories}>
                            &nbsp;&nbsp;<{$subcat.infercategories}>
                        <{/if}>
                    </td>
                    <{if $subcat.count is div by 2}>
                </tr>
                <tr>
                    <{/if}>
                    <{/foreach}>
                </tr>
            </table>
        </div>
    </fieldset>
    <br>
<{/if}>

<{if $show_links == true}>
    <div style="text-align:center;">
        <small>
            <b><{$smarty.const._MD_WFL_SORTBY}></b>&nbsp;<{$smarty.const._MD_WFL_TITLE}> (
            <a href="viewcat.php?cid=<{$category_id}>&orderby=titleA">
                <img src="assets/images/up.gif" alt="" align="absmiddle"></a>
            <a href="viewcat.php?cid=<{$category_id}>&orderby=titleD">
                <img src="assets/images/down.gif" alt="" align="absmiddle"></a>
            )
            &nbsp;
            <{$smarty.const._MD_WFL_DATE}> (
            <a href="viewcat.php?cid=<{$category_id}>&orderby=dateA">
                <img src="assets/images/up.gif" alt="" align="absmiddle"></a>
            <a href="viewcat.php?cid=<{$category_id}>&orderby=dateD">
                <img src="assets/images/down.gif" alt="" align="absmiddle"></a>
            )
            &nbsp;
            <{$smarty.const._MD_WFL_RATING}> (
            <a href="viewcat.php?cid=<{$category_id}>&orderby=ratingA">
                <img src="assets/images/up.gif" alt="" align="absmiddle"></a>
            <a href="viewcat.php?cid=<{$category_id}>&orderby=ratingD">
                <img src="assets/images/down.gif" alt="" align="absmiddle"></a>
            )
            &nbsp;
            <{$smarty.const._MD_WFL_POPULARITY}> (
            <a href="viewcat.php?cid=<{$category_id}>&orderby=hitsA">
                <img src="assets/images/up.gif" alt="" align="absmiddle"></a>
            <a href="viewcat.php?cid=<{$category_id}>&orderby=hitsD">
                <img src="assets/images/down.gif" alt="" align="absmiddle"></a>
            )
            &nbsp;
            <{$smarty.const._MD_WFL_COUNTRYSORT}> (
            <a href="viewcat.php?cid=<{$category_id}>&orderby=countryA">
                <img src="assets/images/up.gif" alt="" align="absmiddle"></a>
            <a href="viewcat.php?cid=<{$category_id}>&orderby=countryD">
                <img src="assets/images/down.gif" alt="" align="absmiddle"></a>
            )
            <br>
            <b><{$lang_cursortedby}></b><br><br>
        </small>
    </div>
    <br>
<{/if}>

<{if $page_nav == true}>
    <div><{$pagenav}></div>
    <br>
<{/if}>

<table width="100%" cellspacing="0" cellpadding="10" border="0">
    <tr>
        <td width="100%">
            <!-- Start link loop -->
            <{section name=i loop=$wfllink}>
                <{include file="db:wflinks_linkload.tpl" wfllink=$wfllink[i]}>
            <{/section}>
            <!-- End link loop -->
        </td>
    </tr>
</table>

<{if $page_nav == true}>
    <div align="right"><{$pagenav}></div>
<{/if}>

<{include file="db:system_notification_select.tpl"}>
