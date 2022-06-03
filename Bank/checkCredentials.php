<?php
session_start();
include 'dbConnect.php';

if(isset($_POST['login']) && isset($_POST['password'])){
    $sql = "SELECT * FROM customers
            WHERE
                        PESEL = ".$_POST['login']." AND
                        password = ".$_POST['password']." ";

    if (!$_SESSION['customerData'] = mysqli_fetch_assoc(mysqli_query($db_link, $sql))) {
        echo "Error: ".$sql."<br>".mysqli_error($db_link);
    } else {
        echo "Login successful! Redirecting to the login page...";
        $_SESSION['loggedIn'] = true;
        header("Location: customerPage.php");
    }
}



include 'dbDisconnect.php';
?>