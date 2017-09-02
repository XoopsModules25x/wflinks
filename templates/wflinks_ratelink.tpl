<{if $catarray.imageheader != ""}>
    <br>
    <div style="padding-bottom: 12px; text-align: center;"><{$catarray.imageheader}></div>
<{/if}>
<div style="padding-bottom: 12px; text-align: center;" class="itemPermaLink"><{$catarray.letters}></div>
<div style="padding-bottom: 12px; text-align: center;"><{$catarray.toolbar}></div>

<table border="0" cellpadding="1" cellspacing="2" width="80%" align="center">
    <tr>
        <td>
            <ul>
                <li><{$smarty.const._MD_WFL_VOTEONCE}></li>
                <li><{$smarty.const._MD_WFL_RATINGSCALE}></li>
                <li><{$smarty.const._MD_WFL_BEOBJECTIVE}></li>
                <li><{$smarty.const._MD_WFL_DONOTVOTE}></li>
            </ul>
        </td>
    </tr>
    <tr>
        <td align="center">
            <div><b><{$smarty.const._MD_WFL_VOTEFORTITLE}>: <{$link.title}></b></div>
            <br>
            <form method="post" action="ratelink.php">
                <{securityToken}><{*//mb*}>
                <input type="hidden" name="lid" value="<{$link.id}>">
                <input type="hidden" name="cid" value="<{$link.cid}>">
                <input type="hidden" name="title" value="<{$link.title}>">
                <select name="rating">
                    <option>--</option>
                    <option>10</option>
                    <option>9</option>
                    <option>8</option>
                    <option>7</option>
                    <option>6</option>
                    <option>5</option>
                    <option>4</option>
                    <option>3</option>
                    <option>2</option>
                    <option>1</option>
                </select>&nbsp;&nbsp;
                <input type="submit" name="submit" value="<{$smarty.const._MD_WFL_RATEIT}>"
                       alt="<{$smarty.const._MD_WFL_RATEIT}>"> <input type="button" value="<{$smarty.const._CANCEL}>"
                                                                       alt="<{$smarty.const._CANCEL}>"
                                                                       onclick="location='<{$xoops_url}>/modules/<{$module_dir}>/singlelink.php?cid=<{$link.cid}>&amp;lid=<{$link.id}>'">
            </form>
        </td>
    </tr>
</table>
