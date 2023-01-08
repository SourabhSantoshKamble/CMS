<?php
session_start();
if(isset($_SESSION['DOCTOR']) != true)
{
    header("location: login.php");
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <title>
            DOCTOR PORTAL
        </title>
    </head>
    <body>
        <center>
            <div id="header">
                <header>
                <h1>
                CLINIC MANAGEMENT
                </h1>
                    <h2>
                        DOCTOR PORTAL
                    </h2>
                </header>
            </div>
        </center>
        <div>
        <script>
            confirm("LOGGED IN AS <?php echo $_SESSION['NAME']?>");
        </script>
    <div>
        <div  id= nav>
            <nav>
                <ul>
                    <li><a href="vpatient.php">View Patients </a></li>
                    <li><a href="change_pass.php">Change Password</a></li>
                    <li><a href="logout.php">Logout </a></li>
                </ul>
            </nav>
        </div>
    </body>
</html>