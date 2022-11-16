<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;


class EventController extends Controller
{
    //
    public function index(){
        $events = Event:: all();
       
       return view('welcome',['events'=>$events]);
        
    }

    public function criar(){
        return view('eventos.criar');
    }

    public function logar(){
        return view('eventos.logar');

    }

    public function cadastrar(){
        return view('eventos.cadastrar');
    }

    public function store(Request $request){
        $event = new Event;
        $event->titulo = $request->titulo;
        $event->data = $request->data;
        $event->relatorio = $request->relatorio;
        $event->cidade = $request->cidade;
        $event->privado = $request->privado;
        $event->itens = $request->itens;

        //image upload

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")).".".$extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;

        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');

    }

    public function show($id){
        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('eventos.show',['event'=>$event, 'eventOwner'=>$eventOwner]);
    }

    public function dashboard(){
        $user = auth()->user();

        $events = $user->events;

        return view('eventos.dashboard', ['events' => $events]);
    }

    public function destroy($id){
        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento excluido com sucesso!');
    }

    public function edit($id){

        $event = Event::findOrFail($id);
        return view('eventos.edit', ['event'=>$event]);
    }

    public function update(Request $request){
        $data = $request->all();
        
        
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")).".".$extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $data['image']= $imageName;

        }



        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    public function joinEvent($id){
        $user = auth()->user();

        $user->eventsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'sua presença está confirmada no evento '.$event->titulo);

    }


}

