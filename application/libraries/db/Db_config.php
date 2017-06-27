<?php
/**
 * Description of lib
 *
 * @author Ryno
 */
class Db_config extends Lib_db{
    
    public function __construct() {
        $this->set_key("con_id");
        $this->set_display("con_intro");
        $this->set_table("config");
        
        $this->set_fields_arr([
            "con_id"                    => ["name" => "id"              , "default" => "null"   , "type" => DB_INT],
            "con_intro"                 => ["name" => "intro text"      , "default" => ""       , "type" => DB_TEXT],
            "con_about"                 => ["name" => "about text"      , "default" => ""       , "type" => DB_TEXT],
            "con_email"                 => ["name" => "site email"      , "default" => ""       , "type" => DB_VARCHAR],
            "con_twitter"               => ["name" => "twitter"         , "default" => ""       , "type" => DB_VARCHAR],
            "con_facebook"              => ["name" => "facebook"        , "default" => ""       , "type" => DB_VARCHAR],
            "con_google"                => ["name" => "google"          , "default" => ""       , "type" => DB_VARCHAR],
            "con_instagram"             => ["name" => "instagram"       , "default" => ""       , "type" => DB_VARCHAR],
        ]);
    }
    //----------------------------------------------------------------------------
}
