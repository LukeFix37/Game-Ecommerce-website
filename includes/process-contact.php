<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // sanitize and get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // insert query
    $sql = "INSERT INTO feedback (name, email, subject, message, date_sent)
            VALUES ('$name', '$email', '$subject', '$message', NOW())";

    if (mysqli_query($conn, $sql)) {
        // redirect or show a success message
        header("Location: ../contact.php?success=1");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
