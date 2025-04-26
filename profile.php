<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile - Gaming Gear Store</title>
    <link rel="stylesheet" href="css/profile.css">
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
                    <li><a href="profile.php" class="active">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="profile-section">
            <div class="container">
                <h2>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h2>
                <p>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Gaming Gear Store. All rights reserved.</p>
    </footer>
</body>
</html>
