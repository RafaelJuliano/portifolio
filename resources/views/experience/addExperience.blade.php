@extends('layouts.app')

@section('content')

    <div class="container dark">
        <div class='form-container'>
            <h1>Cadastro Experiência</h1>
            <form method="POST" action="{{ secure_url(route('experience.add')) }}">
                {{ csrf_field() }}
                <label for="company">Empresa</label>
                <input type="text" name="company" id="company">
                <label for="position">Função</label>
                <input type="text" name="position" id="position">
                <label for="location">Endereço</label>
                <input type="text" name="location" id="location">
                <label for="start_date">Data Inicio</label>
                <input type="date" name="start_date" id="start_date">
                <label for="end_date">Data Fim</label>
                <input type="date" name="end_date" id="end_date">
                <label for="description">Descrição</label>
                <textarea rows="40" cols="33" name="description" id="description"></textarea>
                <div class="button-container">                
                    <button class="submit" type="submit">Salvar</button>
                    <button class="cancel" type="button" onclick="window.location.href='{{ route('experiences') }}'">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

@endsection