<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Yannice92\LumenInterceptor\Exceptions\BaseHandler;

class Handler extends BaseHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param \Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception $exception
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws Exception
     */
    public function render($request, Exception $exception)
    {
        dd($exception);
        $message = 'Maaf terjadi kesalahan pada sistem.';
        $rendered = parent::render($request, $exception);
        if ($exception instanceof BaseException) {
            return $exception->jsonErrorResponse();
        } elseif ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'status' => false,
                'code' => $exception->getStatusCode(),
                'message' => null,
                'errorMessage' => __("message.MethodNotAllowedHttpException"),
                'data' => null
            ], $exception->getStatusCode());
        } elseif ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'status' => false,
                'code' => $exception->getStatusCode(),
                'message' => null,
                'errorMessage' => __("message.MethodNotAllowedHttpException"),
                'data' => null
            ], $exception->getStatusCode());
        } elseif ($exception instanceof ValidationException) {
            return $rendered;
        } elseif ($exception instanceof GuzzleException) {
            return $exception->jsonErrorResponse();
        } elseif ($exception instanceof QueryException) {
            $code = 'ERR98';
            return response()->json([
                'status' => false,
                'code' => $code,
                'message' => null,
                'errorMessage' => $exception->getMessage(),
                'data' => null
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        } elseif ($exception instanceof \ErrorException) {
            if (env('APP_DEBUG', false)) {
                $message = $exception->getMessage();
            }
            $code = '500';
            return response()->json([
                'status' => false,
                'code' => $code,
                'message' => null,
                'errorMessage' => $message,
                'data' => null
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        } else {
            $code = 'ERR98';
            return response()->json([
                'status' => false,
                'code' => $code,
                'message' => null,
                'errorMessage' => $message,
                'data' => null
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
