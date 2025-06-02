<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use jeremykenedy\LaravelRoles\App\Exceptions\LevelDeniedException;
use jeremykenedy\LaravelRoles\App\Exceptions\PermissionDeniedException;
use jeremykenedy\LaravelRoles\App\Exceptions\RoleDeniedException;
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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Exception $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Throwable $exception)
    {

        $userLevelCheck = $exception instanceof RoleDeniedException ||
            $exception instanceof PermissionDeniedException ||
            $exception instanceof LevelDeniedException;

        if ($userLevelCheck) {

            if ($request->expectsJson()) {
                return Response::json(array(
                    'error' => 403,
                    'message' => 'Unauthorized.'
                ), 403);
            }

            return redirect('/');
        }

        if ($exception instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException) {
            return response()->json([
                'success' => false,
                'message' => 'Token is expired'
            ], 233);
        }
        if ($exception instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid token'
            ], 233);
        }
        if ($exception instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
            return response()->json([
                'success' => false,
                'message' => 'Token expired'
            ], 233);
        }

        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid method called, it does not exists'
            ], 233);
        }

        return parent::render($request, $exception);
    }
}
