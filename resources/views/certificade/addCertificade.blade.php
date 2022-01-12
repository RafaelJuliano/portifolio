@extends('layouts.app')

@section('content')

    <div class="container dark">
        <div class='form-container'>
            <h1>Cadastro Certificado</h1>
            <form method="POST" action="{{ secure_url(route('certificade.add')) }}">
                {{ csrf_field() }}
                <label for="type">Tipo</label>
                <select name="type" id="type">
                    <option value="certificade">Curso</option>
                    <option value="certification">Certificação</option>
                    <option value="graduation">Graduação</option>                    
                </select>
                <label for="name">Nome do curso</label>
                <input type="text" name="name" id="name">
                <label for="institution">Instituição</label>
                <input type="text" name="institution" id="institution">
                <label for="hours">Horas de curso</label>
                <input type="text" name="hours" id="hours">
                <label for="end_date">Data de conclusão</label>
                <input type="date" name="end_date" id="end_date">
                <label for="url">Link certificado</label>
                <input type="text" name="url" id="url">
                <div class="button-container">                
                    <button class="submit" type="submit">Salvar</button>
                    <button class="cancel" type="button" onclick="window.location.href='{{ route('certificades') }}'">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

@endsection