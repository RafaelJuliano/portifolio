@extends('layouts.app')

@section('content')

    <div class="container dark">


        <div class="list-container">
            <h1>Certificados</h1>
                
            @foreach ($certificades as $certificade)
                <div class="list-item">
                    <h3>{{ $certificade->name }}</h3>
                    <h3>{{ $certificade->institution }}</h3>
                    <div class='button-container'>
                        <form action="{{ route('certificade.details', $certificade['id'])}}" method="GET">                            
                            <button class="edit" >Editar</button>
                        </form>
                        <form action="{{ route('certificade.delete', $certificade['id'])}}" method="POST">
                            @method('DELETE')
                            {{ csrf_field() }}
                            <button class="delete">Apagar</button>   
                        </form> 
                    </div>                                    
                </div>        
            @endforeach
            
            <div style="align-self: flex-start" class='button-container'>
                <button type="button" class="submit" onclick="window.location.href='{{ route('certificade.new') }}'">Novo</button>
                <button class="cancel" type="button" onclick="window.location.href='{{ route('certificade') }}'">Voltar</button>
                </form>
            </div>
        </div>
    </div>
    

@endsection