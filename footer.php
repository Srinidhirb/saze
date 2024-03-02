<?php
// Connection to your MySQL database
include 'connect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = ""; // Initialize an empty message variable

// Process the submitted email
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    // Insert the email into the database using prepared statement
    $stmt = $conn->prepare("INSERT INTO email (email) VALUES (?)");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        $message = "Thanks for submitting!";
    } else {
        $message = "Sorry, something went wrong. Please try again later.";
        // Log the detailed error for debugging purposes:
        error_log("Error: " . $stmt->error);
    }

    $stmt->close();
}

$conn->close();
?>


<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="foter">
    <footer class="footer">
        <div class="footer__addr">



            <h1 class="footer__logo"> <a href="index.php" class="logo"><img src="SpaceKraft Logo 1.svg" alt="SpaceKraft Logo"></a></h1>

            <p>SpaceKraft connects brands, e-commerce 
                enterprise, and artists seeking short-term
                rentals and space owners, enabling the
                creation of pop-up stores and events on a
                national scale</p>
        </div>

        <ul class="footer__nav">
            <li class="nav__item">
                <p class="nav__title">Helpful Links</p>

                <ul class="nav__ul">
                    <li>
                        <a href="terms.php"> > Terms of Use </a>
                    </li>

                    <li>
                        <a href="privacy.php"> > Privacy Policy</a>
                    </li>

                    <li>
                        <a href="res.php"> > Resources</a>
                    </li>
                </ul>
            </li>

            <li class="nav__item">
                <p class="nav__title">Contact Info </p>

                <ul class="nav__ul">
                    <li>
                        <i class="fa-solid fa-envelope"> </i> &nbsp;&nbsp;Mail : info@spacekraft.in
                    </li>

                   
                    <li>
                        <i class="fa-solid fa-phone"></i>&nbsp;&nbsp; Phone : +91  9740854665
                    </li>

                    <li class="icons">
                        <a href="https://www.facebook.com/SpaceKraft.rentals?mibextid=ZbWKwL" target="_blank"><img src="facebook.svg" alt="Instagram Icon"></a>
                        <a href="https://instagram.com/spacekraft.rentals?igshid=OGQ5ZDc2ODk2ZA" target="_blank"><img src="instagram.svg" alt="Instagram Icon"></a>
                        <a href="https://www.linkedin.com/company/spacekraft-rentals/" target="_blank"><img src="linkedin-original.svg" alt="Instagram Icon"></a>
                    </li>
                </ul>
            </li>
            <li class="nav__item">
                <p class="nav__title">Newsletter </p>
                <form id="newsletterForm" method="post" style='margin-left: 0;'>
                    <ul class="nav__ul">
                        <li>Enter Your mail</li>
                        <li>
                            <input style="width: 169px;
height: 23px;" class="mail" type="email" name="email" required>
                        </li>
                        <li>
                            <button class="sub_button" type="submit">Submit</button>
                        </li>
                    </ul>
                </form>
                <?php
                if (!empty($message)) {
                    echo "<div class='message'>$message</div>";
                }
                ?>
            </li>
        </ul>
    </footer>
</div>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
</script>
<!-- Include your scripts or other body elements here -->