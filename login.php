<?php
session_start(); // Start the session

include './includes/config.php'; // Include the database configuration

if (isset($_POST['login'])) {
    if (empty($_POST['email']) || empty($_POST['pwd'])) {
        echo "<h4 id='error_login'>Please enter both email and password.</h4>";
    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['pwd']);

        // Query the database for the user
        $sql = "SELECT * FROM users WHERE email='{$email}'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password_hash'])) {
                // Set session variables
                $_SESSION['id'] = $row['user_id'];
                $_SESSION['name'] = $row['full_name'];
                $_SESSION['email'] = $row['email'];

                // Debugging: Check session data
                echo '<pre>';
                print_r($_SESSION);
                echo '</pre>';

                // Redirect to profile page after successful login
                header("Location: ./profile.php");
                exit;
            } else {
                echo "<h4 style='position:absolute;left:45%;z-index:4;top:70%;'>Incorrect password</h4>";
            }
        } else {
            echo "<h4 style='position:absolute;left:42%;z-index:4;top:70%;'>User not found. Please sign up first.</h4>";
        }
    }
}
?>

<head>
    <link rel="stylesheet" href="./css/login.css">
    <script src="https://use.fontawesome.com/be1ba39dfe.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <div class="login">
                <div class="login-header">
                    <h3>LOGIN</h3>
                    <p>Please enter your credentials to login.</p>
                </div>
            </div>
            <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="email" name='email' placeholder="Email" required/>
                <input type="password" name='pwd' placeholder="Password" required/>
                <button type='submit' name='login'>Login</button>
            </form>
            <p class="message">Not registered? <a href="./register.php">Create an account</a></p>
            <a href="./index.php" class="home-button">Home</a>
        </div>
    </div>

    <style>
        .home-button {
            display: inline-block;
            margin-top: 20px;
            background-color: #e50914;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .home-button:hover {
            background-color: #b20710;
        }
    </style>
</body>
