<<?php
    // Include your database connection file
    @include 'connect.php';
    if (isset($_COOKIE['user_id'])) {
        $user_id = $_COOKIE['user_id'];
    } else {
        $user_id = '';
    }
    // Start or resume the session
    session_start();

    // Process the form data for step 2
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Process List1 Form data
        $spaceArea = isset($_POST["space_area"]) ? $_POST["space_area"] : "";
        $spaceDes = isset($_POST["space_des"]) ? $_POST["space_des"] : "";

        $spaceImages = array();
        $imageUploaded = false; // Flag to check if at least one image is uploaded

        for ($i = 1; $i <= 4; $i++) {
            $fileKey = "space_img" . $i;

            if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]["error"] == UPLOAD_ERR_OK) {
                $spaceImg = $_FILES[$fileKey]["name"];

                // Generate a unique identifier for each image
                $imageIdentifier = uniqid();
                $target_dir = "uploaded_img/";
                $target_file = $target_dir . $imageIdentifier . "_" . basename($_FILES[$fileKey]["name"]);

                if (move_uploaded_file($_FILES[$fileKey]["tmp_name"], $target_file)) {
                    echo "File uploaded successfully";
                    // Set $spaceImg to the relative path
                    $spaceImages[] = $target_file;
                    $imageUploaded = true; // Set flag to true as at least one image is uploaded
                } else {
                    echo "Error uploading file";
                    // Handle the error (you might want to redirect or display an error message)
                    exit();
                }
            }
        }

        // If at least one image is uploaded, use the uploaded images; otherwise, use default images
        if ($imageUploaded) {
            // Convert the array of image paths to a comma-separated string
            $imagePaths = implode(',', $spaceImages);
        } else {
            // No image uploaded, determine default image based on space type
            $spaceType = $_SESSION['spaceType'];

            switch ($spaceType) {
                case 'stall':
                    $defaultImage = "path/to/Stall.svg";
                    break;
                case 'storefront':
                    $defaultImage = "path/to/Storefront.svg";
                    break;
                case 'Mobile Van':
                    $defaultImage = "path/to/mobile van.svg";
                    break;
                case 'shopping center':
                    $defaultImage = "path/to/Shopping.svg";
                    break;

                case 'Kiosk':
                    $defaultImage = "path/to/Kiosk.svg";
                    break;
                case 'Restaurant':
                    $defaultImage = "path/to/Restaurant.svg";
                    break;
                case 'Lifestyle Center':
                    $defaultImage = "path/to/lifestyle.svg";
                    break;
                case 'Banquet':
                    $defaultImage = "path/to/Banquet.svg";
                    break;
                default:
                    // Default image for unknown space type
                    $defaultImage = "path/to/default_image.jpg";
                    break;
            }

            $defaultImageName = basename($defaultImage);
            $target_dir = "uploaded_img/";
            $target_file = $target_dir . $defaultImageName;

            // Copy the default image to the uploaded_img directory
            copy($defaultImage, $target_file);

            // Set $spaceImg to the relative path
            $imagePaths = $target_file;
        }

        $amenities = isset($_POST["amenities"]) ? $_POST["amenities"] : array();

        // Convert the array of amenities to a comma-separated string
        $amenitiesString = implode(',', $amenities);

        // Continue with the rest of your code...
        // Retrieve data stored in session from previous forms
        $spaceName = $_SESSION['spaceName'];
        $spaceType = $_SESSION['spaceType'];
        $spaceAddress1 = $_SESSION['spaceAddress1'];
        $spaceAddress2 = $_SESSION['spaceAddress2'];
        $city = $_SESSION['city'];
        $pinCode = $_SESSION['pinCode'];
        $avail = $_SESSION['avail'];
        $avail_time = $_SESSION['avail_time'];

        // Store these values in session for later use in List2 Form
        $_SESSION['spaceArea'] = $spaceArea;
        $_SESSION['spaceDes'] = $spaceDes;
        $_SESSION['spaceImg'] = $imagePaths;
        // Store the comma-separated string
        $_SESSION['Amenities'] = $amenitiesString;

        // Set the next step
        header('Location: step3.php');
        exit();
    }
    ?> <!-- Your HTML content for step 2 goes here -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List a Space - Step 2</title>
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
                <div class="step active1 enabled">
                    <h3>1</h3>

                </div>


                <div class="arrow green"></div>

                <div class="step enabled">
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
                <div>
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
            <div class="heading-small">Space showcase</div>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="space_area">Space Area <span class="red">*</span> (in Sq.ft)</label>

                <input type="text" name="space_area" id="space_area" placeholder="Enter Space Area in Sq.ft" required value="<?php echo isset($_SESSION['spaceArea']) ? $_SESSION['spaceArea'] : ''; ?>">

                <label for="space_des">Description<span class="red">*</span></label>
                <input type="text" name="space_des" placeholder="Enter Description" id="space_des" required value="<?php echo isset($_SESSION['spaceDes']) ? $_SESSION['spaceDes'] : ''; ?>">
                <h5 class="right">max of 150 words</h5>

                <!-- Add the four image upload fields -->
                <label for="pace_img">Space Images</label>
<!-- Add this code to your form -->
<?php for ($i = 1; $i <= 4; $i++) : ?>
    <label for="space_img<?php echo $i; ?>" class="file-label">Upload Image <?php echo $i; ?></label>
    <input type="file" name="space_img<?php echo $i; ?>" id="space_img<?php echo $i; ?>" class="file-input" accept=".jpg, .jpeg, .gif, .png" onchange="validateFile(this, <?php echo $i; ?>)">
    <div id="file-name<?php echo $i; ?>" class="file-name"><?php echo isset($_SESSION['spaceImages'][$i - 1]) ? $_SESSION['spaceImages'][$i - 1] : ''; ?></div>
