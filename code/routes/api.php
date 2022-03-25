<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AccountMailsController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Password Protected
define("PS", 'auth:sanctum');

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

// Basics req:
Route::post(
    'register', 
    [AccountsController::class, 'register']
);

Route::post(
    'login', 
    [AccountsController::class, 'login']
);


// Account Id
Route::middleware( PS )->get(
    'accounts/{id}', 
    [AccountsController::class, 'index']
);


// Account Mails
// Create
Route::middleware( PS )->post(
    'accounts/mail/create', 
    [AccountMailsController::class, 'create']
);

// Select
Route::middleware( PS )->get(
    'accounts/mail/select/identity/{id}', 
    [AccountMailsController::class, 'retrieve_by_id']
)->where('id', '[0-9]');

Route::middleware( PS )->get(
    'accounts/mail/select/email/{name}', 
    [AccountMailsController::class, 'retrieve_by_name']
);

//
Route::middleware( PS )->patch(
    'accounts/mail/update/{id}', 
    [AccountMailsController::class, 'update']
)->where('id', '[0-9]+');

Route::middleware( PS )->delete(
    'accounts/mail/delete/{id}', 
    [AccountMailsController::class, 'destroy']
)->where('id', '[0-9]+');

