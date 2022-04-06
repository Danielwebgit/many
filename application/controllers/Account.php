<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->template('pages/login/form_register');
    }

    private function template($view, $data = null)
    {
        $this->load->view('template/login_header', $data);
        $this->load->view($view);
        $this->load->view('template/login_footer', $data);
    }

    public function store()
    {
        $form_dara = $_POST;
        $this->load->model('conta_model');
        $this->conta_model->store_register_account($form_dara);
        redirect('login');
    }
}