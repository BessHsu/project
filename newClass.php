<?php 
require("config.php");
$userid = $_SESSION['uID'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>填寫課程-老師</title>
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
<link rel="stylesheet" href="mystyle.css" type="text/css">
</head>

<body>
<p style="float:left;"><?php echo $_SESSION['nickname'];?>你好!</p>
<p style="float:right;"><a href="logout.php">登出</a></p>
<p style="clear:both;"></p>
<h1>填寫課程</h1>
<a href='teacherlist.php?mid="$userid"'>我的課程</a>
</p>
<hr />

<form method="post" action="newClass_back.php">
<p>請於下方填寫您下學期所要教授的科目</p>
<input type="hidden" name="userid" value="<?php echo $userid;?>">
<table>
<tr><td><span class="hint--bottom" data-hint="課程名稱">課程一 : </span></td><td><input type="text" name="course1"></td></tr>
<tr><td>課程二 : </td><td><input type="text" name="course2"></td></tr>
<tr><td>課程三 : </td><td><input type="text" name="course3"></td></tr>
<tr><td>課程四 : </td><td><input type="text" name="course4"></td></tr>
<tr><td>課程五 : </td><td><input type="text" name="course5"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="提交"></td></tr>
</table>
</form>

</body>
</html>
