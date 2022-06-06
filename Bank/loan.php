<?php
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
            <label for="loanAmount">Enter the amount you wish to borrow, but no more than 3k, just because</label>
            <input id="loanAmount" type="number" name="loanAmount" required>
            </br>
        </div>
        <input type="submit" name="submit" value="Apply">
    </form>
<?php
include 'footer.php';
?>