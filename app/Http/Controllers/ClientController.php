<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Client as Model;
use Carbon\Carbon;

class ClientController extends Controller
{
    public function __construct(Model $client)
    {
        date_default_timezone_set("America/Fortaleza");

        $this->client = $client;
    }

    /**
     * Cria um registro de cliente no banco de dados.
     *
     * @return \Illuminate\Http\JsonResponse
    */
    public function create(Request $request)
    {
        try {

            // dd($request->all());
            $errors         = array();
            $clientData     = $request->all();
            $errorsFeedback = $this->client->errorsFeedback();
            $rules          = $this->client->createRules();

            $validator = Validator::make($clientData, $rules, $errorsFeedback);
            if ($validator->fails()) {
                $errors = $validator->errors();
                throw new \Exception("Não podemos concluir sua solicitação", 422);    
            }
    
            $clientRegister = $this->client->create($clientData);
            if(!$clientRegister) {
                throw new \Exception("Erro interno, tente novamente mais tarde", 500);
            }
    
            return response()->json([
                "success" => true,
                "message" => "Cliente cadastrado com sucesso",
                "data" => $clientRegister,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "{$e->getMessage()}",
                "errors" => $errors,
            ], $e->getCode() ?: 500);
        }
    }
    
    /**
     * Atualiza um registro de cliente no banco de dados.
     *
     * @return \Illuminate\Http\JsonResponse
    */
    public function update($id, Request $request)
    {
        try {

            $errors         = array();
            $clientData     = $request->all();
            $errorsFeedback = $this->client->errorsFeedback();
            $rules          = $this->client->generalRules();

            if(!$id) {
                throw new \Exception("Registro a ser atualizado não informado", 400);
            }

            $validator = Validator::make($clientData, $rules, $errorsFeedback);
            if ($validator->fails()) {
                $errors = $validator->errors();
                throw new \Exception("Não podemos concluir sua solicitação", 422);    
            }
    
            if($clientData["cpf"]) {
                $idCpf = $this->client->where("cpf", $clientData["cpf"])->get();
                if(count($idCpf) > 0) {
                    $idCpf->each(function($obj) use ($id) {
                        if($obj->id != $id) {
                            throw new \Exception("Conflito de CPFs, favor reveja essa informação.", 400);
                        }
                    });
                }
            }

            $clientUpdate = $this->client->where("id", $id)->update($clientData);
            if(!$clientUpdate) {
                throw new \Exception("Erro interno, tente novamente mais tarde", 500);
            }
    
            return response()->json([
                "success" => true,
                "message" => "Cliente atualizado com sucesso",
                "data" => $clientUpdate,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "{$e->getMessage()}",
                "errors" => $errors,
            ], $e->getCode() ?: 500);
        }
    }


    /**
     * Deleta um registro de cliente no banco de dados.
     *
     * @return \Illuminate\Http\JsonResponse
    */
    public function delete($id)
    {
        try {

            if(!$id) {
                throw new \Exception("Registro a ser deletado não informado", 400);
            }

            $clientDelete = $this->client->where("id", $id)->delete();
            if(!$clientDelete) {
                throw new \Exception("Erro interno, tente novamente mais tarde", 500);
            }
    
            return response()->json([
                "success" => true,
                "message" => "Cliente deletado com sucesso",
                "data" => $id,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "{$e->getMessage()}",
                "errors" => [],
            ], $e->getCode() ?: 500);
        }
    }
    /**
     * Consulta registros no banco de dados.
     *
     * @return \Illuminate\Http\JsonResponse
    */
    public function get(Request $request)
    {
        try {

            $errors             = array();
            $searchableColumns  = $this->client->searchableColumns();
            $seachData          = $request->all();

            $params = [];

            foreach ($searchableColumns as $key => $value) {
                if (array_key_exists($key, $seachData) && $seachData[$key] !== null && $seachData[$key] !== '') {
                    $params[$key] = $seachData[$key];
                }
            }

            $clientsData = $this->client->where(function ($where) use ($params) {
                foreach ($params as $column => $value) {
                    $where->orWhere($column, "LIKE", "%" . $value . "%");
                }
            })->orderByDesc("id")->paginate(10);


            $clientsData->each(function($uniqueClient) {
               
                $uniqueClient->sexo = ucfirst($uniqueClient->sexo);
                $uniqueClient->unformatted_date = $uniqueClient->data_nascimento;
                $uniqueClient->data_nascimento = Carbon::createFromFormat("Y-m-d", $uniqueClient->data_nascimento)->format("d/m/Y");
            });

    
            foreach ($params as $key => $value) {
                $clientsData->appends([$key => $value]);
            }

            return response()->json([
                "success" => true,
                "message" => "Consulta realizada com sucesso",
                "data" => $clientsData,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "{$e->getMessage()}",
                "errors" => $errors,
            ], $e->getCode() ?: 500);
        }
    }
}
