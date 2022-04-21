<?php
session_start();
include 'shopeeFunctions.php';
if(isset($_GET['remove']) && (!empty($_GET['remove'] || $_GET['remove'] == 0))){
    removeItemFromCart($_GET['remove']);
}
if(isset($_GET['emptyCart']) && (!empty($_GET['emptyCart'] || $_GET['emptyCart'] == 0))){
    emptyCart();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your cart</title>
</head>
<body>
<?php
foreach($_SESSION['cart'] as $product){
        echo "<div>
                <p>Name: ".$product['name']." Amount: ".$product['amount']."</p>
                <input type='hidden' name='product' value=".$product.">
                <a href='?remove=".$product['name']."'>Remove from cart</a>
              </div><br/>";
}
?>
<a href='?emptyCart=all'>Clear cart</a><br>
<a href="shopee.php">Continue shopping</a>
</body>
</html>
