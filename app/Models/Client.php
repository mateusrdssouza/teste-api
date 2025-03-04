<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'Cliente';

    public $timestamps = false;

    protected $primaryKey = 'recnum';

    public $incrementing = true;

    protected $fillable = [
        'empresa',
        'codigo',
        'razao_social',
        'tipo',
        'cpf_cnpj'
    ];
}
