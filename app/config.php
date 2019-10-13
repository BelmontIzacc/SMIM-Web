<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class config extends Model
{
   	protected $table = 'configuracion';

    protected $fillable = [
        'duracionVideo',
        'numImagenes',
        'numCoordendaas',
    ];
}
