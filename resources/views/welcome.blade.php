<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/style.css">

        <title>Laravel</title>

       
    </head>
    <body>
       <h1>titulo</h1>
       @if(10 > 25)
            <p>está certo</p>
        @endif

        <p>{{$nome}}</p>

        @if($nome == "osmar")
            <p>o nome é osmar</p>
        @else
            <p>o nome não é osmar</p>
        @endif

        @for($i = 0; $i < count($arr);$i++ )
            <p>{{$arr[$i]}} - indice {{$i}}</p>

        @endfor

        @foreach($nomes as $nome)
            <p>{{$nome}} - indice {{$loop->index}}</p>

        @endforeach


        
    <script src="/js/script.js"></script>
    </body>
</html>
