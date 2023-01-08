<?php
/*if(($_SESSION['RECEPTIONIST']) != true){
    header('location:login.php');
    exit;
}*/
include "connection.php";
$id = $_GET['id'];
$sql = "SELECT * FROM patient,prescribe WHERE PHONE=$id AND PID=$id;";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html>
    <head>
        <title>
            PRESCRIPTION
        </title>
    </head>
    <style>
        table,td,th{
            border:1px solid black;
        }

        </style>
    <body>
    <div id="header">
        <center>
        <header>
        <h1> CLINIC MANAGEMENT </h1>
        <h2> PRESCRIPTION </h2>
        </header>
        <?php
        echo"<table>
                    <tr>
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
                </tr>
                <tr>
                    <td> DISEASE : </td>
                    <td>".$row['DISEASE']."</td>
                </tr>
                <tr>
                    <td>MEDICINES:</td>
                    <td>".$row['PRES']."</td>
                </tr>
        </table>";

        ?>
        <br />
        <br />
        <button type = "cancel" name="cancel"><a href ="vprescription.php" > Back </a></button>

        </center>
        </div>
        </body>
        </html>