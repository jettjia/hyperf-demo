<?php

declare(strict_types=1);


if (! function_exists('apiOk')) {
    function apiOk($data = [])
    {
        return [
            'code' => 0,
            'msg' => 'ok',
            'data' => $data,
        ];
    }
}


if (! function_exists('apiErr')) {
    function apiErr($message, $code = 1)
    {
        return [
            'code' => $code,
            'msg' => $message,
            'data' => [],
        ];
    }
}

if (! function_exists('objectToArray')){
    function objectToArray(&$object)
    {
        $object =  json_decode( json_encode( $object),true);
        return  $object;
    }
}
