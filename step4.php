<?php
// Include your database connection file
@include 'connect.php';

// Start or resume the session
session_start();

// Flag to check if the form has been submitted
$formSubmitted = false;
include 'connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
    header('location:login.php');
}



// Process the form data for step 3
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Process List2 Form data
    // $spaceMinDuration = isset($_POST["space_min_duration"]) ? $_POST["space_min_duration"] : "";
    // $spaceMaxDuration = isset($_POST["space_max_duration"]) ? $_POST["space_max_duration"] : "";
    $spaceDailyPrice = isset($_POST["space_Daily_price"]) ? $_POST["space_Daily_price"] : "";
    $spaceWeeklyPrice = isset($_POST["space_Weekly_price"]) ? $_POST["space_Weekly_price"] : "";
    $spaceMonthlyPrice = isset($_POST["space_Monthly_price"]) ? $_POST["space_Monthly_price"] : "";
    $spaceMain = isset($_POST["space_main"]) ? $_POST["space_main"] : "";
    $spaceDeposit = isset($_POST["space_Sercurity"]) ? $_POST["space_Sercurity"] : "";
    $minDuration = $_POST['space_min_duration'];
    $minDurationUnit = $_POST['min_duration_unit'];

    // Assuming 'combined_list' has columns 'max_duration' and 'max_duration_unit'
    $maxDuration = $_POST['space_max_duration'];
    $maxDurationUnit = $_POST['max_duration_unit'];


    // Retrieve data stored in session from previous forms
    $spaceName = isset($_SESSION['spaceName']) ? $_SESSION['spaceName'] : "";
    $projectType = isset($_SESSION["projectType"]) ? $_SESSION["projectType"] : "";
    $spaceType = isset($_SESSION['spaceType']) ? $_SESSION['spaceType'] : "";
    $spaceAddress1 = isset($_SESSION['spaceAddress1']) ? $_SESSION['spaceAddress1'] : "";
    $spaceAddress2 = isset($_SESSION['spaceAddress2']) ? $_SESSION['spaceAddress2'] : "";
    $city = isset($_SESSION['city']) ? $_SESSION['city'] : "";
    $pinCode = isset($_SESSION['pinCode']) ? $_SESSION['pinCode'] : "";
    $spaceArea = isset($_SESSION['spaceArea']) ? $_SESSION['spaceArea'] : "";
    $spaceDes = isset($_SESSION['spaceDes']) ? $_SESSION['spaceDes'] : "";
    $spaceImg = isset($_SESSION['spaceImg']) ? $_SESSION['spaceImg'] : "";
    $Amenities = isset($_SESSION['Amenities']) ? $_SESSION['Amenities'] : "";
    // $minDuration = isset($_SESSION['spaceMinDuration']) ? $_SESSION['spaceMinDuration'] : "";
    // $minDurationUnit = isset($_SESSION['spaceMinDurationUnit']) ? $_SESSION['spaceMinDurationUnit'] : "";
    // $maxDuration = isset($_SESSION['spaceMaxDuration']) ? $_SESSION['spaceMaxDuration'] : "";
    // $maxDurationUnit = isset($_SESSION['spaceMaxDurationUnit']) ? $_SESSION['spaceMaxDurationUnit'] : "";
    $selectedYear = isset($_SESSION['selectedYear']) ? $_SESSION['selectedYear'] : "";
    $selectedMonth = isset($_SESSION['selectedMonth']) ? $_SESSION['selectedMonth'] : "";
    $selectedDates = isset($_SESSION['selectedDates']) ? $_SESSION['selectedDates'] : "";



    // Insert data into the admin review table
    $sql = "INSERT INTO admin_review_table (
        user_id, SpaceName, projectType, SpaceType, SpaceAddress1, SpaceAddress2, City, PinCode,
        SpaceArea, Description, images, Amenities,
        min_duration, min_duration_unit, max_duration, max_duration_unit,
        selected_year, selected_month, selected_dates,
        DailyPrice, WeeklyPrice, MonthlyPrice, Maintenance, SecurityDeposit
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?,
        ?, ?, ?, ?,
        ?, ?, ?, ?,
        ?, ?, ?,
        ?, ?, ?, ?, ?
    )";

    // Assuming $conn is your database connection object
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param(
        "ssssssssssssssssssssssss",
        $user_id,
        $spaceName,
        $projectType,
        $spaceType,
        $spaceAddress1,
        $spaceAddress2,
        $city,
        $pinCode,
        $spaceArea,
        $spaceDes,
        $spaceImg,
        $Amenities,
        $minDuration,
        $minDurationUnit,
        $maxDuration,
        $maxDurationUnit,
        $selectedYear,
        $selectedMonth,
        $selectedDates,
        $spaceDailyPrice,
        $spaceWeeklyPrice,
        $spaceMonthlyPrice,
        $spaceMain,
        $spaceDeposit
    );

    // Execute the statement
    if ($stmt->execute()) {
        // Insert successful
        echo "Space added successfully!";
    } else {
        // Insert failed
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    // Clear session variables
    unset($_SESSION['step']);
    session_destroy();
    header('Location: wait.php');
    exit();
}
?>
<!-- Your HTML content for step 3 goes here -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List a Space - Step 4</title>
    <!-- Include your stylesheets and scripts here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="stylelist.php">
    <link rel="stylesheet" href="header_footer.php">
<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXVP8RTRY0"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-WXVP8RTRY0'); </script>

</head>


