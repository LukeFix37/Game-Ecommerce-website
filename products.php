<?php
session_start(); // Start the session to access session variables

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
    <title>Products - Gaming Gear Store</title>
    <link rel="stylesheet" href="css/styles.css">
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
        <section class="products">
            <div class="container">
                <h2>Our Products</h2>
                <p>Explore our wide range of gaming gear available for rent. Choose the best tools to enhance your gaming experience.</p>
                <div class="product-grid">
                    <!-- Example product -->
                    <div class="product">
                        <img src="images/XboxController.jpg" alt="Xbox Gaming Controller">
                        <h3>Xbox Gaming Controller</h3>
                        <p>$3/day</p>
                        <a href="product-details.php?id=1" class="btn">View Details</a>
                    </div>
                    <div class="product">
                        <img src="images/GamingHeadset.jpg" alt="HyperX Gaming Headset">
                        <h3>HyperX Gaming Headset</h3>
                        <p>$5/day</p>
                        <a href="product-details.php?id=2" class="btn">View Details</a>
                    </div>
                    <div class="product">
                        <img src="images/GamingChair.jpg" alt="Gaming Chair">
                        <h3>Ergonomic Gaming Chair</h3>
                        <p>$10/day</p>
                        <a href="product-details.php?id=3" class="btn">View Details</a>
                    </div>
                    <div class="product">
                        <img src="images/VRHeadset.jpg" alt="VR Headset">
                        <h3>Oculus VR Headset</h3>
                        <p>$15/day</p>
                        <a href="product-details.php?id=4" class="btn">View Details</a>
                    </div>
                    <!-- Add more products as needed -->
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Gaming Gear Store. All rights reserved.</p>
    </footer>
</body>
</html>
