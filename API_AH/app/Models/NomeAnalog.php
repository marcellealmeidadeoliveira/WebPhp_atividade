<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NomeAnalog extends Model
{
    protected $fillable = [
        'nome',
        'nomeCriador',
        'idioma',
        'tipo',
       'sinopsia'
    ];
}
