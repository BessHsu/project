<?php 
require("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>刪除題目</p>
<hr />
<?php
$mid=(int)$_GET['mid'];
$b=$_SESSION['uID'];
//$tmp = $_SESSION['coursename'];

if ($mid > 0) {
	$sql = "select * from qsubject where tid ='$b';";//ASC由小排到大  DESC由大排到小
	$results=mysqli_query($conn,$sql);
	while (	$rs=mysqli_fetch_array($results)) {
		$subjectname = $rs['qsubname'];
	}
	$sql = "delete from exam where subject='$subjectname' AND (userid ='$b')";
	mysqli_query($conn,$sql) or die("MySQL delete job error"); //執行SQL
	$sql = "delete from qcourse where qcname='$subjectname' AND (tid ='$b')";
	mysqli_query($conn,$sql) or die("MySQL delete job error"); //執行SQL
	$sql="delete from qsubject where qsid=$mid;";
	mysqli_query($conn,$sql) or die("MySQL delete job error"); //執行SQL
	//echo "message deleted.";
	header("Location:questionbank.php");
} else {
	echo "empty id, cannot delete.";
}
?>
</body>
</html>
