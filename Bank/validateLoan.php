<?php
include 'Customer.php';
include 'Account.php';
session_start();
include 'dbConnect.php';
$loanAmount = $_POST["loanAmount"];

$sql = "SELECT * FROM loans WHERE customer_id=".$_SESSION['loggedCustomerData']->getCustomerId()." ";
if ($_SESSION["loanExists"] = $db_link->query($sql)->fetch_assoc()) {
    header("Location: loan.php");
}
if ( !($loanAmount <= 3000) || !($loanAmount > 0)) {
    $_SESSION["invalidLoanAmount"] = true;
    header("Location: loan.php");
}

$db_link->autocommit(FALSE);

try {
    $db_link->query( "INSERT INTO loans
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
    $db_link->query( "UPDATE accounts
                                  SET balance=balance+".$loanAmount."
                                  WHERE account_id=".$_SESSION['accountId']." ");
    $db_link->commit();
} catch (mysqli_sql_exception $exception) {
    $db_link->rollback();
    echo "Error: ".$sql . "<br>" . mysqli_error($db_link);
    throw $exception;
}

header("Location: customerPage.php");
?>