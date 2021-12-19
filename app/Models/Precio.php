<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;

    protected $table = 'precios';

    protected $fillable = [
        'stores_id',
        'articulos_id',
        'tipo_precio',
        'moneda',
        'precio',
        'estatus'
    ];

    public function articulos()
    {
        return $this->belongsTo(Articulo::class, 'id', 'articulos_id');
    }

}
