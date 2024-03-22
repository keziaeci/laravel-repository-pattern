<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteRegistrar;

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


Route::controller(UserController::class)->group(function () {
    Route::get('/users' , 'getAll');
    Route::get('/user/name/{name}' , 'findName');
    Route::get('/user/id/{id}' , 'findId');
    Route::get('/user/email/{email}' , 'findEmail');
    Route::get('/user/username/{username}' , 'findUsername');
    Route::post('/users', 'createUser');
    Route::patch('/users/{id}/update', 'updateUser');
    Route::delete('/user/{id}' , 'deleteUser');
});