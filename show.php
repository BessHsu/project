<?php 
require("config.php");
$b=$_SESSION['uID'];//老師
$c=$_SESSION['coursename'];//科目名稱
$tmp=$_GET['qcid'];
$_SESSION['qcid'] = $tmp;//單元流水號

$sql_b = "select * from qcourse where qcid = '$tmp' ";
$results_b=mysqli_query($conn, $sql_b);
while( $rs_b=mysqli_fetch_array($results_b)) {
	$sec = $rs_b['section_name'];
	$_SESSION['section_name'] = $sec;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $c;?>之<?php echo $sec;?>題庫總覽</title>
</head>

<body>
<p style="float:left;"><?php echo $_SESSION['nickname'];?>你好!</p>
<p style="float:right;"><a href="logout.php">登出</a></p>
<p style="clear:both;"></p>
<h3><a href="questionbank.php">題庫一覽表</a>&nbsp>&nbsp
科目:<a href="try.php?mid=<?php echo $c;?>"><?php echo $_SESSION['coursename'];?></a>&nbsp>&nbsp
單元名稱:<?php echo $sec;?>
</h3>
<!--
<p><a href='teacherlist.php?mid=",$rs['id'],"'>回課程一覽表</a>&nbsp
<a href='questionbank.php?mid=",$rs['id'],"'>回題庫一覽表</a></p>
-->
<br />
<hr />
<!--<p><a href="insert_type.html">新增題目</a></p>-->
<p><a href='insert_qtype.php?qcid=",$tmp,"'>新增題目</a></p>
<table width="700" border="1">
  <tr>
    <td>編號</td>
	<td>題目</td>
  </tr>
<?php
$i = 1;
$sql = "select * from exam where courseid ='$tmp' ";
$results=mysqli_query($conn,$sql);
while (	$rs=mysqli_fetch_array($results)) {
	echo "<tr><td>" , $i ,"</td>",
	"<td>" , $rs['question'],"</td>", 
	"<td><a href='show_q.php?questionid=",$rs['questionid'],"'>show</a>  </td>",
	"<td><a href='edit.php?questionid=",$rs['questionid'],"'>修改</a> </td>",
	"<td><a href='03_delete.php?questionid=",$rs['questionid'] ,"'onclick='return confirm(\"Are you sure?\");'>刪除</a>  </td>";
	$i++;
}
//echo "$tmp";
?>
</body>
</html>