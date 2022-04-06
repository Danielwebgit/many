<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colaborador extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_permission();
    }

    public function index()
    {
        $this->load->model('colaborador_model');
      
        $data['title'] = 'Colaboradores';
        $data['colaboradores'] = $this->colaborador_model->index();
        $this->template('pages/dashboard/colaborador/index', $data);
    }

    private function template($view, $data = null)
    {
        $this->load->view('template/main_header', $data);
        $this->load->view($view);
        $this->load->view('template/main_footer', $data);
    }

    public function create()
    {
        $data['title'] = 'Colaborador';
        $this->template('pages/dashboard/colaborador/create', $data);
    }

    public function store()
    {
        $form_data = $_POST;

        $this->load->model('colaborador_model');

        $this->colaborador_model->store($form_data);
        redirect('colaboradores');
    }

    public function edit($id)
    {
        $this->load->model('colaborador_model');
        $data['colaboradores'] = $this->colaborador_model->show($id);
        $data['title'] = "Editando Colaboradores";

        $this->template('pages/dashboard/colaboradores/create', $data);
    }

    public function update($id)
    {
        $this->load->model('colaborador_model');
        $colaboradores = $_POST;
      
        $this->colaborador_model->update($id, $colaboradores);
        
        redirect('colaboradores');
    }
}