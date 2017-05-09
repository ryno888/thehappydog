<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller {
    //--------------------------------------------------------------------------
    public function vlist_service() {
        $this->load_view('cms/vlist_service', "system");
    }
    //--------------------------------------------------------------------------
    public function vlist_service_images() {
        $data['service'] = $this->request_db("service");
        $this->load_view('cms/vlist_service_images', "system", $data);
    }
    //--------------------------------------------------------------------------
    public function vedit_service() {
        $data['service'] = $this->request_db("service");
        $data['file_list'] = $this->load->view('cms/vlist_service_images', $data, true);
        
        $this->load_view('cms/vedit_service', "system", $data);
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
            $this->load->library("addons/Lib_tinypng.php");
            $this->load->helper("File_function");
            $this->load->helper("Image_compression");
            
            foreach ($files_arr as $path) {
                if(!is_dir($path)){
                    File_function_helper::mkdir("$file_dir/complete/");
                    
                    // Resize the image to specific width and height
                    $compressor = new Image_compression_helper($path);
                    $compressor->cutFromCenter(350, 260);
                    $compressor->save("$file_dir/complete/thumbnail_".basename($path));
                    $compressor->cutFromCenter(70, 50);
                    $compressor->save("$file_dir/complete/thumbnail_small_".basename($path));
                    
                    $db_file = Lib_db::load_db_default("file");
                    $db_file->save_image($path);
                    
                    $db_file_thumb_lg = Lib_db::load_db_default("file");
                    $db_file_thumb_lg->save_image("$file_dir/complete/thumbnail_".basename($path));
                    
                    $db_file_thumb_sm = Lib_db::load_db_default("file");
                    $db_file_thumb_sm->save_image("$file_dir/complete/thumbnail_small_".basename($path));
                    
                    $service_file = Lib_db::load_db_default("service_file");
                    $service_file->obj->sef_ref_service = $service->obj->ser_id;
                    $service_file->obj->sef_ref_file = $db_file->id;
                    $service_file->obj->sef_ref_file_thumb_lg = $db_file_thumb_lg->id;
                    $service_file->obj->sef_ref_file_thumb_sm = $db_file_thumb_sm->id;
                    $service_file->insert();
                    
                }
            }
            File_function_helper::delete_directory($file_dir);
            
//            $compressed_files_arr = glob("$file_dir/complete/*");
//            foreach ($compressed_files_arr as $compressed_path) {
//                if(strpos($compressed_path, "thumbnail") === false){
//                    $size = getimagesize($compressed_path);
//
//                    $db_file = Lib_db::load_db_default("file");
//                    $db_file->obj->fil_data = File_function_helper::compress_image($compressed_path);
//                    $db_file->obj->fil_name = basename($compressed_path);
//                    $db_file->obj->fil_path = dirname($compressed_path);
//                    $db_file->obj->fil_type = $size["mime"];
//                    $db_file->obj->fil_date_created = Lib_date::strtodatetime();
//                    $db_file->insert();
//
//                    
//                    $file_thumb_lg = "{$db_file->obj->fil_path}/thumbnail_".  strtolower($db_file->obj->fil_name);
//                    $db_file_thumb = Lib_db::load_db_default("file");
//                    $db_file_thumb->obj->fil_data = File_function_helper::compress_image($file_thumb_lg);
//                    $db_file_thumb->obj->fil_name = basename($file_thumb_lg);
//                    $db_file_thumb->obj->fil_path = dirname($file_thumb_lg);
//                    $db_file_thumb->obj->fil_type = $size["mime"];
//                    $db_file_thumb->obj->fil_date_created = Lib_date::strtodatetime();
//                    $db_file_thumb->insert();
//                    
//                    $file_thumb_sm = "{$db_file->obj->fil_path}/thumbnail_small_".  strtolower($db_file->obj->fil_name);
//                    $db_file_thumb_sm = Lib_db::load_db_default("file");
//                    $db_file_thumb_sm->obj->fil_data = File_function_helper::compress_image($file_thumb_sm);
//                    $db_file_thumb_sm->obj->fil_name = basename($file_thumb_lg);
//                    $db_file_thumb_sm->obj->fil_path = dirname($file_thumb_lg);
//                    $db_file_thumb_sm->obj->fil_type = $size["mime"];
//                    $db_file_thumb_sm->obj->fil_date_created = Lib_date::strtodatetime();
//                    $db_file_thumb_sm->insert();
//                    
//                    $service_file = Lib_db::load_db_default("service_file");
//                    $service_file->obj->sef_ref_service = $service->obj->ser_id;
//                    $service_file->obj->sef_ref_file = $db_file->id;
//                    $service_file->obj->sef_ref_file_thumb_lg = $db_file_thumb->id;
//                    $service_file->obj->sef_ref_file_thumb_sm = $db_file_thumb->id;
//                    $service_file->insert();
//                }
//            }
//
//            File_function_helper::delete_directory($file_dir);
        }
        
        return Http_helper::response("Changes successfully saved");
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
//        $this->load->library("addons/Lib_tinypng.php");
//        
//        
//        echo "<pre>";
//        print_r($_FILES);
//        print_r($_POST);
//        echo "</pre>";
//
//        @mkdir(DIR_FILES."upload/");
//        $compress = new Lib_tinypng();
//        $compress->set_source(DIR_FILES."upload/{$_FILES['file']['name']}");
//        $compress->set_destination(DIR_FILES."upload/{$_FILES['file']['name']}");
//                
//        if(!move_uploaded_file($_FILES['file']['tmp_name'], $compress->get_destination()) || !$compress->run()){
//            echo "error";
//        }
//        
//        $compress->to_thumbnail();
//        
//        echo "success";
    }
    //--------------------------------------------------------------------------
    public function xdelete_file() {
        $this->load->helper("File_function");
        $dest = urldecode(request("dest"));
        $file = request("file");
        
        File_function_helper::delete_file("$dest/$file");
    }
    //--------------------------------------------------------------------------
}
