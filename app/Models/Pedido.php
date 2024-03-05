<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = "pedido";

    protected $fillable = [
        'sabor_id',
        'quantidade',
        'filial_id',
        'retirada_id',
        'pagamento_id',
        'observacao',
    ];

    protected $casts = [
        'sabor_id'=> "integer",
        'quantidade'=> "integer",
        'filial_id'=> "integer",
        'retirada_id'=> "integer",
        'pagamento_id'=> "integer",
    ];

    public function sabor_escolhido(){
        return $this->belongsTo(Sabor::class,
            'sabor_id','id');
    }

    public function filial_escolhida(){
        return $this->belongsTo(Filial::class,
            'filial_id','id');
    }

    public function forma_retirada(){
        return $this->belongsTo(Retirada::class,
            'retirada_id','id');
    }

    public function forma_pagamento(){
        return $this->belongsTo(Pagamento::class,
            'pagamento_id','id');
    }
}
