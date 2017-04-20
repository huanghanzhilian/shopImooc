<?php
//连接数据库
function connect(){
	// 连接数据库赋值给连接标识符$link
	$link=mysql_connect(DB_HOST,DB_USER,DB_PWD) or die("数据库连接失败Error:".mysql_errno().":".mysql_error());
	// 设置编码
	mysql_set_charset(DB_CHARSET);
	// 连接成功打开指定数据库
	mysql_select_db(DB_DBNAME) or die("指定数据库打开失败");
	return $link;
}

//完成记录插入的操作
function insert($table,$array){
	/*//得到数组中的键名也就是插入记录的字段名
	$kwys=join(",",array_keys($array));
	//获取数组非键名的所有值
	$vals="'".join(",",array_values($array))."'";
	//插入数据 insert{$table表名}($kwys键名) values($vals值)
	$sql="insert {$table}($kwys) values($vals)";
	//执行插入
	mysql_query($sql);
	//返回id
	return mysql_insert_id();*/
	$keys=join(",",array_keys($array));
	$vals="'".join("','",array_values($array))."'";
	$sql="insert {$table}($keys) values({$vals})";
	mysql_query($sql);
	return mysql_insert_id();
}

//记录的更新操作
//参数 表名 数组 条件默认为空
function update($table,$array,$where=null){
	foreach($array as $key=>$val){
		if($str==null){
			$sep="";
		}else{
			$sep=",";
		}
		$str.=$sep.$key."='".$val."'";
	}
		$sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
		$result=mysql_query($sql);
		//var_dump($result);
		//var_dump(mysql_affected_rows());exit;
		if($result){
			//返回受影响的记录条数
			return mysql_affected_rows();
		}else{
			return false;
		}
}




//删除记录
function delete($table,$where=null){
	$where=$where==null?null:" where ".$where;
	$sql="delete from {$table} {$where}";
	mysql_query($sql);
	//返回受影响的记录条数
	return mysql_affected_rows();
}
//得到指定一条记录
function fetchOne($sql,$result_type=MYSQL_ASSOC){
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result,$result_type);
	return $row;
}

//得到结果集中所有记录 ...
function fetchAll($sql,$result_type=MYSQL_ASSOC){
	$result=mysql_query($sql);
	while(@$row=mysql_fetch_array($result,$result_type)){
		$rows[]=$row;
	}
	return $rows;
}

/**
 * 得到结果集中的记录条数
 * @param unknown_type $sql
 * @return number
 */
function getResultNum($sql){
	$result=mysql_query($sql);
	return mysql_num_rows($result);
}

/**
 * 得到上一步插入记录的ID号
 * @return number
 */
function getInsertId(){
	return mysql_insert_id();
}


?>