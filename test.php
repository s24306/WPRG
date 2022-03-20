<?php

$a = 1;
$b = 2;
$c = 5;

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

echo "<br />";

$radius = 6;

function circle_diameter($radius){
    return 2*$radius;
}

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
    $censored_words = ["dupa", "kurwa", "chuj", "niczym"];
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

$pesel = "97332006789";

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

function rectangle_area(){

    return 0;
}

$shape = 1;
function calculate_area($shape){
    return 0;
}
?>