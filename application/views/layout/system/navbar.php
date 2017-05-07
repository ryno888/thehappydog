<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    $navbar = new Lib_navbar();
    $navbar->add_navitem("Services", "cms/vlist_service", ["icon" => "fa-users"]);
    $navbar->add_navitem_dropdown("CMS", [
        "Home" => "person/vprofile",
        "About Us" => "person/vprofile",
        "Services" => "person/vprofile",
        "Slider" => "person/vprofile",
        "Social Media" => "person/vprofile",
    ]);
    $navbar->add_navitem_dropdown("<i class='fa fa-user margin-right-5' aria-hidden='true'></i>", [
        "My Profile" => "person/vprofile",
        "Logout" => "index/xlogout"
    ], ["align" => "right"]);
    $navbar->display();
    
?>