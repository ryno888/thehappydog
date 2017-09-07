<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    
    $list = new Lib_list();
    $list->add_title("Services Types", false, ["class" => "list-page-header"]);
    $list->add_new_btn("Add new Service Type", "system.browser.redirect('cms/vadd_service_type');");
    $list->sql_key = "srv_id";
    $list->sql_select = "srv_id, srv_name, srv_icon, srv_is_active";
    $list->sql_from = "service_type";
    $list->sql_order_by = "srv_name DESC";
    
    $list->add_field("Title", "srv_name", ["#width" => "15%"]);
    $list->add_field("Icon", "srv_icon", ["function" => function($srv_icon){ return Lib_html_tags::icon("Website Icon", $srv_icon); }]);
    $list->add_field("Is active", "srv_is_active", ["#width" => "15%", "function" => function($srv_is_active){ return Lib_html_tags::icon($srv_is_active ? "Active" : "Inactive", $srv_is_active ? "fa-check" : "fa-times"); }]);
    $list->add_action_assoc("cms/vedit_service_type", ["srv_id" => "%srv_id%"]);
    $list->add_action_delete("system.ajax.requestFunction('person/xdelete/id/%srv_id%', function(){}, {confirm:true})");
    $list->display();
    
?>
