<?php 
require("config.php");
$b=$_SESSION['uID'];//老師
$c=$_SESSION['coursename'];//科目名稱
$qid = (int)$_GET['questionid'];//題目流水號
$qcid = $_SESSION['qcid'];//單元流水號
$sec=$_SESSION['section_name'];//單元名稱

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改題目</title>
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

<h3><a href="questionbank.php">題庫一覽表</a>&nbsp>&nbsp
科目:<a href="try.php?mid=<?php echo $c;?>"><?php echo $_SESSION['coursename'];?></a>&nbsp>&nbsp
單元名稱:<a href="show.php?qcid=<?php echo $qcid;?>"><?php echo $sec;?></a>
</h3>
<hr />
<?php
$flag = 0;
$questionid=(int)$_GET['questionid'];
if ($questionid <=0) {
    echo "empty ID";
    exit(0);
} 
$sql = "select * from exam where questionid=$questionid;";
$results=mysqli_query($conn,$sql);
if ($rs=mysqli_fetch_array($results)) {
    $questionid = $rs['questionid'];
    $question = $rs['question'];
    $type = $rs['type'];
    if($type != 1) {
        $choices = array();
        $choice = $rs['choice'];
        $choices = explode(";", $choice);
    }
    if($type == 3) {
        $answers = array();
        $ans=array(0,0,0,0,0);
        $answer = $rs['answer'];
        $answers = explode(";", $answer);
        for($i = 0; $i < count($answers); $i++) {
            if($answers[$i] == "a") {
                $ans[0] = 1;
            } else if($answers[$i] == "b") {
                $ans[1] = 1;
            } else if($answers[$i] == "c") {
                $ans[2] = 1;
            } else if($answers[$i] == "d") {
                $ans[3] = 1;
            } if($answers[$i] == "e") {
                $ans[4] = 1;
            }
        }
    } else 
    {
        $answer = $rs['answer'];
    }
    $flag = 1;
} else {
    //echo "cannot find the question to edit.";
    $flag = 0;
    //exit(0);
}
if($flag == 1) {
?>
    <form id="f1" name ="f1" action="04_update.php" method="post">
    <div align="center">
    <table cellpadding="5">
    <!--<table width="200" border="1">-->
    <tr><td><input type="hidden" name="mid" value="<?php echo $questionid; ?>" ></td></tr>
    <tr><td><input type="hidden" name="type" value="<?php echo $type; ?>" ></td></tr>
    <tr><td align="right">題目:</td>
    <td align="left">
    <textarea name="question" cols="30" rows="6" required><?php echo $question;?></textarea>
    </td></tr>
    <?php 
    if($type == 1) {
    ?>
        <tr><td align="right">正解: </td><td align="left">
        <?php 
        if($answer == "true") {
        ?>
            <input type="radio" name="answer" value="true" checked="true" required>True
            <input type="radio" name="answer" value="false" required>False
            </td></tr>
            <tr><td colspan="2" align="center">
            <input type="submit" value="完成"><input type="reset" value="取消"></td></tr>
            </table>
            </div>
        <?php 
        } //end of type = 1 & answer = true
        else {
        ?>
            <input type="radio" name="answer" value="true" required>True
            <input type="radio" name="answer" value="false" checked="true"required>False
            </td></tr>
            <tr><td colspan="2" align="center">
            <input type="submit" value="完成"><input type="reset" value="取消"></td></tr>
            </table>
            </div>
        <?php 
        } //end of type = 1 & answer = false
        ?>
    <?php
    } //end of type = 1
    else if ($type == 2) {
    ?>
        <tr><td align="right">選項a:</td>
        <td align="left">
        <textarea name="choice_a" required><?php echo $choices[0];?></textarea>
        </td></tr>
        <tr><td align="right">選項b:</td>
        <td align="left">
        <textarea name="choice_b" required><?php echo $choices[1];?></textarea>
        </td></tr>
        <tr><td align="right">選項c:</td>
        <td align="left">
        <textarea name="choice_c" required><?php echo $choices[2];?></textarea>
        </td></tr>
        <tr><td align="right">選項d:</td>
        <td align="left">
        <textarea name="choice_d" required><?php echo $choices[3];?></textarea>
        </td></tr>
        <tr><td align="right">正解: </td><td align="left">
        <?php
            if($answer == "a") {
        ?>
                <input type="radio" name="answer" value="a" checked="true" required>a
                <input type="radio" name="answer" value="b" required>b
                <input type="radio" name="answer" value="c" required>c
                <input type="radio" name="answer" value="d" required>d
                </td></tr>
        <?php 
            } // end of type=2 & answer=a
            else if ($answer == "b") {
        ?>
                <input type="radio" name="answer" value="a" required>a
                <input type="radio" name="answer" value="b" checked="true" required>b
                <input type="radio" name="answer" value="c" required>c
                <input type="radio" name="answer" value="d" required>d
                </td></tr>
        <?php 
            } // end of type=2 & answer=b
            else if ($answer == "c") {
        ?>
                <input type="radio" name="answer" value="a" required>a
                <input type="radio" name="answer" value="b" required>b
                <input type="radio" name="answer" value="c" checked="true"required>c
                <input type="radio" name="answer" value="d" required>d
                </td></tr>
        <?php 
            }// end of type=2 & answer=c 
            else if ($answer == "d") {
        ?>
                <input type="radio" name="answer" value="a" required>a
                <input type="radio" name="answer" value="b" required>b
                <input type="radio" name="answer" value="c" required>c
                <input type="radio" name="answer" value="d" checked="true"required>d
                </td></tr>
        <?php 
            } // end of type=2 & answer=d
            else {
        ?>
            <tr><td align="right">正解: </td><td align="left">
            <input type="radio" name="answer" value="a" required>a
            <input type="radio" name="answer" value="b" required>b
            <input type="radio" name="answer" value="c" required>c
            <input type="radio" name="answer" value="d" required>d
            </td></tr>
        <?php
            }// end of type=2 & answer=empty
        ?>
        <tr><td colspan="2" align="center">
        <input type="submit" value="完成"><input type="reset" value="取消"></td></tr>
        </table>
        </div>
    <?php 
    }//end of type = 2 
    else {//type = 3
    ?>
        <tr><td align="right">選項a:</td>
        <td align="left">
        <textarea name="choice_a" required><?php echo $choices[0];?></textarea>
        </td></tr>
        <tr><td align="right">選項b:</td>
        <td align="left">
        <textarea name="choice_b" required><?php echo $choices[1];?></textarea>
        </td></tr>
        <tr><td align="right">選項c:</td>
        <td align="left">
        <textarea name="choice_c" required><?php echo $choices[2];?></textarea>
        </td></tr>
        <tr><td align="right">選項d:</td>
        <td align="left">
        <textarea name="choice_d" required><?php echo $choices[3];?></textarea>
        </td></tr>
        <tr><td align="right">選項e:</td>
        <td align="left">
        <textarea name="choice_e" required><?php echo $choices[4];?></textarea>
        </td></tr>
        <tr><td align="right">正解: </td><td align="left">
        <?php 
        //$answer=array();
        if($ans[0] == 1) {
        ?>
            <input type="checkbox" name="answer[]" value="a" checked="checked">a
        <?php 
        } 
        else {
        ?>
            <input type="checkbox" name="answer[]" value="a">a

        <?php 
        }
        if($ans[1] == 1) {
        ?>
            <input type="checkbox" name="answer[]" value="b" checked="checked">b
        <?php 
        } 
        else {
        ?>
            <input type="checkbox" name="answer[]" value="b">b

        <?php 
        }
        if($ans[2] == 1) {
        ?>
            <input type="checkbox" name="answer[]" value="c" checked="checked">c
        <?php 
        } 
        else {
        ?>
            <input type="checkbox" name="answer[]" value="c">c
        <?php 
        }
        if($ans[3] == 1) {
        ?>
            <input type="checkbox" name="answer[]" value="d" checked="checked">d
        <?php 
        } 
        else {
        ?>
            <input type="checkbox" name="answer[]" value="d">d
        <?php 
        }
        if($ans[4] == 1) {
        ?>
            <input type="checkbox" name="answer[]" value="e" checked="checked">e
        <?php 
        } 
        else {
        ?>
            <input type="checkbox" name="answer[]" value="e">e
        <?php 
        }
        
        ?>
        <tr><td colspan="2" align="center">
        <input type="submit" value="完成"><input type="reset" value="取消"></td></tr>
        </table>
        </div>
    <?php       
    }//end of type = 3
    ?>
    <!--
    <tr><td colspan="2" align="center">
    <input type="button" value="上一步" onClick="javascript:history.back(1)"><input type="submit" value="完成"><input type="reset" value="取消"></td></tr>
    </table>
    </div>
    -->
<?php 
}//end of $flag = 1
else {
?>
    <div align="center">

    <p>沒有此題目，請回到題庫一覽表</p>
    <p><a href="questionbank.php">回題庫一覽表</a></p>

    </div>
<?php 
}//end of flag = 0
?>
</body>
</html>
