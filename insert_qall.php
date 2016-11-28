<?php 
require("config.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改中</title>
<style type="text/css">
#addtype {
	<!--display:none;-->
	margin: 100px auto;
	background-color: #ffc;
	width: 400px;
	padding: 50px 100px;
	border: dotted green 5px;
	table tr td {
		background-color: #cfc;
		padding: 10px;
	}
}
#tandf {
	display:none;
	margin: 100px auto;
	background-color: #ffc;
	width: 400px;
	padding: 50px 100px;
	border: dotted green 5px;
	table tr td {
		background-color: #cfc;
		padding: 10px;
	}
}
#onechoice {
	display:none;
	margin: 100px auto;
	background-color: #ffc;
	width: 400px;
	padding: 50px 100px;
	border: dotted green 5px;
	table tr td {
		background-color: #cfc;
		padding: 10px;
	}
}
#multichoice {
	display:none;
	margin: 100px auto;
	background-color: #ffc;
	width: 400px;
	padding: 50px 100px;
	border: dotted green 5px;
	table tr td {
		background-color: #cfc;
		padding: 10px;
	}
}
</style>
<script type="text/javascript">
window.onload=function() {
	
}
function getType() {
	//讀radio值
	var form = document.getElementById(f1);
	for(var i = 0; i < form.type.length; i++) {
		if(form.type[i].checked) {
			var type = form.type[i].value;
			//alert(type);
		}
	}
	if(type == 1) {
		tandf.style.display='';
	} else if (type == 2) {
		onechoice.style.display='';
	} else if (type == 3) {
		multichioce.style.display='';
	}
}

</script>
</head>
<body>

<!--選題型-->
<div id="addtype">
<form id="f1" name ="f1" action="insert_qall.php" method="post" target="top">
<h2>~ 新增題目 ~</h2>
<table cellpadding="5">
<tr><td colspan="2" align="center">step 1</td></tr>
<tr><td align="right">題型:</td>
<td align="left">
<input type="radio" name="type" value="1">是非題
<input type="radio" name="type" value="2">單選題
<input type="radio" name="type" value="3">多選題
</td></tr>
<tr><td colspan="2" align="center">
<input type="submit" value="下一步" id="typeok" onclick="getType()"><input type="reset" value="取消"></td></tr>
</form>
</div>

<!--是非題-->
<div id="tandf" style="display:none";>
<form id="f2" name ="f2" action="insert_qback.php" method="post">
<table>
<tr><td align="right">題目:</td>
<td align="left">
<textarea name="question" cols="30" rows="6" required></textarea>
</td>
</tr>
<tr><td align="right">正解: </td><td align="left">
<input type="radio" name="answer" value="true" required>True</br>
<input type="radio" name="answer" value="false" required>False
</td></tr>
<tr><td colspan="2" align="center">
<input type="button" value="上一步" onClick="javascript:history.back(1)"><input type="submit" value="完成"><input type="reset" value="取消"></td></tr>
</table>
</form>
</div>

<!--單選題-->
<div id="onechoice" style="display:none">
<form id="f3" name ="f3" action="insert_qback.php" method="post">
<table>
<tr><td align="right">題目:</td>
<td align="left">
<textarea name="question" cols="30" rows="6" required></textarea>
</td>
</tr>
<tr><td align="right">正解: </td><td align="left">
<input type="radio" name="answer" value="true" required>True</br>
<input type="radio" name="answer" value="false" required>False
</td></tr>
<tr><td colspan="2" align="center">
<input type="button" value="上一步" onClick="javascript:history.back(1)"><input type="submit" value="完成"><input type="reset" value="取消"></td></tr>
</table>
</form>
</div>


<!--多選題-->
<div id="multichoice" style="display.none">
<form id="f2" name ="f2" action="insert_qback.php" method="post">
<table>
<tr><td align="right">題目:</td>
<td align="left">
<textarea name="question" cols="30" rows="6" required></textarea>
</td>
</tr>
<tr><td align="right">選項a:</td>
<td align="left">
<textarea name="choice_a" required></textarea>
</td></tr>
<tr><td align="right">選項b:</td>
<td align="left">
<textarea name="choice_b" required></textarea>
</td></tr>
<tr><td align="right">選項c:</td>
<td align="left">
<textarea name="choice_c" required></textarea>
</td></tr>
<tr><td align="right">選項d:</td>
<td align="left">
<textarea name="choice_d" required></textarea>
</td></tr>
<tr><td align="right">選項e:</td>
<td align="left">
<textarea name="choice_e" required></textarea>
</td></tr>
<tr><td align="right">正解: </td><td align="left">
<input type="checkbox" name="answer[]" value="a">a
<input type="checkbox" name="answer[]" value="b">b
<input type="checkbox" name="answer[]" value="c">c
<input type="checkbox" name="answer[]" value="d">d
<input type="checkbox" name="answer[]" value="e">e
</td></tr>
<tr><td colspan="2" align="center">
<input type="button" value="上一步" onClick="javascript:history.back(1)"><input type="submit" value="完成"><input type="reset" value="取消"></td></tr>
</div>

</body>
</html>
<!--
http://ant4js.blogspot.tw/2009/01/displaynone.html
隱藏或顯現(div)
https://pjchender.blogspot.tw/2015/05/javascripthtml.html
透過javascript擷取HTML元素（讀取radio, select, id 的值）
http://pramaire.pixnet.net/blog/post/45264319-javascript-%E5%88%A9%E7%94%A8div%E9%A1%AF%E7%A4%BA%E9%9A%B1%E8%97%8F%E8%B3%87%E8%A8%8A
javascript 利用Div顯示隱藏資訊
http://www.wibibi.com/info.php?tid=384
JavaScript event 常用事件表
for (var i=0;i<document.formName.radioName.length'i++){
if (document.formName.radioName[i].checked){
到這裡就找到被選取的項目
}
} 
http://fanli7.net/a/bianchengyuyan/C__/20131103/439215.html
query實際應用，判斷radio，selelct，checkbox是否選中及選中的值 
http://exam.naer.edu.tw/index.php#ResultList
全國中小學題庫網
-->
