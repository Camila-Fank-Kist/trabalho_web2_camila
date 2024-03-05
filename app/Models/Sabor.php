<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sabor extends Model
{
    use HasFactory;

    protected $table = "sabor";

    protected $fillable = [
        'imagem',
        'nome',
        'ingredientes',
        'precoBRL',
    ];

    protected $casts = [
        'imagem'=>'string',
        'nome'=>'string',
        'ingredientes'=>'string',
        'precoBRL'=> "integer",
    ];

    
}
