<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Resources;
use App\Http\Controllers\Categories;
use App\Http\Controllers\Newsletters;
use App\Http\Controllers\Comments;
use App\Http\Controllers\SearchController;
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
    Route::get('resources', [Resources::class, 'index']);

// API DES CATEGORIES
// CTRL: Categories
    Route::get('categories', [Categories::class, 'index']);

// API DES NEWSLETETRS
// CTRL: Newsletters
    Route::post('newsletters', [Newsletters::class, 'store']);
// API DES COMMENTS
// CTRL: Comments
    Route::get('comments', [Comments::class, 'index']);

// API DES USERS
// CTRL: Users
    Route::get('users', [Users::class, 'index']);

// CONNECTION
    Route::post('/login', [AuthController::class, 'login']);

// ENREGISTREMENT
    Route::post('/register', [AuthController::class, 'register']);

// RECHERCHE
// CTRL: Search
    Route::get('/search', [SearchController::class, 'search']);


Route::group(['middleware' => ['auth:sanctum']], function() {
    // ADD
    Route::post('/comments/add', [Comments::class, 'add']);
    // DECONNECTION
    Route::post('/logout', [AuthController::class, 'logout']);
    // ADD
    Route::post('/add', [Resources::class, 'add']);
    // EDIT
    Route::post('/edit', [Resources::class, 'edit']);
    // DELETE
    Route::post('/delete', [Resources::class, 'delete']);
});

