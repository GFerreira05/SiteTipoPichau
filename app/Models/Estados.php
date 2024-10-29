<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    use HasFactory;
    protected $table = "estados";

    // Modelo Estados.php
    public function pais() 
    {
        return $this->belongsTo(Paises::class, 'paises_id');
    }

}
