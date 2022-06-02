<?php
session_start();
include 'dbConnect.php';

$fromAccount = $_SESSION['transferData'][0];
$toAccount = $_SESSION['transferData'][1];
$amountToTransfer = $_SESSION['transferData'][2];
$exchangeRate = 1;

$sql = "SELECT currency FROM accounts WHERE account_id=".$fromAccount." ";
$fromCurrency = mysqli_fetch_assoc(mysqli_query($db_link, $sql))["currency"];
$sql = "SELECT currency FROM accounts WHERE account_id=".$toAccount." ";
$toCurrency = mysqli_fetch_assoc(mysqli_query($db_link, $sql))["currency"];
if(strcmp($fromCurrency, $toCurrency)){
    $sql = "SELECT rate FROM currency_exchange WHERE from_currency='".$fromCurrency."' AND to_currency='".$toCurrency."' ";
    $exchangeRate = mysqli_fetch_assoc(mysqli_query($db_link, $sql))["rate"];
}

mysqli_begin_transaction($db_link);

try {
    mysqli_query($db_link, "INSERT INTO transactions
                                  (from_account_id,
                                  to_account_id,
                                  date_issued,
                                  amount,
                                  currency)
                                  VALUES
                                  (".$fromAccount.",
                                   ".$toAccount.",
                                   CURDATE(),
                                   ".$amountToTransfer.",
                                   '".$fromCurrency."') ");
    mysqli_query($db_link, "UPDATE accounts
                                  SET balance=balance-".$amountToTransfer."
                                  WHERE account_id=".$fromAccount." ");
    mysqli_query($db_link, "UPDATE accounts
                                  SET balance=balance+".($amountToTransfer*$exchangeRate)."
                                  WHERE account_id=".$toAccount." ");
    mysqli_commit($db_link);
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($db_link);
    throw $exception;
}

include 'dbDisconnect.php';

unset($_SESSION['transferData']);