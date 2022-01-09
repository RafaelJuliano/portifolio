@extends('layouts.app')

@section('content')

    <div class="container dark">
        <div class='form-container'>
            <h1>Cadastro Skill</h1>
            <form method="POST" action="{{ secure_url(route('skill.add')) }}">
                {{ csrf_field() }}
                <label for="name">Nome</label>
                <input type="text" name="name" id="name">
                <label for="description">Descrição</label>
                <input type="text" name="description" id="description">
                <label for="svgLink">SVG</label>
                <textarea rows="40" cols="33" name="svgLink" id="svgLink"></textarea>
                <div class="button-container">                
                    <button class="submit" type="submit">Salvar</button>
                    <button class="cancel" type="button" onclick="window.location.href='{{ route('skills') }}'">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

@endsection