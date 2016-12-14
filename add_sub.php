<?php 
require("config.php");
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
echo $_SESSION['nickname'];
?>你好!
<h3><a href="questionbank.php">題庫一覽表</a></h3>
<br />
<br />
<hr />

<?php 
//$num = $_POST['section_num'];
//$_SESSION['num'] = $_POST['section_num'];
$b = $_SESSION['uID'];
$sub = $_SESSION['subject'];
$num = $_SESSION['num'];
?>

<form action="add.php" method="post">
<div align="center">
<table cellpadding="5">
<tr><td colspan="2" align="center">step 2</td></tr>

<?php 
//echo $sub;
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