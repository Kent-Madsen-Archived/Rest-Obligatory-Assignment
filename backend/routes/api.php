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
Route::middleware( 'auth:sanctum' )->get( '/user', 
    function( Request $request ) 
    {
        return $request->user();
    }
);


// Authentication
Route::post( '1.0.0/account/registration', 
    [AccountController::class, 'register']
);

Route::post( '1.0.0/account/login', 
    [AccountController::class, 'login']
);


// Subscription
Route::middleware(['auth:sanctum'])->group(
    function() 
    {
        Route::post( '1.0.0/subscription/create', 
            [SubscriptionController::class, 'create']
        );

        Route::get( '1.0.0/subscription/{id}', 
            [SubscriptionController::class, 'select']
        );

        Route::get( '1.0.0/subscription/page/{pagination}', 
            [SubscriptionController::class, 'page']
        );

        Route::patch( '1.0.0/subscription/update', 
            [SubscriptionController::class, 'update']
        );

        Route::delete( '1.0.0/subscription/delete', 
            [SubscriptionController::class, 'delete']
        );
    }
);


// Subscription Category
Route::middleware(['auth:sanctum'])->group(
    function() 
    {
        Route::get( '1.0.0/subscription/category/{id}', 
            [SubscriptionCategoryController::class, 'select']
        );

        Route::post( '1.0.0/subscription/category/create', 
            [SubscriptionCategoryController::class, 'create']
        );

        Route::patch( '1.0.0/subscription/category/update', 
            [SubscriptionCategoryController::class, 'update']
        );

        Route::delete( '1.0.0/subscription/category/delete', 
            [SubscriptionCategoryController::class, 'delete']
        );

    }
);


// Subscription Mails
Route::middleware(['auth:sanctum'])->group(
    function() 
    {
        Route::get( '1.0.0/subscription/mail/{id}', 
            [MailingListController::class, 'select']
        );

        Route::post( '1.0.0/subscription/mail/create', 
            [MailingListController::class, 'create']
        );

        Route::patch( '1.0.0/subscription/mail/update', 
            [MailingListController::class, 'update']
        );

        Route::delete( '1.0.0/subscription/mail/delete', 
            [MailingListController::class, 'delete']
        ); 

    }
);