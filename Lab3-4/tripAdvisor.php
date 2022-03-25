<?php

$dateFrom = $_POST['date-from'];
$dateTo = $_POST['date-to'];
$people = $_POST['people'];
$country = $_POST['country'];
$countryPrice = 0;

$countries = [
    'Poland' => 10,
    'Germany' => 15,
    'USA' => 20,
    'France' => 2,
    'Norway' => 69
];

switch ($country){
    case "Poland":
        $countryPrice = 10;
        break;
    case "Germany":
        $countryPrice = 15;
        break;
    case "USA":
        $countryPrice = 20;
        break;
    case "France":
        $countryPrice = 2;
        break;
    case "Norway":
        $countryPrice = 69;
        break;
}

?>