<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}

use Symfony\Component\HttpKernel\Exception\HttpException;

// ...

// protected function renderHttpException(HttpException $e)
// {
//     if ($e->getStatusCode() === 403) {
//         return response()->view('errors.403', [], 403);
//     }

//     return $this->convertExceptionToResponse($e);
// }
