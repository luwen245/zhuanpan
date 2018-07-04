<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    //失败返回
    protected function error($message = '')
    {
        $msg['code'] = 1;
        $msg['msg'] = $message;

        return response()->json($msg,200);
    }

    //返回正确的请求
    protected function success($message = '', $data = [])
    {
        $msg['code'] = 0;
        $msg['msg'] = $message;
        $msg['data'] = $data;

        return response()->json($msg,200);
    }
}
