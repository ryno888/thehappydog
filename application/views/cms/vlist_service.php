<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $icon_button = Lib_html_tags::iconbutton("Edit", "system.browser.redirect('cms/vedit_service_type/$service_type->id');", 'fa-pencil-square-o', ["#color" => "#2d2d2d"]);

    $list = new Lib_list();
    $list->add_title("Services", $service_type ? $service_type->get("srv_name").$icon_button : "All Services", ["class" => "list-page-header"]);
    $list->add_new_btn("Add new Service", "system.browser.redirect('cms/vadd_service/$service_type->id');");
    $list->sql_key = "ser_id";
    $list->sql_select = "ser_id, ser_title, ser_website, ser_contact_nr, ser_email, ser_ref_service_type";
    $list->sql_from = "service ";
    $list->sql_where = $service_type->id ? "ser_is_deleted = 0 AND ser_ref_service_type = $service_type->id" : "ser_is_deleted = 0";
    $list->sql_order_by = "ser_title ASC";
    $list->searchfield_value = "CONCAT(ser_title, ser_website, ser_email)";
    
    $list->add_field("Title", "ser_title", ["#width" => "15%"]);
    $list->add_field("Service Type", "ser_ref_service_type", ["function" => function($ser_ref_service_type){ return Lib_database::selectsingle("SELECT srv_name FROM service_type WHERE srv_id = $ser_ref_service_type"); }]);
    $list->add_field("Email", "ser_email", ["#width" => "15%"]);
    $list->add_field("Contact Nr", "ser_contact_nr", ["#width" => "15%"]);
    $list->add_field("Website", "ser_website");
    
    $list->add_action_assoc("cms/vedit_service", ["ser_id" => "%ser_id%"]);
    $list->add_action_delete("system.ajax.requestFunction('person/xdelete/id/%ser_id%', function(){}, {confirm:true})");
    $list->display();
    
?>
