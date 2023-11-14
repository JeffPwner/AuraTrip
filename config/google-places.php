<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Google API Key
    |--------------------------------------------------------------------------
    |
    | Provide a Google Places API key in order to execute places queries.
    |
    */
    'api_key' => env('GOOGLE_PLACES_API_KEY', 'AIzaSyBTxF53J3Ji_U1YDmtNtSZwr1eu0_wN69I'),

    /*
    |--------------------------------------------------------------------------
    | Google Places Location Bias coordinates
    |--------------------------------------------------------------------------
    |
    | Provide a set of coordinates in order to bias results towards a particular
    | city or region.
    |
    */
    'location_bias' => env('GOOGLE_PLACES_LOCATION_BIAS_COORD', '37.7833,122.4167'),

    /*
    |--------------------------------------------------------------------------
    | Google Places Radius
    |--------------------------------------------------------------------------
    |
    | Radius in miles to surrounding the location_bias coordinates that will
    | bias results.
    |
    */
    'radius' => env('GOOGLE_PLACES_RADIUS', '5'),

    /*
    |--------------------------------------------------------------------------
    | Google Places Country
    |--------------------------------------------------------------------------
    |
    | Country code of the country you would like to return place results from.
    |
    */
    'country' => env('GOOGLE_PLACES_COUNTRY', 'br'),
];
