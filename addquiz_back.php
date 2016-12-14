<?php 
require("config.php");
$userid=$_SESSION['uID'];//老師帳號
$coursename = $_SESSION['coursename'];//課程名稱

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>完成新增題目</title>
<link rel="stylesheet" href="mystyle1.css" type="text/css">
</head>

<body>
<?php 
echo $_SESSION['nickname'];
?>你好!

<h3><a href="teacherlist.php">課程一覽表</a>&nbsp>&nbsp科目:<?php echo $coursename;?></h3>
<br />
<hr />
<!--
<h3><a href="questionbank.php">題庫一覽表</a>&nbsp>&nbsp
科目:<a href="try.php?mid=<?php //echo $subject;?>"><?php //echo $subject;?></a>&nbsp>&nbsp
-->

<?php 
$qid_f = $_POST['qid_f'];
$whole_qid_f = implode(";",$qid_f);
$quizname = $_POST['QuizName'];
echo "測驗名稱: ".$quizname."<br />";
date_default_timezone_set('Asia/Taipei');
$datetime= date("Y/m/d H:i:s");
echo "建立測驗時間: ".$datetime;
for($c = 0; $c < count($qid_f); $c++) {
	$sql = "select * from exam where questionid = '$qid_f[$c]' ;";
    $results = mysqli_query($conn,$sql);
    //$counter = 0;
	if($rs=mysqli_fetch_array($results)) {
		$d = $c + 1;
		if($rs['type'] == 1) {
		?>
		    
			<div align="center">
			<p>已選取:<?php echo $d;?></p>
            <hr />
			<table>
			<tr><td>單元名稱</td><td><?php echo $rs['section_name']; ?></td></tr>
		    <tr><td>題目</td><td><?php echo $rs['question']; ?></td></tr>
			<tr><td>類型</td><td>是非題</td></tr>
		    <tr><td>正解</td><td><?php echo $answer;?></td></tr>
			</table>
			</div>
		<?php 
		}//end of type=1
		else if ($rs['type'] == 2) {
			$choices = array();
            $choice = $rs['choice'];
            $choices = explode(";", $choice);
		?>
		    
			<div align="center">
			<p>已選取:<?php echo $d;?></p>
            <hr />
			<table>
			<tr><td>單元名稱</td><td><?php echo $rs['section_name']; ?></td></tr>
		    <tr><td>題目</td><td><?php echo $rs['question']; ?></td></tr>
			<tr><td>類型</td><td>單選題</td></tr>
			<tr><td>選項a</td><td><?php echo $choices[0];?></td></tr>
		    <tr><td>選項b</td><td><?php echo $choices[1];?></td></tr>
		    <tr><td>選項c</td><td><?php echo $choices[2];?></td></tr>
		    <tr><td>選項d</td><td><?php echo $choices[3];?></td></tr>
		    <tr><td>正解</td><td><?php echo $rs['answer'];?></td></tr>
			</table>
			</div>
		<?php 
		}//end of type=2 
		else if ($rs['type'] == 3) {
			$choices = array();
            $choice = $rs['choice'];
            $choices = explode(";", $choice);
		?>
		    
			<div align="center">
			<p>已選取:<?php echo $d;?></p>
            <hr />
			<table>
			<tr><td>單元名稱</td><td><?php echo $rs['section_name']; ?></td></tr>
		    <tr><td>題目</td><td><?php echo $rs['question']; ?></td></tr>
			<tr><td>類型</td><td>多選題</td></tr>
			<tr><td>選項a</td><td><?php echo $choices[0];?></td></tr>
		    <tr><td>選項b</td><td><?php echo $choices[1];?></td></tr>
		    <tr><td>選項c</td><td><?php echo $choices[2];?></td></tr>
		    <tr><td>選項d</td><td><?php echo $choices[3];?></td></tr>
		    <tr><td>選項e</td><td><?php echo $choices[4];?></td></tr>
		    <tr><td>正解</td><td><?php echo $rs['answer'];?></td></tr>
			</table>
			</div>
	
		<?php 
		}//end of type=3 
		else {
		?>
			<p>找不到此題目</p>
		<?php 
		}
	}
}
error_reporting(0);
if ($qid_f) {
    $sql_3 = "insert into quiz (testname, builder, builddate , questionid) values ('$quizname','$userid','$datetime','$whole_qid_f');";
    mysqli_query($conn,$sql_3) or die("MySQL insert question error"); //執行SQL
}

?>


</body>
</html>