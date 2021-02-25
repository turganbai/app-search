<?php

use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;


Route::middleware('api')->get('/search', [HotelController::class, 'search']);
