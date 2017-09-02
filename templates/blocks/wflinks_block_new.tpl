<ul>
    <{foreach item=linkload from=$block.links}>
        <div>&bull;&nbsp;<a
                    href="<{$xoops_url}>/modules/<{$linkload.dirname}>/singlelink.php?cid=<{$linkload.cid}>&amp;lid=<{$linkload.id}>"><{$linkload.title}></a>
            (<{$linkload.date}>)
        </div>
    <{/foreach}>
</ul>
