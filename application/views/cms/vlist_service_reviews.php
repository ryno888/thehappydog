<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $list = new Lib_list();
    $list->sql_key = "srr_id";
    $list->sql_select = "srr_id, srr_rating, srr_title, srr_body, srr_date_created";
    $list->sql_from = "service_review";
    $list->sql_where = "srr_ref_service = $service->id";
    $list->add_new_btn("Add Review", "system.browser.redirect('cms/vadd_service_review/$service->id');");
    
    $list->add_field("Name", "srr_title", ["function" => function($srr_title){ return "<span title='$srr_title'>".Lib_string::limit_string_by_length($srr_title)."</span>"; }]);
    $list->add_field("Rating", "srr_rating", ["function" => function($srr_rating){ return Lib_html_tags::get_static_rating_html($srr_rating); }]);
    
    $list->add_action_delete("cms/xdelete_service_rating/srr_id/%srr_id%");
    $list->display();
?>
