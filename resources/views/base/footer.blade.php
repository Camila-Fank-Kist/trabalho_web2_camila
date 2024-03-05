<!-- Footer container -->
<footer
  class="flex flex-col items-center bg-red-100 text-center dark:bg-red-600 lg:text-left">
  <div class="container p-6 w-1/2">
    <div class="grid place-items-center md:grid-cols-2 lg:grid-cols-3">
      <a href="{{ route('pedido.create') }}" class="text-sm font-semibold leading-6 text-red-800 hover:opacity-70 hover:scale-90">Faça seu pedido</a>
      <a href="https://www.whatsapp.com/" class="text-sm font-semibold leading-6 text-red-800 hover:opacity-70 hover:scale-90">Junte-se à equipe</a>
      <a href="{{ route('avaliacao.create') }}" class="text-sm font-semibold leading-6 text-red-800 hover:opacity-70 hover:scale-90">Avalie-nos</a>
    </div>
  </div>

  <div
    class="w-full bg-red-900 p-4 text-center text-red-50">
    © 2023 Copyright
  </div>
</footer>