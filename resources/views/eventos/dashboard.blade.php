
@extends('layout.main')

@section('titulo', 'Loft eventos')
   
   
   
@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus eventos</h1>

</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
    <table class="table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Paarticipantes</th>
            <th scope="col">Ações</th>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td scropt="row">{{$loop->index + 1}}</td>
                <td><a href="/eventos/{{$event->id}}">{{$event->titulo}}</a></td>
                <td>o</td>
                <td><a href="#">editar</a> <a href="#">deletar</a></td>
            </tr>

            @endforeach
        </tbody>

    </table>
    @else
    <p>Vocênão tem eventos, <a href="/eventos/criar"></a>Criar eventos </p>
    @endif

</div>


@endsection