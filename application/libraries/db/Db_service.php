<?php
/**
 * Description of lib
 *
 * @author Ryno
 */
class Db_service extends Lib_db{
    
    public function __construct() {
        $this->set_key("ser_id");
        $this->set_display("ser_title");
        $this->set_table("service");
        
        $this->set_fields_arr([
            "ser_id"                    => ["name" => "id"              , "default" => "null"   , "type" => DB_INT],
            "ser_title"                 => ["name" => "title"           , "default" => ""       , "type" => DB_VARCHAR],
            "ser_website"               => ["name" => "website"         , "default" => ""       , "type" => DB_VARCHAR],
            "ser_contact_nr"            => ["name" => "contact nr"      , "default" => ""       , "type" => DB_VARCHAR],
            "ser_email"                 => ["name" => "email"           , "default" => ""       , "type" => DB_VARCHAR],
            "ser_location_link"         => ["name" => "location link"   , "default" => ""       , "type" => DB_VARCHAR],
            "ser_facebook_link"         => ["name" => "facebook link"   , "default" => ""       , "type" => DB_VARCHAR],
            "ser_twitter_link"          => ["name" => "twitter link"    , "default" => ""       , "type" => DB_VARCHAR],
            "ser_google_link"           => ["name" => "google link"     , "default" => ""       , "type" => DB_VARCHAR],
            "ser_location"              => ["name" => "location"        , "default" => ""       , "type" => DB_TEXT],
            "ser_details"               => ["name" => "details"         , "default" => ""       , "type" => DB_TEXT],
            "ser_is_deleted"            => ["name" => "is deleted"      , "default" => 0        , "type" => DB_TINYINT],
            "ser_type"                  => ["name" => "type"            , "default" => 0        , "type" => DB_TINYINT],
            "ser_ref_service_type"      => ["name" => "service type"    , "default" => "null"   , "type" => DB_REFERENCE, "reference" => "service_type"],
        ]);
    }
    //----------------------------------------------------------------------------------------
    public $ser_type = [
        "" => "-- Not Selected --",
        1 => "Accommodation",
        2 => "Shelters and Rescues",
        3 => "Restaurants",
        4 => "Pet Travel",
        5 => "Puppy Day Care",
        6 => "Pet and Home Sitters",
        7 => "Vets",
        8 => "Pet Shops",
        9 => "Trainers and Behaviourists",
    ];
    //----------------------------------------------------------------------------
}
