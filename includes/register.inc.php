<?php
if (isset($_POST['submit'])) {
    require_once 'db.inc.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (full_name, email, address, phone_number, password_hash)
                               VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $address, $number, $pwd]);

        header("Location: ../register.php?success=1");
        exit();
    } catch (PDOException $e) {
        die("SQL Error: " . $e->getMessage());
    }
} else {
    header("Location: ../register.php");
    exit();
}
?>
