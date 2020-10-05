<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$namespacController = "\App\Http\Controllers\\";

Route::apiResource('/question',$namespacController.'QuestionController');