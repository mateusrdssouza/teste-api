<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'empresa' => 'required|integer|exists:Empresa,codigo',
            'codigo' => 'required|integer|unique:Cliente,codigo',
            'razao_social' => 'required|string|max:255',
            'tipo' => 'required|string|in:PJ,PF',
            'cpf_cnpj' => 'required|string|max:14'
        ];
    }

    public function messages()
    {
        return [
            'empresa.required' => 'Digite o código da empresa',
            'empresa.integer' => 'Digite um código válido',
            'empresa.exists' => 'Código da empresa não encontrado',
            'codigo.required' => 'Digite um código',
            'codigo.integer' => 'Digite um código válido',
            'codigo.unique' => 'Já existe um cliente registrado com esse código',
            'razao_social.required' => 'Digite uma razão social',
            'razao_social.string' => 'Digite uma razão social válida',
            'razao_social.max' => 'A razão social deve ter no máximo 255 caracteres',
            'tipo.required' => 'Selecione o tipo do cliente',
            'tipo.string' => 'Selecione um tipo válido',
            'tipo.in' => 'O tipo deve ser PF ou PJ',
            'cpf_cnpj.required' => 'Digite o documento do cliente',
            'cpf_cnpj.string' => 'Digite um documento válido',
            'cpf_cnpj.max' => 'O documento deve ter no máximo 14 caracteres'
        ];
    }
}
