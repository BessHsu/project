<?php 
require("config.php");
$b=$_SESSION['uID'];//使用者名稱
$c = $_SESSION['coursename'];//科目名稱
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增科目-step2</title>
<link rel="stylesheet" href="mystyle1.css" type="text/css">
</head>
<body>

<?php 
$num = $_POST['section_num'];
$_SESSION['num'] = $num;
//$num = $_SESSION['num'];
?>

<?php 
echo $_SESSION['nickname'];
?>你好!

<h3><a href="questionbank.php">題庫一覽表</a>&nbsp>&nbsp
科目:<a href="try.php?mid=<?php echo $c;?>"><?php echo $c;?></a>&nbsp>&nbsp
</h3>
<br />
<hr />


<form action="addsection3.php" method="post">
<div align="center">
<h2>~ 新增單元 ~</h2>
<table cellpadding="5">
<tr><td colspan="2" align="center">step 2</td></tr>

<?php 
$section=array();
for($i = 0; $i < $num; $i++) {
	echo "<tr><td align='right'>單元名稱 $i : </td><td align='left'><input type='text' name='section[]' required></td></tr>";
}

?>
<tr><td colspan="2" align="center">
<input type="button" value="上一步" onClick="javascript:history.back(1)"><input type="submit" value="送出"> <input type="reset" value="取消"></td></tr>
</table>
</div>
</body>
</html>