<?php endfor; ?><br>

<?php
// PHP code to handle file upload and store file names in session
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    for ($i = 1; $i <= 4; $i++) {
        $fileKey = 'space_img' . $i;
        if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] === 0) {
            $targetDir = 'uploads/';
            $targetFile = $targetDir . basename($_FILES[$fileKey]['name']);
            if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $targetFile)) {
                $_SESSION['spaceImages'][$i - 1] = $_FILES[$fileKey]['name'];
            }
        }
    }
}
?>
<br>
                <p class="small" style="font-size: small;"> (Accepted formats are .jpg, .gif , .png and
                    Maximum size allowed 10 MB)</p>
                <label for="Amenities">Amenities</label>
                <div class="amenities-container" id="Amenities">
                    <div class="amenities-options">
                        <input type="checkbox" class="amenity-checkbox" id="airConditioning" name="amenities[]" value="Air Conditioning">
                        <label for="airConditioning" class="amenity-label">Air Conditioning</label>

                        <input type="checkbox" class="amenity-checkbox" id="multipleRooms" name="amenities[]" value="CCTV">
                        <label for="multipleRooms" class="amenity-label">CCTV</label>
                        
                        <input type="checkbox" class="amenity-checkbox" id="chairs" name="amenities[]" value="Chairs">
                        <label for="chairs" class="amenity-label">Chairs</label>

                        <input type="checkbox" class="amenity-checkbox" id="electricity" name="amenities[]" value="Electricity">
                        <label for="electricity" class="amenity-label">Electricity</label>

                        <input type="checkbox" class="amenity-checkbox" id="elevator" name="amenities[]" value="Elevator">
                        <label for="elevator" class="amenity-label">Elevator</label>

                        <input type="checkbox" class="amenity-checkbox" id="parking" name="amenities[]" value="Parking">
                        <label for="parking" class="amenity-label">Parking</label>

                        <input type="checkbox" class="amenity-checkbox" id="garden" name="amenities[]" value="Garden">
                        <label for="garden" class="amenity-label">Garden</label>

                        <input type="checkbox" class="amenity-checkbox" id="soundproof" name="amenities[]" value="Soundproof">
                        <label for="soundproof" class="amenity-label">Soundproof</label>

                        <input type="checkbox" class="amenity-checkbox" id="kitchen" name="amenities[]" value="Kitchen">
                        <label for="kitchen" class="amenity-label">Kitchen</label>

                        <input type="checkbox" class="amenity-checkbox" id="furniture" name="amenities[]" value="Furniture">
                        <label for="furniture" class="amenity-label">Furniture</label>

                        <input type="checkbox" class="amenity-checkbox" id="bathrooms" name="amenities[]" value="RestRooms">
                        <label for="bathrooms" class="amenity-label">RestRooms</label>

                        <input type="checkbox" class="amenity-checkbox" id="securitySystem" name="amenities[]" value="Security System">
                        <label for="securitySystem" class="amenity-label">Security System</label>

                        <input type="checkbox" class="amenity-checkbox" id="terrace" name="amenities[]" value="Terrace">
                        <label for="terrace" class="amenity-label">Terrace</label>
                        <input type="checkbox" class="amenity-checkbox" id="Table" name="amenities[]" value="Table">
                <label for="Table" class="amenity-label">Table</label>

                        <input type="checkbox" class="amenity-checkbox" id="waterAccess" name="amenities[]" value="Water Access">
                        <label for="waterAccess" class="amenity-label">Water Access</label>

                        

                        
                    </div>

                    <!-- Add other form fields for step 2 -->
                    <br>
                    <span class="space">Mandatory fields are marked with &nbsp;<span class="red">*</span></span>

                     <div class="button-container">
                        <button type="button" class="back-btn" onclick="goToStep1()">Back</button>
                        <button type="submit" class="next-btn">Next</button>
                    </div>
            </form>
        </div>

        <script>
            function goToStep1() {

                window.location.href = 'step1.php'; // Replace 'step1.php' with the actual URL of step 1
            }
        </script>


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
            function displayFileName(input) {
                const fileName = input.files[0].name;
                const fileId = input.id.replace('space_img', '');
                const fileNameElement = document.getElementById('file-name' + fileId);
                fileNameElement.textContent = 'File Name: ' + fileName;
            }
        </script>
        <script>
function validateFile(input, fileNumber) {
    const allowedFormats = ["image/jpeg", "image/jpg", "image/gif", "image/png"];
    const maxFileSize = 10 * 1024 * 1024; // 10 MB in bytes

    const file = input.files[0];

    // Check if file format is allowed
    if (!allowedFormats.includes(file.type.toLowerCase())) {
        alert("Please select a valid image format (.jpg, .jpeg, .gif, .png).");
        input.value = ""; // Clear the file input
        return;
    }

    // Check if file size exceeds the limit
    if (file.size > maxFileSize) {
        alert("File size exceeds the maximum allowed (10 MB).");
        input.value = ""; // Clear the file input
        return;
    }

    // Display the file name
    document.getElementById(file-name${fileNumber}).innerText = File: ${file.name};
}
</script>
       
    </body>

    </html>

    <?php
    // Include the common HTML footer

    ?>