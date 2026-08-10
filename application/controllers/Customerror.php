<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customerror extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->output->set_status_header('404');
        $this->load->model('Site_Info_Model');
        $meta = $this->Site_Info_Model->getmetakeywords('home');
        $this->load->view('error-404', ['meta' => $meta]);
    }

    public function comingsoon()
    {
        $this->output->set_status_header('404');
        $this->load->model('Site_Info_Model');
        $meta = $this->Site_Info_Model->getmetakeywords('home');
        $this->load->view('coming-soon', ['meta' => $meta]);
    }
}
