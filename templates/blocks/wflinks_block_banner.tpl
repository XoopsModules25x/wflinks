<div class="outer">
    <table border="0" cellspacing="1" cellpadding="0">
        <tr height="14px" class="even" style="font-weight: bold; font-size: smaller;">
            <td align="center"><{$smarty.const._MB_WFL_ID}></td>
            <td><{$smarty.const._MB_WFL_CLIENT}></td>
            <td align="center"><{$smarty.const._MB_WFL_BANNERID}></td>
            <td align="left"><{$smarty.const._MB_WFL_CATTITLE}></td>
            <td align="center"><{$smarty.const._MB_WFL_IMPMADE}></td>
            <td align="center"><{$smarty.const._MB_WFL_IMPLEFT}></td>
            <td align="center"><{$smarty.const._MB_WFL_CLICKS}></td>
            <td align="center"><{$smarty.const._MB_WFL_CLICKS}>%</td>
        </tr>
        <{foreach item=bannerload from=$block.banners}>
            <tr style="text-align: left; font-size: smaller;">
                <td class="even" align="center"><{$bannerload.cid}></td>
                <td class="odd"><{$bannerload.client}></td>
                <td class="odd" align="center"><{$bannerload.bid}></td>
                <td class="odd" align="left"><a
                            href="<{$xoops_url}>/modules/<{$bannerload.dirname}>/viewcat.php?cid=<{$bannerload.cat}>"><{$bannerload.cattitle}></a>
                </td>
                <td class="odd" align="center"><{$bannerload.impmade}></td>
                <td class="odd" align="center"><{$bannerload.impleft}></td>
                <td class="odd" align="center"><{$bannerload.clicks}></td>
                <td class="odd" align="center"><{$bannerload.percent}>%</td>
            </tr>
        <{/foreach}>
    </table>
</div>
