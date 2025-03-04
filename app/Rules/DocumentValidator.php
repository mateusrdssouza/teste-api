<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DocumentValidator implements ValidationRule
{
    protected $tipo;

    public function __construct($tipo)
    {
        $this->tipo = $tipo;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->tipo === 'PF') {
            if (!$this->isValidCPF($value)) {
                $fail('O CPF informado é inválido.');
            }
        } elseif ($this->tipo === 'PJ') {
            if (!$this->isValidCNPJ($value)) {
                $fail('O CNPJ informado é inválido.');
            }
        } else {
            $fail('O tipo de documento informado é inválido.');
        }
    }

    protected function isValidCPF($cpf)
    {
        $cpf = preg_replace('/\D/', '', $cpf);

        if (strlen($cpf) !== 11) {
            return false;
        }

        $soma = 0;
        for ($i = 0; $i < 9; $i++) {
            $soma += $cpf[$i] * (10 - $i);
        }
        $resto = $soma % 11;
        $digito1 = $resto < 2 ? 0 : 11 - $resto;

        $soma = 0;
        for ($i = 0; $i < 10; $i++) {
            $soma += $cpf[$i] * (11 - $i);
        }
        $resto = $soma % 11;
        $digito2 = $resto < 2 ? 0 : 11 - $resto;

        return ($cpf[9] == $digito1 && $cpf[10] == $digito2);
    }

    protected function isValidCNPJ($cnpj)
    {
        $cnpj = preg_replace('/\D/', '', $cnpj);

        if (strlen($cnpj) !== 14) {
            return false;
        }

        $soma = 0;
        $peso = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        for ($i = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $peso[$i + 1];
        }
        $resto = $soma % 11;
        $digito1 = $resto < 2 ? 0 : 11 - $resto;

        $soma = 0;
        for ($i = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $peso[$i];
        }
        $resto = $soma % 11;
        $digito2 = $resto < 2 ? 0 : 11 - $resto;

        return ($cnpj[12] == $digito1 && $cnpj[13] == $digito2);
    }
}
