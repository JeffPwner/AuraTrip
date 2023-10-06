@extends('layouts.main')

@section('title', 'AuraTrip')
    
@section('content')

    <h1>Algum título</h1>
    <img src="/img/auratrip.jpg" alt="banner" width="1000">

    @foreach($travels as $travels)
        <p>{{$travels->title}} -- {{$travels->description}}</p>
    @endforeach
    
@endsection