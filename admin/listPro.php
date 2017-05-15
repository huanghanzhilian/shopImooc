<?php
require_once '../include.php';
//验证管理员是否登入
checkLogined();

$order=$_REQUEST['order']?$_REQUEST['order']:null;

$orderBy=$order?"order by p.".$order:null;

$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where=$keywords?"where p.pName like '%{$keywords}%'":null;


//得到总记录数   
$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from imooc_pro as p join imooc_cate c on p.cId=c.id {$where}  ";

//得到总记录数
$totalRows=getResultNum($sql);
//每页显示记录数
$pageSize=4;

//得到总页码数
$totalPage=ceil($totalRows/$pageSize);

//得到偏移量
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;

//得到数据库所有商品
$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from imooc_pro as p join imooc_cate c on p.cId=c.id {$where} {$orderBy} limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
if(!$rows){
	return;
}
//print_r($rows)

//$rows=getAllProByAdmin($sql);
//print_r($rows);
//得到数据库中所有商品
//如果$rows数据为空中止脚本执行函数
/*if(!$rows){
    alertMes("sorry,没有分类,请添加!","addPro.php");
    exit;
}*/
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
<link rel="stylesheet" href="scripts/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
<script src="scripts/jquery-ui/js/jquery-1.10.2.js"></script>
<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
</head>

<body>
<div id="showDetail" style="display:none;">

</div>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addPro()">
                        </div>
                        <div class="fr">
                            <div class="text">
                                <span>商品价格：</span>
                                <div class="bui_select">
                                    <select name="" id="" class="select" onchange="change(this.value)">
                                    	<option>-请选择-</option>
                                        <option value="iPrice asc" <?php echo $order=="iPrice asc"?"selected='selected'":null;?>>由低到高</option>
                                        <option value="iPrice desc" <?php echo $order=="iPrice desc"?"selected='selected'":null;?>>由高到低</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text">
                                <span>上架时间：</span>
                                <div class="bui_select">
                                    <select name="" id="" class="select" onchange="change(this.value)">
                                        <option>-请选择-</option>
                                        <option value="pubTime desc" <?php echo $order=="pubTime desc"?"selected='selected'":null;?>>最新发布</option>
                                        <option value="pubTime asc" <?php echo $order=="pubTime asc"?"selected='selected'":null;?>>历史发布</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text">
                                <span>搜索</span>
                                <input type="text" value="<?php echo $keywords=$keywords?$keywords:"";?>" class="search"  id="search" onkeydown="search(event)" >
                            </div>
                        </div>
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="10%">编号</th>
                                <th width="20%">商品名称</th>
                                <th width="20%">商品分类</th>
                                <th width="20%">是否上架</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php $i=1; foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td>
                                	<input type="checkbox" id=<?php echo "c".$row['id'];?> class="check" value=<?php echo $row['id'];?>>
                                	<label for="c1" class="label"><?php echo $i;?></label>
                                </td>
                                <td><?php echo $row['pName']; ?></td>
                                <td><?php echo $row['cName'];?></td>
                                <td>
                                	<?php echo $row['isShow']==1?"上架":"下架";?>
                                </td>

                                <td align="center">
                    				<input type="button" value="详情" class="btn" onclick="showDetail(<?php echo $row['id'];?>,'<?php echo $row['pName'];?>')">
                    				<input type="button" value="修改" class="btn" onclick="editPro(<?php echo $row['id'];?>)">
                    				<input type="button" value="删除" class="btn" onclick="delPro(<?php echo $row['id'];?>)">
		                            <div id="showDetail<?php echo $row['id'];?>" style="display:none;">
			                        	<table class="table" cellspacing="0" cellpadding="0">
			                        		<tr>
			                        			<td width="20%" align="right">商品名称</td>
			                        			<td><?php echo $row['pName'];?></td>
			                        		</tr>
			                        		<tr>
			                        			<td width="20%"  align="right">商品类别</td>
			                        			<td><?php echo $row['cName'];?></td>
			                        		</tr>
			                        		<tr>
			                        			<td width="20%"  align="right">商品货号</td>
			                        			<td><?php echo $row['pSn'];?></td>
			                        		</tr>
			                        		<tr>
			                        			<td width="20%"  align="right">商品数量</td>
			                        			<td><?php echo $row['pNum'];?></td>
			                        		</tr>
			                        		<tr>
			                        			<td  width="20%"  align="right">商品价格</td>
			                        			<td><?php echo $row['mPrice'];?></td>
			                        		</tr>
			                        		<tr>
			                        			<td  width="20%"  align="right">幕课网价格</td>
			                        			<td><?php echo $row['iPrice'];?></td>
			                        		</tr>
			                        		<tr>
			                        			<td width="20%"  align="right">商品图片</td>
			                        			<td>
			                        			<?php 
			                        			$proImgs=getAllImgByProId($row['id']);
			                        			foreach($proImgs as $img):
			                        			?>
			                        			<img width="100" height="100" src="uploads/<?php echo $img['albumPath'];?>" alt=""/> &nbsp;&nbsp;
			                        			<?php endforeach;?>
			                        			</td>
			                        		</tr>
			                        		<tr>
			                        			<td width="20%"  align="right">是否上架</td>
			                        			<td>
			                        				<?php echo $row['isShow']==1?"上架":"下架";?>
			                        			</td>
			                        		</tr>
			                        		<tr>
			                        			<td width="20%"  align="right">是否热卖</td>
			                        			<td>
			                        				<?php echo $row['isHot']==1?"热卖":"正常";?>
			                        			</td>
			                        		</tr>
			                        	</table>
			                        	<span style="display:block;width:80%; ">
			                        	商品描述<br/>
			                        	<?php echo $row['pDesc'];?>
			                        	</span>
		                        </div>
                                
                                </td>
                            </tr>
                        	<?php $i++; endforeach;?>
                           	<?php if($totalRows>$pageSize):?>
				            <tr>
				                <td colspan="5"><?php echo showPage($page, $totalPage,"keywords={$keywords}&order={$order}");?></td>
				            </tr>
				            <?php endif;?>
                        </tbody>
                    </table>
                </div>
<script type="text/javascript">
function showDetail(id,t){
	$("#showDetail"+id).dialog({
		  height:"auto",
	      width: "auto",
	      position: {my: "center", at: "center",  collision:"fit"},
	      modal:false,//是否模式对话框
	      draggable:true,//是否允许拖拽
	      resizable:true,//是否允许拖动
	      title:"商品名称："+t,//对话框标题
	      show:"slide",
	      hide:"explode"
	});
}
//添加
function addPro(){
	window.location='addPro.php';
}

//修改
function editPro(id){
	window.location='editPro.php?id='+id;
}

//删除
function delPro(id){
	if(window.confirm("您确认要删除嘛？添加一次不易，且删且珍惜!")){
		window.location="doAdminAction.php?act=delPro&id="+id;
	}
}

//
function search(event){
	console.log(event)
	event = event || window.event;
	if(event.keyCode==13){
		var val=document.getElementById("search").value;
		window.location="listPro.php?keywords="+val;
	}
}

//
function change(val){
	window.location="listPro.php?order="+val;
}
</script>
</body>
</html>