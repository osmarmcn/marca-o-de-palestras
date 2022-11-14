@extends('layout.main')

@section('titulo', 'Editar:' . $event->titulo)

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando:{{$event->titulo}}</h1>
    <form action="/eventos/update/{{$event->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="img">Imagem do evento:</label>
            <input type="file" id="iamge" name="image" class="form-control-file">
            <img src="/img/events/{{$event->image}}" alt="" class="img-preview">
        </div>
        <div class="form-group">
            <label for="titulo">Evento:</label>
            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Nome do evento" value="{{$event->titulo}}">
        </div>
        <div class="form-group">
            <label for="data">Data do evento:</label>
            <input type="date" class="form-control" name="data" id="data" value="{{$event->data->format('Y-m-d')}}">
        </div>
        <div class="form-group">
            <label for="relatorio">Descrição:</label>
           <textarea name="relatorio" id="relatorio" class="form-control" placeholder="O que vai acontecer no evento" >{{$event->relatorio}}</textarea>
        </div>
        <div class="form-group">
            <label for="cidade">Cidade:</label>
            <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Local do evento" value="{{$event->cidade}}">
        </div>
        <div class="form-group">
            <label for="privado">O evento é Privado?</label>
           <select name="privado" id="privado" class="form-control">
            <option value="0">não</option>
            <option value="1"{{$event->privado == 1 ? "selected='selected'" : ""}}>sim</option>
           </select>
        </div>

        <div class="form-group">
            <label for="cidade">Adicione itens de infraestrutura:</label>
          <div class="form-group">
            <input type="checkbox" name="itens[]" value="cadeiras">Cadeiras
          </div>
          <div class="form-group">
            <input type="checkbox" name="itens[]" value="palco">Palco
          </div>
          <div class="form-group">
            <input type="checkbox" name="itens[]" value="open food"> Open food
          </div>
          <div class="form-group">
            <input type="checkbox" name="itens[]" value="open bar">Open bar
          </div>
        </div>
        
        <div class="mb-3">
            <button type="submit"  class="btn btn-primary" >Editar evento</button>
        </div>
        
            
        
        

    </form>
</div>

@endsection