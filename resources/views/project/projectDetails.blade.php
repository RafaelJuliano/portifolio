@extends('layouts.app')

@section('content')

    <div class="container dark">
        <div class='form-container'>
            <h1>Editar Projeto</h1>
            <form method="POST" action="{{ secure_url(route('project.update', $project['id'])) }}">
                @method('PUT')
                {{ csrf_field() }}
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" value="{{ $project['name'] }}">
                <label for="type">Tipo</label>
                <select name="type" id="type">
                    <option class="option" value="professional" {{ $project['type']=='professional'? 'selected': '' }}>Profissional</option>
                    <option class="option" value="personal" {{ $project['type']=='personal'? 'selected': '' }}>Pessoal</option>                    
                </select>
                <label for="url">Link de projeto</label>
                <input type="text" name="url" id="url" value="{{ $project['url'] }}">
                
                <label for="skilss">Skills</label>                
                <input type="text" name="skilss" id="skilss" value="{{ $project['skilss'] }}">

                <label for="description">Descrição</label>
                <textarea rows="20" cols="33" name="description" id="description">{{ $project['description'] }}</textarea>
                <div class="button-container">                
                    <button class="submit" type="submit">Salvar</button>
                    <button class="cancel" type="button" onclick="window.location.href='{{ route('projects') }}'">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

@endsection