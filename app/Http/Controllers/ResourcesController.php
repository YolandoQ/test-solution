<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    /**
     * Capturar as cidades por estado.
     *
     * @return \Illuminate\Http\JsonResponse
    */
    public function listCidades(Request $request)
    {
        try {

            $data = collect([]);

            $municipios = json_decode(file_get_contents(public_path("municipios.json"))); # Capturar json original com os municipios
            
            $data = $data->merge([
                "data" => $municipios,
            ]);
            
            if(!empty($request->uf)) {  # Caso seja pesquisado algum estado

                if(!(strlen($request->uf) === 2)) throw new \Exception("Não conseguimos entender sua solicitação", 400);
                
                $municipiosFiltrados = [];

                foreach ($data['data'] as $key => $municipio) {
                    if($municipio->id_uf == strtoupper($request->uf)) array_push($municipiosFiltrados, $municipio);
                }
 
                $data["data"] = $municipiosFiltrados;  # Sobrescreve todos os municipios pelos filtrados

            }
            
            return response()->json([
                "status"  => true,
                "message" => "Requisição realizada com sucesso.",
                "data"    => $data->get("data")
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status"  => false,
                "message" => "Erro ao realizar requisição.",
                "data"    => "{$e->getMessage()}"
            ],  $e->getCode() ?: 500);
        }
    }

    /**
     * Capturar estados por municipio.
     *
     * @return \Illuminate\Http\JsonResponse
    */
    public function listEstados(Request $request)
    {
        try {

            $data = collect([]);

            $estados = json_decode(file_get_contents(public_path("estados.json"))); # Capturar json original com os estados
            
            $data = $data->merge([
                "data" => $estados,
            ]);
            
            if(!empty($request->uf)) {  # Caso seja pesquisado algum estado

                if(!(strlen($request->uf) === 2)) throw new \Exception("Não conseguimos entender sua solicitação", 400);
                
                $municipiosFiltrados = [];

                foreach ($data['data'] as $key => $municipio) {
                    if($municipio->uf_sigla == strtoupper($request->uf)) array_push($municipiosFiltrados, $municipio);
                }
 
                $data["data"] = $municipiosFiltrados;  # Sobrescreve todos os estados pelos filtrados

            }
            
            return response()->json([
                "status"  => true,
                "message" => "Requisição realizada com sucesso.",
                "data"    => $data->get("data")
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status"  => false,
                "message" => "Erro ao realizar requisição.",
                "data"    => "{$e->getMessage()}"
            ],  $e->getCode() ?: 500);
        }
    }
}
