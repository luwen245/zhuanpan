<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\BaseController;
use App\Http\Requests\UploadRequest;
use App\Services\UploadService;

class SystemController extends BaseController
{
    //文件上传
    /**
     * @api {post} /v1/upload 文件上传
     * @apiDescription 文件上传
     * @apiGroup System
     * @apiPermission none
     * @apiParam  file   文件名称
     * @apiVersion 0.1.0
     * @apiSuccessExample {json} Success-Response:
     *   HTTP/1.1 200 OK
     *   {
     *   }
     */
    public function upload(UploadRequest $request)
    {
        $file = $request->file('file');
        $uploadService = new UploadService($file, config('config.uploads'),'qiniu');

        try {
            $result = $uploadService->upload();

            if ($result['code'] == 1) {
                return $this->success('上传成功', $result['data']);
            } else {
                return $this->error($result['message']);
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
