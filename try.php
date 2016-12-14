<?php 
require("config.php");
$b=$_SESSION['uID'];//使用者名稱
$tmp=$_GET['mid'];
$_SESSION['coursename'] = $tmp;//科目名稱

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $tmp;?>題庫總覽</title>
<link rel="stylesheet" href="mystyle.css" type="text/css">
</head>

<body>
<p style="float:left;"><?php echo $_SESSION['nickname'];?>你好!</p>
<p style="float:right;"><a href="logout.php">登出</a></p>
<p style="clear:both;"></p>
<h3><a href="questionbank.php">題庫一覽表</a>&nbsp>&nbsp科目:<?php echo $_SESSION['coursename'];?></h3>

<!--
<p><a href='teacherlist.php?mid=",$rs['id'],"'>回課程一覽表</a>&nbsp
<a href='questionbank.php?mid=",$rs['id'],"'>回題庫一覽表</a></p>
-->
<br />
<hr />
<p><a href='addsection.php?mid=",$rs['id'],"'>新增單元</a></p>
<table width="700" border="1">
  <tr>
    <td>編號</td>
	<td>章節名稱</td>
  </tr>
<?php
$i=1;
$sql = "select * from qcourse where tid ='$b' AND (qcname = '$tmp')";
$results=mysqli_query($conn,$sql);
while (	$rs=mysqli_fetch_array($results)) {
	echo "<tr><td>" , $i ,"</td>",
	//"<tr><td>" , $rs['qcid'] ,"</td>",
	"<td>" , $rs['section_name'],"</td>", 
	"<td><a href='show.php?qcid=",$rs['qcid'],"'>進入</a>  </td>",
	"<td><a href='secdelete.php?qcid=",$rs['qcid'] ,"'onclick='return confirm(\"Are you sure?\");'>刪除</a>  </td>";
	$i++;//5062
}
//echo "$tmp";
?>
