@extends('layouts.app')

@section('content')

    <div class="container dark">


        <div class="list-container">
            <h1>Projetos</h1>
                
            @foreach ($projects as $project)
                <div class="list-item">
                    <h3>{{ $project->name }}</h3>                    
                    <div class='button-container'>
                        <form action="{{ route('project.details', $project['id'])}}" method="GET">                            
                            <button class="edit" >Editar</button>
                        </form>
                        <form action="{{ route('project.delete', $project['id'])}}" method="POST">
                            @method('DELETE')
                            {{ csrf_field() }}
                            <button class="delete">Apagar</button>   
                        </form> 
                    </div>                                    
                </div>        
            @endforeach
            
            <div style="align-self: flex-start" class='button-container'>
                <button type="button" class="submit" onclick="window.location.href='{{ route('project.new') }}'">Novo</button>
                <button class="cancel" type="button" onclick="window.location.href='{{ route('project') }}'">Voltar</button>
                </form>
            </div>
        </div>
    </div>
    

@endsection