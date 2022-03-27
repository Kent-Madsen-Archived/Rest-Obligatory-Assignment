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
        Route::post( 'subcription/create', 
            [SubscriptionController::class, 'create']
        );

        Route::get( 'subcription/{id}', 
            [SubscriptionController::class, 'select']
        );

        Route::get( 'subcription/page/{pagination}', 
            [SubscriptionController::class, 'page']
        );

        Route::patch( 'subcription/update', 
            [SubscriptionController::class, 'update']
        );

        Route::delete( 'subcription/delete', 
            [SubscriptionController::class, 'delete']
        );
    }
);


// Subscription Category
Route::middleware(['auth:sanctum'])->group(
    function () 
    {
        Route::get( 'subcription/category/{id}', 
            [SubscriptionCategoryController::class, 'select']
        );

        Route::post( 'subcription/category/create', 
            [SubscriptionCategoryController::class, 'create']
        );

        Route::patch( 'subcription/category/update', 
            [SubscriptionCategoryController::class, 'update']
        );

        Route::delete( 'subcription/category/delete', 
            [SubscriptionCategoryController::class, 'delete']
        );

    }
);

// Subscription Mails
Route::middleware(['auth:sanctum'])->group(
    function () 
    {
        Route::get( 'subcription/mail/{id}', 
            [MailingListController::class, 'select']
        );

        Route::post( 'subcription/mail/create', 
            [MailingListController::class, 'create']
        );

        Route::patch( 'subcription/mail/update', 
            [MailingListController::class, 'update']
        );

        Route::delete( 'subcription/mail/delete', 
            [MailingListController::class, 'delete']
        ); 

    }
);