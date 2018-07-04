<?php

namespace App\Http\Requests;

class AwardRequest extends BaseRequest
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
        $rules = [];

        if(action_name() == 'index' || action_name() == 'record'){
            $rules = [
                'activity_id'=>"required",
            ];
        }

        if(action_name() == 'my' ){
            $rules = [
                'activity_id'=>"required",
                'member_id'=>'required'
            ];
        }

        if(action_name() == 'cash'){
            $rules = [
                'id'=>'required',
                'code'=>'required',
            ];
        }

        if(action_name() == 'store'){
            $rules = [
                'activity_id'=>"required",
                'prize_name'=>"required",
                'prize_level'=>"required",
                'percent'=>"required",
                'prize_pic'=>"required",
                'sku_show'=>"required",
                'mwtimes'=>"required",
                'type'=>"required",
                'sku'=>'required',
                'is_winned'=>"required",
                'notice'=>"required",
                'is_fixed'=>"required",
            ];
        }

        if(action_name() == 'update'){
            $rules = [
                'activity_id'=>"required",
                'prize_name'=>"required",
                'prize_level'=>"required",
                'percent'=>"required",
                'prize_pic'=>"required",
                'sku_show'=>"required",
                'mwtimes'=>"required",
                'type'=>"required",
                'is_winned'=>"required",
                'notice'=>"required",
                'is_fixed'=>"required",
            ];
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [];


        if(action_name() == 'index' || action_name() == 'record'){
            $messages = [
                'activity_id.required'=>'缺少参数[activity_id]',
            ];
        }

        if(action_name() == 'my'){
            $messages = [
                'activity_id.required'=>'缺少参数[activity_id]',
                'member_id.required'=>'缺少参数[member_id]',
            ];
        }

        if(action_name() == 'cash'){
            $messages = [
                'id.required'=>'缺少参数[id]',
                'code.required'=>'请填写兑奖码！',
            ];
        }

        if(action_name() == 'store'){
            $messages = [
                'activity_id.required'=>'缺少参数[activity_id]',
                'prize_name.required'=>'请填写奖品名称！',
                'prize_level.required'=>'请填写奖品等级',
                'percent.required'=>'请填写中奖概率',
                'prize_pic.required'=>'请上传中奖图片',
                'sku_show.required'=>'请选择是否显示数量',
                'mwtimes.required'=>'请填写每天最多出奖数',
                'is_winned.required'=>'请选择是否出奖',
                'type.required'=>'请填写兑奖方式',
                'address.required'=>'请填写兑奖地址',
                'is_fixed.required'=>'请选择时间是否固定',
                'notice.required'=>'请填写兑奖须知',
                'sku.required'=>'请填写奖品数量'
            ];
        }

        return $messages;
    }
}
