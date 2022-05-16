<?php
session_start();
$db_link = $_SESSION['dbConnection'];

if(!mysqli_close($db_link)){
    echo 'Nie udało się zamknąć bazy<br>';
} else{
    echo 'Zamknięto połączenie<br>';
}
?>