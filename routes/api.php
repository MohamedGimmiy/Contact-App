<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;

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
//Route::apiResource('/contacts', ContactController::class);
Route::apiResources([
    '/contacts' => ContactController::class,
    '/companies' => CompanyController::class
]);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
