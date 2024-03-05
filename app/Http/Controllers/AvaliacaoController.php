<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Sabor;
use App\Models\Filial;
use App\Models\Nota;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    //Carrega a listagem de dados:
    public function index()
    {
        $avaliacoes = Avaliacao::all(); 

        return view('avaliacao.list')->with(['avaliacoes'=> $avaliacoes]);
    }

    //Carrega o formulário:
    public function create()
    {
        $sabores = Sabor::orderBy('nome')->get();
        $filiais = Filial::orderBy('cidade')->get();
        $notas = Nota::orderBy('nota')->get();

        return view('avaliacao.form')->with(['sabores'=> $sabores, 'filiais'=> $filiais, 'notas'=> $notas]);
    }//os outros dados/campos do formulário vão estar vazios -> vai ter que puxar só os dados das chaves estrangeiras, para que elas possam ser listadas no formulário para que a pessoa possa selecionar
    //só retorna o formulário: a view avaliacao.form e os dados que precisam ser carregados para a pessoa selecionar

    //Salva os dados do formulário
    public function store(Request $request)
    {
        //Validação dos campos do formulário:
        $request->validate([
            'sabor_id'=>'required',
            'nota_id'=>'required',
        ],[ //1°: define nome e  cpf como obriatórios e define o tamanho máximo deles
            'sabor_id.required'=>"O :attribute é obrigatorio!",
            'nota_id.required'=>"A :attribute é obrigatorio!",
        ]); //2°:

        //$dados: armazena os dados que seão inseridos na tabela avaliacao
        //$dados um ARRAY? sim
        $dados = ['sabor_id'=> $request->sabor_id,
        'filial_id'=> $request->filial_id,
        'nota_id'=> $request->nota_id,
        'descricao'=> $request->descricao,
        ];//$request: objeto que contém as informações do formulário

        //ou $request->all():
        Avaliacao::create($dados); //está usando o Model Avaliacao para criar um novo registro na tabela. Os dados preparados anteriormente são passados para este método

        return redirect('avaliacao')->with('success', "Avaliação cadastrada com sucesso!"); //Após a criação da avaliacao, o código redireciona para a rota 'avaliacao' e inclui uma mensagem de sucesso para exibir ao usuário
    }

    //Carrega apenas 1 registro da tabela
    public function show(Avaliacao $avaliacao)
    {
        //
    }

    //Carrega o formulário para edição
    public function edit($id) //filtrar pelo id e jogar no formulário
    {
        $avaliacao = Avaliacao::find($id); //select * from aluno where id = $id //o método find tá no extend Model //os dois pontos significa que é um método estático (não precisa instanciar um objeto, basta chamar o método)
        //vai retornar um objeto referente ao id passado na url -> $aluno possui todos os dados referentes a cada id
        /* Usando o Model Aluno para buscar um registro na tabela de alunos com base no ID fornecido.
           O método find($id) procura o aluno pelo ID passado como argumento. 
           O objeto $aluno agora contém os detalhes desse aluno específico. */

        $sabores = Sabor::orderBy('nome')->get(); //buscando todas as categorias de aluno na tabela de categorias. O método orderBy('nome') ordena as categorias por nome. O resultado é armazenado na variável $categorias.
        $filiais = Filial::orderBy('cidade')->get();
        $notas = Nota::orderBy('nota')->get();

        return view('avaliacao.form')->with([
            'avaliacao'=> $avaliacao, //associando a chave 'aluno' ao objeto $aluno que contém todos os detalhes do aluno que será editado. Isso permitirá que a view preencha os campos do formulário de edição com os valores corretos.
            'sabores' => $sabores,
            'filiais' => $filiais,
            'notas' => $notas]); //Associamos a chave 'categorias' ao array de categorias de aluno que foram obtidas da tabela. Isso permitirá que a view crie um menu suspenso ou qualquer outra interface necessária para a seleção da categoria do aluno.
            //a categoria_aluno salva no obj $aluno já foi retornada em $aluno, 'categorias' => $categorias é só para puxar todos os dados da tabela categoria para fazer o select
    }//Resumindo, o método edit busca os detalhes de um aluno específico pelo ID, obtém as categorias de aluno, e retorna a view de formulário (aluno.form) juntamente com os dados necessários para preencher o formulário de edição corretamente.

    /**
     * Atualiza os dados do formulário
     */
    public function update(Request $request, Avaliacao $avaliacao)
    {
        $request->validate([
            'sabor_id'=>'required',
            'nota_id'=>'required',
        ],[
            'sabor_id.required'=>"O :attribute é obrigatorio!",
            'nota_id.required'=>"A :attribute é obrigatorio!",
        ]);

        //Arrays associativos: estruturas onde cada elemento é identificado por uma chave única
        $dados = ['sabor_id'=> $request->sabor_id,
        'filial_id'=> $request->filial_id,
        'nota_id'=> $request->nota_id,
        'descricao'=> $request->descricao,
        ];//array $dados: contém os valores dos campos do formulário

        //updateOrCreate: é um método do Model Aluno que permite atualizar um registro existente na tabela ou criar um novo registro se ele não existir.
        Avaliacao::updateOrCreate( //o método updateOrCreate aceita 2 argumentos:
            ['id'=>$request->id], //array associativo que especifica as condições para a atualização ou criação. Está usando a condição 'id'=>$request->id, o que significa que estamá procurando na tabela de alunos um registro com o ID fornecido no objeto $request. Se um registro com esse ID for encontrado, ele será atualizado. Caso contrário, um novo registro será criado.
            $dados); //array que contém os novos valores dos campos do aluno que serão atualizados ou inseridos na tabela.
        //Verifica se há um registro com o ID fornecido no objeto $request na tabela de alunos.
        //Se esse registro for encontrado, atualiza os campos do aluno com os valores contidos no array $dados.
        //Se o registro com o ID não for encontrado, cria um novo registro na tabela com os valores contidos no array $dados.
        
        return redirect('avaliacao')->with('success', "Avaliação atualizada com sucesso!"); //Está redirecionando o usuário de volta à página de listagem de alunos ('aluno') com uma mensagem de sucesso para indicar que a atualização foi feita com sucesso.

    }

    /**
     * Remove o registro do banco de dados
     */
    public function destroy($id)
    {
        $avaliacao = Avaliacao::findOrFail($id);

        $avaliacao->delete();

        return redirect('avaliacao')->with('success', "Avaliação removida com sucesso!");
    }

    /**
     * pesquisa e filtra o registro do banco de dados
     */
    public function search(Request $request)
    {
        if(!empty($request->valor)){
            $avaliacoes = Avaliacao::where(
                $request->tipo,
                 'like' ,
                "%". $request->valor."%"
                )->get(); //primeiro parâmetro: $request->tipo; segundo parâmetro: $request->valor; a % é para pesquisar em qualquer lugar da escrita
        } else {
            $avaliacoes = Avaliacao::all();
        }

        return view('avaliacao.list')->with(['avaliacoes'=> $avaliacoes]);
    }
}
