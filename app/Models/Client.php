<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cpf', 'data_nascimento', 'sexo', 'endereco', 'cidade', 'estado'];
    protected $searchable = ['id', 'nome', 'cpf', 'data_nascimento', 'sexo', 'endereco', 'cidade', 'estado'];

    /**
     * Retorna as colunas pesquisáveis da tabela clients.
     *
     * @return array
    */
    public function searchableColumns()
    {
        $searchableColumns =  array_fill_keys($this->searchable, '');
        return $searchableColumns;
    }

    /**
     * Retorna as regras de validação para insercao de um novo registro.
     *
     * @return array
    */
    public function createRules()
    {
        $createRules = [
            "nome"              => "required|string|max:50",
            "cpf"               => "required|unique:clients,cpf",
            "data_nascimento"   => "required|date|before:-18 years",
            "sexo"              => "required|in:masculino,feminino",
            "endereco"          => "required|string",
            "cidade"            => "required|string|max:50",
            "estado"            => "required|string|size:2",
        ];

        return $createRules;
    }

    /**
     * Retorna as regras de validação comuns para registros existentes.
     *
     * @return array
    */
    public function generalRules()
    {
        $generalRules = [
            "nome"              => "string|max:50",
            "data_nascimento"   => "date|before:-18 years",
            "sexo"              => "in:masculino,feminino",
            "endereco"          => "string",
            "cidade"            => "string|max:50",
            "estado"            => "string|size:2",
        ];

        return $generalRules;
    }

    /**
     * Retorna o feedback dos erros das regras de validação.
     *
     * @return array
    */
    public function errorsFeedback()
    {
        $errorsFeedback = [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string'   => 'O campo nome deve ser uma string.',
            'nome.max'      => 'O campo nome deve ter no máximo :max caracteres.',
        
            'cpf.required'  => 'O campo CPF é obrigatório.',
            'cpf.unique'    => 'O CPF informado já está em uso.',
        
            'data_nascimento.required'  => 'O campo data de nascimento é obrigatório.',
            'data_nascimento.date'      => 'O campo data de nascimento deve ser uma data válida.',
            'data_nascimento.before'    => 'O campo data de nascimento deve ser anterior a :date.',
        
            'sexo.required' => 'O campo sexo é obrigatório.',
            'sexo.in'       => 'O campo sexo deve ter um dos valores: masculino, feminino.',
        
            'endereco.required' => 'O campo endereço é obrigatório.',
            'endereco.string'   => 'O campo endereço deve ser uma string.',
        
            'cidade.required'   => 'O campo cidade é obrigatório.',
            'cidade.string'     => 'O campo cidade deve ser uma string.',
            'cidade.max'        => 'O campo cidade deve ter no máximo :max caracteres.',
        
            'estado.required'   => 'O campo estado é obrigatório.',
            'estado.string'     => 'O campo estado deve ser uma string.',
            'estado.size'       => 'O campo estado deve ter :size caracteres.'
        ];

        return $errorsFeedback;
    }

}
