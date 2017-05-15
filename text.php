<?php 
/*
$fruit = array("苹果",'香蕉','菠萝');
var_dump($fruit);
//得到数组中的键名也就是插入记录的字段名
$kwys=join(",",array_keys($fruit));
//获取数组非键名的所有值
$vals="'".join(",",array_values($fruit))."'";
echo $kwys."<br/>";
echo $vals."<br/>";

//数据库插入
$table="ddss";
echo "insert {$table}($kwys) values($vals)"."<br/>";

foreach($fruit as $key=>$val){
	if($str==null){
		$sep="";
	}else{
		$sep=",";
	}
	$str.=$sep.$key."='".$val."'";
}
echo $str."<br/>";
$where="runoob_id=3";
echo "update {$table} set {$str} ".($where==null?null:" where ".$where)."<br/>";
echo "delete from {$table} {$where}"."<br/>";

echo $_COOKIE[session_name()]."<br/>";
echo session_name()."<br/>";
echo md5("1")."<br/>";
//uniqid() 函数基于以微秒计的当前时间，生成一个唯一的 ID。
echo uniqid()."<br/>";
//返回当前 Unix 时间戳的微秒数：
echo microtime(true)."<br/>";
echo md5(uniqid(microtime(true),true))."<br/>";
//echo strtolower(end(explode(".","ssssss.sss")));
//echo strtolower(explode(".","ssssss.sss"));
//print_r(strtolower(explode(".","ssssss.sss")));
$filename="sAaewewew.dsadaA";
echo strtolower(substr($filename, strrpos($filename, '.') + 1));

*/

$while=$where="id=1";
$sql="select a.albumPath from imooc_album a where pid=1";
echo $sql;


?>