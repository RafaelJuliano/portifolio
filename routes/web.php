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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
});


