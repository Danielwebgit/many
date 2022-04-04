<?php

class Login_model extends CI_Model
{

    private $email;
    private $password;

    public function __construct()
    {
        parent::__construct();
    }

    function validation($email, $password)
    {
        $this->db->where('nome', $email);
        $this->db->where('senha', $password);
        $query = $this->db->get('contas');
       
        if(count($query->result()) > 0)
        {
            return true; 
        }
    }

    public function update($id, $provider)
    {
        $this->db->where('id', $id);
        return $this->db->update('provider', $provider);
    }

    public function logged_in()
    {
        if(!$this->session->userdata('status'))
        {
            redirect('');
        }
    }

    public function setUser($user = array('email', 'password'))
    {
        $this->email = $user['email'];
        $this->password = md5($user['password']);
    }

    public function login(): array
    {
        $arrLogin = array();
        $this->db->select('*')->from('users')
            ->where('email', $this->email)
            ->where('password', $this->password);

        $qtdeUser = $this->db->count_all_result();

        if($qtdeUser > 0)
        {
            $user = $this->db->get()->result();
            $arrLogin['email'] = $user->email;
            $arrLogin['user_id'] = $user->user_id;
            $arrLogin['status'] = true;
            redirect('welcome');
        }
        else
        {
            redirect('');
        }

        return $arrLogin;
    }

    public function logout()
    {
        //$this->session()->unset_userdata("logged_user");
        redirect('');
    }

    public function getUser()
    {
        $this->db->
        select('*')
            ->from('users')
            ->where('user_id', $this->session->userdata('user_id'))->get();

        $data = $this->db->result()[0];

        return $data[0];
    }

    public function setNewUser()
    {
        foreach ($this->input->post() as $i => $v){
            if($i == '')
                $arrUser[$i] = $v;
        }

        $arrUser['name'] = $this->input->post('name');
        $arrUser['birth_data'] = $this->input->post('birth_data');
        $arrUser['email'] = $this->input->post('email');
        $arrUser['password'] = md5($this->input->post('password'));

        return $this->db->insert('users', $arrUser);
    }

    public function updatePassword($hash = null)
    {
        if($hash)
        {
            $data = explode('*', $hash);

            $this->db->update('user', array('password' => md5($this->input->post('password'))))->where('email', $data['0']);
        }
    }
}