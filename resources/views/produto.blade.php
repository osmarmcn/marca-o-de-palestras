@extends('layout.main')

@section('titulo', 'produto')

@section('content')


@if($busca != '')
    <p>estou buscando sobre: {{$busca}}</p>
@endif