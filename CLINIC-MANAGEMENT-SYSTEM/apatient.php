<?php
session_start();
if(isset($_SESSION['RECEPTIONIST']) != true)
{
    header("location: login.php");
    exit;
}
include "connection.php";
if (isset($_POST['Submit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $add = $_POST['addr'];
    $status = "NEW";
    $sql = "INSERT INTO patient VALUES ('$name',$phone,'$age','$sex','$add','$status');";
    $result = mysqli_query($conn,$sql);
    if($result){
        ?>
    <script>
            confirm("PATIENTS DETAILS ADDED");
    </script>       
<?php
    header('location:atoken.php');
    exit;
        
    }
    else{
    ?>
    <script>
            confirm("ERROR");
    </script>       
<?php
    }
    if($result){
    header('Location:receptionist.php');
    // exit;
    }
}
?>
<!doctype html>
<html>
    <head>
        <title>
            ADD PATIENT
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
                ADD PATIENT 
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
                <input type = "Submit" name = "Submit" value ="Submit" />
                <button type="cancel" name="Cancel" value="Cancel"><a href="receptionist.php">Cancel</a></button>
           
            </p>

            </form>
        </div>
    </body>
</html>