<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\TravelController;

Route::get('/', [TravelController::class, 'index']);
Route::get('/events/create', [TravelController::class, 'create'])->middleware('auth');
Route::get('/events/{id}', [TravelController::class, 'show'])->middleware('auth');
Route::put('/events/{id}', [TravelController::class, 'updateShow'])->middleware('auth');
Route::get('/dashboard', [TravelController::class, 'dashboard'])->middleware('auth');
Route::post('/events', [TravelController::class, 'store']);
Route::delete('/events/{id}', [TravelController::class, 'destroy'])->middleware('auth');
Route::get('/events/edit/{id}', [TravelController::class, 'edit'])->middleware('auth');
Route::put('/events/update/{id}', [TravelController::class, 'update'])->middleware('auth');
Route::delete('/events/update/{id}', [TravelController::class, 'destroy'])->middleware('auth');

//test
Route::get('/', [TravelController::class, 'index']);


Route::get('/contact', function (){
    return view('contact');
});

// Route::get('/viagens', function (){
//     $busca = request('search');
//     return view('viagens', ['busca' => $busca]);
// });

// Route::get('/viagens_teste/{id?}', function ($id = null){
//     return view('viagem', ['id' => $id]);
// });