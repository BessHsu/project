<?php 
require("config.php");
$tmp=$_GET['courseid'];
$_SESSION['courseid'] = $tmp;//課程代號
$userid=$_SESSION['uID'];//老師帳號
$sql = "select * from course where userid ='$userid' AND (courseid = '$tmp')";
$results=mysqli_query($conn,$sql);
while ( $rs=mysqli_fetch_array($results)) {
	$coursename = $rs['coursename'];
}
$_SESSION['coursename'] = $coursename;//課程名稱
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $coursename;?>新增測驗</title>
<style type="text/css">
table tr td {
background-color: #cfc;
padding: 10px;
}
div {
margin: 100px auto;
background-color: #ffc;
width: 400px;
padding: 50px 100px;
border: dotted green 5px;
}
</style>
</head>

<body>
<?php 
echo $_SESSION['nickname'];
?>你好!

<h3><a href="teacherlist.php">課程一覽表</a>&nbsp>&nbsp科目:<?php echo $coursename;?></h3>
<br />
<hr />

<form action="addquiz2.php" method="post">
<div align="center">
<h2>~ 新增測驗 ~</h2>
<table cellpadding="5">
<tr><td colspan="2" align="center">step 1</td></tr>
<tr>
<td align="right">請選擇題數</td>
<td align="left">
<select name="n">
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
</select>
</tr>
<tr><td colspan="2" align="center">
<input type="submit" value="下一步"> <input type="reset" value="取消"></td></tr>
</table>
</div>
</form>

</body>
</html>
