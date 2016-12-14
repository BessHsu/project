<?php 
require("config.php");
$tmp=$_GET['courseid'];
$_SESSION['courseid'] = $tmp;//課程代號
$userid=$_SESSION['uID'];//老師帳號
$sql = "select * from course where userid ='$userid' AND (courseid = '$tmp')";
$results=mysqli_query($conn,$sql);
while ( $rs=mysqli_fetch_array($results)) {
	$coursename = $rs['coursename'];
}
$_SESSION['coursename'] = $coursename;//課程名稱

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增測驗</title>
<script type="text/javascript" src="http://www.webdm.cn/themes/script/jquery.js"></script>
<script type="text/javascript">


$(document).ready(function(){
   $("#wenzhang>dd>dl>dd").hide();
   $("#wenzhang>dd>dl>dt").removeClass("open");
   $.each($("#wenzhang>dd>dl>dt"), function(){
   $(this).click(function(){
   $("#wenzhang>dd>dl>dd").not($(this).next()).slideUp();
   $(this).next().slideToggle(300);
   });
   //$(this).toggle(function(){$(this).addClass("open");},function(){$(this).removeClass("open");});
   });
});
</script>

<link rel="stylesheet" href="mystyle.css" type="text/css">
</head>
<body>
<?php 
echo $_SESSION['nickname'];
?>你好!

<h3><a href="teacherlist.php">課程一覽表</a>&nbsp>&nbsp科目:<?php echo $coursename;?></h3>
<br />
<hr />
<?php 
$str = '%'.$coursename.'%';
$sql = "select * from qcourse where tid = '$userid' AND (qcname like '$str') ;";
$results = mysqli_query($conn,$sql);
$i=0;
$choice_section = array();
$choice_sectionID = array();
while($rs=mysqli_fetch_array($results)) {
	$choice_sectionID[$i] = $rs['qcid'];
	$choice_section[$i] = $rs['section_name'];
	$i++;
}
?>
<form action="addquiz_back.php" method="post">
測驗名稱：<input type="text" name="QuizName" required>
<dl id="wenzhang">
<?php 
for($i = 0; $i < count($choice_sectionID); $i++) {
?>
    <dd>
	    <dl>
		    <dt><?php echo $choice_section[$i];?></dt>
			    <dd>
				<?php 
				    $sql_1 = "select * from exam where courseid = '$choice_sectionID[$i]';";
					$results_1 = mysqli_query($conn,$sql_1);
					$a = 0;
					$choice_question = array();
					$choice_questionID = array();
					while($rs_1 = mysqli_fetch_array($results_1)) {
						$choice_questionID[$a] = $rs_1['questionid'];
						$choice_question[$a] = $rs_1['question'];
						$a++;
					}
					for($b = 0; $b < count($choice_questionID); $b++) {
						$e = $b+1;
					?>
					    <ul>
						    <li><input type="checkbox" name="qid_f[]" value="<?php echo $choice_questionID[$b];?>"><?php echo $e.". ".$choice_question[$b];?></li>
						</ul>
					<?php 
					}
				?>
				</dd>
		</dl>
	</dd>
<?php 
}
?>
</dl>
<input type="submit" value="完成"> <input type="reset" value="取消">
</form>
</body>
</html> 