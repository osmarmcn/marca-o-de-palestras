<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
        $event->relatorio = $request->relatorio;
        $event->cidade = $request->cidade;
        $event->privado = $request->privado;

        //image upload

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")).".".$extension;

            $requestImage->move(public_path('img/eventos'), $imageName);

            $event->image = $imageName;

        }

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');

    }
}

