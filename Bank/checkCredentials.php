<?php
session_start();
include 'dbConnect.php';

if(isset($_POST['login']) && isset($_POST['password'])){
    $sql = "SELECT * FROM customers
            WHERE
                        PESEL = ".$_POST['login']." AND
                        password = ".$_POST['password']." ";

    if (!$_SESSION['customerData'] = $db_link->query($sql)->fetch_assoc()) {
        echo "Error: ".$sql."<br>".mysqli_error($db_link);
        $_SESSION['InvalidLogin'] = "The password is incorrect or the account you're trying to access doesn't exist.";
        header("Location: login.php");
    } else {
        echo "Login successful! Redirecting to the login page...";
        $_SESSION['loggedIn'] = true;
        header("Location: customerPage.php");
    }
}



include 'dbDisconnect.php';
?>