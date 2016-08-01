<?php
header("Content-Type:text/html;charset=utf-8");
//判断表单是否提交
if(isset($_POST['ac']) && $_POST['ac']=='add')
{
	//获取表单提值
	$arr[]	= $_POST['name'];
	$arr[]	= $_POST['sex'];
	$arr[]	= $_POST['age'];
	$arr[]	= $_POST['edu'];
	$arr[]	= $_POST['salary'];
	$arr[]	= $_POST['bonus'];
	$arr[]	= $_POST['city'];
	//将数组连成一个字符串
	$content = implode(",",$arr);
	$content = iconv("utf-8","gbk",$content); 
	$content .= "\r\n";
	//打开文件
	$filename = "./yao.txt";
	$handle = fopen($filename,"ab");
	fwrite($handle,$content);//写入内容
	fclose($handle);
	//跳转到列表页
	echo "<script>location.href='list.php'</script>";
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>HTML5 Document</title>
</head>

<body>
<form name="form1" method="post" action="http://www.2016.cn/add.php">
<table width="600" border="1" bordercolor="#f0f0f0" rules="all" cellpadding="5" align="center">
	<tr>
		<th colspan="2">
			<h2>添加学生信息</h2>
			<p><a href="javascript:void(0)" onClick="history.go(-1)">返回列表页</a></p>
		</th>
	</tr>
	<tr>
		<td align="right" width="100">姓名：</td>
		<td><input type="text" name="name"></td>
	</tr>
	<tr>
		<td align="right" width="100">性别：</td>
		<td>
			<input type="radio" name="sex" value="男" checked="checked">男
			<input type="radio" name="sex" value="女">女
		</td>
	</tr>
	<tr>
		<td align="right" width="100">年龄：</td>
		<td><input type="text" name="age"></td>
	</tr>
	<tr>
		<td align="right" width="100">学历：</td>
		<td>
			<select name="edu">
				<option value="初中">初中</option>
				<option value="高中">高中</option>
				<option value="大专" selected="selected">大专</option>
				<option value="大本">大本</option>
				<option value="研究生">研究狗</option>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right" width="100">工资：</td>
		<td><input type="text" name="salary"></td>
	</tr>
	<tr>
		<td align="right" width="100">奖金：</td>
		<td><input type="text" name="bonus"></td>
	</tr>
	<tr>
		<td align="right" width="100">城市：</td>
		<td>
			<select name="city">
				<option value="北京市">北京市</option>
				<option value="天津市">天津市</option>
				<option value="山西省">山西省</option>
				<option value="山东省">山东省</option>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right" width="100">&nbsp;</td>
		<td>
			<input type="submit" value="提交表单">
			<input type="hidden" name="ac" value="add">
		</td>
	</tr>
</table>
</form>
</body>
</html>
