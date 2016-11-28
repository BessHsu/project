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
<title>完成新增題目</title>
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


<hr/>
<div align="center">
<p>新增結果</p>
<hr />
<table>

<?php
$type = $_SESSION['type'];//題型
$subject = $_SESSION['coursename'];//科目名稱
$courseid = $_SESSION['qcid'];//單元流水號
$userid = $_SESSION['uID'];//老師
    $sql_b = "select * from qcourse where qcid = '$courseid' ";
    $results_b=mysqli_query($conn, $sql_b);
    while( $rs_b=mysqli_fetch_array($results_b)) {
        $sec = $rs_b['section_name'];//單元名稱
}
?>

<tr><td>科目</td><td><?php echo $subject; ?></td></tr>
<tr><td>單元名稱</td><td><?php echo $sec; ?></td></tr>

<?php 
if($type == 1) {
    $question = $_POST['question'];
    $whole_answer = $_POST['answer'];
    if ($question) { //留言一定要有標題
        $sql = "insert into exam (courseid, question , answer, type, userid, subject, section_name) values ('$courseid','$question','$whole_answer','$type','$userid','$subject','$sec');";
        mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
    
    ?>
        <tr><td>題目</td><td><?php echo $question; ?></td></tr>
        <tr><td>類型</td><td>是非題</td></tr>
        <tr><td>正解</td><td><?php echo $whole_answer;?></td></tr>
<?php   
    } else {
        echo "empty";
    }
} else if ($type == 2) {
    $question = $_POST['question'];
    $a = $_POST['choice_a'];
    $b = $_POST['choice_b'];
    $c = $_POST['choice_c'];
    $d = $_POST['choice_d'];
    $whole_choice = $a.";".$b.";".$c.";".$d;
    $whole_answer = $_POST['answer'];
    if ($question) {
        $sql = "insert into exam (courseid, question, choice, answer, type, userid, subject, section_name) values ('$courseid','$question','$whole_choice','$whole_answer','$type','$userid','$subject','$sec');";
        mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
    ?>
        <tr><td>題目</td><td><?php echo $question; ?></td></tr>
        <tr><td>類型</td><td>單選題</td></tr>
        <tr><td>選項a</td><td><?php echo $a;?></td></tr>
        <tr><td>選項b</td><td><?php echo $b;?></td></tr>
        <tr><td>選項c</td><td><?php echo $c;?></td></tr>
        <tr><td>選項d</td><td><?php echo $d;?></td></tr>
        <tr><td>正解</td><td><?php echo $whole_answer;?></td></tr>
<?php 
    } else {
        echo "empty question, cannot insert.";
    }
} else if ($type == 3){
    $question = $_POST['question'];
    $a = $_POST['choice_a'];
    $b = $_POST['choice_b'];
    $c = $_POST['choice_c'];
    $d = $_POST['choice_d'];
    $e = $_POST['choice_e'];
    $whole_choice = $a.";".$b.";".$c.";".$d.";".$e;
    
    error_reporting(E_ALL ^ E_NOTICE);
    if ($_POST['answer']) {
        $answers = $_POST['answer'];
        $whole_answer = implode(";",$answers);
        $sql = "insert into exam (courseid, question, choice, answer, type, userid, subject, section_name) values ('$courseid','$question','$whole_choice','$whole_answer','$type','$userid','$subject','$sec');";
        mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
    ?>
        <tr><td>題目</td><td><?php echo $question; ?></td></tr>
        <tr><td>類型</td><td>多選題</td></tr>
        <tr><td>選項a</td><td><?php echo $a;?></td></tr>
        <tr><td>選項b</td><td><?php echo $b;?></td></tr>
        <tr><td>選項c</td><td><?php echo $c;?></td></tr>
        <tr><td>選項d</td><td><?php echo $d;?></td></tr>
        <tr><td>選項e</td><td><?php echo $e;?></td></tr>
        <tr><td>正解</td><td><?php echo $whole_answer;?></td></tr>
<?php 
    } else {
        //echo "empty question, cannot insert.";
		
        ?>
            <h4>您的答案未填寫，請重新新增題目</h4>
        <?php 
    }

} else {
    echo "nothing";
}

?>
</div>
</body>
</html>