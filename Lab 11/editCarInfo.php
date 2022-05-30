<?php
session_start();

$_SESSION['carId'] = $_GET['carid'];
$db = new SQLite3('LocalDB.db');
$results = $db->query("SELECT user_id
                             FROM cars 
                             WHERE id=".$_SESSION['carId']);

$row = $results->fetchArray();

if(!isset($_SESSION['loggedUserId']) || $_SESSION['loggedUserId'] != $row["user_id"]){
    header("Location: Login.php");
}

$results = $db->query("SELECT make, model, price, year, description
                             FROM cars 
                             WHERE id=".$_SESSION['carId']);

$row = $results->fetchArray();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit car information</title>
</head>
<body>
<form action="validateCarEditInfo.php" method="post">
    <p>Co chcesz zmienić wariacie?</p>
    <div>
        <h3>Make</h3>
        <label for="make">Make</label><br>
        <input name="make" id="make" value='<?php
        echo $row['make'];
        ?>'>
    </div>

    <div>
        <h3>Model</h3>
        <label for="model">Model</label><br>
        <input name="model" id="model" value='<?php
        echo $row['model'];
        ?>'>
    </div>

    <div>
        <h3>Price</h3>
        <label for="price">Price</label><br>
        <input name="price" id="price" value='<?php
        echo $row['price'];
        ?>'>
    </div>

    <div>
        <h3>Year</h3>
        <label for="year">Year</label><br>
        <input name="year" id="year" value='<?php
        echo $row['year'];
        ?>'>
    </div>

    <div>
        <h3>Description</h3>
        <label for="description">Description</label><br>
        <input name="description" id="description" value='<?php
        echo $row['description'];
        ?>'>
    </div><br>

    <div>
        <button type="submit">Update car info</button>
    </div>
</form>
</body>
</html>