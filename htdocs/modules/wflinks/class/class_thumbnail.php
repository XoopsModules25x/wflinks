<?php
/**
 * this is the image that will be return apon error
 */
if ( !defined( '_PATH' ) ) {
    define( "_PATH", XOOPS_ROOT_PATH );
}

if ( !defined( 'DEFAULT_PATH' ) ) {
    define( "DEFAULT_PATH", XOOPS_UPLOAD_URL . "/blank.gif" );
}

/**
 * ThumbsNails
 *
 * @package
 * @author John N
 * @copyright WF-Projects Copyright (c) 2005
 * @copyright Using this class without our permission or removing this notice voids the license agreement.
 * @version $Id$
 * @access public
 */
class wfThumbsNails
{
    var $_img_name = 'blank.gif';
    var $_img_path = 'uploads';
    var $_img_savepath = 'thumbs';

    var $_source_path = '';
    var $_save_path = '';
    var $_source_url = '';
    var $_source_image = '';
    var $_save_image = '';

    var $_usethumbs = 0;
    var $_image_type = 'gd2';
    var $_return_fullpath = 0;

    var $img_width = 100;
    var $img_height = 100;
    var $img_quality = 100;
    var $img_update = 1;
    var $img_aspect = 1;

    /**
     *
     * @access private
     */
    var $_img_info = array();

    /**
     * Constructor
     *
     * @param string $_img_name
     * @param string $_img_path
     * @param string $_img_savepath
     */
    function wfThumbsNails( $img_name = null, $img_path = null, $img_savepath = null )
    {
        if ( !preg_match( "/\.(jpg|gif|png|jpeg)$/i", $img_name ) ) {
            return false;
        }

        /*
        * The actual image we will be processing
        */
        if ( !is_null( $img_name ) ) {
            $this -> _img_name = strval( trim( $img_name ) );
        }

        /*
        * The image path
        */
        if ( !is_null( $img_path ) ) {
            $this -> _img_path = strval( trim( $img_path ) );
        }

        /*
        * The image save path
        */
        if ( !is_null( $img_savepath ) ) {
            $this -> _img_savepath = strval( trim( $img_savepath ) );
        }

        $path_to_check = XOOPS_ROOT_PATH . "/$img_path/$img_savepath";

        if ( !is_dir( $path_to_check ) ) {
            if ( false == mkdir( "$path_to_check", 0777 ) ) {
                return false;
            }
        }
    }

    /**
     * wfThumbsNails::setUseThumbs()
     *
     * @param integer $value
     * @return
     **/
    function setUseThumbs( $value = 1 )
    {
        $this -> _usethumbs = $value;
    }

    /**
     * wfThumbsNails::setImageType()
     *
     * @param string $value
     * @return
     **/
    function setImageType( $value = "gd2" )
    {
        $this -> _image_type = $value;
    }

    /**
     * ThumbsNails::do_thumb()
     *
     * @param int $img_width
     * @param int $img_height
     * @param int $img_quality
     * @param int $img_update
     * @param int $img_aspect
     * @return
     */
    function do_thumb( $img_width = null, $img_height = null, $img_quality = null, $img_update = null, $img_aspect = null )
    {
        $this -> _source_path = XOOPS_ROOT_PATH . "/{$this->_img_path}";
        $this -> _save_path = XOOPS_ROOT_PATH . "/{$this->_img_path}/{$this->_img_savepath}";
        $this -> _source_url = XOOPS_URL . "/{$this->_img_path}";
        $this -> _source_image = "{$this->_source_path}/{$this->_img_name}";

        if ( isset( $img_width ) && !is_null( $img_width ) )
            $this -> img_width = intval( $img_width );

        if ( isset( $img_height ) && !is_null( $img_height ) )
            $this -> img_height = intval( $img_height );

        if ( isset( $img_quality ) && !is_null( $img_quality ) )
            $this -> img_quality = intval( $img_quality );

        if ( isset( $img_update ) && !is_null( $img_update ) )
            $this -> img_update = intval( $img_update );

        if ( isset( $img_aspect ) && !is_null( $img_aspect ) )
            $this -> img_aspect = intval( $img_aspect );

        /**
         * Return false if we are not using thumb nails
         */
        if ( !$this -> use_thumbs() )
            return $this -> _source_url . "/" . $this -> _img_name;
        /**
         * Return false if the server does not have gd lib installed or activated
         */
        if ( !$this -> gd_lib_check() )
            return $this -> _source_url . "/" . $this -> _img_name;

        /**
         * Return false if the paths to the file are wrong
         */
        if ( !$this -> check_paths() )
            return DEFAULT_PATH;

        if ( !$this -> image_check() )
            return DEFAULT_PATH;

        $image = $this -> do_resize();
        if ( $image == false )
            return DEFAULT_PATH;
        else
            return $image;
    }

