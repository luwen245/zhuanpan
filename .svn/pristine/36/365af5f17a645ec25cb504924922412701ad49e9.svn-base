<?php

namespace App\Http\Requests;

class ActivityRequest extends BaseRequest
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

        if(action_name() == 'index'){
            $rules = [
                'user_id'=>"required"
            ];
        }

        if(action_name() == 'award'){
            $rules = [
                'id'=>"required"
            ];
        }

        if(action_name() == 'desc'){
            $rules = [
                'activity_id'=>"required"
            ];
        }

        if(action_name() == 'rule'){
            $rules = [
                'is_limited'=>"required",
                'e_etimes'=>"required",
                'e_wtimes'=>"required",
                'e_ewtimes'=>"required",
            ];
        }

        if(action_name() == 'store'  || action_name() == 'update'){
            $rules = [
                'user_id'=>"required",
                'title'=>'required',
                'started_at'=>'required',
                'ended_at'=>'required',
                'share_pic'=>'required',
                'is_follow'=>"required",
                'is_show'=>"required",
                'is_broadcast'=>"required",
                'remark'=>"required"
            ];
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [];

        if(action_name() == 'index'){
            $messages = [
               'user_id.required'=>'缺少参数[user_id]'
            ];
        }

        if(action_name() == 'award'){
            $messages = [
                'id.required'=>'缺少参数[id]'
            ];
        }

        if(action_name() == 'desc'){
            $messages = [
                'activity_id.required'=>'缺少参数[activity_id]'
            ];
        }

        if(action_name() == 'rule'){
            $messages = [
                'is_limited.required'=>'缺少参数[is_limited]',
                'e_etimes.required'=>'请填写每人每天参与次数！',
                'e_wtimes.required'=>'请填写每人总共中奖次数！',
                'e_ewtimes.required'=>'请填写每人每天中奖次数！',
            ];
        }

        if(action_name() == 'store' || action_name() == 'update'){
            $messages = [
                'user_id.required'=>'缺少参数[user_id]',
                'title.required'=>'请填写活动名称',
                'started_at.required'=>'请填写开始时间',
                'ended_at.required'=>'请填写结束时间',
                'share_pic.required'=>'请上传朋友圈分享图片',
                'is_follow.required'=>'缺少参数[is_follow]',
                'is_show.required'=>'缺少参数[is_show]',
                'is_broadcast.required'=>'缺少参数[is_broadcast]',
                'remark.required'=>'请填写分享描述！',
            ];
        }

        return $messages;
    }

}
