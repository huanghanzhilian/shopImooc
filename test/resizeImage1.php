<?php
ob_clean();
$filename="des_big.jpg";//对哪个文件产生缩略图
list($src_w,$src_h,$imagetype)=getimagesize($filename);//根据获取图片大小函数返回值的数组得到图片的宽高和类型
$mime=image_type_to_mime_type($imagetype);//$mimes使用函数求出类型  image/jpeg
$createFun=str_replace("/", "createfrom", $mime);  //imagecreatefromjpeg    str_replace — 子字符串替换
$outFun=str_replace("/",null,$mime);   //imagejpeg

$src_image=$createFun($filename);//创建jpg画布资源  — 由文件或 URL 创建一个新图象。
$dst_50_image=imagecreatetruecolor(50,50);//创建画布  新建一个真彩色图像  创建50*50
$dst_220_image=imagecreatetruecolor(220,220);
$dst_350_image=imagecreatetruecolor(350,350);
$dst_800_image=imagecreatetruecolor(800,800);

imagecopyresampled($dst_50_image, $src_image,0,0,0,0, 50, 50, $src_w, $src_h);//重采样拷贝部分图像并调整大小
imagecopyresampled($dst_220_image, $src_image,0,0,0,0, 220, 220, $src_w, $src_h);//重采样拷贝部分图像并调整大小
imagecopyresampled($dst_350_image, $src_image,0,0,0,0, 350, 350, $src_w, $src_h);//重采样拷贝部分图像并调整大小
imagecopyresampled($dst_800_image, $src_image,0,0,0,0, 800, 800, $src_w, $src_h);//重采样拷贝部分图像并调整大小

// 内容类型
header('Content-Type:'.$outFun);

$outFun($dst_50_image,"uploads/image_50/".$filename);//输出图象到浏览器或文件。
$outFun($dst_220_image,"uploads/image_220/".$filename);//输出图象到浏览器或文件。
$outFun($dst_350_image,"uploads/image_350/".$filename);//输出图象到浏览器或文件。
$outFun($dst_800_image,"uploads/image_800/".$filename);//输出图象到浏览器或文件。

imagedestroy($dst_50_image);//销毁一图像
imagedestroy($dst_220_image);//销毁一图像
imagedestroy($dst_350_image);//销毁一图像
imagedestroy($dst_800_image);//销毁一图像



?>