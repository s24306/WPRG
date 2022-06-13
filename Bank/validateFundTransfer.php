<?php
require "Account.php";
require "Customer.php";
session_start();
include 'dbConnect.php';

if(!isset($_POST['fromAccount'])){
    header("Location: customerPage.php");
}

$fromAccount = $_POST['fromAccount'];
$toAccount = $_POST['toAccount'];
$amountToTransfer = $_POST['amountToTransfer'];

$_SESSION['isTransferValid'] = true;
$_SESSION['wrongAmountMessage'] = "";

if(!array_key_exists($fromAccount, $_SESSION['loggedCustomerData']->getAccounts())){
    $_SESSION['wrongAmountMessage'] .= "Nie kombinuj<br>";
    $_SESSION['isTransferValid'] = false;
}

$sql = "SELECT EXISTS(SELECT account_id FROM accounts WHERE account_id=".$toAccount.") ";
$result = $db_link->query($sql);
if(!$result->fetch_assoc(1)){
    $_SESSION['wrongAmountMessage'] .= "Customer does not exists<br>";
    $_SESSION['isTransferValid'] = false;
}
if(!ctype_digit($amountToTransfer)){
    $_SESSION['wrongAmountMessage'] .= "Sadly we can transfer only numbers, and only more than 0 :(<br>";
    $_SESSION['isTransferValid'] = false;
}
if($amountToTransfer > $_SESSION['loggedCustomerData']->getAccounts()[$fromAccount]->getBalance()){
    $_SESSION['wrongAmountMessage'] .= "Not enough funds<br>";
    $_SESSION['isTransferValid'] = false;
}

if($_SESSION['isTransferValid'] == false){
    header("Location: transferFunds.php");
} else {
    $_SESSION['transferData'] = [$fromAccount, $toAccount, $amountToTransfer];
    include 'makeTransfer.php';
    if(isset($_POST['confirmation'])){
        include "functions.php";
        generateConfirmationOfPayment($amountToTransfer, $fromCurrency, $fromAccount, $toAccount);
    }
    header("Location: customerPage.php");
}
?>