<?php 
require("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改中</title>
</head>

<body>
<?php 
echo $_SESSION['nickname'];
?>你好!
<p>修改中 </p>
<hr />
<table width="200" border="1">
  <tr>
    <td>題目</td>
    <td>選項</td>
    <td>答案</td>
	<!--
	<td>科目</td>
	<td>單元名稱</td>
	-->
  </tr>
<?php
$host = 'localhost';
$user = 'irsdb';
$pass = '11101205';
$db = 'irsdb';

$conn = mysqli_connect($host, $user, $pass,$db) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
mysqli_query($conn,"SET NAMES utf8"); //選擇編碼
//mysql_select_db($db, $conn); //選擇資料庫
$questionid=(int)$_GET['questionid'];
if ($questionid <=0) {
	echo "empty ID";
	exit(0);
} 
$sql = "select * from exam where questionid=$questionid;";
$results=mysqli_query($conn,$sql);
if ($rs=mysqli_fetch_array($results)) {
?>
<table>
  <tr><form method="post" action="04_update.php">
    <td><label>
      <input type="hidden" name="mid" value="<?php echo $rs['questionid']; ?>" >
      <input type="submit" name="Submit" value="送出" />
    </label></td>
    <td><label>
      <input name="question" type="text" id="question" value=<?php echo $rs['question']; ?>>
    </label></td>
    <td><label>
      <input name="choice" type="text" id="choice" value=<?php echo $rs['choice']; ?>>
    </label></td>
	<td><label>
      <input name="answer" type="text" id="answer" value=<?php echo $rs['answer']; ?>>
    </label></td>
    <!--
	<td><label>
      <input name="subject" type="text" id="subject" value=<?php echo $rs['subject']; ?>>
    </label></td>
	<td><label>
      <input name="section_name" type="text" id="section_name" value=<?php echo $rs['section_name']; ?>>
    </label></td>
	-->
	</form>
  </tr>
</table>

<?php
} else echo "cannot find the question to edit.";
?>
</body>
</html>
