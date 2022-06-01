<?php
session_start();
include 'dbConnect.php';

$fromAccount = $_SESSION['transferData'][0];
$toAccount = $_SESSION['transferData'][1];
$amountToTransfer = $_SESSION['transferData'][2];
$date = date('Y-m-d');

mysqli_begin_transaction($db_link);

try {
    mysqli_query($db_link, "INSERT INTO transactions
                                  (from_account_id,
                                  to_account_id,
                                  date_issued,
                                  amount)
                                  VALUES
                                  (".$fromAccount.",
                                   ".$toAccount.",
                                   CURDATE(),
                                   ".$amountToTransfer.") ");
    mysqli_query($db_link, "UPDATE accounts
                                  SET balance=balance-".$amountToTransfer."
                                  WHERE account_id=".$fromAccount." ");
    mysqli_query($db_link, "UPDATE accounts
                                  SET balance=balance+".$amountToTransfer."
                                  WHERE account_id=".$toAccount." ");
    mysqli_commit($db_link);
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($db_link);
    throw $exception;
}

include 'dbDisconnect.php';

unset($_SESSION['transferData']);