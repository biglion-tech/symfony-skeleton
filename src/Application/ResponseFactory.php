<?php

namespace App\Application;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ResponseFactory
 * @package App\Application
 */
class ResponseFactory
{
    /**
     * @param Request $request
     * @param array $data
     * @param int $code
     * @param bool $success
     * @param string $message
     * @param array $errors
     * @return Response
     */
    public static function create(
        Request $request,
        array $data,
        int $code = 200,
        bool $success = true,
        string $message = '',
        array $errors = []
    ): Response
    {
        $formats = $request->headers->get('content-type');

        switch ($formats) {
            default:
                $response = static::createJsonResponse($data, $code, $success, $message, $errors);
        }

        return $response;
    }

    /**
     * @param array $data
     * @param int $code
     * @param bool $success
     * @param string $message
     * @param array $errors
     * @return JsonResponse
     */
    protected static function createJsonResponse(
        array $data,
        int $code = 200,
        bool $success = true,
        string $message = '',
        array $errors = []
    ): JsonResponse
    {
        $response = [
            'success' => $success,
            'message' => $message,
            'errors' => $errors,
            'data' => $data,
        ];

        return new JsonResponse($response, $code);
    }
}