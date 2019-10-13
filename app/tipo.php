<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo extends Model
{
    protected $table = 'tipo';
    
    protected $fillable = ['nombre'];
    
    public function proyecto(){
        return $this->hasMany(proyecto::class, 'tipo_id');
    }
}
