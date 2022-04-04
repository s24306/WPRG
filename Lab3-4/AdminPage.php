<?php
session_start();
if(!isset($_SESSION['in_use'])){
    header("Location: Logout.php");
}
    echo "You're logged in. Congrats";
    echo "<a href='Logout.php'>Logout<a/>";

