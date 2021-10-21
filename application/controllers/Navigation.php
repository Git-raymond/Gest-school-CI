<?php

class Navigation extends CI_Controller
{
    public function index()
    {
        $this->load->view('header');
        $this->load->view('welcome_message');
        $this->load->view('footer');
    }

    public function contact()
    {
        $this->load->view('header');
        $this->load->view('contact');
        $this->load->view('footer');
    }

    public function indexadmin()
    {
        // if ($this->session->connected == false) {
        //     redirect(site_url('Navigation/login'));
        // }
        $this->auth->authorized(
            ["admin"],
            "Navigation/login"
        );
        // $this->output->enable_profiler(true);
        $this->load->view('header');
        $this->load->view('indexadmin');
        $this->load->view('footer');
    }

    public function indexfamille()
    {
        $this->auth->authorized(
            ["famille"],
            "Navigation/login"
        );
        $this->load->view('header');
        $this->load->view('indexfamille');
        $this->load->view('footer');
    }

    public function indexeleve()
    {
        $this->auth->authorized(
            ["eleve"],
            "Navigation/login"
        );
        $this->load->view('header');
        $this->load->view('indexeleve');
        $this->load->view('footer');
    }

    public function indexenseignant()
    {
        $this->auth->authorized(
            ["enseignant"],
            "Navigation/login"
        );
        $this->load->view('header');
        $this->load->view('indexenseignant');
        $this->load->view('footer');
    }

    public function stats()
    {
        $this->auth->authorized(
            ["admin"],
            "Navigation/login"
        );
        $this->load->view('header');
        $this->load->view('stats');
        $this->load->view('footer');
    }

    public function register()
    {
        $this->load->view('header');

        if ($this->input->post()) {
            $post = $this->input->post();
            unset($post['valider']);

            $this->form_validation->set_rules('username', 'username', 'required|alpha_numeric');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required|alpha_numeric');

            if ($this->form_validation->run()) {
                $this->load->model('user_model');
                $post['password'] = md5($this->input->post('password'));
                $post['type'] = 'famille';
                $this->user_model->addfamille($post);
                echo '<h2 class="text-center text-success mt-5">Inscription de la famille validée</h2>';
                header('refresh:1;' . site_url("login"));
            }
        }

        $this->load->view('register');
        $this->load->view('footer');
    }

    // public function login()
    // {
    //     $this->load->view('header');

    //     if ($this->input->post()) {
    //         $post = $this->input->post();
    //         unset($post['valider']);

    //         $this->form_validation->set_rules('email', 'email', 'required|valid_email');
    //         $this->form_validation->set_rules('password', 'password', 'required|alpha_numeric');

    //         if ($this->form_validation->run()) {
    //             $email = $this->input->post("email");
    //             $password = $this->input->post("password");

    //             if ($this->auth->login($email, $password, "famille")) {
    //                 $this->session->connected = true;
    //                 $this->session->user_type = $this->session->user['type'];
    //                 echo '<h2 class="text-center text-success mt-5">Connexion famille réussie</h2>';
    //                 header('refresh:1;' . site_url("Navigation/indexfamille"));
    //             } else if ($this->auth->login($email, $password, "admin")) {
    //                 $this->session->connected = true;
    //                 $this->session->user_type = $this->session->user['type'];
    //                 echo '<h2 class="text-center text-success mt-5">Connexion admin réussie</h2>';
    //                 header('refresh:1;' . site_url("Navigation/indexadmin"));
    //             } else if ($this->auth->login($email, $password, "eleve")) {
    //                 $this->session->connected = true;
    //                 $this->session->user_type = $this->session->user['type'];
    //                 echo '<h2 class="text-center text-success mt-5">Connexion élève réussie</h2>';
    //                 header('refresh:1;' . site_url("Navigation/indexeleve"));
    //             } else if ($this->auth->login($email, $password, "enseignant")) {
    //                 $this->session->connected = true;
    //                 $this->session->user_type = $this->session->user['type'];
    //                 echo '<h2 class="text-center text-success mt-5">Connexion enseignant réussie</h2>';
    //                 header('refresh:1;' . site_url("Navigation/indexenseignant"));
    //             } else {
    //                 echo '<h2 class="text-center text-danger mt-5">Connection refusée , l\'adresse ou le mot de passe est incorrect</h2>';
    //                 header('refresh:1;' . site_url("Navigation/login"));
    //             }
    //         }
    //     }
    //     $this->load->view('login');
    //     $this->load->view('footer');
    // }

    public function deconnection()
    {
        $this->auth->logout(true);
        redirect(site_url("Navigation/login"));
    }

    public function welcome_message()
    {
        $this->load->view('header');
        $this->load->view('welcome_message');
        $this->load->view('footer');
    }
}
