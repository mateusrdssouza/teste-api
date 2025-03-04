<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'codigo' => 'required|integer|unique:companies,codigo',
            'empresa' => 'required|string|max:255',
            'sigla' => 'required|string|max:40',
            'razao_social' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'codigo.required' => 'Digite um código',
            'codigo.integer' => 'Digite um código válido',
            'codigo.unique' => 'Já existe uma empresa registrada com esse código',
            'empresa.required' => 'Digite um nome',
            'empresa.string' => 'Digite um nome válido',
            'empresa.max' => 'O nome deve ter no máximo 255 caracteres',
            'sigla.required' => 'Digite uma sigla',
            'sigla.string' => 'Digite uma sigla válida',
            'sigla.max' => 'A sigla deve ter no máximo 40 caracteres',
            'razao_social.required' => 'Digite uma razão social',
            'razao_social.string' => 'Digite uma razão social válida',
            'razao_social.max' => 'A razão social deve ter no máximo 255 caracteres',
        ];
    }
}
