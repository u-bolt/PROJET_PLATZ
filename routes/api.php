<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Resources;
use App\Http\Controllers\Categories;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// API DES RESOURCES
// CTRL: Resources
    Route::resource('resources', Resources::class)->except(['show', 'create', 'edit']);

// API DES CATEGORIES
// CTRL: Categories
    Route::resource('categories', Categories::class)->except(['show', 'create', 'edit']);
