<?php

//入口api
//apidoc -i App/Http/Controllers/V1/ -o public/apidoc/
Route::group(['prefix'=>'admin/v1','namespace'=>'V1'],function ($api)
{
    //后台入口
    $api->get('/entry','ApiController@adminEntry');

    //活动
    $api->resource('/activity','ActivityController');

    //发布活动
    $api->get('/activity/publish/{id}','ActivityController@publish');

    //规则设置
    $api->post('/activity/rule/{id}','ActivityController@rule');

    //商家设置
    $api->post('/activity/business/{id}','ActivityController@business');

    //奖品
    $api->resource('/award','AwardController');

    //appid授权
    $api->post('/auth','UserController@auth');

    //兑奖
    $api->post('/award/cash','AwardController@cash');

    //后台中奖记录
    $api->post('/award/record','AwardController@record');

    //上传
    $api->post('/upload','SystemController@upload');

    //获取用户信息
    $api->get('/user/{id}','UserController@show');

    //获取用户数据
    $api->post('/members','UserController@members');

    //奖项等级
    $api->post('/prizeLevel','AwardController@prizeLevel');
});

