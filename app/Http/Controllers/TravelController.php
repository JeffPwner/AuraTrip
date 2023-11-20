<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Travel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


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
        
        return view('home', ['travels' => $travels, 'search' => $search]);
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

    public function show($id) {
        $travel = Travel::findOrFail($id);
        $places = $travel->places;
    
        return view('events.show', ['places' => $places, 'travel' => $travel]);
    }
    
    
    

    public function dashboard(){
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
    
        $travels = Travel::where('user_id', auth()->user()->id)->get();
        return view('dashboard', ['travels' => $travels, 'search' => $search]);
    }


    public function destroy($id){
        Travel::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Viagem excluída com sucesso!');
    }
    
    public function edit($id){
        $travel = Travel::findOrFail($id);
        return view('events.edit', ['travel' => $travel]);
    }

    public function update(Request $request){
        Travel::findOrFail($id)->delete();
        Travel::findOrFail($request->id)->update($request->all());
        return redirect('/dashboard')->with('msg', 'Viagem editada com sucesso!');
    }

    public function updateShow(Request $request){
        $id = $request->id;
        Travel::findOrFail($id)->update($request->all());
        return redirect("/events/{$id}")->with('msg', 'Viagem editada com sucesso!');
    }

    // public function complete() {
    //   $googlePlaces = new PlacesApi('AIzaSyBTxF53J3Ji_U1YDmtNtSZwr1eu0_wN69I'); # line 1
    //   $response = $googlePlaces->placeAutocomplete('cubatão'); # line 2
    // }



    

}
