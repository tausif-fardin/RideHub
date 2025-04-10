<?php
session_start();
    include('../model/db.php');

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
} else if (isset($_SESSION['email'])) {
    if ($_SESSION['type'] == "Vendor") {
        header('Location: VendorHome.php');
    }
    if ($_SESSION['type'] == "Admin") {
        header('Location: AdminHome.php');
    }
    if ($_SESSION['type'] == "customer") {
        header('Location: CustomerHome.php');
    }
}
$name = $_SESSION['name'];
$email = $_SESSION['email'];

$connection = new db();
$conobj = $connection->OpenCon();
$userQuery = $connection->ShowAll($conobj, "driver", $email);

if ($userQuery->num_rows > 0) {
    $row = mysqli_fetch_assoc($userQuery);
    $_SESSION["driver_id"] = $row['driver_id'];
} else {
    $error = "Username or Password or type  is invalid";
}
$connection->CloseCon($conobj);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mycss.css">
    <title>Driver Home</title>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,900&display=swap"
        rel="stylesheet">

</head>

<body>


    <div class="header">
        <h1>Welcome To RideHub</h1>
        <h2>Driver Home</h2>
    </div>


    <nav>
        <a href="DriverHome.php">Home</a> |
        <a href="DriverProfile.php">My Profile</a> |
        <a href="logout.php">Log Out</a>
    </nav>

    <?php
    if (isset($_SESSION['success'])) {
        echo ('<p id="msg">' . htmlentities($_SESSION['success']) . "</p>");
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])) {
        echo ('<p id="error">' . htmlentities($_SESSION['error']) . "</p>");
        unset($_SESSION['error']);
    }



    ?>
    <section class="pad-70">
        <center>
            <div class="container">
                <div class="row">

                    <div class="post post-center">
                        <img src="Pictures/img4.png" alt="show car">
                        <div class="tag"> <a href="ShowCarDriver.php">Requested Car By User</a></div>
                    </div>
                </div>
            </div>
        </center>
    </section>

    <footer>
        <div class="container footer-wrap">
            <div class="footer-left">
                <ul class="footer-menu">
                    <li><a href="">Terms and Conditions</a></li>
                    <li><a href="">Privacy</a></li>
                </ul>

            </div>
            <div class="footer-right">
                <ul class="footer-menu">
                    <li><a href="">Follow</a></li>
                    <li><a href=""><i class="fab fa-facebook"></i></a></li>
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li><a href=""><i class="fab fa-instagram"></i></a></li>

                </ul>
            </div>
        </div>
    </footer>
    <!-- footer  -->
    <script src="https://kit.fontawesome.com/2065a5e896.js" crossorigin="anonymous"></script>
</body>

</html>