<?php 
require("config.php");
$tmp=$_GET['courseid'];
$_SESSION['courseid'] = $tmp;//課程代號
$userid=$_SESSION['uID'];//老師帳號

//尋找課程名稱，用$coursename存
$sql = "select * from course where userid ='$userid' AND (courseid = '$tmp')";
$results=mysqli_query($conn,$sql);
while ( $rs=mysqli_fetch_array($results)) {
	$coursename = $rs['coursename'];//課程名稱
	break;
}

//尋找與課程名稱相關的單元代號，用$tmp2存
$correct = array();//與課程名稱相關的單元代號中的問題
$i = 0;
$t = "%".$coursename."%";
//$sql = "select * from qcourse where tid = '$userid' AND (qcname like '$coursename') ;";
$sql = "select * from qcourse where tid = '$userid' AND (qcname like '$t') ;";

$results=mysqli_query($conn,$sql);
while ( $rs=mysqli_fetch_array($results)) {
	$tmp2 = $rs['qcid'];
	//echo "可用的課程代碼: ".$tmp2."<br />";
	//尋找與單元代號相關的問題代號，用$correct()存
	$sql_2 = "select * from exam where courseid = '$tmp2' ;";
    $results_2=mysqli_query($conn,$sql_2);
	while ( $rs_2=mysqli_fetch_array($results_2)) {
		$correct[$i] = $rs_2['questionid'];
		//echo $tmp2."裡的問題代碼: ".$correct[$i]."<br />";
		$i++;
	}
}
$e = 0;
$correct_test = array();//與課程名稱相關的考試代碼

$sql = "select * from quiz where builder = '$userid';";
$results=mysqli_query($conn,$sql);
while ( $rs=mysqli_fetch_array($results)) {
	$ch = $rs['questionid'];
	//echo "我取得的 ".$rs['testid']." 中的問題代碼有".$ch."<br />";
    $tmparray = array();
	$tmparray=explode(";",$ch);
	for($d = 0; $d < count($correct); $d++) {
		//echo "我取得的測驗編號 ".$rs['testid']." 中的問題代碼有".$tmparray[0]."現在與 ".$correct[$d]." 比對<br />";
		if($tmparray[0] == $correct[$d]) {
			$correct_test[$e] = $rs['testid'];
			//echo "<br />我找到了<br />";
			$e++;
		}
		
	}
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $tmp;?>測驗總覽</title>
</head>

<body>
<?php 
echo $_SESSION['nickname'];
?>你好!


<h3><a href="teacherlist.php">課程一覽表</a>&nbsp>&nbsp科目:<?php echo $coursename;?></h3>

<!--
<p><a href='teacherlist.php?mid=",$rs['id'],"'>回課程一覽表</a>&nbsp
<a href='questionbank.php?mid=",$rs['id'],"'>回題庫一覽表</a></p>
-->
<br />
<hr />
<table width="400" border="1">
<tr>
<td>編號</td>
<td>測驗名稱</td>
<td>建立日期</td>
<td>查看成績</td>
<td>開始測驗</td>
</tr>
<?php 
/*
echo "在".$coursename."下的題目有";
for($s = 0; $s < count($correct); $s++) {
	echo $s;
	echo " = ";
	echo $correct[$s];
	echo ";";
	echo "<br />";
}
echo "<hr />";
echo "符合的考試代碼有:";
for($s = 0; $s < count($correct_test); $s++) {
	echo $s;
	echo " = ";
	echo $correct_test[$s];
	echo ";";
	echo "<br />";
}
*/
for($s = 0; $s < count($correct_test); $s++) {
	$index = $s+1;
	$sss = $correct_test[$s];
	$sql = "select * from quiz where testid = '$sss';";
	$results=mysqli_query($conn,$sql);
    while ( $rs=mysqli_fetch_array($results)) {
	?>
        <tr>
		<td><?php echo $index;?></td>
	    <td><?php echo $rs['testname'];?></td>
		<td><?php echo $rs['builddate'];?></td>
		<td><a href="ShowScore.php?testid=<?php echo $rs['testid'];?>">查看成績</a></td>
		<!--<td><a href="StudentTest.php?testid='<?php //echo $rs['testid'];?>'">開始測驗</td>--><!--this must be a button-->
		<td><a href="#" onclick="window.open(' timeout.php ', config='height=500,width=500');">開始測驗</a></td>
		</tr>
    <?php 	
	    break;
	}
}

?>

</table>

</body>
</html>