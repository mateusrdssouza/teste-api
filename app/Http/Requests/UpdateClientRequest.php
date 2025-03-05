<?php

namespace App\Http\Requests;

use App\Rules\DocumentValidator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $recnum = $this->route('company');

        return [
            'codigo' => 'required|integer|between:1,9999|unique:Cliente,codigo,' . $recnum . ',recnum',
            'empresa' => 'required|integer|between:1,9999|exists:Empresa,codigo',
            'razao_social' => 'required|string|max:255',
            'tipo' => 'required|string|in:PJ,PF',
            'cpf_cnpj' => ['required', 'string', 'max:18', new DocumentValidator($this->input('tipo'))]
        ];
    }

    public function messages()
    {
        return [
            'codigo.required' => 'Digite um código',
            'codigo.integer' => 'Digite um código válido',
            'codigo.between' => 'Digite um código entre 1 e 9999',
            'codigo.unique' => 'Já existe um cliente registrado com esse código',
            'empresa.required' => 'Digite o código da empresa',
            'empresa.integer' => 'Digite um código válido',
            'empresa.between' => 'Digite um valor entre 1 e 9999',
            'empresa.exists' => 'Empresa não encontrada',
            'razao_social.required' => 'Digite uma razão social',
            'razao_social.string' => 'Digite uma razão social válida',
            'razao_social.max' => 'A razão social deve ter no máximo 255 caracteres',
            'tipo.required' => 'Selecione o tipo do cliente',
            'tipo.string' => 'Selecione um tipo válido',
            'tipo.in' => 'O tipo deve ser PF ou PJ',
            'cpf_cnpj.required' => 'Digite o documento do cliente',
            'cpf_cnpj.string' => 'Digite um documento válido',
            'cpf_cnpj.max' => 'O documento deve ter no máximo 18 caracteres'
        ];
    }
}
