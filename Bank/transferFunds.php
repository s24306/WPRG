<?php
require "Account.php";
require "Customer.php";
session_start();
include 'header.php';

?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Transfer funds</title>
    </head>
    <body>
    <p style="color: red"><?php
        if(isset($_SESSION['isTransferValid']) && !$_SESSION['isTransferValid']){
            echo $_SESSION['wrongAmountMessage'];
        }?></p>
    <form method="post" action="validateFundTransfer.php">
        <div>
            <select name="fromAccount" required>
                <option class="default" value="" disabled selected>From Account</option>
                <?php
                foreach($_SESSION['loggedCustomerData']->getAccounts() as $acc){?>
                    <option value="<?php echo $acc->getAccountId(); ?>"><?php echo $acc->getAccountId().": ".
                            number_format($acc->getBalance(), 2).$acc->getCurrency(); ?></option>
                <?php }
                ?>
            </select></br>
        </div>
        <div>
            <label for="toAccount">To Account</label>
            <input id="toAccount" type="number" name="toAccount" required>
            </br>
        </div>
        <div>
            <label for="amountToTransfer">Amount to transfer</label>
            <input id="amountToTransfer" type="number" name="amountToTransfer" value="0" required></br>
        </div>
        <input type="submit" name="submit" value="Submit">
    </form>
    </body>
    </html>

<?php
include 'footer.php'
?>