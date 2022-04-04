<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . "/libraries/REST_Controller.php";

use \Restserver\Libraries\REST_Controller;

class Produtos extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Carrega a Model da  Conta
        $this->load->model('produto_model');
    }

       /**
     * Fetch All Products Data
     * @method : GET
     * @url : api/v1/produtos
     */
    public function index_get()
    {
        header("Access-Control-Allow-Origin: *");
        # XSS Filtering (http://www.codeigniter.com/user_guide/libraries/security.html)
        $data = $this->security->xss_clean($_POST);

        // Carrega Autorização para a aplicação do login
    
        $is_valid_token = $this->authorization_token->validateToken();
      
        if(! empty($is_valid_token) AND $is_valid_token['status'] === false)
        {
            $is_valid_token['message'] = 'Token não definido!';

            return $this->response(['status' => FALSE, 'message' => $is_valid_token['message']], REST_Controller::HTTP_FOUND);
        }
        
        $data = $this->produto_model->index();
        $this->response($data);
    }

        /**
     * Fetch All Products Data
     * @method : POST
     * 
     * @param : $descricao
     * 
     * @url : api/v1/produtos/register
     */
    public function register_post()
    {
        $formaData = $this->request->body ?? $this->input->post();

        header("Access-Control-Allow-Origin: *");

        # XSS Filtering (http://www.codeigniter.com/user_guide/libraries/security.html)
        $this->security->xss_clean($_POST);

        // Form validação
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('quantidade', 'Quantidade', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
       
        $is_valid_token = $this->authorization_token->validateToken();
         
        if(! empty($is_valid_token) AND $is_valid_token['status'] === FALSE){

            $is_valid_token['message'] = 'Token não definido!';
            return $this->response(['status' => FALSE, 'message' => $is_valid_token['message']], REST_Controller::HTTP_FOUND);
        }
        else if($this->form_validation->run() == FALSE)
        {
            $message = array(
                'status' => false,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
            return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        }
        
        $data = $this->produto_model->store($formaData);
        $this->response($data);
    }

          /**
     * Atualiza um produto.
     * 
     * @method : PUT
     * 
     * @url : api/v1/produtos/update
     */
    public function update_put($id)
    {
        $formaData = $this->request->body ?? $this->input->post();
        
        header("Access-Control-Allow-Origin: *");
        $this->load->helper(array('form', 'url'));

        $is_valid_token = $this->authorization_token->validateToken();
         
        if(! empty($is_valid_token) AND $is_valid_token['status'] === FALSE){
            $is_valid_token['message'] = 'Token não definido!';
            return $this->response(['status' => FALSE, 'message' => $is_valid_token['message']], REST_Controller::HTTP_FOUND);
        }
        else
        {  
            # XSS Filtering (http://www.codeigniter.com/user_guide/libraries/security.html)
            $_POST = $this->security->xss_clean($formaData);
           
            $this->form_validation->set_data($_POST);
            
            // Form validação
            $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
            $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|max_length[100]');
            $this->form_validation->set_rules('quantidade', 'Quantidade', 'trim|required');
            $this->form_validation->set_rules('status', 'status', 'trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $message = array(
                    'status' => false,
                    'error' => $this->form_validation->error_array(),
                    'message' => validation_errors()
                );
                return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
            else{
                $this->load->model('produto_model');

                $update_data = [
                    'produto_id' => $id,
                    'nome' => $this->input->post('nome', TRUE),
                    'descricao' => $this->input->post('descricao', TRUE),
                    'quantidade' => $this->input->post('quantidade', TRUE),
                    'status' => $this->input->post('status', TRUE),
                ];

                $output = $this->produto_model->update_produto($update_data);
                
                if($output){
                    $message = [
                        'status' => TRUE,
                        'message' => 'Produto atualizado com sucesso!'
                    ];
                    return $this->response($message, REST_Controller::HTTP_OK);
                }
                else{
                    $message = [
                        'status' => FALSE,
                        'message' => 'Nenhuma atualização encontrado!'
                    ];
                    return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                }
            }
        }
        
        $data = $this->produto_model->store($formaData);
        $this->response($data);
    }

        /**
     * Deletando produto pelo ID
     * 
     * @method : DELETE
     * 
     * @param : $id
     * 
     * @url : api/v1/produtos/deletar
     */
    public function deletar_delete($id){

        header("Access-Control-Allow-Origin: *");

        # XSS Filtering (http://www.codeigniter.com/user_guide/libraries/security.html)
        $id = (int) $this->security->xss_clean($id);
       
        $is_valid_token = $this->authorization_token->validateToken();
         
        if(! empty($is_valid_token) AND $is_valid_token['status'] === FALSE){

            $is_valid_token['message'] = 'Token não definido!';
            return $this->response(['status' => FALSE, 'message' => $is_valid_token['message']], REST_Controller::HTTP_FOUND);
        }
        
        if(empty($id) AND !is_numeric($id)){
            return $this->response(['status' => false, 'message' => 'ID inválido'], REST_Controller::HTTP_NOT_FOUND);
        }
        else
        {
            $delete_produto = [
                'produto_id' => $id,
                'conta_id' => $is_valid_token['data']->id 
            ];

            $output = $this->produto_model->deleta_produto($delete_produto);

            if($output){
                $message = [
                    'status' => TRUE,
                    'message' => 'Produto Deletado com sucesso!'
                ];
                return $this->response($message, REST_Controller::HTTP_OK);
            }
            else{
                $message = [
                    'status' => FALSE,
                    'message' => 'Erro ao deletar ID não encontrado!'
                ];
                return $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
        } 
    }
}
