<?php
/**
 * this is the image that will be return apon error
 */
if (!defined('_PATH')) {
    define('_PATH', XOOPS_ROOT_PATH);
}

if (!defined('DEFAULT_PATH')) {
    define('DEFAULT_PATH', XOOPS_UPLOAD_URL . '/blank.gif');
}

/**
 * ThumbsNails
 *
 * @package
 * @author    John N
 * @copyright WF-Projects Copyright (c) 2005
 * @copyright Using this class without our permission or removing this notice voids the license agreement.
 * @access    public
 */
class WfThumbsNails
{
    public $_img_name     = 'blank.gif';
    public $_img_path     = 'uploads';
    public $_img_savepath = 'thumbs';

    public $_source_path  = '';
    public $_save_path    = '';
    public $_source_url   = '';
    public $_source_image = '';
    public $_save_image   = '';

    public $_usethumbs       = 0;
    public $_image_type      = 'gd2';
    public $_return_fullpath = 0;

    public $img_width   = 100;
    public $img_height  = 100;
    public $img_quality = 100;
    public $img_update  = 1;
    public $img_aspect  = 1;

    /**
     *
     * @access private
     */
    public $_img_info = array();

    /**
     * Constructor
     *
     * @param null $img_name
     * @param null $img_path
     * @param null $img_savepath
     *
     * @internal param string $_img_name
     * @internal param string $_img_path
     * @internal param string $_img_savepath
     *
     */
    public function __construct($img_name = null, $img_path = null, $img_savepath = null)
    {
        if (!preg_match("/\.(jpg|gif|png|jpeg)$/i", $img_name)) {
//            return false;
        }

        /*
        * The actual image we will be processing
        */
        if (null !== $img_name) {
            $this->_img_name = trim($img_name);
        }

        /*
        * The image path
        */
        if (null !== $img_path) {
            $this->_img_path = trim($img_path);
        }

        /*
        * The image save path
        */
        if (null !== $img_savepath) {
            $this->_img_savepath = trim($img_savepath);
        }

        $path_to_check = XOOPS_ROOT_PATH . "/$img_path/$img_savepath";

        if (!is_dir($path_to_check)) {
            if (false === mkdir("$path_to_check", 0777)) {
//                return false;
            }
        }

//        return null;
    }

    /**
     * WfThumbsNails::setUseThumbs()
     *
     * @param integer $value
     *
     * @return void
     */
    public function setUseThumbs($value = 1)
    {
        $this->_usethumbs = $value;
    }

    /**
     * WfThumbsNails::setImageType()
     *
     * @param string $value
     *
     * @return void
     */
    public function setImageType($value = 'gd2')
    {
        $this->_image_type = $value;
    }

    /**
     * ThumbsNails::createThumb()
     *
     * @param int $img_width
     * @param int $img_height
     * @param int $img_quality
     * @param int $img_update
     * @param int $img_aspect
     *
     * @return bool|string
     */
    public function createThumb(
        $img_width = null,
        $img_height = null,
        $img_quality = null,
        $img_update = null,
        $img_aspect = null)
    {
        $this->_source_path  = XOOPS_ROOT_PATH . "/{$this->_img_path}";
        $this->_save_path    = XOOPS_ROOT_PATH . "/{$this->_img_path}/{$this->_img_savepath}";
        $this->_source_url   = XOOPS_URL . "/{$this->_img_path}";
        $this->_source_image = "{$this->_source_path}/{$this->_img_name}";

        if (null !== $img_width && isset($img_width)) {
            $this->img_width = (int)$img_width;
        }

        if (null !== $img_height && isset($img_height)) {
            $this->img_height = (int)$img_height;
        }

        if (null !== $img_quality && isset($img_quality)) {
            $this->img_quality = (int)$img_quality;
        }

        if (null !== $img_update && isset($img_update)) {
            $this->img_update = (int)$img_update;
        }

        if (null !== $img_aspect && isset($img_aspect)) {
            $this->img_aspect = (int)$img_aspect;
        }

        /**
         * Return false if we are not using thumb nails
         */
        if (!$this->isUsingThumbs()) {
            return $this->_source_url . '/' . $this->_img_name;
        }
        /**
         * Return false if the server does not have gd lib installed or activated
         */
        if (!$this->gd_lib_check()) {
            return $this->_source_url . '/' . $this->_img_name;
        }

        /**
         * Return false if the paths to the file are wrong
         */
        if (!$this->checkPaths()) {
            return DEFAULT_PATH;
        }

        if (!$this->checkImage()) {
            return DEFAULT_PATH;
        }

        $image = $this->resizeImage();
        if ($image === false) {
            return DEFAULT_PATH;
        } else {
            return $image;
        }
    }

