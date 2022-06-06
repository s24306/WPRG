<?php
session_start();

if(!$db->close()){
    echo 'Nie udało się zamknąć bazy<br>';
}
?>