<?php 
require("config.php");
$courseid = $_SESSION['qcid'];//單元流水號
$subject = $_SESSION['coursename'];//科目名稱
$sec=$_SESSION['section_name'];//單元名稱


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增題目-step1</title>
<style type="text/css">
table tr td {
background-color: #cfc;
padding: 10px;
}
div {
margin: 100px auto;
background-color: #ffc;
width: 400px;
padding: 50px 100px;
border: dotted green 5px;
}
</style>
</head>

<body>
<?php 
echo $_SESSION['nickname'];
?>你好!

<h3><a href="questionbank.php">題庫一覽表</a>&nbsp>&nbsp
科目:<a href="try.php?mid=<?php echo $subject;?>"><?php echo $subject;?></a>&nbsp>&nbsp
單元名稱:<a href="show.php?qcid=<?php echo $courseid;?>"><?php echo $sec;?></a>
</h3>
<hr />

<form id="f1" name ="f1" action="insert_qquestion.php?qcid=',$courseid,'" method="post">
<div align="center">
<h2>~ 新增題目 ~</h2>
<table cellpadding="5">
<tr><td colspan="2" align="center">step 1</td></tr>
<tr><td align="right">題型:</td>
<td align="left">
<input type="radio" name="type" value="1">是非題
<input type="radio" name="type" value="2">單選題
<input type="radio" name="type" value="3">多選題
</td></tr>
<tr><td colspan="2" align="center">
<input type="submit" value="下一步"><input type="reset" value="取消"></td></tr>
</table>
</div>
</form>
</body>
</html>