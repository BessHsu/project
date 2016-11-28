<?php 
require("config.php");
$userid = $_SESSION['uID'];//使用者帳號
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>學生測驗</title>
<style type="text/css">
table tr td {
background-color: #cfc;
padding: 10px;
}
div {
margin: 100px auto;
background-color: #ffc;
width: 400px;
padding: 50px 100px;
border: dotted green 5px;
}
</style>
</head>

<body>
<?php 
echo $_SESSION['nickname'];
?>你好!
<h3>這是測驗介面</h3>
<hr/>
<?php 
error_reporting(E_ALL || ~E_NOTICE);
if((int)$_GET['testid']) {
    $testid = (int)$_GET['testid'];
    $sql = "select * from quiz where testid = '$testid';";
    $results=mysqli_query($conn,$sql);
    while ( $rs=mysqli_fetch_array($results)) {//find questionid
        $temp = $rs['questionid'];
        $questionid = explode(";", temp);
        break;
    }//end of sql
    ?>
    <form id="StudentTest1" name ="StudentTest1" action="StudentTest1Back.php" method="post">
    <?php 
    for($i = 0; $i < count($questionid); $i++) {
        $qid = $questionid[$i];
        $sql = "select * from exam where questionid = '$qid';";
        $results=mysqli_query($conn,$sql);
        while ( $rs=mysqli_fetch_array($results)) {//find question and other details
                $type = rs['type'];
                if($type == 1) {
                    ?>
                    <div align="center">
                    <input type="hidden" name="S_qid<?php echo $i;?>" value="<?php echo $qid;?>">
                    <table>
                    <tr><td>題目:</td><td><?php echo $rs['question'];?></td></tr>
                    <input type="radio" name="S_answer" value="true" required>True
                    <input type="radio" name="S_answer" value="false" required>False
                    <!--</table>
                    </div>-->
                <?php 
                }//end of type = 1
                else if($type == 2) {
                    $temp_choice = $rs['choice'];
                    $choice = explode(";", $temp_choice);
                    ?>
                    <div align="center">
                    <input type="hidden" name="S_qid<?php echo $i;?>" value="<?php echo $qid;?>">
                    <table>
                    <tr><td>題目:</td><td><?php echo $rs['question'];?></td></tr>
                    <tr><td><input type="radio" name="S_answer<?php echo $i;?>" value="a" required>a: <?php echo $choice[0];?></td>
                    <tr><td><input type="radio" name="S_answer<?php echo $i;?>" value="b" required>b: <?php echo $choice[1];?></td>
                    <tr><td><input type="radio" name="S_answer<?php echo $i;?>" value="c" required>c: <?php echo $choice[2];?></td>
                    <tr><td><input type="radio" name="S_answer<?php echo $i;?>" value="d" required>d: <?php echo $choice[3];?></td>
                    <!--</table>
                    </div>-->
                <?php 
                }//end of type = 2
                else if ($type == 3) {
                    $temp_choice = $rs['choice'];
                    $choice = explode(";", $temp_choice);
                    ?>
                    <div align="center">
                    <input type="hidden" name="S_qid<?php echo $i;?>" value="<?php echo $qid;?>">
                    <table>
                    <tr><td>題目:</td><td><?php echo $rs['question'];?></td></tr>
                    <tr><td><input type="radio" name="S_answer<?php echo $i;?>[]" value="a" >a: <?php echo $choice[0];?></td>
                    <tr><td><input type="radio" name="S_answer<?php echo $i;?>[]" value="b" >b: <?php echo $choice[1];?></td>
                    <tr><td><input type="radio" name="S_answer<?php echo $i;?>[]" value="c" >c: <?php echo $choice[2];?></td>
                    <tr><td><input type="radio" name="S_answer<?php echo $i;?>[]" value="d" >d: <?php echo $choice[3];?></td>
                    <tr><td><input type="radio" name="S_answer<?php echo $i;?>[]" value="e" >e: <?php echo $choice[4];?></td>
                    <!--</table>
                    </div>-->
                <?php 
                }//end of type 3
                else {
                ?>
                    <p>此題(<?php echo $questionid;?>)有問題</p>
                <?php 
                }
            ?>
            
            
            
            
            <?php 
        }
    }
    ?>
    <tr><td><input type="submit" value="完成"><input type="reset" value="取消"></td></tr>
    </table>
    </div>
    <?php 
} 

else {
    ?>
    <div align="center">
    <p>目前沒有題目</p>
    </div>
    <?php 
    header('refresh: 5;url="StudentTest.php"');
}
?>
<hr />
</body>
</html>