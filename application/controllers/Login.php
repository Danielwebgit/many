<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->template('pages/login/form_login');
    }

    private function template($view, $data = null)
    {
        $this->load->view('template/login_header', $data);
        $this->load->view($view);
        $this->load->view('template/login_footer', $data);
    }

    public function store()
    {
        // VALIDATION RULES
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // MODELO LOGIN
        $this->load->model("login_model", 'verification');
        $query = $this->verification->validation($email, $password);
    
        if ($this->form_validation->run() == FALSE) 
        {
            $this->template('pages/login/form_login');
        }
        else
        {
            // VERIFICA LOGIN E SENHA.
            if ($query) {
                $data = array('nome' => $email, 'logged' => true);
                
                $this->session->set_userdata('logged_user', $data);
               
                redirect('main');
            }
            else
            {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Sucesso!</strong> Usuário ou senha inválidos!.</div>');
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->unset_userdata('logged_user');
        redirect('login');
    }
}