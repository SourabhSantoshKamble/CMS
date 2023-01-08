<?php
session_start();
if(isset($_SESSION['ADMIN']) != true)
{
    header("location: login.php");
    exit;
}
include "connection.php";
$sql = "SELECT * FROM doctor;";
$result = mysqli_query($conn,$sql);
?>

<!doctype html>
<html>
    <head>
        <title>
            VIEW DOCTOR
        </title>
        <style>
        table,td,th{
            border:1px solid black;
        }

        </style>
    </head>
    <body>
        <center>
            <div id="header">
                <header>
                <h1>
                CLINIC MANAGEMENT
                </h1>
                    <h2>
                            DOCTOR DETAILS
                    </h2>
                </header>
            </div>
            <div id="table">
                <table style="width:100%;border:1px solid black;">
                    <tr>
                        <th style="border:1px solid black;">
                        USERNAME
                        </th>
                        <th>
                        PHONE NUMBER
                        </th>
                        <th>
                        AGE
                        </th>
                        <th>
                        SEX
                        </th>
                        <th>
                        ADDRESS
                        </th>
                        <th>
                        DEGREE
                        </th>
                    </tr>
                    <?php
                              while($row = mysqli_fetch_assoc($result)){ 
                               echo "<tr>
                               <td>".$row['DNAME']."</td>
                                <td>".$row['PHONE']."</td>
                                <td>".$row['AGE']."</td>
                                <td>".$row['SEX']."</td>
                                <td>".$row['ADDRESS']."</td>
                                <td>".$row['DEGREE']."</td>
                                </tr>";
                                }
                    ?>          
                </table>
            </div>
        <br/>
        <br/>
        <button type="cancel" name="Cancel" value="Cancel"><a href="admin.php">Back</a></button>
        </center>
    </body>
</html>