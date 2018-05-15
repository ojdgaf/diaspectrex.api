<?php

use Illuminate\Support\Facades\Response;
use InfyOm\Generator\Utils\ResponseUtil;

/**
 * Create and send successful JSON response through HTTP.
 *
 * @param mixed $result
 * @param string $message
 * @return void
 */
if (! function_exists('sendResponse')) {
    function sendResponse($result, string $message = 'ok')
    {
        Response::json(
            ResponseUtil::makeResponse($message, $result)
        )->throwResponse();
    }
}

/**
 * Create and send unsuccessful JSON response through HTTP.
 *
 * @param string $message
 * @param array $errors
 * @param int $code
 * @return void
 */
if (! function_exists('sendError')) {
    function sendError(string $message, array $errors = [], $code = 404)
    {
        Response::json(
            ResponseUtil::makeError($message, $errors),
            $code
        )->throwResponse();
    }
}