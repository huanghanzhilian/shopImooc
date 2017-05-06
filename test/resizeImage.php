<?php
ob_clean();
$filename="sssssqw.jpg";//对哪个文件产生缩略图
$src_image=imagecreatefromjpeg($filename);//创建jpg画布资源  — 由文件或 URL 创建一个新图象。
list($src_w,$src_h)=getimagesize($filename);//根据获取图片大小函数返回值的数组得到图片的宽高
//设定缩放比例
$scale=0.5;//0.5倍
$dst_w=ceil($src_w*$scale);//新图片的宽等于原图宽成于0.5倍  ceil()函数取整
$dst_h=ceil($src_h*$scale);//高度同样
$dst_image=imagecreatetruecolor($dst_w,$dst_h);//创建画布  新建一个真彩色图像
imagecopyresampled($dst_image, $src_image,0,0,0,0, $dst_w, $dst_h, $src_w, $src_h);//重采样拷贝部分图像并调整大小
imagejpeg($dst_image, null, 100);
// 内容类型
header('Content-Type: image/jpeg');
imagejpeg($dst_image,"uploads/".$filename);//输出图象到浏览器或文件。
imagedestroy($src_image);//销毁一图像
imagedestroy($dst_image);//销毁一图像

?>