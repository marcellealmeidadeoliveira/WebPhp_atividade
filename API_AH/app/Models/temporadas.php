<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class temporadas extends Model
{
    protected $fillable = [
        'nome2',
        'episodios',
        'quantasT',
        'duracao',
       'anoLancamento',
    ];
}
