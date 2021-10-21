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

    public function rechercheprof()
    {
        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Page_model');

            $data['rechercheprofs'] = $this->Page_model->rechercheprofs();

            $this->load->view('header');
            $this->load->view('rechercheprof', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function ajoutprof()
    {
        $this->load->view('header');


        if ($this->input->post()) {
            $post = $this->input->post();
            unset($post['ajouter']);

            $this->form_validation->set_rules('username', 'username', 'required|alpha_numeric');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required|alpha_numeric');

            if ($this->form_validation->run()) {
                $this->load->model('user_model');
                $post['password'] = md5($this->input->post('password'));
                $post['type'] = 'enseignant';
                $this->user_model->addprof($post);
                echo '<h2 class="text-center text-success mt-5">Inscription de l\'enseignant validée</h2>';
                // header('refresh:1;' . site_url("login"));
            }
        }

        $this->load->view('ajoutprof');
        $this->load->view('footer');
    }

    public function listeprof()
    {
        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Page_model');

            $data['listeprofs'] = $this->Page_model->listeprofs();

            $this->load->view('header');
            $this->load->view('listeprof', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function editcompte($comptes)
    {
        $this->load->view('header');
        $this->load->model('Page_model');

        $data['comptes'] = $this->Page_model->find_name($comptes);

        if ($this->input->post('btn_update')) {

            $id = $this->input->post("id");
            $post = $this->input->post();
            unset($post['btn_update']);

            $this->form_validation->set_rules('status', 'status', 'required');
            $this->form_validation->set_rules('username', 'username', 'required|alpha_numeric');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required|alpha_numeric');

            if ($this->form_validation->run()) {
                $this->load->model('user_model');
                $post['password'] = md5($this->input->post('password'));
                $id = $this->uri->segment(3);
                $this->user_model->update($id, $post);
                echo '<h2 class="text-center text-success mt-5">Modification du compte validée</h2>';
            } else {
                echo '<h2 class="text-center text-danger mt-5">Erreur dans la modification</h2>';
            }
        }

        if ($this->input->post('delete_id')) {
            $this->load->model('user_model');
            $id = $this->uri->segment(3);
            $this->user_model->remove($id);
            echo '<h2 class="text-center text-success mt-5">Suppression du compte validée</h2>';
        }

        $this->load->view('editcompte', $data);
        $this->load->view('footer');
    }

    public function recherchecursus()
    {
        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Page_model');

            $data['recherchecursus'] = $this->Page_model->recherchecursus();

            $this->load->view('header');
            $this->load->view('recherchecursus', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function ajoutcursus()
    {
        $this->load->view('header');


        if ($this->input->post('ajouter')) {
            $post = $this->input->post();
            unset($post['ajouter']);

            $this->form_validation->set_rules('matiere', 'matiere', 'required');
            $this->form_validation->set_rules('annee', 'annee', 'required');
            $this->form_validation->set_rules('frais', 'frais', 'required');

            if ($this->form_validation->run()) {
                $this->load->model('Page_model');
               
                $this->Page_model->addcursus($post);
                echo '<h2 class="text-center text-success mt-5">Ajout du cursus validé</h2>';
                // header('refresh:1;' . site_url("login"));
            }
        }

        $this->load->view('ajoutcursus');
        $this->load->view('footer');
    }

    public function listecursus()
    {
        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Page_model');

            $data['listecursus'] = $this->Page_model->listecursus();

            $this->load->view('header');
            $this->load->view('listecursus', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function editmatiere($cursus)
    {
        $this->load->view('header');
        $this->load->model('Page_model');

        $data['cursus'] = $this->Page_model->find_cursus($cursus);

        if ($this->input->post('btn_update')) {

            $post = $this->input->post();
            unset($post['btn_update']);

            $this->form_validation->set_rules('matiere', 'matiere', 'required');
            $this->form_validation->set_rules('annee', 'annee', 'required');
            $this->form_validation->set_rules('frais', 'frais', 'required');

            if ($this->form_validation->run()) {
                $this->load->model('Page_model');
                
                $id = $this->uri->segment(3);
                $this->Page_model->updatecursus($id, $post);
                echo '<h2 class="text-center text-success mt-5">Modification du cursus validée</h2>';
            } else {
                echo '<h2 class="text-center text-danger mt-5">Erreur dans la modification</h2>';
            }
        }

        if ($this->input->post('delete_id')) {
            $this->load->model('page_model');
            $id = $this->uri->segment(3);
            $this->page_model->removecursus($id);
            echo '<h2 class="text-center text-success mt-5">Suppression du cursus validée</h2>';
        }

        $this->load->view('editmatiere', $data);
        $this->load->view('footer');
    }

}
