    @extends('layout.main')

    @section('titulo', 'Loft eventos')
       
       
       
    @section('content')

        <div id="search-container" class="col-md-12">
            <h1>Busque um Evento</h1>
            <form action="">
                <input type="text" id="search" name="search" class="form-control" placeholder="procure....">
            </form>
        </div>
        <div id="events-container" class="col-md-12">
            <h2>Proximos eventos</h2>
            <p>Veja os eventos dos próximos dias</p>
            <div id="cards-container" class="row">
                @foreach($events as $event)
                <div class="card col-md-3">
                    <img src="img/events/{{$event->image}}" alt="{{$event->titulo}}">
                    <div class="card-body">
                        <div class="card-date">{{date('d/m/y', strtotime($event->data))}}</div>
                        <h5 class="card-title">{{$event->titulo}}</h5>
                        <p class="card-participants">x participantes</p>
                        <a href="/eventos/{{$event->id}}" class="btn btn-primary">saber mais</a>

                    </div>
                </div>
                    

                @endforeach
                @if(count($events) ==0)
                    <p>Não há eventos disponiveis</p>
                @endif
            </div>
        </div>

    @endsection
       

        
    <script src="/js/script.js"></script>
 
