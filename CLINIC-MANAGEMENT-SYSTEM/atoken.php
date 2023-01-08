<?php
session_start();
if(isset($_SESSION['RECEPTIONIST']) != true)
{
    header("location: login.php");
    exit;
}   
include "connection.php";
if(isset($_POST['submit'])){
    $phone=$_POST['phone'];
    $sql1="SELECT cntr FROM counter where cntkey=1;";
    $result = mysqli_query($conn,$sql1);
    $k = mysqli_fetch_assoc($result);
    $s = strval(sprintf("%03d",$k['cntr']));
    $sql = "INSERT INTO token(TNO,PID) VALUES($s,$phone);";
    $res = mysqli_query($conn,$sql);
    if($res){
        ?>
        <script>
            Alert("PATIENT ADDED");
        </script>
        <?php
        header('location:receptionist.php');
        exit;
    }
    else{
        "Error";
    }
}
?>

<!doctype html>
<html>
    <head>
        <title>

        </title>
    </head>
    <body>
        <div id="form">
            <form action="" method="POST">
                <p>
                    <label>
                        PHONE:
                    </label>
                    <input type="text" name="phone" />
                </p>
                <p>
                    <input type="submit" name="submit" />
                </p>
            </form>
        </div>
    </body>


</html>

