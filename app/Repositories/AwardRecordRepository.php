<?php

namespace App\Repositories;

use App\Models\AwardRecord;

class AwardRecordRepository
{
    //同一个命名空间下可以直接调用
     use BaseTrait;
     protected  $model;

     public function __construct(AwardRecord $model)
     {
         $this->model = $model;
     }

    public function getAwardRecord($request)
    {
        return $this->model
            ->where('member_id',getDecryptStr($request['member_id']))
            ->where('activity_id',getDecryptStr($request['activity_id']))
            ->select('id','award_id','member_id','code','is_checked')
            ->paginate(5);
    }

    public function getAward($request)
    {
        $searchObj = $this->model->where(function ($search) use ($request)
        {
            //兑奖状况
            $request->has('is_checked') && $search->where('is_checked',$request['is_checked']);
        });

        $searchObj = $searchObj ->whereHas('award', function ($search) use ($request){
            $request->has('prize_level') && $search->where('prize_level',$request['prize_level']);
        });

        $searchObj = $searchObj ->whereHas('member', function ($search) use ($request){
            //手机号
            $request->has('mobile') && $search->where('mobile',$request['mobile']);
            //用户名
            $request->has('name') && $search->where('name','LIKE','%'.$request['name'].'%');
        });

        return $searchObj
            ->select('id','award_id','member_id','code','created_at','is_checked')
            ->where('activity_id',$request['activity_id'])
            ->paginate(5);
    }

    public function getActivityAwardRecord($activity_id)
    {
        return $this->model
            ->select('id','member_id','activity_id','award_id','created_at')
            ->orderBy('created_at','desc')
            ->where('activity_id',$activity_id)
            ->get();
    }
}
