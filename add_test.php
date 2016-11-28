<?php 
require("config.php");
?>
<?php 
$sub = $_POST['subject'];
$num = $_POST['section_num'];
$b = $_SESSION['uID'];
$sql = "select * from qsubject where tid ='$b' AND (qsubname = '$sub')";
$results=mysqli_query($conn,$sql);
$try_n = 0;
while (	$rs=mysqli_fetch_array($results)) {
	$try_n = 1;
	//break;
}
//echo $sub;
//echo $num;
//echo $try_n;
if($try_n == 1) {
	header("Location: add_failed.php");
} else {
	$_SESSION['subject'] = $sub;
	$_SESSION['num'] = $_POST['section_num'];
	header("Location: add_sub.php");
}
?>