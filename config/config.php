<?php
/**
 * 总配置文件
 */
return [
        'pagesize'=>5,

        /* 上传文件配置 */
        'uploads' => [
            'mimes' => [],
            'storage' => 'local',
            'max_size' => 10 * 1024 * 1024,
            'min_size' => 0,
            'extension' => "jpg,gif,png,jpeg,zip,rar,tar,gz,7z,doc,docx,txt,xml,ppt,pptx,xlsx,xls",
            'save_path' => date('Y-m-d'),
        ],

        'domain'=>'http://turntable.com',
        'qiniu_domain'=> 'http://v2.img.vyicoo.cn',
];
