<?php

use App\Http\Controllers\AdminNewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Resources\NewsResource;
use App\Models\News;


//Api routes
Route::prefix('/api')->group(function () {
    Route::get('/news', function () {
        return NewsResource::collection(News::all());
    });

    Route::get('/news/{id}', function (string $id) {
        return new NewsResource(News::findOrFail($id));
    });
});


Route::get('/', [HomeController::class, "index"]);

Route::resource("/news", NewsController::class)->middleware('auth')->only(["create", "edit", "update", "destroy"]);
Route::resource("/news", NewsController::class)->except(["create", "edit", "update", "destroy"]);

Route::get('/my_news', [NewsController::class, "myNews"])->middleware("auth");

Route::get('/account', [UserController::class, "account"])->middleware("auth");
Route::get('/change_password', [UserController::class, "changePassword"])->middleware("auth");
Route::post('/change_password', [UserController::class, "handleNewPassword"])->middleware("auth");

Route::middleware([IsAdmin::class, "auth"])->prefix("/admin")->group(function () {
    Route::get('/', [AdminPanelController::class, "index"]);
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/users', AdminUsersController::class)->except("show");
});

Route::get('/login', [LoginRegisterController::class, "login"])->middleware("guest")->name("login");
Route::post('/login', [LoginRegisterController::class, "authenticate"])->middleware("guest");
Route::post("/logout", [LoginRegisterController::class, "logout"])->middleware("auth");
Route::get("/register", [LoginRegisterController::class, "register"])->middleware("guest");
Route::post("/register", [LoginRegisterController::class, "store"])->middleware("guest");