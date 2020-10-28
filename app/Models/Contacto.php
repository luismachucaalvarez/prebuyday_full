<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_completo','telefono','email','nombre_fantasia_comercio','iniciacion_realizada', 'fecha_alta'];

    public function categorias(){
        return $this->belongsToMany(Categoria::class, 'categorias_contacto');
    }

    public function comercios(){
        return$this->hasMany('App\Models\Comercio');
    }
}
