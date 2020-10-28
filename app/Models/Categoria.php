<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public function contactos(){
        return $this->belongsToMany(Contacto::class, 'categorias_contacto');
    }

    /*protected $casts = [
        'categoria_id' =>
    ];*/
}
