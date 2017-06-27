<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $html = new Lib_html();
    $html->container_fluid = true;
    
    $html->header("Website Content", 3);
    $html->form("cms/xedit_service");
        $html->add_menu_button("back", "system.browser.redirect('cms/vlist_service')");
        $html->add_menu_submitbutton("Save Changes");
            $html->add_column("third");
                $html->fieldset_open("Home Section");
                    $html->dbinput($config, "con_intro");
                    $html->dbinput($config, "con_about");
                $html->fieldset_close();
            $html->end_column();
            $html->add_column("third");
                $html->fieldset_open("General Details");
                    $html->dbinput($config, "con_email");
                    $html->dbinput($config, "con_twitter");
                    $html->dbinput($config, "con_facebook");
                    $html->dbinput($config, "con_google");
                    $html->dbinput($config, "con_instagram");
                $html->fieldset_close();
            $html->end_column();
            $html->add_column("third");
                $html->fieldset_open("Enabled Services");
                    $html->icheckbox_multi("Services", "test", Lib_db::get_enum_arr("service", "ser_type", [""]), [1, 2]);
                $html->fieldset_close();
            $html->end_column();
    $html->end_form();
    $html->display();
    
    
    ?>
                

