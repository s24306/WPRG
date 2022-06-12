<?php
require "Account.php";
require "Customer.php";
session_start();
include 'header.php';
include 'functions.php';

redirectIfCustomerNotLogged();

if(isset($_SESSION["loanExists"])){
    echo "<p style='color: red'>".$_SESSION["loanExists"]."</p>";
    unset($_SESSION["loanExists"]);
}

?>
    <form method="post" action="validateLoan.php">
        <div>
            <select name="account" required>
                <option class="default" value="" disabled selected>Account</option>
                <?php
                foreach($_SESSION['loggedCustomerData']->getAccounts() as $acc){?>
                    <option value="<?php echo $acc->getAccountId(); ?>"><?php echo $acc->getAccountId().": ".
                            number_format($acc->getBalance(), 2).$acc->getCurrency(); ?></option>
                <?php }
                ?>
            </select></br>
        </div>
        <div>
            <label for="loanAmount">Enter the amount you wish to borrow, but no more than 3k, just because</label>
            <input id="loanAmount" type="number" name="loanAmount" required>
            </br>
        </div>
        <input type="submit" name="submit" value="Apply">
    </form>
    <a href='customerPage.php'>Go back</a>
<?php
include 'footer.php';
?>