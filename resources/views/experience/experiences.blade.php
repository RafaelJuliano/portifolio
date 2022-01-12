@extends('layouts.app')

@section('content')

    <div class="container dark">


        <div class="list-container">
            <h1>Experiências</h1>
                
            @foreach ($experiences as $experience)
                <div class="list-item">
                    <h3>{{ $experience->company }}</h3>
                    <h3>{{ $experience->position }}</h3>
                    <div class='button-container'>
                        <form action="{{ route('experience.details', $experience['id'])}}" method="GET">                            
                            <button class="edit" >Editar</button>
                        </form>
                        <form action="{{ route('experience.delete', $experience['id'])}}" method="POST">
                            @method('DELETE')
                            {{ csrf_field() }}
                            <button class="delete">Apagar</button>   
                        </form> 
                    </div>                                    
                </div>        
            @endforeach
            
            <div style="align-self: flex-start" class='button-container'>
                <button type="button" class="submit" onclick="window.location.href='{{ route('experience.new') }}'">Novo</button>
                <button class="cancel" type="button" onclick="window.location.href='{{ route('home') }}'">Voltar</button>
                </form>
            </div>
        </div>
    </div>
    

@endsection