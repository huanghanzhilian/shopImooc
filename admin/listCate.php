<?php
require_once '../include.php';
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$sql="select * from imooc_cate";
//表总条数
$totalRows=getResultNum($sql);
//每页应显示条数
$pageSize=6;
//得到总页数
$totalPage=ceil($totalRows/$pageSize);
//如果$page小于1或者等于空或者不是数学$page就等于1
if($page<1||$page==null||!is_numeric($page))$page=1;
//如果$page大于等于总页码$page就等于总页码
if($page>=$totalPage)$page=$totalPage;
//偏移量
$offset=($page-1)*$pageSize;
//执行分页
$sql="select id,cName from imooc_cate limit {$offset},{$pageSize}";
//获取数据
$rows=fetchAll($sql);
//如果$rows数据为空中止脚本执行函数
if(!$rows){
    alertMes("sorry,没有分类,请添加!","addCate.php");
    exit;
}
//$rows=getCateByPage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="styles/backstage.css">
</head>
<body>
<div class="details">
    <div class="details_operation clearfix">
        <div class="bui_select">
            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addCate()">
        </div>
            
    </div>
    <!--表格-->
    <table class="table" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th width="15%">编号</th>
                <th width="25%">分类名称</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($rows as $row):?>
            <tr>
                <!--这里的id和for里面的c1 需要循环出来-->
                <td>
                    <input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $i;?></label>
                </td>
                <td><?php echo $row['cName']; ?></td>
                <td align="center">
                    <input type="button" value="修改" class="btn" onclick="editCate(<?php echo $row['id'];?>)">
                    <input type="button" value="删除" class="btn"  onclick="delCate(<?php echo $row['id'];?>)">
                </td>
            </tr>
            <?php $i++; endforeach;?>
            <?php if($totalRows>$pageSize):?>
            <tr>
                <td colspan="4"><?php echo showPage($page, $totalPage);?></td>
            </tr>
            <?php endif;?>
        </tbody>
    </table>
</div>
</body>
<script type="text/javascript">
    function addCate() {
        window.location = "addCate.php";
    }

    function editCate(id) {
        window.location = "editCate.php?id=" + id;
    }

    function delCate(id) {
        if (window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")) {
            window.location = "doAdminAction.php?act=delCate&id=" + id;
        }
    }
</script>
</html>