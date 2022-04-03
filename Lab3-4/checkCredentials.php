<?php
$adminLogin = "admin";
$adminPassword = "dupa123";
$login = $_POST['login'];
$password = $_POST['password'];

if(($adminLogin == $login) && ($adminPassword == $password)){
    $_SESSION['logged'] = $login;
    header("Location: AdminPage.php");
} else {
    echo "OOPSIE-DOOPSIE WRONG PASSWORD UWU";
    echo "<a href='Login.php'>Go back<a/>";
}
?>