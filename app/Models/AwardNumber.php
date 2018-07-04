<?php
namespace App\Models;

class AwardNumber extends Base
{
    public $timestamps = false;

    protected $guarded = ['id', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];

    protected  $table = "award_numbers";

}
