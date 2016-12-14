<?php 
require("config.php");
$b=$_SESSION['uID'];//老師
$c=$_SESSION['coursename'];//科目名稱
$qid = (int)$_GET['questionid'];//題目流水號
$qcid = $_SESSION['qcid'];//單元流水號
$sec=$_SESSION['section_name'];//單元名稱

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>題目細項</title>
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
<p style="float:left;"><?php echo $_SESSION['nickname'];?>你好!</p>
<p style="float:right;"><a href="logout.php">登出</a></p>
<p style="clear:both;"></p>
<h3><a href="questionbank.php">題庫一覽表</a>&nbsp>&nbsp
科目:<a href="try.php?mid=<?php echo $c;?>"><?php echo $_SESSION['coursename'];?></a>&nbsp>&nbsp
單元名稱:<a href="show.php?qcid=<?php echo $qcid;?>"><?php echo $sec;?></a>
</h3>
<br />

<hr/>
<div align="center">
<p>對應題庫中題目編號&nbsp<?php echo $qid; ?> 的詳細資料</p>
<hr />
<table>
<?php 
$flag = 0;

if ($qid <=0) {
    echo "empty ID";
    exit(0);
}
$sql = "select * from exam where questionid=$qid;";
$results=mysqli_query($conn,$sql);
if ($rs=mysqli_fetch_array($results)) {
	//$questionid = $rs['questionid'];
    $question = $rs['question'];
    $subject = $rs['subject'];
	$section_name = $rs['section_name'];
	$type = $rs['type'];
    if($type != 1) {
        $choices = array();
        $choice = $rs['choice'];
        $choices = explode(";", $choice);
    }
    $answer = $rs['answer'];
    $flag = 1;
} else {
    //echo "cannot find the question to edit.";
    $flag = 0;
    //exit(0);
}
if($flag == 1) {
?>
    <!--<tr><td>題目編號</td><td><?php echo $qid; ?></td></tr>-->
	<tr><td>科目</td><td><?php echo $subject; ?></td></tr>
	<tr><td>單元名稱</td><td><?php echo $section_name; ?></td></tr>
	<tr><td>題目</td><td><?php echo $question; ?></td></tr>
	
	<?php 
	if($type == 1) {
	?>
		<tr><td>類型</td><td>是非題</td></tr>
		<tr><td>正解</td><td><?php echo $answer;?></td></tr>
	<?php 
	}//end of type = 1
	else if ($type == 2) {
	?>
		<tr><td>類型</td><td>單選題</td></tr>
		<tr><td>選項a</td><td><?php echo $choices[0];?></td></tr>
		<tr><td>選項b</td><td><?php echo $choices[1];?></td></tr>
		<tr><td>選項c</td><td><?php echo $choices[2];?></td></tr>
		<tr><td>選項d</td><td><?php echo $choices[3];?></td></tr>
		<tr><td>正解</td><td><?php echo $answer;?></td></tr>
	<?php 
	}//end of type = 2
	else if($type == 3){
	?>
		<tr><td>類型</td><td>多選題</td></tr>
		<tr><td>選項a</td><td><?php echo $choices[0];?></td></tr>
		<tr><td>選項b</td><td><?php echo $choices[1];?></td></tr>
		<tr><td>選項c</td><td><?php echo $choices[2];?></td></tr>
		<tr><td>選項d</td><td><?php echo $choices[3];?></td></tr>
		<tr><td>選項e</td><td><?php echo $choices[4];?></td></tr>
		<tr><td>正解</td><td><?php echo $answer;?></td></tr>
	<?php 
	}//end of type = 3
	?>
<?php 
}//end of flag = 1
else {
?>
<p>找不到此題目</p>
<?php 
}//end of flag = 0
?>






<!--
<table>
    <tr><td>題目編號</td><td><?php echo $rs['questionid']; ?></td></tr>
	<tr><td>題目</td><td><?php echo $rs['question']; ?></td></tr>
	<tr><td>選項</td><td><?php echo $rs['choice']; ?></td></tr>
	<tr><td>答案</td><td><?php echo $rs['answer']; ?></td></tr>
	<tr><td>科目</td><td><?php echo $rs['subject']; ?></td></tr>
	<tr><td>單元名稱</td><td><?php echo $rs['section_name']; ?></td></tr>
</table>
-->
<?php 
//} else 
//	echo "can't find the question!";
?>
</table>
</div>
</body>
</html>