<?php

namespace App\Exceptions;

use App\Helpers\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
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

    /**
     * Render the exception into an HTTP response.
     */
    public function render($request, Throwable $e)
    {
        if ($request->wantsJson()) {
            if ($e instanceof ValidationException) {
                return ApiResponse::fail($e->getMessage(), 422, errors: $e->errors());
            }

            if ($e instanceof ModelNotFoundException) {
                return ApiResponse::fail("Data not found.", 404);
            }
        }

        return parent::render($request, $e);
    }
}
