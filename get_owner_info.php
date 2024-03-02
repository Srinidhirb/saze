<?php
// Include the database connection file
@include 'connect.php';

// Check if userId is provided in the GET data
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];

    // Use a prepared statement to retrieve owner information based on the userId
    $sqlOwner = "SELECT * FROM users WHERE id = ?";
    
    // Prepare the statement
    $stmtOwner = $conn->prepare($sqlOwner);
    
    // Bind the user ID parameter
    $stmtOwner->bind_param('s', $userId);
    
    // Execute the statement
    $stmtOwner->execute();
    
    // Get the result
    $resultOwner = $stmtOwner->get_result();

    // Output owner information
    if ($resultOwner->num_rows > 0) {
        $rowOwner = $resultOwner->fetch_assoc();
        $ownerName = $rowOwner['first_name'];
        $ownerEmail = $rowOwner['email'];
        $ownerNumber = $rowOwner['number'];

        echo "<h2>Owner Information</h2>";
        echo "<p><strong>Name:</strong> $ownerName</p>";
        echo "<p><strong>Email:</strong> $ownerEmail</p>";
        echo "<p><strong>Phone Number:</strong> $ownerNumber</p>";

    }
}

// Close the statements and database connection

$conn->close();
?>