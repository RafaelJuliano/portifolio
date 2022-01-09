@extends('layouts.app')

@section('content')
<div class="container dark">  

        @include('layouts.nav', $bioData)

        <div class="main-container">
            
            
            <h2 ><span class="contrast"># </span>Sobre mim</h2>
            <div class="indentation hover-display">
                @auth
                    <div class="hover-icon">
                        <a href="{{ route('bio') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7.127 22.564l-7.126 1.436 1.438-7.125 5.688 5.689zm-4.274-7.104l5.688 5.689 15.46-15.46-5.689-5.689-15.459 15.46z"/></svg>
                        </a>
                    </div>
                @endauth
                @foreach ($bioData['about'] as $paragraph)
                    <p class="bio-paragraph">{{ $paragraph }}</p>
                @endforeach
            </div>
            <hr/>
            <h2><span class="contrast"># </span>Habilidades</h2>
            <div class="indentation hover-display">
                 @auth
                    <div class="hover-icon">
                        <a href="{{ route('skills') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7.127 22.564l-7.126 1.436 1.438-7.125 5.688 5.689zm-4.274-7.104l5.688 5.689 15.46-15.46-5.689-5.689-15.459 15.46z"/></svg>
                        </a>
                    </div>
                @endauth
                <div class="block-list">
                    @foreach ($bioData['skills'] as $skill)
                        <div class="block-item">
                            <div class="skill-item-title">
                                <div class="skill-logo-title">{!! $skill['svgLink'] !!}</div>
                                <h3>{{ $skill['name'] }}</h3>
                            </div>
                            <p>{{ $skill['description'] }}</p>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    

    

    

</div>

@endsection
