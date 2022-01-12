<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if (env('APP_ENV') === 'production') {
    URL::forceSchema('https');
}

Auth::routes();

Route::get('/', function () {
    return(redirect()->route('home'));
});

Route::get('/sobre', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/experiencia', [App\Http\Controllers\ExperienceController::class, 'index'])->name('experience');
Route::get('/projetos', [App\Http\Controllers\ProjectController::class, 'index'])->name('project');
Route::get('/certificados', [App\Http\Controllers\CertificadeController::class, 'index'])->name('certificade');

Route::group(['middleware' => ['auth']], function() 
{
    Route::get('/bio', [App\Http\Controllers\BioController::class, 'index'])->name('bio');
    Route::post('/bio',[App\Http\Controllers\BioController::class, 'updateBio'])->name('bio.update');

    Route::get('/skills', [App\Http\Controllers\SkillController::class, 'index'])->name('skills');
    Route::get('/skills/{id}', [App\Http\Controllers\SkillController::class, 'skillDetails'])->name('skill.details');
    Route::delete('/skills/{id}', [App\Http\Controllers\SkillController::class, 'deleteSkill'])->name('skill.delete');
    Route::get('/new/skill', [App\Http\Controllers\SkillController::class, 'openSkilladd'])->name('skill.new');
    Route::post('/skills/add', [App\Http\Controllers\SkillController::class, 'addNewSkill'])->name('skill.add');
    Route::put('/skills/{id}', [App\Http\Controllers\SkillController::class, 'updateSkill'])->name('skill.update');

    Route::get('experiences', [App\Http\Controllers\ExperienceController::class, 'listExperiences'])->name('experiences');
    Route::get('experiences/{id}', [App\Http\Controllers\ExperienceController::class, 'experienceDetails'])->name('experience.details');
    Route::delete('experiences/{id}', [App\Http\Controllers\ExperienceController::class, 'deleteExperience'])->name('experience.delete');
    Route::get('new/experience', [App\Http\Controllers\ExperienceController::class, 'openExperienceadd'])->name('experience.new');
    Route::post('experiences/add', [App\Http\Controllers\ExperienceController::class, 'addNewExperience'])->name('experience.add');
    Route::put('experiences/{id}', [App\Http\Controllers\ExperienceController::class, 'updateExperience'])->name('experience.update');

    Route::get('projects', [App\Http\Controllers\ProjectController::class, 'listProjects'])->name('projects');
    Route::get('projects/{id}', [App\Http\Controllers\ProjectController::class, 'projectDetails'])->name('project.details');
    Route::delete('projects/{id}', [App\Http\Controllers\ProjectController::class, 'deleteProject'])->name('project.delete');
    Route::get('new/project', [App\Http\Controllers\ProjectController::class, 'openProjectadd'])->name('project.new');
    Route::post('projects/add', [App\Http\Controllers\ProjectController::class, 'addNewProject'])->name('project.add');
    Route::put('projects/{id}', [App\Http\Controllers\ProjectController::class, 'updateProject'])->name('project.update');

    Route::get('certificades', [App\Http\Controllers\CertificadeController::class, 'listCertificades'])->name('certificades');
    Route::get('certificades/{id}', [App\Http\Controllers\CertificadeController::class, 'certificadeDetails'])->name('certificade.details');
    Route::delete('certificades/{id}', [App\Http\Controllers\CertificadeController::class, 'deleteCertificade'])->name('certificade.delete');
    Route::get('new/certificade', [App\Http\Controllers\CertificadeController::class, 'openCertificadeadd'])->name('certificade.new');
    Route::post('certificades/add', [App\Http\Controllers\CertificadeController::class, 'addNewCertificade'])->name('certificade.add');
    Route::put('certificades/{id}', [App\Http\Controllers\CertificadeController::class, 'updateCertificade'])->name('certificade.update');
    
});


