<?php
session_start();
if(isset($_SESSION['ADMIN']) != true)
{
    header("location: login.php");
    exit;
}
include "connection.php";
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $add = $_POST['addr'];
    $role = 'RECEPTIONIST';
    if($pass == $cpass){
        $sql1 = "INSERT INTO `users` VALUES('$name',$phone,'$pass','$role')";
        $result1 = mysqli_query($conn,$sql1);
        $sql = "INSERT INTO `receptionist` VALUES('$name',$phone,'$age','$sex','$add')";
        $result = mysqli_query($conn,$sql);
        if($result && $result1){
            ?>
            <script>
                    confirm("RECEPTIONIST DETAILS ADDED");
            </script>       
        <?php
        }
        if($result && $result1){
                header('Location:admin.php');
                exit;
        }
        else{
            ?>
            <script>
                    confirm("ERROR");
            </script>       
        <?php   
        }
    }
    else{
            ?>
            <script>
                confirm("Pasword Mismatch");
            </script>
            <?php
    }
}
?>

<!doctype html>
<html>
    <head>
        <title>
            ADD RECEPTIONIST
        </title>
    </head>
    <body>
        <div id="header">
            <center>
            <header>
            <h1>
                CLINIC MANAGEMENT
           </h1>
           <h2>
                ADD RECEPTIONIST
            </h2>
            </header>
            </center>
        </div>
        <div id="form">
            <form action="" method="POST">
                <p>
                    <label>
                    Name :
                    </label>
                    <input type="text" name="name" required />
                </p>

                <p>
                    <label>
                        PHONE NUMBER :
                    </label>
                    <input type="text" name="phone" required/>
                </p>

                <p>
                    <lable>
                        CREATE PASSWORD : 
                    </label>
                    <input type="password" name="pass" required />
                </p>

                <p>
                    <lable>
                        CONFIRM PASSWORD : 
                    </label>
                    <input type="password" name="cpass" required />
                </p>

                <p>
                    <label>
                        AGE :
                    </label>
                    <input type="number" name="age" required />
                </p>

                <p>
                    <label>
                        SEX:
                    </label>
                    <br/>
                    <input type="radio" name="sex" value="Male" >Male <br />
                    <input type="radio" name="sex" value="Female">Female <br />
                    <input type="radio" name="sex" value="Others">OTHER <br />
                </p>

                <p>
                    <label>
                        ADDRESS : 
                    </label>
                    <input type="text" name="addr" required/>
                </p>

                <p>
                    <input type="Submit" name="submit" />
                    <button type="cancel" name="Cancel" value="Cancel"><a href="admin.php">Cancel</a></button>
           
                </p>

            </form>
        </div>
    </body>
</html>