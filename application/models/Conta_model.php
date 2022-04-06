<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conta_model extends CI_Model
{
    protected $db_table = 'contas';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Login do sistema
     *
     * @param array $formData
     * 
     * @return array|null
     */
    public function login_conta(array $formData): array|null
    {
        $array_Login = array();

        $this->db->where('email', $formData['email']);
        $this->db->or_where('nome', $formData['email']);

        $q = $this->db->get($this->db_table);

        if($q->num_rows())
        {
            
            $senha = $q->row('senha');
           
            if($formData['senha'] === $senha)
            {
               return (array) $q->row();
            }
            return FALSE;
        }
        else{
            return FALSE;
        }
    }

    public function store_register_account(array $data)
    {
        $data = [
            'nome' => $data['nome'],
            'email' => $data['email'],
            'senha' => md5($data['password']),
            'created_at' => '2022-03-31 02:13:59',
            'update_ad' => '2022-03-31 02:13:59'
        ];
        
        $this->db->set($data);
        $this->db->insert($this->db_table, $data);
        return $data;
    }
}