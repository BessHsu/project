<?php
    session_start();
    header("Content-Type: text/html; charset=utf-8");
    include("connMysql.php");
    $seldb = @mysql_select_db("irsdb");
    if(!$seldb) {
        die(" 資料庫選擇失敗");
    } else {
        //echo "資料庫選擇成功";
    }
    
	$userid = $_SESSION['userid'];
	//echo "<h1> Let's Q and A</h1><hr />";
	echo "<h2>我的課程</h2><hr/>";
	echo "<table>";
	
    $sql_query = "SELECT * FROM `course`";
    $result = mysql_query($sql_query);
    while($row_result = mysql_fetch_assoc($result)) {
        $id = $row_result["userid"];
        $coursename = $row_result["coursename"];
        if($userid == $id) {
            
			echo "<tr><th>$coursename</th></tr>\n";
        }
    }
	echo "</table>";
    
?>
<!--
<h1> Let's Q and A</h1><hr />
<h2>我的課程</h2>
-->