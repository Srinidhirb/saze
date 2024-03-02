<?php
session_start();

// Add your authentication logic here
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    // Redirect to the admin login page if not logged in
    header("Location: admin_login.php");
    exit();
}

// Include your database connection file
@include 'connect.php';

// Set the number of entries to display per page
$entriesPerPage = 10;

// Get the current page number from the query string, default to 1 if not set
$pageNumber = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the starting entry index for the current page
$startIndex = ($pageNumber - 1) * $entriesPerPage;

// Check if $conn is not null before using it
if ($conn) {
    // Fetch data from the admin review table with pagination
    $sql = "SELECT * FROM admin_review_table LIMIT $startIndex, $entriesPerPage";
    $result = $conn->query($sql);

    if (!$result) {
        // Handle query execution error
        echo "Error executing query: " . $conn->error;
        exit();
    }
} else {
    // Handle the case where $conn is null (database connection issue)
    echo "Error: Database connection issue.";
    exit();
}

// Display the data in a table with options for approval, rejection, or editing
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="website icon " href="Logo Icon 16_16.svg">
    <title>Admin Review</title>
    <!-- Include your stylesheets and scripts here -->
    <!-- Add any additional styling or scripts as needed -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .pagination {
            display: inline-block;
            margin-top: 20px;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>
</head>

<body>

    <h2>Admin Review</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Space Name</th>
                <th>Full Name</th>
                <th>User Number</th>
                <th>User Email</th>
                <th>Space Type</th>
                <th>Space Address 1</th>
                <th>Space Address 2</th>
                <th>City</th>
                <th>Pin Code</th>
                <th>Space Area</th>
                <th>Description</th>
                <th>Images</th>
                <th>Minimum Duration</th>
                <th>Minimum Duration Unit</th>
                <th>Maximum Duration</th>
                <th>Maximum Duration Unit</th>
                <th>Selected Dates</th>
                <th>Daily Price</th>
                <th>Weekly Price</th>
                <th>Monthly Price</th>
                <th>Maintenance</th>
                <th>Security Deposit</th>
                <th>Amenities</th>
                <th>View Details</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Example: Loop through each row in the result set
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['SpaceName']}</td>";

                // Fetch user information
                $userId = $row['user_id'];
                $userQuery = "SELECT first_name, last_name, number, email FROM users WHERE id = ?";
                $stmt = $conn->prepare($userQuery);

                if ($stmt) {
                    $stmt->bind_param("s", $userId); // Assuming id is a VARCHAR
                    $stmt->execute();
                    $userResult = $stmt->get_result();

                    if ($userResult) {
                        $userRow = $userResult->fetch_assoc();

                        // Check if $userRow is not null before accessing its elements
                        if ($userRow !== null) {
                            $fullName = $userRow['first_name'] . ' ' . $userRow['last_name'];
                            echo "<td>{$fullName}</td>";
                            echo "<td>{$userRow['number']}</td>";
                            echo "<td>{$userRow['email']}</td>";
                        } else {
                            echo "<td>User not found</td>";
                            echo "<td>User not found</td>";
                            echo "<td>User not found</td>";
                        }
                    } else {
                        echo "<td>Error executing user query</td>";
                        echo "<td>Error executing user query</td>";
                        echo "<td>Error executing user query</td>";
                    }

                    $stmt->close();
                } else {
                    echo "<td>Error preparing user query</td>";
                    echo "<td>Error preparing user query</td>";
                }

                echo "<td>{$row['SpaceType']}</td>";
                echo "<td>{$row['SpaceAddress1']}</td>";
                echo "<td>{$row['SpaceAddress2']}</td>";
                echo "<td>{$row['City']}</td>";
                echo "<td>{$row['PinCode']}</td>";

                echo "<td>{$row['SpaceArea']}</td>";
                echo "<td>{$row['Description']}</td>";
                echo "<td>";

                // Display images without slider
                $imagePaths = explode(',', $row['images']);
                foreach ($imagePaths as $imagePath) {
                    $imageSrc = "http://spacekraft.in/{$imagePath}";
                    echo "<img src='{$imageSrc}' alt='Space Image' style='max-width: 100px; max-height: 100px;'>";
                    echo "<br>";
                    echo "Image Source: {$imageSrc}";
                    echo "<br>";
                }

                echo "</td>";
                echo "<td>{$row['min_duration']}</td>";
                echo "<td>{$row['min_duration_unit']}</td>";
                echo "<td>{$row['max_duration']}</td>";
                echo "<td>{$row['max_duration_unit']}</td>";
                echo "<td>{$row['selected_dates']}</td>";
                echo "<td>{$row['DailyPrice']}</td>";
                echo "<td>{$row['WeeklyPrice']}</td>";
                echo "<td>{$row['MonthlyPrice']}</td>";
                echo "<td>{$row['Maintenance']}</td>";
                echo "<td>{$row['SecurityDeposit']}</td>";
                echo "<td>{$row['Amenities']}</td>";
                echo "<td>
                        <a href='approve.php?id={$row['id']}&action=approve'>Approve</a>
                        <a href='approve.php?id={$row['id']}&action=reject'>Reject</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination">
        <?php
        // Calculate the total number of pages
        $sqlTotal = "SELECT COUNT(*) AS total FROM admin_review_table";
        $resultTotal = $conn->query($sqlTotal);
        $rowTotal = $resultTotal->fetch_assoc();
        $totalPages = ceil($rowTotal['total'] / $entriesPerPage);

        // Generate pagination links
        for ($i = 1; $i <= $totalPages; $i++) {
            $activeClass = ($i == $pageNumber) ? 'active' : '';
            echo "<a href='admin.php?page={$i}' class='{$activeClass}'>{$i}</a>";
        }
        ?>
    </div>

</body>

</html>