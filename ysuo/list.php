<?php
header("Content-Type:text/html;charset=utf-8");

//实例：用表格读取记事本的学生信息
$filename = "./yao.txt";
//打开文件
$handle = fopen($filename,'rb');
//循环读取文件
while($content = fgets($handle))
{
	$arr[] = iconv("gbk","utf-8",$content);
}
fclose($handle);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>HTML5 Document</title>
</head>

<body>
<table width="600" border='1' bordercolor='#f0f0f0' rules='all' align='center' cellpadding='5'>
	<tr>
		<th>编号</th>
		<th>姓名</th>
		<th>性别</th>
		<th>年龄</th>
		<th>学历</th>
		<th>工资</th>
		<th>奖金</th>
		<th>城市</th>
	</tr>
	<?php 
	for($i=0;$i<count($arr);$i++){
		$arr2 = explode(",",$arr[$i]);
	?>
	<tr align="center">
		<td><?php echo $i+1?></td>
		<td><?php echo $arr2[0]?></td>
		<td><?php echo $arr2[1]?></td>
		<td><?php echo $arr2[2]?></td>
		<td><?php echo $arr2[3]?></td>
		<td><?php echo $arr2[4]?></td>
		<td><?php echo $arr2[5]?></td>
		<td><?php echo $arr2[6]?></td>
	</tr>
	<?php }?>
</table>
</body>
</html>
