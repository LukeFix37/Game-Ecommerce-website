<?php
session_start(); // Start the session to access session variables

// Function to check if the user is logged in
function is_logged_in() {
    return isset($_SESSION['id']);
}

// Check if the cart exists
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    $cart_empty = true;
} else {
    $cart_empty = false;

    // Fetch product details from the database
    include 'includes/config.php'; // Include database connection
    $cart_items = [];
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $sql = "SELECT * FROM products WHERE product_id = $product_id";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $cart_items[] = mysqli_fetch_assoc($result);
        }
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - Gaming Gear Store</title>
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Gaming Gear Store</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="cart.php" class="active">Cart</a></li>
                    <?php if (is_logged_in()): ?>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Create Account</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="cart-container">
            <div class="container">
                <h2>Your Cart</h2>

                <?php if ($cart_empty): ?>
                    <p>Your cart is empty. Add some products to your cart!</p>
                <?php else: ?>
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($cart_items as $item):
                                $subtotal = $item['price'] * $_SESSION['cart'][$item['product_id']];
                                $total += $subtotal;
                            ?>
                                <tr>
                                    <td>
                                        <img src="images/<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="cart-item-img">
                                        <?php echo htmlspecialchars($item['name']); ?>
                                    </td>
                                    <td>$<?php echo number_format($item['price'], 2); ?></td>
                                    <td>
                                        <input type="number" class="cart-quantity" value="<?php echo $_SESSION['cart'][$item['product_id']]; ?>" data-product-id="<?php echo $item['product_id']; ?>" min="1">
                                    </td>
                                    <td>$<?php echo number_format($subtotal, 2); ?></td>
                                    <td>
                                      <a href="#" class="remove-item-btn" data-product-id="<?php echo $item['product_id']; ?>">Remove</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="cart-summary">
                        <p><strong>Total: $<?php echo number_format($total, 2); ?></strong></p>

                        <!-- Proceed to Checkout button -->
                        <?php if (is_logged_in()): ?>
                            <a href="checkout.php" class="btn checkout-btn">Proceed to Checkout</a>
                        <?php else: ?>
                            <p>You must <a href="login.php">log in</a> to proceed to checkout.</p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <script src="js/remove-from-cart.js"></script>

</body>
</html>
