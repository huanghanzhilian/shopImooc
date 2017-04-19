<?php
require_once '../include.php';
$act=$_REQUEST['act'];
if($act=='logout'){
	logout();
}elseif($act=='addAdmin'){
	$mes=addAdmin();
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