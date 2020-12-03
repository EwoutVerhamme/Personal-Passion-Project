<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\YouthCenterController;
use App\Http\Controllers\API\ActivitiesController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\SkillController;
use App\Http\Controllers\API\Skill_userController;
use App\Http\Controllers\API\AdController;

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

// Login or Register
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//Get the users with skills and ads
Route::get("users", [AuthController::class, "getAll"]);
Route::get("user/{id}", [AuthController::class, "getById"]);
Route::get("users/{skill_name}", [AuthController::class, "getUserWithSkill"]);


//Get all the skills
Route::get("skills", [Skill_userController::class, "index"]);

//Get all the adds
Route::get("ads", [AdController::class, "index"]);
Route::get("ads/{ad_name}", [AdController::class, "getUserWithAds"]);
Route::post("ads", [AdController::class, "store"]);

// Get all the matches
Route::get("matches", [Skill_userController::class, "matches"])->middleware('auth:api');


// Get the youthcenters 
Route::get("youth_centers", [YouthCenterController::class, "getAll"]);
Route::get("youth_centers/{name}", [YouthCenterController::class, "index"]);
Route::get("youth_centers/{image}", [YouthCenterController::class, "store"]);
Route::post('youth_centers', [YouthCenterController::class, "store"]);






// Route::apiResource('projects/{$name}', ProjectController::class)->middleware('auth:api');
// Route::apiResource('youth_centers/{name}', YouthCenterController::class);


