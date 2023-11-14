<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleApiController extends Controller
{
    $response = GooglePlaces::placeAutocomplete('some city');
}
