<?php

use App\Http\Controllers\ccountsController;
use App\Http\Controllers\AccountMailsController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post(
    'register', 
    [AccountsController::class, 'register']
);
Route::post(
    'login', 
    [AccountsController::class, 'login']
);

Route::middleware(PS)->get(
    'accounts/{id}', 
    [AccountsController::class, 'index']
);

Route::middleware(PS)->get(
    'accounts/mail/store/{pagination}', 
    [AccountMailsController::class, 'store']
);

Route::middleware(PS)->get(
    'accounts/mail/store/identity/{id}', 
    [AccountMailsController::class, 'retrieve_by_id']
);
Route::middleware(PS)->get(
    'accounts/mail/store/email/{name}', 
    [AccountMailsController::class, 'retrieve_by_name']
);

Route::middleware(PS)->get(
    'accounts/mail/register', 
    [AccountMailsController::class, 'retrieve_by_name']
);
Route::middleware(PS)->get(
    'accounts/mail/edit', 
    [AccountMailsController::class, 'retrieve_by_name']
);
Route::middleware(PS)->get(
    'accounts/mail/delete/', 
    [AccountMailsController::class, 'retrieve_by_name']
);

