@extends('base.app')

@section('titulo', 'Formulário de Sabor')

@section('content')
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @php
        // dd($sabor); // é igual ao var_dump()
        if (!empty($sabor->id)) {
            $route = route('sabor.update', $sabor->id);
        } else {
            $route = route('sabor.store');
        }
    @endphp
    <div class="mx-auto divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium text-red-700">Formulário de Sabor</h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4 shadow-red-700">
                @csrf

                @if (!empty($sabor->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($sabor->id)) {{ $sabor->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">

                <label class="block">
                    <span class="text-red-700 font-semibold">Nome</span>
                    <input type="text" name="nome"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-red-700 border-opacity-40 text-gray-600
                focus:ring-0 focus:border-red-700"
                        value="@if (!empty($sabor->nome)) {{ $sabor->nome }} @elseif(!empty(old('nome'))) {{ old('nome') }} @else {{ '' }} @endif">
                </label><br>

                <label class="block">
                    <span class="text-red-700 font-semibold">Ingredientes</span>
                    <input type="text" name="ingredientes"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-red-700 border-opacity-40 text-gray-600
                focus:ring-0 focus:border-red-700"
                        value="@if (!empty($sabor->ingredientes)) {{ $sabor->ingredientes }} @elseif(!empty(old('ingredientes'))) {{ old('ingredientes') }} @else {{ '' }} @endif">
                </label><br>

                <label class="block">
                    <span class="text-red-700 font-semibold">Preço em R$</span>
                    <input type="text" name="precoBRL"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-red-700 border-opacity-40 text-gray-600
                focus:ring-0 focus:border-red-700"
                        value="@if (!empty($sabor->precoBRL)) {{ $sabor->precoBRL }} @elseif(!empty(old('precoBRL'))) {{ old('precoBRL') }} @else {{ '' }} @endif">
                </label><br><br>

                @php
                    $nome_imagem = !empty($sabor->imagem) ? $sabor->imagem : 'imagem/sem_imagem.jpg';
                @endphp
                <div>
                    <img class="h-40 w-40 object-cover" src="/storage/{{ $nome_imagem }}" width="300px"
                        alt="Imagem"> 
                    <br>
                    <input
                        class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-red-100 file:text-red-700
                                hover:file:bg-red-200"
                        type="file" name="imagem"><br>
                </div>

                <br><br>
                <button
                    class="bg-red-700 bg-opacity-20 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 w-1/3"
                    type="submit">Salvar</button><br>
            </form>
            <button><a class="bg-red-700 bg-opacity-20 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 w-1/3"
                        href="{{ route('sabor.index') }}">Voltar</a></button>
        </div>
    </div>
    <br><br>
@endsection
