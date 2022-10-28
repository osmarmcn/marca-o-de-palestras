<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index(){
        $nome = "jose";
        $arr = [10,20,30,40,50];
        $nomes = ["osmar","pedro", "jose", "maria"];
       
        return view('welcome', ['nome' =>$nome, 'arr'=>$arr, 'nomes'=>$nomes]);
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
}

