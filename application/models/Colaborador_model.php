<?php

class Colaborador_model extends CI_Model
{

    protected $db_table = 'colaboradores';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->db->select(
            'colaboradores.colaborador_id, colaboradores.nome, colaboradores.funcao, colaboradores.cargo, colaboradores.status'
        );
        $this->db->from('colaboradores');
       
        return $this->db->get()->result_array();
    }

    public function store(array $request)
    {
        $this->db->set($request);
        $this->db->insert($this->db_table, $request);
        return $request;
    }

    public function show($id)
    {
        return $this->db->get_where($this->db_table, array(
            'produto_id' => $id
        ))->row_array();
    }

    public function update($id, $colaboradores)
    {
        if($colaboradores){
            $this->db->where('colaborador_id', $id);
            $this->db->set($colaboradores);
            
            $this->db->update($this->db_table, $colaboradores);
            return true;
        }

        $this->db->select(
            'colaboradores.status'
        );
        $this->db->from('colaboradores');
       
        $data = $this->db->where('colaborador_id', $id)->get()->result_array();
        $data[0]['status'] == 0 ? $data = ['status' =>  1] : $data = ['status' => 0];
        $this->db->where('colaborador_id', $id);
        $this->db->set($data);
        
        $this->db->update($this->db_table, $data);
        return true;
    }
}