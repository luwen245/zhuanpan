<?php
namespace App\Models;

class Activity extends Base
{
    protected $guarded = ['id', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];

    protected  $table = "activities";

    public function awards()
    {
        return $this->hasMany(Award::class,'activity_id','id')->select('id','prize_level','prize_name','sku');
    }

    public function business()
    {
        return $this->hasOne(Business::class,'activity_id','id')->select('id','kefu_mobile','name','address');
    }

    public function bgm()
    {
        return $this->hasOne(Business::class,'activity_id','id')->select('id','bgm_show','bgm');
    }
}
