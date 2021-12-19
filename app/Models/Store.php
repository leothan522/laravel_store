<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table = "stores";
    protected $fillable = [
        'nombre_tienda',
        'rif_tienda',
        'telefonos_tienda',
        'email_tienda',
        'direccion_tienda',
        'file_path',
        't_logo',
        't_imagen',
        'logo_tienda',
        'imagen_tienda',
        'municipios_id',
        'estados_id',
    ];

    public function estados()
    {
        return $this->belongsTo(Estado::class, 'estados_id', 'id');
    }

    public function municipios()
    {
        return $this->belongsTo(Municipio::class, 'municipios_id', 'id');
    }

    public function multi()
    {
        $this->hasMany(Multi::class, 'stores_id', 'id');
    }


}
