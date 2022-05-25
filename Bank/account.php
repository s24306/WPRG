<?php
session_start();
include 'header.php';
include 'dbConnect.php';

$_SESSION['loggedCustomerId'] = $_SESSION['accountData']["customer_id"];
$_SESSION['Name'] = $_SESSION['accountData']["first_name"]." ".$_SESSION['accountData']["last_name"];
$_SESSION['PESEL'] = $_SESSION['accountData']["PESEL"];
$_SESSION['dob'] = $_SESSION['accountData']["date_of_birth"];

$sql = "SELECT * FROM accounts WHERE customer_id = ".$_SESSION['loggedCustomerId']." ";

if (!$_SESSION['accounts'] = mysqli_fetch_assoc(mysqli_query($db_link, $sql))) {
    echo "Error: ".$sql."<br>".mysqli_error($db_link);
} else {
    $_SESSION['accountId'] = $_SESSION['accounts']["account_id"];
    $_SESSION['balance'] = $_SESSION['accounts']["balance"];
    $_SESSION['accType'] = $_SESSION['accounts']["account_type"];
    $_SESSION['currency'] = $_SESSION['accounts']["currency"];
}
?>
    <div class="cust_profile_container">
            <div class="acc_details">
                <span class="heading">Account Details</span><br>
                <label>Customer Id : <?php echo $_SESSION['loggedCustomerId']; ?></label>
<!-- <label>Account Number : <?php echo $_SESSION['Account_No']; ?></label> -->
<label>Account Name : <?php echo $_SESSION['Name']; ?></label>
<label>PESEL : <?php echo $_SESSION['PESEL']; ?></label>
<!--<label>Available Balance : $<?php  ; ?></label>-->
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
        $sql = "SELECT * from transactions 
                WHERE from_account_id = ".$_SESSION['accountId']." 
                ORDER By transaction_id DESC LIMIT 10";
        $transactions = mysqli_query($db_link, $sql);
        if ($transactions) {
            $transaction_num = 1;
            // output data of each row
            while($row = mysqli_fetch_assoc($transactions)) {


                echo '
			<tr>
            <td>'.$transaction_num++.'</td>
            <td>'.$row['date_issued'].'</td>
			<td>'.$row['transaction_id'].'</td>
			<td>'.$row['from_account_id'].'</td>
			<td>'.$row['to_account_id'].'</td>
			<td>'.$row['amount'].'</td>
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