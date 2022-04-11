<?php
include 'functions.php';
$message = "";
if(isset($_POST['submit'])){
    $maindish = $_POST['dish'];
    $amount = $_POST['amount'];
    $dodatki = $_POST['dodatki'];
    $message = "Twoje zamówienie na kwotę ".oblicz($maindish, $amount, $dodatki). "PLN zostało złożone.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jaka parówa wariacie</title>
</head>
<body>
<?php echo $message; ?>
<form action="index.php" method="post">
    <div>
        <h1>Zamów żarło</h1>
    </div>
    <div>
        <label for="dish">Wybierz żarło:</label>
        <select name="dish">
            <?php
            include 'data.php';
            foreach ($dishes as $dish => $price) {
                echo "<option name='" . $dish . "'>" . $dish . "[" . $price . "PLN]"."</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <label for="amount">Ilość</label>
        <input type="number" name="amount">
    </div>

    <div>
        <p>Jakie dodatki wariacie?</p>
        <?php
        include 'data.php';
        foreach ($sides as $side => $price) {
            echo "<input type='checkbox' id='". $side . "' name='dodatki[]' value='".$price."' checked>
            <label for='". $side . "'>$side  $price PLN</label></br>";
        }
        ?>
    </div>

    <div>
        <label for="uwagi">Uwagi dodatkowe:</label><br>
        <input type="text" name="uwagi" id="uwagi"><br>
    </div>

    <div>
        <input type="submit" name="submit" value="Zamów">
    </div>
</form>

</body>
</html>
