<?php
session_start();
include "shopeeFunctions.php";


if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}
if(isset($_SESSION['cart']) && isset($_POST['product']) && isset($_POST['price'])){
    addItemToCart($_POST['product'], $_POST['price']);
}

$products = [];
$f = fopen("./products.csv", "r");
while (($line = fgetcsv($f)) !== FALSE) {
    array_push($products, $line);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopee</title>
</head>
<body>
    <?php
    foreach($products as $product){
        echo "<form action='shopee.php' method='post'>
              <div>
                <p>".$product[0]." - Available: ".$product[1].", Price: ".$product[2]."PLN"."</p>
                <input type='hidden' name='product' value=".$product[0].">
                <input type='hidden' name='price' value=".$product[2].">
                <button type='submit'>Add to cart</button>
              </div><br/>
              </form>";
    }
    ?>
<a href="cart.php">Go to your cart</a>
</body>
</html>
