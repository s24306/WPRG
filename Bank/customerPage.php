<?php
include 'Customer.php';
include 'Account.php';
session_start();
include 'header.php';
include 'dbConnect.php';

$_SESSION['loggedCustomerData'] = new Customer($_SESSION['customerData']["customer_id"],
    $_SESSION['customerData']["first_name"],
    $_SESSION['customerData']["last_name"],
    $_SESSION['customerData']["PESEL"]);

$sql = "SELECT * FROM accounts WHERE customer_id=".$_SESSION['loggedCustomerData']->getCustomerId()." ";
if (!$accounts = $db_link->query($sql)) {
    echo "Error: ".$sql."<br>".mysqli_error($db_link);
} else {
    while ($row = $accounts->fetch_assoc()) {
        $account = new Account($row["account_id"], $row["customer_id"], $row["balance"], $row["currency"]);
        $_SESSION['loggedCustomerData']->addAccount($account);
    }
}

?>
    <div class="cust_profile_container">
            <div class="acc_details">
                <span class="heading">Account Details</span><br>
                <label>Customer Id : <?php echo $_SESSION['loggedCustomerData']->getCustomerId(); ?></label></br>
                <label>Customer Name : <?php echo $_SESSION['loggedCustomerData']->getFirstName(); ?></label></br>
                <label>PESEL : <?php echo $_SESSION['loggedCustomerData']->getPESEL(); ?></label></br>
</div>
<div>
    <a href="transferFunds.php">Transfer funds</a>
</div>
<div>
    <a href="loan.php">Take a loan</a>
</div>
<div class="statement">
    <label class="heading">Bank Statement</label>
    <table>
        <th>#</th>
        <th>Date</th>
        <th>Trans. Id</th>
        <th>From</th>
        <th>To</th>
        <th>Amount</th>
        <?php
        $accounts = $_SESSION['loggedCustomerData']->getAccounts();
        $accountNumbers = [];
        foreach($accounts as $acc){
            array_push($accountNumbers, $acc->getAccountId());
        }
        $sql = "SELECT * from transactions 
                WHERE from_account_id IN (".join("','",$accountNumbers).") 
                OR to_account_id IN (".join("','",$accountNumbers).") 
                ORDER By transaction_id DESC LIMIT 10";
        $transactions = $db_link->query($sql);
        if ($transactions) {
            $transaction_num = 1;
            while($row = $transactions->fetch_assoc()) {


                echo '
			<tr>
            <td>'.$transaction_num++.'</td>
            <td>'.$row['date_issued'].'</td>
			<td>'.$row['transaction_id'].'</td>
			<td>'.$row['from_account_id'].'</td>
			<td>'.$row['to_account_id'].'</td>
			<td>'.number_format($row['amount'], 2).''.$row['currency'].'</td>
			</tr>';
            }


        }
        ?>
    </table>
</div>
</div>
<?php
echo "<a href='logout.php'>Logout</a>";

include 'footer.php';
?>