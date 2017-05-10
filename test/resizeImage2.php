<?php
function thumb(){
	list($src_w,$src_h,$imagetype)=getimagesize($filename);//得到原图片的宽高和类型
	//判断是否传了指定的宽和高如果没有传可以用默认的缩放比例
	$scale=0.5;
	if(is_null($dst_w)||is_null($dst_h)){   //检测变量是否为 NULL
		$dst_w=ceil($src_w*$scale);//ceil()向上取整数
		$dst_h=ceil($src_h*$scale);//ceil()向上取整数
	}
	$mime=image_type_to_mime_type($imagetype);//$mimes使用函数求出类型  image/jpeg 
	$createFun=str_replace("/", "createfrom", $mime);  //imagecreatefromjpeg    str_replace — 子字符串替换
	$outFun=str_replace("/",null,$mime);   //imagejpeg
	$src_image=$createFun($filename);//创建jpg画布资源  — 由文件或 URL 创建一个新图象。
	$dst_image=imagecreatetruecolor($dst_w,$dst_h);//创建画布  新建一个真彩色图像 
	imagecopyresampled($dst_image, $src_image,0,0,0,0, $dst_w, $dst_h, $src_w, $src_h);//重采样拷贝部分图像并调整大小
	//保存图片路径如果不存在就先创建文件夹
	if($destination&&!file_exists(dirname($destination))){//如果$destination有值斌且这个目录不存在  就先创建目录
		mkdir(dirname($destination),0777,true);
	}
	$dstFilename=$dstFilename==null?getUniName().".".getExt($filename):$dstFilename;
	$outFun($dst_image,$dstFilename);//输出图象到浏览器或文件。
	imagedestroy($src_image);//销毁一图像
	imagedestroy($dst_image);//销毁一图像
	//$isReservedSource=false;//原文件没有用的情况下可以删掉  默认不删除
	if(!$isReservedSource){  //如果是true就删除
		unlink($filename); //删掉原文件
	}
	return $dstFilename; //返回保存在磁盘中的文件名
}


?>