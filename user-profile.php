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

$select_user = $conn->prepare("SELECT id, password, first_name, last_name, email, number FROM users WHERE id = ? LIMIT 1");
$select_user->bind_param("s", $user_id);
$select_user->execute();
$select_user->store_result();
$select_user->bind_result($fetch_user['id'], $fetch_user['password'], $fetch_user['first_name'], $fetch_user['last_name'], $fetch_user['email'], $fetch_user['number']);
$select_user->fetch();

// Check if the form was submitted
if (isset($_POST['submit'])) {
    $success_msg = [];
    $warning_msg = [];

    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $c_pass = $_POST['c_pass'];




    if (!empty($old_pass)) {
        if (password_verify($old_pass, $fetch_user['password'])) {
            // Old password is correct, update other fields
            $first_name = $_POST['first_name'];
            if (!empty($first_name)) {
                $update_first_name = $conn->prepare("UPDATE users SET first_name = ? WHERE id = ?");
                $update_first_name->bind_param("ss", $first_name, $user_id);
                $update_first_name->execute();
                $success_msg[] = 'First name updated!';
                $fetch_user['first_name'] = $first_name; // Update fetched user data
            }

            $last_name = $_POST['last_name'];
            if (!empty($last_name)) {
                $update_last_name = $conn->prepare("UPDATE users SET last_name = ? WHERE id = ?");
                $update_last_name->bind_param("ss", $last_name, $user_id);
                $update_last_name->execute();
                $success_msg[] = 'Last name updated!';
                $fetch_user['last_name'] = $last_name; // Update fetched user data
            }

            $email = $_POST['email'];
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
                    $fetch_user['email'] = $email; // Update fetched user data
                }
            }

            $number = $_POST['number'];
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
                    $fetch_user['number'] = $number; // Update fetched user data
                }
            }

            if (!empty($new_pass) && !empty($c_pass)) {
                // Update password if new password and confirm password are provided
                if ($new_pass == $c_pass) {
                    $hashed_password = password_hash($new_pass, PASSWORD_DEFAULT);
                    $update_pass = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
                    $update_pass->bind_param("ss", $hashed_password, $user_id);
                    $update_pass->execute();
                    $success_msg[] = 'Password updated!';
                } else {
                    $warning_msg[] = 'Confirm password not matched!';
                }
            }

            // Update the fetched user data if password or other fields were updated
            $select_user->execute();
            $select_user->store_result();
            $select_user->bind_result($fetch_user['id'], $fetch_user['password'], $fetch_user['first_name'], $fetch_user['last_name'], $fetch_user['email'], $fetch_user['number']);
            $select_user->fetch();
        } else {
            $warning_msg[] = 'Old password not matched!';
        }
    }

    // Display success or warning messages
    if (!empty($success_msg)) {
        echo implode('<br>', $success_msg);
    }
    if (!empty($warning_msg)) {
        echo implode('<br>', $warning_msg);
    }
}
?>

