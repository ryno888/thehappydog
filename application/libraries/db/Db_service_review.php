<?php
/**
 * Description of lib
 *
 * @author Ryno
 */
class Db_service_review extends Lib_db{
    
    public function __construct() {
        $this->set_key("srr_id");
        $this->set_display("srr_rating");
        $this->set_table("service_review");
        
        $this->set_fields_arr([
            "srr_id"            => ["name" => "id"              , "default" => "null"   , "type" => DB_INT],
            "srr_rating"        => ["name" => "rating"          , "default" => 0        , "type" => DB_INT],
            "srr_title"         => ["name" => "title"           , "default" => ""       , "type" => DB_VARCHAR],
            "srr_body"          => ["name" => "body"            , "default" => ""       , "type" => DB_TEXT],
            "srr_date_created"  => ["name" => "date created"    , "default" => ""       , "type" => DB_DATETIME],
            "srr_ref_service"   => ["name" => "service"         , "default" => "null"   , "type" => DB_REFERENCE, "reference" => "service"],
        ]);
    }
    //----------------------------------------------------------------------------
}
