<?php
session_start();

$username = "s24306";
$host = 'szuflandia.pjwstk.edu.pl';
$port = 22;
$ssh_password = '';

$connection = ssh2_connect($host, $port);
if(!ssh2_auth_password($connection, $username, $ssh_password)){
    echo 'Hasło ssh nie zautoryzowane';
} else{
    echo 'Połączono z ssh<br>';
}

$servername = "127.0.0.1";
$password = "";
$database = "s24306";

if(!$db_link = mysqli_connect($servername, $username, $password)){
    exit("Failed to connect to MySQL: " . mysqli_connect_error());
} else {
    echo 'Połączono z serwerem<br>';
}

if(!mysqli_select_db($db_link, $database)){
    echo 'Błąd pobór danych<br>';
} else{
    echo 'udało się pobrać dane<br>';
}

$_SESSION['dbConnection'] = $db_link;
?>