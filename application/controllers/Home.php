<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    //--------------------------------------------------------------------------
    public function index() {
        $this->load_view('home/vhome', "frontend");
    }
    //--------------------------------------------------------------------------
    public function vhome() {
        $this->load_view('home/vhome', "frontend");
    }
    //--------------------------------------------------------------------------
    public function xget_accommodation_detail() {
       
    }
    //--------------------------------------------------------------------------
}
