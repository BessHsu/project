<?php 
require("config.php");
$b=$_SESSION['uID'];//使用者名稱
$c = $_SESSION['coursename'];//科目名稱

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增單元-step1</title>
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

<h3><a href="questionbank.php">題庫一覽表</a>&nbsp>&nbsp
科目:<a href="try.php?mid=<?php echo $c;?>"><?php echo $c;?></a>&nbsp>&nbsp
</h3>
<br />
<hr />

<form action="addsection2.php" method="post">
<div align="center">
<h2>~ 新增單元 ~</h2>
<table cellpadding="5">
<tr><td colspan="2" align="center">step 1</td></tr>
<tr><td align="right">單元數目: </td><td align="left">
<select name="section_num">
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
</td></tr>
<tr><td colspan="2" align="center">
<input type="submit" value="下一步"> <input type="reset" value="取消"></td></tr>
</table>
</div>

</body>
</html>