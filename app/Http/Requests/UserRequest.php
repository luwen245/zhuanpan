<?php

namespace App\Http\Requests;

class UserRequest extends BaseRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];

      if(action_name() == 'members'){
            $rules['activity_id'] = 'required';
        }

        if(action_name() == 'auth'){
            $rules['user_id'] = ['required'];
            $rules['appid'] = ['required'];
        }

        return $rules;
    }

    public function messages ()
    {
        $messages = [];

        if(action_name() == 'members'){
            $messages['activity_id.required'] = '缺少参数[activity_id]!';
        }

        if(action_name() == 'auth'){
            $messages['user_id.required'] = '缺少参数[user_id]';
            $messages['appid.required'] = '缺少参数[appid]';
        }

        return $messages;
    }
}
