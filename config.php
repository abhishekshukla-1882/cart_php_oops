<?php
session_start();

use App\Cart;
use App\Product;

require_once("vendor/autoload.php");





$action = $_POST['action'];
if ($action == "add") {

    $id = intval($_POST['id']);
    $price = intval($_POST['price']);



    $product = new Product($id, $price);


    if (!isset($_SESSION['cart'])) {

        $_SESSION['cart'] = array();
        $cart = new Cart();
        $cart->addcart($product);
        $cartarr = $cart->getCart();
        $_SESSION['cart'] = json_encode($cartarr);
    } else {
        $cart = new Cart();
        $carrt = $_SESSION['cart'];
        $cart->setCart($carrt);
        $cart->addcart($product);
        $cartarr = $cart->getCart();
        $_SESSION['cart'] = json_encode($cartarr);
    }
    // echo json_decode($_SESSION['cart']);
    echo $_SESSION['cart'];
}

/**
 * if user click the delete the this block is run
 */
if ($action == 'delete') {

    $id = intval($_POST['id']);

    $cart = new Cart();
    $carrt = $_SESSION['cart'];
    $cart->setCart($carrt);

    $cart->deleteFromCart($id);
    $cartarr = $cart->getCart();
    $_SESSION['cart'] = json_encode($cartarr);

    echo $_SESSION['cart'];
}


/**this block run the first time */
if ($action == 'start') {

    echo $_SESSION['cart'];
}
?>