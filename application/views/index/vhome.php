<?php
//    console('No direct script access allowed');

    $attributes = array("name" => "comment-form");
    
    $html = new Lib_html();
    $html->header("New form");
    $html->form("welcome/xedit");
        $html->add_column("half");
            $html->fieldset_open("test header");
            $html->itext("test", "test");
            $html->iselect("test select", "teat_select", [1 => "test1", 2 => "test2"], 2);
            $html->iselect("test select", "teat_select", [1 => "test1", 2 => "test2"], 2);
            $html->fieldset_close();
        $html->end_column();
    $html->end_form();
    $html->display();
    
//$style_arr = [
//        "font-size",
//    ];
//    
//    foreach ($style_arr as $value) {
//        $i = 10;
//        for ($index = 0; $index < $i; $index++) {
//            if($i == 30){ break; }
//            echo ".{$value}-{$i} { {$value}: {$i}px; }";
//            echo "<br/>";
//            $i+=5;
//        }
//    }    
    
    ?>

