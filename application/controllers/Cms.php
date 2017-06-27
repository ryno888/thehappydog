<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller {
    //--------------------------------------------------------------------------
    public function vlist_service() {
        $data['service_type'] = $this->request_db("service_type");
        $this->load_view('cms/vlist_service', "system", $data);
    }
    //--------------------------------------------------------------------------
    public function vlist_service_images() {
        $data['service'] = $this->request_db("service");
        $this->load_view('cms/vlist_service_images', "system", $data);
    }
    //--------------------------------------------------------------------------
    public function vadd_service() {
        $data['service'] = Lib_db::load_db_default("service");
        
        $this->load_view('cms/vadd_service', "system", $data);
    }
    //--------------------------------------------------------------------------
    public function vadd_service_type() {
        $data['service_type'] = Lib_db::load_db_default("service_type");
        
        $this->load_view('cms/vadd_service_type', "system", $data);
    }
    //--------------------------------------------------------------------------
    public function vedit_service_type() {
        $data['service_type'] = $this->request_db("service_type");
        $this->load_view('cms/vedit_service_type', "system", $data);
    }
    //--------------------------------------------------------------------------
    public function vconfig() {
        $data['config'] = Lib_db::load_db("config", "1=1");
        if(!$data['config']){
            $data['config'] = Lib_db::load_db_default("config");
            $data['config']->insert();
        }
        $this->load_view('cms/vconfig', "system", $data);
    }
    //--------------------------------------------------------------------------
    public function vedit_service() {
        $data['service'] = $this->request_db("service");
        $data['file_list'] = $this->load->view('cms/vlist_service_images', $data, true);
        
        $this->load_view('cms/vedit_service', "system", $data);
    }
    //--------------------------------------------------------------------------
    public function xadd_service() {
        $service = $this->request_obj("service", true);
        $this->form_validation->set_rule_db($service, 'ser_title');
        $this->form_validation->set_rule_db($service, 'ser_email');
        $this->form_validation->set_rule_db($service, 'ser_contact_nr');
        $this->form_validation->set_rule_db($service, 'ser_website');
        $this->form_validation->set_rule_db($service, 'ser_details');
        $this->form_validation->set_rule_db($service, 'ser_location_link');
        $this->form_validation->set_rule_db($service, 'ser_location');
        $this->form_validation->set_rule_db($service, 'ser_type');
        if($this->form_validation->run() == false){
            return Http_helper::error(1, validation_errors());
        }
        console($service);
        $service->insert();
        
        return Http_helper::response("Changes successfully saved", [
            "code" => 3,
            "action" => [
                "type" => "redirect",
                "url" => "cms/vedit_service/ser_id/$service->id",
            ],
        ]);
    }
    //--------------------------------------------------------------------------
    public function xedit_service() {
        $service = $this->request_obj("service", true);
        $this->form_validation->set_rule_db($service, 'ser_title');
        $this->form_validation->set_rule_db($service, 'ser_email');
        $this->form_validation->set_rule_db($service, 'ser_contact_nr');
        $this->form_validation->set_rule_db($service, 'ser_website');
        $this->form_validation->set_rule_db($service, 'ser_details');
        $this->form_validation->set_rule_db($service, 'ser_location_link');
        $this->form_validation->set_rule_db($service, 'ser_location');
        $this->form_validation->set_rule_db($service, 'ser_type');
        if($this->form_validation->run() == false){
            return Http_helper::error(1, validation_errors());
        }
        
        $service->update();
        
        $file_dir = urldecode(request("file_dest"));
        $files_arr = glob($file_dir."/*");
        
        if($files_arr){
            $this->load->library("addons/Lib_tinypng.php");
            $this->load->helper("File_function");
            $this->load->helper("Image_compression");
            
            foreach ($files_arr as $path) {
                if(!is_dir($path)){
                    File_function_helper::mkdir("$file_dir/complete/");
                    
                    // Resize the image to specific width and height
                    $compressor = new Image_compression_helper($path);
                    $compressor->cutFromCenter(920, 500);
                    $compressor->save("$file_dir/complete/thumbnail_".basename($path));
                    
                    $compressor_small = new Image_compression_helper($path);
                    $compressor_small->resizeToHeight(260);
                    $compressor_small->cut(0, 0, 350, 260);
                    $compressor_small->save("$file_dir/complete/thumbnail_small_".basename($path));
                    
                    $compressor_tiny = new Image_compression_helper($path);
                    $compressor_tiny->square(50, 50);
                    $compressor_tiny->save("$file_dir/complete/thumbnail_tiny_".basename($path));
                    
                    $db_file = Lib_db::load_db_default("file");
                    $db_file->save_image($path);
                    
                    $db_file_thumb_lg = Lib_db::load_db_default("file");
                    $db_file_thumb_lg->save_image("$file_dir/complete/thumbnail_".basename($path));
                    
                    $db_file_thumb_sm = Lib_db::load_db_default("file");
                    $db_file_thumb_sm->save_image("$file_dir/complete/thumbnail_small_".basename($path));
                    
                    $db_file_thumb_tiny = Lib_db::load_db_default("file");
                    $db_file_thumb_tiny->save_image("$file_dir/complete/thumbnail_tiny_".basename($path));
                    
                    $service_file = Lib_db::load_db_default("service_file");
                    $service_file->obj->sef_ref_service = $service->obj->ser_id;
                    $service_file->obj->sef_ref_file = $db_file->id;
                    $service_file->obj->sef_ref_file_thumb_lg = $db_file_thumb_lg->id;
                    $service_file->obj->sef_ref_file_thumb_sm = $db_file_thumb_sm->id;
                    $service_file->obj->sef_ref_file_thumb_tiny = $db_file_thumb_tiny->id;
                    $service_file->insert();
                    
                }
            }
            File_function_helper::delete_directory($file_dir);
            
        }
        
        return Http_helper::response("Changes successfully saved", [
            "code" => 3,
            "action" => [
                "type" => "refresh",
            ],
        ]);
    }
    //--------------------------------------------------------------------------
    public function xupload_file() {
        $this->load->helper("File_function");
        $dest = urldecode(request("dest"));
        File_function_helper::mkdir($dest);
        
        echo "<pre>";
        print_r($_FILES);
        print_r($_POST);
        echo "</pre>";

        
        @mkdir(DIR_FILES."upload/");
        if(!move_uploaded_file($_FILES['file']['tmp_name'], "$dest/{$_FILES['file']['name']}")){
            echo "error";
        }
        
        echo "success";
    }
    //--------------------------------------------------------------------------
    public function xdelete_file() {
        $this->load->helper("File_function");
        $dest = urldecode(request("dest"));
        $file = request("file");
        
        File_function_helper::delete_file("$dest/$file");
    }
    //--------------------------------------------------------------------------
    public function xdelete_service_file() {
        $this->load->helper("File_function");
        $service_file = $this->request_db("service_file", true);
        $service_file->delete();
    }
    //--------------------------------------------------------------------------
    public function xedit_service_type() {
        $service_type = $this->request_obj("service_type", true);
        $service_type->update();
        
        return Http_helper::response("Changes successfully saved", [
            "code" => 3,
            "action" => [
                "type" => "refresh",
            ],
        ]);
    }
    //--------------------------------------------------------------------------
}
