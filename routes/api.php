<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\CategoryController;

$namespacController = "\App\Http\Controllers\\";

Route::apiResource('/question',$namespacController.'QuestionController');
Route::apiResource('/category',CategoryController::class);
Route::apiResource('/question/{question}/reply',ReplyController::class);

Route::post('/like/{reply}',[LikeController::class,'likeIt']);
Route::delete('/like/{reply}',[LikeController::class,'unLikeIt']);