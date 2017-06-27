<?php

/*
 * Class 
 * @filename lib 
 * @encoding UTF-8
 * @author Liquid Edge Solutions  * 
 * @copyright Copyright Liquid Edge Solutions. All rights reserved. * 
 * @programmer Ryno van Zyl * 
 * @date 14 Feb 2017 * 
 */

/**
 * Description of lib
 *
 * @author Ryno
 */
class Lib_html extends Lib_core{
    public $container_fluid = false;
    private $form_id = false;
    private $form_success_js = false;
    private $form_error_js = false;
    private $html = [
        "html" => false,
        "form_open" => false,
        "form_close" => false,
        "header" => false,
        "script_ready" => false,
        "script" => false,
    ];
    private $menu_html = [];
    //--------------------------------------------------------------------------
    public function __construct() {
        parent::__construct();
        $this->ci->load->library("html/Lib_html_tags");
    }
    //--------------------------------------------------------------------------
    public function form($action, $id = false, $attributes_arr = [], $options = []) {
        $attributes = array_merge([
        ], $attributes_arr);
        
        if(!$id){ $id = "form_".time(); }
        $this->form_id = $id;
        
        $this->add_html("form_open", Lib_html_tags::form_open($action, $id, $attributes, $options));
    }
    //--------------------------------------------------------------------------
    public function end_form() {
        $this->add_html("form_close", Lib_html_tags::form_close());
    }
    //--------------------------------------------------------------------------
    public function fieldset_open($header = "", $options = []) {
        $options_arr = array_merge([
        ], $options);
        
        $this->add_html("html", Lib_html_tags::fieldset_open($header));
    }
    //--------------------------------------------------------------------------
    public function fieldset_close() {
        $this->add_html("html", Lib_html_tags::fieldset_close());
    }
    //--------------------------------------------------------------------------
    public function header($label, $type = 1, $attributes_arr = []) {
        $attributes = array_merge([
            "container_fluid" => $this->container_fluid
        ], $attributes_arr);
        
        $this->add_html("header", Lib_html_tags::header($label, $type, $attributes));
    }
    //--------------------------------------------------------------------------
    public function add_title($title, $info = false, $options = []) {
        $this->add_html("html", Lib_html_tags::title($title, $info, $options));
    }
    //--------------------------------------------------------------------------
    public function iradio_multi($label, $id, $item_arr = [], $checked = false, $options = []) {
        $options_arr = array_merge([
            "enable_set_value" => false,
        ], $options);
        
        $error = form_error($id);
        if($error){
            $label .= "<div class='form-error-label'>$error</div>";
        }
        $this->add_html("html", Lib_html_tags::iradio_multi($label, $id, $item_arr, $checked, $options_arr));
    }
    //--------------------------------------------------------------------------
    public function icheckbox_multi($label, $id, $item_arr = [], $checked = false, $options = []) {
        $options_arr = array_merge([
            "enable_set_value" => false,
        ], $options);
        
        $error = form_error($id);
        if($error){
            $label .= "<div class='form-error-label'>$error</div>";
        }
        $this->add_html("html", Lib_html_tags::icheckbox_multi($label, $id, $item_arr, $checked, $options_arr));
    }
    //--------------------------------------------------------------------------
    public function iradio($label, $id, $checked = false, $options = []) {
        $options_arr = array_merge([
            "enable_set_value" => false,
        ], $options);
        
        $error = form_error($id);
        if($error){
            $label .= "<div class='form-error-label'>$error</div>";
        }
        $this->add_html("html", Lib_html_tags::iradio($label, $id, $checked, $options_arr));
    }
    //--------------------------------------------------------------------------
    public function icheckbox($label, $id, $checked = false, $options = []) {
        $options_arr = array_merge([
            "enable_set_value" => false,
        ], $options);
        
        $error = form_error($id);
        if($error){
            $label .= "<div class='form-error-label'>$error</div>";
        }
        $this->add_html("html", Lib_html_tags::icheckbox($label, $id, $checked, $options_arr));
    }
    //--------------------------------------------------------------------------
    public function itext($label, $id, $value = false, $options = []) {
        $options_arr = array_merge([
            "enable_set_value" => false,
        ], $options);
        
        $error = form_error($id);
        if($error){
            $label .= "<div class='form-error-label'>$error</div>";
        }
        $this->add_html("html", Lib_html_tags::itext($label, $id, $value, $options_arr));
    }
    //--------------------------------------------------------------------------
    public function itextarea($label, $id, $value = false, $options = []) {
        $options_arr = array_merge([
            "enable_set_value" => false,
        ], $options);
        
        $error = form_error($id);
        if($error){
            $label .= "<div class='form-error-label'>$error</div>";
        }
        $this->add_html("html", Lib_html_tags::itextarea($label, $id, $value, $options_arr));
    }
    //--------------------------------------------------------------------------
    public function idate($label, $id, $value = false, $options = []) {
        $options_arr = array_merge([
            "enable_set_value" => false,
        ], $options);
        $error = form_error($id);
        if($error){
            $label .= "<div class='form-error-label'>$error</div>";
        }
        $this->add_html("html", Lib_html_tags::idate_picker($id, $label, $value, $options_arr));
    }
    //--------------------------------------------------------------------------
    public function idatetime($label, $id, $value = false, $options = []) {
        $options_arr = array_merge([
            "enable_set_value" => false,
        ], $options);
        $error = form_error($id);
        if($error){
            $label .= "<div class='form-error-label'>$error</div>";
        }
        $this->add_html("html", Lib_html_tags::idatetime($id, $label, $value, $options_arr));
    }
    //--------------------------------------------------------------------------
    public function ifile($label, $id, $value = false, $options = []) {
        $error = form_error($id);
        if($error){
            $label .= "<div class='form-error-label'>$error</div>";
        }
        $this->add_html("html", Lib_html_tags::ifile($label, $id, $value, $options));
    }
    //--------------------------------------------------------------------------
    public function ifile_dropzone($label, $id, $dest, $options = []) {
        $error = form_error($id);
        if($error){
            $label .= "<div class='form-error-label'>$error</div>";
        }
        $this->ihidden("file_dest", urlencode($dest));
        $this->add_html("html", Lib_html_tags::ifile_dropzone($label, $id, $dest, $options));
    }
    //--------------------------------------------------------------------------
    public function dbinput($obj, $field, $options = []) {
        
        $options_arr = array_merge([
            "function" => false
        ], $options);
        switch ($obj->get_field_type($field)) {
            case DB_VARCHAR:
                return $this->itext(ucwords($obj->get_field_display($field)), $field, $obj->get($field, $options_arr["function"], $options), $options);
            case DB_DATETIME:
                return $this->idate(ucwords($obj->get_field_display($field)), $field, $obj->get($field, $options_arr["function"], $options), $options);
            case DB_DATE:
                return $this->idate(ucwords($obj->get_field_display($field)), $field, $obj->get($field, $options_arr["function"], $options), $options);
            case DB_YEAR:
                return $this->idate(ucwords($obj->get_field_display($field)), $field, $obj->get($field, $options_arr["function"], $options), $options);
            case DB_TINYINT:
                return $this->iselect(ucwords($obj->get_field_display($field)), $field, array_map('ucwords', $obj->{$field}), $obj->get($field, $options_arr["function"], $options), $options);
            case DB_TEXT:
                return $this->itextarea(ucwords($obj->get_field_display($field)), $field, $obj->get($field, $options_arr["function"], $options), $options);
            case DB_ENCRYPT:
                return $this->ipassword(ucwords($obj->get_field_display($field)), $field, false, $options);
            case DB_REFERENCE:
                return $this->iselect(ucwords($obj->get_field_display($field)), $field, array_map('ucwords', $obj->get_list($field)), $obj->get($field, $options_arr["function"], $options), $options);
            default:
                break;
        }
    }
    //--------------------------------------------------------------------------
    public function dbvalue($obj, $field, $options = []) {
        
        $options_arr = array_merge([
            "function" => false
        ], $options);
        switch ($obj->get_field_type($field)) {
            case DB_VARCHAR:
                return $this->itext(ucwords($obj->get_field_display($field)), $field, $obj->get($field, $options_arr["function"], $options), $options);
                return $this->itext(ucwords($obj->get_field_display($field)), $field, $obj->get($field, $options_arr["function"], $options), $options);
            case DB_DATETIME:
                return $this->idate(ucwords($obj->get_field_display($field)), $field, $obj->get($field, $options_arr["function"], $options), $options);
            case DB_DATE:
                return $this->idate(ucwords($obj->get_field_display($field)), $field, $obj->get($field, $options_arr["function"], $options), $options);
            case DB_YEAR:
                return $this->idate(ucwords($obj->get_field_display($field)), $field, $obj->get($field, $options_arr["function"], $options), $options);
            case DB_TINYINT:
                return $this->iselect(ucwords($obj->get_field_display($field)), $field, array_map('ucwords', $obj->{$field}), $obj->get($field, $options_arr["function"], $options), $options);
            case DB_TEXT:
                return $this->itextarea(ucwords($obj->get_field_display($field)), $field, $obj->get($field, $options_arr["function"], $options), $options);
            case DB_ENCRYPT:
                return $this->ipassword(ucwords($obj->get_field_display($field)), $field, false, $options);

            default:
                break;
        }
    }
    //--------------------------------------------------------------------------
    public function value($label, $value = false, $options = []) {
        $options_arr = array_merge([
        ], $options);
        
        $this->add_html("html", Lib_html_tags::value($label, $value, $options_arr));
    }
    //--------------------------------------------------------------------------
    public function ihidden($id, $value = false, $options = []) {
        $options_arr = array_merge([
        ], $options);
        
        $this->add_html("html", form_hidden($id, $value));
    }
    //--------------------------------------------------------------------------
    public function ipassword($label, $id, $value = false, $options = []) {
        $options_arr = array_merge([
        ], $options);
        
        $this->add_html("html", Lib_html_tags::ipassword($label, $id, $value, $options_arr));
    }
    //--------------------------------------------------------------------------
    public function iselect($label, $id, $value_arr = [], $value = false, $options = []) {
        $options_arr = array_merge([
        ], $options);
        
        $this->add_html("html", Lib_html_tags::iselect($label, $id, $value_arr, $value, $options_arr));
    }
    //--------------------------------------------------------------------------
    public function add_menu_button($label, $onclick = "javascript:;", $options = []) {
        $options_arr = array_merge([
            "icon" => false,
            "btn" => false,
        ], $options);
        
        if(!$options_arr["btn"]){
            switch (strtolower($label)) {
                case "cancel": $options_arr["btn"] = "btn-danger"; $options_arr["icon"] = $options_arr["icon"] ? $options_arr["icon"] : "fa-times"; break;
                case "back": $options_arr["btn"] = "btn-warning"; $options_arr["icon"] = $options_arr["icon"] ? $options_arr["icon"] : "fa-chevron-left"; break;
                default: $options_arr["btn"] = "btn-primary"; break;
            }
        }
        
        $html_options = Lib_html_tags::get_html_options($options);
        
        $icon = $options_arr["icon"] ? '<i class="fa '.$options_arr["icon"].'" aria-hidden="true"></i> ' : '';
        $this->menu_html[] = '<button onclick="'.$onclick.'" style="'.$html_options['style'].'" class="btn '.$options_arr["btn"].' '.$html_options['css'].' margin-right-5" type="button" '.$html_options['attr'].' >'.$icon.$label.'</button>';
    }
    //--------------------------------------------------------------------------
    public function add_menu_submitbutton($label, $onclick = false, $options = []) {
        $options_arr = array_merge([
            "icon" => "fa-save",
            "attributes" => [
                "class" => "btn btn-primary margin-right-5",
                "value" => "Save Changes",
            ],
        ], $options);
        
        $this->set_form_js("success");
        $this->set_form_js("error");
        
        $icon = $options_arr["icon"] ? '<i class="fa '.$options_arr["icon"].'" aria-hidden="true"></i> ' : '';
        if($onclick === false){
            $onclick = "
                showLoader();
                system.ajax.submitForm('$this->form_id', {success: function(data){
                    hideLoader(0);
                    setTimeout(function(){
                        $this->form_success_js
                    }, 400);
                }, error: function(){
                    hideLoader(0);
                    setTimeout(function(){
                        $this->form_error_js
                    }, 400);
                }});
                
            ";
        }
        
        $this->menu_html[] = '<button onclick="'.$onclick.'" class="btn btn-success margin-right-5" type="button">'.$icon.$label.'</button>';
    }
    //--------------------------------------------------------------------------
    public function set_form_js($type = "success", $js = false) {
        switch ($type) {
            case "success":
                $this->form_success_js = $js ? $js : "
                    if(data.code == 1){
                        system.browser.error(data.message);
                    }else if(data.code == 2){
                        system.browser.message('Success', data.message);
                    }else if(data.code == 3){
                        if(data.action.type == 'refresh'){
                            $('.messageModalCloseBtn').click(function(){ location.reload() });
                        }else if(data.action.type == 'redirect'){
                            $('.messageModalCloseBtn').click(function(){
                                system.browser.redirect(data.action.url);
                            });
                        }
                        system.browser.message('Success', data.message);
                    }else{
                        location.reload();
                    }
                ";
                break;
            case "error":
                $this->form_error_js = $js ? $js : "
                    system.browser.error('An error has occured. If this presists, please contact your system administrator.');
                ";
                break;
        }
        
    }
    //--------------------------------------------------------------------------
    public function build_menu_html() {
        $menu_wrapper= '';
        $container = $this->container_fluid ? "container-fluid" : "container";
        if(count($this->menu_html) > 0){
            $menu = implode(" ", $this->menu_html);
            $menu_wrapper = "
                <div class='$container margin-bottom-10'>
                    <div class='btn-group btn-group-sm' role='group'>
                        $menu
                    </div>
                </div>
            ";
        }
        $this->add_html("header", $menu_wrapper);
    }
    //--------------------------------------------------------------------------
    public function add_html($key, $html) {
        $this->html[$key] .= $html;
    }
    //--------------------------------------------------------------------------
    public function add_script($script, $ready = true) {
        if($ready){
            $this->html["script_ready"] .= $script;
        }else{
            $this->html["script"] .= $script;
        }
    }
    //--------------------------------------------------------------------------
    public function add_column($size) {
        switch ($size) {
            case "full": $this->add_html("html", "<div class='col-md-12'>"); break;
            case "half": $this->add_html("html", "<div class='col-md-6'>"); break;
            case "third": $this->add_html("html", "<div class='col-md-4'>"); break;
            case "quarter": $this->add_html("html", "<div class='col-md-3'>"); break;
        }
    }
    //--------------------------------------------------------------------------
    public function end_column() {
        $this->add_html("html", "</div>");
    }
    //--------------------------------------------------------------------------
    public function container_wrapper($html) {
        $container = $this->container_fluid ? "container-fluid" : "container";
        $script_ready = strlen(trim($html['script_ready'])) > 1 ? "
            <script>
                $(document).ready(function(){
                    {$html['script_ready']}
                });
            </script>
        " : "";
        $script = strlen(trim($html['script'])) > 1 ? "
            <script>
                {$html['script']}
            </script>
        " : "";
        return "
            <div class='$container'>
                <div class='row'>
                    {$html['form_open']}
                    {$html['header']}
                    {$html['html']}
                    {$html['form_close']}
                    {$script_ready}
                    {$script}
                </div>
            </div>
        ";
    }
    //--------------------------------------------------------------------------
    public function display($return = false) {
        $this->build_menu_html();
        if ($return) {
            return $this->container_wrapper($this->html);;
        }
        echo $this->container_wrapper($this->html);
    }
    //--------------------------------------------------------------------------
    public function get() {
        $this->build_menu_html();
        return $this->container_wrapper($this->html);
    }
    //--------------------------------------------------------------------------
    public static function make() {
        $ci = &get_instance();
        $ci->load->library("Lib_database");
        return $this->ci->db;
    }
    //--------------------------------------------------------------------------
    public function iselect_icon($label, $id, $value = false, $options = []) {
        $icon_arr = [
            'fa-align-left'=> '&#xf036',
            'fa-align-right'=> '&#xf038',
            'fa-ambulance'=> '&#xf0f9',
            'fa-anchor'=> '&#xf13d',
            'fa-android'=> '&#xf17b',
            'fa-angellist'=> '&#xf209',
            'fa-angle-double-down'=> '&#xf103',
            'fa-angle-double-left'=> '&#xf100',
            'fa-angle-double-right'=> '&#xf101',
            'fa-angle-double-up'=> '&#xf102',
            'fa-angle-left'=> '&#xf104',
            'fa-angle-right'=> '&#xf105',
            'fa-angle-up'=> '&#xf106',
            'fa-apple'=> '&#xf179',
            'fa-archive'=> '&#xf187',
            'fa-area-chart'=> '&#xf1fe',
            'fa-arrow-circle-down'=> '&#xf0ab',
            'fa-arrow-circle-left'=> '&#xf0a8',
            'fa-arrow-circle-o-down'=> '&#xf01a',
            'fa-arrow-circle-o-left'=> '&#xf190',
            'fa-arrow-circle-o-right'=> '&#xf18e',
            'fa-arrow-circle-o-up'=> '&#xf01b',
            'fa-arrow-circle-right'=> '&#xf0a9',
            'fa-arrow-circle-up'=> '&#xf0aa',
            'fa-arrow-down'=> '&#xf063',
            'fa-arrow-left'=> '&#xf060',
            'fa-arrow-right'=> '&#xf061',
            'fa-arrow-up'=> '&#xf062',
            'fa-arrows'=> '&#xf047',
            'fa-arrows-alt'=> '&#xf0b2',
            'fa-arrows-h'=> '&#xf07e',
            'fa-arrows-v'=> '&#xf07d',
            'fa-asterisk'=> '&#xf069',
            'fa-at'=> '&#xf1fa',
            'fa-automobile'=> '&#xf1b9',
            'fa-backward'=> '&#xf04a',
            'fa-balance-scale'=> '&#xf24e',
            'fa-ban'=> '&#xf05e',
            'fa-bank'=> '&#xf19c',
            'fa-bar-chart'=> '&#xf080',
            'fa-bar-chart-o'=> '&#xf080',
            'fa-battery-full'=> '&#xf240',
            'fa-beer'=> '&#xf0fc',
            'fa-behance'=> '&#xf1b4',
            'fa-behance-square'=> '&#xf1b5',
            'fa-bell'=> '&#xf0f3',
            'fa-bell-o'=> '&#xf0a2',
            'fa-bell-slash'=> '&#xf1f6',
            'fa-bell-slash-o'=> '&#xf1f7',
            'fa-bicycle'=> '&#xf206',
            'fa-binoculars'=> '&#xf1e5',
            'fa-birthday-cake'=> '&#xf1fd',
            'fa-bitbucket'=> '&#xf171',
            'fa-bitbucket-square'=> '&#xf172',
            'fa-bitcoin'=> '&#xf15a',
            'fa-black-tie'=> '&#xf27e',
            'fa-bold'=> '&#xf032',
            'fa-bolt'=> '&#xf0e7',
            'fa-bomb'=> '&#xf1e2',
            'fa-book'=> '&#xf02d',
            'fa-bookmark'=> '&#xf02e',
            'fa-bookmark-o'=> '&#xf097',
            'fa-briefcase'=> '&#xf0b1',
            'fa-btc'=> '&#xf15a',
            'fa-bug'=> '&#xf188',
            'fa-building'=> '&#xf1ad',
            'fa-building-o'=> '&#xf0f7',
            'fa-bullhorn'=> '&#xf0a1',
            'fa-bullseye'=> '&#xf140',
            'fa-bus'=> '&#xf207',
            'fa-cab'=> '&#xf1ba',
            'fa-calendar'=> '&#xf073',
            'fa-camera'=> '&#xf030',
            'fa-car'=> '&#xf1b9',
            'fa-caret-up'=> '&#xf0d8',
            'fa-cart-plus'=> '&#xf217',
            'fa-cc'=> '&#xf20a',
            'fa-cc-amex'=> '&#xf1f3',
            'fa-cc-jcb'=> '&#xf24b',
            'fa-cc-paypal'=> '&#xf1f4',
            'fa-cc-stripe'=> '&#xf1f5',
            'fa-cc-visa'=> '&#xf1f0',
            'fa-chain'=> '&#xf0c1',
            'fa-check'=> '&#xf00c',
            'fa-chevron-left'=> '&#xf053',
            'fa-chevron-right'=> '&#xf054',
            'fa-chevron-up'=> '&#xf077',
            'fa-child'=> '&#xf1ae',
            'fa-chrome'=> '&#xf268',
            'fa-circle'=> '&#xf111',
            'fa-circle-o'=> '&#xf10c',
            'fa-circle-o-notch'=> '&#xf1ce',
            'fa-circle-thin'=> '&#xf1db',
            'fa-clipboard'=> '&#xf0ea',
            'fa-clock-o'=> '&#xf017',
            'fa-clone'=> '&#xf24d',
            'fa-close'=> '&#xf00d',
            'fa-cloud'=> '&#xf0c2',
            'fa-cloud-download'=> '&#xf0ed',
            'fa-cloud-upload'=> '&#xf0ee',
            'fa-cny'=> '&#xf157',
            'fa-code'=> '&#xf121',
            'fa-code-fork'=> '&#xf126',
            'fa-codepen'=> '&#xf1cb',
            'fa-coffee'=> '&#xf0f4',
            'fa-cog'=> '&#xf013',
            'fa-cogs'=> '&#xf085',
            'fa-columns'=> '&#xf0db',
            'fa-comment'=> '&#xf075',
            'fa-comment-o'=> '&#xf0e5',
            'fa-commenting'=> '&#xf27a',
            'fa-commenting-o'=> '&#xf27b',
            'fa-comments'=> '&#xf086',
            'fa-comments-o'=> '&#xf0e6',
            'fa-compass'=> '&#xf14e',
            'fa-compress'=> '&#xf066',
            'fa-connectdevelop'=> '&#xf20e',
            'fa-contao'=> '&#xf26d',
            'fa-copy'=> '&#xf0c5',
            'fa-copyright'=> '&#xf1f9',
            'fa-creative-commons'=> '&#xf25e',
            'fa-credit-card'=> '&#xf09d',
            'fa-crop'=> '&#xf125',
            'fa-crosshairs'=> '&#xf05b',
            'fa-css3'=> '&#xf13c',
            'fa-cube'=> '&#xf1b2',
            'fa-cubes'=> '&#xf1b3',
            'fa-cut'=> '&#xf0c4',
            'fa-cutlery'=> '&#xf0f5',
            'fa-dashboard'=> '&#xf0e4',
            'fa-dashcube'=> '&#xf210',
            'fa-database'=> '&#xf1c0',
            'fa-dedent'=> '&#xf03b',
            'fa-delicious'=> '&#xf1a5',
            'fa-desktop'=> '&#xf108',
            'fa-deviantart'=> '&#xf1bd',
            'fa-diamond'=> '&#xf219',
            'fa-digg'=> '&#xf1a6',
            'fa-dollar'=> '&#xf155',
            'fa-download'=> '&#xf019',
            'fa-dribbble'=> '&#xf17d',
            'fa-dropbox'=> '&#xf16b',
            'fa-drupal'=> '&#xf1a9',
            'fa-edit'=> '&#xf044',
            'fa-eject'=> '&#xf052',
            'fa-ellipsis-h'=> '&#xf141',
            'fa-ellipsis-v'=> '&#xf142',
            'fa-empire'=> '&#xf1d1',
            'fa-envelope'=> '&#xf0e0',
            'fa-envelope-o'=> '&#xf003',
            'fa-eur'=> '&#xf153',
            'fa-euro'=> '&#xf153',
            'fa-exchange'=> '&#xf0ec',
            'fa-exclamation'=> '&#xf12a',
            'fa-exclamation-circle'=> '&#xf06a',
            'fa-exclamation-triangle'=> '&#xf071',
            'fa-expand'=> '&#xf065',
            'fa-expeditedssl'=> '&#xf23e',
            'fa-external-link'=> '&#xf08e',
            'fa-external-link-square'=> '&#xf14c',
            'fa-eye'=> '&#xf06e',
            'fa-eye-slash'=> '&#xf070',
            'fa-eyedropper'=> '&#xf1fb',
            'fa-facebook'=> '&#xf09a',
            'fa-facebook-f'=> '&#xf09a',
            'fa-facebook-official'=> '&#xf230',
            'fa-facebook-square'=> '&#xf082',
            'fa-fast-backward'=> '&#xf049',
            'fa-fast-forward'=> '&#xf050',
            'fa-fax'=> '&#xf1ac',
            'fa-feed'=> '&#xf09e',
            'fa-female'=> '&#xf182',
            'fa-fighter-jet'=> '&#xf0fb',
            'fa-file'=> '&#xf15b',
            'fa-file-archive-o'=> '&#xf1c6',
            'fa-file-audio-o'=> '&#xf1c7',
            'fa-file-code-o'=> '&#xf1c9',
            'fa-file-excel-o'=> '&#xf1c3',
            'fa-file-image-o'=> '&#xf1c5',
            'fa-file-movie-o'=> '&#xf1c8',
            'fa-file-o'=> '&#xf016',
            'fa-file-pdf-o'=> '&#xf1c1',
            'fa-file-photo-o'=> '&#xf1c5',
            'fa-file-picture-o'=> '&#xf1c5',
            'fa-file-powerpoint-o'=> '&#xf1c4',
            'fa-file-sound-o'=> '&#xf1c7',
            'fa-file-text'=> '&#xf15c',
            'fa-file-text-o'=> '&#xf0f6',
            'fa-file-video-o'=> '&#xf1c8',
            'fa-file-word-o'=> '&#xf1c2',
            'fa-file-zip-o'=> '&#xf1c6',
            'fa-files-o'=> '&#xf0c5',
            'fa-film'=> '&#xf008',
            'fa-filter'=> '&#xf0b0',
            'fa-fire'=> '&#xf06d',
            'fa-fire-extinguisher'=> '&#xf134',
            'fa-firefox'=> '&#xf269',
            'fa-flag'=> '&#xf024',
            'fa-flag-checkered'=> '&#xf11e',
            'fa-flag-o'=> '&#xf11d',
            'fa-flash'=> '&#xf0e7',
            'fa-flask'=> '&#xf0c3',
            'fa-flickr'=> '&#xf16e',
            'fa-floppy-o'=> '&#xf0c7',
            'fa-folder'=> '&#xf07b',
            'fa-folder-o'=> '&#xf114',
            'fa-folder-open'=> '&#xf07c',
            'fa-folder-open-o'=> '&#xf115',
            'fa-font'=> '&#xf031',
            'fa-fonticons'=> '&#xf280',
            'fa-forumbee'=> '&#xf211',
            'fa-forward'=> '&#xf04e',
            'fa-foursquare'=> '&#xf180',
            'fa-frown-o'=> '&#xf119',
            'fa-futbol-o'=> '&#xf1e3',
            'fa-gamepad'=> '&#xf11b',
            'fa-gavel'=> '&#xf0e3',
            'fa-gbp'=> '&#xf154',
            'fa-ge'=> '&#xf1d1',
            'fa-gear'=> '&#xf013',
            'fa-gears'=> '&#xf085',
            'fa-genderless'=> '&#xf22d',
            'fa-get-pocket'=> '&#xf265',
            'fa-gg'=> '&#xf260',
            'fa-gg-circle'=> '&#xf261',
            'fa-gift'=> '&#xf06b',
            'fa-git'=> '&#xf1d3',
            'fa-git-square'=> '&#xf1d2',
            'fa-github'=> '&#xf09b',
            'fa-github-alt'=> '&#xf113',
            'fa-github-square'=> '&#xf092',
            'fa-gittip'=> '&#xf184',
            'fa-glass'=> '&#xf000',
            'fa-globe'=> '&#xf0ac',
            'fa-google'=> '&#xf1a0',
            'fa-google-plus'=> '&#xf0d5',
            'fa-google-plus-square'=> '&#xf0d4',
            'fa-google-wallet'=> '&#xf1ee',
            'fa-graduation-cap'=> '&#xf19d',
            'fa-gratipay'=> '&#xf184',
            'fa-group'=> '&#xf0c0',
            'fa-h-square'=> '&#xf0fd',
            'fa-hacker-news'=> '&#xf1d4',
            'fa-hand-grab-o'=> '&#xf255',
            'fa-hand-lizard-o'=> '&#xf258',
            'fa-hand-o-down'=> '&#xf0a7',
            'fa-hand-o-left'=> '&#xf0a5',
            'fa-hand-o-right'=> '&#xf0a4',
            'fa-hand-o-up'=> '&#xf0a6',
            'fa-hand-paper-o'=> '&#xf256',
            'fa-hand-peace-o'=> '&#xf25b',
            'fa-hand-pointer-o'=> '&#xf25a',
            'fa-hand-rock-o'=> '&#xf255',
            'fa-hand-scissors-o'=> '&#xf257',
            'fa-hand-spock-o'=> '&#xf259',
            'fa-hand-stop-o'=> '&#xf256',
            'fa-hdd-o'=> '&#xf0a0',
            'fa-header'=> '&#xf1dc',
            'fa-headphones'=> '&#xf025',
            'fa-heart'=> '&#xf004',
            'fa-heart-o'=> '&#xf08a',
            'fa-heartbeat'=> '&#xf21e',
            'fa-history'=> '&#xf1da',
            'fa-home'=> '&#xf015',
            'fa-hospital-o'=> '&#xf0f8',
            'fa-hotel'=> '&#xf236',
            'fa-hourglass'=> '&#xf254',
            'fa-hourglass-1'=> '&#xf251',
            'fa-hourglass-2'=> '&#xf252',
            'fa-hourglass-3'=> '&#xf253',
            'fa-hourglass-end'=> '&#xf253',
            'fa-hourglass-half'=> '&#xf252',
            'fa-hourglass-o'=> '&#xf250',
            'fa-hourglass-start'=> '&#xf251',
            'fa-houzz'=> '&#xf27c',
            'fa-html5'=> '&#xf13b',
            'fa-i-cursor'=> '&#xf246',
            'fa-ils'=> '&#xf20b',
            'fa-image'=> '&#xf03e',
            'fa-inbox'=> '&#xf01c',
            'fa-indent'=> '&#xf03c',
            'fa-industry'=> '&#xf275',
            'fa-info'=> '&#xf129',
            'fa-info-circle'=> '&#xf05a',
            'fa-inr'=> '&#xf156',
            'fa-instagram'=> '&#xf16d',
            'fa-institution'=> '&#xf19c',
            'fa-internet-explorer'=> '&#xf26b',
            'fa-intersex'=> '&#xf224',
            'fa-ioxhost'=> '&#xf208',
            'fa-italic'=> '&#xf033',
            'fa-joomla'=> '&#xf1aa',
            'fa-jpy'=> '&#xf157',
            'fa-jsfiddle'=> '&#xf1cc',
            'fa-key'=> '&#xf084',
            'fa-keyboard-o'=> '&#xf11c',
            'fa-krw'=> '&#xf159',
            'fa-language'=> '&#xf1ab',
            'fa-laptop'=> '&#xf109',
            'fa-lastfm'=> '&#xf202',
            'fa-lastfm-square'=> '&#xf203',
            'fa-leaf'=> '&#xf06c',
            'fa-leanpub'=> '&#xf212',
            'fa-legal'=> '&#xf0e3',
            'fa-lemon-o'=> '&#xf094',
            'fa-level-down'=> '&#xf149',
            'fa-level-up'=> '&#xf148',
            'fa-life-bouy'=> '&#xf1cd',
            'fa-life-buoy'=> '&#xf1cd',
            'fa-life-ring'=> '&#xf1cd',
            'fa-life-saver'=> '&#xf1cd',
            'fa-lightbulb-o'=> '&#xf0eb',
            'fa-line-chart'=> '&#xf201',
            'fa-link'=> '&#xf0c1',
            'fa-linkedin'=> '&#xf0e1',
            'fa-linkedin-square'=> '&#xf08c',
            'fa-linux'=> '&#xf17c',
            'fa-list'=> '&#xf03a',
            'fa-list-alt'=> '&#xf022',
            'fa-list-ol'=> '&#xf0cb',
            'fa-list-ul'=> '&#xf0ca',
            'fa-location-arrow'=> '&#xf124',
            'fa-lock'=> '&#xf023',
            'fa-long-arrow-down'=> '&#xf175',
            'fa-long-arrow-left'=> '&#xf177',
            'fa-long-arrow-right'=> '&#xf178',
            'fa-long-arrow-up'=> '&#xf176',
            'fa-magic'=> '&#xf0d0',
            'fa-magnet'=> '&#xf076',
            'fa-mars-stroke-v'=> '&#xf22a',
            'fa-maxcdn'=> '&#xf136',
            'fa-meanpath'=> '&#xf20c',
            'fa-medium'=> '&#xf23a',
            'fa-medkit'=> '&#xf0fa',
            'fa-meh-o'=> '&#xf11a',
            'fa-mercury'=> '&#xf223',
            'fa-microphone'=> '&#xf130',
            'fa-mobile'=> '&#xf10b',
            'fa-motorcycle'=> '&#xf21c',
            'fa-mouse-pointer'=> '&#xf245',
            'fa-music'=> '&#xf001',
            'fa-navicon'=> '&#xf0c9',
            'fa-neuter'=> '&#xf22c',
            'fa-newspaper-o'=> '&#xf1ea',
            'fa-opencart'=> '&#xf23d',
            'fa-openid'=> '&#xf19b',
            'fa-opera'=> '&#xf26a',
            'fa-outdent'=> '&#xf03b',
            'fa-pagelines'=> '&#xf18c',
            'fa-paper-plane-o'=> '&#xf1d9',
            'fa-paperclip'=> '&#xf0c6',
            'fa-paragraph'=> '&#xf1dd',
            'fa-paste'=> '&#xf0ea',
            'fa-pause'=> '&#xf04c',
            'fa-paw'=> '&#xf1b0',
            'fa-paypal'=> '&#xf1ed',
            'fa-pencil'=> '&#xf040',
            'fa-pencil-square-o'=> '&#xf044',
            'fa-phone'=> '&#xf095',
            'fa-photo'=> '&#xf03e',
            'fa-picture-o'=> '&#xf03e',
            'fa-pie-chart'=> '&#xf200',
            'fa-pied-piper'=> '&#xf1a7',
            'fa-pied-piper-alt'=> '&#xf1a8',
            'fa-pinterest'=> '&#xf0d2',
            'fa-pinterest-p'=> '&#xf231',
            'fa-pinterest-square'=> '&#xf0d3',
            'fa-plane'=> '&#xf072',
            'fa-play'=> '&#xf04b',
            'fa-play-circle'=> '&#xf144',
            'fa-play-circle-o'=> '&#xf01d',
            'fa-plug'=> '&#xf1e6',
            'fa-plus'=> '&#xf067',
            'fa-plus-circle'=> '&#xf055',
            'fa-plus-square'=> '&#xf0fe',
            'fa-plus-square-o'=> '&#xf196',
            'fa-power-off'=> '&#xf011',
            'fa-print'=> '&#xf02f',
            'fa-puzzle-piece'=> '&#xf12e',
            'fa-qq'=> '&#xf1d6',
            'fa-qrcode'=> '&#xf029',
            'fa-question'=> '&#xf128',
            'fa-question-circle'=> '&#xf059',
            'fa-quote-left'=> '&#xf10d',
            'fa-quote-right'=> '&#xf10e',
            'fa-ra'=> '&#xf1d0',
            'fa-random'=> '&#xf074',
            'fa-rebel'=> '&#xf1d0',
            'fa-recycle'=> '&#xf1b8',
            'fa-reddit'=> '&#xf1a1',
            'fa-reddit-square'=> '&#xf1a2',
            'fa-refresh'=> '&#xf021',
            'fa-registered'=> '&#xf25d',
            'fa-remove'=> '&#xf00d',
            'fa-renren'=> '&#xf18b',
            'fa-reorder'=> '&#xf0c9',
            'fa-repeat'=> '&#xf01e',
            'fa-reply'=> '&#xf112',
            'fa-reply-all'=> '&#xf122',
            'fa-retweet'=> '&#xf079',
            'fa-rmb'=> '&#xf157',
            'fa-road'=> '&#xf018',
            'fa-rocket'=> '&#xf135',
            'fa-rotate-left'=> '&#xf0e2',
            'fa-rotate-right'=> '&#xf01e',
            'fa-rouble'=> '&#xf158',
            'fa-rss'=> '&#xf09e',
            'fa-rss-square'=> '&#xf143',
            'fa-rub'=> '&#xf158',
            'fa-ruble'=> '&#xf158',
            'fa-rupee'=> '&#xf156',
            'fa-safari'=> '&#xf267',
            'fa-sliders'=> '&#xf1de',
            'fa-slideshare'=> '&#xf1e7',
            'fa-smile-o'=> '&#xf118',
            'fa-sort-asc'=> '&#xf0de',
            'fa-sort-desc'=> '&#xf0dd',
            'fa-sort-down'=> '&#xf0dd',
            'fa-spinner'=> '&#xf110',
            'fa-spoon'=> '&#xf1b1',
            'fa-spotify'=> '&#xf1bc',
            'fa-square'=> '&#xf0c8',
            'fa-square-o'=> '&#xf096',
            'fa-star'=> '&#xf005',
            'fa-star-half'=> '&#xf089',
            'fa-stop'=> '&#xf04d',
            'fa-subscript'=> '&#xf12c',
            'fa-tablet'=> '&#xf10a',
            'fa-tachometer'=> '&#xf0e4',
            'fa-tag'=> '&#xf02b',
            'fa-tags'=> '&#xf02c',
            'fa-times'=> '&#xf00d',
        ];
        echo "
            <style>
                #{$id}{
                    font-family: 'FontAwesome', 'sans-serif';
                }
            </style>
        ";
        $__icon_arr = [];
        foreach ($icon_arr as $key => $__value) {
            $name = str_replace("fa-", "", $key);
            $__icon_arr[$key] = ucfirst("$name $__value");
        }
        
        $this->add_html("html", Lib_html_tags::iselect($label, $id, $__icon_arr, $value, $options));
    }
    //--------------------------------------------------------------------------
}