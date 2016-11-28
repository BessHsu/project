<?php 
//考試倒數
require("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>測驗倒數計時</title>
<center>
<div id="myMessage">這裡是顯現文字的地方</div>
</center>
</head>

<body>
<?php 
echo $_SESSION['nickname'];
?>你好!


</body>
</html>
<script type="text/javascript" language="javascript">
//var CountDownSecond = 11; //讓倒數計時器一開始的數字是10，10秒鐘後關閉視窗
var CountDownSecond = 61; //讓倒數計時器一開始的數字是60，60秒鐘後關閉視窗
//var OpenWindows = window.open("http://www.google.com.tw","new_window","width=400,height=300","");
var OpenWindows = window.open("StudentTest.php","new_window","width=400,height=300","");
CountDown();
function CountDown() {
if (CountDownSecond !=0) {
CountDownSecond -= 1;
//document.getElementById("myMessage").innerHTML = "視窗關閉倒數 " + CountDownSecond + " 秒";
document.getElementById("myMessage").innerHTML = "考試倒數剩 " + CountDownSecond + " 秒";
} else {
document.getElementById("myMessage").innerHTML = "考試結束！";
OpenWindows.close();
return;
}
setTimeout("CountDown()",1000);
}
</script>