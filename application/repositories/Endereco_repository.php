<?php

//require_once APPPATH.'/repositories/Colaborador_repository.php';
//require_once APPPATH.'system/core/Repository.php';

require_once APPPATH.'/models/Model_app.php';

class Endereco_repository extends CI_Repository
{
    protected $model;

    protected $table = 'enderecos';

    public function __construct()
    {
        $this->model = new Model_app();
    }

    public function create_endereco(int $id_colaborador, array $request):int
    {

        $array = [];
        $array_endereco = [];
        $array_um_endereco = [];
        $controller = $request['qnt_campo'] ? $request['qnt_campo'] : 1;

        while($controller > 0)
        {
            if(isset($request["cep-$controller"]) AND (!empty($request["cep-$controller"])))
            {
                $b = 0;
                $cont = 0;
                $array[] = $array_endereco[$b] = [
                    "cep" => $request["cep-$controller"],
                    "numero" => $request["numero-$controller"],
                    "bairro" => $request["bairro-$controller"],
                    "cidade" => $request["cidade-$controller"],
                    'fk_colaborador_id' => $id_colaborador
                 ];
                
                $controller--;
                $b++;
                $cont++;
            }
            else
            {
                $array_um_endereco = [ 0 => [
                    "cep" => $request["cep"],
                    "numero" => $request["numero"],
                    "bairro" => $request["bairro"],
                    "cidade" => $request["cidade"],
                    'fk_colaborador_id' => $id_colaborador
                ]
            ];
                $controller--;
            }
        }
        
        $enderecos = array_merge($array, $array_um_endereco);
   
        $insertData = $this->model->insert_batch( $enderecos, $this->table );
        return $insertData;
    }
}