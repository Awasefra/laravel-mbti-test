<?php

namespace App\Helpers;

use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use BadMethodCallException;

class ErrorHandler
{
    public static function handle(Exception $exception)
    {
        // Handling Model Not Found
        if ($exception instanceof ModelNotFoundException) {
            return [
                'message' => 'Resource not found',
                'code' => 404
            ];
        }

        // Handling Query Exception
        if ($exception instanceof QueryException) {
            return [
                'message' => 'Database query error',
                'code' => 500
            ];
        }

        // Handling Not Found HTTP Exception
        if ($exception instanceof MethodNotAllowedHttpException) {
            return [
                'message' => 'Method not allowed',
                'code' => 404
            ];
        }

        // Handling Authentication Exception
        if ($exception instanceof AuthenticationException) {
            return [
                'message' => 'Access Denied : Unauthenticated',
                'code' => 403
            ];
        }

        // Handling Authorization Exception
        if ($exception instanceof AuthorizationException) {
            return [
                'message' => 'This action is unauthorized.',
                'code' => 403
            ];
        }

        // Handling Bad Method Call (non-existing relationship)
        if ($exception instanceof BadMethodCallException || strpos($exception->getMessage(), 'Call to undefined relationship') !== false) {
            return [
                'message' => 'Invalid relationship method or relationship does not exist.',
                'code' => 400
            ];
        }

        if ($exception instanceof BadMethodCallException || strpos($exception->getMessage(), 'Call to undefined method') !== false) {
            return [
                'message' => 'Undefined method called.',
                'code' => 400
            ];
        }

        // Handling Other Errors
        return [
            'message' => $exception->getMessage(),
            'code' => 500
        ];
    }
}
