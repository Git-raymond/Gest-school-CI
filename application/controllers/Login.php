<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    function index()
    {
        $this->load->view('header');
        $this->load->view('login');
        $this->load->view('footer');
    }

    function auth()
    {
        $email    = $this->input->post('email', TRUE);
        $password = md5($this->input->post('password', TRUE));
        $validate = $this->login_model->validate($email, $password);
        if ($validate->num_rows() > 0) {
            $data  = $validate->row_array();
            $name  = $data['username'];
            $email = $data['email'];
            $level = $data['type'];
            $sesdata = array(
                'username'  => $name,
                'email'     => $email,
                'type'     => $level,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);
            // access login for admin
            if ($level === 'admin') {
                redirect('page/indexadmin');
            } elseif ($level === 'famille') {
                redirect('page/indexfamille');
            } elseif ($level === 'eleve') {
                redirect('page/indexeleve');
            } else {
                redirect('page/indexenseignant');
            }
        } else {
            echo $this->session->set_flashdata('msg', 'Email or Password is Wrong');
            redirect('login');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
