<?php

namespace App\Http\Requests;

class RecordRequest extends BaseRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(action_name() == 'index'){
            $rules = [
                'activity_id'=>'required',
            ];
        }

        return $rules;
    }

    public function messages()
    {
        if(action_name() == 'index'){
            $messages = [
                'activity_id.required'=>'缺少参数[activity_id]',
            ];
        }

        return $messages;
    }
}
