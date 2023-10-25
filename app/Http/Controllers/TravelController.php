<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Travel;
use Illuminate\Support\Facades\Auth;



class TravelController extends Controller
{
    public function index(){

        // $travels = Travel::where('user_id', Auth::user()->id)->get();

        $search = request('search');

        if ($search) {
            $travels = Travel::where('user_id',[
                ['title', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $travels = Travel::where('user_id', Auth::user()->id)->get();
        }

        // $travels = Travel::all();

        return view('welcome', ['travels' => $travels, 'search' => $search]);
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
        $travel->startDate = $request->startDate;
        $travel->endDate = $request->endDate;

        //Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->image->move(public_path('img/travels'), $imageName);
            $travel->image = $imageName;
        }

        $user = auth()->user();
        $travel->user_id = $user->id;

        $travel->save();

        return redirect('/')->with('msg','Viagem criada com sucesso!');
    }

    public function show($id){
        $travel = Travel::findOrFail($id);
        return view('events.show', ['travel' => $travel]);
    }
    
}
