<?php
// requiring once the base class
//require_once APPPATH.'/repositories/Colaborador_repository.php';

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
        // Enviar os dados para realizar no repository do colaborador.
        $this->load->repository('colaborador_repository');
        $colaborador_id = $this->colaborador_repository->create_colaborator($request, $this->db_table);
        
        // Enviar os dados para realizar no repository do endereço.
        $this->load->repository('endereco_repository');
        $this->endereco_repository->create_endereco($colaborador_id, $request);
    }

    public function show($id)
    {
        return $this->db->get_where($this->db_table, array(
            'produto_id' => $id
        ))->row_array();
    }

    /**
     * Atualiza o colaborador.
     *
     * @param [int] $id
     * @param [array] $colaboradores
     * 
     * @return void
     */
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