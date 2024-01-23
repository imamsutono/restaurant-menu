<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    /**
     * Return success response.
     */
    public static function success($data = null, string $message = null)
    {
        return self::formatResponse('success', $data, $message, 200);
    }

    /**
     * Return failed response due to invalid data provided by the user.
     */
    public static function fail(string $message = null, int $statusCode = 400, $data = null, ?array $errors = [])
    {
        return self::formatResponse('fail', $data, $message, $statusCode, $errors);
    }

    /**
     * Return error response due to an error on the server.
     */
    public static function error(string $message = null, int $statusCode = 500, $data = null)
    {
        return self::formatResponse('error', $data, $message, $statusCode);
    }

    /**
     * Return JSON response in the JSend format.
     * Ref: https://github.com/omniti-labs/jsend
     */
    private static function formatResponse(string $status, $data = null, string $message = null, int $statusCode = 200, ?array $errors = []): JsonResponse
    {
        $responseBody = [
            'status'  => $status,
            'data'    => $data,
            'message' => $message
        ];

        if ($status === 'fail') {
            $responseBody['errors'] = $errors;
        }

        return response()->json($responseBody, $statusCode);
    }
}
