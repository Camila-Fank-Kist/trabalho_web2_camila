<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="app.css" rel="stylesheet">
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>-->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <title>@yield('titulo') - SisACAD</title>
</head>

<body>
    @include('base.header') <!--inclui o conteúdo do arquivo 'base.header'-->
    <div class="md:container md:mx-auto px-8">
        @yield('content') <!--diretiva blade que define uma seção chamada 'content'. 
        O objetivo principal dessa diretiva é permitir que o conteúdo específico da página seja inserido dinamicamente neste local.-->
        <!--em uma página específica que usa este layout, você pode definir um bloco de conteúdo com o mesmo nome ('content') usando a diretiva @section('content') ... @endsection -->
    </div>
    @include('base.footer') <!--inclui o conteúdo do arquivo 'base.footer'-->
</body>
</html>
