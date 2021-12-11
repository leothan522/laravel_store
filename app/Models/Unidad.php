<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;

    protected $table = 'unidades';

    protected $fillable = [
        'codigo_unidad',
        'descripcion_unidad'
    ];

    public function articulos()
    {
        return $this->belongsTo(Articulo::class, 'id', 'unidades_id');
    }

}
