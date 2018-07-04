<?php
namespace App\Services;

class DrawService
{
   //抽奖算法
    public function getGift($awards){
        $sum = 0;
        $k = 0;
        foreach ($awards as $key => $v) {
            $sum += $v['v'];
            $k += 1;
        }
        if($sum != 100){
            $empty = [['id'=>$k,'prize'=>'谢谢惠顾','v'=>100-$sum,'status'=>FALSE]];
            $awards = array_merge($awards,$empty);
        }
        $prize_arr = $awards;
        foreach ($prize_arr as $key => $val) {
            $arr[$val['id']] = $val['v'];//概率数组
        }

        $rid = $this->getRand($arr); //根据概率获取奖项id

        return $prize_arr[$rid]; //中奖项
    }

    //计算中奖概率
    protected function getRand($proArr) {
        $result = '';
        //概率数组的总概率精度
        $proSum = array_sum($proArr);
        // var_dump($proSum);
        //概率数组循环
        foreach ($proArr as $key => $proCur) {
            $randNum = mt_rand(1, $proSum); //返回随机整数
            if ($randNum <= $proCur) {
                $result = $key;
                break;
            } else {
                $proSum -= $proCur;
            }
        }
        unset ($proArr);
        return $result;
    }


}