    /**
     * @param $value
     */
    public function setImgName($value)
    {
        $this->_img_name = trim($value);
    }

    /**
     * @param $value
     */
    public function setImgPath($value)
    {
        $this->_img_path = trim($value);
    }

    /**
     * @param $value
     */
    public function setImgSavePath($value)
    {
        $this->_img_savepath = trim($value);
    }

    /**
     * ThumbsNails::resizeImage()
     *
     * @return bool|string
     */
    public function resizeImage()
    {
        global $xoopsModuleConfig;
        // $this->_img_info = info array to the image being resized
        // $this->_img_info[0] == width
        // $this->_img_info[1] == height
        // $this->_img_info[2] == is a flag indicating the type of the image: 1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP, 7 = TIFF(intel byte order), 8 = TIFF(motorola byte order)
        // $this->_img_info[3] == is a text string with the correct height="yyy" width="xxx" string that can be used directly in an IMG tag
        /**
         * Get image size and scale ratio
         */
        $scale = min($this->img_width / $this->_img_info[0], $this->img_height / $this->_img_info[1]);
        /**
         * If the image is larger than the max shrink it
         */
        $newWidth  = $this->img_width;
        $newHeight = $this->img_height;
        if ($scale < 1 && $this->img_aspect == 1) {
            $newWidth  = floor($scale * $this->_img_info[0]);
            $newHeight = floor($scale * $this->_img_info[1]);
        }
        $newWidth  = ($newWidth > $this->_img_info[0]) ? $this->_img_info[0] : $newWidth;
        $newHeight = ($newHeight > $this->_img_info[0]) ? $this->_img_info[0] : $newHeight;
        /**
         */
        $savefile          = "{$newWidth}x{$newHeight}_{$this->_img_name}";
        $this->_save_image = "{$this->_save_path}/{$savefile}";

        if ($this->img_update == 0 && file_exists($this->_save_image)) {
            if ($this->_return_fullpath == 1) {
                return $this->_source_url . "/{$this->_img_savepath}/{$savefile}";
            } else {
                return "{$this->_img_savepath}/{$savefile}";
            }
        }

        switch ($this->_image_type) {
            case 'im':
                if (!empty($xoopsModuleConfig['path_magick']) && is_dir($xoopsModuleConfig['path_magick'])) {
                    if (preg_match("#[A-Z]:|\\\\#Ai", __FILE__)) {
                        $cur_dir     = __DIR__;
                        $src_file_im = '"' . $cur_dir . '\\' . str_replace('/', '\\', $this->_source_image) . '"';
                        $new_file_im = '"' . $cur_dir . '\\' . str_replace('/', '\\', $this->_save_image) . '"';
                    } else {
                        $src_file_im = escapeshellarg($this->_source_image);
                        $new_file_im = escapeshellarg($this->_save_image);
                    }
                    $magick_command = $xoopsModuleConfig['path_magick'] . '/convert -quality {$xoopsModuleConfig["imagequality"]} -antialias -sample {$newWidth}x{$newHeight} {$src_file_im} +profile "*" ' . str_replace('\\', '/', $new_file_im) . '';
                    passthru($magick_command);

                    return $this->_source_url . "/{$this->_img_savepath}/{$savefile}";
                } else {
                    return false;
                }

                break;

            case 'gd1':
            case 'gd2':
            default:

                $imageCreateFunction = (function_exists('imagecreatetruecolor')
                                        && $this->_image_type === 'gd2') ? 'imagecreatetruecolor' : 'imagecreate';
                $imageCopyfunction   = (function_exists('imagecopyresampled')
                                        && $this->_image_type === 'gd2') ? 'imagecopyresampled' : 'imagecopyresized';

                switch ($this->_img_info[2]) {
                    case 1:
                        // GIF image
                        $img     = function_exists('imagecreatefromgif') ? imagecreatefromgif($this->_source_image) : imagecreatefrompng($this->_source_image);
                        $tmp_img = $imageCreateFunction($newWidth, $newHeight);
                        $imageCopyfunction($tmp_img, $img, 0, 0, 0, 0, $newWidth, $newHeight, $this->_img_info[0], $this->_img_info[1]);
                        if (function_exists('imagegif')) {
                            imagegif($tmp_img, $this->_save_image);
                        } else {
                            imagepng($tmp_img, $this->_save_image);
                        }
                        imagedestroy($tmp_img);
                        break;

                    case 2:
                        // echo $this->_save_image;
                        $img     = function_exists('imagecreatefromjpeg') ? imagecreatefromjpeg($this->_source_image) : imagecreatefrompng($this->_source_image);
                        $tmp_img = $imageCreateFunction($newWidth, $newHeight);
                        $imageCopyfunction($tmp_img, $img, 0, 0, 0, 0, $newWidth, $newHeight, $this->_img_info[0], $this->_img_info[1]);
                        if (function_exists('imagejpeg')) {
                            imagejpeg($tmp_img, $this->_save_image, $this->img_quality);
                        } else {
                            imagepng($tmp_img, $this->_save_image);
                        }
                        imagedestroy($tmp_img);
                        break;

                    case 3:
                        // PNG image
                        $img     = imagecreatefrompng($this->_source_image);
                        $tmp_img = $imageCreateFunction($newWidth, $newHeight);
                        $imageCopyfunction($tmp_img, $img, 0, 0, 0, 0, $newWidth, $newHeight, $this->_img_info[0], $this->_img_info[1]);
                        imagepng($tmp_img, $this->_save_image);
                        imagedestroy($tmp_img);
                        break;
                    default:
                        return false;
                }
                if ($this->_return_fullpath == 1) {
                    return $this->_source_url . "/{$this->_img_savepath}/{$savefile}";
                } else {
                    return "{$this->_img_savepath}/{$savefile}";
                }
                break;
        }

        return false;
    }

    /**
     * ThumbsNails::checkPaths()
     *
     * @return bool
     */
    public function checkPaths()
    {
        if (file_exists($this->_source_image) || is_readable($this->_source_image)) {
            return true;
        }
        if (is_dir($this->_save_image) || is_writable($this->_save_image)) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function checkImage()
    {
        $this->_img_info = getimagesize($this->_source_image, $imageinfo);
        // if ( $this->_img_info[0] < $this->img_width && $this->_img_info[1] < $this->img_height )
        // return false;
        return !(null === $this->_img_info);
    }

    /**
     * wfsThumbs::gd_lib_check()
     *
     * Private function
     *
     * @return array|false if gd lib not found on the system
     */
    public function gd_lib_check()
    {
        if (!extension_loaded('gd')) {
            return false;
        }
        $gdlib = function_exists('gd_info');
        if (false === $gdlib = gd_info()) {
            return false;
        }

        return $gdlib;
    }

    /**
     * ThumbsNails::isUsingThumbs()
     *
     * @return bool
     */
    public function isUsingThumbs()
    {
        if ($this->_usethumbs) {
            return true;
        }

        return false;
    }
}
