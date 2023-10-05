<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Coordinators\BrandCoordinator;
use App\Http\Coordinators\MyShopCoordinator;
use App\Http\Coordinators\SearchCoordinator;
use App\Http\Coordinators\AccountCoordinator;
use App\Http\Coordinators\ProductCoordinator;
use App\Http\Coordinators\CategoryCoordinator;
use App\Http\Coordinators\FavouriteCoordinator;
use App\Http\Coordinators\CollectionCoordinator;
use App\Http\Coordinators\NotificationCoordinator;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->name('api.')->group(function () {

    //
});
