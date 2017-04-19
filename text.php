<?php 
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
?>