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
<title>Jquery Menu</title>
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
<style type="text/css">
dl,dd,dt,ul,li{ margin:0; padding:0; list-style:none;}
#wenzhang{ width:200px; text-align:center; font-size:12px;border-left:1px solid #dedede;border-right:1px solid #dedede; border-bottom:1px solid #dedede;}
#wenzhang  dd dl dt{ border-top:1px solid #dedede; background:#f2f2f2; height:25px; line-height:25px; font-weight:bold;}
#wenzhang ul li{border-top:1px solid #efefef; line-height:25px; background:#f9f9f9;}
body {
 margin-left: 0px;
 margin-top: 0px;
}
</style>
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
					?>
					    <ul>
						    <li><?php echo $choice_question[$b];?></li>
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
</body>
</html> 