<!-- Include JavaScript to update form fields -->
<script>
    document.getElementById('first_name').value = '<?php echo $fetch_user['first_name']; ?>';
    document.getElementById('last_name').value = '<?php echo $fetch_user['last_name']; ?>';
    document.getElementById('email').value = '<?php echo $fetch_user['email']; ?>';
    document.getElementById('number').value = '<?php echo $fetch_user['number']; ?>';
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-vhck/oDlQ2LpHJik4FIcq9wmK1H2R/f25KieRQoT/5SIdUCpDL3f3ZKptk+CJiE3ZI0vKwVYBbRzVmWeLzoxGA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Profile</title>
    <link rel="stylesheet" href="header_footer.php">
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
                    <div class="details"> <?= $fetch_user['first_name']; ?> <?= $fetch_user['last_name']; ?> <br> <?= $fetch_user['email']; ?></div>
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
                <a href="user_logout.php" onclick="return confirm('logout from this website?');"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.09202 21.782L6.86502 22.2275H6.86502L7.09202 21.782ZM6.21799 20.908L5.77248 21.135H5.77248L6.21799 20.908ZM18.5 18.8C18.5 18.5239 18.2761 18.3 18 18.3C17.7239 18.3 17.5 18.5239 17.5 18.8H18.5ZM17.782 20.908L18.2275 21.135L17.782 20.908ZM16.908 21.782L17.135 22.2275H17.135L16.908 21.782ZM16.908 2.21799L17.135 1.77248V1.77248L16.908 2.21799ZM17.5 5.2C17.5 5.47614 17.7239 5.7 18 5.7C18.2761 5.7 18.5 5.47614 18.5 5.2H17.5ZM17.782 3.09202L17.3365 3.31901V3.31901L17.782 3.09202ZM7.09202 2.21799L7.31901 2.66349H7.31901L7.09202 2.21799ZM6.21799 3.09202L6.66349 3.31901V3.31901L6.21799 3.09202ZM11 4.5C10.7239 4.5 10.5 4.72386 10.5 5C10.5 5.27614 10.7239 5.5 11 5.5V4.5ZM13 5.5C13.2761 5.5 13.5 5.27614 13.5 5C13.5 4.72386 13.2761 4.5 13 4.5V5.5ZM21 12.5C21.2761 12.5 21.5 12.2761 21.5 12C21.5 11.7239 21.2761 11.5 21 11.5V12.5ZM12 11.5C11.7239 11.5 11.5 11.7239 11.5 12C11.5 12.2761 11.7239 12.5 12 12.5V11.5ZM18.6464 14.6464C18.4512 14.8417 18.4512 15.1583 18.6464 15.3536C18.8417 15.5488 19.1583 15.5488 19.3536 15.3536L18.6464 14.6464ZM20.8686 13.1314L21.2222 13.4849L20.8686 13.1314ZM20.8686 10.8686L21.2222 10.5151L21.2222 10.5151L20.8686 10.8686ZM19.3536 8.64645C19.1583 8.45118 18.8417 8.45118 18.6464 8.64645C18.4512 8.84171 18.4512 9.15829 18.6464 9.35355L19.3536 8.64645ZM21.5368 12.309L21.0613 12.1545H21.0613L21.5368 12.309ZM21.5368 11.691L21.0613 11.8455L21.5368 11.691ZM9.2 2.5H14.8V1.5H9.2V2.5ZM14.8 21.5H9.2V22.5H14.8V21.5ZM6.5 18.8V5.2H5.5V18.8H6.5ZM9.2 21.5C8.6317 21.5 8.23554 21.4996 7.92712 21.4744C7.62454 21.4497 7.45069 21.4036 7.31901 21.3365L6.86502 22.2275C7.16117 22.3784 7.48126 22.4413 7.84569 22.4711C8.20428 22.5004 8.6482 22.5 9.2 22.5V21.5ZM5.5 18.8C5.5 19.3518 5.49961 19.7957 5.52891 20.1543C5.55868 20.5187 5.62159 20.8388 5.77248 21.135L6.66349 20.681C6.5964 20.5493 6.55031 20.3755 6.52559 20.0729C6.50039 19.7645 6.5 19.3683 6.5 18.8H5.5ZM7.31902 21.3365C7.03677 21.1927 6.8073 20.9632 6.66349 20.681L5.77248 21.135C6.01217 21.6054 6.39462 21.9878 6.86502 22.2275L7.31902 21.3365ZM17.5 18.8C17.5 19.3683 17.4996 19.7645 17.4744 20.0729C17.4497 20.3755 17.4036 20.5493 17.3365 20.681L18.2275 21.135C18.3784 20.8388 18.4413 20.5187 18.4711 20.1543C18.5004 19.7957 18.5 19.3518 18.5 18.8H17.5ZM14.8 22.5C15.3518 22.5 15.7957 22.5004 16.1543 22.4711C16.5187 22.4413 16.8388 22.3784 17.135 22.2275L16.681 21.3365C16.5493 21.4036 16.3755 21.4497 16.0729 21.4744C15.7645 21.4996 15.3683 21.5 14.8 21.5V22.5ZM17.3365 20.681C17.1927 20.9632 16.9632 21.1927 16.681 21.3365L17.135 22.2275C17.6054 21.9878 17.9878 21.6054 18.2275 21.135L17.3365 20.681ZM14.8 2.5C15.3683 2.5 15.7645 2.50039 16.0729 2.52559C16.3755 2.55031 16.5493 2.5964 16.681 2.66349L17.135 1.77248C16.8388 1.62159 16.5187 1.55868 16.1543 1.52891C15.7957 1.49961 15.3518 1.5 14.8 1.5V2.5ZM18.5 5.2C18.5 4.6482 18.5004 4.20428 18.4711 3.84569C18.4413 3.48126 18.3784 3.16117 18.2275 2.86502L17.3365 3.31901C17.4036 3.45069 17.4497 3.62454 17.4744 3.92712C17.4996 4.23554 17.5 4.6317 17.5 5.2H18.5ZM16.681 2.66349C16.9632 2.8073 17.1927 3.03677 17.3365 3.31901L18.2275 2.86502C17.9878 2.39462 17.6054 2.01217 17.135 1.77248L16.681 2.66349ZM9.2 1.5C8.6482 1.5 8.20428 1.49961 7.84569 1.52891C7.48126 1.55868 7.16117 1.62159 6.86502 1.77248L7.31901 2.66349C7.45069 2.5964 7.62454 2.55031 7.92712 2.52559C8.23554 2.50039 8.6317 2.5 9.2 2.5V1.5ZM6.5 5.2C6.5 4.6317 6.50039 4.23554 6.52559 3.92712C6.55031 3.62454 6.5964 3.45069 6.66349 3.31901L5.77248 2.86502C5.62159 3.16117 5.55868 3.48126 5.52891 3.84569C5.49961 4.20428 5.5 4.6482 5.5 5.2H6.5ZM6.86502 1.77248C6.39462 2.01217 6.01217 2.39462 5.77248 2.86502L6.66349 3.31901C6.8073 3.03677 7.03677 2.8073 7.31901 2.66349L6.86502 1.77248ZM11 5.5H13V4.5H11V5.5ZM21 11.5H12V12.5H21V11.5ZM19.3536 15.3536L21.2222 13.4849L20.5151 12.7778L18.6464 14.6464L19.3536 15.3536ZM21.2222 10.5151L19.3536 8.64645L18.6464 9.35355L20.5151 11.2222L21.2222 10.5151ZM21.2222 13.4849C21.4144 13.2928 21.58 13.1276 21.7046 12.9809C21.8329 12.8297 21.9468 12.6655 22.0124 12.4635L21.0613 12.1545C21.0527 12.1809 21.0305 12.2298 20.9423 12.3337C20.8503 12.4421 20.7189 12.574 20.5151 12.7778L21.2222 13.4849ZM20.5151 11.2222C20.7189 11.426 20.8503 11.5579 20.9422 11.6663C21.0305 11.7702 21.0527 11.8191 21.0613 11.8455L22.0124 11.5365C21.9468 11.3345 21.8329 11.1703 21.7046 11.0191C21.58 10.8724 21.4144 10.7072 21.2222 10.5151L20.5151 11.2222ZM22.0124 12.4635C22.1103 12.1623 22.1103 11.8377 22.0124 11.5365L21.0613 11.8455C21.0939 11.9459 21.0939 12.0541 21.0613 12.1545L22.0124 12.4635Z" fill="#637381" />
                    </svg> &nbsp;&nbsp;&nbsp;logout</a>
            </div>
        </div>
        <hr id='hr'>
        <div class="features">
            <div id="editProfileDiv">
                <p>Edit Profile</p>



                <form id="update-form" action="" method="post">
                    <div class="name">
                        <div class="first">
                            <label for="first-name">First Name <span class="red">*</span></label>
                            <input type="text" name="first_name" maxlength="50" placeholder="<?= $fetch_user['first_name']; ?>" class="form-first-name">
                        </div>
                        <div class="last">
                            <label for="last-name">Last Name <span class="red">*</span></label>
                            <input type="text" name="last_name" maxlength="50" placeholder="<?= $fetch_user['last_name']; ?>" class="form-first-name">
                        </div>
                    </div>
                    <div class="name">
                        <div class="first">
                            <label for="first-name">Email <span class="red">*</span></label>
                            <input type="email" name="email" maxlength="50" placeholder="<?= $fetch_user['email']; ?>" class="form-first-name">
                        </div>
                        <div class="last">
                            <label for="last-name"> Phone No <span class="red">*</span></label>
                            <input type="tel" name="number" min="0" max="9999999999" maxlength="10" placeholder="<?= $fetch_user['number']; ?>" class="form-first-name">
                        </div>
                    </div>
                    <div class="name">
                        <div class="first">
                            <label for="first-name">Old password <span class="red">*</span></label>
                            <input type="password" name="old_pass" maxlength="20" placeholder="Enter your old password" class="form-first-name">
                        </div>
                        <div class="last">
                            <label for="last-name"> New Password <span class="red">*</span></label>
                            <input type="password" name="new_pass" maxlength="20" placeholder="Enter your new password" class="form-first-name">
                        </div>
                    </div>
                    <div class="name">
                        <div class="first">
                            <label for="first-name">Confirm New Password <span class="red">*</span></label>
                            <input type="password" name="c_pass" maxlength="20" placeholder="Confirm your new password" class="form-first-name">
                        </div>
                        <br>
                        <div class="last">
                            <input style="height: auto;" type="submit" value="Update Now" name="submit" class="btn">
                        </div>
                    </div>
                </form>

                <script>
                    document.getElementById('update-form').addEventListener('submit', function(event) {
                        var firstName = document.getElementsByName('first_name')[0].value;
                        var lastName = document.getElementsByName('last_name')[0].value;
                        var email = document.getElementsByName('email')[0].value;
                        var number = document.getElementsByName('number')[0].value;
                        var oldPass = document.getElementsByName('old_pass')[0].value;
                        var newPass = document.getElementsByName('new_pass')[0].value;
                        var cPass = document.getElementsByName('c_pass')[0].value;

                        if ((firstName !== '' || lastName !== '' || email !== '' || number !== '') && oldPass === '') {
                            alert('Old password is required for updating other fields.');
                            event.preventDefault();
                        }

                        if ((newPass !== '' || cPass !== '') && (newPass === '' || cPass === '')) {
                            alert('Both old and new passwords are required for updating password.');
                            event.preventDefault();
                        }
                    });
                </script>


            </div>
            <div id="listing">
                <div class="viewlisting">

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
                                        <div class="image-container">
                                            <img class="listing-image" src="http://spacekraft.in/<?php echo $imagePaths[0]; ?>" height="200" alt="">
                                            <div class="buttons-container">
                                                <a href="update_space.php?spaceId=<?php echo $spaceid; ?>" class="small-btn update-btn"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.01149 13.9639L2.96017 14.2801H2.96017L2.01149 13.9639ZM2.76068 11.7163L1.81199 11.4001H1.81199L2.76068 11.7163ZM3.53372 10.4655L4.24083 11.1726L4.24083 11.1726L3.53372 10.4655ZM10.9996 2.9997L10.2925 2.29259V2.29259L10.9996 2.9997ZM14.9996 6.9997L15.7067 7.7068H15.7067L14.9996 6.9997ZM7.53372 14.4655L6.82662 13.7584L6.82661 13.7584L7.53372 14.4655ZM6.28291 15.2386L6.59914 16.1873H6.59914L6.28291 15.2386ZM4.03535 15.9878L4.35158 16.9365L4.35158 16.9365L4.03535 15.9878ZM7.12368 14.8483L6.52144 14.0499L6.52144 14.05L7.12368 14.8483ZM6.80861 15.043L6.3639 14.1473L6.80861 15.043ZM15.9632 4.11167L15.0672 4.55568V4.55568L15.9632 4.11167ZM15.9632 5.88773L15.0672 5.44371V5.44371L15.9632 5.88773ZM12.1115 2.03609L12.5555 2.93211V2.93211L12.1115 2.03609ZM13.8876 2.03609L13.4436 2.93211V2.93211L13.8876 2.03609ZM2.95627 11.1907L3.85195 11.6354L3.85195 11.6354L2.95627 11.1907ZM3.151 10.8756L2.35268 10.2733L2.35268 10.2733L3.151 10.8756ZM1.6388 15.7544L0.69689 16.0903L1.6388 15.7544ZM2.24482 16.3605L1.90894 17.3024L1.90894 17.3024L2.24482 16.3605ZM10.7067 3.29262C10.3161 2.9021 9.68297 2.9021 9.29245 3.29262C8.90192 3.68315 8.90192 4.31631 9.29245 4.70684L10.7067 3.29262ZM13.2924 8.70684C13.683 9.09736 14.3161 9.09736 14.7067 8.70684C15.0972 8.31631 15.0972 7.68315 14.7067 7.29262L13.2924 8.70684ZM8.99956 15.9997C8.44728 15.9997 7.99956 16.4474 7.99956 16.9997C7.99956 17.552 8.44728 17.9997 8.99956 17.9997V15.9997ZM15.9996 17.9997C16.5518 17.9997 16.9996 17.552 16.9996 16.9997C16.9996 16.4474 16.5518 15.9997 15.9996 15.9997V17.9997ZM2.96017 14.2801L3.70936 12.0326L1.81199 11.4001L1.06281 13.6477L2.96017 14.2801ZM4.24083 11.1726L11.7067 3.7068L10.2925 2.29259L2.82662 9.75843L4.24083 11.1726ZM14.2925 6.29259L6.82662 13.7584L8.24083 15.1726L15.7067 7.7068L14.2925 6.29259ZM5.96668 14.2899L3.71912 15.0391L4.35158 16.9365L6.59914 16.1873L5.96668 14.2899ZM6.82661 13.7584C6.60853 13.9765 6.56433 14.0176 6.52144 14.0499L7.72592 15.6466C7.90547 15.5111 8.06049 15.353 8.24083 15.1726L6.82661 13.7584ZM6.59914 16.1873C6.84109 16.1066 7.05187 16.0387 7.25331 15.9387L6.3639 14.1473C6.31578 14.1712 6.25928 14.1924 5.96668 14.2899L6.59914 16.1873ZM6.52144 14.05C6.47205 14.0872 6.41931 14.1198 6.3639 14.1473L7.25331 15.9387C7.41954 15.8561 7.57776 15.7584 7.72592 15.6466L6.52144 14.05ZM14.2925 3.7068C14.8948 4.30915 15.0127 4.4457 15.0672 4.55568L16.8592 3.66765C16.6222 3.18944 16.1948 2.78075 15.7067 2.29259L14.2925 3.7068ZM15.7067 7.7068C16.1948 7.21865 16.6222 6.80995 16.8592 6.33174L15.0672 5.44371C15.0127 5.55369 14.8948 5.69025 14.2925 6.29259L15.7067 7.7068ZM15.0672 4.55568C15.2058 4.83546 15.2058 5.16394 15.0672 5.44371L16.8592 6.33174C17.2751 5.49241 17.2751 4.50698 16.8592 3.66765L15.0672 4.55568ZM11.7067 3.7068C12.309 3.10447 12.4456 2.98661 12.5555 2.93211L11.6675 1.14007C11.1893 1.37704 10.7806 1.80444 10.2925 2.29259L11.7067 3.7068ZM15.7067 2.29259C15.2185 1.80443 14.8098 1.37704 14.3316 1.14007L13.4436 2.93211C13.5536 2.98661 13.6901 3.10446 14.2925 3.7068L15.7067 2.29259ZM12.5555 2.93211C12.8353 2.79346 13.1638 2.79346 13.4436 2.93211L14.3316 1.14007C13.4923 0.724144 12.5068 0.724144 11.6675 1.14007L12.5555 2.93211ZM3.70936 12.0326C3.80689 11.74 3.82806 11.6835 3.85195 11.6354L2.06059 10.7459C1.96058 10.9474 1.89265 11.1582 1.81199 11.4001L3.70936 12.0326ZM2.82662 9.75843C2.64628 9.93877 2.48813 10.0938 2.35268 10.2733L3.94931 11.4778C3.98167 11.4349 4.02274 11.3907 4.24083 11.1726L2.82662 9.75843ZM3.85195 11.6354C3.87946 11.5799 3.91205 11.5272 3.94931 11.4778L2.35268 10.2733C2.24091 10.4215 2.14313 10.5797 2.06059 10.7459L3.85195 11.6354ZM1.06281 13.6477C0.906261 14.1173 0.765948 14.5351 0.686077 14.875C0.609691 15.2001 0.537523 15.6434 0.69689 16.0903L2.5807 15.4186C2.62422 15.5406 2.57555 15.5772 2.63305 15.3325C2.68706 15.1026 2.79102 14.7876 2.96017 14.2801L1.06281 13.6477ZM3.71912 15.0391C3.21166 15.2082 2.89662 15.3122 2.66675 15.3662C2.42205 15.4237 2.45867 15.375 2.5807 15.4186L1.90894 17.3024C2.35585 17.4617 2.79919 17.3896 3.12426 17.3132C3.46416 17.2333 3.88194 17.093 4.35158 16.9365L3.71912 15.0391ZM0.69689 16.0903C0.898527 16.6558 1.34349 17.1007 1.90894 17.3024L2.5807 15.4186L2.5807 15.4186L0.69689 16.0903ZM9.29245 4.70684L13.2924 8.70684L14.7067 7.29262L10.7067 3.29262L9.29245 4.70684ZM8.99956 17.9997H15.9996V15.9997H8.99956V17.9997Z" fill="#A4A3A3" />
                                                    </svg>
                                                </a>
                                                <form action="" method="post" class="delete-form">
                                                    <input type="hidden" name="spaceId" value="<?php echo $spaceid; ?>">
                                                    <button type="submit" name="delete" class="small-btn delete-btn" onclick="return confirm('Delete this listing?');"><svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7 8C7 7.44772 6.55228 7 6 7C5.44772 7 5 7.44772 5 8H7ZM5 16C5 16.5523 5.44772 17 6 17C6.55228 17 7 16.5523 7 16H5ZM11 8C11 7.44772 10.5523 7 10 7C9.44771 7 9 7.44772 9 8H11ZM9 16C9 16.5523 9.44771 17 10 17C10.5523 17 11 16.5523 11 16H9ZM3.09202 18.782L3.54601 17.891H3.54601L3.09202 18.782ZM2.21799 17.908L3.10899 17.454L3.10899 17.454L2.21799 17.908ZM13.782 17.908L12.891 17.454V17.454L13.782 17.908ZM12.908 18.782L12.454 17.891H12.454L12.908 18.782ZM1 4C0.447715 4 0 4.44771 0 5C0 5.55228 0.447715 6 1 6V4ZM15 6C15.5523 6 16 5.55228 16 5C16 4.44771 15.5523 4 15 4V6ZM3.5 5C3.5 5.55228 3.94772 6 4.5 6C5.05228 6 5.5 5.55228 5.5 5H3.5ZM10.5 5C10.5 5.55228 10.9477 6 11.5 6C12.0523 6 12.5 5.55228 12.5 5H10.5ZM5 8V16H7V8H5ZM9 8V16H11V8H9ZM13 5V15.8H15V5H13ZM10.8 18H5.2V20H10.8V18ZM1 5V15.8H3V5H1ZM5.2 18C4.62345 18 4.25117 17.9992 3.96784 17.9761C3.69617 17.9539 3.59545 17.9162 3.54601 17.891L2.63803 19.673C3.01641 19.8658 3.40963 19.9371 3.80497 19.9694C4.18864 20.0008 4.65645 20 5.2 20V18ZM1 15.8C1 16.3436 0.999222 16.8114 1.03057 17.195C1.06287 17.5904 1.13419 17.9836 1.32698 18.362L3.10899 17.454C3.0838 17.4045 3.04612 17.3038 3.02393 17.0322C3.00078 16.7488 3 16.3766 3 15.8H1ZM3.54601 17.891C3.35785 17.7951 3.20487 17.6422 3.10899 17.454L1.32698 18.362C1.6146 18.9265 2.07354 19.3854 2.63803 19.673L3.54601 17.891ZM13 15.8C13 16.3766 12.9992 16.7488 12.9761 17.0322C12.9539 17.3038 12.9162 17.4045 12.891 17.454L14.673 18.362C14.8658 17.9836 14.9371 17.5904 14.9694 17.195C15.0008 16.8114 15 16.3436 15 15.8H13ZM10.8 20C11.3436 20 11.8114 20.0008 12.195 19.9694C12.5904 19.9371 12.9836 19.8658 13.362 19.673L12.454 17.891C12.4045 17.9162 12.3038 17.9539 12.0322 17.9761C11.7488 17.9992 11.3766 18 10.8 18V20ZM12.891 17.454C12.7951 17.6422 12.6422 17.7951 12.454 17.891L13.362 19.673C13.9265 19.3854 14.3854 18.9265 14.673 18.362L12.891 17.454ZM1 6H2V4H1V6ZM2 6H14V4H2V6ZM14 6H15V4H14V6ZM5.5 4.2C5.5 3.06743 6.53305 2 8 2V0C5.60095 0 3.5 1.79795 3.5 4.2H5.5ZM8 2C9.46695 2 10.5 3.06743 10.5 4.2H12.5C12.5 1.79795 10.399 0 8 0V2ZM3.5 4.2V5H5.5V4.2H3.5ZM10.5 4.2V5H12.5V4.2H10.5Z" fill="#A4A3A3" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <img class="listing-image" src="path/to/default/image.jpg" height="200" alt="Default Image">
                                    <?php endif; ?>
                                    <p class="info">
                                        <?php
                                        // Split the string into words
                                        $words = explode(' ', $spaceName);

                                        // Extract the first three words
                                        $firstThreeWords = implode(' ', array_slice($words, 0, 3));

                                        // Output the first three words
                                        echo $firstThreeWords;
                                        ?>
                                    </p>
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

                                    <p class="info">
                                        <?php
                                                                            // Split the string into words
                                                                            $words = explode(' ', $spaceName);

                                                                            // Extract the first three words
                                                                            $firstThreeWords = implode(' ', array_slice($words, 0, 3));

                                                                            // Output the first three words
                                                                            echo $firstThreeWords;
                                        ?>


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
                    <div class="active" style="display: none;">
    <?php
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
                <?php if ($activeSpaceImg !== "N/A") : ?>
                    <?php
                    // Handle multiple images
                    $imagePaths = explode(',', $activeSpaceImg);
                    ?>
                    <div class="image-container">
                        <img class="listing-image" src="http://spacekraft.in/<?php echo $imagePaths[0]; ?>" height="200" alt="">
                        <div class="buttons-container">
                            <a href="update_space.php?spaceId=<?php echo $activeSpaceId; ?>" class="small-btn update-btn"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.01149 13.9639L2.96017 14.2801H2.96017L2.01149 13.9639ZM2.76068 11.7163L1.81199 11.4001H1.81199L2.76068 11.7163ZM3.53372 10.4655L4.24083 11.1726L4.24083 11.1726L3.53372 10.4655ZM10.9996 2.9997L10.2925 2.29259V2.29259L10.9996 2.9997ZM14.9996 6.9997L15.7067 7.7068H15.7067L14.9996 6.9997ZM7.53372 14.4655L6.82662 13.7584L6.82661 13.7584L7.53372 14.4655ZM6.28291 15.2386L6.59914 16.1873H6.59914L6.28291 15.2386ZM4.03535 15.9878L4.35158 16.9365L4.35158 16.9365L4.03535 15.9878ZM7.12368 14.8483L6.52144 14.0499L6.52144 14.05L7.12368 14.8483ZM6.80861 15.043L6.3639 14.1473L6.80861 15.043ZM15.9632 4.11167L15.0672 4.55568V4.55568L15.9632 4.11167ZM15.9632 5.88773L15.0672 5.44371V5.44371L15.9632 5.88773ZM12.1115 2.03609L12.5555 2.93211V2.93211L12.1115 2.03609ZM13.8876 2.03609L13.4436 2.93211V2.93211L13.8876 2.03609ZM2.95627 11.1907L3.85195 11.6354L3.85195 11.6354L2.95627 11.1907ZM3.151 10.8756L2.35268 10.2733L2.35268 10.2733L3.151 10.8756ZM1.6388 15.7544L0.69689 16.0903L1.6388 15.7544ZM2.24482 16.3605L1.90894 17.3024L1.90894 17.3024L2.24482 16.3605ZM10.7067 3.29262C10.3161 2.9021 9.68297 2.9021 9.29245 3.29262C8.90192 3.68315 8.90192 4.31631 9.29245 4.70684L10.7067 3.29262ZM13.2924 8.70684C13.683 9.09736 14.3161 9.09736 14.7067 8.70684C15.0972 8.31631 15.0972 7.68315 14.7067 7.29262L13.2924 8.70684ZM8.99956 15.9997C8.44728 15.9997 7.99956 16.4474 7.99956 16.9997C7.99956 17.552 8.44728 17.9997 8.99956 17.9997V15.9997ZM15.9996 17.9997C16.5518 17.9997 16.9996 17.552 16.9996 16.9997C16.9996 16.4474 16.5518 15.9997 15.9996 15.9997V17.9997ZM2.96017 14.2801L3.70936 12.0326L1.81199 11.4001L1.06281 13.6477L2.96017 14.2801ZM4.24083 11.1726L11.7067 3.7068L10.2925 2.29259L2.82662 9.75843L4.24083 11.1726ZM14.2925 6.29259L6.82662 13.7584L8.24083 15.1726L15.7067 7.7068L14.2925 6.29259ZM5.96668 14.2899L3.71912 15.0391L4.35158 16.9365L6.59914 16.1873L5.96668 14.2899ZM6.82661 13.7584C6.60853 13.9765 6.56433 14.0176 6.52144 14.0499L7.72592 15.6466C7.90547 15.5111 8.06049 15.353 8.24083 15.1726L6.82661 13.7584ZM6.59914 16.1873C6.84109 16.1066 7.05187 16.0387 7.25331 15.9387L6.3639 14.1473C6.31578 14.1712 6.25928 14.1924 5.96668 14.2899L6.59914 16.1873ZM6.52144 14.05C6.47205 14.0872 6.41931 14.1198 6.3639 14.1473L7.25331 15.9387C7.41954 15.8561 7.57776 15.7584 7.72592 15.6466L6.52144 14.05ZM14.2925 3.7068C14.8948 4.30915 15.0127 4.4457 15.0672 4.55568L16.8592 3.66765C16.6222 3.18944 16.1948 2.78075 15.7067 2.29259L14.2925 3.7068ZM15.7067 7.7068C16.1948 7.21865 16.6222 6.80995 16.8592 6.33174L15.0672 5.44371C15.0127 5.55369 14.8948 5.69025 14.2925 6.29259L15.7067 7.7068ZM15.0672 4.55568C15.2058 4.83546 15.2058 5.16394 15.0672 5.44371L16.8592 6.33174C17.2751 5.49241 17.2751 4.50698 16.8592 3.66765L15.0672 4.55568ZM11.7067 3.7068C12.309 3.10447 12.4456 2.98661 12.5555 2.93211L11.6675 1.14007C11.1893 1.37704 10.7806 1.80444 10.2925 2.29259L11.7067 3.7068ZM15.7067 2.29259C15.2185 1.80443 14.8098 1.37704 14.3316 1.14007L13.4436 2.93211C13.5536 2.98661 13.6901 3.10446 14.2925 3.7068L15.7067 2.29259ZM12.5555 2.93211C12.8353 2.79346 13.1638 2.79346 13.4436 2.93211L14.3316 1.14007C13.4923 0.724144 12.5068 0.724144 11.6675 1.14007L12.5555 2.93211ZM3.70936 12.0326C3.80689 11.74 3.82806 11.6835 3.85195 11.6354L2.06059 10.7459C1.96058 10.9474 1.89265 11.1582 1.81199 11.4001L3.70936 12.0326ZM2.82662 9.75843C2.64628 9.93877 2.48813 10.0938 2.35268 10.2733L3.94931 11.4778C3.98167 11.4349 4.02274 11.3907 4.24083 11.1726L2.82662 9.75843ZM3.85195 11.6354C3.87946 11.5799 3.91205 11.5272 3.94931 11.4778L2.35268 10.2733C2.24091 10.4215 2.14313 10.5797 2.06059 10.7459L3.85195 11.6354ZM1.06281 13.6477C0.906261 14.1173 0.765948 14.5351 0.686077 14.875C0.609691 15.2001 0.537523 15.6434 0.69689 16.0903L2.5807 15.4186C2.62422 15.5406 2.57555 15.5772 2.63305 15.3325C2.68706 15.1026 2.79102 14.7876 2.96017 14.2801L1.06281 13.6477ZM3.71912 15.0391C3.21166 15.2082 2.89662 15.3122 2.66675 15.3662C2.42205 15.4237 2.45867 15.375 2.5807 15.4186L1.90894 17.3024C2.35585 17.4617 2.79919 17.3896 3.12426 17.3132C3.46416 17.2333 3.88194 17.093 4.35158 16.9365L3.71912 15.0391ZM0.69689 16.0903C0.898527 16.6558 1.34349 17.1007 1.90894 17.3024L2.5807 15.4186L2.5807 15.4186L0.69689 16.0903ZM9.29245 4.70684L13.2924 8.70684L14.7067 7.29262L10.7067 3.29262L9.29245 4.70684ZM8.99956 17.9997H15.9996V15.9997H8.99956V17.9997Z" fill="#A4A3A3" />
                                                    </svg></a>
                            <form action="" method="post" class="delete-form">
                                <input type="hidden" name="spaceId" value="<?php echo $activeSpaceId; ?>">
                                <button type="submit" name="delete" class="small-btn delete-btn" onclick="return confirm('Delete this listing?');"><svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7 8C7 7.44772 6.55228 7 6 7C5.44772 7 5 7.44772 5 8H7ZM5 16C5 16.5523 5.44772 17 6 17C6.55228 17 7 16.5523 7 16H5ZM11 8C11 7.44772 10.5523 7 10 7C9.44771 7 9 7.44772 9 8H11ZM9 16C9 16.5523 9.44771 17 10 17C10.5523 17 11 16.5523 11 16H9ZM3.09202 18.782L3.54601 17.891H3.54601L3.09202 18.782ZM2.21799 17.908L3.10899 17.454L3.10899 17.454L2.21799 17.908ZM13.782 17.908L12.891 17.454V17.454L13.782 17.908ZM12.908 18.782L12.454 17.891H12.454L12.908 18.782ZM1 4C0.447715 4 0 4.44771 0 5C0 5.55228 0.447715 6 1 6V4ZM15 6C15.5523 6 16 5.55228 16 5C16 4.44771 15.5523 4 15 4V6ZM3.5 5C3.5 5.55228 3.94772 6 4.5 6C5.05228 6 5.5 5.55228 5.5 5H3.5ZM10.5 5C10.5 5.55228 10.9477 6 11.5 6C12.0523 6 12.5 5.55228 12.5 5H10.5ZM5 8V16H7V8H5ZM9 8V16H11V8H9ZM13 5V15.8H15V5H13ZM10.8 18H5.2V20H10.8V18ZM1 5V15.8H3V5H1ZM5.2 18C4.62345 18 4.25117 17.9992 3.96784 17.9761C3.69617 17.9539 3.59545 17.9162 3.54601 17.891L2.63803 19.673C3.01641 19.8658 3.40963 19.9371 3.80497 19.9694C4.18864 20.0008 4.65645 20 5.2 20V18ZM1 15.8C1 16.3436 0.999222 16.8114 1.03057 17.195C1.06287 17.5904 1.13419 17.9836 1.32698 18.362L3.10899 17.454C3.0838 17.4045 3.04612 17.3038 3.02393 17.0322C3.00078 16.7488 3 16.3766 3 15.8H1ZM3.54601 17.891C3.35785 17.7951 3.20487 17.6422 3.10899 17.454L1.32698 18.362C1.6146 18.9265 2.07354 19.3854 2.63803 19.673L3.54601 17.891ZM13 15.8C13 16.3766 12.9992 16.7488 12.9761 17.0322C12.9539 17.3038 12.9162 17.4045 12.891 17.454L14.673 18.362C14.8658 17.9836 14.9371 17.5904 14.9694 17.195C15.0008 16.8114 15 16.3436 15 15.8H13ZM10.8 20C11.3436 20 11.8114 20.0008 12.195 19.9694C12.5904 19.9371 12.9836 19.8658 13.362 19.673L12.454 17.891C12.4045 17.9162 12.3038 17.9539 12.0322 17.9761C11.7488 17.9992 11.3766 18 10.8 18V20ZM12.891 17.454C12.7951 17.6422 12.6422 17.7951 12.454 17.891L13.362 19.673C13.9265 19.3854 14.3854 18.9265 14.673 18.362L12.891 17.454ZM1 6H2V4H1V6ZM2 6H14V4H2V6ZM14 6H15V4H14V6ZM5.5 4.2C5.5 3.06743 6.53305 2 8 2V0C5.60095 0 3.5 1.79795 3.5 4.2H5.5ZM8 2C9.46695 2 10.5 3.06743 10.5 4.2H12.5C12.5 1.79795 10.399 0 8 0V2ZM3.5 4.2V5H5.5V4.2H3.5ZM10.5 4.2V5H12.5V4.2H10.5Z" fill="#A4A3A3" />
                                                        </svg></button>
                            </form>
                        </div>
                    </div>
                <?php else : ?>
                    <img class="listing-image" src="<?php echo $defaultActiveImagePath; ?>" height="200" alt="Default Image">
                <?php endif; ?>
                <p class="info">
                    <?php
                    // Split the string into words
                    $words = explode(' ', $activeSpaceName);

                    // Extract the first three words
                    $firstThreeWords = implode(' ', array_slice($words, 0, 3));

                    // Output the first three words
                    echo $firstThreeWords;
                    ?>
                </p>
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
                                    <p class="info">
                                        <?php
                                                                        // Split the string into words
                                                                        $words = explode(' ', $adminSpaceName);

                                                                        // Extract the first three words
                                                                        $firstThreeWords = implode(' ', array_slice($words, 0, 3));

                                                                        // Output the first three words
                                                                        echo $firstThreeWords;
                                        ?>




                                        <!-- Add a button to view details -->
                                    
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

        document.addEventListener("DOMContentLoaded", function() {
            const menu = document.querySelector('.menu');
            const toggleMenuBtn = document.getElementById('toggleMenuBtn');
            const closeMenuBtn = document.getElementById('closeMenuBtn');

            toggleMenuBtn.addEventListener('click', function() {
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