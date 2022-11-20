<?php

use App\Http\Controllers\Grade\GradeController;
use App\Http\Controllers\Section\SectionController;
use App\Http\Controllers\Stage\StageController;
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

Auth::routes();

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth' ]
    ], function(){
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/', function () {
            return view('home');
        });

        Route::resource('stage', StageController::class);

        Route::resource('grade', GradeController::class);
        Route::post('delete_all_item', [GradeController::class, "delete_all_item"])->name('delete_all_item');
        Route::post('filter_grade', [GradeController::class, "filter_grade"])->name('filter_grade');

        Route::resource('section', SectionController::class);
        Route::get('filter_grade_by_stage/{id}', [SectionController::class, "filter_grade_by_stage"]);

    });


