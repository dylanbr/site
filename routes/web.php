<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [ 'as' => 'welcome', 'uses' => WelcomeController::class, ]);

Route::get('report', [ 'as' => 'report', 'uses' => ReportGetController::class, ]);
Route::post('report', [ 'as' => 'report:post', 'uses' => ReportPostController::class, ]);

Route::group([ 'as' => 'auth.', 'prefix' => 'auth', ], function () {
    Route::get('connect', [ 'as' => 'connect', 'uses' => AuthConnectController::class, ]);
});
