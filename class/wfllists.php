<?php

/**
 * Class: WflLists
 *
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */
class WflLists
{
    public $value;
    public $selected;
    public $path = 'uploads';
    public $size;
    public $emptyselect;
    public $type;
    public $prefix;
    public $suffix;

    /**
     * @param string $path
     * @param null   $value
     * @param string $selected
     * @param int    $size
     * @param int    $emptyselect
     * @param int    $type
     * @param string $prefix
     * @param string $suffix
     */
    public function __construct(
        $path = 'uploads',
        $value = null,
        $selected = '',
        $size = 1,
        $emptyselect = 0,
        $type = 0,
        $prefix = '',
        $suffix = ''
    ) {
        $this->value       = $value;
        $this->selection   = $selected;
        $this->path        = $path;
        $this->size        = (int)$size;
        $this->emptyselect = $emptyselect ? 0 : 1;
        $this->type        = $type;
    }

    /**
     * @param array $this_array
     *
     * @return string
     */
    public function getArray($this_array)
    {
        $ret = "<select size='" . $this->getSize() . "' name='". $this->getValue() ."'>";
        if ($this->emptyselect) {
            $ret .= "<option value='" . $this->getValue() . "'>----------------------</option>";
        }
        foreach ($this_array as $content) {
            $opt_selected = '';

            if ($content[0] == $this->getSelected()) {
                $opt_selected = 'selected';
            }
            $ret .= "<option value='" . $content . "' $opt_selected>" . $content . '</option>';
        }
        $ret .= '</select>';

        return $ret;
    }

    /**
     * Private to be called by other parts of the class
     * @param $dirname
     * @return array
     */
    public function getDirListAsArray($dirname)
    {
        $dirlist = [];
        if (is_dir($dirname) && $handle = opendir($dirname)) {
            while (false !== ($file = readdir($handle))) {
                if (!preg_match('/^[.]{1,2}$/', $file)) {
                    if ('cvs' !== strtolower($file) && is_dir($dirname . $file)) {
                        $dirlist[$file] = $file;
                    }
                }
            }
            closedir($handle);

            reset($dirlist);
        }

        return $dirlist;
    }

    /**
     * @param        $dirname
     * @param string $type
     * @param string $prefix
     * @param int    $noselection
     *
     * @return array
     */
    public static function getListTypeAsArray($dirname, $type = '', $prefix = '', $noselection = 1)
    {
        $filelist = [];
        switch (trim($type)) {
            case 'images':
                $types = '[.gif|.jpg|.png]';
                if ($noselection) {
                    $filelist[''] = _AM_WFL_SHOWNOIMAGE;
                }
                break;
            case 'html':
                $types = '[.htm|.html|.xhtml|.php|.php3|.phtml|.txt]';
                if ($noselection) {
                    $filelist[''] = 'No Selection';
                }
                break;
            default:
                $types = '';
                if ($noselection) {
                    $filelist[''] = 'No Selected File';
                }
                break;
        }

        if ('/' === substr($dirname, -1)) {
            $dirname = substr($dirname, 0, -1);
        }

        if (is_dir($dirname) && $handle = opendir($dirname)) {
            while (false !== ($file = readdir($handle))) {
                if (!preg_match('/^[.]{1,2}$/', $file) && preg_match("/$types$/i", $file)
                    && is_file($dirname . '/' . $file)) {
                    if ('blank.gif' === strtolower($file)) {
                        continue;
                    }
                    $file            = $prefix . $file;
                    $filelist[$file] = $file;
                }
            }
            closedir($handle);
            asort($filelist);
            reset($filelist);
        }

        return $filelist;
    }

    /**
     * @param int $type
     * @param     $selected
     *
     * @return mixed
     */
    public static function getForum($type = 1, $selected)
    {
        global $xoopsDB;
        switch (xoops_trim($type)) {
            case 2:
                $sql = 'SELECT id, name FROM ' . $xoopsDB->prefix('ibf_forums') . ' ORDER BY id';
                break;
            case 3:
                $sql = 'SELECT forum_id, forum_name FROM ' . $xoopsDB->prefix('pbb_forums') . ' ORDER BY forum_id';
                break;
            case 4:
                $sql = 'SELECT forum_id, forum_name FROM ' . $xoopsDB->prefix('bbex_forums') . ' ORDER BY forum_id';
                break;
            case 1:
            case 0:
            default:
                $sql = 'SELECT forum_id, forum_name FROM ' . $xoopsDB->prefix('newbb_forums') . ' ORDER BY forum_id';
                break;
        }
        $result = $xoopsDB->query($sql);

        $noforum = defined('_WFL_NO_FORUM') ? _WFL_NO_FORUM : _AM_WFL_NO_FORUM;

        echo "<select size='1' name='forumid'>";
        echo "<option value='0'>" . $noforum . '</option>';
        while (false !== (list($forum_id, $forum_name) = $xoopsDB->fetchRow($result))) {
            $opt_selected = '';
            if ($forum_id == $selected) {
                $opt_selected = 'selected';
            }
            echo "<option value='" . $forum_id . "' $opt_selected>" . $forum_name . '</option>';
        }
        echo '</select>';

        return $noforum;
    }

    /**
     * @return null
     */
    public function getValue()
    {
        return $this->value;
    }

    public function getSelected()
    {
        return $this->selected;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return int
     */
    public function getEmptySelect()
    {
        return $this->emptyselect;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    public function getPrefix()
    {
        return $this->prefix;
    }

    public function getSuffix()
    {
        return $this->suffix;
    }
}
