<?php

use App\Http\Controllers\StudyController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// Route::resource('studys', StudyController::class);


//Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/studys', [StudyController::class, 'index']);
Route::get('/studys/{id}', [StudyController::class, 'show']);
Route::get('/studys/search/{name}', [StudyController::class, 'search']);


//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/studys', [StudyController::class, 'store']);
    Route::put('/studys/{id}', [StudyController::class, 'update']);
    Route::delete('/studys/{id}', [StudyController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
