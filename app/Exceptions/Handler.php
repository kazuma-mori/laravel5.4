<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // エラーが発生した場合、任意のエラーページを表示する。
        switch (true) {
            case ($exception instanceof \PDOException): return response()->view('errors.500'); break;
            case ($exception instanceof \ModelNotFoundException): return response()->view('errors.404'); break;
            case ($exception instanceof \Illuminate\Session\TokenMismatchException): return response()->view('errors.400'); break;

            case ($this->isHttpException($exception)):
                switch ($exception->getStatusCode()) {
                    case 400: return response()->view('errors.400'); break;
                    case 404: return response()->view('errors.404'); break;
                    case 405: return response()->view('errors.404'); break;

                    default: break;
                }
                break;

            default: break;
        }

        // 上記に該当しないエラーはLaravel標準の処理を行う。
        return parent::render($request, $exception);
    }


    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('login'));
    }
}
