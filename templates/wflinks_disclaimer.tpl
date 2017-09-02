<div align="center">
    <{$image_header}>
</div>

<h4><{$smarty.const._MD_WFL_DISCLAIMERAGREEMENT}></h4>

<div>
    <{if $link_disclaimer == true}>
        <{$linkdisclaimer}>
    <{elseif $link_disclaimer == false}>
        <{$disclaimer}>
    <{/if}>
</div>
<br>

<{if $link_disclaimer == true}>
<form action="visit.php" method="post">
    <{elseif $link_disclaimer == false}>
    <form action="submit.php" method="post">
        <{/if}>

        <div align="center">
            <b><{$smarty.const._MD_WFL_DOYOUAGREE}></b>
            <br><br>
            <input type='button' onclick='location="<{$agree_location}>"' class='formButton'
                   value='<{$smarty.const._MD_WFL_AGREE|escape:'quotes'}>'
                   alt='<{$smarty.const._MD_WFD_AGREE|escape:'quotes'}>'>&nbsp;
            <input type='button' onclick='location="<{$cancel_location}>"' class='formButton'
                   value='<{$smarty.const._CANCEL|escape:'quotes'}>' alt='<{$smarty.const._CANCEL|escape:'quotes'}>'>
            <{if $link_disclaimer == true}>
                <input type='hidden' name='lid' value='1'>
                <input type='hidden' name='cid' value='1'>
            <{/if}>
        </div>
    </form>
    <br><br>
