<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    use HasFactory;

    protected $table = "filial";

    protected $fillable = ['cidade',
        'cep',
    ];

    protected $casts = [
        'cep'=> "integer",
    ];
}
