<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\NotebookController;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('notebook', NotebookController::class)->except([
    'create', 'edit' 
]);
