<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comercio extends Model
{
    use HasFactory;

    protected $fillable = ['rut','razon_social','nombre_fantasia'];

    public function contactos(){
        return $this->hasOne('App\Models\Contacto');
    }

    public function cargos(){
        return $this->hasOne('App\Models\Cargo');
    }

}
