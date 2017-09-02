<ul>
    <{foreach item=linkload from=$block.links}>
        <li>
            <a href="<{$xoops_url}>/modules/<{$linkload.dirname}>/singlelink.php?cid=<{$linkload.cid}>&amp;lid=<{$linkload.id}>"><{$linkload.title}></a>
            (<{$linkload.hits}>)
        </li>
    <{/foreach}>
</ul>
