<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'recnum';

    public $incrementing = true;

    protected $fillable = [
        'codigo',
        'empresa',
        'sigla',
        'razao_social'
    ];
}
