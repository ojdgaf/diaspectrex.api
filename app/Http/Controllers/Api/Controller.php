<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use InfyOm\Generator\Utils\ResponseUtil;
use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @param mixed $result
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($result, string $message = 'ok')
    {
        return Response::json(
            ResponseUtil::makeResponse($message, $result)
        )->send();
    }

    /**
     * @param string $message
     * @param array $errors
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError(string $message, array $errors = [], $code = 404)
    {
        return Response::json(
            ResponseUtil::makeError($message, $errors),
            $code
        )->send();
    }
}
