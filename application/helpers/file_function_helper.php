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
    public static function base64_to_jpeg($image_data, $output_file ) {
        $base64_string = self::decompress_image($image_data);
        $ifp = fopen( $output_file, "wb" ); 
        fwrite( $ifp, base64_decode( $base64_string) ); 
        fclose( $ifp ); 
        return( $output_file ); 
    }
    //--------------------------------------------------------------------------
    public static function compress_image($uploaded_file){
        $size = getimagesize($uploaded_file);
        $file_contents = file_get_contents($uploaded_file);
        $data = base64_encode($file_contents);
        $encoded_data = 'data: '.$size['mime'].';base64,'.$data;
        return base64_encode(gzcompress($encoded_data, 9));
    }
    //--------------------------------------------------------------------------
    public static function decompress_image($image_data){
        if(!$image_data) { return false; }
        $encoded_data = base64_decode($image_data);
        return gzuncompress($encoded_data);
    }
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
    //--------------------------------------------------------------------------------
	public static function stream($data, $filename, $options = []) {
		// options
		$options = array_merge([
			"download" => true,
            "mime_type" => false,
		], $options);

		$im = imagecreatefromstring(file_get_contents($data));
        if ($im !== false) {
            if ($options["download"]) {
                header('Content-Disposition: attachment; filename="'.$filename.'"');
            }
            header('Content-Type: '.$options['mime_type']);
            imagepng($im);
            imagedestroy($im);
        }
	}
    //--------------------------------------------------------------------------------
	public static function stream_data($data, $filename, $options = []) {
		// options
		$options = array_merge([
			"download" => true,
            "mime_type" => false,
		], $options);

		self::add_stream_headers($filename, $options);

		if (is_resource($data)) {
			while (!feof($data)) {
				echo fread($data, 8192);
				ob_flush();
			}
		}
		else {
			echo $data;
		}
	}
    //--------------------------------------------------------------------------------
    public static function add_stream_headers($filename, $options = []) {
		// options
		$options = array_merge([
			"download" => true,
			"mime_type" => false,
		], $options);

    	// clear output buffer
		if (ob_get_level()) ob_end_clean();

		// add stream headers
		header("Pragma: public");
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Transfer-Encoding: binary");
		header("HTTP/1.1 200 OK");

		 // content-type
		header("Content-Type: {$options["mime_type"]}");

		if ($options["download"]) {
			header('Content-Disposition: attachment; filename="'.$filename.'"');
		}
    }
    //--------------------------------------------------------------------------
}