<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    //--------------------------------------------------------------------------
    public function index() {
        $data['config'] = Lib_db::load_db("config", "1=1");
        $this->load_view('home/vhome', "frontend", $data);
    }
    //--------------------------------------------------------------------------
    public function vhome() {
        $data['config'] = Lib_db::load_db("config", "1=1");
        $this->load_view('home/vhome', "frontend", $data);
    }
    //--------------------------------------------------------------------------
    public function xget_accommodation_detail() {
       
    }
    //--------------------------------------------------------------------------
}
