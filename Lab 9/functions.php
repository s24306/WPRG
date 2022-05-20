<?php
function rollTheDice(){
    $liczba = rand(0,9);
    if($liczba % 2) {
        return true;
    } else {
        return false;
    }
}
?>