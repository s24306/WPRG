<?php
$countries = array("Poland" => 150, "Germany" => 250, "USA" => 300, "France" => 350, "Norway" => 400);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        div {
            margin: 10px;
        }
    </style>
</head>
<body style="font-size: 24px">
<form action="TripAdvisorCheck.php" method="post">
    <div>
        <label for="date-from">Date from: </label>
        <input type="date" name="date-from">
        <label for="date-to">Date to: </label>
        <input type="date" name="date-to">
    </div>
    <div>
        <label for="people">How many people? </label>
        <input type="number" name="people">
    </div>
    <div>
        <label for="country">Choose Your destination:</label>
        <select name="country">
            <?php
            foreach ($countries as $country => $price) {
                echo "<option name='" . $country . "'>" . $country . "</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <input type="submit" name="submit" value="submit">
    </div>
</form>

</body>
</html>