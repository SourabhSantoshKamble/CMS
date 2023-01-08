<?php
session_start();
if(isset($_SESSION['ADMIN']) != true)
{
    header("location: login.php");
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <title>
        ADMIN PORTAL
        </title>
    <head>
<body>
    <div id = "header">
    <center>
    <header>
       <h1>
            CLINIC MANAGEMENT
       </h1>
       <h2>
            ADMIN PORTAL
        </h2>
    </header>
    </center>
    </div>
    <div>
    <script>
                confirm("Logged in as : <?php echo $_SESSION['NAME'];?>");
        </script>
    </div>
    <div id="nav">
        <nav>
            <ul>
                <li> <a href = "adoctor.php" > ADD DOCTOR </a> </li>
                <li> <a href = "areceptionist.php" > ADD RECEPTIONIST </a> </li>
                <li> <a href = "vdoctor.php" > VIEW DOCTOR </a> </li>
                <li> <a href = "vreceptionist.php" > VIEW RECEPTIONIST</a> </li>
                <li> <a href = "rdoctor.php" > REMOVE DOCTOR </a> </li>
                <li> <a href = "rreceptionist.php" > REMOVE RECEPTIONS </a> </li>
                <li> <a type="button" href = "change_pass.php" > CHANGE PASSWORD </a> </li>
                <li> <a href = "logout.php" > LOGOUT </a> </li>
            </ul>
        </nav>
    </div>    
</body>
</html>

