<?php
session_start();
include 'header.php';

if(!isset($_SESSION['loggedCustomerData'])){
    header("Location: customerPage.php");
}
?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create new account</title>
    </head>
    <body>
    <form method="post" action="createAndAssignNewAccount.php">
        <div>
            <select name ="currency" required >
                <option class="default" value="" disabled selected>Currency</option>
                <option value="PLN">PLN</option>
                <option value="EUR">EUR</option>
                <option value="GBP">GBP</option>
                <option value="USD">USD</option>
                <option value="JPY">JPY</option>
            </select>
        </div>
        <input type="submit" name="submit" value="Submit">
    </form>
    </body>
    <a href='customerPage.php'>Go back</a>
    </html>

<?php
include 'footer.php'
?>