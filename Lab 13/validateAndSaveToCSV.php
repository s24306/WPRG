<?php

$fullNameValid = true;
$emailValid = true;
$phoneNumberValid = true;
$passwordValid = true;
$dataValid = true;

$fullName = $_POST["fullName"];
$email = $_POST["email"];
$phoneNumber = $_POST["phoneNumber"];
$password = $_POST["password"];

$fullNameExp = "/^.*\s.*$/";
$emailExp = "/^.*@.*\.+.{2,}$/";
$phoneNumberExp = "/[\d\-\s]/";
$passwordExp = "/^(?![\s]).{8,20}$/";

if(!preg_match($fullNameExp, $fullName)){
    $fullNameValid = false;
    $dataValid = false;
}
if(!preg_match($emailExp, $email)){
    $emailValid = false;
    $dataValid = false;
}
if(!preg_match($phoneNumberExp, $phoneNumber)){
    $phoneNumberValid = false;
    $dataValid = false;
}
if(!preg_match($passwordExp, $password)){
    $passwordValid = false;
    $dataValid = false;
}

if(!$fullNameValid){
    echo "Full name field is not valid!";
}
if(!$emailValid){
    echo "Email field is not valid!";
}
if(!$phoneNumberValid){
    echo "Phone number field is not valid!";
}
if(!$fullNameValid){
    echo "Full name field is not valid!";
}

if(!$dataValid){
    echo "<a href='form.html'>Go back</a>";
} else {
    $data = [$fullName, $email, $phoneNumber, $password];
    $filename = 'users.csv';

    $f = fopen($filename, 'a+');

    if ($f === false) {
        die('Error opening the file ' . $filename);
    }
    //$f = file_put_contents($filename, $data, FILE_APPEND);

        fputcsv($f, $data, ",");

    fclose($f);
}