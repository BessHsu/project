<?php
    session_start();
    header("Content-Type: text/html; charset=utf-8");
    include("connMysql.php");
    $seldb = @mysql_select_db("irsdb");
    if(!$seldb) {
        die(" 資料庫選擇失敗");
    }
    $isLogin = false;
            
    if(isset($_POST["id"]) && isset($_POST["pwd"])) {
        $sql_query = "SELECT * FROM `userinfo`";
        $result = mysql_query($sql_query);
        while($row_result = mysql_fetch_assoc($result)) {
        $userid = $row_result["userid"];
        $pwd = $row_result["pwd"];
        if(($_POST["id"]==$userid) && ($_POST["pwd"]==$pwd)){
            $isLogin = true;
			$_SESSION['userid'] = $userid;
            break;
        }
        }
        if($isLogin)
            header("Location: second.php");//echo "success";
        else
            echo "fail";
        }
?>