<?php

namespace App\Exceptions;

use Auth;
use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        try {
            if(! $e instanceof HttpException){

                // TODO: Send email
                return response()->view('errors.500', [
                    'extend' => (Auth::check() && Auth::user()->is_admin) ? 'admin.app' : 'app',
                    'exception' => $e
                ], 500);
            }
            
        }catch(Exception $new_exception) {
            return parent::render($request, $new_exception);
        }
        return parent::render($request, $e);
        
    }
}
