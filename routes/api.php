<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorsController;

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

// Route::get('/test', function(Request $request){
//     return 'Authenticated';
// });

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('auth:api')->prefix('v1')->group(function(){
    Route::get('/user', function(Request $request){
        return $request->user();
    });

    // Route::get('/authors', [AuthorsController::class, 'index']);
    // Route::post('/authors', [AuthorsController::class, 'store']);
    // Route::get('/authors/{author}', [AuthorsController::class, 'show']);

    Route::apiResource('/authors', AuthorsController::class);

});
