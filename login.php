<?php 
session_start();
$host = 'localhost';
$user = 'irsdb';
$pass = '11101205';
$db = 'irsdb';
$conn = mysqli_connect($host, $user, $pass,$db) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
mysqli_query($conn,"SET NAMES utf8"); //選擇編碼
//mysql_select_db($db, $conn); //選擇資料庫

$_SESSION['uID'] = "";
//只要在跑這個php之前login的到這行會有logout的效果，才能重新login
if(isset( $_POST['id'])){
    $userName = $_POST['id'];
    $passWord = $_POST['pwd'];
}else
{
    $userName ="";
    $passWord ="";
}

        $sql = "SELECT * FROM userinfo WHERE userid='" . $userName . "' AND pwd= '" . $passWord . "'";
        if($userName !="" && $passWord !=""){
            if ($result = mysqli_query($conn,$sql)) {
                if ($row=mysqli_fetch_array($result)) {
                    if($row['status'] == 1) {
                        $_SESSION['uID'] = $row['userid'];
                        $_SESSION['nickname']=$row['username'];
                        header("Location:teacherlist.php");
                    } else if ($row['status'] == 0)
                        echo "很抱歉".$row['username']."同學您的身分為學生，所以您無權登入";
                        //$_SESSION['uID'] = $row['userid'];
                        //$_SESSION['nickname']=$row['username'];
                        //header("Location:StudentTest.php");
                    //echo "Yes";
                    //exit(0);
                } 
                else
                {
                    echo "Invalid Username or Password - Please try again <br />";
                }
            }   
        }
        


        

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登入</title>
<style type="text/css">

</style>
</head>

<body>

<h1>Login Form</h1><hr />
<form method="post" action="login.php">
User Name: <input type="text" name="id"><br />
Password : <input type="password" name="pwd"><br />
<input type="submit" value="登入">
</form>

</body>
</html>
