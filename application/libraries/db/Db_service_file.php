<?php
/**
 * Description of lib
 *
 * @author Ryno
 */
class Db_service_file extends Lib_db{
    
    public function __construct() {
        $this->set_key("sef_id");
        $this->set_display("sef_type");
        $this->set_table("service_file");
        
        $this->set_fields_arr([
            "sef_id"                    => ["name" => "id"              , "default" => "null"   , "type" => DB_INT],
            "sef_type"                  => ["name" => "type"            , "default" => 0        , "type" => DB_TINYINT],
            "sef_ref_service"           => ["name" => "service"         , "default" => null   , "type" => DB_REFERENCE, "reference" => "service"],
            "sef_ref_file"              => ["name" => "original"        , "default" => null   , "type" => DB_REFERENCE, "reference" => "file"],
            "sef_ref_file_thumb_tiny"   => ["name" => "thumb tiny"      , "default" => null   , "type" => DB_REFERENCE, "reference" => "file"],
            "sef_ref_file_thumb_sm"     => ["name" => "thumb sm"        , "default" => null   , "type" => DB_REFERENCE, "reference" => "file"],
            "sef_ref_file_thumb_lg"     => ["name" => "thumb lg"        , "default" => null   , "type" => DB_REFERENCE, "reference" => "file"],
        ]);
    }
    //----------------------------------------------------------------------------
    public function on_delete_complete() {
        $file_org = Lib_db::load_db("file", "fil_id = {$this->get("sef_ref_file")}");
        if($file_org){ $file_org->delete(); }
        
        $file_tiny = Lib_db::load_db("file", "fil_id = {$this->get("sef_ref_file_thumb_tiny")}");
        if($file_tiny){ $file_tiny->delete(); }
        
        $file_small = Lib_db::load_db("file", "fil_id = {$this->get("sef_ref_file_thumb_sm")}");
        if($file_small){ $file_small->delete(); }
        
        $file_lg = Lib_db::load_db("file", "fil_id = {$this->get("sef_ref_file_thumb_lg")}");
        if($file_lg){ $file_lg->delete(); }
        
    }
    //----------------------------------------------------------------------------
}
