<?php

class Navigation extends CI_Controller
{
    public function index()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Navigation/connection'));
        }

        $this->load->view('header');
        $this->load->view('welcome_message');
        $this->load->view('footer');
    }

    public function inscription()
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
                $post['type'] = 'user';
                $this->user_model->add($post);
                echo '<h2 class="text-center text-success mt-5">Inscription validée</h2>';
                header('refresh:1;'. site_url("Navigation/connection"));
            }
        }

        $this->load->view('inscription');
        $this->load->view('footer');
    }

    public function connection()
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

                if ($this->auth->login($email, $password, "user")) {
                    $this->session->connected = true;
                    $this->session->user_type = $this->session->user['type'];
                    echo '<h2 class="text-center text-success mt-5">Connexion réussie</h2>';
                    header('refresh:1;'. site_url("Navigation/index"));
                } else {
                    echo '<h2 class="text-center text-danger mt-5">Connection refusée , l\'adresse ou le mot de passe est incorrect</h2>';
                }
            }
        }
        $this->load->view('connection');
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
