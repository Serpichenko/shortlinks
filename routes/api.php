<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LinksController;

Route::get('link/all', [LinksController::class, 'all']);

Route::resource('link', LinksController::class);
