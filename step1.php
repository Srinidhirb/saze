<?php
// Include your database connection file
@include 'connect.php';
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
    header('location:login.php');
}

// Start or resume the session
session_start();


// Process the form data for step 1
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Process List Form data
    $spaceName = isset($_POST["space_name"]) ? $_POST["space_name"] : "";
    $projectType = isset($_POST["project_type"]) ? $_POST["project_type"] : "";
    $spaceType = isset($_POST["space_type"]) ? $_POST["space_type"] : "";
    $spaceAddress1 = isset($_POST["space_address1"]) ? $_POST["space_address1"] : "";
    $spaceAddress2 = isset($_POST["space_address2"]) ? $_POST["space_address2"] : "";
    $city = isset($_POST["space_city"]) ? $_POST["space_city"] : "";
    $pinCode = isset($_POST["space_pin_code"]) ? $_POST["space_pin_code"] : "";
    
  

    // If the selected city is "Others," use the value from the input box
    if ($city === 'Others') {
        $newCity = isset($_POST["space_city_other"]) ? $_POST["space_city_other"] : "";
        $city = $newCity; // Use the value from the input box as the city
    }

    // Store these values in session for later use in List1 Form
    $_SESSION['spaceName'] = $spaceName;
    $_SESSION['projectType'] = $projectType;
    $_SESSION['spaceType'] = $spaceType;
    $_SESSION['spaceAddress1'] = $spaceAddress1;
    $_SESSION['spaceAddress2'] = $spaceAddress2;
    $_SESSION['city'] = $city;
    $_SESSION['pinCode'] = $pinCode;
   

    // Set the next step
    header('Location: step2.php');
    exit();
}
?>

<!-- Your HTML content for step 1 goes here -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon " href="Logo Icon 16_16.svg">
    <title>List a Space - Step 1</title>
    <!-- Include your stylesheets and scripts here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="stylelist.php">
    <link rel="stylesheet" href="header_footer.php">
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
            <div class="step enabled" >
                <h3>1</h3>

            </div>


            <div class="arrow  "></div>

            <div class="step-dis disabled">
                <h3>2</h3>
            </div>

           

           
            <div class="arrow"></div>

            <div class="step-dis disabled">
                <h3>3</h3>
            </div>
            <div class="arrow"></div>

            <div class="step-dis disabled">
                <h3>4</h3>
            </div>

        </div>
        <div class="below">
            <div>
                <h5>Space Details
                </h5>
            </div>
            <div class="disabled" >
                <h5>Space showcase
                </h5>
            </div>
            <div class="disabled" >
                <h5>Availability Date
                </h5>
            </div>
            <div class="disabled" >
                <h5>Space pricing
                </h5>
            </div>
           

        </div>
        <div class="heading-small">Space Details</div>

        <form action="" method="post">
          <label for="space_name">Space Name <span class="red">*</span></label>
            <input type="text" name="space_name" id="space_name" pattern="[A-Za-z]+([\s.-][A-Za-z]+)*" placeholder="Enter name of the space" required>


           <select name="project_type" id="project_type" required style='display:none;'>
                <option value="none" selected >Choose space type</option>
               

            </select>
            <label for="space_type">Space Type <span class="red">*</span></label>
            <select name="space_type" id="space_type" required>
                <option value="">Choose space type</option>
                <option value="Banquet">Banquet</option>
                <option value="Kiosk">Kiosk</option>
                <option value="Lifestyle Center">Lifestyle Center</option>
                <option value="Mobile Van">Mobile Van</option>
                <option value="Restaurant">Restaurant</option>
                <option value="Shopshare">Shopshare</option>
                <option value="shopping center">Shopping Center</option>
                <option value="stall">Stall</option>
                <option value="storefront">Storefront</option>
                <option value="Window Display">Window Display</option>

            </select>
            <label for="space_address1">Space Address <span class="red">*</span></label>
            <!--<input type="text" name="space_address1" placeholder="Address line1" id="space_address1" required>-->
<input type="text" name="space_address1" placeholder="Address line1" id="space_address1" required pattern="[A-Za-z]+([\s.-][A-Za-z]+)*">

            <input type="text" name="space_address2"  placeholder="Address line2" id="space_address2">

            <label for="space_city">City <span class="red">*</span></label>
            <div>
                <select name="space_city" id="space_city" required onchange="checkCity()">
                    <option value="">Choose a city</option>
                    <option value="Ahmedabad">Ahmedabad</option>
                    <option value="Bangalore">Bangalore</option>
                    <option value="Chennai">Chennai</option>
                    <option value="Cochin">Cochin</option>
                    <option value="Coimbatore">Coimbatore</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Delhi NCR">Delhi NCR</option>
                    <option value="Faridabad">Faridabad</option>
                    <option value="Indore">Indore</option>
                    <option value="Jaipur">Jaipur</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Mysore">Mysore</option>
                    <option value="Noida">Noida</option>
                    <option value="Mount Abu">Mount Abu</option>
                    <option value="Lonavala">Lonavala</option>
                    <option value="Gir">Gir</option>
                    <option value="Vadodara">Vadodara</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Goa">Goa</option>
                    <option value="Panchghani">Panchghani</option>
                    <option value="Others">Others</option>
                </select>

                <input type="text" name="space_city_other" id="space_city_other" style="display: none;" placeholder="Enter new city">
            </div>
            <script>
                function checkCity() {
                    var cityDropdown = document.getElementById('space_city');
                    var otherCityInput = document.getElementById('space_city_other');

                    if (cityDropdown.value.toLowerCase() === 'others') {
                        otherCityInput.style.display = 'block';
                        otherCityInput.required = true;
                    } else {
                        otherCityInput.style.display = 'none';
                        otherCityInput.required = false;
                    }
                }
            </script>

            <label for="space_pin_code">Pin Code <span class="red">*</span></label>
            <input type="text" name="space_pin_code" pattern="[0-9]*" maxlength="6" id="space_pin_code" required min="0">


           
            


            <!-- Add other form fields for step 1 -->
            <br>
            <span class="space">Mandatory fields are marked with&nbsp;<span class="red">*</span></span>

            <div class="button-container">

                 <button class="next-btn" type="submit" onclick="nextpage()">Next</button>
            </div>
        </form>
    </div>
    <?php
    include 'footer.php';
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var calendarInput = document.getElementById('space_availability_date');

            // Initialize Flatpickr without showing the calendar by default
            var flatpickrInstance = flatpickr(calendarInput, {

                theme: "dark", // Apply a dark theme
                allowInput: true, // Allow manual input
                onClose: function(selectedDates, dateStr, instance) {
                    // Close the calendar when a date is selected
                    instance.close();
                }
            });


        });

        // ... (Your existing script section) ...
    </script>
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

</body>

</html>