    function setImgName( $value )
    {
        $this -> _img_name = strval( trim( $value ) );
    }
    function setImgPath( $value )
    {
        $this -> _img_path = strval( trim( $value ) );
    }
    function setImgSavePath( $value )
    {
        $this -> _img_savepath = strval( trim( $value ) );
    }

    /**
     * ThumbsNails::do_resize()
     *
     * @return
     */
    function do_resize()
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
        $scale = min( $this -> img_width / $this -> _img_info[0], $this -> img_height / $this -> _img_info[1] );
        /**
         * If the image is larger than the max shrink it
         */
        $newWidth = $this -> img_width;
        $newHeight = $this -> img_height;
        if ($scale < 1 && $this -> img_aspect == 1) {
            $newWidth = floor( $scale * $this -> _img_info[0] );
            $newHeight = floor( $scale * $this -> _img_info[1] );
        }
        $newWidth = ( $newWidth > $this -> _img_info[0] ) ? $this -> _img_info[0] : $newWidth;
        $newHeight = ( $newHeight > $this -> _img_info[0] ) ? $this -> _img_info[0] : $newHeight;
        /**
         */
        $savefile = "{$newWidth}x{$newHeight}_{$this->_img_name}";
        $this -> _save_image = "{$this->_save_path}/{$savefile}";

        if ( $this -> img_update == 0 && file_exists( $this -> _save_image ) ) {
            if ($this -> _return_fullpath == 1) {
                return $this -> _source_url . "/{$this->_img_savepath}/{$savefile}";
            } else {
                return "{$this->_img_savepath}/{$savefile}";
            }
        }

