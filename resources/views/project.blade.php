@extends('layouts.app')

@section('content')
<div class="container dark">  

        @include('layouts.nav', $bioData)

        <div class="main-container hover-display">
            @auth
                <div class="hover-icon">
                    <a href="{{ route('projects') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7.127 22.564l-7.126 1.436 1.438-7.125 5.688 5.689zm-4.274-7.104l5.688 5.689 15.46-15.46-5.689-5.689-15.459 15.46z"/></svg>
                    </a>
                </div>
            @endauth

            <h1 class="space-bottom">Meus Projetos</h1>            
              
            <h2><span class="contrast">&lt</span>Projetos Profisionais<span class="contrast">/&gt</span></h2>
            <div class="indentation">
                @foreach ($projects as $project )
                    @if ($project->type == 'professional')
                        <div class="project-container"> 
                            <h2><span class="contrast"># </span>{{ $project->name }}</h2>
                            <p class="project-description">{{ $project->description }}</p>
                            @if($project->url)
                                    <a class="project-url contrast" href="{{ $project->url }}" target="_blank">
                                        Acesse o Código
                                    </a>
                            @endif
                            <div class="project-skill-container">
                                <hr>
                                <p class="bold">Habilidades desenvolvidas:</p>
                                @foreach ($project['skilss'] as $skill)
                                    <span class="project-skill">{{ $skill }}</span>                                
                                @endforeach  
                            </div> 
                        </div>    
                    @endif                            
                @endforeach
            </div>

            <h2><span class="contrast">&lt</span>Projetos Pessoais<span class="contrast">/&gt</span></h2>
            <div class="indentation">
                @foreach ($projects as $project )
                    @if ($project->type == 'personal')
                        <div class="project-container"> 
                            <h2><span class="contrast"># </span>{{ $project->name }}</h2>
                            <p class="project-description">{{ $project->description }}</p>
                            @if($project->url)
                                    <a class="project-url contrast" href="{{ $project->url }}" target="_blank">
                                        Acesse o Código
                                    </a>
                            @endif
                            <div class="project-skill-container">
                                <hr>
                                <p class="skill-up">Habilidades desenvolvidas:</p>
                                @foreach ($project['skilss'] as $skill)
                                    <span class="project-skill">{{ $skill }}</span>                                
                                @endforeach  
                            </div> 
                        </div>    
                    @endif                            
                @endforeach
            </div>
            
        </div>
</div>

@endsection