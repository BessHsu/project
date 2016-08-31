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
$a = $_POST['choice_a'];
$b = $_POST['choice_b'];
$c = $_POST['choice_c'];
$d = $_POST['choice_d'];
$e = $_POST['choice_e'];
$whole_choice = $a.";".$b.";".$c.";".$d.";".$e;
$answers = $_POST['answer'];
$whole_answer = implode(";",$answers);

echo "<table>";
echo "<tr><td>問題:</td><td>$question</td></tr>";
echo "<tr><td>選項:</td><td>$whole_choice</td></tr>";
echo "<tr><td>正解:</td><td>$whole_answer</td></tr>";
echo "</table>";
?>
</div>
<body>
</html>