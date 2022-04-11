<?php

function oblicz($rodzaj, $ilosc, $dodatki){
    $rodzaj = substr($rodzaj, 0, strpos($rodzaj, "["));
    include "data.php";
    $sumaDodatkow = 0;
    foreach ($dodatki as $dodatek){
        $sumaDodatkow += $dodatek;
    }
        return $dishes[$rodzaj] * $ilosc + $sumaDodatkow;
}

?>