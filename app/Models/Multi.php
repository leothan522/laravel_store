<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multi extends Model
{
    use HasFactory;
    protected $table = "multi_stores";
    protected $fillable = [
        'users_id',
        'stores_id'
    ];

    public function users()
    {
        $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function stores()
    {
        $this->belongsTo(Store::class, 'stores_id', 'id');
    }
}
