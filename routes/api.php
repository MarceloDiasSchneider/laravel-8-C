<?php

use App\Models\Post;
use App\Http\Controllers\PostApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ScriptPerGiornataController;
use App\Http\Controllers\OrdiniPerGiornoMondoTopController;
use App\Http\Controllers\OrdiniPerOraMondoTopController;

use App\Http\Controllers\GameController;

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

Route::get('/posts', [PostApiController::class, 'get']);
Route::get('/posts/{getId}', [PostApiController::class, 'getId']);
Route::post('/posts', [PostApiController::class, 'post']);
Route::put('/posts/{idToUpdate}', [PostApiController::class, 'update']);
Route::delete('/posts/{idToDelete}', [PostApiController::class, 'delete']); 

Route::get('scriptPerGiornata',[ScriptPerGiornataController::class,'scriptPerGiornata']);
Route::get('ordiniPerGiornoMondoTop', [OrdiniPerGiornoMondoTopController::class, 'ordiniPerGiornoMondoTop']);
Route::get('ordiniPerOraMondoTop', [OrdiniPerOraMondoTopController::class, 'ordiniPerOraMondoTop']);

Route::apiResource("game", GameController::class);