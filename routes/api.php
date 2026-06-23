<?php

use App\Http\Controllers\Api\PostApiController;
use Illuminate\Support\Facades\Route;

Route::post('/posts', [PostApiController::class, 'store'])->middleware('auth:sanctum');
