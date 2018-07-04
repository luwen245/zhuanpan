<?php
namespace App\Models;

class AwardRecord extends Base
{
    protected $guarded = ['id', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];

    protected  $table = "award_records";

    public function award()
    {
        return $this->hasOne(Award::class,'id','award_id')->select('id','prize_level','prize_name','cstime','cetime','notice');
    }

    public function member()
    {
        return $this->hasOne(Member::class,'id','member_id')->select('name','address','mobile');
    }

    public function awardName()
    {
        return $this->hasOne(Award::class,'id','award_id')->select('prize_level','prize_name');
    }

    public function memberName()
    {
        return $this->hasOne(Member::class,'id','member_id')->select('name','nickname');
    }

}
