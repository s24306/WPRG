<?php
session_start();
include 'dbConn.php';

if(isset($_POST['login']) && isset($_POST['password'])){

    $sql = "SELECT * FROM users
            WHERE
                        username = '".$_POST['login']."' AND
                        password = '".$_POST['password']."' ";

    if (!$_SESSION['userData'] = $db->query($sql)->fetchArray(1)) {
        echo "Error: ".$sql."<br>".mysqli_error($db);
        include 'dbDisconnect.php';
        $_SESSION['InvalidLogin'] = "The password is incorrect or the account you're trying to access doesn't exist.";
        header("Location: login.php");
    } else {
        include 'dbDisconnect.php';
        echo "Login successful! Redirecting to the login page...";
        $_SESSION['loggedIn'] = true;
        header("Location: index.php");
    }
} else {
    header('Location: login.php');
}

?>