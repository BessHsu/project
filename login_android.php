<?php 
$host = 'localhost';
$user = 'irsdb';
$pass = '11101205';
$db = 'irsdb';
$conn = mysqli_connect($host, $user, $pass, $db) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
mysqli_query($conn,"SET NAMES utf8"); //選擇編碼

 $number = $_POST['number'];//android將會傳值到number

 $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
  
  //mysql_query("SET NAMES 'utf8'");
  //mysql_select_db($dbname);   
  //$sql = "select * from 表單名稱 where number = ".$number;
  $sql = "select * from userinfo where userid = ".$userid;
  $result = mysql_query($sql) or die('MySQL query error');
  
  while($row = mysql_fetch_array($result))
  {
   echo $row['username']." 你好";
   //echo $row['class']."<br>";   
  }
?>