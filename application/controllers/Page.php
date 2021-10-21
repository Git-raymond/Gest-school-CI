<?php
class Page extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
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


    public function stats()
    {
        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Stats_model');

            $data['nombreFamilles'] = $this->Stats_model->nombrefamilles();
            $data['listeFamilles'] = $this->Stats_model->listefamilles();
            $data['profils'] = $this->Stats_model->listeprofil();
            $data['profs'] = $this->Stats_model->listeenseignantcursus();

            $this->load->view('header');
            $this->load->view('stats', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function cursusenseignant()
    {
        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Page_model');

            $data['listeprofs'] = $this->Page_model->listeprofs();

            $this->load->view('header');
            $this->load->view('cursusenseignant', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function cursusenseignantattribution($comptes)
    {

        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Page_model');

            $data['comptes'] = $this->Page_model->find_name($comptes);
            $data['listecursus'] = $this->Page_model->listecursus();
            $idc = $this->input->post('idCursus');
            $ens = $this->input->post('enseignant_id');
            
            $this->Page_model->attribuecursus($idc, $ens);

            $this->load->view('header');
            $this->load->view('cursusenseignantattribution', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }
}
