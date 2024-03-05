@extends('base.app')

@section('titulo', 'Index')

@section('content')

<div class="grid grid-cols 4 gap-4">
<div
  class="block rounded-lg bg-red-900 p-6 ">
  <h5
    class="pt-4 text-2xl font-medium leading-tight text-white">
    Rafa's pizza!
  </h5>
  <p class="pt-2 pb-2 mb-2 text-base text-white">
  Uma pizzaria com a essência da culinária caseira!
  </p>
</div> 

        
<div class="grid grid-cols-2 gap-2">
  <div>
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 inline-block min-w-full py-2 sm:px-6 lg:px-8" overflow-hidden>
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 inline-block min-w-full py-2 sm:px-6 lg:px-8" overflow-hidden>
                    <h3 class="pt-4 text-2xl font-medium text-red-700">Quem somos?</h3>
                    <div class="block w-full rounded-lg bg-white text-left">
                        <div class="p-6">
                            <p class="text-base text-neutral-600 dark:text-neutral-200">
                                Olá! Somos uma equipe apaixonada por culiária, e juntos formamos uma pizzaria que junta tudo o que há de melhor para criar pizzas saborosas.
                            </p>
                            <p class="text-base text-neutral-600 dark:text-neutral-200">
                            Nosso objetivo é proporcionar a melhor experiência aos nossos clientes, através de pizzas que agradam não somente o estômago, mas agradam a alma!
                            </p>
                        </div>
                    </div>
                    <h3 class="pt-4 text-2xl font-medium text-red-700">Como encomendar nossa pizzas?</h3>
                    <div class="block w-full rounded-lg bg-white text-left">
                        <div class="p-6">
                            <p class="text-base text-neutral-600 dark:text-neutral-200">
                                Para terem uma experiência incrível e saborosa, você pode ir até uma de nossas pizzarias ou encomendár suas pizzas por por meio desse site, <a href="{{ route('pedido.create') }}" class="font-semibold text-red-700 hover:opacity-70">neste</a> formulário.                            
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
  <!-- ... -->
  <div>
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <h3 class="pt-4 text-2xl font-medium text-red-700">Já foi a uma de nossas pizzarias?</h3>
                    <div class="block w-full rounded-lg bg-white text-left">
                        <div class="p-6">
                            <p class="text-base text-neutral-600 dark:text-neutral-200">
                                Temos várias filiais, confira onde elas se localizam!
                            </p>
                            <p class="text-base text-neutral-600 dark:text-neutral-200">
                                Estamos no Brasil todo!
                            </p>
                        </div>
                    </div>
                    <div class="block w-full rounded-lg bg-white text-left">
                        <div class="p-6 pb-0">
                        <img class="w-auto" src="{{asset('storage/imagem/pizzaria.png')}}" alt="logo">
                        </div>
                    </div>
                </div>
            </div>
    </div>
  </div>
</div>
<br><br>
@endsection
