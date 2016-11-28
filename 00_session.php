<?php
	//Session 使用範例
	session_start(); 
	//啟用session 功能, 必須在php程式還沒輸出任何訊息之前啟用
	$_SESSION["varName"] = "value"; 
	//宣告session 變數並指定值
	$a = $_SESSION["varName"]; 
	//取得session 變數的值
	unset($_SESSION['變數名稱']); 
	//取消session 變數的宣告

	//cookie使用範例
	setcookie("cookieName", "value", time()+3600); 
	// 設定cookie值與有效時間
	$b= $_COOKIE["cookieName"]; 
	//取得cookie的值

	echo $a, $b;
?>