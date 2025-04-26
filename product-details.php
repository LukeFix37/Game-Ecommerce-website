<?php
session_start(); // Start the session to access session variables
include 'includes/config.php'; // Include your database connection

// Get the product ID from the URL parameter
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch product details from the database
$sql = "SELECT * FROM products WHERE product_id = $product_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result);
} else {
    echo "Product not found!";
    exit;
}

mysqli_close($conn);

// Function to check if the user is logged in
function is_logged_in() {
    return isset($_SESSION['id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Gaming Gear Store</title>
    <link rel="stylesheet" href="css/details.css">
    <script src="js/add-to-cart.js" defer></script> <!-- Link to the JavaScript file -->
</head>
<body>
    <header>
        <div class="container">
            <h1>Gaming Gear Store</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products.php" class="active">Products</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="cart.php">Cart</a></li>
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
        <section class="product-details">
            <div class="container">
                <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                <img src="images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" />
                <p><strong>Price:</strong> $<?php echo htmlspecialchars($product['price']); ?></p>
                <p><strong>Description:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
                <button class="btn add-to-cart-btn" data-product-id="<?php echo $product['product_id']; ?>">Add to Cart</button>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Gaming Gear Store. All rights reserved.</p>
    </footer>
</body>
</html>
