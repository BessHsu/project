<?php 
require("config.php");
$b=$_SESSION['uID'];//使用者名稱
$c = $_SESSION['coursename'];//科目名稱
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>刪除單元</p>
<hr />
<?php
$qcid=(int)$_GET['qcid'];
//$b=$_SESSION['uID'];
//$tmp = $_SESSION['coursename'];

if ($qcid > 0) {
	/*$sql = "select * from qcourse where qcid ='$qcid'";
	$results=mysqli_query($conn,$sql);
	while (	$rs=mysqli_fetch_array($results)) {
		$tmp_sec = $rs['section_name'];
	}*/
	//$sql = "select * from qcourse where tid ='$b' AND (qcname = '$tmp')";
	$sql="delete from qcourse where qcid=$qcid;";
	mysqli_query($conn,$sql) or die("MySQL delete job error"); //執行SQL
	$sql="delete from exam where courseid=$qcid;";
	mysqli_query($conn,$sql) or die("MySQL delete job error"); //執行SQL
	//echo "message deleted.";
	header("Location:try.php?mid=".$c);
} else {
	echo "empty id, cannot delete.";
}
?>
</body>
</html>
