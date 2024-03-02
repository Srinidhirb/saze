<?php
// Include your database connection file
@include 'connect.php';

// Start or resume the session
session_start();

// Process the registration form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $adminUsername = isset($_POST["admin_username"]) ? $_POST["admin_username"] : "";
    $adminPassword = isset($_POST["admin_password"]) ? $_POST["admin_password"] : "";

    // Validate form data (you can add more validation as needed)

    // Insert admin data into the admin_users table
    $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);

    $sql = "INSERT INTO admin (username, password) VALUES ('$adminUsername', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "Admin registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
</head>

<body>
    <h2>Admin Registration</h2>

    <form action="" method="post">
        <label for="admin_username">Username:</label>
        <input type="text" name="admin_username" required>

        <label for="admin_password">Password:</label>
        <input type="password" name="admin_password" required>

        <button type="submit">Register</button>
    </form>
</body>

</html>