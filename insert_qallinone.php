<?php 
require("config.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改中</title>
<style type="text/css">
table tr td {
background-color: #cfc;
padding: 10px;
}
</style>
<script type="text/javascript">
function show() {
	var items = new Array("s2","s3","s4");
	function show(obj) {
		for(var i=0;i<items.length;i++) {
				//document.getElementById(items[i]).style.display = obj.checked?"block":"none";
			}
		}
	}
	//var a;
	//a=document.getElementById("table1");
	//a.style.visibility = "hidden";
	if(f1.radio1.checked) {
		var o;
		o=document.getElementById("tandf");
		o.style.display = "table";
		
	}
}

</script>
</head>
<body>
<h2>~ 新增題目 ~</h2>

<!--選題型-->
<form id="f1" name ="f1" action="insert_qback.php" method="post" >
<div id="type">
<table cellpadding="5" id="type">
<tr><td colspan="2" align="center">step 1</td></tr>
<tr><td align="right">題型:</td>
<td align="left">
<input type="radio" name="type" value="1">是非題
<input type="radio" name="type" value="2">單選題
<input type="radio" name="type" value="3">多選題
</td></tr>
</div>
<tr><td colspan="2" align="center">
<input type="radio" onclick="show(this)"><td></td></tr>
</table>

<!--是非題-->
<div id="s2"  style="display:none">
<table id="tandf">
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
</div>

<!--單選題-->
<div id="s3" style="display:none">
<table id="onechoice" >
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
</div>

<!--多選題-->
<div id="s4" style="display:none">
<table id="multichoice" >
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
</table>
</div>

</form>
</body>
</html>
