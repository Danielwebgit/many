<?php

class Login_model extends CI_Model
{

    private $email;

    private $password;

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Faz a validação dos campos.
     *
     * @param [type] $email
     * @param [type] $password
     * @return void
     */
    function validation($email, $password)
    {
        $this->db->where('nome', $email);
        $this->db->or_where('email', $email);
        $this->load->library('encrypt');
        $query = $this->db->get('contas');
        
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $store_password = $row->senha;
                
                if($password === $store_password)
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
            }
        }
    }

    /**
     * Atualiza
     *
     * @param [type] $id
     * @param [type] $provider
     * @return void
     */
    public function update($id, $provider)
    {
        $this->db->where('id', $id);
        return $this->db->update('provider', $provider);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function logged_in()
    {
        if(!$this->session->userdata('status'))
        {
            redirect('');
        }
    }

    /**
     * Entra com usuário
     *
     * @param array $user
     * 
     * @return void
     */
    public function setUser($user = array('email', 'password'))
    {
        $this->email = $user['email'];
        $this->password = md5($user['password']);
    }

    /**
     * Sai do sistema matando a sessão do usuário.
     *
     * @return void
     */
    public function logout()
    {
        $this->session->unset_userdata("logged_user");
        redirect('');
    }

    /**
     * Busca o usuário.
     *
     * @return void
     */
    public function getUser()
    {
        $this->db->
        select('*')
            ->from('users')
            ->where('user_id', $this->session->userdata('user_id'))->get();

        $data = $this->db->result()[0];

        return $data[0];
    }

    /**
     * Criamos uma nova conta
     *
     * @return void
     */
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

    /**
     * Atualiza a senha.
     *
     * @param [type] $hash
     * 
     * @return void
     */
    public function updatePassword($hash = null)
    {
        if($hash)
        {
            $data = explode('*', $hash);
            $this->db->update('user', array('password' => md5($this->input->post('password'))))->where('email', $data['0']);
        }
    }
}