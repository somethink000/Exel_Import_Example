<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ProductController;


Route::get('/', [ProductController::class, 'index'])->name('index');


Route::get('upload_import', [ProductController::class, 'upload_import'])->name('upload_import');
Route::post('import', [ProductController::class, 'import'])->name('import');

Route::resource('product', ProductController::class)->except([
    'update', 'edit', 'store', 'create', 'destroy'
]);
