<?php 
require("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科目已新增</title>
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

<div>
已新增科目及單元之詳細資料
<hr />
<table>
<?php 
$tid = $_SESSION['uID'];
$num = $_SESSION['num'];
$subject = $_SESSION['subject'];
$arrSec = $_POST['section'];
$cnt = count($arrSec);
$sql = "insert into qsubject (tid, qsubname) values ('$tid','$subject');";
mysqli_query($conn,$sql) or die("MySQL insert message error"); //執行SQL
echo "<tr><td>科目:</td><td>$subject</td></tr>";
		
for($i = 0; $i < $cnt; $i++) {
	$tmp = $arrSec[$i];
	$section_name=mysqli_real_escape_string($conn, $tmp);
	if($section_name) {
		$sql = "insert into qcourse (tid, qcname, section_name) values ('$tid','$subject','$section_name');";
		mysqli_query($conn,$sql) or die("MySQL insert message error"); //執行SQL
	    echo "<tr><td>單元$i:</td><td>$section_name</td></tr>";
		//echo $section_name;
	} else {
		echo "empty section_name, cannot insert.";
	}
}
?>
</table>
<?php 
unset($_SESSION['subject']);
unset($_SESSION['num']);
?>
</div>
</body>
</html>
