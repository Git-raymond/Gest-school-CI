<?php

class Navigation extends CI_Controller
{
    public function index()
    {
        $title['title'] = ucfirst('accueil');
        $this->load->view('header', $title);
        $this->load->view('welcome_message');
        $this->load->view('footer');
    }

    public function comptesuspendu()
    {
        $title['title'] = ucfirst('compte suspendu');
        $this->load->view('header', $title);
        $this->load->view('video');
        $this->load->view('footer');
    }

    public function stats()
    {
        $title['title'] = ucfirst('statistiques');
        $this->auth->authorized(
            ["admin"],
            "Navigation/login"
        );
        $this->load->view('header', $title);
        $this->load->view('stats');
        $this->load->view('footer');
    }

    public function contact()
    {
        $title['title'] = ucfirst('contact');
        $this->load->view('header', $title);
        $this->load->view('contact');
        $this->load->view('footer');
    }

    public function news()
    {
        $title['title'] = ucfirst('news');
        $this->load->view('header', $title);
        $this->load->view('news');
        $this->load->view('footer');
    }

    public function register()
    {
        $title['title'] = ucfirst('inscription');
        $this->load->view('header', $title);

        if ($this->input->post()) {
            $post = $this->input->post();
            unset($post['valider']);

            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[p3_g3_comptes.email]');
            $this->form_validation->set_rules('password', 'password', 'required');

            if ($this->form_validation->run()) {
                $this->load->model('user_model');
              
                $post['password'] = md5($this->input->post('password'));
                $post['type'] = 'famille';
                $this->user_model->addfamille($post);
                echo '<h2 class="text-center text-success mt-5">Inscription de la famille validée</h2>';
                header('refresh:2;' . site_url("login"));
            } else {
               
                echo '<h2 class="text-center text-danger mt-5">Saisir une adresse Email valide/L\'adresse existe déjà</h2>';
                
            }
        }

        $this->load->view('register');
        $this->load->view('footer');
    }

    // public function welcome_message()
    // {
    //     $this->load->view('header');
    //     $this->load->view('welcome_message');
    //     $this->load->view('footer');
    // }
}
