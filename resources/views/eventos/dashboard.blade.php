
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
            <th scope="col">Participantes</th>
            <th scope="col">Ações</th>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td scropt="row">{{$loop->index + 1}}</td>
                <td><a href="/eventos/{{$event->id}}">{{$event->titulo}}</a></td>
                <td>{{count($event->users)}}</td>
                <td>
                    <a href="/eventos/edit/{{$event->id}}" class="btn btn-info edit-btn" ><ion-icon name="create-outline"></ion-icon> editar</a>
                    <form action="/eventos/{{$event->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"> </ion-icon>Deletar</button>
                   </form>
                </td>
            </tr>

            @endforeach
        </tbody>

    </table>
    @else
    <p>Você não tem eventos, <a href="/eventos/criar">Criar eventos</a> </p>
    @endif

</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos que estou participando</h1>

</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($eventsAsParticipant ) > 0 ):
    <table class="table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Participantes</th>
            <th scope="col">Ações</th>
        </thead>
        <tbody>
            @foreach($eventsAsParticipant as $event)
            <tr>
                <td scropt="row">{{$loop->index + 1}}</td>
                <td><a href="/eventos/{{$event->id}}">{{$event->titulo}}</a></td>
                <td>{{count($event->users)}}</td>
                <td>
                    <form action="/events/exit/{{$event->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon>Sair do evento
                        </button>

                    </form>
                   
                    
                </td>
            </tr>

            @endforeach
        </tbody>

    </table>

    @else
        <p>Você não está participando de nenhum evento, <a href="/">veja todos os eventos</a></p>
    @endif
    

</div>


@endsection