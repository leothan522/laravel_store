<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'codigo_categoria',
        'descripcion_categoria',
        'estatus'
    ];

    public function articulos()
    {
        return $this->belongsTo(Articulo::class, 'id', 'categorias_id');
    }

}
