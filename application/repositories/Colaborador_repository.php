<?php

//require_once APPPATH.'/repositories/Colaborador_repository.php';
//require_once APPPATH.'system/core/Repository.php';

require_once APPPATH.'/models/Model_app.php';

class Colaborador_repository extends CI_Repository
{
    protected $model;
    protected $table = 'colaboradores';

    public function __construct()
    {
        $this->model = new Model_app();
    }
    public function create_colaborator(array $colaborador, $table):int
    {
        $user_colab = array(
            'nome' => $colaborador['nome'],
            'funcao' => $colaborador['funcao'],
            'cargo' => $colaborador['cargo'], 
            'status' => $colaborador['status'], 
           );
           
        $insertData = $this->model->insert($user_colab, $this->table);
        return $insertData;
    }
}