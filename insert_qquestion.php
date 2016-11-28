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
<title>新增題目-step2</title>
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
<form id="f1" name ="f1" action="insert_qback.php?qcid=',$courseid,'" method="post" >
<div align="center">
<table>
<tr><td colspan="2" align="center">step 2</td></tr>
<tr><td align="right">題目:</td>
<td align="left">
<textarea name="question" cols="30" rows="6" required></textarea>
</td>
</tr>
<?php 
$type = (int)$_POST['type'];
$_SESSION['type'] = $type;
if($type == 1) {
?>
	<tr><td align="right">正解: </td><td align="left">
	<input type="radio" name="answer" value="true" required>True</br>
	<input type="radio" name="answer" value="false" required>False
	</td></tr>
	<tr><td colspan="2" align="center">
	<input type="button" value="上一步" onClick="javascript:history.back(1)"><input type="submit" value="完成"><input type="reset" value="取消"></td></tr>
<?php 
}//end of type = 1
else if ($type == 2) {
?>
	<tr><td align="right">選項a:</td>
    <td align="left">
    <textarea name="choice_a" required></textarea>
    </td></tr>
    <tr><td align="right">選項b:</td>
    <td align="left">
    <textarea name="choice_b" required></textarea>
    </td></tr>
    <tr><td align="right">選項c:</td>
    <td align="left">
    <textarea name="choice_c" required></textarea>
    </td></tr>
    <tr><td align="right">選項d:</td>
    <td align="left">
    <textarea name="choice_d" required></textarea>
    </td></tr>
    <tr><td align="right">正解: </td><td align="left">
	<input type="radio" name="answer" value="a" required>a
	<input type="radio" name="answer" value="b" required>b
	<input type="radio" name="answer" value="c" required>c
	<input type="radio" name="answer" value="d" required>d
	</td></tr>
	<tr><td colspan="2" align="center">
	<input type="button" value="上一步" onClick="javascript:history.back(1)"><input type="submit" value="完成"><input type="reset" value="取消"></td></tr>
<?php 
}//end of type = 2
else if ($type == 3) {
?>

	<tr><td align="right">選項a:</td>
    <td align="left">
    <textarea name="choice_a" required></textarea>
    </td></tr>
    <tr><td align="right">選項b:</td>
    <td align="left">
    <textarea name="choice_b" required></textarea>
    </td></tr>
    <tr><td align="right">選項c:</td>
    <td align="left">
    <textarea name="choice_c" required></textarea>
    </td></tr>
    <tr><td align="right">選項d:</td>
    <td align="left">
    <textarea name="choice_d" required></textarea>
    </td></tr>
    <tr><td align="right">選項e:</td>
    <td align="left">
    <textarea name="choice_e" required></textarea>
    </td></tr>
    <tr><td align="right">正解: </td><td align="left">
    <input type="checkbox" name="answer[]" value="a">a
	<input type="checkbox" name="answer[]" value="b">b
	<input type="checkbox" name="answer[]" value="c">c
	<input type="checkbox" name="answer[]" value="d">d
	<input type="checkbox" name="answer[]" value="e">e
	</td></tr>
	<tr><td colspan="2" align="center">
	<input type="button" value="上一步" onClick="javascript:history.back(1)"><input type="submit" value="完成"><input type="reset" value="取消"></td></tr>
<?php 
}//end of type = 3
else {
?>
	<p>你還未勾選您所要的題型，請在上面勾選</p>
	<tr><td colspan="2" align="center">
	<input type="button" value="上一步" onClick="javascript:history.back(1)"><input type="submit" value="完成"><input type="reset" value="取消"></td></tr>
<?php 
}//end of type = others
?>
</table>
</div>
</form>
</body>
</html>