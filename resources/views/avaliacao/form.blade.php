@extends('base.app')

@section('titulo', 'Formulário de Avaliação')

@section('content')
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @php
        // dd($avaliacao); // é igual ao var_dump()
        if (!empty($avaliacao->id)) {
            $route = route('avaliacao.update', $avaliacao->id);
        } else {
            $route = route('avaliacao.store');
        }
    @endphp
    <div class="mx-auto divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium text-red-700">Formulário de Avaliação</h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4 shadow-red-700">
                @csrf <!-- cria um hash de segurança -->

                @if (!empty($avaliacao->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($avaliacao->id)) {{ $avaliacao->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">

                    <label class="block">
                    <span class="text-red-700 font-semibold">Sabor</span>
                    <select name="sabor_id"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-red-700 border-opacity-30 text-gray-600
                focus:ring-0 focus:border-red-700"> <!--name: quando o formulário for enviado, o valor selecionado será enviado com esse nome para o controller -->
                        @foreach ($sabores as $item) <!--loop que percorre uma matriz de categorias vinda do controller, onde $categorias é uma variável que contém a lista de categorias a serem exibidas no elemento <select>. Para cada categoria na matriz, a variável $item será atribuída à categoria atual-->
                            <!--Para cada item, uma opção é gerada para o usuário-->
                            <option value="{{ $item->id }}" @if(!empty($avaliacao->id)){{ ( $item->id == $avaliacao->sabor_id) ? 'selected' : '' }}@else{{ '' }}@endif>{{ $item->nome }}</option> 
                            <!--value: define o valor que será enviado ao controller quando a opção for selecionada-->
                            <!--texto visível: entre as tags <option>, neste caso, o nome do item ($item->nome)-->
                        @endforeach
                    </select>
                </label><br>
                <!--@if(!empty($avaliacao->id)){{ ( $item->id == $avaliacao->sabor_id) ? 'selected' : '' }}@else{{ '' }}@endif
                    - Se o id da avaliação for diferente de vazio (se ele existe), ou seja, se está editando um registro já existente:
                        - Se o id do item que está sendo percorrido naquele momento no loop for igual ao sabor_id da $avaliacao:
                            - Coloque a palavra 'selected' dentro da tag option
                        - Se não:
                            - Faça nada
                        OU SEJA:
                        - O loop vai sendo percorrido ($item, que contem todos os itens, é percorrido), e para cada item, vai ser criadoa uma tag option
                        - Quando o item que tiver o mesmo id do sabor_id da $avaliacao estiver sendo percorrido, vai ser colocado, na tag option daquele item, a palavra 'selected', o que faz com que aquela tag option seja a selecionada
                -->


                <label class="block">
                    <span class="text-red-700 font-semibold">Filial</span>
                    <select name="filial_id"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-red-700 border-opacity-30 text-gray-600
                focus:ring-0 focus:border-red-700">
                        @foreach ($filiais as $item)
                            <option value="{{ $item->id }}" @if(!empty($avaliacao->id)){{ ( $item->id == $avaliacao->filial_id) ? 'selected' : '' }}@else{{ '' }}@endif >{{ $item->cidade }}</option>
                        @endforeach
                    </select>
                </label><br> <!--selected="@if(!empty($avaliacao->id)){{ $avaliacao->filial_id }}@else{{ '' }}@endif"-->

                <label class="block">
                    <span class="text-red-700 font-semibold">Nota</span>
                    <select name="nota_id"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-red-700 border-opacity-30 text-gray-600
                focus:ring-0 focus:border-red-700">
                        @foreach ($notas as $item)
                            <option value="{{ $item->id }}" @if(!empty($avaliacao->id)){{ ( $item->id == $avaliacao->nota_id) ? 'selected' : '' }}@else{{ '' }}@endif>{{ $item->nota }}</option>
                        @endforeach
                    </select>
                </label><br>

                
                <label class="block">
                    <span class="text-red-700 font-semibold">Descrição</span>
                    <input type="text" name="descricao"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-red-700 border-opacity-40 text-gray-600
                focus:ring-0 focus:border-red-700"
                        value="@if (!empty($avaliacao->descricao)) {{ $avaliacao->descricao }} @elseif(!empty(old('descricao'))) {{ old('descricao') }} @else {{ '' }} @endif">
                </label>
                <!--verifica se $aluno->nome não está vazio (!empty($aluno->nome)). 
                    Se não estiver vazio, o valor do campo será definido como $aluno->nome-->
                <!--verifica se old('nome') não está vazio (!empty(old('nome'))). 
                    old('nome') é usado para manter os valores que o usuário inseriu no caso de uma falha de validação.
                    Se não estiver vazio, o valor do campo será definido como old('nome'). 
                    Isso garante que os valores inseridos pelo usuário sejam preservados após uma falha de validação.-->
                <!--Se nenhum dos casos anteriores for verdadeiro, o valor do campo será definido como uma string vazia ('')-->

                <br>
                <br>
                <button
                    class="bg-red-700 bg-opacity-20 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 w-1/3"
                    type="submit">Salvar</button><br>
            </form>
            <button><a class="bg-red-700 bg-opacity-20 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 w-1/3"
                        href="{{ route('avaliacao.index') }}">Voltar</a></button>
        </div>
    </div>
    <br><br>
@endsection
