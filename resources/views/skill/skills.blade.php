@extends('layouts.app')

@section('content')

    <div class="container dark">


        <div class="list-container">
            <h1>Skills</h1>
                
            @foreach ($skills as $skill)
                <div class="list-item">
                    <div class="skill-logo">
                        {!! $skill['svgLink'] !!}
                    </div>
                    <h3>{{ $skill->name }}</h3>
                    <div class='button-container'>
                        <form action="{{ route('skill.details', $skill['id'])}}" method="GET">                            
                            <button class="edit" >Editar</button>
                        </form>
                        <form action="{{ route('skill.delete', $skill['id'])}}" method="POST">
                            @method('DELETE')
                            {{ csrf_field() }}
                            <button class="delete">Apagar</button>   
                        </form> 
                    </div>                                    
                </div>        
            @endforeach
            
            <div style="align-self: flex-start" class='button-container'>
                <button type="button" class="submit" onclick="window.location.href='{{ route('skill.new') }}'">Novo</button>
                <button class="cancel" type="button" onclick="window.location.href='{{ route('home') }}'">Voltar</button>
                </form>
            </div>
        </div>
    </div>
    

@endsection