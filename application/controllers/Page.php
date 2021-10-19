<?php
class Page extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }
    }

    function indexadmin()
    {
        if ($this->session->userdata('type') === 'admin') {
            $this->load->view('header');
            $this->load->view('dashboard_view');
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    function stats()
    {
        if ($this->session->userdata('type') === 'admin') {
            $this->load->view('header');
            $this->load->view('stats');
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    function indexfamille()
    {
        if ($this->session->userdata('type') === 'famille') {
            $this->load->view('header');
            $this->load->view('dashboard_view');
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    function indexeleve()
    {
        if ($this->session->userdata('type') === 'eleve') {
            $this->load->view('header');
            $this->load->view('dashboard_view');
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    function indexenseignant()
    {
        if ($this->session->userdata('type') === 'enseignant') {
            $this->load->view('header');
            $this->load->view('dashboard_view');
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }
}
