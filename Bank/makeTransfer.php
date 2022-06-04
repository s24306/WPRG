<?php
session_start();
include 'dbConnect.php';

$fromAccount = $_SESSION['transferData'][0];
$toAccount = $_SESSION['transferData'][1];
$amountToTransfer = $_SESSION['transferData'][2];
$exchangeRate = 1;
$recipientHasLoan = false;

$sql = "SELECT left_to_pay, paid_down FROM loans WHERE customer_id IN (SELECT customer_id FROM accounts WHERE account_id=".$toAccount.")";
if ($loanInfo = $db_link->query($sql)->fetch_assoc()) {
    $loanAmount = $loanInfo["left_to_pay"];
    $recipientHasLoan = $loanInfo["paid_down"];
}

$sql = "SELECT currency FROM accounts WHERE account_id=".$fromAccount." ";
$fromCurrency = $db_link->query($sql)->fetch_assoc()["currency"];
$sql = "SELECT currency FROM accounts WHERE account_id=".$toAccount." ";
$toCurrency = $db_link->query($sql)->fetch_assoc()["currency"];
if(strcmp($fromCurrency, $toCurrency)){
    $sql = "SELECT rate 
            FROM currency_exchange 
            WHERE from_currency='".$fromCurrency."' 
            AND to_currency='".$toCurrency."' ";
    $exchangeRate = $db_link->query($sql)->fetch_assoc()["rate"];
}

$db_link->autocommit(FALSE);

try {
    $db_link->query("INSERT INTO transactions
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
    $db_link->query( "UPDATE accounts
                                  SET balance=balance-".$amountToTransfer."
                                  WHERE account_id=".$fromAccount." ");
    if($recipientHasLoan){
        if($loanAmount < $amountToTransfer*0.1*$exchangeRate){
            $afterPayingDownTheLoan = $amountToTransfer*$exchangeRate - $loanAmount;
            $db_link->query( "UPDATE accounts
                                  SET balance=balance+".$afterPayingDownTheLoan."
                                  WHERE account_id=".$toAccount." ");
            $db_link->query( "UPDATE loans
                                  SET left_to_pay=0
                                  WHERE customer_id IN 
                                  (SELECT customer_id FROM accounts WHERE account_id=".$toAccount.") ");
        } else {
            $db_link->query( "UPDATE accounts
                                  SET balance=balance+".($amountToTransfer*0.9*$exchangeRate)."
                                  WHERE account_id=".$toAccount." ");
            $db_link->query( "UPDATE loans
                                  SET left_to_pay=left_to_pay-".($amountToTransfer*0.1*$exchangeRate)."
                                  WHERE customer_id IN 
                                  (SELECT customer_id FROM accounts WHERE account_id=".$toAccount.") ");
        }
    } else {
        $db_link->query( "UPDATE accounts
                                  SET balance=balance+".($amountToTransfer*$exchangeRate)."
                                  WHERE account_id=".$toAccount." ");
    }
    $db_link->commit();
} catch (mysqli_sql_exception $exception) {
    $db_link->rollback();
    throw $exception;
}
$db_link->autocommit(TRUE);

include 'dbDisconnect.php';

unset($_SESSION['transferData']);