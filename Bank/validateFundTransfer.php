<?php
session_start();

$fromAccount = $_POST['fromAccount'];
$toAccount = $_POST['toAccount'];
$amountToTransfer = $_POST['amountToTransfer'];

$_SESSION['isTransferValid'] = true;
$_SESSION['wrongAmountMessage'] = "";

if($fromAccount != $_SESSION['accountId']){
    $_SESSION['wrongAmountMessage'] .= "Nie kombinuj<br>";
    $_SESSION['isTransferValid'] = false;
}
if(!ctype_digit($toAccount)){
    $_SESSION['wrongAmountMessage'] .= "Customer does not exists<br>";
    $_SESSION['isTransferValid'] = false;
}
if(!ctype_digit($amountToTransfer)){
    $_SESSION['wrongAmountMessage'] .= "Sadly we can transfer only numbers :(<br>";
    $_SESSION['isTransferValid'] = false;
}

if($_SESSION['isTransferValid'] == false){
    header("Location: transferFunds.php");
} else {
    $_SESSION['transferData'] = [$fromAccount, $toAccount, $amountToTransfer];
    include 'makeTransfer.php';
    header("Location: customerPage.php");
}