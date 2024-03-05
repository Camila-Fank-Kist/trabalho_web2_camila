<?php

namespace App\Http\Controllers;

use App\Models\Sabor;
use Illuminate\Http\Request;

class SaborController extends Controller
{
    //Carrega a listagem de dados
    public function index()
    {
        $sabores = Sabor::all();

        return view('sabor.list')->with(['sabores'=> $sabores]);
    }

    //Carrega o formulário
    public function create()
    {
        return view('sabor.form');
    }

    //Salva os dados do formulário
    public function store(Request $request)
    {
        $request->validate([
            'nome'=>'required|max:50',
            'ingredientes'=>'required|max:150',
            'precoBRL'=>'required|max:3',
        ],[
            'nome.required'=>"O :attribute é obrigatório!",
            'nome.max'=>" Só são permitidos 50 caracteres no :attribute !",
            'ingredientes.required'=>"Os :attribute são obrigatórios!",
            'ingredientes.max'=>" Só são permitidos 150 caracteres nos :attribute !",
            'precoBRL.required'=>"O :attribute é obrigatório!",
            'precoBRL.max'=>" Só são permitidos 3 caracteres no :attribute !",
        ]);

        $dados = ['nome'=> $request->nome,
        'ingredientes'=> $request->ingredientes,
        'precoBRL'=> $request->precoBRL,
        ];

        $imagem = $request->file('imagem');
        if($imagem){
            $nome_arquivo = date('YmdHis').'.'.$imagem->getClientOriginalExtension();
            $diretorio = "imagem/sabor/";
            $imagem->storeAs($diretorio,$nome_arquivo,'public');
            $dados['imagem'] = $diretorio.$nome_arquivo;
        }

        Sabor::create($dados);

        return redirect('sabor')->with('success', "Sabor cadastrado com sucesso!");
    }

    //Carrega apenas 1 registro da tabela
    public function show(Sabor $sabor)
    {
        //
    }

    //Carrega o formulário para edição
    public function edit($id)
    {
        $sabor = Sabor::find($id);

        return view('sabor.form')->with(['sabor'=> $sabor]);
    }

    //Atualiza os dados do formulário
    public function update(Request $request, Sabor $sabor)
    {
        $request->validate([
            'nome'=>'required|max:50',
            'ingredientes'=>'required|max:150',
            'precoBRL'=>'required|max:3',
        ],[
            'nome.required'=>"O :attribute é obrigatório!",
            'nome.max'=>" Só são permitidos 50 caracteres no :attribute !",
            'ingredientes.required'=>"Os :attribute são obrigatórios!",
            'ingredientes.max'=>" Só são permitidos 150 caracteres nos :attribute !",
            'precoBRL.required'=>"O :attribute é obrigatório!",
            'precoBRL.max'=>" Só são permitidos 3 caracteres no :attribute !",
        ]);

        $dados = ['nome'=> $request->nome,
        'ingredientes'=> $request->ingredientes,
        'precoBRL'=> $request->precoBRL,
        ];

        $imagem = $request->file('imagem');
        if($imagem){
            $nome_arquivo = date('YmdHis').'.'.$imagem->getClientOriginalExtension();
            $diretorio = "imagem/sabor/";
            $imagem->storeAs($diretorio,$nome_arquivo,'public');
            $dados['imagem'] = $diretorio.$nome_arquivo;
        }

        Sabor::updateOrCreate(['id'=>$request->id], $dados);

        return redirect('sabor')->with('success', "Sabor atualizado com sucesso!");

    }

    //Remove o registro do banco de dados
    public function destroy($id)
    {
        $sabor = Sabor::findOrFail($id);

        $sabor->delete();

        return redirect('sabor')->with('success', "Sabor removido com sucesso!");
    }

    //pesquisa e filtra o registro do banco de dados
    public function search(Request $request)
    {
        if(!empty($request->valor)){
            $sabores = Sabor::where($request->tipo,'like',"%".$request->valor."%")->get();
        } else {
            $sabores = Sabor::all();
        }
        return view('sabor.list')->with(['sabores'=> $sabores]);
    }
}
