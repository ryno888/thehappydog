<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
    //--------------------------------------------------------------------------
    public function vservice() {
        $key = request_key();
        $data["title"] = Lib_db::get_enum_value("service", "ser_type", $key);
        $this->load_view('service/vservice', "frontend", $data);
    }
    //--------------------------------------------------------------------------
    public function vservice_details() {
        $this->load_view('service/vservice_details', "frontend");
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
