<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $list = new Lib_list();
    $list->sql_key = "sef_id";
    $list->sql_select = "sef_id, sef_type, sef_ref_file_thumb_lg, sef_ref_file_thumb_sm, sef_ref_file, fil_name";
    $list->sql_from = "service_file LEFT JOIN file ON (sef_ref_file = fil_id)";
    $list->sql_where = "sef_ref_service = $service->id";
    
    $list->add_field("Name", "fil_name", ["#width" => "15%"]);
    $list->add_field("Type", "sef_type", ["#width" => "15%"]);
    
    $list->add_action_assoc("cms/vedit_service", ["ser_id" => "%ser_id%"]);
    $list->add_action_delete("system.ajax.requestFunction('person/xdelete/id/%ser_id%', function(){}, {confirm:true})");
    $list->display();
?>
