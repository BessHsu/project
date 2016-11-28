<?php 
require("config.php");
$courseid = $_SESSION['courseid'];//課程代號
$userid=$_SESSION['uID'];//老師帳號
$coursename = $_SESSION['coursename'];//課程名稱
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $coursename;?>新增測驗</title>
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

<h3><a href="teacherlist.php">課程一覽表</a>&nbsp>&nbsp科目:<?php echo $coursename;?></h3>
<br />
<hr />
<form action="addquiz3.php" method="post">
<div align="center">
<h2>~ 新增測驗 ~</h2>
<table cellpadding="5">
<tr><td colspan="2" align="center">step 2</td></tr>
<?php 
$num = $_POST['n'];//要新增的總數
$str = '%'.$coursename.'%';
//$sql = "select * from qcourse where tid = '$userid' AND (qcname like $str) ;";
$sql = "select * from qcourse where tid = '$userid' AND (qcname like '$str') ;";


$results = mysqli_query($conn,$sql);
$i=0;
$choice_section = array();
$choice_sectionID = array();
while($rs=mysqli_fetch_array($results)) {
	$choice_sectionID[$i] = $rs['qcid'];
	$choice_section[$i] = $rs['section_name'];
	$i++;
}
for($i = 0; $i < $num; $i++) {
	?>
	<tr>
	<td align='right'>單元名稱</td>
	<td align='left'>
	<select name="sec">
	<?php 
	for($a = 0; $a < count($choice_sectionID); $a++) {	
	?>
	    <option value="<?php echo $choice_sectionID[$a];?>"><?php echo $choice_section[$a];?></option>
	<?php 
	}
	?>
	
	</select>
	</td>
	</tr>
	<tr>
	<td align='right'>
	所選題目
	</td>
	<tr>
<?php 
}
?>
<tr><td colspan="2" align="center">
<input type="submit" value="下一步"> <input type="reset" value="取消"></td></tr>
</table>
</div>
</form>

</body>
</html>
