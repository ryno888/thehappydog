<?php

/*
 * Class 
 * @filename lib 
 * @encoding UTF-8
 * @author Liquid Edge Solutions  * 
 * @copyright Copyright Liquid Edge Solutions. All rights reserved. * 
 * @programmer Ryno van Zyl * 
 * @date 14 Feb 2017 * 
 */

/**
 * Description of lib
 *
 * @author Ryno
 */
class File_function_helper {
    //--------------------------------------------------------------------------
    public static function mkdir($dir) {
		if (!is_dir($dir)) {
            mkdir($dir, 0777, true);  
        }
	}
    //--------------------------------------------------------------------------------
    /**
     * Completely removes a directory and all its contents
     * @param type $dir
     */
    public static function delete_directory($dir) { 
        foreach(glob("{$dir}/*") as $file){
            if(is_dir($file)) { 
                self::delete_directory($file);
            } else {
                unlink($file);
            }
        }
        if(is_dir($dir)){
            @rmdir($dir);
        }
     }
    //--------------------------------------------------------------------------------
    /**
     * Completely removes a directory and all its contents
     * @param type $dir
     */
    public static function delete_file($filename) { 
        if(file_exists($filename)){
            @unlink($filename);
        }
     }
    //--------------------------------------------------------------------------------
    /**
     * Completely removes a directory and all its contents
     * @param type $dir
     */
    public static function get_image_size($filename) { 
        if(file_exists($filename)){
            $size = getimagesize($file_url);
            $current_width = $size[0];
            $current_height = $size[1];

            if($current_height < $prefered_height){
                return array("width" => $current_height, "height" => $current_width);
            }
        }
        return false;
     }
    //--------------------------------------------------------------------------------
	public static function get_file_extension($filename) {
        if(!$filename){
            return false;
        }else{
            $pos = explode(".", $filename);
            return strtolower(end($pos));
        }
	}
    //--------------------------------------------------------------------------
}