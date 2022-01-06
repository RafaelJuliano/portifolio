@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="bio-container">

        <div class="bio-side side-container">

            <div class="avatar">
                <img src="{{ $bioData['avatar'] }}" alt="Meu Avatar">
            </div>
            
        </div>

        <div class="bio-main main-container">
            <h1>{{ $bioData['name'] }}</h1>
            <h3>{{ $bioData['occupation'] }}</h3>
            <p>Sobre mim</p>
            <p>{{ $bioData['about'] }}</p>
        </div>
    </div>

    <div class="body-container">

        <div class="body-side side-container">

        </div>

        <div class="body-main main-container">
    </div>

    </div>

</div>
@endsection
