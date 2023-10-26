<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Travel;
use Illuminate\Support\Facades\Auth;



class TravelController extends Controller
{
    public function index()
    {
        $search = request('search');
    
        if (auth()->check()) { // Verifique se o usuário está autenticado
            if ($search) {
                $travels = Travel::where('user_id', auth()->user()->id)
                    ->where('title', 'like', '%' . $search . '%')
                    ->get();
            } else {
                $travels = Travel::where('user_id', auth()->user()->id)->get();
            }
        } else {
            // Usuário não autenticado, defina $travels como uma coleção vazia
            $travels = collect();
        }
    
        return view('welcome', ['travels' => $travels, 'search' => $search]);
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
