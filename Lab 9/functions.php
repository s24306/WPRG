<?php
function rollTheDice(){
    $number = rand(1,10);
    if(!($number % 5)) {
        return true;
    } else {
        return false;
    }
}

function hasStrength($source, $target){
    foreach($source->strengths as $strength){
        if (in_array($strength, $target->weaknesses)) {
            return 0.5;
        }
    }
    foreach($source->weaknesses as $weakness){
        if (in_array($weakness, $target->weaknesses)) {
            return 2.0;
        }
    }
    return 1;
}
?>