<?php

use App\Http\Controllers\GetPeopleFilterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/filter',GetPeopleFilterController::class )->name('filter');
Route::get('/person/{person}',[\App\Http\Controllers\PersonController::class , 'show'] )->name('person.show');


Route::get('/', function () {
    \Illuminate\Support\Facades\Auth::loginUsingId(1);
    return redirect('/people');
});
