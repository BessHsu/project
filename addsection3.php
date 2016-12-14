<?php 
require("config.php");
$b=$_SESSION['uID'];//使用者名稱
$c = $_SESSION['coursename'];//科目名稱
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增科目已完成</title>
<link rel="stylesheet" href="mystyle1.css" type="text/css">
</head>

<body>

<?php 
echo $_SESSION['nickname'];
?>你好!

<h3><a href="questionbank.php">題庫一覽表</a>&nbsp>&nbsp
科目:<a href="try.php?mid=<?php echo $c;?>"><?php echo $c;?></a>&nbsp>&nbsp
</h3>
<br />
<hr />


<div align="center">
<p>已新增</p>
<hr />
<table>

<?php 
$tid = $_SESSION['uID'];
$num = $_SESSION['num'];
$subject = $_SESSION['coursename'];
$arrSec = $_POST['section'];
$cnt = count($arrSec);
//$sql = "insert into qsubject (tid, qsubname) values ('$tid','$subject');";
//mysqli_query($conn,$sql) or die("MySQL insert message error"); //執行SQL
//echo "<tr><td>科目:</td><td>$subject</td></tr>";
$wrong = "";
for($i = 0; $i < $cnt; $i++) {
    $tmp = $arrSec[$i];
    $section_name=mysqli_real_escape_string($conn, $tmp);
    if($section_name) {
        $sql_1125 = "select * from qcourse where tid ='$b' AND (qcname = '$subject')AND (section_name = '$section_name')";
        $results_1125=mysqli_query($conn,$sql_1125);
        $try_1125 = 0;
        while ( $rs_1125=mysqli_fetch_array($results_1125)) {
            $try_1125 = 1;
            break;
        }
        if($try_1125 == 1) {
            $wrong = $wrong.$section_name.";";
        } else {
            $sql = "insert into qcourse (tid, qcname, section_name) values ('$tid','$subject','$section_name');";
            mysqli_query($conn,$sql) or die("MySQL insert message error"); //執行SQL
            echo "<tr><td>單元$i:</td><td>$section_name</td></tr>";
        }
    } else {
        echo "empty section_name, cannot insert.";
    }
}
?>
</table>
</div>


<?php 
if($wrong) {
    ?>
    <div align="center">
    <p>新增失敗</p>
    <hr />
    <table>
<?php 
    $wrong_arr = explode(";", $wrong);
    for($i = 0; $i < count($wrong_arr)-1; $i++) {
    ?>
        <tr><td>單元名稱:</td><td><?php echo $wrong_arr[$i];?></td></tr>
    
    
    <?php 
    }
?>
    </table>
    </div>

<?php 
}
//unset($_SESSION['subject']);
unset($_SESSION['num']);
?>
</body>
</html>