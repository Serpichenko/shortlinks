<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LinksController;

Route::get('/', function () {
    return view('app', ['page' => 'main']);
});

Route::get('/all', function () {
    return view('app', ['page' => 'all']);
});

Route::get('/detail/{id}', function ($id) {
    return view('app', ['page' => 'detail', 'id' => $id]);
});

Route::get('/{url_token}', [LinksController::class, 'GoToLink']);
