<?php
session_start();
if(!isset($_SESSION['loggedUserId'])){
    header("Location: Login.php");
}
$db = new SQLite3('LocalDB.db');

$results = $db->query("SELECT id, make, model
                             FROM cars 
                             WHERE user_id=".$_SESSION['loggedUserId']."");

$cars = array();
while ($res = $results->fetchArray(1)){
    array_push($cars, $res);
}

echo "<h1>My cars</h1>";
?>

<!doctype html>
<html lang="en">
<head>
    <style>
        .center {
            margin-left: auto;
            margin-right: auto;
            width:100px;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            width: 300px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My account</title>
</head>
<body>
<table class="center">
    <?php
    foreach ($cars as $car){?>
        <tr>
            <td><?php echo $car["id"];?></td>
            <td><?php echo $car["make"];?></td>
            <td><?php echo $car["model"];?></td>
            <td><?php echo "<a href='editCarInfo.php?carid=".$car["id"]."'>Edit car info</a>"?></td>
        </tr>
        <?php
    }?>
</table>
</br>
<?php echo "<a href='AddNewCarForm.php'>Add new car</a></br>" ?>
<?php echo "<a href='Logout.php'>Logout</a>" ?>
</body>
</html>
