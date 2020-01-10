<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/1/10
 * Time: 10:31
 */

namespace App\Handlers;


class ImageUploadHandler
{
    //只允许以下的后缀文件图片上传
    protected $allowed_ext = ['png', 'jpg', 'gif', 'jpeg'];

    public function save($file, $folder, $file_prefix)
    {
        //构建存储的文件夹存储规则， 例如：uploads/images/avatars/201709/21/
        //文件夹切割能让查找效率更高
        $folder_name = "uploads/images/$folder/" . date('Ym/d', time());

        //文件具体的存储路径，‘public_path()’ 获取的是 ‘public’ 文件叫的物理路径
        //值如：/home/vagrant/code/project2/public/uploads/images/avatars/201709/21/
        $upload_path = public_path() . '/' . $folder_name;

        //获取文件的后缀名，因图片从剪贴板里黏贴时后缀名为空，所以此处确保后缀一直存在
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        //拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据的模型的 ID
        //值如：1_1493521050_7BVc9v9ujP.png
        $filename = $file_prefix . '_' . time() . '_' . str_random(10) . '.' . $extension;

        //如果上传的不是图片将终止操作
        if ( ! in_array($extension, $this->allowed_ext)){
            return false;
        }

        //将图片移动到我的目标存储路径中
        $file->move($upload_path, $filename);

        return [
            'path' => config('app.url') . "/$folder_name/$filename"
        ];
    }

}