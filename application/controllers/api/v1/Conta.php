<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . "/libraries/REST_Controller.php";

use \Restserver\Libraries\REST_Controller;

class Conta extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Carrega a Model da  Conta
        $this->load->model('conta_model');
    }
    
    /**
     * Registrar a conta
     * @method : POST
     * @url : api/v1/conta/register
     */
    public function register_post()
    {
        header("Access-Control-Allow-Origin: *");

        # XSS Filtering (http://www.codeigniter.com/user_guide/libraries/security.html)
        $this->security->xss_clean($_POST);

        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $message = array(
                'status' => false,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
            return $this->response($message, REST_Controller::HTTP_FOUND);
        }
        else
        {
            $insert_data = array(
                'nome' => $this->input->post('nome', TRUE),
                'email' => $this->input->post('email', TRUE),
                'senha' => $this->input->post('senha', TRUE),
                'created_at' => date('Y-m-d h:i:s', time()),
                'update_ad' => date('Y-m-d h:i:s', time())
            );

            $output = $this->conta_model->store($insert_data);
            
            if($output > 0 AND !empty($output))
            {
                // Sucesso code 200 status
                $message = array(
                    'status' => true,
                    'message' => "Conta Registrado com Sucesso!"
                );
                return $this->response($message, REST_Controller::HTTP_OK);
            }
            else
            {
                // Error
                $message = array(
                    'status' => false,
                    'message' => "Erro no registro!"
                );
                return $this->response($message, REST_Controller::HTTP_FOUND);
            }
        }
    }

    /**
     * Logando na conta
     *
     * @method : POST
     * 
     *
     * @url : api/v1/conta/login
     */
    public function login_post()
    {
        header("Access-Control-Allow-Origin: *");

        # XSS Filtering (http://www.codeigniter.com/user_guide/libraries/security.html)
        $this->security->xss_clean($_POST);

        // Form validação
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('senha', 'senha', 'trim|required|max_length[100]');

        // Form validação erro
        if ($this->form_validation->run() == FALSE)
        {
            $message = array(
                'status' => false,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
            return $this->response($message, REST_Controller::HTTP_FOUND);
        }
        else
        {
            $formRequest = $this->input->post(['email', 'senha']);
            // Lendo a função de logar no sistema
            $output = $this->conta_model->login_conta($formRequest);
            
            if(!empty($output)  &&  $output != FALSE)
            {
                // Carrega Autorização para a aplicação do login
                $this->load->library('Authorization_Token');
              
                //Gerando Token
                $token_data['id'] = $output['conta_id'];
                $token_data['nome'] = $output['nome'];
                $token_data['email'] = $output['email'];
                $token_data['time'] = time();
                
                $conta_token = $this->authorization_token->generateToken($token_data);
                
                $this->authorization_token->userData();
              
                // Logado com Sucesso code 200 status
                $message = array(
                    'status' => true,
                    'data' => $token_data,
                    'token' => $conta_token,
                    'message' => "Logado com Sucesso!"
                );
                return $this->response($message, REST_Controller::HTTP_OK);
            }
            else
            {
                // Login com Error
                $message = [
                    'status' => false,
                    'message' => "Erro no email ou na senha!"
                ];
                return $this->response($message, REST_Controller::HTTP_FOUND);
            }
        }
    }
}
