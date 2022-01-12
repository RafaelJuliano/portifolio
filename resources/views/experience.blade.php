@extends('layouts.app')

@section('content')
<div class="container dark">  

        @include('layouts.nav', $bioData)

        <div class="main-container hover-display">
            @auth
                <div class="hover-icon">
                    <a href="{{ route('experiences') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7.127 22.564l-7.126 1.436 1.438-7.125 5.688 5.689zm-4.274-7.104l5.688 5.689 15.46-15.46-5.689-5.689-15.459 15.46z"/></svg>
                    </a>
                </div>
            @endauth

            <h1 class="space-bottom">Experiência profissional</h1>            
              
            @foreach ($experiences as $experience)
                <div class="experience indentation">                    
                    <h2><span class="contrast"># </span>{{ $experience->position }}</h2>                        
                        
                    <div class="date-container">
                        <p class="company">{{ $experience->company }}</p>
                        <p class="experience-date">{{ $experience->start_date->format('m/Y') }} - 
                            @if ($experience->end_date)
                               {{ $experience->end_date->format('m/Y') }}
                            @else
                                Atual
                            @endif </p>
                    </div>
                    <div class="experience-description">
                        <p><span class="bold">Descrição: </span>{{ $experience->description }}</p>
                    </div>
                    
                </div>
                
            @endforeach
            
        </div>
</div>

@endsection
