<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Travel;



class TravelController extends Controller
{
    public function index(){


        $travels = Travel::all();

        return view('welcome', ['travels' => $travels]);
        // return view('welcome', ['']);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
        $travel = new Travel;
        $travel->title = $request->title;
        $travel->city = $request->city;
        $travel->description = $request->description;

        $travel->save();

        return redirect('/')->with('msg','Viagem criada com sucesso!');
    }

    
}
