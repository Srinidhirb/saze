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
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXVP8RTRY0"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-WXVP8RTRY0');
    </script>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <div class="add-listing">
        <h1 class="name-center">List a Space</h1>

        <div class="list-a-space-diagram">
            <div class="step enabled">
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
            <div class="disabled">
                <h5>Space showcase
                </h5>
            </div>
            <div class="disabled">
                <h5>Availability Date
                </h5>
            </div>
            <div class="disabled">
                <h5>Space pricing
                </h5>
            </div>


        </div>
 <div class="heading-small">Space Details</div>
        <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <label for="space_name">Space Name <span class="red">*</span></label>
            <input type="text" name="space_name" id="space_name" pattern="[A-Za-z]+([\s.-][A-Za-z]+)*$" placeholder="Enter name of the space" required value="<?php echo isset($_SESSION['spaceName']) ? $_SESSION['spaceName'] : ''; ?>">



            <select name="project_type" id="project_type" required style='display:none;'>
                <option value="none" selected>Choose space type</option>


            </select>
            <!-- Add this code to your form -->
            <label for="space_type">Space Type <span class="red">*</span></label>
            <select name="space_type" id="space_type" required onchange="checkSpaceType()">
                <option value="">Choose space type</option>
                <?php
                $spaceTypes = array(
                    "Banquet", "Kiosk", "Lifestyle Center", "Mobile Van", "Restaurant",
                    "Shopshare", "Shopping Center", "Stall", "Storefront", "Window Display"
                );

                foreach ($spaceTypes as $spaceType) {
                    $selected = (isset($_SESSION['spaceType']) && $_SESSION['spaceType'] == $spaceType) ? 'selected' : '';
                    echo "<option value=\"$spaceType\" $selected>$spaceType</option>";
                }
                ?>
            </select>

            <?php
            // JavaScript function to update hidden input field
            echo '<script>
function checkSpaceType() {
    var selectedSpaceType = document.getElementById("space_type").value;
    document.getElementById("selected_space_type").value = selectedSpaceType;
}
</script>';
            ?>
            <input type="hidden" name="selected_space_type" id="selected_space_type" value="<?php echo isset($_SESSION['spaceType']) ? $_SESSION['spaceType'] : ''; ?>">

            <label for="space_address1">Space Address <span class="red">*</span></label>
            <!--<input type="text" name="space_address1" placeholder="Address line1" id="space_address1" required>-->
            <input type="text" name="space_address1" id="space_address1" placeholder="Address line1" required value="<?php echo isset($_SESSION['spaceAddress1']) ? $_SESSION['spaceAddress1'] : ''; ?>">
            <input type="text" name="space_address2" id="space_address2" placeholder="Address line2" value="<?php echo isset($_SESSION['spaceAddress2']) ? $_SESSION['spaceAddress2'] : ''; ?>">

            <!-- Add this code to your form -->
            <label for="space_city">City <span class="red">*</span></label>
            <select name="space_city" id="space_city" required onchange="checkCity()">
                <option value="">Choose a city</option>
                <?php
                $cities = array(
                    "Ahmedabad", "Bangalore", "Chennai", "Cochin", "Coimbatore",
                    "Delhi", "Delhi NCR", "Faridabad", "Indore", "Jaipur",
                    "Kolkata", "Mysore", "Noida", "Mount Abu", "Lonavala",
                    "Gir", "Vadodara", "Mumbai", "Goa", "Panchghani", "Others"
                );

                foreach ($cities as $city) {
                    $selected = (isset($_SESSION['city']) && $_SESSION['city'] == $city) ? 'selected' : '';
                    echo "<option value=\"$city\" $selected>$city</option>";
                }
                ?>
            </select>

            <input type="text" name="space_city_other" id="space_city_other" style="display: none;" placeholder="Enter new city">

            <?php
            // JavaScript function to update hidden input field
            echo '<script>
function checkCity() {
    var cityDropdown = document.getElementById("space_city");
    var otherCityInput = document.getElementById("space_city_other");

    if (cityDropdown.value.toLowerCase() === "others") {
        otherCityInput.style.display = "block";
        otherCityInput.required = true;
    } else {
        otherCityInput.style.display = "none";
        otherCityInput.required = false;
    }
}
</script>';
            ?>

            <input type="hidden" name="selected_city" id="selected_city" value="<?php echo isset($_SESSION['city']) ? $_SESSION['city'] : ''; ?>">


            <label for="space_pin_code">Pin Code <span class="red">*</span></label>
            <input type="text" name="space_pin_code" id="space_pin_code" pattern="[0-9 ]*" maxlength="6" required value="<?php echo isset($_SESSION['pinCode']) ? $_SESSION['pinCode'] : ''; ?>">







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
    <script>
        function validateForm() {
            let space_name = document.getElementById('space_name').value.trim();
            let project_type = document.getElementById('project_type').value.trim();
            let space_type = document.getElementById('space_type').value.trim();
            let space_address1 = document.getElementById('space_address1').value.trim();
            let space_city = document.getElementById('space_city').value.trim();
            let space_city_other = document.getElementById('space_city_other').value.trim();
            let space_pin_code = document.getElementById('space_pin_code').value.trim();

            let isValid = true;

            if (!space_name.replace(/\s/g, '').length) {
                document.getElementById('space_name_error').innerText = 'Space Name is required';
                isValid = false;
            } else {
                document.getElementById('space_name_error').innerText = '';
            }

            if (project_type === 'none') {
                document.getElementById('project_type_error').innerText = 'Project Type is required';
                isValid = false;
            } else {
                document.getElementById('project_type_error').innerText = '';
            }

            if (!space_type.replace(/\s/g, '').length) {
                document.getElementById('space_type_error').innerText = 'Space Type is required';
                isValid = false;
            } else {
                document.getElementById('space_type_error').innerText = '';
            }

            if (!space_address1.replace(/\s/g, '').length) {
                document.getElementById('space_address1_error').innerText = 'Space Address is required';
                isValid = false;
            } else {
                document.getElementById('space_address1_error').innerText = '';
            }

            if (!space_city.replace(/\s/g, '').length) {
                document.getElementById('space_city_error').innerText = 'City is required';
                isValid = false;
            } else if (space_city === 'Others' && !space_city_other.replace(/\s/g, '').length) {
                document.getElementById('space_city_error').innerText = 'Please specify the city';
                isValid = false;
            } else {
                document.getElementById('space_city_error').innerText = '';
            }

            if (!space_pin_code.replace(/\s/g, '').length) {
                document.getElementById('space_pin_code_error').innerText = 'Pin Code is required';
                isValid = false;
            } else {
                document.getElementById('space_pin_code_error').innerText = '';
            }

            return isValid;
        }
    </script>
</body>

</html>