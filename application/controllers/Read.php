<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Read extends CI_Controller
{
    // for all records
    public function index()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Navigation/connection'));
        }

        $this->load->view('header');
        $this->load->model('Read_Model');
        $results = $this->Read_Model->getdata();
        $this->load->view('read', ['result' => $results]);
        $this->load->view('footer');
    }
    // for particular record
    public function getdetails($uid)
    {
        if ($this->session->connected == false) {
            redirect(site_url('Navigation/connection'));
        }
        
        $this->load->view('header');
        $this->load->model('Read_Model');
        $reslt = $this->Read_Model->getuserdetail($uid);
        $this->load->view('update', ['row' => $reslt]);
        $this->load->view('footer');
    }
}
