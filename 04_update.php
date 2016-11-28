<?php 
require("config.php");
$b=$_SESSION['uID'];//老師
$c=$_SESSION['coursename'];//科目名稱
$id=(int)$_POST['mid'];//題目流水號
$qcid = $_SESSION['qcid'];//單元流水號
$sec=$_SESSION['section_name'];//單元名稱

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改後</title>
<style type="text/css">
table tr td {
background-color: #cfc;
padding: 10px;
}
div {
width: 400px;
margin: 100px auto;
padding: 50px;
border: dotted green 5px
}
</style>
</head>

<body>

<?php 
echo $_SESSION['nickname'];
?>你好!

<h3><a href="questionbank.php">題庫一覽表</a>&nbsp>&nbsp
科目:<a href="try.php?mid=<?php echo $c;?>"><?php echo $_SESSION['coursename'];?></a>&nbsp>&nbsp
單元名稱:<a href="show.php?qcid=<?php echo $qcid;?>"><?php echo $sec;?></a>
</h3>

<hr />
<p>對應題庫中題目編號&nbsp<?php echo $id; ?> 修改後的詳細資料</p>
<div align="center">
<table>

<?php
$question=mysqli_real_escape_string($conn, $_POST['question']   );
?>

<tr><td>科目</td><td><?php echo $c; ?></td></tr>
<tr><td>單元名稱</td><td><?php echo $sec; ?></td></tr>
<tr><td>題目</td><td><?php echo $question; ?></td></tr>

<?php  
$type=(int)$_POST['type'];
if($type == 1) {
	//$whole_answer = $_POST['answer'];
	$answer=mysqli_real_escape_string($conn,$_POST['answer']);
	if ($id>0) {
		$sql = "update exam set question='$question', answer='$answer' where questionid=$id;";
		mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
	?>
		<tr><td>類型</td><td>是非題</td></tr>
		<tr><td>正解</td><td><?php echo $answer;?></td></tr>
		
	<?php 	
	} else {
		//echo "empty question id.";
	}
} else if ($type == 2) {
	$a = $_POST['choice_a'];
	$b = $_POST['choice_b'];
	$c = $_POST['choice_c'];
	$d = $_POST['choice_d'];
	$whole_choice = $a.";".$b.";".$c.";".$d;
	//$whole_answer = $_POST['answer'];
	$choice=mysqli_real_escape_string($conn,$whole_choice);
	$answer=mysqli_real_escape_string($conn,$_POST['answer']);
	if ($id>0) {
		$sql = "update exam set question='$question', choice='$choice', answer='$answer' where questionid=$id;";
		mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
	?>
		
		<tr><td>類型</td><td>單選題</td></tr>
		<tr><td>選項a</td><td><?php echo $a;?></td></tr>
		<tr><td>選項b</td><td><?php echo $b;?></td></tr>
		<tr><td>選項c</td><td><?php echo $c;?></td></tr>
		<tr><td>選項d</td><td><?php echo $d;?></td></tr>
		<tr><td>正解</td><td><?php echo $answer;?></td></tr>
		
	<?php 	
	} else {
		//echo "empty question id.";
	}
} else if($type ==3) {
	$a = $_POST['choice_a'];
	$b = $_POST['choice_b'];
	$c = $_POST['choice_c'];
	$d = $_POST['choice_d'];
	$e = $_POST['choice_e'];
	$whole_choice = $a.";".$b.";".$c.";".$d.";".$e;
	$answers = $_POST['answer'];
	$whole_answer = implode(";",$answers);
	$choice=mysqli_real_escape_string($conn,$whole_choice);
	$answer=mysqli_real_escape_string($conn,$whole_answer);
	if ($id>0) {
		$sql = "update exam set question='$question', choice='$choice', answer='$answer' where questionid=$id;";
		mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
	?>	
		
		<tr><td>類型</td><td>多選題</td></tr>
		<tr><td>選項a</td><td><?php echo $a;?></td></tr>
		<tr><td>選項b</td><td><?php echo $b;?></td></tr>
		<tr><td>選項c</td><td><?php echo $c;?></td></tr>
		<tr><td>選項d</td><td><?php echo $d;?></td></tr>
		<tr><td>選項e</td><td><?php echo $e;?></td></tr>
		<tr><td>正解</td><td><?php echo $answer;?></td></tr>
		
	<?php 	
	} else {
		//echo "empty question id.";
	}
}
?>
</table>
</body>
</html>
