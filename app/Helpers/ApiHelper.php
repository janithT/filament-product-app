<?php

// Common helper API response function
function apiResponseWithStatusCode($data, $status, $message, $user, $statusCode)
{
    $response = [];
    $response['status'] = $status;
    $response['message'] = $message;
    if ($user) {
        $response['user'] = $user;
    }
    $response['data'] = $data;
    return  response()->json($response, $statusCode);
}