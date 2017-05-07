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
        console($_FILES);
        console($_REQUEST);
        return;
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
