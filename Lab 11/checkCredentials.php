<?php
session_start();
$db = new SQLite3('LocalDB.db');

$login = $_POST['login'];
$password = $_POST['password'];

$results = $db->query("SELECT * 
                             FROM users
                             WHERE login='".$login."' AND password='".$password."'");
if($results){
    $row = $results->fetchArray();
    $_SESSION['loggedUserId'] = $row["id"];
    header("Location: userPage.php");
} else {
    echo "OOPSIE-DOOPSIE WRONG PASSWORD UWU<br>";
    echo "<a href='Login.php'>Go back<a/>";
}
?>