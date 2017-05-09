<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $list = new Lib_list();
    $list->sql_key = "sef_id";
    $list->sql_select = "sef_id, sef_type, sef_ref_file_thumb_lg, sef_ref_file_thumb_sm, sef_ref_file, main.fil_name, main.fil_date_created";
    $list->sql_from = "service_file 
        LEFT JOIN file AS main ON (sef_ref_file = main.fil_id)
    ";
    $list->sql_where = "sef_ref_service = $service->id";
    
    $list->add_field("Name", "fil_name");
    $list->add_field("Preview", "sef_ref_file_thumb_sm", ["function" => function($sef_ref_file_thumb_lg){
        return Lib_html_tags::image(Http_helper::build_url("index/xstream/fil_id/$sef_ref_file_thumb_lg"));
    }]);
    $list->add_field("Date added", "fil_date_created", ["function" => function($fil_date_created){ return Lib_date::strtodate($fil_date_created, Lib_date::$DATE_FORMAT_11); }]);
    
    $list->add_action_assoc("cms/vedit_service", ["ser_id" => "%ser_id%"]);
    $list->add_action_delete("system.ajax.requestFunction('person/xdelete/id/%ser_id%', function(){}, {confirm:true})");
    $list->display();
?>
