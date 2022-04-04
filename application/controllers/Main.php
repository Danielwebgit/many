<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_permission();
    }

    public function index()
    {
        // VERIFICA SE ESTÁ LOGADO
        if(! true){
            redirect('login');
        }
        else
        {
            $this->main();
        }
    }
    public function main()
    {        
        $this->template('template/dashboard/main');
    }

    private function template($view, $data = null)
    {
        $this->load->view('template/main_header', $data);
        $this->load->view($view);
        $this->load->view('template/main_footer', $data);
    }

}