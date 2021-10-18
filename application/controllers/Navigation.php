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

    public function register()
    {
        $this->load->view('header');

        if ($this->input->post()) {
            $post = $this->input->post();
            unset($post['btn_inscription']);

            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required|alpha_numeric');

            if ($this->form_validation->run()) {
                $this->load->model('user_model');
                $post['password'] = $this->auth->crypt_password($post['password']);
                $post['type'] = 'famille';
                $this->user_model->add($post);
                echo '<h2 class="text-center text-success mt-5">Inscription de la famille validée</h2>';
                header('refresh:1;'. site_url("Navigation/connection"));
            }
        }

        $this->load->view('register');
        $this->load->view('footer');
    }

    public function login()
    {
        $this->load->view('header');

        if ($this->input->post()) {
            $post = $this->input->post();
            unset($post['btn_connection']);

            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required|alpha_numeric');

            if ($this->form_validation->run()) {
                $email = $this->input->post("email");
                $password = $this->input->post("password");

                if ($this->auth->login($email, $password, "famille")) {
                    $this->session->connected = true;
                    $this->session->user_type = $this->session->user['type'];
                    echo '<h2 class="text-center text-success mt-5">Connexion réussie</h2>';
                    header('refresh:1;'. site_url("Navigation/index"));
                } else {
                    echo '<h2 class="text-center text-danger mt-5">Connection refusée , l\'adresse ou le mot de passe est incorrect</h2>';
                }
            }
        }
        $this->load->view('login');
        $this->load->view('footer');
    }

    public function deconnection()
    {
        $this->auth->logout(true);
        redirect(site_url("Navigation/connection"));
    }

    public function welcome_message()
    {
        $this->load->view('header');
        $this->load->view('welcome_message');
        $this->load->view('footer');
    }

    public function images()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Navigation/connection'));
        }
        $this->load->view('header');
        $this->load->view('images');
        $this->load->view('footer');
    }

    public function video()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Navigation/connection'));
        }
        $this->load->view('header');
        $this->load->view('video');
        $this->load->view('footer');
    }
}
