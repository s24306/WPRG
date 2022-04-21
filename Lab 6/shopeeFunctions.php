<?php
function removeItemFromCart($item){
    unset($_SESSION['cart'][$item]);
}

function addItemToCart($item, $price){
    if($_SESSION['cart'][$item]['amount'] > 0){
        $_SESSION['cart'][$item]['amount'] += 1;
    } else {
        $_SESSION['cart'][$item] = array('name' => $item, 'price' => $price, 'amount' => 1);
    }
}

function emptyCart(){
    unset($_SESSION['cart']);
}
?>