<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// update_space.php

// Include your database connection file
@include 'connect.php';
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
  } else {
    $user_id = '';
  }
// Function to fetch space details by spaceId
function getSpaceDetails($conn, $spaceId)
{
    $result = $conn->query("SELECT * FROM combined_list WHERE id = '$spaceId'");
    return $result->fetch_assoc();
}

// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $spaceId = $_POST['spaceId'];
    $spaceName = $_POST['spaceName'];
    $projectType = $_POST['projectType'];
    $spaceType = $_POST['spaceType'];
    $spaceAddress1 = $_POST['spaceAddress1'];
    $spaceAddress2 = $_POST['spaceAddress2'];
    $city = $_POST['city'];
    $pinCode = $_POST['pinCode'];
    $selectedYear = $_POST['selected_year'];
    $selectedMonth = $_POST['selected_month'];
    $selectedDates =  $_POST['selected_dates'];
    $minDuration = $_POST['min_duration'];
    $minDurationUnit = $_POST['min_duration_unit'];
    $maxDuration = $_POST['max_duration'];
    $maxDurationUnit = $_POST['max_duration_unit'];

    $spaceArea = $_POST['spaceArea'];
    $description = $_POST['description'];
    $existingImages = $_POST['existingImage'];
    $newImages = $_FILES['newImage'];
    $amenities = $_POST['amenities'];

    $dailyPrice = $_POST['dailyPrice'];
    $weeklyPrice = $_POST['weeklyPrice'];
    $monthlyPrice = $_POST['monthlyPrice'];
    $maintenance = $_POST['maintenance'];

    // Construct the SET part of the SQL query for all fields
    $setClause = "
                  SpaceName = '$spaceName',
                  projectType = '$projectType',

                  SpaceType = '$spaceType',
                  SpaceAddress1 = '$spaceAddress1',
                  SpaceAddress2 = '$spaceAddress2',
                  City = '$city',
                  PinCode = '$pinCode',
                  selected_year  = '$selectedYear',
                  selected_month = '$selectedMonth',
                  selected_dates = '$selectedDates',
                  min_duration = '$minDuration',
                  min_duration_unit = '$minDurationUnit',
                  max_duration = ' $maxDuration',
                  max_duration_unit = '$maxDurationUnit',
                  SpaceArea = '$spaceArea',
                  Description = '$description',
                  Amenities = '$amenities',
                  
                  DailyPrice = '$dailyPrice',
                  WeeklyPrice = '$weeklyPrice',
                  MonthlyPrice = '$monthlyPrice',
                  Maintenance = '$maintenance'";

    // Handle updates for existing images
    // Handle updates for existing images
    foreach ($existingImages as $key => $existingImage) {
        // Check if a new image is uploaded for the current existing image
        if ($newImages['error'][$key] == 0 && !empty($newImages['tmp_name'][$key])) {
            // Handle the new image upload (you may want to add more validation)
            $uploadPath = 'uploaded_img/';
            $newImageName = basename($newImages['name'][$key]);
            $newImagePath = $uploadPath . $newImageName;

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($newImages['tmp_name'][$key], $newImagePath)) {
                // Update the database with the new image path for the selected existing image
                $setClause .= ", images = REPLACE(images, '$existingImage', '$newImagePath')";
            } else {
                echo "Failed to upload the new image.";
                exit(); // Add this to stop execution if the image upload fails
            }
        }
    }


    // Combine everything into a single query
    // Execute the update query
    $result = $conn->query("UPDATE combined_list SET $setClause WHERE id = '$spaceId'");

    if ($result === TRUE) {
        // Redirect to the updated space details page or any other appropriate page
        header("Location: user-profile.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
        // Add more details for debugging
        echo "<br>";
        echo "Query: " . "UPDATE combined_list SET $setClause WHERE id = '$spaceId'";
        exit();
    }
}

// Fetch existing space details
$spaceId = $_GET['spaceId']; // You may need to sanitize this input
$spaceDetails = getSpaceDetails($conn, $spaceId);
$existingImages = explode(',', $spaceDetails['images']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Space</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
    padding: 40px;
    padding-top: 20px;
}

label {
    margin-top: 10px;
}

input,
textarea {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    box-sizing: border-box;
}

select,
button {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    box-sizing: border-box;
}

.image-container {
    display: flex;
    align-items: center;
    margin-top: 20px;
}

