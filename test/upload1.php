<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>多文件上传实现</title>
</head>
<body>
	<form action="doAction2.php" method="post" enctype="multipart/form-data">
		请选择上传文件<input type="file" name="myFile1"><br/>
		请选择上传文件<input type="file" name="myFile2"><br/>
		请选择上传文件<input type="file" name="myFile3"><br/>
		<input type="submit" value="上传">
	</form>
</body>
</html>