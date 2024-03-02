<?php
// Include your database connection file
@include 'connect.php';
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}
// Initialize the $result variable
$result = null;
$adminResult = null;


// Check if the user is logged in
if (isset($_COOKIE['user_id'])) {
    // Retrieve the user ID from the cookie
    $user_id = $_COOKIE['user_id'];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT id, SpaceName, SpaceType, SpaceAddress1, SpaceAddress2, City, PinCode,
        SpaceArea, Description, images, Amenities,
        min_duration, min_duration_unit, max_duration, max_duration_unit,
        selected_year, selected_month, selected_dates,
        DailyPrice, WeeklyPrice, MonthlyPrice, Maintenance, SecurityDeposit
    FROM combined_list
    WHERE user_id = ?";

    $stmt = $conn->prepare($sql);

    // Bind the user ID parameter
    $stmt->bind_param("s", $user_id);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Handle the case where no listings are found
    if (!$result) {
        echo "Error executing query: " . $conn->error;
    }
    $activeSql = "SELECT * FROM combined_list WHERE user_id = ?";

    $activeStmt = $conn->prepare($activeSql);

    // Bind the user ID parameter
    $activeStmt->bind_param("s", $user_id);

    // Execute the query for active listings
    $activeStmt->execute();

    // Get the result for active listings
    $activeResult = $activeStmt->get_result();

    // Handle the case where no active listings are found
    if (!$activeResult) {
        echo "Error executing active listings query: " . $conn->error;
    }
    // Use prepared statements for the admin listings
    $adminSql = "SELECT id, SpaceName, SpaceType, SpaceAddress1, SpaceAddress2, City, PinCode,
        SpaceArea, Description, images, Amenities,
        min_duration, min_duration_unit, max_duration, max_duration_unit,
        selected_year, selected_month, selected_dates,
        DailyPrice, WeeklyPrice, MonthlyPrice, Maintenance, SecurityDeposit
    FROM admin_review_table
    WHERE user_id = ?";

    $adminStmt = $conn->prepare($adminSql);

    // Bind the user ID parameter
    $adminStmt->bind_param("s", $user_id);

    // Execute the query
    $adminStmt->execute();

    // Get the result
    $adminResult = $adminStmt->get_result();

    // Handle the case where no admin listings are found
    if (!$adminResult) {
        echo "Error executing admin query: " . $conn->error;
    }
    $expSql = "SELECT * FROM reject WHERE user_id = ?";
    $expStmt = $conn->prepare($expSql);

    // Bind the user ID parameter
    $expStmt->bind_param("s", $user_id);

    // Execute the query
    $expStmt->execute();

    // Get the result
    $expResult = $expStmt->get_result();

    // Handle the case where no admin listings are found
    if (!$expResult) {
        echo "Error executing admin query: " . $conn->error;
    }
    if (isset($_POST['delete'])) {
        $spaceIdToDelete = $_POST['spaceId'];
        $tableToDeleteFrom = isset($_POST['admin_listing']) ? "admin_review_table" : "combined_list";


        // Determine the table based on the user's role or specific condition
        $deleteSql = "DELETE FROM " . $tableToDeleteFrom . " WHERE id = ?";
        $deleteStmt = $conn->prepare($deleteSql);
        $deleteStmt->bind_param("s", $spaceIdToDelete);

        $deleteStmt->execute();
        header('Location: user-profile.php');

        // Check for errors during deletion

    }
} else {
    // Redirect to login if the user is not logged in
    header('Location: login.php');
    exit();
}

$select_users = $conn->prepare("SELECT id, password, first_name, last_name, email, number FROM users WHERE id= ? LIMIT 1");
$select_users->bind_param("s", $user_id);
$select_users->execute();
$select_users->store_result();
$select_users->bind_result($fetch_user['id'], $fetch_user['password'], $fetch_user['first_name'], $fetch_user['last_name'], $fetch_user['email'], $fetch_user['number']);
$select_users->fetch();

$rowCount = $select_users->num_rows;

