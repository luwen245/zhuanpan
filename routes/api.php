<?php

//入口api
//apidoc -i App/Http/Controllers/Admin/ -o public/apidoc/

Route::group(['prefix'=>'api/v1','namespace'=>'V1'],function ($api){

    $api->any('/serve', 'ApiController@serve');

    //前台入口
    $api->get('/entry','ApiController@entry');

    //授权回调
    $api->get('/callback','ApiController@callback');

    //我的奖项
    $api->post('/award/my','ApiController@my');

    //摇奖的过程 imp
    $api->post('/prize','ApiController@prize');

    //个人信息提交
    $api->post('/person','ApiController@person');

    //首页基本信息
    $api->post('/baseInfo','ApiController@baseInfo');

    //活动攻略
    $api->post('/desc','ActivityController@desc');

    //获奖信息
    $api->post('/award','ApiController@award');
});

/**
 * 入口 user_id 活动所属的人
 *
 * 前台入口 后台入口
 *
 * 大转盘活动 -> 活动奖励
 *
 * 结果 中奖 没中奖
 *
 * 对外接口加密性
 *
 * 梳理一下 所有的接口
 * 后台入口  http://turntable.com/admin/v1/entry
 * 获取用户信息  turntable.com/admin/v1/user/1
 * 获取活动列表  turntable.com/admin/v1/activity?user_id=1
 * 预览和发布  预览  qrcode_url(二维码路径)  url(下载二维码路径) 发布 http://turntable.com/admin/v1/activity/publish/21
 * 活动数据  http://turntable.com/admin/v1/award/record
 * 活动等级 http://turntable.com/admin/v1/prizeLevel
 * 用户数据 http://turntable.com/admin/v1/members
 * 兑奖  http://turntable.com/admin/v1/award/cash
 * 公众号配置appid   http://turntable.com/admin/v1/auth
 *
 * 前端入口
 * 基础信息 http://turntable.com/api/v1/baseInfo
 * 抽奖  http://turntable.com/api/v1/prize
 * 中奖信息轮播 http://turntable.com/api/v1/award
 * 我的奖品 http://turntable.com/api/v1/desc
 */
