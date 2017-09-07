<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $html = new Lib_html();
    $this->load->library("addons/Lib_fancy_box");
    $fancy_box = new Lib_fancy_box();
    
    $html->container_fluid = true;
    $html->header("General Details", 3);
    $html->form("cms/xedit_service");
        $html->add_menu_button("back", "system.browser.redirect('cms/vlist_service')");
        $html->add_menu_submitbutton("Save Changes");
            $html->ihidden("ser_id", $service->id);
            $html->add_column("third");
                $html->fieldset_open("General Details");
                    $html->dbinput($service, "ser_ref_service_type", ["required" => true]);
                    $html->dbinput($service, "ser_title", ["required" => true]);
                    $html->dbinput($service, "ser_email", ["required" => true]);
                    $html->dbinput($service, "ser_contact_nr", ["required" => true]);
                    $html->dbinput($service, "ser_website", ["required" => true]);
                    $html->dbinput($service, "ser_details", ["required" => true]);
                $html->fieldset_close();
            $html->end_column();
            $html->add_column("third");
                $html->fieldset_open("Location & Social");
                    $html->dbinput($service, "ser_location_link", ["required" => true]);
                    $html->dbinput($service, "ser_facebook_link");
                    $html->dbinput($service, "ser_twitter_link");
                    $html->dbinput($service, "ser_google_link");
                    $html->dbinput($service, "ser_location", ["required" => true]);
                    $html->ihidden("file_dest", "assets/files/upload/service/$service->id/");
                $html->fieldset_close();
                $html->fieldset_open("Reviews");
                    $html->value(false, $file_list_reviews);
                $html->fieldset_close();
            $html->end_column();
            $html->add_column("third");
                $html->fieldset_open("Images");
                    $html->ifile_dropzone("Upload Image", "file", "assets/files/upload/service/$service->id/", [
                        "url_delete" => "cms/xdelete_file",
                    ]);
                    $html->value(false, $fancy_box->get_output());
                    $html->value(false, $file_list);
                    
                    ?>

                    <?php
                $html->fieldset_close();
            $html->end_column();
    $html->end_form();
    $html->display();
    
    ?>
                

