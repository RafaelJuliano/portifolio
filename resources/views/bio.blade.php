@extends('layouts.app')

@section('content')

<div class="container dark">
    <div class='form-container'>
        <h1>Cadastro BIO</h1>
        <form method="POST" action="{{ secure_url(route('bio.update')) }}">
            {{ csrf_field() }}
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" value="{{ $bio->name }}">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ $bio->email }}">
            <label for="phone">Telefone</label>
            <input type="text" name="phone" id="phone" value="{{ $bio->phone }}">
            <label for="occupation">Profissão</label>
            <input type="text" name="occupation" id="occupation" value="{{ $bio->occupation }}">
            <label for="location">Endereço</label>
            <input type="text" name="location" id="location" value="{{ $bio->location }}">
            <label for="company">Empresa</label>
            <input type="text" name="company" id="company" value="{{ $bio->company }}">
            <label for ="avatar">Link Avatar</label>
            <input type="text" name="avatar" id="avatar" value="{{ $bio->avatar }}">
            <label for="linkedin">Linkedin</label>
            <input type="text" name="linkedin" id="linkedin" value="{{ $bio->linkedin }}">
            <label for="github">Github</label>
            <input type="text" name="github" id="github" value="{{ $bio->github }}">
            <label for="about">Sobre Mim</label>
            <textarea rows="10" cols="33" name="about" id="about">{{ $bio->about }}</textarea>
            <div class="button-container">                
                <button class="submit" type="submit">Salvar</button>
                <button class="cancel" type="button" onclick="window.location.href='{{ route('home') }}'">Cancelar</button>
            </div>
        </form>
    </div>
</div>
@endsection