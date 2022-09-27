<?php

namespace App\Http\Controllers\API;

class ResponseFormatter
{
    protected static $response = [
        'meta' => [
            'code' => 200,
            'status' => 'success',
            'message' => 'null',

          ],
          'data' => null
        ];
    
    public static function success($data = null, $message = null)
    {
        // maksud message adalah untuk disimpan di protected static diatas
        //mengapa menggunakan *self* dari pada *$this->* karena disini memakai static
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        //Baris untuk data json
        return response()->json(self::response, self::$response['meta']['code']);
    }
    
    public static function error($data = null, $message = null, $code = 400)
    {
        //maksud response dibawah adalah untuk disimpan di protected static diatas
        //mengapa menggunakan *self* dari pada *$this->* karena disini memakai static
        self::$response['meta']['status'] = 'error';
        self::$response['meta']['code'] = $code;
        self::$response['meta']['message'] = $message;
        self::$response['meta']['data'] = $data;

        //Baris untuk data json
        return response()->json(self::response, self::$response['meta']['code']);
    }
}