<?php
session_start();
include 'dbConnect.php';

$fromAccount = $_SESSION['transferData'][0];
$toAccount = $_SESSION['transferData'][1];
$amountToTransfer = $_SESSION['transferData'][2];
$exchangeRate = 1;
$recipientHasLoan = false;
$sql = "SELECT left_to_pay, paid_down FROM loans WHERE customer_id IN (SELECT customer_id FROM accounts WHERE account_id=".$toAccount.")";
if ($loanInfo = mysqli_fetch_assoc(mysqli_query($db_link, $sql))) {
    $loanAmount = $loanInfo["left_to_pay"];
    $recipientHasLoan = $loanInfo["paid_down"];
}

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
    if($recipientHasLoan){
        if($loanAmount < $amountToTransfer*0.1*$exchangeRate){
            $afterPayingDownTheLoan = $amountToTransfer*$exchangeRate - $loanAmount;
            mysqli_query($db_link, "UPDATE accounts
                                  SET balance=balance+".$afterPayingDownTheLoan."
                                  WHERE account_id=".$toAccount." ");
            mysqli_query($db_link, "UPDATE loans
                                  SET left_to_pay=0
                                  WHERE customer_id IN 
                                  (SELECT customer_id FROM accounts WHERE account_id=".$toAccount.") ");
        } else {
            mysqli_query($db_link, "UPDATE accounts
                                  SET balance=balance+".($amountToTransfer*0.9*$exchangeRate)."
                                  WHERE account_id=".$toAccount." ");
            mysqli_query($db_link, "UPDATE loans
                                  SET left_to_pay=left_to_pay-".($amountToTransfer*0.1*$exchangeRate)."
                                  WHERE customer_id IN 
                                  (SELECT customer_id FROM accounts WHERE account_id=".$toAccount.") ");
        }
    } else {
        mysqli_query($db_link, "UPDATE accounts
                                  SET balance=balance+".($amountToTransfer*$exchangeRate)."
                                  WHERE account_id=".$toAccount." ");
    }
    mysqli_commit($db_link);
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($db_link);
    throw $exception;
}

include 'dbDisconnect.php';

unset($_SESSION['transferData']);