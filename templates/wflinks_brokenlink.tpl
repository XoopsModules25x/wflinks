<{if $catarray.imageheader != ""}>
    <div style="padding-top: 12px; padding-bottom: 12px; text-align: center;"><{$catarray.imageheader}></div>
<{/if}>
<div style="padding-bottom: 12px; text-align: center;" class="itemPermaLink"><{$catarray.letters}></div>
<div style="padding-bottom: 12px; text-align: center;"><{$catarray.toolbar}></div>

<{if $brokenreport == true}>
    <div align="left">
        <h4><{$smarty.const._MD_WFL_RESOURCEREPORTED}></h4>
        <div align="center">
            <h4><{$smarty.const._MD_WFL_RESOURCEREPORTED}></h4>
            <div><{$smarty.const._MD_WFL_RESOURCEREPORTED}></div>
            <br>
            <div><b><{$smarty.const._MD_WFL_FILETITLE}></b><{$broken.title}></div>
            <div><b><{$smarty.const._MD_WFL_RESOURCEID}></b><{$broken.id}></div>
            <div><b><{$smarty.const._MD_WFL_REPORTER}></b> <{$broken.reporter}></div>
            <div><b><{$smarty.const._MD_WFL_DATEREPORTED}></b> <{$broken.date}></div>
            <br>
            <div><b><{$smarty.const._MD_WFL_WEBMASTERACKNOW}></b> <{$broken.acknowledged}></div>
            <div><b><{$smarty.const._MD_WFL_WEBMASTERCONFIRM}></b> <{$broken.confirmed}></div>
        </div>
    </div>
<{else}>
    <div align="left">
        <h4><{$smarty.const._MD_WFL_BROKENREPORT}></h4>
        <div><{$smarty.const._MD_WFL_THANKSFORHELP}></div>
        <div><{$smarty.const._MD_WFL_FORSECURITY}></div>
        <br>
        <div><{$smarty.const._MD_WFL_BEFORESUBMIT}></div>
        <br>
        <div align="center">
            <div><b><{$smarty.const._MD_WFL_FILETITLE}></b><{$link.title}></div>
            <div><b><{$smarty.const._MD_WFL_PUBLISHER}>:</b> <{$link.publisher}></div>
            <div><b><{$lang_subdate}>:</b> <{$link.updated}></div>
            <br>
            <form action="brokenlink.php" method="POST">
                <{securityToken}><{*//mb*}>
                <input type="hidden" name="lid" value="<{$link_id}>">
                <input type="hidden" name="title" value="<{$link.title}>">
                <input type="submit" name="op" value="<{$smarty.const._MD_WFL_SUBMITBROKEN}>"
                       alt="<{$smarty.const._MD_WFL_SUBMITBROKEN}>">
                &nbsp;<input type="button" value="<{$smarty.const._MD_WFL_CANCEL}>"
                             alt="<{$smarty.const._MD_WFL_CANCEL}>" onclick="history.go(-1)">
            </form>
        </div>
    </div>
<{/if}>