if (isset($_POST['submit'])) {

    $first_name = $_POST['first_name'];
    $first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
    $last_name = $_POST['last_name'];
    $last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    if (!empty($first_name)) {
        $update_first_name = $conn->prepare("UPDATE users SET first_name = ? WHERE id = ?");
        $update_first_name->bind_param("ss", $first_name, $user_id);
        $update_first_name->execute();
        $success_msg[] = 'First name updated!';
    }
    if (!empty($last_name)) {
        $update_last_name = $conn->prepare("UPDATE users SET last_name = ? WHERE id = ?");
        $update_last_name->bind_param("ss", $last_name, $user_id);
        $update_last_name->execute();
        $success_msg[] = 'Last name updated!';
    }

    if (!empty($email)) {
        $verify_email = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $verify_email->bind_param("s", $email);
        $verify_email->execute();
        $verify_email->store_result();
        if ($verify_email->num_rows > 0) {
            $warning_msg[] = 'Email already taken!';
        } else {
            $update_email = $conn->prepare("UPDATE users SET email = ? WHERE id = ?");
            $update_email->bind_param("ss", $email, $user_id);
            $update_email->execute();
            $success_msg[] = 'Email updated!';
        }
    }

    if (!empty($number)) {
        $verify_number = $conn->prepare("SELECT number FROM users WHERE number = ?");
        $verify_number->bind_param("s", $number);
        $verify_number->execute();
        $verify_number->store_result();
        if ($verify_number->num_rows > 0) {
            $warning_msg[] = 'Number already taken!';
        } else {
            $update_number = $conn->prepare("UPDATE users SET number = ? WHERE id = ?");
            $update_number->bind_param("ss", $number, $user_id);
            $update_number->execute();
            $success_msg[] = 'Number updated!';
        }
    }

    $empty_pass = '';
    $prev_pass = $fetch_user['password'];
    $old_pass = $_POST['old_pass'];
    $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
    $new_pass = $_POST['new_pass'];
    $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
    $c_pass = $_POST['c_pass'];
    $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);

    if (!empty($old_pass)) {
        if (password_verify($old_pass, $prev_pass)) {
            if ($new_pass == $c_pass) {
                $hashed_password = password_hash($new_pass, PASSWORD_DEFAULT);
                $update_pass = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
                $update_pass->bind_param("ss", $hashed_password, $user_id);
                $update_pass->execute();
                $success_msg[] = 'Changes Updated successfully!';
            } else {
                $warning_msg[] = 'Confirm password not matched!';
            }
        } else {
            $warning_msg[] = 'Old password not matched!';
        }
    } else {
        $warning_msg[] = 'Please enter old password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="header_footer.php">
    <!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXVP8RTRY0"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-WXVP8RTRY0'); </script>

<link rel="stylesheet" href="user-profile-style.php">

</head>

<body>
    <?php include 'header.php' ?>
    <div class="top"></div>
    <div class="flex">
        <!-- Add this button in your header.php -->
        <h2 id="toggleMenuBtn">&#9776; </h2>

        <div class="menu">
         
            <div class="profile-menu">
                <div class="info">
                    <div class="profile"><svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="17.5" cy="17.5" r="17" stroke="#222222" />
                  <path d="M18 19C20.7614 19 23 16.7614 23 14C23 11.2386 20.7614 9 18 9C15.2386 9 13 11.2386 13 14C13 16.7614 15.2386 19 18 19ZM18 19C13.5817 19 10 21.6863 10 25M18 19C22.4183 19 26 21.6863 26 25" stroke="#222222" stroke-width="1.5" stroke-linecap="round" />
                </svg></div>
                    <div class="details"> <?= $fetch_user['first_name']; ?>  <?= $fetch_user['last_name']; ?> <br> <?= $fetch_user['email']; ?></div>
                </div>
                <div class="my-profile">
                    <p>MY PROFILE</p>
                </div>
                <div class="hr">
                    <hr>
                </div>
                <div class="edit" onclick="showProfileSection()">
                    <p>Edit Profile</p>
                </div>

                <div class="listing" onclick="showListingSection()">
                    <p>My Listings</p>
                </div>
            </div>
            <div class="log">
                <p><a href="user_logout.php" class='btn' onclick="return confirm('logout from this website?');">logout</a></p>
            </div>
        </div>
        <hr id='hr'>
        <div class="features">
            <div id="editProfileDiv">
                <p>Edit Profile</p>



                <form action="" method="post">
                <div class="name">
                        <div class="first">
                            <label for="first-name">First Name <spam class="red">*</spam></label>
                            
                            <input type="text" name="first_name" maxlength="50" placeholder="<?= $fetch_user['first_name']; ?>" class="form-first-name">
                        </div>
                        <div class="last">
                            <label for="last-name">Last Name <spam class="red">*</spam></label>
                            <input type="text" name="last_name" maxlength="50" placeholder="<?= $fetch_user['last_name']; ?>"class="form-first-name">

                        </div>
                    </div>
                    <div class="name">
                        <div class="first">
                            <label for="first-name">Email <spam class="red">*</spam></label>
                            <input type="email" name="email" maxlength="50" placeholder="<?= $fetch_user['email']; ?>" class="form-first-name">

                        </div>
                        <div class="last">
                            <label for="last-name">  Phone No <spam class="red">*</spam></label>
                            <input type="tel" name="number" min="0" max="9999999999" maxlength="10" placeholder="<?= $fetch_user['number']; ?>" class="form-first-name">

                        </div>
                    </div>
                    <div class="name">
                        <div class="first">
                            <label for="first-name">Old password <spam class="red">*</spam></label>
                            <input type="password" name="old_pass" maxlength="20" placeholder="Enter your old password" class="form-first-name">


                        </div>
                        <div class="last">
                            <label for="last-name">  New Password <spam class="red">*</spam></label>
                            <input type="password" name="new_pass" maxlength="20" placeholder="Enter your new password" class="form-first-name">


                        </div>
                    </div>
                    <div class="name">
                        <div class="first">
                            <label for="first-name">Old password <spam class="red">*</spam></label>
                            <input type="password" name="c_pass" maxlength="20" placeholder="Confirm your new password" class="form-first-name">



                        </div>
                        <div class="last">
                        <input style="height: 8vh;" type="submit" value="Update Now" name="submit" class="btn">



                        </div>
                    </div>
                </form>

            </div>
            <div id="listing">
                <div class="viewlisting">
                    <p>Edit Profile</p>
                    <div class="options">
                        <button id="allBtn" class='width' onclick="showDiv('all', 'allBtn')">All</button>
                        <button id="expiredBtn" class='width' onclick="showDiv('expired', 'expiredBtn')">Rejected/Expired</button>
                        <button id="activeBtn" class='width' onclick="showDiv('active', 'activeBtn')">Active</button>
                        <button id="pendingBtn" class='width' onclick="showDiv('pending', 'pendingBtn')">Pending</button>

                    </div>
                </div>
                <div id="editProfileDiv">
                    <div class="all">
                        <?php
                        // Check if there are any active listings
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $spaceid = $row['id'];
                                $spaceName = $row['SpaceName'];
                                $spaceType = $row['SpaceType'];
                                $spaceAddress1 = $row['SpaceAddress1'];
                                $spaceAddress2 = $row['SpaceAddress2'];
                                $city = $row['City'];
                                $pinCode = $row['PinCode'];


                                $spaceArea = $row['SpaceArea'];
                                $spaceDes = $row['Description'];
                                $spaceImg = $row['images'];


                                $spaceDailyPrice = $row['DailyPrice'];
                                $spaceWeeklyPrice = $row['WeeklyPrice'];
                                $spaceMonthlyPrice = $row['MonthlyPrice'];
                                $spaceMain = $row['Maintenance'];
                                $spaceDeposit = $row['SecurityDeposit'];
                                $amenities = explode(',', $row['Amenities']);
                        ?>

                                <div class="listing-container" onclick="submitForm('<?php echo $row['id']; ?>')">
                                    <form action="ind_space_details.php" style="margin:0;" method="post" id="spaceForm_<?php echo $row['id']; ?>">
                                        <input type="hidden" name="spaceId" value="<?php echo $row['id']; ?>">
                                    </form>
                                    <?php if ($spaceImg !== "N/A") : ?>
                                        <?php
                                        // Handle multiple images
                                        $imagePaths = explode(',', $spaceImg);
                                        ?>
                                        <img class="listing-image" src="http://spacekraft.in/<?php echo $imagePaths[0]; ?>" height="200" alt="">
                                    <?php else : ?>
                                        <img class="listing-image" src="path/to/default/image.jpg" height="200" alt="Default Image">
                                    <?php endif; ?>

                                    <p class="info"> <?php echo $spaceName; ?></p>
                                    <form action="" method="post" style="    display: flex;
    flex-direction: row;">
                                        <input type="hidden" name="spaceId" value="<?php echo $spaceid; ?>">

                                        <a href="update_space.php?spaceId=<?php echo $spaceid; ?>" class="btn">Update</a> &nbsp;&nbsp;
                                        <input style="height: auto; " type="submit" name="delete" value="delete" class="btn" onclick="return confirm('Delete this listing?');">



                                    </form>


                                    <!-- Add a button to view details -->

                                </div>

                        <?php

                            }
                        } else {
                            // Handle the case where no active listings are found
                            echo "No active records found";
                        }
                        ?>
                    </div>
                    <div class="expired" style="display: none;"> <?php
                                                                    // Check if there are any expired listings
                                                                    if ($expResult->num_rows > 0) {
                                                                        while ($row = $expResult->fetch_assoc()) {
                                                                            $spaceid = $row['id'];
                                                                            $spaceName = $row['SpaceName'];
                                                                            $spaceType = $row['SpaceType'];
                                                                            $spaceAddress1 = $row['SpaceAddress1'];
                                                                            $spaceAddress2 = $row['SpaceAddress2'];
                                                                            $city = $row['City'];
                                                                            $pinCode = $row['PinCode'];


                                                                            $spaceArea = $row['SpaceArea'];
                                                                            $spaceDes = $row['Description'];
                                                                            $spaceImg = $row['images'];


                                                                            $spaceDailyPrice = $row['DailyPrice'];
                                                                            $spaceWeeklyPrice = $row['WeeklyPrice'];
                                                                            $spaceMonthlyPrice = $row['MonthlyPrice'];
                                                                            $spaceMain = $row['Maintenance'];
                                                                            $spaceDeposit = $row['SecurityDeposit'];
                                                                            $amenities = explode(',', $row['Amenities']);
                                                                    ?>
                                <div class="listing-container" onclick="submitForm('<?php echo $row['id']; ?>')">

                                    <?php if ($spaceImg !== "N/A") : ?>
                                        <?php
                                                                                // Handle multiple images
                                                                                $imagePaths = explode(',', $spaceImg);
                                        ?>
                                        <img class="listing-image" src="http://spacekraft.in/<?php echo $imagePaths[0]; ?>" height="200" alt="">
                                    <?php else : ?>
                                        <img class="listing-image" src="path/to/default/image.jpg" height="200" alt="Default Image">
                                    <?php endif; ?>

                                    <p class="info"> <?php echo $spaceName; ?></p>


                                    <!-- Add a button to view details -->

                                </div>

                        <?php

                                                                        }
                                                                    } else {
                                                                        // Handle the case where no expired listings are found
                                                                        echo "No expired records found";
                                                                    }
                        ?>
                    </div>
                    <div class="active" style="display: none;"> <?php
                                                                // Check if there are any active listings
                                                                if ($activeResult->num_rows > 0) {

                                                                    while ($activeRow = $activeResult->fetch_assoc()) {
                                                                        $activeSpaceId = $activeRow['id'];
                                                                        $activeSpaceName = $activeRow['SpaceName'];
                                                                        $activeSpaceType = $activeRow['SpaceType'];
                                                                        $activeSpaceAddress1 = $activeRow['SpaceAddress1'];
                                                                        $activeSpaceAddress2 = $activeRow['SpaceAddress2'];
                                                                        $activeCity = $activeRow['City'];
                                                                        $activePinCode = $activeRow['PinCode'];
                                                                        $activeSpaceArea = $activeRow['SpaceArea'];
                                                                        $activeSpaceDes = $activeRow['Description'];
                                                                        $activeSpaceImg = $activeRow['images'];
                                                                        $activeAmenities = explode(',', $activeRow['Amenities']);
                                                                        $activeMinDuration = $activeRow['min_duration'];
                                                                        $activeMinDurationUnit = $activeRow['min_duration_unit'];  // Note: This field is assumed to exist in your database
                                                                        $activeMaxDuration = $activeRow['max_duration'];
                                                                        $activeMaxDurationUnit = $activeRow['max_duration_unit'];  // Note: This field is assumed to exist in your database
                                                                        $activeSelectedYear = $activeRow['selected_year'];
                                                                        $activeSelectedMonth = $activeRow['selected_month'];
                                                                        $activeSelectedDates = $activeRow['selected_dates'];
                                                                        $activeDailyPrice = $activeRow['DailyPrice'];
                                                                        $activeWeeklyPrice = $activeRow['WeeklyPrice'];
                                                                        $activeMonthlyPrice = $activeRow['MonthlyPrice'];
                                                                        $activeMaintenance = $activeRow['Maintenance'];
                                                                        $activeSecurityDeposit = $activeRow['SecurityDeposit'];
                                                                        // Placeholder path to default active image
                                                                        $defaultActiveImagePath = "path/to/default/active_image.jpg";
                                                                ?>
                                <div class="listing-container" onclick="submitForm('<?php echo $row['id']; ?>')">
                                    <form action="ind_space_details.php" style="margin:0;" method="post" id="spaceForm_<?php echo $row['id']; ?>">
                                        <input type="hidden" name="spaceId" value="<?php echo $row['id']; ?>">
                                    </form>
                                    <?php if ($spaceImg !== "N/A") : ?>
                                        <?php
                                                                            // Handle multiple images
                                                                            $imagePaths = explode(',', $spaceImg);
                                        ?>
                                        <img class="listing-image" src="http://spacekraft.in/<?php echo $imagePaths[0]; ?>" height="200" alt="">
                                    <?php else : ?>
                                        <img class="listing-image" src="path/to/default/image.jpg" height="200" alt="Default Image">
                                    <?php endif; ?>

                                    <p class="info"> <?php echo  $activeSpaceName ?></p>





                                    <!-- Add a button to view details -->

                                    <form action="" method="post" style="    display: flex;
    flex-direction: row;">
                                        <input type="hidden" name="spaceId" value="<?php echo $spaceid; ?>">

                                        <a href="update_space.php?spaceId=<?php echo $spaceid; ?>" class="btn">Update</a> &nbsp;&nbsp;
                                        <input style="height: auto; " type="submit" name="delete" value="delete" class="btn" onclick="return confirm('Delete this listing?');">



                                    </form>
                                </div>
                        <?php
                                                                    }
                                                                } else {
                                                                    // Handle the case where no active listings are found
                                                                    echo "No active records found";
                                                                }
                        ?>
                    </div>
                    <div class="pending" style="display: none;"><?php
                                                                // Check if there are any admin listings
                                                                if ($adminResult->num_rows > 0) {
                                                                    while ($adminRow = $adminResult->fetch_assoc()) {
                                                                        $adminSpaceId = $adminRow['id'];
                                                                        $adminSpaceName = $adminRow['SpaceName'];
                                                                        $adminSpaceType = $adminRow['SpaceType'];
                                                                        $adminSpaceAddress1 = $adminRow['SpaceAddress1'];
                                                                        $adminSpaceAddress2 = $adminRow['SpaceAddress2'];
                                                                        $adminCity = $adminRow['City'];
                                                                        $adminPinCode = $adminRow['PinCode'];
                                                                        $adminSpaceArea = $adminRow['SpaceArea'];
                                                                        $adminSpaceDes = $adminRow['Description'];
                                                                        $adminSpaceImg = $adminRow['images'];
                                                                        $adminAmenities = explode(',', $adminRow['Amenities']);
                                                                        $adminMinDuration = $adminRow['min_duration'];
                                                                        $adminMinDurationUnit = $adminRow['min_duration_unit'];
                                                                        $adminMaxDuration = $adminRow['max_duration'];
                                                                        $adminMaxDurationUnit = $adminRow['max_duration_unit'];
                                                                        $adminSelectedYear = $adminRow['selected_year'];
                                                                        $adminSelectedMonth = $adminRow['selected_month'];
                                                                        $adminSelectedDates = $adminRow['selected_dates'];
                                                                        $adminDailyPrice = $adminRow['DailyPrice'];
                                                                        $adminWeeklyPrice = $adminRow['WeeklyPrice'];
                                                                        $adminMonthlyPrice = $adminRow['MonthlyPrice'];
                                                                        $adminMaintenance = $adminRow['Maintenance'];
                                                                        $adminSecurityDeposit = $adminRow['SecurityDeposit'];
                                                                ?>
                                <div class="listing-container" onclick="submitForm('<?php echo $row['id']; ?>')">
                                    <form action="ind_space_details.php" style="margin:0;" method="post" id="spaceForm_<?php echo $row['id']; ?>">
                                        <input type="hidden" name="spaceId" value="<?php echo $row['id']; ?>">
                                    </form>
                                    <?php if ($adminSpaceImg !== "N/A") : ?>
                                        <?php
                                                                            // Handle multiple images
                                                                            $imagePaths = explode(',',  $adminSpaceImg);
                                        ?>
                                        <img class="listing-image" src="http://spacekraft.in/<?php echo $imagePaths[0]; ?>" height="200" alt="">
                                    <?php else : ?>
                                        <img class="listing-image" src="path/to/default/image.jpg" height="200" alt="Default Image">
                                    <?php endif; ?>

                                    <p class="info"> <?php echo  $adminSpaceName ?></p>



                                    <!-- Add a button to view details -->
                                    <form action="ind_space_details.php" style="margin:0;" method="post" id="spaceForm_<?php echo $row['id']; ?>">

                                        <a href="update_space.php?spaceId=<?php echo $spaceid; ?>" class="btn">Update</a>
                                    </form>
                                </div>
                        <?php
                                                                    }
                                                                } else {
                                                                    // Handle the case where no admin listings are found
                                                                    echo "No admin records found";
                                                                }
                        ?>
                    </div>

                </div>
            </div>

            <script>
                function showDiv(divName, buttonId) {
                    var divsToHide = document.querySelectorAll('#editProfileDiv > div');
                    for (var i = 0; i < divsToHide.length; i++) {
                        divsToHide[i].style.display = 'none';
                    }

                    var divToShow = document.querySelector('#editProfileDiv .' + divName);
                    divToShow.style.display = 'block';

                    // Remove 'selected' class from all buttons
                    var buttons = document.querySelectorAll('.options button');
                    for (var i = 0; i < buttons.length; i++) {
                        buttons[i].classList.remove('selected1');
                    }

                    // Add 'selected' class to the clicked button
                    var clickedButton = document.getElementById(buttonId);
                    clickedButton.classList.add('selected1');
                }
            </script>
        </div>
    </div>
    <?php include 'footer.php' ?>

    <script>
    function showProfileSection() {
        document.getElementById('editProfileDiv').style.display = 'block';
        document.getElementById('listing').style.display = 'none';

        // Add 'selected' class to the clicked menu item
        document.querySelector('.profile-menu .edit').classList.add('selected');
        document.querySelector('.profile-menu .listing').classList.remove('selected');

        // Close menu on smaller devices
        if (window.innerWidth < 768) {
            closeMenu();
        }
    }

    function showListingSection() {
        document.getElementById('editProfileDiv').style.display = 'none';
        document.getElementById('listing').style.display = 'block';

        // Add 'selected' class to the clicked menu item
        document.querySelector('.profile-menu .listing').classList.add('selected');
        document.querySelector('.profile-menu .edit').classList.remove('selected');

        // Close menu on smaller devices
        if (window.innerWidth < 768) {
            closeMenu();
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        const menu = document.querySelector('.menu');
        const toggleMenuBtn = document.getElementById('toggleMenuBtn');
        const closeMenuBtn = document.getElementById('closeMenuBtn');

        toggleMenuBtn.addEventListener('click', function () {
            menu.style.display = (menu.style.display === 'none') ? 'block' : 'none';
            updateCloseButtonVisibility();
        });

        function updateCloseButtonVisibility() {
            closeMenuBtn.style.display = (menu.style.display === 'none') ? 'block' : 'none';
        }

        // Close menu by default on larger screens
        if (window.innerWidth <= 768) {
            closeMenu();
        }
    });

    function closeMenu() {
        const menu = document.querySelector('.menu');
        const closeMenuBtn = document.getElementById('closeMenuBtn');
        menu.style.display = 'none';
        closeMenuBtn.style.display = 'none';
    }
</script>


    <script>
        function submitForm(spaceId) {
            document.getElementById('spaceForm_' + spaceId).submit();
        }
    </script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'message.php' ?>
</body>

</html>