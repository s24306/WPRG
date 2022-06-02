<?php
session_start();
include 'header.php';
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