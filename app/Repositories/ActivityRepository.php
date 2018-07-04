<?php

namespace App\Repositories;


use App\Models\Activity;
use App\Services\QiniuService;

class ActivityRepository
{
    //同一个命名空间下可以直接调用
     use BaseTrait;
     protected  $model;
     protected $service;

     public function __construct(Activity $model,QiniuService $service)
     {
         $this->model = $model;
         $this->service = $service;
     }

     public function getData($request)
     {
         $searchObj = $this->model->where(function ($search) use ($request)
         {
             //活动名称搜索
             $request->has('title') && $search->where('title','LIKE','%'.$request['title'].'%');
         });

         return $searchObj
             ->where(['user_id'=>$request['user_id']])
             ->select('id','title','created_at','updated_at','status','pnumber','real_pnumber','url','started_at','ended_at')
             ->paginate(5);
     }

     public function storeActivity($request)
     {
        $activity = $this->model->create($request->all());

        if($activity){
            $qrcode_url = config('config.domain').'/api/v1/entry?activity_id='.getEncryptStr($activity->id).'&user_id='.getEncryptStr($activity->user_id);

            $url = 'qrcode/'.sha1(microtime()).'.png';

            \SimpleSoftwareIO\QrCode\Facades\QrCode::format('png')
                ->size(400)
                ->encoding('UTF-8')
                ->generate($qrcode_url,public_path($url));

            $data = $this->service->reqrcode($url);
            if($data['code'] == 1){
                @unlink($url);
                $activity->update(['qrcode_url'=>$qrcode_url]);
                $activity->update(['url'=>$data['url']]);

                return ['code'=>0,'msg'=>$activity];
            }else{
                return ['code'=>1,'msg'=>$data['msg']];
            }
        }else{
            return ['code'=>1,'msg'=>'添加失败！'];
        }
     }


    public function getActivity($activity_id)
    {
        return $this->model
            ->select('id','started_at','ended_at','desc')
            ->where('id',$activity_id)
            ->first();
    }

}