.image-container img {
    margin-right: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

button {
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

/* Add more styling as needed */

    </style>
</head>

<body>
    <h2>Update Space</h2>
    <form action="update_space.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="spaceId" value="<?php echo $spaceId; ?>">

        <!-- Display existing images and update fields side by side -->
        <?php foreach ($existingImages as $image) : ?>
            <div class="image-container">
                <img src="<?php echo $image; ?>" alt="Existing Image" width="100">

                <label for="existingImage">Select Image to Update:</label>
                <select name="existingImage[]" style="display: none;" >
                    <option value="<?php echo $image; ?>"><?php echo $image; ?></option>
                </select>

                <!-- Input for new image -->
                <label for="newImage">Update Image:</label>
                <input type="file" name="newImage[]" accept="image/*">
            </div>
            <br>
        <?php endforeach; ?>

        <!-- Option to add new images dynamically based on the number of displayed images -->
       



        <!-- Add form fields for other space details -->



        <label for="spaceName">Space Name:</label>
        <input type="text" name="spaceName" value="<?php echo $spaceDetails['SpaceName']; ?>">

        <label for="spaceType">Space Type:</label>
        <input type="text" name="spaceType" value="<?php echo $spaceDetails['SpaceType']; ?>">
        <label for="projectType">project Type:</label>
        <input type="text" name="projectType" value="<?php echo $spaceDetails['projectType']; ?>">

        <label for="spaceAddress1">Space Address 1:</label>
        <input type="text" name="spaceAddress1" value="<?php echo $spaceDetails['SpaceAddress1']; ?>">

        <label for="spaceAddress2">Space Address 2:</label>
        <input type="text" name="spaceAddress2" value="<?php echo $spaceDetails['SpaceAddress2']; ?>">

        <label for="city">City:</label>
        <input type="text" name="city" value="<?php echo $spaceDetails['City']; ?>">

        <label for="pinCode">Pin Code:</label>
        <input type="text" name="pinCode" value="<?php echo $spaceDetails['PinCode']; ?>">

        <label for="year">Year:</label>
        <input type="text" name="selected_year" value="<?php echo $spaceDetails['selected_year']; ?>">

        <label for="month">Month:</label>
        <input type="text" name="selected_month" value="<?php echo $spaceDetails['selected_month']; ?>">

        <label for="calendar">Calendar:</label>
        <input type="text" name="selected_dates" value="<?php echo $spaceDetails['selected_dates']; ?>">


        <label for="min_duration">Minimum Duration:</label>
        <input type="text" name="min_duration" value="<?php echo $spaceDetails['min_duration']; ?>">

        <label for="min_duration_unit">Minimum Duration Unit:</label>
        <input type="text" name="min_duration_unit" value="<?php echo $spaceDetails['min_duration_unit']; ?>">

        <label for="max_duration">Maximum Duration:</label>
        <input type="text" name="max_duration" value="<?php echo $spaceDetails['max_duration']; ?>">

        <label for="max_duration_unit">Maximum Duration Unit:</label>
        <input type="text" name="max_duration_unit" value="<?php echo $spaceDetails['max_duration_unit']; ?>">



        <label for="spaceArea">Space Area:</label>
        <input type="text" name="spaceArea" value="<?php echo $spaceDetails['SpaceArea']; ?>">

        <label for="description">Description:</label>
        <textarea name="description"><?php echo $spaceDetails['Description']; ?></textarea>

        <label for="amenities">Amenities:</label>
        <input type="text" name="amenities" value="<?php echo $spaceDetails['Amenities']; ?>">



        <label for="dailyPrice">Daily Price:</label>
        <input type="text" name="dailyPrice" value="<?php echo $spaceDetails['DailyPrice']; ?>">

        <label for="weeklyPrice">Weekly Price:</label>
        <input type="text" name="weeklyPrice" value="<?php echo $spaceDetails['WeeklyPrice']; ?>">

        <label for="monthlyPrice">Monthly Price:</label>
        <input type="text" name="monthlyPrice" value="<?php echo $spaceDetails['MonthlyPrice']; ?>">

        <label for="maintenance">Maintenance:</label>
        <input type="text" name="maintenance" value="<?php echo $spaceDetails['Maintenance']; ?>">

        <!-- Add other fields here -->

        <!-- Add the "Update Space" button outside the loop -->
        <button type="submit">Update Space</button>
    </form>
</body>

</html>