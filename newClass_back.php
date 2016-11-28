<?php 
require("config.php");
$userid = $_SESSION['uID'];//使用者帳號
$sql = "select * from course;";
mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
    $results = mysqli_query($conn,$sql);
    while($rs=mysqli_fetch_array($results)) {
        //$tmp_last = $rs['courseid'];
        if(substr($rs['courseid'], 0, 4) == 1051) {
            $last = $rs['courseid'];
        }
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>完成新增題目</title>
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

<h3><a href="questionbank.php">題庫一覽表</a>&nbsp>&nbsp
</h3>


<hr/>
<div align="center">
<p>已新增</p>
<hr />
<table>

<?php 
$flag = 0;
$userid = $_POST['userid'];
$last = $last + 1;
if($_POST['course1']) {
    $course1 = $_POST['course1'];
    $sql = "insert into course (courseid, coursename , userid) values ('$last','$course1','$userid');";
    mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
    echo $course1."已成功加入course table<br />";
    $last++;
    $str = '%'.$course1.'%';
    //檢查題庫裡是否有此科目
    $flag = 0;
    $sql = "select * from qsubject where tid = '$userid' AND (qsubname like '$str') ;";
    mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
    $results = mysqli_query($conn,$sql);
    while($rs=mysqli_fetch_array($results)) {
        $flag = 1;
        break;
    }
    if($flag == 0) {//沒有此科目新增
        $sql = "insert into qsubject (tid, qsubname) values ('$userid','$course1');";
        mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
        echo $course1."insert ok<br />";
    } else {//有此科目
        $flag = 0;
        echo "已有".$course1."can't insert<br />";
    }
}
if($_POST['course2']) {
    $course2 = $_POST['course2'];
    $sql = "insert into course (courseid, coursename , userid) values ('$last','$course2','$userid');";
    mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
    echo $course2."已成功加入course table<br />";
    $last++;
    $str = '%'.$course2.'%';
    //檢查題庫裡是否有此科目
    $flag = 0;
    $sql = "select * from qsubject where tid = '$userid' AND (qsubname like '$str') ;";
    mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
    $results = mysqli_query($conn,$sql);
    while($rs=mysqli_fetch_array($results)) {
        $flag = 1;
        break;
    }
    if($flag == 0) {//沒有此科目新增
        $sql = "insert into qsubject (tid, qsubname) values ('$userid','$course2');";
        mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
        echo $course2."insert ok<br />";
    } else {//有此科目
        $flag = 0;
        echo "已有".$course2."can't insert<br />";
    }
}
if($_POST['course3']) {
    $course3 = $_POST['course3'];
    $sql = "insert into course (courseid, coursename , userid) values ('$last','$course3','$userid');";
    mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
    echo $course3."已成功加入course table<br />";
    $last++;
    $str = '%'.$course3.'%';
    //檢查題庫裡是否有此科目
    $flag = 0;
    $sql = "select * from qsubject where tid = '$userid' AND (qsubname like '$str') ;";
    mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
    $results = mysqli_query($conn,$sql);
    while($rs=mysqli_fetch_array($results)) {
        $flag = 1;
        break;
    }
    if($flag == 0) {//沒有此科目新增
        $sql = "insert into qsubject (tid, qsubname) values ('$userid','$course3');";
        mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
        echo $course3."insert ok<br />";
    } else {//有此科目
        $flag = 0;
        echo "已有".$course3."can't insert<br />";
    }
}
if($_POST['course4']) {
    $course4 = $_POST['course4'];
    $sql = "insert into course (courseid, coursename , userid) values ('$last','$course4','$userid');";
    mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
    echo $course4."已成功加入course table<br />";
    $last++;
    $str = '%'.$course4.'%';
    //檢查題庫裡是否有此科目
    $flag = 0;
    $sql = "select * from qsubject where tid = '$userid' AND (qsubname like '$str') ;";
    mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
    $results = mysqli_query($conn,$sql);
    while($rs=mysqli_fetch_array($results)) {
        $flag = 1;
        break;
    }
    if($flag == 0) {//沒有此科目新增
        $sql = "insert into qsubject (tid, qsubname) values ('$userid','$course4');";
        mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
        echo $course4."insert ok<br />";
    } else {//有此科目
        $flag = 0;
        echo "已有".$course4."can't insert<br />";
    }
}
if($_POST['course5']) {
    $course5 = $_POST['course5'];
    $sql = "insert into course (courseid, coursename , userid) values ('$last','$course5','$userid');";
    mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
    echo $course5."已成功加入course table<br />";
    $last++;
    $str = '%'.$course5.'%';
    //檢查題庫裡是否有此科目
    $flag = 0;
    $sql = "select * from qsubject where tid = '$userid' AND (qsubname like '$str') ;";
    mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
    $results = mysqli_query($conn,$sql);
    while($rs=mysqli_fetch_array($results)) {
        $flag = 1;
        break;
    }
    if($flag == 0) {//沒有此科目新增
        $sql = "insert into qsubject (tid, qsubname) values ('$userid','$course5');";
        mysqli_query($conn,$sql) or die("MySQL insert question error"); //執行SQL
        echo $course5."insert ok<br />";
    } else {//有此科目
        $flag = 0;
        echo "已有".$course5."can't insert<br />";
    }
}
$userid = $_POST['userid'];
?>

<!--<tr><td>科目</td><td><?php echo $subject; ?></td></tr>
<tr><td>單元名稱</td><td><?php echo $sec; ?></td></tr>
-->
<?php 

?>
</div>
</body>
</html>