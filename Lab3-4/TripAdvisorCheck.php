<?php
$countries = array("Poland" => 150, "Germany" => 250, "USA" => 300, "France" => 350, "Norway" => 400);
if (isset($_POST['country']) && isset($_POST['people']) && isset ($_POST['date-from']) && isset($_POST['date-to'])) {
    if (strtotime($_POST['date-from']) >= strtotime($_POST['date-to'])) {
        echo "Invalid date!";
    } else {
        $days = abs(strtotime($_POST['date-from']) - strtotime($_POST['date-to'])) / 60 / 60 / 24;
        $price = $days * $countries[$_POST['country']] * $_POST['people'];
        echo $price;
    }
}