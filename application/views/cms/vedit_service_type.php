<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $html = new Lib_html();
    
    $html->container_fluid = true;
    $html->header("General Details", 3);
    $html->form("cms/xedit_service_type");
        $html->add_menu_button("Back", "system.browser.redirect('cms/vlist_service_type')");
        $html->add_menu_submitbutton("Save Changes");
            $html->add_column("half");
                $html->fieldset_open("General Details");
                    $html->ihidden("srv_id", $service_type->id);
                    $html->dbinput($service_type, "srv_name");
                    $html->dbinput($service_type, "srv_is_active");
                    $html->iselect_icon("Icon", "srv_icon", $service_type->get("srv_icon"));
//                    $html->iselect("Icon", "icon", );
                $html->fieldset_close();
            $html->end_column();
    $html->end_form();
    $html->display();
    
    ?>
                

