<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller {
    //--------------------------------------------------------------------------
    public function vlist_service() {
        $data['service_type'] = $this->request_db("service_type");
        $this->load_view('cms/vlist_service', "system", $data);
    }
    //--------------------------------------------------------------------------
    public function vlist_service_type() {
        $this->load_view('cms/vlist_service_type', "system");
    }
    //--------------------------------------------------------------------------
    public function vlist_service_images() {
        $data['service'] = $this->request_db("service");
        $this->load_view('cms/vlist_service_images', "system", $data);
    }
    //--------------------------------------------------------------------------
    public function vlist_service_reviews() {
        $data['service'] = $this->request_db("service");
        $this->load_view('cms/vlist_service_reviews', "system", $data);
    }
    //--------------------------------------------------------------------------
    public function vadd_service() {
        $data['service_type'] = $this->request_db("service_type");
        $data['service'] = Lib_db::load_db_default("service");
        $data['service']->obj->ser_ref_service_type = $data['service_type']->id;
        
        $this->load_view('cms/vadd_service', "system", $data);
    }
    //--------------------------------------------------------------------------
    public function vadd_service_review() {
        $data['service'] = $this->request_db("service");
        $data['service_review'] = Lib_db::load_db_default("service_review");
        
        $this->load_view('cms/vadd_service_review', "system", $data);
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
        $data['service'] = $this->request_db("service", "ser_id");
        $data['file_list'] = $this->load->view('cms/vlist_service_images', $data, true);
        $data['file_list_reviews'] = $this->load->view('cms/vlist_service_reviews', $data, true);
        
        $this->load_view('cms/vedit_service', "system", $data);
    }
    //--------------------------------------------------------------------------
    public function xedit_config() {
        $enabled_services_arr = request("enabled_services");
        $config = $this->request_obj("config", true);
        $config->update();
        
        $sql_where = $enabled_services_arr && count($enabled_services_arr) > 0 ? "srv_id NOT IN (".implode(",", $enabled_services_arr).") AND srv_is_active = 1" : "srv_is_active = 1";
        
        $service_type_arr = Lib_database::selectlist("SELECT srv_id, srv_name FROM service_type WHERE $sql_where", "srv_id", "srv_name");
        foreach ($service_type_arr as $srv_id => $srv_name) {
            $service_type = Lib_db::load_db("service_type", "srv_id = $srv_id");
            $service_type->obj->srv_is_active = false;
            $service_type->update();
        }
        
        return Http_helper::response("Changes successfully saved");
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
        if($this->form_validation->run() == false){
            return Http_helper::error(1, validation_errors());
        }
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
    public function xadd_review() {
        
        $service_review = $this->request_obj("service_review", true);
        $ser_id = request("ser_id");
        $this->form_validation->set_rule_db($service_review, 'srr_title');
        $this->form_validation->set_rule_db($service_review, 'srr_body');
        if($this->form_validation->run() == false){
            return Http_helper::error(1, validation_errors());
        }
        $service_review->insert();
        
        return Http_helper::response("Changes successfully saved", [
            "code" => 3,
            "action" => [
                "type" => "redirect",
                "url" => "cms/vedit_service/{$service_review->obj->srr_ref_service}",
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
        if($this->form_validation->run() == false){
            return Http_helper::error(1, validation_errors());
        }
        
        $service->update();
        
        $file_dir = urldecode(request("file_dest"));
        $files_arr = glob($file_dir."/*");
        
        if($files_arr){
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
    public function xdelete_service_rating() {
        $service_review = $this->request_db("service_review", true);
        $service_review->delete();
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
