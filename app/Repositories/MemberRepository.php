<?php

namespace App\Repositories;

use App\Models\Member;

class MemberRepository
{
    //同一个命名空间下可以直接调用
     use BaseTrait;
     protected  $model;

     public function __construct(Member $model)
     {
         $this->model = $model;
     }

     public function getMember($request)
     {
         $searchObj = $this->model->where(function ($search) use ($request)
         {
             //活动名称搜索
             $request->has('title') && $search->where('title','LIKE','%'.$request['title'].'%');
         });

         return $searchObj
             ->where(['activity_id'=>$request['activity_id']])
             ->select('id','nickname','avatar','times')
             ->orderBy('times','desc')
             ->paginate(5);
     }

     public function storeOrUpdate($activity_id,$request)
     {
          $member = $this->model->where([
              'activity_id'=>$activity_id,
              'openid'=>$request['openid']
          ])->first();

          if($member){
              $res = $member->update(array_merge($request->all(),['activity_id'=>$activity_id]));

              return $res?$member:FALSE;
          }else{
              $res = $this->model->create(array_merge($request->all(),['activity_id'=>$activity_id]));

              return $res?$res:FALSE;
          }
     }

}
