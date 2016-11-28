<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登入失敗</title>
</head>

<body>
<h2>登入失敗!!!</h2>
<p>您所輸入的帳號密碼有誤，等一下頁面會自動跳轉回登入頁面</p>
<?php 
header("refresh:5;url=login.php");
?>
</body>
</html>
