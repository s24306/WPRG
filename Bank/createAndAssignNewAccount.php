<?php
include 'Customer.php';
include 'Account.php';
session_start();
include 'dbConnect.php';

if(!isset($_POST['currency'])){
    header("Location: customerPage.php");
}

$currency = $_POST['currency'];
$accountType = "Current";

$sql = "INSERT INTO accounts (
                       customer_id,
                       balance,
                       account_type,
                       currency)
        VALUES (
                ".$_SESSION['loggedCustomerData']->getCustomerId().",
                0,
                '$accountType',
                '$currency')";

if (mysqli_query($db_link, $sql)) {
    echo "New account created successfully<br>";
} else {
    echo "Error: ".$sql . "<br>" . mysqli_error($db_link);
}

header("Location: customerPage.php");