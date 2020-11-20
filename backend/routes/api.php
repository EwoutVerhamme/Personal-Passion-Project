<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\YouthCenterController;
use App\Http\Controllers\API\ActivitiesController;
use App\Http\Controllers\ApiController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get("youth_centers/{name}", [YouthCenterController::class, "index"]);
Route::get("youth_centers", [YouthCenterController::class, "getAll"]);

// Route::apiResource('projects/{$name}', ProjectController::class)->middleware('auth:api');
// Route::apiResource('youth_centers/{name}', YouthCenterController::class);


