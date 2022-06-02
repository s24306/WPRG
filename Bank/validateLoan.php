<?php
session_start();
include 'dbConnect.php';
$loanAmount = $_POST["loanAmount"];

$sql = "SELECT * FROM loans WHERE customer_id=".$_SESSION['loggedCustomerId']." ";
if ($_SESSION["loanExists"] = mysqli_fetch_assoc(mysqli_query($db_link, $sql))) {
    header("Location: loan.php");
}
if ( !($loanAmount <= 3000) || !($loanAmount > 0)) {
    $_SESSION["invalidLoanAmount"] = true;
    header("Location: loan.php");
}

mysqli_begin_transaction($db_link);

try {
    mysqli_query($db_link, "INSERT INTO loans
                                  (customer_id,
                                  loan_amount,
                                  left_to_pay,
                                  currency,
                                  date_issued)
                                  VALUES
                                  (".$_SESSION['loggedCustomerId'].",
                                   ".$loanAmount.",
                                   ".$loanAmount.",
                                   '".$_SESSION['currency']."',
                                   CURDATE()) ");
    mysqli_query($db_link, "UPDATE accounts
                                  SET balance=balance+".$loanAmount."
                                  WHERE account_id=".$_SESSION['accountId']." ");
    mysqli_commit($db_link);
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($db_link);
    echo "Error: ".$sql . "<br>" . mysqli_error($db_link);
    throw $exception;
}

header("Location: account.php");
?>