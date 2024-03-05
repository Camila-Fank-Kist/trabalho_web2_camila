@extends('base.app')

@section('titulo', 'Formulário de Pedido')

@section('content')
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @php
        // dd($pedido); // é igual ao var_dump()
        if (!empty($pedido->id)) {
            $route = route('pedido.update', $pedido->id);
        } else {
            $route = route('pedido.store');
        }
    @endphp
    <div class="mx-auto divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium text-red-700">Formulário de Pedido</h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4 shadow-red-700">
                @csrf <!-- cria um hash de segurança -->

                @if (!empty($pedido->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($pedido->id)) {{ $pedido->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">
                
                <label class="block">
                    <span class="text-red-700 font-semibold">Sabor</span>
                    <select name="sabor_id"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-red-700 border-opacity-30 text-gray-600
                focus:ring-0 focus:border-red-700">
                        @foreach ($sabores as $item)
                            <option value="{{ $item->id }}" @if(!empty($pedido->id)){{ ( $item->id == $pedido->sabor_id) ? 'selected' : '' }} @else{{ '' }}@endif>{{ $item->nome }}</option> 
                        @endforeach
                    </select>
                </label><br>
                {{-- dd($pedido) --}}
                <label class="block">
                    <span class="text-red-700 font-semibold">Quantidade</span>
                    <input type="number" name="quantidade"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-red-700 border-opacity-40 text-gray-600
                focus:ring-0 focus:border-red-700"
                    value="@if(!empty($pedido->quantidade)){{$pedido->quantidade}}@elseif(!empty(old('quantidade'))){{old('quantidade')}}@else{{''}}@endif">
                </label><br>

                <label class="block">
                    <span class="text-red-700 font-semibold">Filial</span>
                    <select name="filial_id"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-red-700 border-opacity-30 text-gray-600
                focus:ring-0 focus:border-red-700">
                        @foreach ($filiais as $item)
                            <option value="{{ $item->id }}" @if(!empty($pedido->id)){{ ( $item->id == $pedido->filial_id) ? 'selected' : '' }}@else{{ '' }}@endif> {{ $item->cidade }} </option>
                        @endforeach
                    </select>
                </label><br>

                <label class="block">
                    <span class="text-red-700 font-semibold">Forma de retirada</span>
                    <select name="retirada_id"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-red-700 border-opacity-30 text-gray-600
                focus:ring-0 focus:border-red-700">
                        @foreach ($formas_retirada as $item)
                            <option value="{{ $item->id }}" @if(!empty($pedido->id)){{ ( $item->id == $pedido->retirada_id) ? 'selected' : '' }}@else{{ '' }}@endif>{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </label><br>

                <label class="block">
                    <span class="text-red-700 font-semibold">Forma de pagamento</span>
                    <select name="pagamento_id"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-red-700 border-opacity-30 text-gray-600
                focus:ring-0 focus:border-red-700">
                        @foreach ($formas_pagamento as $item)
                            <option value="{{ $item->id }}" @if(!empty($pedido->id)){{ ( $item->id == $pedido->pagamento_id) ? 'selected' : '' }}@else{{ '' }}@endif>{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </label><br>

                
                <label class="block">
                    <span class="text-red-700 font-semibold">Observação</span>
                    <input type="text" name="observacao"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-red-700 border-opacity-40 text-gray-600
                focus:ring-0 focus:border-red-700"
                        value="@if (!empty($pedido->observacao)) {{ $pedido->observacao }} @elseif(!empty(old('observacao'))) {{ old('observacao') }} @else {{ '' }} @endif">
                </label>

                <br>
                <br>
                <button
                    class="bg-red-700 bg-opacity-20 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 w-1/3"
                    type="submit">Salvar</button><br>
            </form>
            <button><a class="bg-red-700 bg-opacity-20 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 w-1/3"
                        href="{{ route('pedido.index') }}">Voltar</a></button>
        </div>
    </div>
    <br><br>
@endsection