<body>
    <?php
    include 'header.php';
    ?>
    <div class="add-listing">
        <h1 class="name-center">List a Space</h1>

        <div class="list-a-space-diagram">
            <div class="step active1">
                <h3>1</h3>

            </div>


            <div class="arrow green"></div>

            <div class="step active1">
                <h3>2</h3>
            </div>




            <div class="arrow green "></div>

            <div class="step active1">
                <h3>3</h3>
            </div>
            <div class="arrow green"></div>

            <div class="step">
                <h3>4</h3>
            </div>

        </div>
        <div class="below">
            <div>
                <h5>Space Details
                </h5>
            </div>
            <div>
                <h5>Space showcase
                </h5>
            </div>
            <div>
                <h5>Availability Date
                </h5>
            </div>
            <div>
                <h5>Space pricing
                </h5>
            </div>


        </div>

        <form action="" method="post" id="list2" onsubmit="return validateDurationSelection();">
            <!-- List2 Form -->
            <!-- ... (your existing List2 Form content) ... -->
            <div class="duration-container">
                <div class="duration-input">
                    <label for="space_min_duration"> Min Duration <span class="red">*</span></label>
                    <div class="input-group">
                        <input type="text" pattern="[0-9]+([.\s-][0-9]+)*" name="space_min_duration" placeholder="Enter duration" id="space_min_duration" required style="width: 39%;">
                        <select name="min_duration_unit" style="width: 30%;" onchange="updateRequiredFields()">
                            <option value="" disabled selected>Choose duration</option>
                            <option value="days">Days</option>
                            <option value="weeks">Weeks</option>
                            <option value="months">Months</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="duration-container">
                <div class="duration-input">
                    <label for="space_max_duration"> Max Duration </label>
                    <div class="input-group">
                        <input type="text" pattern="[0-9]*"  name="space_max_duration" placeholder="Enter duration" id="space_max_duration" style="width: 39%;">
                        <select name="max_duration_unit" style="width: 30%;">
                            <option value="" disabled selected>Choose duration</option>
                            <option value="days">Days</option>
                            <option value="weeks">Weeks</option>
                            <option value="months">Months</option>
                        </select>
                    </div>
                </div>
            </div>





            <label for="space_Daily_price">Daily Price </label>
            <input type="text" pattern="[0-9]*" min="0" name="space_Daily_price" placeholder="Enter Daily price" id="space_Daily_price">
            <h5 class="right1">&#x20B9; / Daily</h5>

            <label for="space_Weekly_price">Weekly Price </label>
            <input type="text" pattern="[0-9]*" min="0" name="space_Weekly_price" placeholder="Enter Weekly Price" id="space_Weekly_price">
            <h5 class="right2">&#x20B9; / Weekly</h5>

            <label for="space_Monthly_price">Monthly Price </label>
            <input type="text" pattern="[0-9]*" min="0" name="space_Monthly_price" placeholder="Enter Monthly Price" id="space_Monthly_price">
            <h5 class="right3">&#x20B9; / Monthly </h5>

            <label for="space_main">Maintenance </label>
            <input type="text" pattern="[0-9]*" min="0" name="space_main" placeholder="Enter maintenance amount in rupees " id="space_main">

            <label for="space_Sercurity">Security Deposit </label>
            <input type="text" pattern="[0-9]*" name="space_Sercurity" placeholder="Enter security deposit in rupees " id="space_Sercurity">
            <br>
            <span class="space">Mandatory Field are marked with &nbsp;<span class="red">*</span></span>

            <div class="button-container">
                <button type="button" class="back-btn" onclick="goToStep()">Back</button>
                <button type="submit" class="next-btn" name="submit_list2">List My Space</button>
            </div>
        </form>
    </div>
    <?php
    include 'footer.php';
    ?>
    <script>
        const navEl = document.querySelector('.nav');
        const hamburgerEl = document.querySelector('.hamburger');
        const navItemEls = document.querySelectorAll('.nav__item');

        hamburgerEl.addEventListener('click', () => {
            navEl.classList.toggle('nav--open');
            hamburgerEl.classList.toggle('hamburger--open');
        });

        navItemEls.forEach(navItemEl => {
            navItemEl.addEventListener('click', () => {
                navEl.classList.remove('nav--open');
                hamburgerEl.classList.remove('hamburger--open');
            });
        });
    </script>
    <script>
        function goToStep() {
            window.location.href = 'step3.php';
        }

        function validateDurationSelection() {
            console.log("validateDurationSelection called");

            const minDurationSelect = document.querySelector('select[name="min_duration_unit"]');
            const minDurationUnit = minDurationSelect.value;

            // Enable or disable required attribute for price fields based on the selected minimum duration unit
            const dailyPriceField = document.getElementById('space_Daily_price');
            const weeklyPriceField = document.getElementById('space_Weekly_price');
            const monthlyPriceField = document.getElementById('space_Monthly_price');

            // Reset required attribute for all price fields
            dailyPriceField.required = false;
            weeklyPriceField.required = false;
            monthlyPriceField.required = false;

            if (minDurationUnit === 'days') {
                dailyPriceField.required = true;
            } else if (minDurationUnit === 'weeks') {
                weeklyPriceField.required = true;
            } else if (minDurationUnit === 'months') {
                monthlyPriceField.required = true;
            }

            // Check if the required fields are filled
            if ((dailyPriceField.required && dailyPriceField.value === "") ||
                (weeklyPriceField.required && weeklyPriceField.value === "") ||
                (monthlyPriceField.required && monthlyPriceField.value === "")) {

                return false;
            }

            return true;
        }
    </script>

</body>

</html>