        switch ($this -> _image_type) {
            case "im":
                if ( !empty( $xoopsModuleConfig['path_magick'] ) && is_dir( $xoopsModuleConfig['path_magick'] ) ) {
                    if ( preg_match( "#[A-Z]:|\\\\#Ai", __FILE__ ) ) {
                        $cur_dir = dirname( __FILE__ );
                        $src_file_im = '"' . $cur_dir . '\\' . strtr( $this -> _source_image, '/', '\\' ) . '"';
                        $new_file_im = '"' . $cur_dir . '\\' . strtr( $this -> _save_image, '/', '\\' ) . '"';
                    } else {
                        $src_file_im = escapeshellarg( $this -> _source_image );
                        $new_file_im = escapeshellarg( $this -> _save_image );
                    }
                    $magick_command = $xoopsModuleConfig['path_magick'] . '/convert -quality {$xoopsModuleConfig["imagequality"]} -antialias -sample {$newWidth}x{$newHeight} {$src_file_im} +profile "*" ' . str_replace( '\\', '/', $new_file_im ) . '';
                    passthru( $magick_command );

                    return $this -> _source_url . "/{$this->_img_savepath}/{$savefile}";
                } else

                    return false;

                break;

            case "gd1":
            case "gd2":
            default :

                $imageCreateFunction = ( function_exists( 'imagecreatetruecolor' ) && $this -> _image_type == "gd2" ) ? "imagecreatetruecolor" : "imagecreate";
                $imageCopyfunction = ( function_exists( 'ImageCopyResampled' ) && $this -> _image_type == "gd2" ) ? "imagecopyresampled" : "imagecopyresized";

                switch ($this -> _img_info[2]) {
                    case 1:
                        // GIF image
                        $img = ( function_exists( 'imagecreatefromgif' ) ) ? imagecreatefromgif( $this -> _source_image ) : imageCreateFromPNG( $this -> _source_image );
                        $tmp_img = $imageCreateFunction( $newWidth, $newHeight );
                        $imageCopyfunction( $tmp_img, $img, 0, 0, 0, 0, $newWidth, $newHeight, $this -> _img_info[0], $this -> _img_info[1] );
                        if ( function_exists( 'imagegif' ) )
                            imagegif( $tmp_img, $this -> _save_image );
                        else
                            imagePNG( $tmp_img, $this -> _save_image );
                        imagedestroy( $tmp_img );
                        break;

                    case 2:
                        // echo $this->_save_image;
                        $img = ( function_exists( 'imagecreatefromjpeg' ) ) ? imageCreateFromJPEG( $this -> _source_image ) : imageCreateFromPNG( $this -> _source_image );
                        $tmp_img = $imageCreateFunction( $newWidth, $newHeight );
                        $imageCopyfunction( $tmp_img, $img, 0, 0, 0, 0, $newWidth, $newHeight, $this -> _img_info[0], $this -> _img_info[1] );
                        if ( function_exists( 'imagejpeg' ) )
                            imageJPEG( $tmp_img, $this -> _save_image, $this -> img_quality );
                        else
                            imagePNG( $tmp_img, $this -> _save_image );
                        imagedestroy( $tmp_img );
                        break;

                    case 3:
                        // PNG image
                        $img = imageCreateFromPNG( $this -> _source_image );
                        $tmp_img = $imageCreateFunction( $newWidth, $newHeight );
                        $imageCopyfunction( $tmp_img, $img, 0, 0, 0, 0, $newWidth, $newHeight, $this -> _img_info[0], $this -> _img_info[1] );
                        imagePNG( $tmp_img, $this -> _save_image );
                        imagedestroy( $tmp_img );
                        break;
                    default:
                        return false;
                }
                if ($this -> _return_fullpath == 1) {
                    return $this -> _source_url . "/{$this->_img_savepath}/{$savefile}";
                } else {
                    return "{$this->_img_savepath}/{$savefile}";
                }
                break;
        }

        return false;
    }

    /**
     * ThumbsNails::check_paths()
     *
     * @return
     */
    function check_paths()
    {
        if ( file_exists( $this -> _source_image ) || is_readable( $this -> _source_image ) ) {
            return true;
        }
        if ( is_dir( $this -> _save_image ) || is_writable( $this -> _save_image ) ) {
            return true;
        }

        return false;
    }

    function image_check()
    {
        $this -> _img_info = getimagesize( $this -> _source_image , $imageinfo );
        if (null == $this -> _img_info) {
            return false;
        }
        // if ( $this->_img_info[0] < $this->img_width && $this->_img_info[1] < $this->img_height )
        // return false;
        return true;
    }
    /**
     * wfsThumbs::gd_lib_check()
     *
     * Private function
     *
     * @return false if gd lib not found on the system
     */
    function gd_lib_check()
    {
        if ( !extension_loaded( 'gd' ) ) {
            return false;
        }
        $gdlib = ( function_exists( 'gd_info' ) );
        if ( false == $gdlib = gd_info() ) {
            return false;
        }

        return $gdlib;
    }

    /**
     * ThumbsNails::use_thumbs()
     *
     * @return
     */
    function use_thumbs()
    {
        if ($this -> _usethumbs) {
            return true;
        }

        return false;
    }
}
