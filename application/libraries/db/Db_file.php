<?php
/**
 * Description of lib
 *
 * @author Ryno
 */
class Db_file extends Lib_db{
    
    public function __construct() {
        $this->set_key("fil_id");
        $this->set_display("fil_name");
        $this->set_table("file");
        
        $this->set_fields_arr([
            "fil_id"            => ["name" => "id"              , "default" => "null"   , "type" => DB_INT],
            "fil_name"          => ["name" => "name"            , "default" => ""       , "type" => DB_VARCHAR],
            "fil_type"          => ["name" => "type"            , "default" => ""       , "type" => DB_VARCHAR],
            "fil_path"          => ["name" => "path"            , "default" => ""       , "type" => DB_VARCHAR],
            "fil_data"          => ["name" => "data"            , "default" => ""       , "type" => DB_TEXT],
            "fil_date_created"  => ["name" => "date created"    , "default" => ""       , "type" => DB_DATETIME],
        ]);
    }
    //----------------------------------------------------------------------------
    public function stream() {
        $ci = &get_instance();
        $ci->load->helper("File_function");
        $data = File_function_helper::decompress_image($this->obj->fil_data);
        File_function_helper::stream_data(file_get_contents($data), $this->obj->fil_name, [
            "download" => false,
            "mime_type" => $this->obj->fil_type,
        ]);
    }
    //----------------------------------------------------------------------------
    public function save_image($path) {
        
        $ci = &get_instance();
        $ci->load->helper("File_function");
        
        $size = getimagesize($path);
        $this->obj->fil_data = File_function_helper::compress_image($path);
        $this->obj->fil_name = basename($path);
        $this->obj->fil_path = dirname($path);
        $this->obj->fil_type = $size["mime"];
        $this->obj->fil_date_created = Lib_date::strtodatetime();
        $this->insert();
    }
    //----------------------------------------------------------------------------
}
