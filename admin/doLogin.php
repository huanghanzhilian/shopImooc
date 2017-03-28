<?php
//包含函数
require_once '../include.php';

$username=$_POST['username'];
$password=md5($_POST['password']);
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
//var_dump($_POST);
if($verify==$verify1){
	$sql="select * from imooc_admin where username='{$username}' and password='{$password}'";
	$row=checkAdmin($sql);
	var_dump($row);
}else{
	echo "<script>alert('验证码错误')</script>";
	echo "<script>window.location='login.html'</script>";
}
?>