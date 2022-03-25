<?php

$a = 1;
$b = 2;
$c = 5;
echo "Pitagoras? ";
if (($a*$a + $b*$b) === $c*$c)
    echo "pyta golasa";
else
    echo "nie pyta golasa";

echo "<br />";

$num = 1;

switch ($num) {
    case '1': echo "poniedziałek"; break;
    case '2': echo "wtorek"; break;
    case '3': echo "środa"; break;
    case '4': echo "czwartek"; break;
    case '5': echo "piątek"; break;
    case '6': echo "sobota"; break;
    case '7': echo "niedziela"; break;
    default: echo "slava ukrainu";
}

echo "<br />";

$month = 2;
$year = 2021;

if((($year%4 == 0 && $year%100 != 0) || $year%400 == 0) && $month == 2)
    echo "29";
else if ($month == 1)
    echo "31";
else if ($month == 2)
    echo "28";
else if ($month == 3)
    echo "31";
else if ($month == 4)
    echo "30";
else if ($month == 5)
    echo "31";
else if ($month == 6)
    echo "30";
else if ($month == 7)
    echo "31";
else if ($month == 8)
    echo "31";
else if ($month == 9)
    echo "30";
else if ($month == 10)
    echo "31";
else if ($month == 11)
    echo "30";
else
    echo "31";

echo "<br />";

function throw_dice(){
    return rand (1, 6);
}

echo "Dice throw result: ";
echo throw_dice();

echo "<br />";

$radius = 6;

function circle_diameter($radius){
    return 2*$radius;
}

echo "Circle diameter: ";
echo circle_diameter($radius);

echo "<br />";
echo "<br />";

$sentence = "Ekhm.tu Kielce<br />
Scyzoryk, Scyzoryk tak na mnie wołają<br />
Ludzie spoza mego miasta pewnie oni rację mają<br />
Bo ja jestem z Kielc i tak już zostanie<br />
Czy chcesz tego czy nie<br />
Zapamiętaj jedno<br />
Że o Kielcach, o Kielcach ta historia<br />
Mieście pełnym cudów brudów<br />
Śmieci żuli, dziwek, ćpunów<br />
Księży, uprzęży, skarbów pełnych węży boa<br />
Wystarczy spojrzeć dookoła<br />
Tego nie ma w podręcznikach i nie mówią o tym w szkołach<br />
Że to miasto (hu!) to miasto (ha!)<br />
Jest jak czynny kurwa wulkan<br />
I coś w sobie kurwa ma<br />
Jest dziwny niczym New York<br />
I powabne jak nanana<br />";

function censor($sentence){
    $sentence_array = explode(" ", $sentence);
    $censored_words = ["dupa", "kurwa", "chuj", "niczym", "dziwek,", "chujów"];
    foreach($sentence_array as $key => $word){
        if (in_array($word, $censored_words)){
            $sentence_array[$key] = "****";
        }
    }
    $sentence = implode(" ", $sentence_array);
    return $sentence;
}
$a = censor($sentence);

echo $a;

echo "<br />";

$pesel = "07321206789";

function pesel($pesel){
    if((int)$pesel[2] > 1){
        $pesel[2] = (int)$pesel[2] - 2;
        return $pesel[4].$pesel[5]."-".$pesel[2].$pesel[3]."-".$pesel[0].$pesel[1];
    } else {
        return $pesel[4].$pesel[5]."-".$pesel[2].$pesel[3]."-".$pesel[0].$pesel[1];
    }
}
echo pesel($pesel);
echo "<br />";

function calculate_triangle_area($width, $height){
    return ($width*$height)/2;
}

function calculate_square_area($width){
    return $width*$width;
}

function calculate_trapeze_area($width, $length, $height){
    return (($width+$length)*$height)/2;
}

$shape = "square";

function calculate_area($shape, $a, $b, $c){
    switch($shape){
        case 'square':
            echo calculate_square_area($a);
            break;
        case 'triangle':
            echo calculate_triangle_area($a, $b);
            break;
        case 'trapeze':
            echo calculate_trapeze_area($a, $b, $c);
            break;
        default: echo "wrong shape";
    }
}

echo "Shape area is: ";
calculate_area($shape, 2, 3, 4);

echo "<br />";
echo "<br />";

function returnArrayIndex($index){
    $randomNumbersArray = [];

    for($i = 0; $i < 6; $i++){
        array_push($randomNumbersArray, throw_dice());
    }

    return $randomNumbersArray[$index];
}

echo returnArrayIndex(3);

echo "<br />";

$NationalityArray = array("Poland" => "polish", "Germany" => "german", "Russia" => "kacap");

function whatNationalityAmI($arr, $nation){
    return $arr[$nation];
}

echo "Your nationality is: ";
echo whatNationalityAmI($NationalityArray, "Russia");
echo "<br />";

function generateRandomNumbersArray(){
    $arr = [];
    for($i = 0; $i < 10; $i++){
        $arr[$i] = throw_dice();
    }
    return $arr;
}

$randomArray = generateRandomNumbersArray();

function maxFor($arr){
    $max = null;
    for($i = 0; $i < sizeof($arr); $i++){
        if ($arr[$i] > $max){
            $max = $arr[$i];
        }
    }
    return $max;
}

echo maxFor($randomArray);
echo "<br />";

function maxForEach($arr){
    $max = null;
    foreach($arr as $a){
        if ($a > $max){
            $max = $a;
        }
    }
    return $max;
}

echo maxForEach($randomArray);
echo "<br />";

function maxWhile($arr){
    $max = null;
    $i = 0;
    while($i < sizeof($arr)){
        if ($arr[$i] > $max){
            $max = $arr[$i];
        }
        $i++;
    }
    return $max;
}

echo maxWhile($randomArray);
echo "<br />";

function maxDoWhile($arr){
    $max = null;
    $i = 0;
    do{
        if ($arr[$i] > $max){
            $max = $arr[$i];
        }
        $i++;
    } while($i < sizeof($arr));
    return $max;
}

echo maxDoWhile($randomArray);
echo "<br />";

function NewDiceThrow($numOfThrows){
    $throwResults = [];
    for($i = 0; $i < $numOfThrows; $i++){
        array_push($throwResults, throw_dice());
    }
    return $throwResults;
}
var_dump(NewDiceThrow(10));
echo "<br />";

function printTabliczkaMnozenia($side){
    for($i = 1; $i <= $side; $i++){
        for($j = 1; $j <= $side; $j++){
            echo $i*$j;
            echo "\t";
        }
        echo "<br >";
    }
}

printTabliczkaMnozenia(10);
echo "<br />";


function checkPrime($num){
    $iter = 0;
    $prime = true;
    $primeArray = [];
    $notPrimeArray = [];
    for($i = 2; $i <= $num; $i++){
        array_push($primeArray, $i);
    }
    /*while(true){
        if (sizeof($primeArray) == 1 || $primeArray[0] == $num){
            exit();
        }
        foreach($primeArray as $pa){
            $iter++;
            if($pa == $num){
                break 2;
            }
            if (in_array($pa, $notPrimeArray)) {
                break 2;
            } else {
                for($j = 0; $j <= $num; $j++) {
                    $notPrime = $pa * $pa + $j * $pa;
                    if ($notPrime > $num) {
                        break;
                    } else {
                        array_push($notPrimeArray, $notPrime);
                    }
                }
                array_diff( $primeArray, [$notPrime] );
                array_splice($primeArray, $pa, 1);
                break 1;
            }
        }
    }*/
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
    var_dump($notPrimeArray);
    echo $iter;
    return $prime;
}

echo checkPrime(89);

?>