<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Travel;
use App\Models\Places;
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
                return view('/dashboard', ['travels' => $travels, 'search' => $search]);
            } else {
                $travels = Travel::where('user_id', auth()->user()->id)->get();
            }
        } else {
            // Usuário não autenticado, defina $travels como uma coleção vazia
            $travels = collect();
        }
        
        return view('/home', ['travels' => $travels, 'search' => $search]);
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
        $travel->budget = $request->budget;
        $travel->places = [];

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

        return redirect('/dashboard')->with('msg','Viagem criada com sucesso!');
    }

    public function show($id) {
        $travel = Travel::findOrFail($id);
        $placesData = Places::where('travels_id', $id)->get();

        $places = $placesData->map(function ($item) {
            return $item->places;
        });
    
        return view('events.show', compact('travel', 'places'));
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
        Travel::findOrFail($request->id)->update($request->all());
        return redirect('/dashboard')->with('msg', 'Viagem editada com sucesso!');
    }

    public function updateShow(Request $request){
        $id = $request->id;
        Travel::findOrFail($id)->update($request->all());
        return redirect("/events/{$id}")->with('msg', 'Viagem editada com sucesso!');
    }

    public function createPlace(Request $request, $id){
        $place = new Places;
        $place->places = $request->places;

        $placesID = Travel::findOrFail($id);
        $place->travels_id = $placesID->id;

        $place->save();

        return redirect("/events/roadmap/{$id}")->with('msg', 'Lugar adicionado ao roteiro com sucesso!');

    }


    //roadmap com os lugares em que a pessoa salvou da api
    public function roadmap($id){
        $travel = Travel::findOrFail($id);
        $placesData = Places::where('travels_id', $id)->get();
        $placess = Places::where('travels_id', $id)->get();
        $places = $placesData->map(function ($item) {
            return $item->places;
        });
    
        return view('events.roadmap', compact('travel', 'places', 'placess'));
    }

    //delete próprio para apenas os locais salvos pela api
    public function destroyPlace($id){
        $places = Places::findOrFail($id);
        $places->delete();
        return redirect()->back()->with('msg', 'Local excluído do roteiro com sucesso!');
    }
    
    // public function complete() {
    //   $googlePlaces = new PlacesApi('AIzaSyBTxF53J3Ji_U1YDmtNtSZwr1eu0_wN69I'); # line 1
    //   $response = $googlePlaces->placeAutocomplete('cubatão'); # line 2
    // }



    

}
