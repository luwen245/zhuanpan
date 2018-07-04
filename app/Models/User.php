<?php
namespace App\Models;

class User extends Base
{
    protected $guarded = ['id', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];

    protected  $table = "users";

}
