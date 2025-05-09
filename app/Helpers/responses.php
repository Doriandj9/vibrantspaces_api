<?php

if(!function_exists('response_success')){

    function response_success($data, $additional= []){

        $response = [
            'status' => true,
            'message' => 'OK',
            'data' => $data
        ];
        $result = array_merge($response,$additional);
        return response()
        ->json($result,200);
    }
}   

if(!function_exists('response_create')){

    function response_create($data, $additional = [], $message = null){

        $response = [
            'status' => true,
            'message' => $message ?? 'Resource created successfully.',
            'data' => $data
        ];
        $result = array_merge($response,$additional);
        return response()
        ->json($result,201);
    }
}   

if(!function_exists('response_update')){

    function response_update($data, $additional = []){

        $response = [
            'status' => true,
            'message' => 'Resource updated successfully.',
            'data' => $data
        ];
        $result = array_merge($response,$additional);
        return response()
        ->json($result,200);
    }
}

if(!function_exists('response_delete')){

    function response_delete($data, $additional = []){
        
        $response = [
            'status' => true,
            'message' => 'Resource deleted successfully.',
            'data' => $data
        ];
        $result = array_merge($response,$additional);
        return response()
        ->json($result,200);
    }
}

if(!function_exists('response_error')){

    function response_error($messages, $isErrorServe = true, $code=500, $additional = []){
        $response = [
            'status' => false,
            'message' => !$isErrorServe ? $messages : 'An error occurred on the server, please try again later.',
            '_error' => $messages
        ];
        $result = array_merge($response,$additional);
        return response()
        ->json($result,$code);
    }
}