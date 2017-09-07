<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    
    $html = new Lib_html();
    
    $html->container_fluid = true;
    $html->header("Add Review", 3);
    $html->form("cms/xadd_review");
        $html->add_menu_button("Cancel", "system.browser.redirect('cms/vedit_service/$service->id')");
        $html->add_menu_submitbutton("Save Changes");
            $html->add_column("half");
                $html->fieldset_open("General Details");
                $html->value("Rating", Lib_html_tags::get_rating_html("srr_rating"));
                $html->ihidden("srr_ref_service", $service->id);
                $html->ihidden("srr_date_created", Lib_date::strtodatetime());
                $html->dbinput($service_review, "srr_title", ["required" => true]);
                $html->dbinput($service_review, "srr_body", ["required" => true]);
                $html->fieldset_close();
            $html->end_column();
    $html->end_form();
    $html->display();
    
    ?>
                

