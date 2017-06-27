<?php
/**
 * Description of lib
 *
 * @author Ryno
 */
class Db_service_type extends Lib_db{
    
    public function __construct() {
        $this->set_key("srv_id");
        $this->set_display("srv_name");
        $this->set_table("service_type");
        
        $this->set_fields_arr([
            "srv_id"            => ["name" => "id"              , "default" => "null"   , "type" => DB_INT],
            "srv_name"          => ["name" => "title"           , "default" => ""       , "type" => DB_VARCHAR],
            "srv_icon"          => ["name" => "website"         , "default" => ""       , "type" => DB_VARCHAR],
            "srv_is_active"     => ["name" => "is active"       , "default" => 0        , "type" => DB_TINYINT],
        ]);
    }
    //----------------------------------------------------------------------------------------
    public $srv_is_active = [
        0 => "No",
        1 => "Yes",
    ];
    //----------------------------------------------------------------------------
}
