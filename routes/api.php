<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Resources;
use App\Http\Controllers\Categories;
use App\Http\Controllers\Newsletters;
use App\Http\Controllers\Comments;
use App\Http\Controllers\Users;

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

// API DES NEWSLETETRS
// CTRL: Newsletters
    Route::resource('newsletters', Newsletters::class)->only('store');
// API DES COMMENTS
// CTRL: Comments
    Route::resource('comments', Comments::class)->except(['show', 'create', 'edit']);

// API DES USERS
// CTRL: Users
    Route::resource('users', Users::class)->except(['show', 'create', 'edit']);

    // Route::post('/register', [AuthController::class, 'regsiter']);

// CONNECTION
    Route::post('/login', [AuthController::class, 'login']);

// ENREGISTREMENT
Route::post('/register', [AuthController::class, 'register']);


Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/comments/add', [Comments::class, 'add']);
        // DECONNECTION
        Route::post('/logout', [AuthController::class, 'logout']);
    });