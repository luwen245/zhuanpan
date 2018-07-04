<?php
/**
 *七牛相关方案
 */
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class QiniuService
{
    //二维码移动到
    public function reqrcode($url)
    {
        try {
            $disk = Storage::disk('qiniu');
            $savePath = sha1(microtime()).'.png';
            $res = $disk->put('turntable/'.$savePath, file_get_contents($url));
            if (!$res) {
                return ['message' => '上传文件移动保存失败', 'code' => 0];
            }

           //上传七牛
           $info['url'] = config('config.qiniu_domain').'/turntable/' . $savePath;

           return ['msg' => '操作成功！', 'code' => 1, 'url' =>  $info['url']];
        } catch (\Exception $e) {
            return ['msg' => $e->getMessage() . 'Catch Error', 'code' => 0];
        }
    }
}
