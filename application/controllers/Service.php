<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
    //--------------------------------------------------------------------------
    public function vservice() {
        $key = request_key();
        $data["title"] = Lib_db::get_enum_value("service", "ser_type", $key);
        $data["service_arr"] = Lib_db::load_db("service", "ser_ref_service_type = $key", ["multiple" => true]);
        $this->load_view('service/vservice', "frontend", $data);
    }
    //--------------------------------------------------------------------------
    public function vservice_details() {
        $key = request_key();
        $data["service"] = request_db("service", true);
        $data["service_file_arr"] = Lib_db::load_db("service_file", "sef_ref_service = $key", ["multiple" => true]);
        $data["service_review_arr"] = Lib_db::load_db("service_review", "srr_ref_service = $key", ["multiple" => true]);
        $this->load_view('service/vservice_details', "frontend", $data);
    }
    //--------------------------------------------------------------------------
    public function vservice_accommodation() {
        $this->load_view('service/vservice_accommodation', "frontend");
    }
    //--------------------------------------------------------------------------
    public function vservice_shelter() {
        $this->load_view('service/vservice_shelter', "frontend");
    }
    //--------------------------------------------------------------------------
    public function vservice_restaurant() {
        $this->load_view('service/vservice_restaurant', "frontend");
    }
    //--------------------------------------------------------------------------
    public function vservice_travel() {
        $this->load_view('service/vservice_travel', "frontend");
    }
    //--------------------------------------------------------------------------
    public function vservice_daycare() {
        $this->load_view('service/vservice_daycare', "frontend");
    }
    //--------------------------------------------------------------------------
    public function vservice_sitters() {
        $this->load_view('service/vservice_sitters', "frontend");
    }
    //--------------------------------------------------------------------------
    public function vservice_vets() {
        $this->load_view('service/vservice_vets', "frontend");
    }
    //--------------------------------------------------------------------------
    public function vservice_shops() {
        $this->load_view('service/vservice_shops', "frontend");
    }
    //--------------------------------------------------------------------------
    public function vservice_trainers() {
        $this->load_view('service/vservice_trainers', "frontend");
    }
    //--------------------------------------------------------------------------
}
