<?php


if(!function_exists('http_res_error')){
    function http_res_error(\Throwable $error, array $additional = []){
        return response_error($error->getMessage() . ' in '. $error->getFile() . ' : ' . $error->getLine(), additional: $additional);
    }
}

