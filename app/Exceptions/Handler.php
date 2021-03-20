<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

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
        'current_password',
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
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function(Exception $e, $request) {
          return $this->handleException($request, $e);
        });

        $this->renderable(function (ValidationException $e, $request) {
          if ($request->expectsJson()) {
             return response('Sorry, validation failed.', 422);
          }
      });
      
    }
    public function handleException($request, Exception $exception)
    {
        if($exception instanceof RouteNotFoundException) {
           return response('Essa url não foi encontrada.', 404);
        }
    }
}
