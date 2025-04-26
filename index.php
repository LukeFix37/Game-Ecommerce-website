<?php
session_start(); // Start the session

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
    <title>Gaming Gear Store</title>
    <link rel="stylesheet" href="css/styles.css">
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
        <style>
            body {
                background: url('images/Background.jpg') no-repeat center center fixed;
                background-size: cover;
            }
        </style>
        <section class="hero">
            <h2>Buy the Best Gaming Gear</h2>
            <p>Find the latest gaming tools and accessories for rent at affordable prices.</p>
            <a href="products.php" class="btn">Browse Products</a>
        </section>

        <section class="featured-products">
            <h2>Featured Products</h2>
            <div class="product-list">
                <!-- Example product -->
                <div class="product">
                    <img src="images/XboxController.jpg" alt="Gaming Controller">
                    <h3>Xbox Gaming Controller</h3>
                    <p>$3</p>
                    <a href="product-details.php?id=1" class="btn">View Details</a>
                </div>
                <div class="product">
                    <img src="images/GamingHeadset.jpg" alt="Gaming Headset">
                    <h3>HyperX Gaming Headset</h3>
                    <p>$5</p>
                    <a href="product-details.php?id=2" class="btn">View Details</a>
                </div>
                <!-- Add more products as needed -->
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Gaming Gear Store. All rights reserved.</p>
    </footer>
</body>
</html>
