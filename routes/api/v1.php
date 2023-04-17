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

Route::get('/roles/list', [\App\Http\Controllers\Api\V1\RoleController::class, 'list'])
    ->name('roles.list');

Route::post('/invitation/process', [\App\Http\Controllers\Api\V1\InvitationController::class, 'process'])
    ->name('invitation.process');

Route::fallback(function (){
    return (new ErrorNotFoundResource(null))
        ->response()
        ->setStatusCode(Response::HTTP_NOT_FOUND);
});
