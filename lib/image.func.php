<?php
//包含函数
// require_once '../include.php';

function verifyImage($type = 1, $length = 4, $pixel = 0, $line = 0, $width = 80, $height = 28, $sess_name = "verify"){
    //使能session
    session_start();
    ob_clean();
    // 创建画布
    // 创建真色彩画布
    $image = imagecreatetruecolor($width, $height);
    // 画笔颜色
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);

    //用填充矩形填充画布
    imagefilledrectangle($image, 1, 1, $width-2, $height-2, $white);
    // 产生随机字符串
    $chars = buildRandomString($type, $length);
    // echo $chars."<br>";
    //存储到session
    $_SESSION[$sess_name] = $chars;
    // 字体数组
    $fontfiles = array("msyh.ttc","msyhbd.ttc","msyhl.ttc","simfang.ttf","simhei.ttf");
    // 随机获取数组中任意一个值
    $fontfile = "../fonts/".$fontfiles[mt_rand(0, count($fontfiles)-1)];


    // 将TTF (TrueType Fonts) 字型文字写入图片

    for ($i=0; $i < $length; $i++) {
        //产生14 ~ 18的随机数用于字体大小
        $size = mt_rand(14, 18);
        //产生随机数用于字符角度
        $angle = mt_rand(-15, 15);
        //产生字符位置坐标
        $x = 5 + $i * $size;
        $y = mt_rand(15, 20);

        // 产生随机画笔颜色，用于设置字体颜色
        $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
        $text = substr($chars, $i, 1);

        imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);

    }
    // 绘制点、线等干扰元素

    if ($pixel) {
        for ($i=0; $i < $pixel; $i++) {
            imagesetpixel($image, mt_rand(0, $width-1), mt_rand(0, $height-1), $black);
        }
    }

    if ($line) {
        for ($i=0; $i < $line; $i++) {
        $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
            imageline($image, mt_rand(0, $width-1), mt_rand(0, $height-1), mt_rand(0, $width-1), mt_rand(0, $height-1), $color);
        }
    }

    // 输出图片格式
    header("content-type:image/gif");
    // 生成图片
    imagegif($image);
    // 释放资源
    imagedestroy($image);

}

// verifyImage(2, 4, 10, 3);



//生成缩略图
/**
 * $filename  文件名
 $dstFilename最终保存在磁盘中文件的路径以及文件名称
 $scale=0.5;  缩放比例
 $dst_w  $dst_h 指定目标画布高宽
 $isReservedSource=false;  是否保留源文件
 

function thumb($filename,$destination=null,$dst_w=null,$dst_h=null,$isReservedSource=false,$scale=0.5){
	list($src_w,$src_h,$imagetype)=getimagesize($filename);//得到原图片的宽高和类型
	//判断是否传了指定的宽和高如果没有传可以用默认的缩放比例
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


	$dstFilename=$destination==null?getUniName().".".getExt($filename):$destination;
	$outFun($dst_image,$dstFilename);//输出图象到浏览器或文件。
	imagedestroy($src_image);//销毁一图像
	imagedestroy($dst_image);//销毁一图像
	//$isReservedSource=false;//原文件没有用的情况下可以删掉  默认不删除
	if(!$isReservedSource){  //如果是true就删除
		unlink($filename); //删掉原文件
	}
	return $dstFilename; //返回保存在磁盘中的文件名
}
*/

/**
 * 生成缩略图
 * @param string $filename
 * @param string $destination
 * @param int $dst_w
 * @param int $dst_h
 * @param bool $isReservedSource
 * @param number $scale
 * @return string
*/
function thumb($filename,$destination=null,$dst_w=null,$dst_h=null,$isReservedSource=true,$scale=0.5){
	list($src_w,$src_h,$imagetype)=getimagesize($filename);
	if(is_null($dst_w)||is_null($dst_h)){
		$dst_w=ceil($src_w*$scale);
		$dst_h=ceil($src_h*$scale);
	}
	$mime=image_type_to_mime_type($imagetype);
	$createFun=str_replace("/", "createfrom", $mime);
	$outFun=str_replace("/", null, $mime);
	$src_image=$createFun($filename);
	$dst_image=imagecreatetruecolor($dst_w, $dst_h);
	imagecopyresampled($dst_image, $src_image, 0,0,0,0, $dst_w, $dst_h, $src_w, $src_h);
	if($destination&&!file_exists(dirname($destination))){
		mkdir(dirname($destination),0777,true);
	}
	$dstFilename=$destination==null?getUniName().".".getExt($filename):$destination;
	$outFun($dst_image,$dstFilename);
	imagedestroy($src_image);
	imagedestroy($dst_image);
	if(!$isReservedSource){
		unlink($filename);
	}
	return $dstFilename;
} 

?>