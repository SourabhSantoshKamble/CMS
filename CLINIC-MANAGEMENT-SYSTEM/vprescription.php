<?php
   /* if(($_SESSION['RECEPTIONIST']) != true){
        header('location:login.php');
        exit;
    }*/
    include "connection.php";
    $sql = "SELECT * FROM patient,token WHERE PID = PHONE AND STATUS= 'DONE' ORDER BY TNO DESC;";
    $result=mysqli_query($conn,$sql);
    if(!$result){
        ?>
        <script>
        confirm("NO DATA TO BE SHOWN");
        </script>
        <?php
        header('location:receptionist.php');
        exit;
    }
?>
<!doctype html>
<html>
    <head>
        <title>
            PRESCRIPTION
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
                    PRESCRIPTION
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
                    PRESCRIPTION
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
                        <a type="button" href="ppres.php?id=<?php echo $row['PHONE'];?>">VIEW</a>
            <?php        echo "</td></tr>";
                }
            ?>          
            </table>
            <br />
            <br />
            <button type="cancel" name="cancel"><a href="receptionist.php">Back</a></button>
        </div>
        </center>
 
    </body>

</html>
