<?php

namespace App\Repositories;

use App\Models\Business;

class BusinessRepository
{
    //同一个命名空间下可以直接调用
     use BaseTrait;
     protected  $model;

     public function __construct(Business $model)
     {
         $this->model = $model;
     }

     public function storeOrUpdate($id,$request)
     {
         $business = $this->model->where(['activity_id'=>$id])->first();

         if($business){
            $res = $business->update($request);
         }else{
            $res = $this->model->create(array_merge($request->all(),['activity_id'=>$id]));
         }

         return $res;
     }
}
