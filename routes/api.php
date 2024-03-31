<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Models\Genre;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('guest:sanctum')->group(function () {
    Route::controller(RegisterController::class)->group(function () {
        Route::post('/user/register', RegisterController::class);
    });
    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login');
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/whoami', function() {
        return response()->json(Auth::user());
    });

    Route::post('/logout' , [AuthController::class, 'logout']);

    Route::controller(UserController::class)->group(function () {
        Route::get('/users' , 'getAll');
        Route::get('/user/name/{name}' , 'findName');
        Route::get('/user/id/{id}' , 'findId');
        Route::get('/user/email/{email}' , 'findEmail');
        Route::get('/user/username/{username}' , 'findUsername');
        Route::patch('/users/{id}/update', 'updateUser');
        Route::delete('/user/{id}' , 'deleteUser');
    });

    Route::controller(GenreController::class)->group(function () {
        Route::get('/genres', 'index');
        Route::post('/genre', 'store');
    });

    Route::controller(GameController::class)->group(function () {
        Route::get('/games', 'index');
        Route::get('/game/title/{title}', 'findTitle');
        Route::get('/game/genre/{genre}', 'findGenre');
        Route::post('/game','store');
    });

    Route::controller(PublisherController::class)->group(function () {
        Route::get('/publishers', 'index');
        Route::get('/publisher/name/{name}', 'findName');
        Route::post('/publisher', 'store');
    });
});