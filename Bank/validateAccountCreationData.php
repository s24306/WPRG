<?php
session_start();

$name = $_POST['name'];
$surname = $_POST['surname'];
$pesel = $_POST['pesel'];
$dob = $_POST['dob'];
$accountType = $_POST['accountType'];
$currency = $_POST['currency'];
$customerPassword = date('Y', strtotime($dob)).date('m', strtotime($dob)).date('d', strtotime($dob));

$_SESSION['isDataValid'] = true;
$_SESSION['wrongValidationMessage'] = "";

if(!ctype_alpha($name)){
    $_SESSION['wrongValidationMessage'] .= "Name must contain only alpha characters 
    - no numbers or special characters allowed<br>";
    $_SESSION['isDataValid'] = false;
}
if(!ctype_alpha($surname)){
    $_SESSION['wrongValidationMessage'] .= "Surname must contain only alpha characters 
    - no numbers or special characters allowed<br>";
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
    header("Location: accountCreation.php");
} else {
    $_SESSION['customerData'] = [$name, $surname, $pesel, $dob, $customerPassword];
    $_SESSION['accountData'] = [$accountType, $currency];
    include 'createAccount.php';
    header("Location: account.php");
}
