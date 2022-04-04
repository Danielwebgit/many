<?php

class Produto_model extends CI_Model
{

    protected $db_table = 'produtos';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->db->select(
            'produtos.produto_id, produtos.nome, produtos.descricao, produtos.quantidade, produtos.status'
        );
        $this->db->from('produtos');
       
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

    public function update($id, $produtos)
    {
        if($produtos){
            $this->db->where('produto_id', $id);
            $this->db->set($produtos);
            
            $this->db->update($this->db_table, $produtos);
            return true;
        }

        $this->db->select(
            'produtos.status'
        );
        $this->db->from('produtos');
       
        $data = $this->db->where('produto_id', $id)->get()->result_array();
        $data[0]['status'] == 0 ? $data = ['status' =>  1] : $data = ['status' => 0];
        $this->db->where('produto_id', $id);
        $this->db->set($data);
        
        $this->db->update($this->db_table, $data);
        return true;
    }

    /**
     * Deletando produto
     * 
     * @param {array} $data produto
     * @return void
     */
    public function deleta_produto(array $data)
    {
       $query = $this->db->get_where($this->db_table, array(
        'produto_id' => $data['produto_id'],
        'conta_id' => $data['conta_id']
    ))->row_array();
      
       if($query){
            $this->db->delete($this->db_table, $query);

            if($this->db->affected_rows() > 0){
                return TRUE;
            }
            return FALSE;
       }
       return FALSE;
    }

    /**
     * Atualizando|Editando um produto.
     *
     * @param {array} $data
     * 
     * @return void
     */
    public function update_produto(array $data):bool
    {
        $query = $this->db->get_where($this->db_table, array(
            'produto_id' => $data['produto_id']
        ))->row_array();
       
           if($query){
               $update_data = [
                'nome' => $data['nome'],
                'descricao' => $data['descricao'],
                'quantidade' => $data['quantidade'],
                'status' => $data['status'],
               ];

                $this->db->update($this->db_table, $update_data, ['produto_id' => (int) $query['produto_id']]);
    
                if($this->db->affected_rows() > 0){
                    return TRUE;
                }
                return FALSE;
           }
           return FALSE;
    }
}