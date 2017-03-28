<?php
header("Content-Type: text/html;charset=utf-8");
function buildRandomString($type=1,$length=4){
	// $type=3;
	// $length=4;
	if ($type==1) {
		$chars=join("",range(0,9));
	}elseif($type==2){
		$chars=join("",array_merge(range("a","z"),range("A","Z")));
	}elseif($type==3){
		$chars=join("",array_merge(range("a","z"),range("A","Z"),range(0,9)));
	}
	if($length>strlen($chars)){
		exit("字符串长度不够");
	}
	//打乱随机数
	$chars=str_shuffle($chars);
	//截取数据 并且返回 从0开始截取到参数的长度
	return substr($chars,0,$length);
};
?>