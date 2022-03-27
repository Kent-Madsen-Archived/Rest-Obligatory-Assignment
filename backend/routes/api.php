<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SubscriptionCategoryController;
use App\Http\Controllers\MailingListController;

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

// Authentication
Route::post( 'account/register', 
    [AccountController::class, 'register']
);

Route::post( 'account/login', 
    [AccountController::class, 'login']
);


//
Route::middleware('auth:sanctum')->get( 'subcription/{id}', 
    [SubscriptionController::class, 'select']
);

Route::middleware('auth:sanctum')->get( 'subcription/page/{pagination}', 
    [SubscriptionController::class, 'page']
);

Route::middleware('auth:sanctum')->post( 'subcription/create', 
    [SubscriptionController::class, 'create']
);

Route::middleware('auth:sanctum')->patch( 'subcription/update', 
    [SubscriptionController::class, 'update']
);

Route::middleware('auth:sanctum')->delete( 'subcription/delete', 
    [SubscriptionController::class, 'delete']
);


// subcription category
Route::middleware('auth:sanctum')->get( 'subcription/category/{id}', 
    [SubscriptionCategoryController::class, 'select']
);

Route::middleware('auth:sanctum')->post( 'subcription/category/create', 
    [SubscriptionCategoryController::class, 'create']
);

Route::middleware('auth:sanctum')->patch( 'subcription/category/update', 
    [SubscriptionCategoryController::class, 'update']
);

Route::middleware('auth:sanctum')->delete( 'subcription/category/delete', 
    [SubscriptionCategoryController::class, 'delete']
);

// subscription mail
Route::middleware('auth:sanctum')->get( 'subcription/mail/{id}', 
    [MailingListController::class, 'select']
);

Route::middleware('auth:sanctum')->post( 'subcription/mail/create', 
    [MailingListController::class, 'create']
);

Route::middleware('auth:sanctum')->patch( 'subcription/mail/update', 
    [MailingListController::class, 'update']
);

Route::middleware('auth:sanctum')->delete( 'subcription/mail/delete', 
    [MailingListController::class, 'delete']
); 