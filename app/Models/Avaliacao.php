<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = "avaliacao";

    protected $fillable = [
        'sabor_id',
        'filial_id',
        'nota_id',
        'descricao',
    ];

    protected $casts = [
        'sabor_id'=> "integer",
        'filial_id'=> "integer",
        'nota_id'=> "integer",
    ];

    public function sabor_escolhido(){
        return $this->belongsTo(Sabor::class,
            'sabor_id','id');
    }

    public function filial_escolhida(){
        return $this->belongsTo(Filial::class,
            'filial_id','id');
    }

    public function nota(){
        return $this->belongsTo(Nota::class,
            'nota_id','id');
    }
}
