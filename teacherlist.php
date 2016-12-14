<?php 
require("config.php");
$b=$_SESSION['uID'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>課程主頁</title>
<link rel="stylesheet" href="mystyle.css" type="text/css">
</head>

<body>
<p style="float:left;"><?php echo $_SESSION['nickname'];?>你好!</p>
<p style="float:right;"><a href="logout.php">登出</a></p>
<p style="clear:both;"></p>
<p>我的課程 [<a href='questionbank.php?mid=",$rs['id'],"'>我的題庫總攬</a>]<p>
<hr />
<p><a href='newClass.php?'>新增課程</a></p>

<table width="700" border="1">
  <tr>
    <td>學期</td>
    <td>科目</td>
  </tr>
<?php
$sql = "select * from course where userid ='$b';";
$results=mysqli_query($conn,$sql);

while ( $rs=mysqli_fetch_array($results)) {
//同餘
?>
    
    <tr>
    <td><?php echo substr($rs['courseid'], 0, 4);?></td>
    <td><?php echo $rs['coursename'];?></td>
    <!--
	<td><a href="addquiz.php?courseid=<?php echo $rs['courseid'];?>">新增測驗</a></td>
	-->
	<td><a href="ttt.php?courseid=<?php echo $rs['courseid'];?>">新增測驗</a></td>
    <td><a href="quiz_all.php?courseid=<?php echo $rs['courseid']?>">檢視測驗</a></td>
    </tr>
    
<?php 
    $t = "%".$rs['coursename']."%";
    $sql_1116 = "select * from qsubject where tid = '$b' AND (qsubname like '$t') ;";
	$results_1116=mysqli_query($conn,$sql_1116);
	$flag_1116 = 0;
    while ( $rs_1116=mysqli_fetch_array($results_1116)) {
         $flag_1116 = 1;
		 //$sql = "insert into qsubject (tid, qsubname) values ('$b','$rs['coursename']');";
		 //mysqli_query($conn,$sql) or die("MySQL insert message error"); //執行SQL
		 //echo "通知:你尚未建立科目:".$rs['coursename']."的題庫，系統已自動幫您新增";
	}
	if($flag_1116 == 0) {
		$sqlcou = $rs['coursename'];
		$sql_1116_i = "insert into qsubject (tid, qsubname) values ('$b','$sqlcou');";
		mysqli_query($conn,$sql_1116_i) or die("MySQL insert message error"); //執行SQL
		echo "通知:你尚未建立科目:".$rs['coursename']."的題庫，系統已自動幫您新增";
	} else {
		//
	}
}
?>
</table>
</body>
</html>
