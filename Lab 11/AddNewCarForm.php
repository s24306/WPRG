<?php
session_start();
if(!isset($_SESSION['loggedUserId'])){
    header("Location: Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add new car</title>
</head>
<body>
<form action="insertCarToDB.php" method="post">
    <p>New posting details</p>
    <div>
        <h3>Make</h3>
        <label for="make">Make</label><br>
        <input name="make" id="make">
    </div>

    <div>
        <h3>Model</h3>
        <label for="model">Model</label><br>
        <input name="model" id="model">
    </div>

    <div>
        <h3>Price</h3>
        <label for="price">Price</label><br>
        <input name="price" id="price">
    </div>

    <div>
        <h3>Year</h3>
        <label for="year">Year</label><br>
        <input name="year" id="year">
    </div>

    <div>
        <h3>Description</h3>
        <label for="description">Description</label><br>
        <input name="description" id="description">
    </div><br>

    <div>
        <button type="submit">Add new car</button>
    </div>
</form>
</body>
</html>