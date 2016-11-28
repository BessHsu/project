<?php 
require("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增科目-step1</title>
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
<h3><a href="questionbank.php">題庫一覽表</a></h3>
<br />
<br />
<hr />
<form action="add_test.php" method="post">
<div align="center">
<h2>新增科目</h2>
<p>
請先輸入科目名稱</br>
輸入完後，</br>
請選擇您在此科目預設要有多少單元</br>
</p>
</hr>
<table cellpadding="5">
<tr><td colspan="2" align="center">step 1</td></tr>
<tr><td align="right">科目名稱: </td><td align="left"><input type="text" name="subject" required></td></tr>
<tr><td align="right">單元數目: </td><td align="left">
<select name="section_num">
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
</select>
</td></tr>
<tr><td colspan="2" align="center">
<input type="submit" value="送出"> <input type="reset" value="取消"></td></tr>
</table>
</div>

</body>
</html>