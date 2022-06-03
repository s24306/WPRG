<?php
session_start();

if(!$db_link->close()){
    echo 'Nie udało się zamknąć bazy<br>';
} else{
    echo 'Zamknięto połączenie<br>';
}
?>