<?php

$num = $_POST['prime'];

function checkPrime($num){
    $iter = 0;
    $prime = true;
    $primeArray = [];
    $notPrimeArray = [];
    for($i = 2; $i <= $num; $i++){
        array_push($primeArray, $i);
    }
    for($i = 2; $i <= $num; $i++){
        $iter++;
        if (in_array($num, $notPrimeArray)) {
            $prime = false;
            break;
        }
        if (in_array($i, $notPrimeArray)) {
            continue;
        } else {
            for($j = 0; $j <= $num; $j++){
                $notPrime = $i*$i + $j*$i;
                if($notPrime > $num){
                    break;
                } else {
                    array_push($notPrimeArray, $notPrime);
                }
            }
        }
    }
    echo "num of iterations: ".$iter."<br />";
    if($prime == true){
        return "prime!";
    } else {
        return "not prime!";
    }
}

echo checkPrime($num);

?>