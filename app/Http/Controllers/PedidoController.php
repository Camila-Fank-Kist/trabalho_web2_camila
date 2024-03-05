<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Sabor;
use App\Models\Filial;
use App\Models\Retirada;
use App\Models\Pagamento;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Carrega a listagem de dados
     */
    public function index()
    {
        $pedidos = Pedido::all();

        return view('pedido.list')->with(['pedidos'=> $pedidos]);
    } 

    /**
     * Carrega o formulário
     */
    public function create()
    {
        $sabores = Sabor::orderBy('nome')->get();
        $filiais = Filial::orderBy('cidade')->get();
        $formas_retirada = Retirada::orderBy('nome')->get();
        $formas_pagamento = Pagamento::orderBy('nome')->get();

        return view('pedido.form')->with(['sabores'=> $sabores, 'filiais'=> $filiais, 'formas_retirada'=> $formas_retirada, 'formas_pagamento'=> $formas_pagamento]);
    }

    /**
     * Salva os dados do formulário
     */
    public function store(Request $request)
    {
        $request->validate([
            'sabor_id'=>'required',
            'quantidade'=>'required|max:3',
            'filial_id'=>'required'
        ],[
            'sabor_id.required'=>"O :attribute é obrigatorio!",
            'quantidade.required'=>"A :attribute é obrigatória!",
            'quantidade.max'=>" Só são permitidos 3 caracteres na :attribute !",
            'filial_id.required'=>"A :attribute é obrigatória!",
        ]);

        $dados = ['sabor_id'=> $request->sabor_id,
        'quantidade'=> $request->quantidade,
        'filial_id'=> $request->filial_id,
        'retirada_id'=> $request->retirada_id,
        'pagamento_id'=>$request->pagamento_id,
        'observacao'=>$request->observacao,
        ];

        Pedido::create($dados);

        return redirect('pedido')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Carrega apenas 1 registro da tabela
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Carrega o formulário para edição
     */
    public function edit($id)
    {
        $pedido = Pedido::find($id);

        $sabores = Sabor::orderBy('nome')->get();
        $filiais = Filial::orderBy('cidade')->get();
        $formas_retirada = Retirada::orderBy('nome')->get();
        $formas_pagamento = Pagamento::orderBy('nome')->get();

        return view('pedido.form')->with([
            'pedido'=> $pedido,
            'sabores'=> $sabores, 
            'filiais'=> $filiais, 
            'formas_retirada'=> $formas_retirada, 
            'formas_pagamento'=> $formas_pagamento]);
    }

    /**
     * Atualiza os dados do formulário
     */
    public function update(Request $request, Pedido $pedido)
    {
        $request->validate([
            'sabor_id'=>'required',
            'quantidade'=>'required|max:3',
            'filial_id'=>'required'
        ],[
            'sabor_id.required'=>"O :attribute é obrigatorio!",
            'quantidade.required'=>"A :attribute é obrigatoria!",
            'quantidade.max'=>" Só são permitidos 3 caracteres na :attribute !",
            'filial_id.required'=>"A :attribute é obrigatoria!",
        ]);

        $dados = ['sabor_id'=> $request->sabor_id,
        'quantidade'=> $request->quantidade,
        'filial_id'=> $request->filial_id,
        'retirada_id'=> $request->retirada_id,
        'pagamento_id'=>$request->pagamento_id,
        'observacao'=>$request->observacao,
        ];

        Pedido::updateOrCreate(['id'=>$request->id],$dados);

        return redirect('pedido')->with('success', "Pedido atualizado com sucesso!");

    }

    /**
     * Remove o registro do banco de dados
     */
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);

        $pedido->delete();

        return redirect('pedido')->with('success', "Pedido removido com sucesso!");
    }

    /**
     * pesquisa e filtra o registro do banco de dados
     */
    public function search(Request $request)
    {
        if(!empty($request->valor)){
            $pedidos = Pedido::where($request->tipo,'like',"%".$request->valor."%")->get(); 
        } else {
            $pedidos = Pedido::all();
        }

        return view('pedido.list')->with(['pedidos'=> $pedidos]);
    }
}
