<?php
/**
 * Model: string
 *
 * css = https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.css
 * js = https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.js
 * 
 * @package scorpion3
 * @subpackage model
 * @author Liquid Edge Solutions
 * @copyright Copyright Liquid Edge Solutions. All rights reserved.
 *///--------------------------------------------------------------------------------
class Lib_fancy_box {
 	//--------------------------------------------------------------------------------
 	// properties
	//--------------------------------------------------------------------------------
    private $html = false;
    private $add_new_button = false;
    private $image_url_arr = [];
 	//--------------------------------------------------------------------------------
 	// functions
	//--------------------------------------------------------------------------------
    public function add_button($onclick = 'javascript:;'){
        $this->add_new_button = '
            <a onclick="'.$onclick.'" style="text-decoration: none;" class="fancy-box-image">
                <div class="fancy-box-add-wrapper"><i class="fa fa-plus fancy-box-add-li" aria-hidden="true"></i></div>
            </a>
        ';
    }
	//--------------------------------------------------------------------------------
    public function add_image_url($url_thumb, $url_main){
        $this->image_url_arr[] = [
            "thumb" => $url_thumb,
            "main" => $url_main,
        ];
    }
	//--------------------------------------------------------------------------------
    public function build_html(){
        $image_html = "
            <style>
                .fancy-box-thumb{ padding-bottom: 3px; border-radius: 5px;}
                .fancy-box-add-wrapper{ display: inline-grid; width: 50px; height: 50px; cursor:pointer; border-radius: 5px;}
                .fancy-box-add-wrapper:hover{ background-color: #F5F5F5; }
                .fancy-box-add-li{ font-size:16px; margin: 0px; display: inline-flex; align-items: center; justify-content: center; }
            </style>
            ";
        
        $image_html .= $this->add_new_button;
        
        foreach ($this->image_url_arr as $key => $value) {
            $image_html .= "
                <a href='{$value["main"]}' class='fancy-box-image' data-fancybox='images' data-width='900' data-height='500'>
                    <img class='fancy-box-thumb' src='{$value["thumb"]}' />
                </a>
            ";
        }
        return $this->html = "
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.css'>
            $image_html
            <script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.js'></script>
            <script>
                $(document).ready(function(){
                    setTimeout(function(){
                        $('[data-fancybox]').fancybox({
                            fullScreen : false,
                            defaults: {
                                fullScreen : false,
                            },
                            afterLoad: function () {
                                var styles = {
                                    'display' : 'flex',
                                    'align-items' : 'center',
                                    'justify-content' : 'center',
                                };
                                $('.fancybox-iframe').contents().find('body').css(styles);
                                $('.fancybox-iframe').css('background', 'none');
                                $('.fancybox-content').css('background-color', 'transparent');
                                $('.fancybox-button--fullscreen').addClass('hidden');
                            },
                        });
                    },300);
                });
            </script>
        ";
    }
	//--------------------------------------------------------------------------------
    public function get_output(){
        return $this->build_html();
    }
	//--------------------------------------------------------------------------------
    public function output(){
        echo $this->build_html();
    }
    //--------------------------------------------------------------------------------
}