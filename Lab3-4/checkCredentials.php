<?php
session_start();
$adminLogin = "admin";
$adminPassword = "dupa123";
$login = $_POST['login'];
$password = $_POST['password'];

if(($adminLogin == $login) && ($adminPassword == $password)){
    $_SESSION['in_use'] = true;
    header("Location: AdminPage.php");
} else {
    echo "OOPSIE-DOOPSIE WRONG PASSWORD UWU<br>";
    echo "<a href='Login.php'>Go back<a/>";
}
?>