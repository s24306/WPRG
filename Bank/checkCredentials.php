<?php
session_start();
include 'dbConnect.php';

if(isset($_POST['login']) && isset($_POST['password'])){
    $sql = "SELECT * FROM customers
            WHERE
                        PESEL = ".$_POST['login']." AND
                        password = ".$_POST['password']." ";

    if (!$_SESSION['accountData'] = mysqli_fetch_assoc(mysqli_query($db_link, $sql))) {
        echo "Error: ".$sql."<br>".mysqli_error($db_link);
    } else {
        echo "Login successful! Redirecting to the account...";
        $_SESSION['loggedAccountId'] = $_SESSION['accountData'][0];
        $_SESSION['loggedIn'] = True;
        header("Location: account.php");
    }
}



include 'dbDisconnect.php';
?>