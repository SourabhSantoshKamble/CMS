<?php
session_start();
if(isset($_SESSION['DOCTOR']) != true)
{
    header("location: login.php");
    exit;
}
include "connection.php";
$sql = "SELECT * FROM patient,token WHERE PID=PHONE AND STATUS='NEW' ORDER BY TNO ;";
$result = mysqli_query($conn,$sql);
?>

<!doctype html>
<html>
    <head>
        <title>
            VIEW PATIENT
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
                    PATIENT DETAILS
                </h2>
                </header>
            </div>
            <div id="table">
                <table style="width:100%;border:1px solid black;">
                    <tr>
                        <th>
                        PATIENT ID
                        </th>
                        <th>
                        PATIENT NAME
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
                        Consult
                        </th>
                    </tr>
                    <?php
                        while($row = mysqli_fetch_assoc($result)){ 
                            echo "<tr>
                            <td>".$row['TNO']."</td>
                            <td>".$row['NAME']."</td>
                            <td>".$row['PHONE']."</td>
                            <td>".$row['AGE']."</td>
                            <td>".$row['SEX']."</td>
                            <td>".$row['ADDRESS']."</td>
                            <td>"
                    ?>
                            <a type="button" href="cpatient.php?id=<?php echo $row['PHONE'];?>">Consult</a>
                <?php        echo "</td></tr>";
                    }
                ?>          
                </table>
            <br />
            <br />
                <button name="cancel"><a href="doctor.php">Back</a></button>           
            </div>
            </center>

    </body>
</html>