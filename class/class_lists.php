<?php

/**
 * SpotList
 *
 * @package
 * @author    John N
 * @copyright Copyright (c) 2005
 * @access    public
 */
class fileList
{
    public $filelist = array();

    public $value;
    public $selected;
    public $path = 'uploads';
    public $size;
    public $emptyselect;
    public $type;
    public $prefix;
    public $suffix;
    public $noselection;

    /**
     * SpotList::SpotList()
     *
     * @param string  $path
     * @param unknown $value
     * @param string  $selected
     * @param integer $size
     *
     * @internal param int $emptyselect
     * @internal param int $type
     * @internal param string $prefix
     * @internal param string $suffix
     */
    public function __construct($path = 'uploads', $value = null, $selected = '', $size = 1)
    {
        $this->value     = $value;
        $this->selection = $selected;
        $this->size      = (int)$size;

        $path_to_check = XOOPS_ROOT_PATH . "/{$path}";
        if (!is_dir($path_to_check)) {
            if (false === @mkdir("$path_to_check", 0777)) {
                XoopsErrorHandler_HandleError(E_USER_WARNING, $path_to_check . ' does not exist!', __FILE__, __LINE__);

                return false;
            }
        }
        $this->path = $path;

        return null;
    }

    /**
     * SpotList::setNoselection()
     *
     * @param integer $value
     *
     * @return void
     */

    public function setEmptyselect($value = 0)
    {
        $this->emptyselect = ((int)$value != 1) ? 0 : 1;
    }

    /**
     * @param int $value
     */
    public function setNoselection($value = 0)
    {
        $this->noselection = ((int)$value != 1) ? 0 : 1;
    }

    /**
     * @param string $value
     */
    public function setPrefix($value = '')
    {
        $this->prefix = ((string)$value !== '') ? (string)$value : '';
    }

    /**
     * @param string $value
     */
    public function setSuffix($value = '')
    {
        $this->suffix = ((string)$value !== '') ? (string)$value : '';
    }

    /**
     * @param string $value
     */
    public function setlistType($value = 'images')
    {
        $this->type = strtolower($value);
    }

    /**
     * SpotList::show_selection()
     *
     * @return string
     */
    public function &show_selection()
    {
        $ret = "<select size='" . $this->size() . "' name='$this->value()'>";
        if ($this->emptyselect) {
            $ret .= "<option value='" . $this->value() . "'>----------------------</option>";
        }
        foreach ($this->filelist as $content) {
            $opt_selected = '';

            if ($content[0] == $this->selected()) {
                $opt_selected = 'selected';
            }
            $ret .= "<option value='" . $content . "' $opt_selected>" . $content . '</option>';
        }
        $ret .= '</select>';

        return $ret;
    }

    /**
     * SpotList::getListTypeAsArray()
     *
     * @return array
     */
    public function &getListTypeAsArray()
    {
        $filelist = array();
        switch (trim($this->type)) {
            case 'images':
                $types = '[.gif|.jpg|.png]';
                if ($this->noselection) {
                    $this->filelist[0] = _AM_WFL_SHOWNOIMAGE;
                }
                break;

            case 'html':
                $types = '[.htm|.html|.xhtml|.php|.php3|.phtml|.txt]';
                if ($this->noselection) {
                    $this->filelist[0] = _AM_WFL_NOSELECTION;
                }
                break;

            default:
                $types = '';
                if ($this->noselection) {
                    $this->filelist[0] = _AM_WFL_NOFILESELECT;
                }
                break;
        }

        if (substr($this->path, -1) === '/') {
            $this->path = substr($this->path, 0, -1);
        }

        $_full_path = XOOPS_ROOT_PATH . "/{$this->path}";

        if (is_dir($_full_path) && $handle = opendir($_full_path)) {
            while (false !== ($file = readdir($handle))) {
                if (!preg_match('/^[.]{1,2}$/', $file) && preg_match("/$types$/i", $file)
                    && is_file($_full_path . '/' . $file)) {
                    if (strtolower($file) === 'blank.gif') {
                        continue;
                    }
                    $file                  = $this->prefix . $file;
                    $this->filelist[$file] = $file;
                }
            }
            closedir($handle);
            asort($this->filelist);
            reset($this->filelist);
        }

        return $this->filelist;
    }

    /**
     * @return null|unknown
     */
    public function value()
    {
        return $this->value;
    }

    public function selected()
    {
        return $this->selected;
    }

    /**
     * @return string
     */
    public function paths()
    {
        return $this->path;
    }

    /**
     * @return int
     */
    public function size()
    {
        return $this->size;
    }

    public function emptyselect()
    {
        return $this->emptyselect;
    }

    public function type()
    {
        return $this->type;
    }

    public function prefix()
    {
        return $this->prefix;
    }

    public function suffix()
    {
        return $this->suffix;
    }
}
