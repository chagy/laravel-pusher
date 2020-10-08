<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (JWTException $exception,$request){
            return response(['error' => 'Token is not provided'],500);
        });

        $this->renderable(function(TokenBlacklistedException $exception,$request){
            return response(['error' => 'Token can not be used, get new one'],500);
        });

        $this->renderable(function(TokenInvalidException $exception,$request){
            return response(['error' => 'Token is invalid'],500);
        });

        $this->renderable(function(TokenExpiredException $exception,$request){
            return response(['error' => 'Token is expire'],500);
        });
    }

}
