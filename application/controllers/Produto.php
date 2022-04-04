<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_permission();
    }

    public function index()
    {
        $this->load->model('produto_model');
      
        $data['title'] = 'Produtos';
        $data['produtos'] = $this->produto_model->index();
        $this->template('pages/dashboard/produtos/index', $data);
    }

    private function template($view, $data = null)
    {
        $this->load->view('template/main_header', $data);
        $this->load->view($view);
        $this->load->view('template/main_footer', $data);
    }

    public function create()
    {
        $data['title'] = 'Produto';
        $this->template('pages/dashboard/produtos/create', $data);
    }

    public function store()
    {
        $produtos = $_POST;
        $this->load->model('produto_model');
        $this->produto_model->store($produtos);
        redirect('produtos');
    }

    public function edit($id)
    {
        $this->load->model('produto_model');
        $data['produtos'] = $this->produto_model->show($id);
        $data['title'] = "Editando Produtos";

        $this->template('pages/dashboard/produtos/create', $data);
    }

    public function update($id)
    {
        $this->load->model('produto_model');
        $produtos = $_POST;
      
        $this->produto_model->update($id, $produtos);
        
        redirect('produtos');
    }
}