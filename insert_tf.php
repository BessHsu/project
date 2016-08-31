<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>After insert</title>
<style type="text/css">
div {
width: 400px;
margin: 100px auto;
padding: 50px;
border: dotted green 5px
}
</style>
</head>
<body>
<div>
<?php
$question = $_POST['question'];
$whole_answer = $_POST['answer'];
echo "<table>";
echo "<tr><td>問題:</td><td>$question</td></tr>";
echo "<tr><td>正解:</td><td>$whole_answer</td></tr>";
echo "</table>";
?>
</div>
<body>
</html>