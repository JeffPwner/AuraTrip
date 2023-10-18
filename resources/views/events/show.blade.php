@extends('layouts.main')

@section('title', $travel->title)

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/travels/{{$travel->image}}" class="img-fluid" alt="{{$travel->title}}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{$travel->title}}</h1>
            <p class="event-city"><ion-icon class="location-outline"></ion-icon>{{$travel->city}}</p>
            <p class="description"><ion-icon name="star-outline"></ion-icon>{{$travel->description}}</p>
        </div>
    </div>
    <div class="col-md-12" id="api-container">
        <h3>APIs devem vir aqui:</h3>
        <p class="api-information">mapinha show teste</p>
    </div>
</div>



@endsection