<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $service->obj->ser_type = request_key();
    
    $html = new Lib_html();
    
    $html->container_fluid = true;
    $html->header("General Details", 3);
    $html->form("cms/xadd_service");
        $html->add_menu_button("Cancel", "system.browser.redirect('cms/vlist_service/$service_type->id')");
        $html->add_menu_submitbutton("Save Changes");
            $html->ihidden("ser_id", $service->id);
            $html->ihidden("ser_ref_service_type", $service_type->id);
            $html->add_column("half");
                $html->fieldset_open("General Details");
                    $html->value("Category", $service_type->get("srv_name"));
                    $html->dbinput($service, "ser_title", ["required" => true]);
                    $html->dbinput($service, "ser_email", ["required" => true]);
                    $html->dbinput($service, "ser_contact_nr", ["required" => true, "type" => "number"]);
                    $html->dbinput($service, "ser_website", ["required" => true]);
                    $html->dbinput($service, "ser_details", ["required" => true]);
                $html->fieldset_close();
            $html->end_column();
            $html->add_column("half");
                $html->fieldset_open("Location & Social");
                    $html->dbinput($service, "ser_location_link", ["required" => true]);
                    $html->dbinput($service, "ser_facebook_link");
                    $html->dbinput($service, "ser_twitter_link");
                    $html->dbinput($service, "ser_google_link");
                    $html->dbinput($service, "ser_location", ["required" => true]);
                $html->fieldset_close();
            $html->end_column();
    $html->end_form();
    $html->display();
    
    ?>
                

