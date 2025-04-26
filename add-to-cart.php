<?php
session_start(); // Start the session to access session variables
header('Content-Type: application/json'); // Set the content type to JSON for the response

// Get the raw POST data
$data = json_decode(file_get_contents('php://input'), true);

// Check if the product ID is passed
if (isset($data['product_id'])) {
    $product_id = $data['product_id'];

    // Ensure the cart array exists in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add the product to the cart (increase quantity if already in cart)
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }

    // Respond with success
    echo json_encode(['success' => true]);
} else {
    // Respond with error if product ID is missing
    echo json_encode(['success' => false]);
}
?>
