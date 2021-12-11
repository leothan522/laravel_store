<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulos';

    protected $fillable = [
        'codigo_articulo',
        'descripcion_articulo',
        'categorias_id',
        'unidades_id',
        'estatus'
    ];

    public function categorias()
    {
        return $this->hasOne(Categoria::class, 'id', 'categorias_id');
    }

    public function unidades()
    {
        return $this->hasOne(Unidad::class, 'id', 'unidades_id');
    }

    public function precios()
    {
        return $this->hasMany(Precio::class, 'id', 'articulos_id');
    }


}
