<?php

use App\Http\ApiV1\Modules\Auth\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', [AuthController::class, 'login'])->withoutMiddleware(['auth']);
Route::get('home', [AuthController::class, 'home']);
