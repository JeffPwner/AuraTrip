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
Route::post('/events', [TravelController::class, 'store']);

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
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
