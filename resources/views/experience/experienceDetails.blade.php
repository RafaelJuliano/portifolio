@extends('layouts.app')

@section('content')

    <div class="container dark">
        <div class='form-container'>
            <h1>Editar Experiencia</h1>
            <form method="POST" action="{{ secure_url(route('experience.update', $experience['id'])) }}">
                @method('PUT')
                {{ csrf_field() }}
                <label for="company">Empresa</label>
                <input type="text" name="company" id="company" value="{{ $experience['company'] }}">
                <label for="position">Função</label>
                <input type="text" name="position" id="position" value="{{ $experience['position'] }}">
                <label for="location">Endereço</label>
                <input type="text" name="location" id="location" value="{{ $experience['location'] }}">
                <label for="start_date">Data Inicio</label>
                <input type="date" name="start_date" id="start_date" value="{{ $experience['start_date'] }}">
                <label for="end_date">Data Fim</label>
                <input type="date" name="end_date" id="end_date"  value="{{ $experience['end_date'] }}" >                   
              
                <label for="description">Descrição</label>
                <textarea rows="40" cols="33" name="description" id="description">{{ $experience['description'] }}</textarea>
                <div class="button-container">                
                    <button class="submit" type="submit">Salvar</button>
                    <button class="cancel" type="button" onclick="window.location.href='{{ route('experiences') }}'">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

@endsection