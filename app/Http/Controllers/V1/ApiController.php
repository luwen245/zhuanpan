<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\BaseController;
use App\Http\Requests\ApiRequest;
use App\Repositories\ActivityRepository;
use App\Repositories\AwardNumberRepository;
use App\Repositories\AwardRecordRepository;
use App\Repositories\AwardRepository;
use App\Repositories\BusinessRepository;
use App\Repositories\MemberRepository;
use App\Repositories\UserRepository;
use App\Services\ApiService;
use App\Services\DrawService;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends BaseController
{
    protected $memberRepository;
    protected $awardRepository;
    protected $activityRepository;

    public function __construct(MemberRepository $memberRepository,AwardRepository $awardRepository,ActivityRepository $activityRepository)
    {
        $this->memberRepository = $memberRepository;
        $this->awardRepository = $awardRepository;
        $this->activityRepository = $activityRepository;
    }

    //入口 后台入口操作 code platform_id => user_id user表
    public function adminEntry(Request $request,ApiService $service,UserRepository $userRepository)
    {
        $validator = \Validator::make($request->all(), [
            'platform_id' => 'required',
            'activity_id'=>'required'
        ], [
            'platform_id.required' => '缺少参数[platform_id]',
            'activity_id.required' => '缺少参数[activity_id]'
        ]);

        if ($validator->fails()) {
            return view('error',['msg'=>$validator->messages()->first()]);
        }else{
            $data = [
                'platform_id'=>$request['platform_id'],
                'secret'=> '67f9e91c4e0366045af7f29ea5516a91e0cf9064',
                'code'=> $request['code']
            ];
            
            $res = $service->getToken($data);
            if($res['code'] == 0) {
                $user = $service->getUser($res['data']['access_token'],$data);

                if($user['code'] == 0){
                    $result = $userRepository->storeOrUpdate([
                        'nickname'=>$user['data']['nickname'],
                        'username'=>$user['data']['username'],
                        'user_id'=>$user['data']['id'],
                        'avatar'=>$user['data']['avatar'],
                        'platform_id'=>$user['data']['platform_id'],
                    ]);

                    if($result){
                        $url = config('config.domain').'/#/admin?user_id='.$user['data']['id'];

                        return redirect($url);
                    }else{
                        return view('error',['msg'=>'添加失败！']);
                    }
                }else{
                    return view('error',['msg'=>$res['msg']]);
                }
            }else{
                //接口报错
                return view('error',['msg'=>$res['msg']]);
            }
        }
    }

    //获取该页面基础信息
    //activity_id member_id
    //1. status 1001 活动未开始  1002 活动开始中   1003 活动结束 加载 1010 报错
    /**
     * @api {post} /api/v1/baseInfo 获取基础信息(入口接口)
     * @apiDescription 获取基础信息(入口接口)
     * @apiGroup Api
     * @apiPermission none
     * @apiParam  activity_id   活动id
     * @apiParam  member_id   用户id
     * @apiVersion 0.1.0
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 200 OK
     * {
     * }
     */
    public function baseInfo(ApiRequest $request,AwardNumberRepository $awardNumberRepository,BusinessRepository $businessRepository)
    {
        $activity_id = getDecryptStr($request['activity_id']);
        $member_id = getDecryptStr($request['member_id']);
        $business = $businessRepository->getByWhereFirst(['activity_id'=>$activity_id]);
        if($business){
            if($business->loading_show == 1){
                $loading = ['loading_show'=>1, 'loading_pic'=>$business->loading_pic];
            }else{
                $loading = ['loading_show'=>0];
            }
            $activity = $this->activityRepository->getById($activity_id);
            if($activity){
                $awards = $this->awardRepository->getByWhere(['activity_id'=>$activity_id]);
                $data = array_merge($loading,['awards'=>$awards]);
                $data['business'] = $activity->bgm;
                $data['is_broadcast'] = $activity->is_broadcast;
                switch (change_status($activity))
                {
                    case 0: //未发布
                        return $this->success('获取成功',['status'=>1010,'msg'=>'该活动暂未发布！']);
                        break;
                    case 2: //未开始
                        $data['pnumber'] = 0;
                        $data['e_etimes'] = 0;

                        return $this->success('获取成功',['status'=>1001,'msg'=>'活动暂未开始！','data'=>$data]);
                        break;
                    case 3: //进行中
                        //是否显示真实数据
                        if($activity->is_show == 1){
                            $data['pnumber'] = $activity->pnumber;
                        }else{
                            $data['pnumber'] = $activity->real_pnumber;
                        }
                        //每次次数
                        $awardNumber = $awardNumberRepository->getByWhereFirst([
                            'member_id'=>$member_id,
                            'activity_id'=>$activity_id,
                            'today'=>date('Y-m-d')
                        ]);

                        if($awardNumber){
                            $data['e_etimes'] = $awardNumber->e_etimes;
                        }else{
                            $data['e_etimes'] = $activity->e_etimes;
                        }
                        return $this->success('获取成功',['status'=>1002,'msg'=>'活动正在进行中！','data'=>$data]);
                        break;
                    case 4://已结束
                        if($activity->is_show == 1){
                            $data['pnumber'] = $activity->pnumber;
                        }else{
                            $data['pnumber'] = $activity->real_pnumber;
                        }

                        $data['e_etimes'] = 0;
                        return $this->success('获取成功',['status'=>1003,'msg'=>'活动已经结束！','data'=>$data]);
                        break;
                    default:
                        return $this->success('获取成功',['status'=>1010,'msg'=>'系统错误！']);
                        break;
                }
            }else{
                return $this->success('操作成功',['status'=>1010,'msg'=>'该活动不存在！']);
            }
        }else{
            return $this->success('操作成功',['status'=>1010,'msg'=>'该活动商家未设置！']);
        }
    }

    //前端入口 activity_id openid 网页授权
    public function entry(Request $request,UserRepository $userRepository)
    {
        $validator = \Validator::make($request->all(), [
            'user_id' => 'required',
            'activity_id'=>'required'
        ], [
            'user_id.required' => '缺少参数[user_id]',
            'activity_id.required' => '缺少参数[activity_id]'
        ]);

        if ($validator->fails()) {
            return view('error_mobile',['msg'=>$validator->messages()->first()]);
        }else{
            $user = $userRepository->getByWhereFirst(['user_id'=>getDecryptStr($request['user_id'])]);
            if($user){
                if($user->appid){
                    //授权操作 activity_id
                    $return_url = config('config.domain').'/api/v1/callback/'.$request['activity_id'];

                    $url = config('config.domain').'/oauth/mp/'.$user->appid.'/userinfo?return_url='.$return_url;

                    return redirect($url);
                }else{
                    return view('error_mobile',['msg'=>'该平台暂未授权！']);
                }
            }else{
                return view('error_mobile',['msg'=>'该用户不存在！']);
            }
        }
    }

    //回调地址
    public function callback($activity_id,Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nickname' => 'required',
            'avatar' => 'required',
            'openid' => 'required',
        ], [
            'nickname.required' => '缺少参数[nickname]',
            'avatar.required' => '缺少参数[avatar]',
            'openid.required' => '缺少参数[openid]',
        ]);

        if ($validator->fails()) {
            return view('error',['msg'=>$validator->messages()->first()]);
        }else{
           $res = $this->memberRepository->storeOrUpdate(getDecryptStr($activity_id),$request);
           if($res){
               $url = config('config.domain').'/#/home?activity_id='.$request['activity_id'].'&member_id='.getEncryptStr($res->id);
               return redirect($url);
           }else{
               return view('error',['msg'=>'操作失败']);
           }
        }
    }

    //获奖信息查询 activity_id 并发考虑
    /**
     * @api {post} /api/v1/prize 抽奖
     * @apiDescription 抽奖
     * @apiGroup Api
     * @apiPermission none
     * @apiParam  activity_id   活动id
     * @apiParam  member_id   用户id
     * @apiVersion 0.1.0
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 200 OK
     * {
     * }
     */
    public function prize(ApiRequest $request,AwardRecordRepository $awardRecordRepository,AwardNumberRepository $awardNumberRepository,DrawService $service)
    {
        //activity_id member_id  1004中奖  1005未中奖 参与人数的增加问题 pnumber real_pnumber
        //$awards = $awardRepository->getByWhere(['activity_id'=>$request['activity_id']]);
        //是否存在改活动  限制抽奖  总抽奖数  每日抽奖--表
        //记录抽奖次数的表 id openid etimes atimes today activity_id
        //中奖表 id openid award_id is_received code created_at updated_at
        //查询算法 逻辑算法
        //查询该用户是否有抽奖的权限
     try {
        $activity_id = getDecryptStr($request['activity_id']);
        $member_id = getDecryptStr($request['member_id']);
        $awardNumber = $awardNumberRepository->getByWhereFirst([
            'member_id'=>$member_id,
            'today'=>date('Y-m-d'),
            'activity_id'=>$activity_id
        ]);
        if($awardNumber){
            if($awardNumber->e_etimes > 0 ){
                if(($awardNumber->is_limited == 1) && $awardNumber->e_atimes == 0){
                   return $this->error('您总抽奖的次数已经用完！');
                }
                //抽奖 如果该奖品抽完就没了 就从数组里面提出掉 就行了 format_award
                $awards = $this->awardRepository->getAward($activity_id);
                $awards = format_award($awards);
                $gift = $service->getGift($awards); //未中奖的概率
                $member = $this->memberRepository->getById($member_id);
                $member->increment('times');
                if(TRUE == $gift['status']) {
                    //减少库存
                    $award = $this->awardRepository->getById($gift['award_id']);
                    $award->decrement('sku');
                    $res = $awardRecordRepository->store([
                        'member_id'=>$member_id,
                        'award_id'=>$award->id,
                        'activity_id'=>$activity_id
                    ]);
                    if($res){
                        $res->update(['code'=>getEncryptStr($res->id)]);
                        $awardNumber->decrement('e_etimes');
                        return $this->success('操作成功！',['status'=>1004,'msg'=>'您已经中奖','data'=>$gift]);
                    }else{
                        return $this->error('抽奖记录表记录添加失败！');
                    }
                }else{
                    $awardNumber->decrement('e_etimes');
                    return $this->success('操作成功！',['status'=>1005,'msg'=>'您未中奖！']);
                }
            }else{
                return $this->error('您今日抽奖的次数已经用完！');
            }
        }else{
            $activity = $this->activityRepository->getById($activity_id);
            if($activity){  //每人每日次数 每个活动总次数
                $result = $awardNumberRepository->store([
                    'member_id'=>$member_id,
                    'e_etimes'=>$activity->e_etimes,
                    'e_atimes'=>$activity->e_atimes,
                    'today'=> date('Y-m-d'),
                    'activity_id'=>$activity_id,
                    'is_limited'=>$activity->is_limited
                ]);
                //实际参加人数
                $activity->increment('pnumber');
                $activity->increment('real_pnumber');
                if($result){
                    //添加记录成功之后 抽奖
                    $awards = $this->awardRepository->getAward($activity_id);
                    $awards = format_award($awards);
                    $gift = $service->getGift($awards);
                    $member = $this->memberRepository->getById($member_id);
                    $member->increment('times');

                    if(TRUE == $gift['status']){
                        //减少库存
                        $award = $this->awardRepository->getById($gift['award_id']);
                        $award->decrement('sku');
                        $res = $awardRecordRepository->store([
                            'member_id'=>$member_id,
                            'award_id'=>$award->id,
                            'activity_id'=>$activity_id
                        ]);
                        if($res){
                            $res->update(['code'=>getEncryptStr($res->id)]);
                            $result->decrement('e_etimes');

                            return $this->success('操作成功！',['status'=>1004,'msg'=>'您已经中奖','data'=>$gift]);
                        }else{
                            return $this->error('抽奖记录表记录添加失败！');
                        }
                    }else{
                        $result->decrement('e_etimes');
                        return $this->success('操作成功！',['status'=>1005,'msg'=>'您未中奖！']);
                    }
                }else{
                    return $this->error('添加记录失败！');
                }
            }else{
                return $this->success('操作成功！',['status'=>1010,'msg'=>'该活动不存在！']);
            }
        }
        } catch (\Exception $e) {
            DB::rollback();
            return $this->error($e->getMessage());
        }
    }

    /**
     * @api {post} /api/v1/award/my 我的奖品(前台)
     * @apiDescription 我的奖品
     * @apiGroup Api
     * @apiPermission none
     * @apiParam  member_id     member_id
     * @apiParam  activity_id   activity_id
     * @apiVersion 0.1.0
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 200 OK
     * {
     * }
     */
    public function my(ApiRequest $request,AwardRecordRepository $awardRecordRepository)
    {
        $data = $awardRecordRepository->getAwardRecord($request);
        foreach ($data as $item){
            $item->award;
        }
        if($data){
            return $this->success('获取成功！',[
                'page' => $data->currentPage(),
                'total' => $data->total(),
                'lastPage'=>$data->lastPage(),
                'list' => $data->toArray()['data']
            ]);
        }else{
            return $this->error('获取失败！');
        }
    }

    /**
     * @api {post} /api/v1/person 个人信息提交
     * @apiDescription 个人信息提交
     * @apiGroup Api
     * @apiPermission none
     * @apiParam  activity_id    activity_id
     * @apiParam  member_id     member_id
     * @apiParam  [name]     姓名
     * @apiParam  [address]  联系地址
     * @apiParam  [mobile]   手机号码
     * @apiVersion 0.1.0
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 200 OK
     * {
     * }
     */
    public function person(ApiRequest $request)
    {
        $member = $this->memberRepository->getById($request['member_id']);
        if($member){
            $res = $member->update([
                'name'=>$request['name'],
                'address'=>$request['address'],
                'mobile'=>$request['mobile'],
            ]);
            if($res){
                return $this->success('操作成功！',$res);
            }else{
                return $this->error('操作失败！');
            }
        }else{
            return $this->error('请前往后台进行商家设置！');
        }
    }

    //获奖记录轮播
    /**
     * @api {post} /api/v1/award 获奖记录轮播
     * @apiDescription 获奖记录轮播
     * @apiGroup Api
     * @apiPermission none
     * @apiParam  activity_id    activity_id
     * @apiParam  member_id     member_id
     * @apiVersion 0.1.0
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 200 OK
     * {
     * }
     */
    public function award(ApiRequest $request,AwardRecordRepository $awardRecordRepository)
    {
        $awards = $awardRecordRepository->getActivityAwardRecord(getDecryptStr($request['activity_id']));

        foreach ($awards as $item){
            $item->awardName;
            $item->memberName;
        }

        return $this->success('获取成功！',$awards);
    }
}
