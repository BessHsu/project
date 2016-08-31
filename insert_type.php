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
$type = $_POST['type'];
if($type == 1) {
	header("Location: insert_tf.html");
} else if ($type == 2) {
	header("Location: insert_onechoice.html");
} else {
	header("Location: insert_multichoice.html");
}

?>
</div>
<body>
</html>