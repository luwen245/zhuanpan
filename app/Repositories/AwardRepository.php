<?php

namespace App\Repositories;

use App\Models\Award;

class AwardRepository
{
    //同一个命名空间下可以直接调用
     use BaseTrait;
     protected  $model;

     public function __construct(Award $model)
     {
         $this->model = $model;
     }

     public function getRecord($request)
     {
         $searchObj = $this->model->where(function ($search) use ($request)
         {
             //活动名称搜索
             $request->has('title') && $search->where('title','LIKE','%'.$request['title'].'%');
         });

         return $searchObj
             ->where(['activity_id'=>$request['activity_id']])
             ->paginate(5);
     }

     public function deleteAwards($activity_id)
     {
        return $this->model
            ->where(['activity_id'=>$activity_id])
            ->delete();
     }

     public function getAward($activity_id)
     {
         return $this->model
             ->where('activity_id',$activity_id)
             ->where('sku','>',0)
             ->get();
     }


     public function countPercent($activity_id)
     {
         return $this->model
             ->where(['activity_id'=>$activity_id])
             ->sum('percent');
     }

    public function countPercentWithoutSelf($activity_id,$id)
    {
        return $this->model
            ->where(['activity_id'=>$activity_id])
            ->where('id', '<>', $id)
            ->sum('percent');
     }

    public function getPrizeLevel($activity_id)
    {
        return $this->model
            ->select('id','prize_level')
            ->where('activity_id',$activity_id)
            ->get();
    }
}
