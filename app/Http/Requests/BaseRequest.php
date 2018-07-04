<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    /**
     * @param array $errors
     * @return $this|\Symfony\Component\HttpFoundation\Response
     */
    public function response (array $errors)
    {
        $errors = array_values($errors)[0];

        $data = [
            'code'=>1,
            'msg'=>$errors[0],
        ];

        return parent::response($data)->setStatusCode(200);
    }

    public function expectsJson()
    {
        return true;
    }
}
