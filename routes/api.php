<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Resources\ErrorNotFoundResource;

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

Route::any('/', function() {
    return (new ErrorNotFoundResource(null))
        ->response()
        ->setStatusCode(Response::HTTP_NOT_FOUND);
});
