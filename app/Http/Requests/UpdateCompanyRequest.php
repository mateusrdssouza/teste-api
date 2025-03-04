<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'empresa' => 'required|integer',
            'sigla' => 'required|string|max:40',
            'razao_social' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'empresa.required' => 'Digite um nome',
            'empresa.integer' => 'Digite um nome válido',
            'sigla.required' => 'Digite uma sigla',
            'sigla.string' => 'Digite uma sigla válida',
            'sigla.max' => 'A sigla deve ter no máximo 40 caracteres',
            'razao_social.required' => 'Digite uma razão social',
            'razao_social.string' => 'Digite uma razão social válida',
            'razao_social.max' => 'A razão social deve ter no máximo 255 caracteres',
        ];
    }
}
