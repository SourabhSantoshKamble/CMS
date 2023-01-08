<?php
session_start();
if(isset($_SESSION['ADMIN']) != true)
{
    header("location: login.php");
    exit;
}
include "connection.php";
if (isset($_POST['Submit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $a = "SELECT PASSWORD FROM users WHERE ROLE='ADMIN';";
    $k = mysqli_query($conn,$a);
    $s = mysqli_fetch_assoc($k);
    $apass = $s['PASSWORD'];
    if($apass == $pass){
        $sql = "DELETE FROM `receptionist` WHERE NAME='$name' AND PHONE ='$phone';";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            ?>
            <script>
                    confirm("Invalid NAME OR PHONE NUMBER);
            </script>
            <?php
        }
        else{
            $sql1 = "DELETE FROM users where USERNAME='$name' AND PHONE ='$phone';";
            $result1 = mysqli_query($conn,$sql1);
            if($result1){
                ?>
                <script>
                    confirm("DOCTOR DETAILS DELETED");
                </script>
                <?php
                header('Location:admin.php');
            }
            else{
                ?>
                <script>
                confirm("Invalid Details");
                </script>
        <?php
            }
        }
    }  
}
?>
<!doctype html>
<html>
    <head>
        <title>
            REMOVE RECEPTIONIST
        </title>
    </head>
    <body>
        <div id = "header">
            <center>
            <header>
            <h1>
                CLINIC MANAGEMENT
           </h1>
           <h2>
                REMOVE RECEPTIONIST
            </h2>
            </header>
            </center>
        </div>
        <div id= "form">
            <form action = "" method = POST>
            
            <p>
                <label>
                    NAME :
                </label>
                <input type = "text" name = "name" required />
            </p>

           <p>
                 <label>
                    PHONE NUMBER : 
                </label>
                <input type ="text" name = "phone" required />
            </p>

            <p>
                <label>
                ADMIN  PASSWORD : 
                </label>
                <input type = "password" name = "pass" required />
            </p>
            <p>
                <input type = "Submit" name = "Submit" value ="Delete Records" />
                <button type="cancel" name="Cancel" value="Cancel"><a href="admin.php">Cancel</a></button>
            </p>

            </form>
        </div>
    </body>
</html>