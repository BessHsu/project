<?php 
require("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>題庫總覽</title>
</head>

<body>
<?php 
echo $_SESSION['nickname'];
?>你好!
<p><a href="logout.php">登出</a></p>
<p>我的題庫一覽表 [<a href='teacherlist.php?mid=",$rs['id'],"'>我的課程</a>]<p>
<hr />
<p><a href='addsubject.php?mid=",$rs['id'],"'>新增科目</a></p>
<table width="700" border="1">
  <tr>
    <td>subject</td>
  </tr>
<?php
$b=$_SESSION['uID'];
$sql = "select * from qsubject where tid ='$b';";//ASC由小排到大  DESC由大排到小
$results=mysqli_query($conn,$sql);

while ( $rs=mysqli_fetch_array($results)) {
    
    echo "<tr><td>" , $rs['qsubname'] ,
    //"</td><td>" , $rs['欄位名稱'], 
    "<td><a href='try.php?mid=",$rs['qsubname'],"'>進入</a>  </td>",
    "<td><a href='subdelete.php?mid=",$rs['qsid'] ,"'onclick='return confirm(\"Are you sure?\");'>刪除</a>  </td>";
}

?>
</table>
</body>
</html>
