<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViagemController extends Controller
{
    public function index(){
        $nome = "Everson";
        $idade = 22;
    
        $arr = [1,2,3,4,5];
        $nomes = ["Everson", "Admyla", "Admilson", "Ericles", "Paloma"];
    
        return view('welcome', [
            
            'nome' => $nome, 
            'idade' => $idade,
            'arr' => $arr,
            'nomes' => $nomes
        ]);
    }

    public function create(){
        return view('events.create');
    }
}
