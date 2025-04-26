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
    <title>About Us - Gaming Gear Store</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Gaming Gear Rental</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="about.php" class="active">About</a></li>
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
        <section class="about-us">
            <div class="container">
                <h2>About Us</h2>
                <p>Welcome to Gaming Gear Rental, your one-stop destination for renting the latest and greatest gaming equipment. Our mission is to make high-quality gaming gear accessible to everyone, whether you're a casual gamer or a professional enthusiast.</p>
                <p>We understand that gaming equipment can be expensive, and that's why we offer affordable rental options to help you enjoy the best gaming experience without breaking the bank.</p>
            </div>
        </section>

        <section class="our-team">
            <div class="container">
                <h2>Meet Our Team</h2>
                <div class="team-list">
                    <div class="team-member">
                        <img src="images/Headshot.JPG" alt="Team Member 1">
                        <h3>Luke Fixari</h3>
                        <p>Founder & Technical Lead</p>
                        <p>Luke is a passionate gamer and entrepreneur who started Gaming Gear 
                            Rental to help gamers access premium equipment at affordable prices.</p>
                    </div>
                    <!-- Add other team members here if needed -->
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Gaming Gear Store. All rights reserved.</p>
    </footer>
</body>
</html>
