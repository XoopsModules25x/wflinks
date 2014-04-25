<?php
/**
 * Class: wflLists
 * $Id: wfl_list.php v 1.00 21 June 2005 John N Exp $
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

class wflLists
{
    var $value;
    var $selected;
    var $path='uploads';
    var $size;
    var $emptyselect;
    var $type;
    var $prefix;
    var $suffix;

    function wflLists($path="uploads", $value = null, $selected='', $size = 1, $emptyselect = 0, $type = 0, $prefix='', $suffix='')
    {
        $this -> value = $value;
        $this -> selection = $selected;
        $this -> path = $path;
        $this -> size = intval($size);
        $this -> emptyselect = ($emptyselect) ? 0 : 1;
        $this -> type = $type;
    }

    function &getarray($this_array) {
        $ret="<select size='" . $this -> size() . "' name='$this->value()'>";
        if ($this -> emptyselect) {
            $ret .= "<option value='" . $this -> value() . "'>----------------------</option>";
        }
        foreach ($this_array as $content) {
            $opt_selected="";

            if ($content[0] == $this -> selected()) {
                $opt_selected="selected='selected'";
            }
            $ret .= "<option value='" . $content . "' $opt_selected>" . $content . "</option>";
        }
        $ret .= "</select>";

        return $ret;
    }

    /**
     * Private to be called by other parts of the class
     */
    function &getDirListAsArray($dirname) {
        $dirlist = array();
        if (is_dir($dirname) && $handle = opendir($dirname)) {
            while (false !== ($file = readdir($handle))) {
                if (!preg_match("/^[.]{1,2}$/", $file)) {
                    if (strtolower($file) != 'cvs' && is_dir($dirname . $file)) {
                        $dirlist[$file] = $file;
                    }
                }
            }
            closedir($handle);

            reset($dirlist);
        }

        return $dirlist;
    }

    function &getListTypeAsArray($dirname, $type='', $prefix="", $noselection = 1) {

        $filelist = array();
        switch (trim($type)) {
            case "images":
                $types="[.gif|.jpg|.png]";
                if ($noselection)
                    $filelist[""]=_AM_WFL_SHOWNOIMAGE;
                break;
            case "html":
                $types="[.htm|.html|.xhtml|.php|.php3|.phtml|.txt]";
                if ($noselection)
                    $filelist[""]="No Selection";
                break;
            default:
                $types="";
                if ($noselection)
                    $filelist[""]="No Selected File";
                break;
        }

        if (substr($dirname, -1) == '/') {
            $dirname = substr($dirname, 0, -1);
        }

        if (is_dir($dirname) && $handle = opendir($dirname)) {
            while (false !== ($file = readdir($handle))) {
                if (!preg_match("/^[.]{1,2}$/", $file) && preg_match("/$types$/i", $file) && is_file($dirname . '/' . $file)) {
                    if (strtolower($file) == "blank.gif")
                        Continue;
                    $file = $prefix . $file;
                    $filelist[$file] = $file;
                }
            }
            closedir($handle);
            asort($filelist);
            reset($filelist);
        }

        return $filelist;
    }

    function &getForum( $type = 1, $selected ) {
        global $xoopsDB;
        switch ( xoops_trim( $type ) ) {
            case 2:
                $sql = "SELECT id, name FROM " . $xoopsDB->prefix( "ibf_forums" ) . " ORDER BY id";
                break;
            case 3:
                $sql = "SELECT forum_id, forum_name FROM " . $xoopsDB->prefix( "pbb_forums" ) . " ORDER BY forum_id";
                break;
            case 4:
                $sql = "SELECT forum_id, forum_name FROM " . $xoopsDB -> prefix('bbex_forums') . " ORDER BY forum_id";
                break;
            case 1:
            case 0:
            default:
                $sql = "SELECT forum_id, forum_name FROM " . $xoopsDB->prefix( "bb_forums" ) . " ORDER BY forum_id";
                break;
        }
        $result = $xoopsDB->query( $sql );

        $noforum = ( defined( '_WFL_NO_FORUM' ) ) ? _WFL_NO_FORUM : _AM_WFL_NO_FORUM;

        echo "<select size='1' name='forumid'>";
        echo "<option value='0'>" . $noforum . "</option>";
        while (list($forum_id, $forum_name ) = $xoopsDB -> fetchRow($result)) {
            $opt_selected = "";
            if ($forum_id == $selected) {
                $opt_selected = "selected='selected'";
            }
            echo "<option value='" . $forum_id . "' $opt_selected>" . $forum_name . "</option>";
        }
        echo "</select>";

           return $forum_array;
    }

    function value()
    {
        return $this->value;
    }

    function selected()
    {
        return $this->selected;
    }

    function paths()
    {
        return $this->path;
    }

    function size()
    {
        return $this->size;
    }

    function emptyselect()
    {
        return $this->emptyselect;
    }

    function type()
    {
        return $this->type;
    }

    function prefix()
    {
        return $this->prefix;
    }

    function suffix()
    {
        return $this->suffix;
    }
}
