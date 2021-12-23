<?php
class Page extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->helper('url_helper');
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }
    }

    function indexadmin()
    {
        $title['title'] = ucfirst('espace admin');
        if ($this->session->userdata('type') === 'admin') {
            $this->load->view('header', $title);
            $this->load->view('indexadmin');
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    function indexfamille()
    {
        $title['title'] = ucfirst('espace famille');
        if ($this->session->userdata('type') === 'famille') {
            $this->load->view('header', $title);
            $this->load->view('indexfamille');
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    function indexeleve()
    {
        $title['title'] = ucfirst('espace élève');
        if ($this->session->userdata('type') === 'eleve') {
            $this->load->view('header', $title);
            $this->load->view('indexeleve');
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    function indexenseignant()
    {
        $title['title'] = ucfirst('espace enseignant');
        if ($this->session->userdata('type') === 'enseignant') {
            $this->load->view('header', $title);
            $this->load->view('indexenseignant');
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }


    public function stats()
    {
        $title['title'] = ucfirst('statistiques');
        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Stats_model');

            $data['nombreFamilles'] = $this->Stats_model->nombrefamilles();
            $data['listeFamilles'] = $this->Stats_model->listefamilles();
            $data['profils'] = $this->Stats_model->listeprofil();
            $data['profs'] = $this->Stats_model->listeenseignantcursus();

            $this->load->view('header', $title);
            $this->load->view('stats', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function cursusenseignant()
    {
        $title['title'] = ucfirst('cursus enseignant');
        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Page_model');

            $data['listeprofs'] = $this->Page_model->listeprofs();

            $this->load->view('header', $title);
            $this->load->view('cursusenseignant', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function cursusenseignantattribution($comptes)
    {
        $title['title'] = ucfirst('attribution cursus enseignant');
        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Page_model');

            $data['comptes'] = $this->Page_model->find_name($comptes);
            $data['listecursus'] = $this->Page_model->listecursus();
            $idc = $this->input->post('idCursus');
            $ens = $this->input->post('enseignant_id');

            $this->Page_model->attribuecursus($idc, $ens);

            $this->load->view('header', $title);
            $this->load->view('cursusenseignantattribution', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function rechercheprof()
    {
        $title['title'] = ucfirst('recherche enseignant');
        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Page_model');

            $data['rechercheprofs'] = $this->Page_model->rechercheprofs();

            $this->load->view('header', $title);
            $this->load->view('rechercheprof', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function ajoutprof()
    {
        $title['title'] = ucfirst('ajout enseignant');
        if ($this->session->userdata('type') === 'admin') {
            $this->load->view('header', $title);


            if ($this->input->post()) {
                $post = $this->input->post();
                unset($post['ajouter']);

                $this->form_validation->set_rules('username', 'username', 'required');
                $this->form_validation->set_rules('email', 'email', 'required|valid_email');
                $this->form_validation->set_rules('password', 'password', 'required');

                if ($this->form_validation->run()) {
                    $this->load->model('user_model');
                    $post['password'] = md5($this->input->post('password'));
                    $post['type'] = 'enseignant';
                    $this->user_model->addprof($post);
                    echo '<h2 class="text-center text-success mt-5">Inscription de l\'enseignant validée</h2>';
                    // header('refresh:1;' . site_url(""));
                }
            }
            $this->load->view('ajoutprof');
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function listeprof()
    {
        $title['title'] = ucfirst('liste enseignant');
        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Page_model');

            $data['listeprofs'] = $this->Page_model->listeprofs();

            $this->load->view('header', $title);
            $this->load->view('listeprof', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function editcompte($comptes)
    {
        $title['title'] = ucfirst('mon compte');
        $this->load->view('header', $title);
        $this->load->model('Page_model');

        $data['comptes'] = $this->Page_model->find_name($comptes);

        if ($this->input->post('btn_update')) {

            $id = $this->input->post("id");
            $post = $this->input->post();
            unset($post['btn_update']);

            $this->form_validation->set_rules('status', 'status', 'required');
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');

            if ($this->form_validation->run()) {
                $this->load->model('user_model');
                $post['password'] = md5($this->input->post('password'));
                $id = $this->uri->segment(3);
                $this->user_model->update($id, $post);
                echo '<h2 class="text-center text-success mt-5">Modification du compte validée</h2>';
            } else {
                echo '<h2 class="text-center text-danger mt-5">Saisir une adresse email valide</h2>';
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
        $title['title'] = ucfirst('recherche cursus');
        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Page_model');

            $data['recherchecursus'] = $this->Page_model->recherchecursus();

            $this->load->view('header', $title);
            $this->load->view('recherchecursus', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function ajoutcursus()
    {
        $title['title'] = ucfirst('ajout cursus');
        if ($this->session->userdata('type') === 'admin') {
            $this->load->view('header', $title);


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
                    // header('refresh:1;' . site_url(""));
                }
            }
            $this->load->view('ajoutcursus');
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function listecursus()
    {
        $title['title'] = ucfirst('liste cursus');
        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Page_model');

            $data['listecursus'] = $this->Page_model->listecursus();

            $this->load->view('header', $title);
            $this->load->view('listecursus', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function editmatiere($cursus)
    {
        $title['title'] = ucfirst('modification cursus');
        if ($this->session->userdata('type') === 'admin') {
            $this->load->view('header', $title);
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
        } else {
            echo "Access Denied";
        }
    }

    public function cursuseleve()
    {
        $title['title'] = ucfirst('cursus élève');
        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Page_model');

            $data['listeeleves'] = $this->Page_model->listeeleves();

            $this->load->view('header', $title);
            $this->load->view('cursuseleve', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function cursuseleveattribution($comptes)
    {
        $title['title'] = ucfirst('attribution cursus élève');
        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Page_model');

            $data['comptes'] = $this->Page_model->find_name($comptes);
            $data['listecursus'] = $this->Page_model->listecursus();

            $ide = $this->input->post('eleve_id');
            $cur = $this->input->post('idCursus');

            $this->Page_model->attribuecursuseleve($ide, $cur);

            $this->load->view('header', $title);
            $this->load->view('cursuseleveattribution', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function rechercheeleve()
    {
        $title['title'] = ucfirst('recherche élève');
        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Page_model');

            $data['rechercheeleve'] = $this->Page_model->rechercheeleve();

            $this->load->view('header', $title);
            $this->load->view('rechercheeleve', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function listeelevecursus()
    {
        $title['title'] = ucfirst('liste élèves avec cursus');
        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Page_model');

            $data['listeelevecursus'] = $this->Page_model->listeelevecursus();

            $this->load->view('header', $title);
            $this->load->view('listeelevecursus', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function listeelevesanscursus()
    {
        $title['title'] = ucfirst('liste élèves sans cursus');
        if ($this->session->userdata('type') === 'admin') {

            $this->load->model('Page_model');

            $data['listeelevesanscursus'] = $this->Page_model->listeelevesanscursus();

            $this->load->view('header', $title);
            $this->load->view('listeelevesanscursus', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function rechercheelevefamille()
    {
        $title['title'] = ucfirst('recherche élève');
        if ($this->session->userdata('type') === 'famille') {

            $this->load->model('Page_model');

            $data['rechercheelevefamille'] = $this->Page_model->rechercheelevefamille();

            $this->load->view('header', $title);
            $this->load->view('rechercheelevefamille', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function ajoutelevefamille()
    {
        $title['title'] = ucfirst('ajout élève');
        if ($this->session->userdata('type') === 'famille') {
            $famille_id = $this->session->userdata('famille_id');

            $this->load->view('header', $title);

            if ($this->input->post()) {
                $post = $this->input->post();
                unset($post['ajouter']);

                $this->form_validation->set_rules('username', 'username', 'required');
                $this->form_validation->set_rules('email', 'email', 'required|valid_email');
                $this->form_validation->set_rules('password', 'password', 'required');

                if ($this->form_validation->run()) {
                    $this->load->model('user_model');
                    $post['password'] = md5($this->input->post('password'));
                    $post['type'] = 'eleve';
                    $post['famille_id'] = $famille_id;
                    $this->user_model->addelevefamille($post);
                    echo '<h2 class="text-center text-success mt-5">Inscription de l\'élève validée</h2>';
                    // header('refresh:1;' . site_url(""));
                } else {
                    echo '<h2 class="text-center text-danger mt-5">Saisir une adresse Email valide</h2>';
                }
            }

            $this->load->view('ajoutelevefamille');
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function listeeleveattentefamille()
    {
        $title['title'] = ucfirst('liste élèves en attente');
        if ($this->session->userdata('type') === 'famille') {

            $this->load->model('Page_model');

            $data['listeeleveattentefamille'] = $this->Page_model->listeeleveattentefamille();

            $this->load->view('header', $title);
            $this->load->view('listeeleveattentefamille', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function listeelevefamille()
    {
        $title['title'] = ucfirst('liste élèves famille');
        if ($this->session->userdata('type') === 'famille') {

            $this->load->model('Page_model');

            $data['listeelevefamille'] = $this->Page_model->listeelevefamille();

            $this->load->view('header', $title);
            $this->load->view('listeelevefamille', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function affichenotesfamille()
    {
        $title['title'] = ucfirst('affichage notes');
        if ($this->session->userdata('type') === 'famille') {

            $this->load->model('Page_model');

            $data['affichenotesfamille'] = $this->Page_model->affichenotesfamille();

            $this->load->view('header', $title);
            $this->load->view('affichenotesfamille', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function rechercheelevecursusprof()
    {
        $title['title'] = ucfirst('recherche élèves du cursus');
        if ($this->session->userdata('type') === 'enseignant') {

            $this->load->model('Page_model');

            $data['rechercheelevecursusprof'] = $this->Page_model->rechercheelevecursusprof();

            $this->load->view('header', $title);
            $this->load->view('rechercheelevecursusprof', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function listeelevecursusprof()
    {
        $title['title'] = ucfirst('liste élèves du cursus');
        if ($this->session->userdata('type') === 'enseignant') {

            $this->load->model('Page_model');

            $data['listeelevecursusprof'] = $this->Page_model->listeelevecursusprof();

            $this->load->view('header', $title);
            $this->load->view('listeelevecursusprof', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function affichenotesprof()
    {
        $title['title'] = ucfirst('affichage notes enseignant');
        if ($this->session->userdata('type') === 'enseignant') {

            $this->load->model('Page_model');

            $data['affichenotesprof'] = $this->Page_model->affichenotesprof();

            $this->load->view('header', $title);
            $this->load->view('affichenotesprof', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function listecursusprof()
    {
        $title['title'] = ucfirst('liste des cursus');
        if ($this->session->userdata('type') === 'enseignant') {

            $this->load->model('Page_model');

            $data['listecursusprof'] = $this->Page_model->listecursusprof();

            $this->load->view('header', $title);
            $this->load->view('listecursusprof', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function affichenotes()
    {
        $title['title'] = ucfirst('affichage notes élève');
        if ($this->session->userdata('type') === 'eleve') {

            $this->load->model('Page_model');

            $data['affichenotes'] = $this->Page_model->affichenotes();

            $this->load->view('header', $title);
            $this->load->view('affichenotes', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }

    public function ajoutcontrole()
    {
        $title['title'] = ucfirst('ajout notes');
        if ($this->session->userdata('type') === 'enseignant') {

            $this->load->view('header', $title);

            // $this->form_validation->set_rules('intitule', 'intitule', 'required');
            // $this->form_validation->set_rules('note', 'note', 'required');
            // $this->form_validation->set_rules('commentaire', 'password', 'required');

            $this->load->model('Page_model');
            $data['listeelevecursusprof'] = $this->Page_model->listeelevecursusprof();
            $idControle = $this->input->post('idControle');
            $eleve_id = $this->input->post('eleve_id');
            $this->Page_model->ajoutcontrole($idControle, $eleve_id);
            echo '<h2 class="text-center text-success mt-5">Note du contrôle de l\'élève validée</h2>';
            // header('refresh:1;' . site_url(""));
            $this->load->view('ajoutcontrole', $data);
            $this->load->view('footer');
        } else {
            echo "Access Denied";
        }
    }
}
