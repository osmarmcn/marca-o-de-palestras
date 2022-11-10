@extends('layout.main')

@section('titulo', $event->titulo)

@section('content')
   <div class="col-md-10 offset-md-1">
    <div class="row">
       <div id="image-container" class="col-md-6">
        <img src="/img/events/{{$event->image}}" class="img-fluid" alt="{{$event->titulo}}">

       </div>
       <div id="info-container" class="col-md-6">
        <h1>{{$event->titulo}}</h1>
        <p class="event-city"><ion-icon name="location-outline"></ion-icon>{{$event->cidade}}</p>
        <p class="events-participants"><ion-icon name="people-outline"></ion-icon>x Participantes</p>
        <p class="event-owner"><ion-icon name="star-outline"></ion-icon>{{$eventOwner['name']}}</p>
        <a href="#" class="btn btn-primary" id="event-submit">Confirmar presença</a>

        <h3>Evento conta com:</h3>
        <ul id="items-list">
         @foreach($event->itens as $item)
            <li><ion-icon name="play-outline"></ion-icon><span> {{$item}}</span></li>
         @endforeach
         
        </ul>
       
      </div>
       <div class="col-md-12" id="description-container">
        <h3>Sobre o evento:</h3>
        <p class="event-description">{{$event->description}}</p>

       </div>
    </div>
   </div> 

@endsection