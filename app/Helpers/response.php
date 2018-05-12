<?php

use Illuminate\Support\Facades\Response;
use InfyOm\Generator\Utils\ResponseUtil;

/**
 * Create and send successful JSON response through HTTP.
 *
 * @param mixed $result
 * @param string $message
 * @return \Illuminate\Http\JsonResponse
 */
if (! function_exists('sendResponse')) {
    function sendResponse($result, string $message = 'ok')
    {
        return Response::json(
            ResponseUtil::makeResponse($message, $result)
        )->send();
    }
}

/**
 * Create and send unsuccessful JSON response through HTTP.
 *
 * @param string $message
 * @param array $errors
 * @param int $code
 * @return \Illuminate\Http\JsonResponse
 */
if (! function_exists('sendError')) {
    function sendError(string $message, array $errors = [], $code = 404)
    {
        return Response::json(
            ResponseUtil::makeError($message, $errors),
            $code
        )->send();
    }
}