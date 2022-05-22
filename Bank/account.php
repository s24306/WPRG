<?php
session_start();
include 'header.php';

foreach ($_SESSION['accountData'] as $data){
    echo $data."<br/>";
}

echo "<a href='logout.php'>Logout</a>";

include 'footer.php';
?>