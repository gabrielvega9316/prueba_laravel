<?php

namespace App;

class ApiResponse {

    static function getOk(string $key = null, $response = null){
        return response([
            'success' => true,
            $key => $response
        ], 200);
    }

    static function created(string $message){
        return response([
            'success' => true,
            'mesagge' => $message,
        ], 201);
    }

    static function badRequest(string $message){
        return response([
            'success' => false,
            'mesagge' => $message
        ], 400);
    }

    static function serverError($message = 'server error'){
        return response([
            'success' => false,
            'mesagge' => $message
        ], 500);
    }
}
