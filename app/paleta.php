<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paleta extends Model
{
	protected $table = 'paletaColores';

    protected $fillable = [
        'tonalidadRangoMax',
        'tonalidadRangoMin',
        'tempRangoMax',
        'tempRangoMin',
        'NombrePaleta',
    ];
}
