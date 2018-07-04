<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\BaseController;
use App\Http\Requests\UserRequest;
use App\Repositories\MemberRepository;
use App\Repositories\UserRepository;

class UserController extends BaseController
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @api {get} /admin/v1/user/:user_id 获取用户信息
     * @apiDescription 获取用户信息
     * @apiGroup User
     * @apiPermission none
     * @apiParam  user_id   user_id
     * @apiVersion 0.1.0
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 200 OK
     * {
     * }
     */
    public function show($id)
    {
        $data = $this->userRepository->getById($id);

        return $this->success('获取成功！',$data);
    }

    //用户数据
    /**
     * @api {post} /admin/v1/merbers 用户数据(后台)
     * @apiDescription 用户数据
     * @apiGroup User
     * @apiPermission none
     * @apiParam  activity_id  activity_id
     * @apiVersion 0.1.0
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 200 OK
     * {
     * }
     */
    public function members(UserRequest $request,MemberRepository $memberRepository)
    {
        $data = $memberRepository->getMember($request);

        return $this->success('获取成功！',[
            'page' => $data->currentPage(),
            'total' => $data->total(),
            'lastPage'=>$data->lastPage(),
            'list' => $data->toArray()['data']
        ]);
    }

    /**
     * @api {post} /admin/v1/auth 授权appid(前台)
     * @apiDescription 授权appid
     * @apiGroup User
     * @apiPermission none
     * @apiParam  user_id  该用户id
     * @apiVersion 0.1.0
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 200 OK
     * {
     * }
     */
    public function auth(UserRequest $request)
    {
        $user = $this->userRepository->getByWhereFirst(['user_id'=>$request['user_id']]);

        if($user){
            $res = $user->update(['appid'=>$request['appid']]);

            return $this->success('操作成功！',$res);
        }else{
            return $this->error('该用户不存在！');
        }
    }

}
