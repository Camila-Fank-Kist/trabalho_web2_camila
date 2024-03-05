@extends('base.app')

@section('titulo', 'Listagem de Pedidos')

@section('content')

<!--<div class="mx-auto divide-y md:max-w-4xl">-->
<div class="grid grid-cols 4 gap-4">
<div
  class="block rounded-lg bg-red-900 p-6 mb-4 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
  <h5
    class="pt-4 text-2xl font-medium leading-tight text-white">
    Pedidos
  </h5>
  <p class="pt-2 pb-2 mb-2 text-base text-white">
  Pedidos dos nossos clientes!
  </p>
</div>
<!--<h3 class="pt-4 text-2xl font-medium text-red-700">Listagem de Pedidos</h3>-->
    <div
        class="block w-full flex space-x-3 rounded-lg bg-white pl-3 pr-7 dark:bg-neutral-700">

        <form action="{{ route('pedido.search') }}" method="post">
            @csrf <!-- cria um hash de segurança -->
            <div class="grid grid-cols-4 gap-6 flex space-x-4">
                <div class="relative mb-1">
                    <select name="tipo"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-red-700 border-opacity-30 text-gray-600
                focus:ring-0 focus:border-red-700">
                        <!--<option value="sabor_id">Sabor</option>-->
                        <option value="quantidade">Quantidade</option>
                        <!--<option value="filial_id">Filial</option>-->
                        <!--<option value="retirada_id">Forma retirada</option>-->
                        <!--<option value="pagamento_id">Forma pagamento</option>-->
                        <option value="observacao">Observação</option>
                    </select>
                </div>
                <div class="relative mb-1">
                    <input
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-red-700 border-opacity-40 text-gray-600
                focus:ring-0 focus:border-red-700"
                        type="text" name="valor" placeholder="Pesquisar...">
                </div>

                <button type="submit"
                    class="w-full bg-red-700 bg-opacity-20 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                    Buscar
                </button>
                
                <a class="w-full bg-red-700 bg-opacity-20 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"
                    href="{{ route('pedido.create') }}">Cadastrar</a>
            </div>


        </form>
    </div>

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b border-red-700 font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-red-700">Id</th>
                                <th scope="col" class="px-6 py-4 text-red-700">Sabor</th>
                                <th scope="col" class="px-6 py-4 text-red-700">Quantidade</th>
                                <th scope="col" class="px-6 py-4 text-red-700">Filial</th>
                                <th scope="col" class="px-6 py-4 text-red-700">Forma Retirada</th>
                                <th scope="col" class="px-6 py-4 text-red-700">Forma Pagamento</th>
                                <th scope="col" class="px-6 py-4 text-red-700">Observação</th>
                                <th scope="col" class="px-6 py-4 text-red-700">Ações</th>
                                <th scope="col" class="px-6 py-4 text-red-700">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $item)
                                <tr
                                    class="border-b border-red-700 transition duration-300 ease-in-out hover:bg-red-100">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium border-red-700 text-red-700">{{ $item->id }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->sabor_escolhido->nome ?? '' }}</td><!--do Model-->
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->quantidade }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->filial_escolhida->cidade ?? '' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->forma_retirada->nome ?? '' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->forma_pagamento->nome ?? '' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->observacao }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-red-700 hover:scale-110 font-semibold hover:opacity-80"><a
                                            href="{{ route('pedido.edit', $item->id) }}">Editar</a></td>
                                    <td class="whitespace-nowrap px-6 py-4 text-red-700 hover:scale-110 font-semibold hover:opacity-80"><a
                                            href="{{ route('pedido.destroy', $item->id) }}"
                                            onclick="return confirm('Deseja Excluir?')">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        </div>
<!--</div>-->
<br><br>
@endsection
