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
class Lib_html_tags extends Lib_core{
    //--------------------------------------------------------------------------
    public function __construct() {
        parent::__construct();
        $this->ci->load->helper('html');
        $this->ci->load->helper('form');
    }
    //--------------------------------------------------------------------------
    public static function header($label, $type = 1, $options = []) {
        $options_arr = array_merge([
            'attr_arr'  => [],
            'container_fluid' => false,
        ], $options);
        $container = $options_arr["container_fluid"] ? "container-fluid" : "container";
        
        return "<div class='$container'>".heading($label, $type, $options_arr['attr_arr'])."</div>";
    }
    //--------------------------------------------------------------------------
    public static function title($title, $info = false, $options = []) {
        $options_arr = array_merge([
            "class" => "list-page-header",
            'container_fluid' => false,
            "style" => false,
            "type" => 1,
        ], $options);
        
        $container = $options_arr["container_fluid"] ? "container-fluid" : "container";
        
        $titel = "
            <div class='{$options_arr['class']}' style='{$options_arr['style']}'>
				<h{$options_arr['type']}>
					$title <small>$info</small>
				</h{$options_arr['type']}>
			</div>
        ";
        
        return "<div class='$container'>$titel</div>";
    }
    //--------------------------------------------------------------------------
    public static function button($label = '', $onclick = "javascript:;", $options = []) {
        $options_arr = array_merge([
			'name'  => false,
			'type'  => 'button',
            'class' => "btn btn-default",
            'onclick' => $onclick,
            'style' => '',
            'extra' => '',
            'attr_arr' => [],
		], $options);
        
        $html_options = Lib_html_tags::get_html_options($options);
        $options_arr['class'] = "{$options_arr['class']} {$html_options['css']}";
        $options_arr['style'] = "{$options_arr['style']} {$html_options['style']}";
        
        $defaults = array_merge([
			'name'  => $options_arr["name"],
			'type'  => $options_arr["type"],
            'class' => $options_arr["class"],
            'onclick' => $onclick,
		], $options_arr["attr_arr"]);


        return '<button '._parse_form_attributes($options_arr["name"], $defaults)._attributes_to_string($options_arr["extra"]).'>'
			.$label
			."</button>\n";
    }
    //--------------------------------------------------------------------------
    public static function icheckbox($label, $id, $checked = false, $options = []) {
        $options_arr = array_merge([
            'append'       => false,
            'prepend'       => false,
            'required'       => false,
            'onclick'       => false,
            'attr_arr'       => [],
        ], $options);
        
        if(isset($options_arr["label"]) && $options_arr["label"]){ $label = $options_arr["label"]; }
        
        $data_arr = array_merge([
            'name'          => $id,
            'id'            => $id,
            'value'         => $id,
            'checked'       => $checked,
            'style'         => '',
            'class'         => '',
        ], $options_arr['attr_arr']);
        
        $js = '';
        if($options_arr['onclick']){
            $js = [
                'onClick' => $options_arr['onclick']
            ];
        }
        
        
        $html_options = Lib_html_tags::get_html_options($options);
        $data_arr['class'] = "{$data_arr['class']} {$html_options['css']}";
        $data_arr['style'] = "{$data_arr['style']} {$html_options['style']}";
        
        return self::wrap_form_group($label.$html_options['span'], $id, form_checkbox($data_arr, '', false, $js), $options_arr);
    }
    //--------------------------------------------------------------------------
    public static function iradio($label, $id, $checked = false, $options = []) {
        $options_arr = array_merge([
            'append'       => false,
            'prepend'       => false,
            'required'       => false,
            'onclick'       => false,
            'attr_arr'       => [],
        ], $options);
        
        if(isset($options_arr["label"]) && $options_arr["label"]){ $label = $options_arr["label"]; }
        
        $data_arr = array_merge([
            'name'          => $id,
            'id'            => $id,
            'value'         => $label,
            'checked'       => $checked,
            'style'         => '',
            'class'         => '',
        ], $options_arr['attr_arr']);
        
        $html_options = Lib_html_tags::get_html_options($options);
        $data_arr['class'] = "{$data_arr['class']} {$html_options['css']}";
        $data_arr['style'] = "{$data_arr['style']} {$html_options['style']}";
        
        return self::wrap_form_group($label.$html_options['span'], $id, form_radio($data_arr), $options_arr);
    }
    //--------------------------------------------------------------------------
    public static function iradio_multi($label, $id, $item_arr = [], $checked = false, $options = []) {
        $options_arr = array_merge([
            'inline'       => false,
            'hidden'       => false,
            'required'       => false,
            'onclick'       => false,
            'parent_id'       => "__$id",
            'exclude'       => [],
            'attr_arr'       => [],
        ], $options);

        if(isset($options_arr["label"]) && $options_arr["label"]){ $label = $options_arr["label"]; }
        
        $data_arr = array_merge([
                'name'          => $id,
                'id'            => "{$id}[]",
                'value'         => false,
                'checked'       => false,
                'style'         => '',
                'class'         => '',
        ], $options_arr['attr_arr']);
        
        $radio_array = [];
        if($options_arr["exclude"]){
            foreach ($options_arr["exclude"] as $value) {
                if(isset($item_arr[$value])){
                    unset($item_arr[$value]);
                }
            }
        }
        
        foreach ($item_arr as $key => $value) {
            
            $data_arr["value"] = $key;
            $data_arr["checked"] = $checked == $key ? true : false;
            $inline = $options_arr["inline"] == true ? "class='radio-inline'" : false;
            
            $html_options = Lib_html_tags::get_html_options($options);
            $data_arr['class'] = "{$data_arr['class']} {$html_options['css']}";
            $data_arr['style'] = "{$data_arr['style']} {$html_options['style']}";
            if($inline){
                $radio_array[] = "<span class='margin-right-10'><label $inline>".form_radio($data_arr)." $value</label></span>";
            }else{
                $radio_array[] = "<div class='radio checkbox-inline-group'><label $inline>".form_radio($data_arr)."$value</label></div>";
            }
        }
        
        $__label = $options_arr["inline"] ? "<div class='col-md-12'><label>{$label}{$html_options['span']}</label></div>" : $label.$html_options['span'];
        
        return self::wrap_form_group($__label, $id, implode("", $radio_array), $options_arr);
    }
    //--------------------------------------------------------------------------
    public static function itext($label, $id, $value = false, $options = []) {
        $options_arr = array_merge([
            'append'       => false,
            'prepend'       => false,
            'required'       => false,
            'label'       => false,
            'attr_arr'       => [],
        ], $options);
        
        if($options_arr["label"]){ $label = $options_arr["label"]; }
        
        $data_arr = array_merge([
            'name'          => $id,
            'id'            => $id,
            'value'         => $value,
            'maxlength'     => false,
            'size'          => false,
            'style'         => false,
            'class'         => "form-control input-sm ",
            'js'            => "",
        ], $options_arr['attr_arr']);
        
        $html_options = Lib_html_tags::get_html_options($options);
        $data_arr['class'] = "{$data_arr['class']} {$html_options['css']}";
        $data_arr['style'] = "{$data_arr['style']} {$html_options['style']}";
        
        return self::wrap_form_group($label.$html_options['span'], $id, form_input($data_arr, '', $data_arr['js']), $options_arr);
    }
    //--------------------------------------------------------------------------
    public static function itextarea($label, $id, $value = false, $options = []) {
        $options_arr = array_merge([
            'append'       => false,
            'prepend'       => false,
            'attr_arr'       => [],
        ], $options);
        
        if(isset($options_arr["label"]) && $options_arr["label"]){ $label = $options_arr["label"]; }
        
        $data_arr = array_merge([
            'name'          => $id,
            'id'            => $id,
            'value'         => $value,
            'maxlength'     => false,
            'size'          => false,
            'style'         => false,
            'class'         => "form-control",
            'js'         => "",
        ], $options_arr["attr_arr"]);
        
        $html_options = Lib_html_tags::get_html_options($options);
        $data_arr['class'] = "{$data_arr['class']} {$html_options['css']}";
        $data_arr['style'] = "{$data_arr['style']} {$html_options['style']}";
        
        return self::wrap_form_group($label.$html_options['span'], $id, form_textarea($data_arr, '', $data_arr['js']), $options_arr);
    }
    //--------------------------------------------------------------------------
    public static function ipassword($label, $id, $value = false, $options = []) {
        $options_arr = array_merge([
            'append'       => false,
            'prepend'       => false,
            'attr_arr'       => [],
        ], $options);
        
        $data_arr = array_merge([
            'name'          => $id,
            'id'            => $id,
            'value'         => $value,
            'maxlength'     => false,
            'size'          => false,
            'style'         => false,
            'class'         => "form-control input-sm",
            'js'         => "",
        ], $options_arr["attr_arr"]);
        
        $html_options = Lib_html_tags::get_html_options($options);
        $data_arr['class'] = "{$data_arr['class']} {$html_options['css']}";
        $data_arr['style'] = "{$data_arr['style']} {$html_options['style']}";
        
        return self::wrap_form_group($label.$html_options['span'], $id, form_password($data_arr, '', $data_arr['js']));
    }
    //--------------------------------------------------------------------------
    public static function ilabel($label, $id, $options = []) {
        $options_arr = array_merge([
            'append'        => false,
            'prepend'       => false,
            'attr_arr'      => [],
        ], $options);
        
        $data_arr = array_merge([
            'style'         => false,
            'class'         => false
        ], $options_arr["attr_arr"]);
        
        $html_options = Lib_html_tags::get_html_options($options);
        $data_arr['class'] = "{$data_arr['class']} {$html_options['css']}";
        $data_arr['style'] = "{$data_arr['style']} {$html_options['style']}";
        
        return self::wrap_form_group($label.$html_options['span'], $id, form_label($label, $id, $options_arr["attr_arr"]));
    }
    //--------------------------------------------------------------------------
    public static function value($label, $value, $options = []) {
        $options_arr = array_merge([
            'append'        => false,
            'prepend'       => false,
            'attr_arr'      => [],
        ], $options);
        
        $data_arr = array_merge([
            'style'         => false,
            'class'         => false
        ], $options_arr["attr_arr"]);
        
        $html_options = Lib_html_tags::get_html_options($options);
        $data_arr['class'] = "{$data_arr['class']} {$html_options['css']}";
        $data_arr['style'] = "{$data_arr['style']} {$html_options['style']}";
        
        return self::wrap_form_group($label.$html_options['span'], false, $value);
    }
    //--------------------------------------------------------------------------
    public static function iselect($label, $id, $value_arr = [], $value = false, $options = []) {
        $options_arr = array_merge([
            'append'       => false,
            'prepend'       => false,
            '!change'       => false,
            'style'         => false,
            'class'         => false,
            'attr_arr'       => [],
        ], $options);
        
        $data_arr = array_merge([
            'name'          => $id,
            'id'       => 'shirts',
            'onChange' => $options_arr["!change"],
            'class' => 'form-control input-sm',
            'style'         => false,
        ], $options_arr["attr_arr"]);
        
        $html_options = Lib_html_tags::get_html_options($options);
        $data_arr['class'] = "{$data_arr['class']} {$html_options['css']}";
        $data_arr['style'] = "{$data_arr['style']} {$html_options['style']}";
        
        return self::wrap_form_group($label.$html_options['span'], $id, form_dropdown('', $value_arr, $value, $data_arr));
    }
    //--------------------------------------------------------------------------
    public static function iselect_multi($label, $id, $value_arr = [], $value = false, $options = []) {
        $options_arr = array_merge([
            'append'        => false,
            'prepend'       => false,
            'attr_arr'      => [],
        ], $options);
        
        $data_arr = array_merge([
            'name'          => $id,
            'id'            => 'shirts',
            'onChange'      => '',
            'style'         => false,
            'class'         => 'form-control input-sm',
        ], $options_arr["attr_arr"]);
        
        $html_options = Lib_html_tags::get_html_options($options);
        $data_arr['class'] = "{$data_arr['class']} {$html_options['css']}";
        $data_arr['style'] = "{$data_arr['style']} {$html_options['style']}";
        
        return self::wrap_form_group($label.$html_options['span'], $id, form_multiselect('', $value_arr, $value, $data_arr));
    }
    //--------------------------------------------------------------------------
    public static function idate_picker($id, $label = false , $value = false, $options = []){
        $options_arr = array_merge([
            "autoclose" => 1,
            "format" => "system.data.momentDateFormat.DATE",
            "@readonly" => true,
        ], $options);
        
        return Lib_html_tags::idatetime($id, $label, $value, $options_arr);
    }
//    //--------------------------------------------------------------------------
//    public static function idate_picker($id, $label = false , $value = false, $options = []){
//        $options_arr = array_merge([
//            "autoclose" => true,
//            "format" => CI_DATE,
//            "show_today_btn" => true,
//        ], $options);
//        
//        $format = php_dateformat_to_js_dateformat($options_arr["format"]);
//        $input = Lib_html_tags::itext($label, $id, $value, $options_arr);
//        
//        $today_btn = $options_arr["show_today_btn"] ? "todayBtn: 'linked'," : false;
//        $today_btn_highlight = $options_arr["show_today_btn"] ? "todayHighlight: true," : false;
//                
//        switch ($format) {
//            case "mm": 
//                $minViewMode = "minViewMode: 1,";
//                break;
//            case "yyyy": 
//                $minViewMode = "minViewMode: 2,"; 
//                break;
//            default: $minViewMode = false; break;
//        }
//        
//        return "
//            <script>
//                $(document).ready(function(){
//                    $('#$id input').datepicker({
//                        autoclose: {$options_arr["autoclose"]},
//                        format: '$format',
//                        $today_btn
//                        $today_btn_highlight
//                        $minViewMode
//                    });
//                });
//            </script>
//            <div id='$id'>$input</div>
//        ";
//    }
    //--------------------------------------------------------------------------
    /**
     * 
     * @param type $id
     * @param type $label
     * @param type $value
     * @param type $options[format] = System date time format
     * @param type $options[start_view] = 
     *      0 or 'hour' for the hour view
     *      1 or 'day' for the day view
     *      2 or 'month' for month view (the default)
     *      3 or 'year' for the 12-month overview
     *      4 or 'decade' for the 10-year overview. Useful for date-of-birth datetimepickers.
     * @return type
     */
    public static function idatetime($id, $label = false , $value = false, $options = []){
        $options_arr = array_merge([
            "autoclose" => 1,
            "format" => "system.data.momentDateFormat.FORMAT_3",
            "@readonly" => true,
            "icon" => 'fa-calendar',
        ], $options);
        
        
        
        $input = Lib_html_tags::itext($label, $id, false, $options_arr + ["append" => "<i class='fa {$options_arr['icon']}' aria-hidden='true'></i>"]);
        
//        format: 'LT'
        return "
                    <div class='form-group'>
                        <div class='input-group date' id='$id'>
                            $input
                        </div>
                    </div>
                    <script type='text/javascript'>
                        $(function () {
                            $('#$id').datetimepicker({
                                format: {$options_arr['format']},
                                defaultDate: '$value'
                            });
                        });
                    </script>
        ";
    }
    //--------------------------------------------------------------------------
    public static function fieldset($header, $html) {
        $return = '';
        $return .= form_fieldset($header);
        $return .=  $html;
        $return .=  form_fieldset_close();
        return $return;
    }
    //--------------------------------------------------------------------------
    public static function fieldset_open($header) {
        return form_fieldset($header);
    }
    //--------------------------------------------------------------------------
    public static function fieldset_close() {
        return form_fieldset_close();
    }
    //--------------------------------------------------------------------------
    public static function ifile($label, $id, $value = false, $options = []) {
        
        $options_arr = array_merge([
            'attr_arr'       => [],
        ], $options);
        
        $data_arr = array_merge([
            'name'          => $id,
            'id'            => $id,
            'value'         => $value,
            'maxlength'     => false,
            'size'          => false,
            'style'         => false,
            'class'         => "hidden",
            'js'         => "",
        ], $options_arr["attr_arr"]);
        
        return self::wrap_form_group(false, $id, "
            <label class='btn btn-primary btn-sm btn-file'>
                $label ".form_upload($data_arr, '', $data_arr['js'])."
            </label>");
    }
    //--------------------------------------------------------------------------
    public static function ifile_dropzone($label, $id, $dest, $options = []) {
        $options_arr = array_merge([
            'show_loader' => true,
            'loader_message' => 'Compressing image. Please wait...',
            'url_upload' => Http_helper::build_url("cms/xupload_file"),
            'url_delete' => false,
            'data' => false,
        ], $options);
        
        $dest_encoded = urlencode($dest);
        $show_loader = $options_arr['show_loader'] ? "showLoader('{$options_arr['loader_message']}');" : "";
        $remove_image = $options_arr['url_delete'] ? "
            addRemoveLinks: true,
            removedfile: function(file) {
                system.ajax.requestFunction('{$options_arr['url_delete']}', function(){
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                }, {data:{file:file.name,dest:'$dest_encoded'}});

            },
        " : "";
        
        $added_files_arr = glob("$dest/*");
        $added_files_js = [];
        
        
        foreach ($added_files_arr as $file) {
            $added_files_js[] = [
                "name" => basename($file),
                "size" => filesize($file),
                "status" => "Dropzone.ADDED",
                "accepted" => "true"
            ];
        }
                
        return self::wrap_form_group(false, $id, "
            <div class='panel panel-info'>
                <div class='panel-heading'>$label</div>
                <div class='panel-body'>
                    <div class='dropzone' id='$id'></div>
                </div>
            </div>
            <script>
                $(document).ready(function(){
                    Dropzone.autoDiscover = false;
                    $('div#$id').dropzone({
                        url: '{$options_arr["url_upload"]}',
                        margin: 20,
                        params:{'action': 'save'},
                        sending: function(file, xhr, formData){
                            formData.append('dest', '$dest_encoded');
                            $('.dz-progress').hide();
                            $('.dz-remove').hide();
                            $show_loader
                        },
                        init: function() {
                            thisDropzone = this;
                            var data = ".json_encode($added_files_js).";
                            $.each(data, function(key,value){
                                var mockFile = { name: value.name, size: value.size };
                                thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                                thisDropzone.createThumbnailFromUrl(mockFile, ci_base_url+'$dest/'+value.name, function() {
                                    thisDropzone.emit('complete', mockFile);
                                });
                                $('.dz-progress').hide();
                            });
                        },
                        success: function(res, index){
                            $('.dz-remove').show();
                            hideLoader();
                        },
                        $remove_image
                    });
                    

                });
            </script>
        ");
    }
    //--------------------------------------------------------------------------
    public static function form_open($action, $id = false, $options = []) {
        $options_arr = array_merge([
            'attr_arr'       => [],
            'display_inline' => false,
        ], $options);
        
        if(!$id){ $id = time().rand(100, 999); }
        
        $class = "";
        
        if($options_arr["display_inline"]){
            $class .= "form-inline ";
        }
        
        $data_arr = array_merge([
            'name'          => $id,
            'id'            => $id,
            'class'         => $class,
            'role'         => "form",
        ], $options_arr["attr_arr"]);
        return form_open($action, $data_arr);
    }
    //--------------------------------------------------------------------------
    public static function form_close() {
        return form_close();
    }
    //--------------------------------------------------------------------------
    public static function wrap_form_group($label, $id, $element, $options = []) {
        
        $options_arr = array_merge([
            "prepend" => false,
            "append" => false,
            "hidden" => false,
            "parent_id" => "{$id}_input_wrapper",
        ], $options);
        
        if($label !== false){
            $label = '<label for="'.$id.'">'.$label.'</label>';
        }
        if($options_arr["prepend"]){
            $element = '
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">'.$options_arr["prepend"].'</span>
                    '.$element.'
                </div>
            ';
        }
        if($options_arr["append"]){
            $element = '
                <div class="input-group input-group-sm">
                    '.$element.'
                    <span class="input-group-addon">'.$options_arr["append"].'</span>
                </div>
            ';
        }
        
        $__hidden = $options_arr["hidden"] ? "hidden" : "";
        $__parent_id = $options_arr["parent_id"] ? "id='{$options_arr["parent_id"]}'" : "";
        
        return '
            <div class="form-group '.$__hidden.'" '.$__parent_id.'>
                '.$label.'
                '.$element.'
            </div>
        ';
    }
    //--------------------------------------------------------------------------
    public static function get_html_options($options = []){
        $css = "";
        $attr = "";
        $style = "";
        $span = "";
        foreach ($options as $key => $value) {
            $r = substr($key, 0, 1);
            $el = substr($key, 1);
            switch ($r) {
                case ".": 
                    $css .= $css != "" ? " " : "";
                    $css .= "$el"; 
                    break;
                case "@": 
                    $attr .= $attr != "" ? " " : "";
                    $attr .= "$el='$value'"; 
                    break;
                case "#": 
                    $style .= $style != "" ? " " : "";
                    $style .= "$el:$value;"; 
                    break;
                default: break;
            }
            
            if($key == "required"){
                $span = "<span class='required-span'>[ ! ]</span>";
            }
        }
        return[
            "css" => $css,
            "attr" => $attr,
            "style" => $style,
            "span" => $span,
        ];
    }
    //--------------------------------------------------------------------------
    public static function load_meta_data($meta_arr = []) {
        if($meta_arr && count($meta_arr > 0)){
            echo "<meta charset='utf-8'>";
            echo isset($meta_arr['title']) ? "<title>{$meta_arr['title']}</title>" : false;

            foreach ($meta_arr as $name => $content) {
                echo meta(array('name' => $name, 'content' => $content));
            }
        }
        
    }
    //--------------------------------------------------------------------------
}
