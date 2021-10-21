<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Insert extends CI_Controller
{
    // For data insertion	
    public function index()
    {
        $this->load->view('header');
        $this->form_validation->set_rules('firstname', 'Prénom', 'required|alpha');
        $this->form_validation->set_rules('lastname', 'Nom', 'required|alpha');
        $this->form_validation->set_rules('emailid', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('contactno', 'N° Tél', 'required|numeric|exact_length[10]');
        $this->form_validation->set_rules('address', 'Adresse', 'required');

        if ($this->form_validation->run()) {
            $fname = $this->input->post('firstname');
            $lname = $this->input->post('lastname');
            $email = $this->input->post('emailid');
            $cntno = $this->input->post('contactno');
            $adrss = $this->input->post('address');
            $this->load->model('Insert_Model');
            $this->Insert_Model->insertdata($fname, $lname, $email, $cntno, $adrss);
            $this->load->view('insert');
        } else {
            $this->load->view('insert');
        }
        $this->load->view('footer');
    }

    // For data updation
    public function updatedetails()
    {
        $this->form_validation->set_rules('firstname', 'Prénom', 'required|alpha');
        $this->form_validation->set_rules('lastname', 'Nom', 'required|alpha');
        $this->form_validation->set_rules('emailid', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('contactno', 'N° Tél', 'required|numeric|exact_length[10]');
        $this->form_validation->set_rules('address', 'Adresse', 'required');

        if ($this->form_validation->run()) {
            $fname = $this->input->post('firstname');
            $lname = $this->input->post('lastname');
            $email = $this->input->post('emailid');
            $cntno = $this->input->post('contactno');
            $adrss = $this->input->post('address');
            $usid = $this->input->post('userid');
            $this->load->model('Insert_Model');
            $this->Insert_Model->updatedetails($fname, $lname, $email, $cntno, $adrss, $usid);
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Try again with valid details !!');
            redirect('read');
        }
    }
}
