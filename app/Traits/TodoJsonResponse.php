<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait TodoJsonResponse {

    /**
     * Custom JSON response for Todo actions.
     * 
     * @param string $message
     * @param Response::HTTP_OK|Response::HTTP_INTERNAL_SERVER_ERROR $status
     * @param boolean $is_success
     * 
     * @\Illuminate\Http\JsonResponse
     */
    public function custom_response($message, $status_code, $is_success = true) {
        return response()->json([
            'success' => $is_success,
            'message' => $message
        ], $status_code);
    }

    /**
     * Custom JSON Success response for Todo actions.
     * 
     * @param string $message
     * @param Response::HTTP_OK|Response::HTTP_INTERNAL_SERVER_ERROR $status
     * 
     * @\Illuminate\Http\JsonResponse
     */
    public function success($message) {
        return $this->custom_response($message, Response::HTTP_OK);
    }

    /**
     * Custom JSON Error response for Todo actions.
     * 
     * @param string $message
     * @param Response::HTTP_OK|Response::HTTP_INTERNAL_SERVER_ERROR $status
     * @param boolean $is_success
     * 
     * @\Illuminate\Http\JsonResponse
     */
    public function error($message) {
        return $this->custom_response($message, Response::HTTP_INTERNAL_SERVER_ERROR, false);
    }
    
}