<?php
// Include your database connection file
@include 'connect.php';
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
  } else {
    $user_id = '';
  }
// Start or resume the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming 'combined_list' has columns 'selected_year', 'selected_month', and 'selected_dates'
    $selectedYear = $_POST['year'];
    $selectedMonth = $_POST['month'];
    $selectedDates = $_POST['calendar'];

    // Assuming 'combined_list' has other columns like 'user_id', etc.
    $user_id = $_COOKIE['user_id'];

    // Store these values in session for later use
    $_SESSION['selectedYear'] = $selectedYear;
    $_SESSION['selectedMonth'] = $selectedMonth;
    $_SESSION['selectedDates'] = $selectedDates;
    $_SESSION['user_id'] = $user_id;

    // Redirect to the next page
    header('Location: step4.php'); // Change 'step5.php' to the actual URL of step 5
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" href="Logo Icon 16_16.svg">
    <title>List a Space - Step 3</title>
    <!-- Include your stylesheets and scripts here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="stylelist.php">
    <style>
        .label-container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-left: 0%;
            width: 65%;
        }

        form .label-container {
            margin-left: 0%;
        }

        .container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 70%;
            column-gap: 3%;
        }
    </style>
    <link rel="stylesheet" href="header_footer.php">
    <!-- Include flatpickr library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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

            <div class="arrow green"></div>
            <div class="step">
                <h3>3</h3>
            </div>
            <div class="arrow"></div>
            <div class="step step-dis disabled">
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
            <div class="disabled" >
                <h5>Space pricing
                </h5>
            </div>

        </div>
        <form action="" method="post" enctype="multipart/form-data" style="padding-top: 44px;">
            <div class="label-container">
                
                <label for="calendar">Select Dates&nbsp;<span class="red">*</span></label>
            </div>
            <div class="container">

                <select id="year" name="year" style='display:none;'required>
                <option value="none" selected>January</option>
 </select>


                <select id="month" name="month" style='display:none;'required>
                    <option value="none" selected>January</option>
                 
                </select>
               


                 
                <!--<input type="text" id="calendar" name="calendar" placeholder="Select Dates" pattern="\d{4}-\d{2}-\d{2}" required>-->
                <input type="text" id="calendar" name="calendar" placeholder="YYYY-MM-DD" pattern="\d{4}-\d{2}-\d{2}" title="Please enter a date in the format YYYY-MM-DD" required>

            </div>
    

    <span class="space">Mandatory fields are marked with&nbsp;<span class="red">*</span></span>

    <div class="button-container">
        <button type="button" class="back-btn" onclick="goToStep2()">Back</button>
        <button type="submit" class= "next-btn">Next</button>
    </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize flatpickr for multi-date selection
            flatpickr("#calendar", {
                mode: "multiple",
                dateFormat: "d-m-y",
                minDate: "today",
                disable: [new Date()], // Set a minimum date if needed
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var currentYear = new Date().getFullYear();
            var selectYear = document.getElementById('year');

            // Generate options for the next 10 years
            for (var i = 0; i < 10; i++) {
                var option = document.createElement('option');
                option.value = currentYear + i;
                option.text = currentYear + i;
                selectYear.appendChild(option);
            }
        });

        function goToStep2() {
            window.location.href = 'step2.php'; // Change 'step3.php' to the actual URL of step 3
        }
    </script>
    </div>
</body>

</html>