<?php


namespace xuyong\oss\Storage\qiniu;


use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use xuyong\oss\Storage\UploadStorage;

class Qiniu implements UploadStorage
{
    public function upload($pathName)
    {
        // TODO: Implement upload() method.
        // 需要填写你的 Access Key 和 Secret Key
        $accessKey ="your accessKey";
        $secretKey = "your secretKey";
        $bucket = "your bucket name";
        // 构建鉴权对象
        $auth = new Auth($accessKey, $secretKey);
        // 生成上传 Token
        $token = $auth->uploadToken($bucket);
        // 要上传文件的本地路径
        $filePath = $pathName;
        // 上传到存储后保存的文件名
        $key = md5(time().$pathName).'.jpg';
        // 初始化 UploadManager 对象并进行文件的上传。
        $uploadMgr = new UploadManager();
        // 调用 UploadManager 的 putFile 方法进行文件的上传。
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
        echo "\n====> putFile result: \n";
        if ($err !== null) {
        var_dump($err);
        } else {
        var_dump($ret);
        }
    }
}