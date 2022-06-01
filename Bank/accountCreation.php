<?php
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
    <title>Create new account</title>
</head>
<body>
    <a style="color: red"><?php
        if(isset($_SESSION['isDataValid']) && !$_SESSION['isDataValid']){
            echo $_SESSION['wrongValidationMessage'];
        }
        ?></a>
    <form method="post" action="validateAccountCreationData.php">
        <div>
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name" placeholder="Paweł" required><br>
        </div>
        <div>
            <label for="surname">Surname</label><br>
            <input type="text" id="surname" name="surname" placeholder="Pisarski" required><br>
        </div>
        <div>
            <label for="pesel">PESEL</label><br>
            <input type="text" id="pesel" name="pesel" placeholder="69694201234"><br>
        </div>
        <div>
            <input type="text" name="dob" placeholder="Date of Birth" onfocus="(this.type='date')" required />
        </div>
        <div>
            <select name ="accountType" required >
                <option class="default" value="" disabled selected>Account Type</option>
                <option value="Current">Current</option>
            </select>
        </div>
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
</html>

<?php
include 'footer.php'
?>
