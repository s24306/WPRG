<?php
session_start();

if(!isset($_POST['name'])){
    header("Location: customerPage.php");
}

$name = $_POST['name'];
$surname = $_POST['surname'];
$nameSurnameExp = "/^.*$/";
$pesel = $_POST['pesel'];
$dob = $_POST['dob'];
$accountType = "Current";
$currency = $_POST['currency'];
$customerPassword = date('Y', strtotime($dob)).date('m', strtotime($dob)).date('d', strtotime($dob));

$_SESSION['isDataValid'] = true;
$_SESSION['wrongValidationMessage'] = "";

if(!ctype_alpha($name) || !preg_match($nameSurnameExp, $name)){
    $_SESSION['wrongValidationMessage'] .= "Name must contain only alpha characters 
    - no numbers, spaces or special characters allowed<br>";
    $_SESSION['isDataValid'] = false;
}
if(!ctype_alpha($surname) || !preg_match($nameSurnameExp, $surname)){
    $_SESSION['wrongValidationMessage'] .= "Surname must contain only alpha characters 
    - no numbers, spaces or special characters allowed<br>";
    $_SESSION['isDataValid'] = false;
}
if(!ctype_digit($pesel) || !(10 < strlen($pesel)) || !(strlen($pesel) < 12)){
    $_SESSION['wrongValidationMessage'] .= "Pesel must contain only digits 
    - no alpha or special characters allowed<br>";
    $_SESSION['isDataValid'] = false;
}
if( !(1918 < date('Y', strtotime($dob))) || !(date('Y', strtotime($dob))< 2020)){
    $_SESSION['wrongValidationMessage'] .= "Invalid date of birth<br>";
    $_SESSION['isDataValid'] = false;
}

if($_SESSION['isDataValid'] == false){
    header("Location: customerCreation.php");
} else {
    $_SESSION['customerData'] = [$name, $surname, $pesel, $dob, $customerPassword];
    $_SESSION['accountData'] = [$accountType, $currency];
    include 'createCustomer.php';
    header("Location: login.php");
}
