<div id="help-template" class="outer">
    <{include file=$smarty.const._MI_WFL_HELP_HEADER}>

    <h4 class="odd">Link Management</h4><br>

    Use the Link Management to call the submit form for creating a new link.<br>
    This form has the following fields/options:<br>
    <br>
    <span style="text-decoration: underline;"><b>Link title</b></span><br>
    Enter here the title for the new link.<br>
    <br>
    <span style="text-decoration: underline;"><b>Link url</b></span><br>
    Enter the url of the new link.<br>
    Click the globe icon to open a browser tab/window with the entered url. You can use this icon or button to check the
    url.<br>
    <br>
    <span style="text-decoration: underline;"><b>Link main category</b></span><br>
    Select the main category for the link.<br>
    <br>
    <span style="text-decoration: underline;"><b>Link description</b></span><br>
    Here you can enter a description of the new link.<br>
    <br>
    <span style="text-decoration: underline;"><b>Keywords</b></span><br>
    In this field you can enter the meta keywords. Enter the keywords as: keyword1, keyword2, keyword3, ...<br>
    The maximum amount of characters can be set in the Preferences.<br>
    <br>
    <span style="text-decoration: underline;"><b>Link screenshot image</b></span><br>
    Screenshot image must be a valid image link under uploads/images/screenshots directory (ex. shot.gif).<br>
    Choose Show no image if you don't want to display a screenshot.<br>
    <br>
    <span style="text-decoration: underline;"><b>Google Maps, Yahoo Maps and Multimap</b></span><br>
    These three fields can be used to enter an url to an online map.<br>
    Click the appropriate icon behind the field to open a new tab/window in the browser. <br>
    The url used for this action is the url entered in the field. <br>
    You can use this icons or buttons to check or modify the map-url entered.<br>
    <br>
    <span style="text-decoration: underline;"><b>Address fields</b></span><br>
    Use these fields for add Contact Details to the link. The way the address is formatted is based on the selected
    country.<br>
    If you want another address format you have to modify the file ../include/address.php<br>
    For address formats see the Universal Postal Union website.<br>
    Email addresses can be entered in 2 ways:<br>
    <br>
    <ul>
        <li>name@address.com</li>
        <li>mailto:name@address.com</li>
    </ul>
    <br>
    Both email formats are automatic converted to: name AT address DOT com<br>
    <br>
    <span style="text-decoration: underline;"><b>Set publish date</b></span><br>
    Enter the date and time when the link will be published.<br>
    <br>
    <span style="text-decoration: underline;"><b>Link expire date</b></span><br>
    Use the options here to set an expiration date for the link. The link will no longer be visible for visitors.<br>
    This option can be used for removing the expiration date also.<br>
    <br>
    <span style="text-decoration: underline;"><b>Set link offline</b></span><br>
    Select Yes to set the link offline. The link will no longer be viewable for visitors.<br>
    Default: No<br>
    <br>
    <span style="text-decoration: underline;"><b>Set link status as updated</b></span><br>
    Select Yes to set the link as updated. An icon will appear behind the title of the link to notify visitors that the
    content of that link has been changed.<br>
    Default: No<br>
    <br>
    <span style="text-decoration: underline;"><b>Add Discuss in this Forum</b></span><br>
    Selecting the forum in use will result in an icon for discussing the link in that forum.<br>
    <br>
    <span style="text-decoration: underline;"><b>Submit New link as News item*</b></span><br>
    Select Yes to submit the new link as an article in the News module.<br>
    Default: No<br>
    <br>
    <span style="text-decoration: underline;"><b>Select News Category to submit News*</b></span><br>
    Select the News category for submitting the article.<br>
    <br>
    <span style="text-decoration: underline;"><b>News Title*</b></span><br>
    Give a title for the article or leave blank to use the link title.<br>
    <br>
    <br>
    * These fields appear when the News module is installed only.
</div>
