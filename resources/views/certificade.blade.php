@extends('layouts.app')

@section('content')
<div class="container dark">  

        @include('layouts.nav', $bioData)

        <div class="main-container hover-display">
            @auth
                <div class="hover-icon">
                    <a href="{{ route('certificades') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7.127 22.564l-7.126 1.436 1.438-7.125 5.688 5.689zm-4.274-7.104l5.688 5.689 15.46-15.46-5.689-5.689-15.459 15.46z"/></svg>
                    </a>
                </div>
            @endauth                       
              
            <h2><span class="contrast"># </span>Formação Acadêmica</h2>
            <div class="indentation">
                @foreach ($certificades as $certificade )
                    @if ($certificade->type == 'graduation')
                        <div class=""> 
                            <a href="{{ $certificade->url }}"><h3>{{ $certificade->name }}</h3></a>
                            <p class="contrast">{{ $certificade->institution }}</p> 
                            <p class="certificade-end">Conclusão: {{ $certificade->end_date->format('M/Y') }}</p>   
                        </div>    
                    @endif                            
                @endforeach
            </div>

            <h2><span class="contrast"># </span>Certificados</h2>
            <div class="indentation block-list">
                @foreach ($certificades as $certificade )
                    @if ($certificade->type == 'certificade')
                        <div class="certificade-container"> 
                            <a href="{{ $certificade->url }}"><h3>{{ $certificade->name }}</h3></a>
                            
                            <p class="contrast">{{ $certificade->institution }} </p> 
                            <p class="certificade-end">Conclusão: {{ $certificade->end_date->format('m/Y') }} - {{ $certificade->hours }} horas</p>   
                        </div>    
                    @endif                            
                @endforeach
            </div>

            
         
        </div>
</div>

@endsection