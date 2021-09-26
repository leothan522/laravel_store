<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $table = "estados";
    protected $fillable = ['nombre_estado'];

    public function municipios()
    {
        return $this->hasMany(Municipio::class, 'estados_id', 'id');
    }

    public function parroquias()
    {
        return $this->hasMany(Parroquia::class, 'estados_id', 'id');
    }

    public function stores()
    {
        return $this->hasMany(Store::class, 'estados_id', 'id');
    }
}
