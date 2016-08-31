<?php
    //資料庫主機設定
    $db_host = "localhost";
    $db_username = "irsdb";
    $db_password = "11101205";
    //連線伺服器
    $db_link = @mysql_connect($db_host, $db_username, $db_password);
    if(!$db_link) die("資料庫連結失敗");
    //設定字元集與連線校對
    mysql_query("SET NAMES 'utf8'");
    //程式說明:
    //2~6行:資料庫主機設定。將伺服器主機、資料庫、帳號與密碼都存入變數中
    //7~9行:設定MySQL資料庫伺服器連結，其中伺服器主機、帳號與密碼的資訊都使用設定的變數值。
    //10行:設定字元集及連線校對為utf-8
    //在程式頁面上使用連線引入檔，只要加上以下程式碼即可:
    //include("connMysql.php");
    //或
    //require("connMysql.php");
?>