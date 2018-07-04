<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    //同一个命名空间下可以直接调用
     use BaseTrait;
     protected  $model;

     public function __construct(User $model)
     {
         $this->model = $model;
     }

     public function storeOrUpdate($data)
     {
         $user = $this->model->where(['user_id'=>$data['user_id']])->first();

         if($user){
             $res = $user->update($data);

             return $res?TRUE:FALSE;
         }else{
             $res = $this->model->create($data);

             return $res?TRUE:FALSE;
         }
     }
}
