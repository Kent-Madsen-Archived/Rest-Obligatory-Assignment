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
    function ( Request $request ) 
    {
        return $request->user();
    }
);


// Authentication
Route::post( 'account/register', 
    [AccountController::class, 'register']
);

Route::post( 'account/login', 
    [AccountController::class, 'login']
);


// Subscription
Route::middleware(['auth:sanctum'])->group(
    function () 
    {
        Route::post( 'subscription/create', 
            [SubscriptionController::class, 'create']
        );

        Route::get( 'subscription/{id}', 
            [SubscriptionController::class, 'select']
        );

        Route::get( 'subscription/page/{pagination}', 
            [SubscriptionController::class, 'page']
        );

        Route::patch( 'subscription/update', 
            [SubscriptionController::class, 'update']
        );

        Route::delete( 'subscription/delete', 
            [SubscriptionController::class, 'delete']
        );
    }
);


// Subscription Category
Route::middleware(['auth:sanctum'])->group(
    function () 
    {
        Route::get( 'subscription/category/{id}', 
            [SubscriptionCategoryController::class, 'select']
        );

        Route::post( 'subscription/category/create', 
            [SubscriptionCategoryController::class, 'create']
        );

        Route::patch( 'subscription/category/update', 
            [SubscriptionCategoryController::class, 'update']
        );

        Route::delete( 'subscription/category/delete', 
            [SubscriptionCategoryController::class, 'delete']
        );

    }
);

// Subscription Mails
Route::middleware(['auth:sanctum'])->group(
    function () 
    {
        Route::get( 'subscription/mail/{id}', 
            [MailingListController::class, 'select']
        );

        Route::post( 'subscription/mail/create', 
            [MailingListController::class, 'create']
        );

        Route::patch( 'subscription/mail/update', 
            [MailingListController::class, 'update']
        );

        Route::delete( 'subscription/mail/delete', 
            [MailingListController::class, 'delete']
        ); 

    }
);