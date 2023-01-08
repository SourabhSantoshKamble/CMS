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
    $cpass = $_POST['cpass'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $add = $_POST['addr'];
    $deg = $_POST['deg'];
    if ($cpass == $pass){
      $sql = "INSERT INTO users (`USERNAME`, `PHONE`, `PASSWORD`, `ROLE`) VALUES ('$name',$phone,'$pass','DOCTOR');";
        $result = mysqli_query($conn,$sql);
        $sql1 = "INSERT INTO `doctor`(`DNAME`, `PHONE`, `AGE`, `SEX`, `ADDRESS`, `DEGREE`) VALUES ('$name',$phone,'$age','$sex','$add','$deg');";
        $result1 = mysqli_query($conn,$sql1);

        if($result && $result1){
            ?>
        <script>
                confirm("DOCTOR DETAILS ADDED");
        </script>       
    <?php
            
       }
       else{
        ?>
        <script>
                confirm("ERROR");
        </script>       
    <?php
       }
       if($result && $result1){
        header('Location:admin.php');
       exit;
       }
    }
    else{
        ?>
        <script>
        confirm("Password Mismatch");
        </script>

<?php

    }
}
?>
<!doctype html>
<html>
    <head>
        <title>
            ADD DOCTOR
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
                ADD DOCTOR 
            </h2>
            </center>
            </header>
        </div>
           
    <div>
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
                    CREATE PASSWORD : 
                </label>
                <input type = "password" name = "pass" required />
            </p>

            <p>
                <label>
                    CONFIRM PASSWORD : 
                </label>
                <input type = "password" name = "cpass" required />
            </p>

            <p>
                <label>
                     AGE :
                </label>
                <input type = "number" name = "age" required />
            </p>

            <p>
                <label>
                  SEX :
                </label>
                <br/>
                <input type = "radio" name = "sex" value = "Male" />Male <br/>
                <input type = "radio" name = "sex" value = "Female" />Female <br/>
                <input type = "radio" name = "sex" value = "Other" />Other <br/>
            </p>

            <p>
                <label>
                    ADDRESS : 
                </label>
                <input type = "text" name = "addr"  required />
            </p>    

            <p>
                <label>
                    DEGREE :
                </label>
                <input type = "text" name = "deg"  required/>
            </p>

            <p>
                <input type = "Submit" name = "Submit" value ="Submit" />
                <button type="cancel" name="Cancel" value="Cancel"><a href="admin.php">Cancel</a></button>
            </p>


            </form>
        </div>
    </body>
</html>