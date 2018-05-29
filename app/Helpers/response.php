<?php

/**
 * Create and send successful JSON response through HTTP.
 *
 * @param mixed $result
 * @param string $message
 * @return void
 */
if (! function_exists('sendResponse')) {
    function sendResponse($result, string $message = null)
    {
        $response = ['data' => $result];

        if ($message)
            $response['message'] = $message;

        Response::json($response)->throwResponse();
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
        $response = ['message' => $message];

        if (! empty($errors))
            $response['data'] = $errors;

        Response::json($response, $code)->throwResponse();
    }
}