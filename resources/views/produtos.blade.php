@extends('layout.main')

@section('titulo', 'Produtos')
   
   
   
@section('content')
    <p>exibindo produto id {{$id}}</p>
    @if($buscar != '')
        <p>o usuario está buscando por: {{$buscar}}</p>


    @endif

    @if($id != null)
    <p>exibindo produto id:{{$id}}</p>
    @endif

@endsection