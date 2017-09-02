<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<{$xoops_langcode}>" lang="<{$xoops_langcode}>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta http-equiv="content-language" content="<{$xoops_langcode}>">
    <meta name="robots" content="noindex,nofollow">
    <meta name="keywords" content="<{$xoops_meta_keywords}>">
    <meta name="description" content="<{$xoops_meta_description}>">
    <meta name="author" content="<{$xoops_meta_author}>">
    <meta name="copyright" content="<{$xoops_meta_copyright}>">
    <meta name="generator" content="<{$xoops_sitename}>">
    <title><{$printtitle}></title>
</head>

<body style="font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 12px;" bgcolor="#ffffff" text="#000000">
<script for=window event=onload language="javascript">
    window.print();
</script>

<div style="width: 650px; padding: 20px;">
    <div style="text-align: left; display: block; margin: 0 0 6px 0;">
        <div style="text-align: center;"><{$printlogo}></div>
        <div>&nbsp;</div>
        <div style="margin-top: 10px; background-color: #E8E6E2; padding: 4px;"><{$lang_category}>
            : <{$printcategoryname}></div>
        <br>
        <div style="padding-top: 5px; font-size: 14px; font-weight: bold;"><{$printtitle}></div>
        <br>
        <div>&nbsp;</div>
        <div style="padding-top: 8px; text-align: justify;">
            <div style="float:right;padding: 3px;"><{$printscrshot}></div><{$printdescription}></div>
        <{if $print.addryn == 1}>
            <div>&nbsp;</div>
            <div style="text-align: left; padding: 1px;"><{$print.address}>
                <br><{$print.tel}><{$print.mobile}><{$print.voip}><{$print.fax}><{$print.email}></div>
        <{/if}>
        <{$worldwideweb}>
        <div style="clear: both;">&nbsp;</div>
        <div style="clear: both; text-align: center; margin-top: 10px; background-color: #E8E6E2; padding: 4px; font-weight: bold;"><{$printfooter}></div>
    </div>
</div>
</body>
</html>
