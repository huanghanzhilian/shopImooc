<?php
//分类添加
function addCate(){
	//先获取post的值
	$arr=$_POST;
	//运行插入数据函数
	if(insert("imooc_cate",$arr)){
		//如果添加成功
		$mes="添加成功!<br/><a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看分类</a>";
	}else{
		$mes="添加失败!<br/><a href='addCate.php'>重新添加</a>";
	}
	return $mes;
}
//根据id得到指定分类信息
function getCateById($id){
	$sql="select id,cName from imooc_cate where id='{$id}'";
	$row=fetchOne($sql);
	return $row;
}
//修改分类
function editCate($where){
	//先获取post的值
	$arr=$_POST;
	//运行更新数据函数
	if(update("imooc_cate",$arr,$where)){
		//如果添加成功
		$mes="分类修改成功<a href='listCate.php'>查看分类</a>";
	}else{
		$mes="分类修改成功失败!<br/><a href='listCate.php'>重新修改</a>";
	}
	return $mes;
};

//删除
function delCate($where){
	if(delete("imooc_cate",$where)){
		$mes="分类删除成功<br/><a href='listCate.php'>查看分类</a>";
	}else{
		$mes="删除失败<br/><a href='listCate.php'>请重新操作？</a>";
	}
	return $mes;
}

//得到所有的分类
function getAllCate(){
	$sql="select id,cName from imooc_cate";
	$rows=fetchAll($sql);
	return $rows;
}
?>