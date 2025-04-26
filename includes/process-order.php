<?php
session_start();
include 'config.php';

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Check if cart is empty
if (empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty. <a href='products.php'>Go to Products</a></p>";
    exit();
}

$user_id = $_SESSION['id']; // Get logged-in user ID
$order_date = date('Y-m-d H:i:s');

// Process each cart item
foreach ($_SESSION['cart'] as $product_id => $quantity) {
    // Fetch product details
    $sql = "SELECT * FROM products WHERE product_id = $product_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        $price = $product['price'] * $quantity;

        // Insert order record
        $order_sql = "INSERT INTO orders (user_id, product_id, quantity, price, order_date)
                      VALUES ('$user_id', '$product_id', '$quantity', '$price', '$order_date')";

        if (!mysqli_query($conn, $order_sql)) {
            echo "Error placing order for product ID $product_id: " . mysqli_error($conn);
            exit();
        }
    }
}

// Clear the cart
unset($_SESSION['cart']);

// Close DB connection
mysqli_close($conn);

// Redirect to order confirmation
header("Location: ../order-confirmation.php");
exit();
?>
