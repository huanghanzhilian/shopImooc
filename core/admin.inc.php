<?php
//验证是否有这个管理员
//$sql 需要传sql语句
function checkAdmin($sql){
	return fetchOne($sql);
}

//检查是否登入
function checkLogined(){
	$_SESSION['adminId']=isset($_SESSION['adminId'])?$_SESSION['adminId']:"";
	$_COOKIE['adminId']=isset($_COOKIE['adminId'])?$_COOKIE['adminId']:"";
	/*echo isset($_SESSION['adminId'])."<br/>";
	echo isset($_COOKIE['adminId']);*/
	if($_SESSION['adminId']==""&&$_COOKIE['adminId']==""){
		alertMes("请先登陆","login.php");
	}
}

//添加管理员
function addAdmin(){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	if(insert('imooc_admin',$arr)){
		$mes="添加成功!<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		$mes="添加失败!<br/><a href='addAdmin.php'>重新添加</a>";
	}
	return $mes;
}

//得到所有的管理员
function getAllAdmin(){
	$sql="select id,username,email from imooc_admin";
	$rows=fetchAll($sql);
	return $rows;
}


//注销管理员
function logout(){
	$_SESSION=array();
	//如果cookie有至也要清空
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}
	if(isset($_COOKIE['adminId'])){
		setcookie("adminId","",time()-1);
	}
	if(isset($_COOKIE['adminName'])){
		setcookie("adminName","",time()-1);
	}
	//消除SESSION会话
	session_destroy();
	//跳转页面
	header("location:login.php");
	//echo $_COOKIE[session_name()];
}
?>