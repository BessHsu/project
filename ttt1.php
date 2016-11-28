<DIV onmousedown="fmenu1()" style="cursor: hand; width: 37; height: 19"> 
<table border="0" cellspacing="0" style="border: 1 solid #C0C0C0" width="120">
<tr>
<td valign="middle" align="left">標題1</td>
</tr>
</table>
</DIV>


<TABLE id=menu1 style="display: none" border="0" width="120" cellspacing="0" cellpadding="4">
<TR>
<TD width="55" bgcolor="#F0F0F0"> 
<style="line-height: 150%">
<a target="_blank" href="連結檔名路徑">單元1</a><br>
<a target="_blank" href="連結檔名路徑">單元2</a><br>
<a target="_blank" href="連結檔名路徑">單元3</a>
</TD>
</TR>
</TABLE>


<DIV onmousedown="fmenu2()" style="cursor: hand; width: 70; height: 13"> 
<table border="0" cellspacing="0" style="border: 1 solid #C0C0C0" width="120">
<tr>
<td width="100%" valign="middle">標題2</td>
</tr>
</table>
</DIV>



<TABLE id=menu2 style="display: none" border="0" width="120" cellspacing="0" cellpadding="4">
<TR>
<TD width="61" bgcolor="#F0F0F0"> 
<style="line-height: 150%">
<a href="連結檔名路徑" target="_blank">單元1</a><br>
<a href="連結檔名路徑" target="_blank">單元2</a><br>
<a href="連結檔名路徑" target="_blank">單元3</a> 
</TD>
</TR>
</TABLE>

<DIV onmousedown="fmenu3()" style="cursor: hand; width: 17; height: 19"> 
<table border="0" cellspacing="0" style="border: 1 solid #C0C0C0" width="120">
<tr>
<td width="100%" valign="middle" height="12">標題3</td>
</tr>
</table>
</DIV>


<TABLE id=menu3 style="display: none" border="0" width="120" cellspacing="0" cellpadding="4">
<TR>
<TD width="60" bgcolor="#F0F0F0"> 
<style="line-height: 150%">
<a href="連結檔名路徑" target="_blank">單元1</a><br>
<a href="連結檔名路徑" target="_blank">單元2</a><br>
<a href="連結檔名路徑" target="_blank">單元3</a>
</TD>
</TR>
</TABLE>



<SCRIPT language="JavaScript">
function fmenu1(){
if( menu1.style.display == "none")
menu1.style.display = "block";
else
menu1.style.display = "none";}
function fmenu2(){
if( menu2.style.display == "none")
menu2.style.display = "block";
else
menu2.style.display = "none";}

function fmenu3(){
if( menu3.style.display == "none")
menu3.style.display = "block";
else
menu3.style.display = "none";}
</SCRIPT>
