<?php 
require("config.php");
$tmp=$_GET['testid'];
$courseid = $_SESSION['courseid'];//課程代號
$userid=$_SESSION['uID'];//老師帳號

//尋找課程名稱，用$coursename存
$sql = "select * from course where userid ='$userid' AND (courseid = '$courseid')";
$results=mysqli_query($conn,$sql);
while ( $rs=mysqli_fetch_array($results)) {
	$coursename = $rs['coursename'];//課程名稱
	break;
}
$sql = "select * from quiz where testid ='$tmp';";
$results=mysqli_query($conn,$sql);
while ( $rs=mysqli_fetch_array($results)) {
	$testname = $rs['testname'];//測驗名稱
	break;
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $testname;?>測驗總覽-學生回答情況</title>
</head>

<body>
<p style="float:left;"><?php echo $_SESSION['nickname'];?>你好!</p>
<p style="float:right;"><a href="logout.php">登出</a></p>
<p style="clear:both;"></p>
<h3><a href="teacherlist.php">課程一覽表</a>&nbsp>&nbsp
<a href="quiz_all.php?courseid=<?php echo $courseid;?>">科目:<?php echo $coursename;?>測驗一覽表</a>&nbsp>&nbsp
測驗名稱:<?php echo $testname;?>
</h3>

<!--
<p><a href='teacherlist.php?mid=",$rs['id'],"'>回課程一覽表</a>&nbsp
<a href='questionbank.php?mid=",$rs['id'],"'>回題庫一覽表</a></p>
-->
<br />
<hr />
<table width="400" border="1">
<tr>
<td>編號</td>
<td>學生名字</td>
<td>建立日期</td>
<td>查看成績</td>
<td>開始測驗</td>
</tr>
<?php 
$sql = "select * from score where testid ='$tmp';";
$results=mysqli_query($conn,$sql);
while ( $rs=mysqli_fetch_array($results)) {
	$coursename = $rs['coursename'];//課程名稱
	break;
}

?>

</table>

</body>
</html>