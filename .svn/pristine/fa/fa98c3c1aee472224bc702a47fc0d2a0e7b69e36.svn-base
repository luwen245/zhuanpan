<?php
/**
 * 上传服务类
 */
namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadService{
    protected $file;

    protected $config;

    protected $driver;

    public function __construct(UploadedFile $file, $config, $driver = 'local')
    {
        $this->file = $file;
        $this->config = $config;
        $this->driver = $driver;
    }

    /**
     * 0 代表不剪切  1代表剪切
     */
    public function upload()
    {
        try {
            $savePath = $this->savePath();
            $disk = Storage::disk($this->driver);

            if (!$disk->put('uploads/' . $savePath, file_get_contents($this->file->getRealPath()))) {
                return ['message' => '上传文件移动保存失败', 'code' => 0];
            }
            if (!$disk->has('uploads/' . $savePath)) {
                return ['message' => '上传文件不存在', 'code' => 0];
            }
            if ($this->driver == 'local') {
                    $info['url'] = 'uploads/' . $savePath;
            } else {
                //上传七牛 TODO
                $info['url'] = config('config.qiniu_domain').'/uploads/' . $savePath;
            }

            return ['message' => '上传文件成功', 'code' => 1, 'data' => $info];
        } catch (\Exception $e) {
            return ['message' => $e->getMessage() . 'Catch Error', 'code' => 0];
        }
    }


    private function savePath()
    {
        $saveName = sha1(time() . time() . $this->file->getClientOriginalName()) . "." . $this->file->getClientOriginalExtension();
        $directory = $this->config['save_path'];
        $savePath = $directory . '/' . $saveName;

        return $savePath;
    }

}
