<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    //--------------------------------------------------------------------------
    public function index() {
        $this->load_view('home/vhome', "web");
    }
    //--------------------------------------------------------------------------
    public function vhome() {
        $this->load_view('home/vhome', "web");
    }
    //--------------------------------------------------------------------------
    public function accommodation() {
        $this->load_view('home/accommodation', "web");
    }
    //--------------------------------------------------------------------------
    public function xget_accommodation_detail() {
       
    }
    //--------------------------------------------------------------------------
}
