<?php 
require("config.php");
$qcid = $_SESSION['qcid'];//單元流水號

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
$host = 'localhost';
$user = 'irsdb';
$pass = '11101205';
$db = 'irsdb';
$conn = mysqli_connect($host, $user, $pass,$db) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
mysqli_query($conn,"SET NAMES utf8"); //選擇編碼
//mysql_select_db($db, $conn); //選擇資料庫

//$tmp = $_SESSION['qcid'];
$questionid=(int)$_GET['questionid'];
if ($questionid > 0) {
	//$sql = "delete from guestbook where mid=$id;"; //可以復原(不刪除而是用做記號 被做記號的是1沒做記號是0 顯示只顯示0)
	$sql="delete from exam where questionid=$questionid;";
	mysqli_query($conn,$sql) or die("MySQL delete job error"); //執行SQL
	//echo "message deleted.";
	header("Location:show.php?qcid=".$qcid);
} else {
	echo "empty id, cannot delete.";
}
?>
</body>
</html>
