<?php
session_start();
if(isset($_SESSION['ADMIN']) == true)
{
  header("location: admin.php");
  exit;
}
if(isset($_SESSION['DOCTOR']) == true)
{
  header("location: doctor.php");
  exit;
}
if(isset($_SESSION['RECEPTIONIST']) == true)
{
  header("location: receptionist.php");
  exit;
}
// INCLUDES CONNCETION PAGE
include "connection.php";

if (isset($_POST['Login'])){

      $phone = $_POST['PHONE'];
      $password = $_POST['PASSWORD'];
       //STORING SQL QUERRY
       $sql = "SELECT * FROM users where PHONE='$phone' AND PASSWORD = '$password';" or die(mysqli_error($conn));;
       // RUNNING SQL QUERRY ON SQL SERVER
       $result = mysqli_query($conn,$sql);
       //FINDS NO OF ROWS
       $q = mysqli_num_rows($result);
       if($result){ 
      $row = ($result);
      if($q == 0){
          $_SESSION['error'] = "Invalid Phone Number or Password";
            header('location:login.php');
            exit;
      }
      // FETCH DATA
      $row = mysqli_fetch_assoc($result);
      $NAME = $row['ROLE'];
       $DNAME = $row['USERNAME'];
       if ($NAME=='ADMIN'){
        session_start();
        $_SESSION['ADMIN'] = true;
        $_SESSION['NAME'] = 'ADMIN';
                header('Location:admin.php');
                return;
       }
       else if($NAME == 'DOCTOR'){
        session_start();
        $_SESSION['DOCTOR'] = true;
        $_SESSION['NAME'] = $DNAME ;
        header('Location:doctor.php');
      }
       else if ($NAME=='RECEPTIONIST'){
        session_start();
        $_SESSION['RECEPTIONIST'] = true;
        $_SESSION['NAME'] = $DNAME ;
            header('Location:receptionist.php');
        }
       else{
        ?>
        <script>
        confirm("Invalid Phone Number or Password")
        </script>
        <?php
       }
    }
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>
            LOGIN PAGE
        </title>

    </head>
    <body>
    <?php 
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
       
        ?>
      <center>
        <div id="header">
                <header>
                <h1><u>
                    LOGIN 
                </u></h1>
                </header>
        </div>
        <div id="form">
            <form action="" method="POST">
                <p>

                    <label>
                         PHONE :
                    </lable>
                    <input type="text"  name="PHONE"  required/>
                </p>
                <p>
                   <label>
                            PASSWORD :
                    </lable>
                    <input type="password"  name="PASSWORD" required />
                </p>
                <p>
                    <input type="Submit"  id="btn" name ="Login" value="Login"/> 
                </p>
            </form>
        </div>
        </center>
    </body>
</html>
