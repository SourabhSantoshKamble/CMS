<?php
session_start();
include "connection.php";
if(isset($_POST['change'])){
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $npass = $_POST['npass'];
    $sql = "UPDATE users SET PASSWORD='$npass' WHERE PHONE='$phone' AND PASSWORD='$pass';";
    $result = mysqli_query($conn,$sql);
        if($result){
            ?>
            <script>
                    confirm("Password changed sucessfully");
            </script>
            <?php
            header("location:login.php");
            exit;
        }
        else{
            ?>
            <script>
            confirm("Error!");
            </script>
            <?php
    }
}
?>

<!doctype html>
<html>
    <head>
        <title>
            CHANGE PASSWORD
        </title>
    </head>
    <body>
    <center>
        <div id = "header">
            <header>
                <h1>
                    CHANGE PASSWORD
                </h1>
            </header>
        </div>
        <div id="form">
            <form action="" method="POST">
                <p>
                    <label>
                        PHONE NUMBER :
                    </label>
                    <input type="text" name="phone" required/>
                </p>

                <p>
                    <label>
                        OLD PASSWORD : 
                    </label>
                    <input type="password" name="pass" required/>
                </p>

                <p>
                    <label>
                        NEW PASSWORD :
                    </label>
                    <input type="password" name ="npass" required/>
                </p>

                <p>
                    <input type="Submit" name="change" value="CHANGE PASSWORD"/>
                    <button ><a href ="logout.php">Cancel</a></button>
                </p>
            </form>
        </div>
    </center>
    </body>
</html>