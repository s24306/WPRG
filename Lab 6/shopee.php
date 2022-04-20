<?php
session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
if(isset($_SESSION['cart'])){
    array_push($_SESSION['cart'], $_POST['product']);
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
                <button type='submit' value=".$product[0].">Add to cart</button>
              </div><br/>
              </form>";
    }
    ?>
</body>
</html>
