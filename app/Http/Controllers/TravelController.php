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
}
