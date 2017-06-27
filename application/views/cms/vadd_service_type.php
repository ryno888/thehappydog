<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $html = new Lib_html();
    
    $html->container_fluid = true;
    $html->header("General Details", 3);
    $html->form("cms/xadd_service_type");
        $html->add_menu_button("Cancel", "system.browser.redirect('cms/vlist_service')");
        $html->add_menu_submitbutton("Save Changes");
            $html->add_column("half");
                $html->fieldset_open("General Details");
                $html->fieldset_close();
            $html->end_column();
            $html->add_column("half");
                $html->fieldset_open("Location & Social");
                $html->fieldset_close();
            $html->end_column();
    $html->end_form();
    $html->display();
    
    ?>
                

