<?php
require_once '../include.php';
$act=$_REQUEST['act'];
$id=$_REQUEST['id'];
if($act=='logout'){
	logout();
}elseif($act=='addAdmin'){
	$mes=addAdmin();
}elseif($act=='editAdmin'){
	$mes=editAdmin($id);
}elseif($act=='delAdmin'){
	$mes=delAdmin($id);
}elseif($act=='addCate'){
	$mes=addCate();
}elseif($act=='editCate'){
	$where="id={$id}";
	$mes=editCate($where);
}elseif($act=='delCate'){
	$mes=delCate($id);
}elseif($act=='addPro'){
	$mes=addPro();
}elseif($act=='editPro'){
	$mes=editPro($id);
}elseif($act=='delPro'){
	$mes=delPro($id);
}elseif($act=='addUser'){
	$mes=addUser();
}elseif($act=='delUser'){
	$mes=delUser($id);
}elseif($act=='editUser'){
	$mes=editUser($id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
	if($mes){
		echo $mes;
	}
?>
</body>
</html>