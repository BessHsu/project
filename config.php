<?php
//將所有頁面會用到的都放在這裡，需要使用再用require("congig.php")呼叫,but login.php可能會有問題
session_start();
$host = 'localhost'; 
$user = 'irsdb';
$pass = '11101205';
$db = 'irsdb';
$conn = mysqli_connect($host, $user, $pass,$db) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
mysqli_query($conn,"SET NAMES utf8"); //選擇編碼
//mysql_select_db($db, $conn); //選擇資料庫

if(!isset( $_SESSION["uID"]))
	header("Location:login.php");
	
if($_SESSION["uID"]=="")
	header("Location:login.php");

?>