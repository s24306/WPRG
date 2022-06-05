<?php
session_start();
include 'dbConnect.php';

if(isset($_POST['login']) && isset($_POST['password'])){
    if(!ctype_digit($_POST['login'])){
        $_SESSION['InvalidLogin'] = "The password is incorrect or the account you're trying to access doesn't exist.";
        header("Location: http://szuflandia.pjwstk.edu.pl/~s24306/test/Bank/login.php");
    }
    $sql = "SELECT * FROM customers
            WHERE
                        PESEL = ".$_POST['login']." AND
                        password = ".$_POST['password']." ";

    if (!$_SESSION['customerData'] = $db_link->query($sql)->fetch_assoc()) {
        echo "Error: ".$sql."<br>".mysqli_error($db_link);
        include 'dbDisconnect.php';
        $_SESSION['InvalidLogin'] = "The password is incorrect or the account you're trying to access doesn't exist.";
        header("Location: http://szuflandia.pjwstk.edu.pl/~s24306/test/Bank/login.php");
    } else {
        include 'dbDisconnect.php';
        echo "Login successful! Redirecting to the login page...";
        $_SESSION['loggedIn'] = true;
        setcookie("loggedIn", $_SESSION['customerData'], time() + (300), "/");
        header("Location: http://szuflandia.pjwstk.edu.pl/~s24306/test/Bank/customerPage.php");
    }
} else {
    header('Location: login.php');
}

?>