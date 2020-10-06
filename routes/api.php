<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

$namespacController = "\App\Http\Controllers\\";

Route::apiResource('/question',$namespacController.'QuestionController');
Route::apiResource('/category',CategoryController::class);