<?php
session_start(); // Start the session to access session variables

if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);

    // Remove the item from the cart session
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }

    // Optionally, redirect or return a success message
    echo "Item removed successfully.";
}
?>
