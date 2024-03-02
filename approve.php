<?php
session_start();

// Include your database connection file
@include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id']) && isset($_GET['action'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];

    // Fetch data from the admin review table based on ID
    $sql = "SELECT * FROM admin_review_table WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($action === 'approve') {
            // Move data to the final destination (combined_list table) or another appropriate table
            $sqlMove = "INSERT INTO combined_list (user_id, SpaceName, projectType, SpaceType, SpaceAddress1, SpaceAddress2, City, PinCode,
            SpaceArea, Description, images, Amenities,
            min_duration, min_duration_unit, max_duration, max_duration_unit,
            selected_year, selected_month, selected_dates,
            DailyPrice, WeeklyPrice, MonthlyPrice, Maintenance, SecurityDeposit)
            VALUES (
            '{$row['user_id']}',
            '{$row['SpaceName']}',
            '{$row['projectType']}',
            '{$row['SpaceType']}',
            '{$row['SpaceAddress1']}',
            '{$row['SpaceAddress2']}',
            '{$row['City']}',
            '{$row['PinCode']}',
            '{$row['SpaceArea']}',
            '{$row['Description']}',
            '{$row['images']}',
            '{$row['Amenities']}',
            '{$row['min_duration']}',
            '{$row['min_duration_unit']}',
            '{$row['max_duration']}',
            '{$row['max_duration_unit']}',
            '{$row['selected_year']}',
            '{$row['selected_month']}',
            '{$row['selected_dates']}',
            '{$row['DailyPrice']}',
            '{$row['WeeklyPrice']}',
            '{$row['MonthlyPrice']}',
            '{$row['Maintenance']}',
            '{$row['SecurityDeposit']}')";

            if ($conn->query($sqlMove) === TRUE) {
                // Remove the data from the admin review table after approval
                $sqlDelete = "DELETE FROM admin_review_table WHERE id = $id";
                $conn->query($sqlDelete);

                echo "Data approved and moved to combined_list table";
            } else {
                echo "Error: " . $sqlMove . "<br>" . $conn->error;
            }
        } elseif ($action === 'reject') {
            // Move data to the reject table if rejected
            $sqlMove = "INSERT INTO reject (user_id, SpaceName, projectType, SpaceType, SpaceAddress1, SpaceAddress2, City, PinCode,
            SpaceArea, Description, images, Amenities,
            min_duration, min_duration_unit, max_duration, max_duration_unit,
            selected_year, selected_month, selected_dates,
            DailyPrice, WeeklyPrice, MonthlyPrice, Maintenance, SecurityDeposit)
            VALUES (
            '{$row['user_id']}',
            '{$row['SpaceName']}',
            '{$row['projectType']}',
            '{$row['SpaceType']}',
            '{$row['SpaceAddress1']}',
            '{$row['SpaceAddress2']}',
            '{$row['City']}',
            '{$row['PinCode']}',
            '{$row['SpaceArea']}',
            '{$row['Description']}',
            '{$row['images']}',
            '{$row['Amenities']}',
            '{$row['min_duration']}',
            '{$row['min_duration_unit']}',
            '{$row['max_duration']}',
            '{$row['max_duration_unit']}',
            '{$row['selected_year']}',
            '{$row['selected_month']}',
            '{$row['selected_dates']}',
            '{$row['DailyPrice']}',
            '{$row['WeeklyPrice']}',
            '{$row['MonthlyPrice']}',
            '{$row['Maintenance']}',
            '{$row['SecurityDeposit']}')";

            if ($conn->query($sqlMove) === TRUE) {
                // Remove the data from the admin review table after rejection
                $sqlDelete = "DELETE FROM admin_review_table WHERE id = $id";
                $conn->query($sqlDelete);

                echo "Data rejected and moved to reject table";
            } else {
                echo "Error: " . $sqlMove . "<br>" . $conn->error;
            }
        } else {
            echo "Invalid action";
        }
    } else {
        echo "Record not found";
    }
} else {
    echo "Invalid request";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    Successfully approved the space. Click here to view...
    <a href="vs.php">View Space</a>
</body>

</html>
