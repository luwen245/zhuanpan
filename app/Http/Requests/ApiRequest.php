<?php

namespace App\Http\Requests;

class ApiRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [];

        if(action_name() == 'entry'){
            $rules = [
                'activity_id'=>'required',
                'user_id'=>'required'
            ];
        }

        if(action_name() == 'auth'){
            $rules = [
                'appid'=>'required',
                'user_id'=>'required',
            ];
        }

        if(action_name() == 'adminEntry'){
            $rules = [
                'platform_id'=>"required",
                'code'=>'required'
            ];
        }

        if(action_name() == 'prize' || action_name() == 'my' || action_name() == 'person' || action_name() == 'award'){
            $rules = [
                'activity_id'=>"required",
                'member_id'=>'required'
            ];
        }

        if(action_name() == 'baseInfo'){
            $rules = [
                'activity_id'=>"required",
                'member_id'=>'required'
            ];
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [];

        if(action_name() == 'entry'){
            $messages = [
                'activity_id.required'=>'缺少参数[activity_id]',
                'user_id.required'=>'缺少参数[user_id]',
            ];
        }

        if(action_name() == 'auth'){
            $messages = [
                'appid.required'=>'缺少参数[appid]',
                'user_id.required'=>'缺少参数[user_id]',
            ];
        }

        if(action_name() == 'adminEntry'){
            $messages = [
                'platform_id.required'=>'缺少参数[platform_id]',
                'code.required'=>'缺少参数[code]',
            ];
        }

        if(action_name() == 'prize' || action_name() == 'my' || action_name() == 'person' || action_name() == 'award'){
            $messages = [
                'activity_id.required'=>'缺少参数[activity_id]',
                'member_id.required'=>'缺少参数[member_id]',
            ];
        }

        if(action_name() == 'baseInfo'){
            $messages = [
                'activity_id.required'=>'缺少参数[activity_id]',
                'member_id.required'=>'缺少参数[member_id]',
            ];
        }


        return $messages;
    }

}
