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
    $list->add_field("Preview", "sef_id", ["function" => function($sef_id){
        $service_file = Lib_db::load_db("service_file", "sef_id = $sef_id");
        $sef_ref_file_thumb_tiny = Http_helper::build_url("index/xstream/fil_id/{$service_file->get("sef_ref_file_thumb_tiny")}");
        $sef_ref_file_thumb_lg = Http_helper::build_url("index/xstream/fil_id/{$service_file->get("sef_ref_file_thumb_lg")}");
        return "
            <a href='$sef_ref_file_thumb_lg' class='fancy-box-image' data-fancybox='images' data-width='900' data-height='500'>
                <img class='fancy-box-thumb' src='$sef_ref_file_thumb_tiny' />
            </a>
        ";
    }]);
    
    $list->add_action_delete("cms/xdelete_service_file/sef_id/%sef_id%");
    $list->display();
?>
