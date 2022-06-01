<?php
session_start();
include 'dbConnect.php';

$queryData = $_SESSION['customerData'];

$sql = "INSERT INTO customers (
                       first_name,
                       last_name,
                       PESEL,
                       date_of_birth,
                       password)
        VALUES (
                '$queryData[0]',
                '$queryData[1]',
                $queryData[2],
                '$queryData[3]',
                '$queryData[4]')";

if (mysqli_query($db_link, $sql)) {
    echo "New customer created successfully<br>";
} else {
    echo "Error: ".$sql . "<br>" . mysqli_error($db_link);
}

$sql = "SELECT LAST_INSERT_ID()";

if (!$lastID = mysqli_fetch_assoc(mysqli_query($db_link, $sql))) {
    echo "Error: ".$sql."<br>".mysqli_error($db_link);
}

$queryData = $_SESSION['accountData'];
print_r($lastID);

$sql = "INSERT INTO accounts (
                       customer_id,
                       balance,
                       account_type,
                       currency)
        VALUES (
                ".$lastID['LAST_INSERT_ID()'].",
                0,
                '$queryData[0]',
                '$queryData[1]')";

if (mysqli_query($db_link, $sql)) {
    echo "New account created successfully";
} else {
    echo "Error: ".$sql."<br>".mysqli_error($db_link);
}
include 'dbDisconnect.php';
?>