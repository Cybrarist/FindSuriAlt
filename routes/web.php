<?php

use App\Http\Controllers\GetPeopleFilterController;
use Illuminate\Support\Facades\Route;

Route::get('/filter',GetPeopleFilterController::class )->name('filter');
Route::get('/find',GetPeopleFilterController::class )->name('find');
Route::get('/person/{person}',[\App\Http\Controllers\PersonController::class , 'show'] )->name('person.show');


Route::get('/', function () {
    return redirect('/people');
});


Route::middleware(['auth','signed'])
    ->get('faces/temp/{path}', function (string $path){
    return Storage::disk('faces')->download($path);
})->name('faces.temp');
