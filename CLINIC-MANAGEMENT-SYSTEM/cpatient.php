<?php
session_start();
if(isset($_SESSION['DOCTOR']) != true)
{
    header("location:login.php");
    exit;
}
include "connection.php";
$id = $_GET['id'];
$sql = "SELECT * FROM patient,token where PID = $id AND PHONE = $id ;";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if(isset($_POST['Submit'])){
    $status = "DONE";
    $d = $_POST['disease'];
    $prec = $_POST['prec'];
    $pid = $row['PHONE'];
    $sql = "UPDATE patient set STATUS='$status' WHERE PHONE=$id;"; 
    $result= mysqli_query($conn,$sql);
    $sql1 = "INSERT INTO `prescribe`(`PID`, `PRES`, `DISEASE`) VALUES($pid,'$prec','$d');";
    $result1 = mysqli_query($conn,$sql1);
    if($result){
        header('Location:vpatient.php');
        exit;
    }
}
?>
<!doctype html>
<html>
    <head>
        <title>
            CONSULT PATIENT
        </title>
        <style>
        table,td,th{
            border:1px solid black;
        }

        </style>
    </head>
    <body>
        <div id="header">
            <center>

                <header>
                        CONSULT PATIENT
                </header>
        </center>
        </div>
        <div id="form">
            <form action="" method="POST">
                <table>
                    <tr>
                        <label>
                            PRESCRIPTIONS :
                        </label>
                        <?php
                            echo "<tr>
                                <td> PATIENT NAME : </td>
                                <td>".$row['NAME']."</td>
                            </tr>
                            <tr>
                                <td> AGE : </td>
                                <td>".$row['AGE']."</td>
                            </tr>
                            <tr>
                                <td> SEX : </td>
                                <td>".$row['SEX']."</td>
                            </tr>
                            <tr>
                                <td> ADDRESS : </td>
                                <td>".$row['ADDRESS']."</td>
                            </tr>
                            <tr>
                                <td> CONTACT : </td>
                                <td>".$row['PHONE']."</td>
                            </tr>"
                        ?>
                        <tr>
                            <td>
                            DISEASE:
                            </td>
                            <td>
                                <input type="text" name="disease" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                PRESCRIPTION :
                            </td>
                            <td>
                            <textarea name="prec" row="4"required>
                            </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <input type ="Submit" name="Submit" value="Prescribe"/>
                            </td>
                            <td>
                            <button type="cancel" name="Cancel" value="Cancel"><a href="doctor.php">Cancel</a></button>
                            </td>
                        </tr>               
                </table>
            </form>
        </div>
    </body>
</html>