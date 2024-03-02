<?php
@include 'connect.php';
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}
// Check if spaceId is provided in the POST data
if (isset($_POST['spaceId'])) {
    $spaceId = $_POST['spaceId'];

    // Retrieve details for the specified spaceId
    $sql = "SELECT * FROM combined_list WHERE id = $spaceId";
    $result = $conn->query($sql);

    // Display details
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $spaceImg = $row['images'];
        $spaceName = $row['SpaceName'];
        $spaceType = $row['SpaceType'];
        $projectType = $row['projectType'];
        $spaceAddress1 = $row['SpaceAddress1'];
        $spaceAddress2 = $row['SpaceAddress2'];
        $city = $row['City'];
        $pinCode = $row['PinCode'];


        $spaceArea = $row['SpaceArea'];
        $spaceDes = $row['Description'];

        $amenities = explode(',', $row['Amenities']);
        $selectedYear = $row['selected_year'];
        $selectedMonth = $row['selected_month'];
        $selectedDates = explode(' ,', $row['selected_dates']);
        $minDuration = $row['min_duration'];
        $minDurationUnit = $row['min_duration_unit'];
        $maxDuration = $row['max_duration'];
        $maxDurationUnit = $row['max_duration_unit'];
        $spaceDailyPrice = $row['DailyPrice'];
        $spaceWeeklyPrice = $row['WeeklyPrice'];
        $spaceMonthlyPrice = $row['MonthlyPrice'];
        $spaceMain = $row['Maintenance'];
        $spaceDeposit = $row['SecurityDeposit'];
?>




        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="website icon " href="Logo Icon 16_16.svg">
            <title>Space Details</title>
            <link rel="stylesheet" href="vss.php">
            <link rel="stylesheet" href="header_footer.php">


            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
            <!-- calanedar -->
            <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXVP8RTRY0"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-WXVP8RTRY0'); </script>
            <style>
                #map {
                    margin-top: 4%;
                    height: 350px;
                    width: 100%;
                    /* Set width to 100% for responsiveness */
                    max-width: 750px;
                    /* Set a maximum width if needed */
                    margin-bottom: 6%;
                }

                /* Adjustments for smaller screens */
                @media screen and (max-width: 768px) {
                    #map {
                        max-width: 100%;
                        /* Full width for smaller screens */
                    }
                }
            </style>

            <!-- Add your styling and additional content as needed -->
            <style>

            </style>
        </head>

        <body>
            <?php
            include 'header.php';
            ?>
            <div class="ind_details">
                <div class="flex">
                  
                        <!-- Slideshow container -->
                        <div class="slideshow-container">

                            <?php
                            // Check if there are images available
                            if ($spaceImg !== "N/A") {
                                // Handle multiple images
                                $imagePaths = explode(',', $spaceImg);

                                // Display each image in the slideshow
                                for ($i = 0; $i < min(4, count($imagePaths)); $i++) {
                                    echo '<div class="mySlides fade">';
                                    echo '<img class="listing-image" src="http://spacekraft.in/' . $imagePaths[$i] . '" height="200" alt="">';
                                    echo '</div>';
                                }
                            }
                            ?>

                            <!-- Next and previous buttons -->
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        </div>
          


                    <div class="details">
                        <div class="space-info">


                            <div class="row">

                                <div class="address">
                                <i class="fas fa-map-marker-alt"></i>

                                    <p style="margin-left: 2%;" ><?php
                            // Combine the address components
                            $combinedAddress = $spaceAddress1 . ', ' . $spaceAddress2 . ', ' . $city;
                            // Encode the address for the Google Maps URL
                            $encodedAddress = urlencode($combinedAddress);
                            // Generate the Google Maps link
                            $mapsLink = "https://www.google.com/maps/search/?api=1&query={$encodedAddress}";
                            ?>
                            <br>
                            <div class="address">
                               
                                <a href="<?php echo $mapsLink; ?>" target="_blank">
                                    <p><?php echo "$spaceAddress1, $city - $pinCode"; ?></p>
                                </a>
                            </div></p>
                                </div>
                                <div class="features">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="0.075" y="0.075" width="23.85" height="23.85" rx="3.925" stroke="#CECECE" stroke-width="0.15"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M5 9H6V14H18V9H19V14H20.25C20.3881 14 20.5 14.1119 20.5 14.25V14.75C20.5 14.8881 20.3881 15 20.25 15H3.75C3.61193 15 3.5 14.8881 3.5 14.75V14.25C3.5 14.1119 3.61193 14 3.75 14H5V9ZM5 17V20H19V17H5ZM4.5 16C4.22386 16 4 16.2239 4 16.5V20.5C4 20.7761 4.22386 21 4.5 21H19.5C19.7761 21 20 20.7761 20 20.5V16.5C20 16.2239 19.7761 16 19.5 16H4.5Z" fill="#222222"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.0944 4L4.02177 6.95645C4.00739 6.9961 4 7.03805 4 7.08045V8.2755C4 8.6796 4.32373 9 4.71428 9C5.10485 9 5.42855 8.6796 5.42855 8.2755C5.42855 7.99935 5.65245 7.7755 5.92855 7.7755C6.2047 7.7755 6.42855 7.99935 6.42855 8.2755C6.42855 8.6796 6.7523 9 7.14285 9C7.5334 9 7.85715 8.6796 7.85715 8.2755C7.85715 7.99935 8.081 7.7755 8.35715 7.7755C8.6333 7.7755 8.85715 7.99935 8.85715 8.2755C8.85715 8.6796 9.1809 9 9.57145 9C9.9618 9 10.2854 8.6799 10.2857 8.2761C10.2859 8.00015 10.5097 7.7765 10.7857 7.7765C11.0617 7.7765 11.2855 8.00015 11.2857 8.2761C11.286 8.6799 11.6096 9 12 9C12.3905 9 12.7143 8.6796 12.7143 8.2755C12.7143 7.99935 12.9382 7.7755 13.2143 7.7755C13.4904 7.7755 13.7143 7.99935 13.7143 8.2755C13.7143 8.6796 14.038 9 14.4285 9C14.8189 9 15.1425 8.6799 15.1428 8.2761C15.1431 8.00015 15.3668 7.7765 15.6428 7.7765C15.9188 7.7765 16.1427 8.00015 16.1429 8.2761C16.1432 8.6799 16.4668 9 16.8571 9C17.2477 9 17.5714 8.6796 17.5714 8.2755C17.5714 7.99935 17.7953 7.7755 18.0714 7.7755C18.3475 7.7755 18.5714 7.99935 18.5714 8.2755C18.5714 8.6796 18.8952 9 19.2857 9C19.6763 9 20 8.6796 20 8.2755V7.08045C20 7.03805 19.9926 6.9961 19.9783 6.95645L18.9056 4H5.0944ZM18.0714 9.4928C17.7616 9.80575 17.3328 10 16.8571 10C16.3814 10 15.9527 9.80575 15.6428 9.4928C15.3331 9.80575 14.9043 10 14.4285 10C13.9529 10 13.524 9.80575 13.2143 9.4928C12.9045 9.80575 12.4757 10 12 10C11.5243 10 11.0955 9.80575 10.7857 9.4928C10.4759 9.80575 10.0471 10 9.57145 10C9.09575 10 8.6669 9.80575 8.35715 9.4928C8.04735 9.80575 7.61855 10 7.14285 10C6.6672 10 6.23835 9.80575 5.92855 9.4928C5.6188 9.80575 5.18995 10 4.71428 10C3.76357 10 3 9.22395 3 8.2755V7.08045C3 6.9219 3.02764 6.7645 3.08172 6.6154L4.17181 3.6108C4.30414 3.24605 4.65006 3 5.04095 3H18.959C19.3499 3 19.6958 3.24605 19.8282 3.6108L20.9183 6.6154C20.9724 6.7645 21 6.9219 21 7.08045V8.2755C21 9.22395 20.2364 10 19.2857 10C18.8101 10 18.3812 9.80575 18.0714 9.4928Z" fill="#222222"/>
<path d="M7 12.75C7 12.6119 7.11195 12.5 7.25 12.5H8.75C8.88805 12.5 9 12.6119 9 12.75V13.75C9 13.8881 8.88805 14 8.75 14H7.25C7.11195 14 7 13.8881 7 13.75V12.75Z" fill="#222222"/>
<path d="M8 13.25C8 13.1119 8.11195 13 8.25 13H9.75C9.88805 13 10 13.1119 10 13.25V13.75C10 13.8881 9.88805 14 9.75 14H8.25C8.11195 14 8 13.8881 8 13.75V13.25ZM12 13.25C12 13.6642 11.6642 14 11.25 14C10.8358 14 10.5 13.6642 10.5 13.25C10.5 12.8358 10.8358 12.5 11.25 12.5C11.6642 12.5 12 12.8358 12 13.25Z" fill="#222222"/>
<path d="M2.16667 0L0 2.16667V6.5L6.5 0H2.16667Z" fill="#031B64"/>
<path d="M1.92842 2.82653C1.95835 2.85645 1.97711 2.88971 1.9847 2.92631C1.9923 2.96291 1.98815 3.00112 1.97227 3.04094C1.95662 3.08053 1.929 3.12012 1.88941 3.15971C1.87191 3.1772 1.85362 3.1932 1.83451 3.2077C1.81564 3.22197 1.7963 3.23463 1.77651 3.24568C1.75671 3.25627 1.73657 3.26513 1.71608 3.27227L1.61665 3.17283C1.65117 3.15948 1.68559 3.14417 1.71988 3.12691C1.75418 3.10965 1.78399 3.08836 1.80931 3.06304C1.8268 3.04554 1.83854 3.0292 1.84452 3.01401C1.85074 2.99859 1.85223 2.98443 1.84901 2.97154C1.84579 2.95865 1.839 2.94703 1.82864 2.93667C1.81598 2.92401 1.8009 2.91745 1.78341 2.91699C1.76592 2.91653 1.74578 2.91986 1.72299 2.927C1.70043 2.93391 1.67534 2.94219 1.64772 2.95186C1.63046 2.95807 1.61101 2.96417 1.58937 2.97016C1.5675 2.97591 1.5446 2.97925 1.52066 2.98017C1.49672 2.98109 1.47256 2.97741 1.44816 2.96912C1.42376 2.96038 1.40005 2.94449 1.37703 2.92148C1.34688 2.89132 1.328 2.85864 1.32041 2.82342C1.31281 2.7882 1.31615 2.75218 1.33042 2.71535C1.34469 2.67806 1.36932 2.64192 1.40431 2.60694C1.43055 2.5807 1.45863 2.55883 1.48855 2.54134C1.51848 2.52338 1.5522 2.50716 1.58972 2.49265L1.6384 2.61039C1.60571 2.6242 1.57763 2.63778 1.55415 2.65113C1.53045 2.66425 1.50904 2.68036 1.48993 2.69947C1.47658 2.71282 1.46738 2.7264 1.46231 2.74021C1.45702 2.75379 1.45587 2.76691 1.45886 2.77957C1.46162 2.792 1.46807 2.80328 1.47819 2.81341C1.49016 2.82538 1.50374 2.83205 1.51894 2.83343C1.53413 2.83435 1.55254 2.83159 1.57418 2.82515C1.59605 2.81847 1.62263 2.80961 1.65394 2.79856C1.69192 2.78498 1.72667 2.77577 1.75821 2.77094C1.78974 2.76565 1.81943 2.76703 1.84729 2.77508C1.87491 2.78291 1.90195 2.80006 1.92842 2.82653Z" fill="white"/>
<path d="M2.35483 2.68048L2.24779 2.78751L1.83209 2.37181L1.69502 2.50888L1.60594 2.4198L1.98712 2.03863L2.0762 2.12771L1.93913 2.26478L2.35483 2.68048Z" fill="white"/>
<path d="M2.8786 2.15671L2.72185 2.07316L2.53782 2.25718L2.62137 2.41393L2.50605 2.52925L2.17736 1.84424L2.30822 1.71339L2.99392 2.04139L2.8786 2.15671ZM2.60653 2.00894L2.45254 1.92814C2.44241 1.92262 2.42929 1.91571 2.41318 1.90743C2.39707 1.89868 2.38072 1.88993 2.36415 1.88119C2.34758 1.87198 2.33342 1.86381 2.32168 1.85667C2.32882 1.86841 2.33733 1.88337 2.34723 1.90156C2.35713 1.91928 2.36645 1.9362 2.3752 1.95231C2.38395 1.96842 2.39016 1.97993 2.39384 1.98684L2.47498 2.14048L2.60653 2.00894Z" fill="white"/>
<path d="M3.05779 1.97752L2.55301 1.47274L2.66004 1.3657L3.07644 1.78209L3.28118 1.57735L3.36957 1.66574L3.05779 1.97752Z" fill="white"/>
<path d="M3.45761 1.5777L2.95283 1.07292L3.05986 0.965884L3.47625 1.38228L3.681 1.17753L3.76939 1.26592L3.45761 1.5777Z" fill="white"/>
</svg>

                                    <p style="margin-left: 4%;"><?php echo  $spaceType; ?></p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="features">
                                <i class="fas fa-expand-arrows-alt"></i>

                                    <p style="margin-left: 4%;"><?php echo   $spaceArea; ?> Sq.ft</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex">
                    <div class="flex-left">
                        <h1 class="name"><?php echo $spaceName; ?></h1>
                        <hr style='width:90%;'>
                        <div class="Amenities">
                            <h2 class="top">Availability: </h2>
                            <?php if (!empty($row['selected_dates'])) : ?>
                                <table>
                                    <tr>
                                        <th colspan="5"  class="date-symbol" ><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3 10H21M9 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.0799 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.0799 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.0799 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H15M9 5H15M9 5V4.5C9 3.67157 8.32843 3 7.5 3C6.67157 3 6 3.67157 6 4.5V5M15 5V4.5C15 3.67157 15.6716 3 16.5 3C17.3284 3 18 3.67157 18 4.5V5" stroke="#222222" stroke-width="2" stroke-linecap="round"/>
</svg>
 Dates</th>
                                    </tr>
                                    <tr>
                                        <?php
                                        $datesArray = explode(',', $row['selected_dates']);
                                        $counter = 0;
                                        foreach ($datesArray as $date) :
                                            if ($counter % 3 == 0 && $counter != 0) {
                                                echo '</tr><tr>'; // Close previous row and start a new one after every 3 entries
                                            }
                                        ?>
                                            <td class="date-box"><?php echo $date; ?></td>
                                        <?php
                                            $counter++;
                                        endforeach;
                                        ?>
                                    </tr>
                                </table>

                            <?php else : ?>
                                <p>No dates available.</p>
                            <?php endif; ?>
                        </div>

                        <hr style='width:90%;'>
                        <div class="Amenities">
                            <h2 class="top">Space Amenities:</h2>
                            <ul class="amenities-list">
                                <?php
                                // Loop through each amenity and display them
                                foreach ($amenities as $amenity) {
                                    echo "<li >$amenity</li>";
                                }
                                ?>
                                <br>
                            </ul>
                        </div>

                        <hr style='width:90%;'>
                        <div class="about">
                            <h2 class="top">About the Space:</h2>
                            <p class="bottom"><?php echo  $spaceDes; ?></p>


                        </div>


                        

                    </div>
                    <div class="price">
                        <div class="prize-cont">
                            <h2 class="h2">Estimated Prices</h2>
                            <table>
                                <?php if ($spaceDailyPrice) : ?>
                                    <tr>
                                        <th>Daily Price</th>
                                        <td>&#8377;<?php echo number_format($spaceDailyPrice); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if ($spaceWeeklyPrice) : ?>
                                    <tr>
                                        <th>Weekly Price</th>
                                        <td>&#8377;<?php echo number_format($spaceWeeklyPrice); ?></td>
                                    </tr>
                                <?php endif; ?>

                                <?php if ($spaceMonthlyPrice) : ?>
                                    <tr>
                                        <th>Monthly Price</th>
                                        <td>&#8377;<?php echo number_format($spaceMonthlyPrice); ?></td>
                                    </tr>
                                <?php endif; ?>

                                <?php if ($spaceMain) : ?>
                                    <tr>
                                        <th>Maintenance</th>
                                        <td>&#8377;<?php echo number_format($spaceMain); ?></td>
                                    </tr>
                                <?php endif; ?>

                                <?php if ($spaceDeposit) : ?>
                                    <tr>
                                        <th>Security Deposit</th>
                                        <td>&#8377;<?php echo number_format($spaceDeposit); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </table>

                            <!-- <a href="contact-owner.php"> <button style="width: 100%;" class="btn" onclick="contactOwner('<?php echo $row['user_id']; ?>')">Contact Owner</button></a> -->
                            <button class="btn" onclick="contactOwner('<?php echo $row['user_id']; ?>')">Contact Owner</button>
                        </div>
                    </div>

                </div>
            </div>
            <?php
            include 'footer.php';
            ?>


            <script>
                let slideIndex = 1;
                showSlides(slideIndex);

                // Next/previous controls
                function plusSlides(n) {
                    showSlides(slideIndex += n);
                }

                // Thumbnail image controls
                function currentSlide(n) {
                    showSlides(slideIndex = n);
                }

                function showSlides(n) {
                    let i;
                    let slides = document.getElementsByClassName("mySlides");
                    let dots = document.getElementsByClassName("dot");
                    if (n > slides.length) {
                        slideIndex = 1
                    }
                    if (n < 1) {
                        slideIndex = slides.length
                    }
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " active";
                }
            </script>
            <script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>
            <script>
                function contactOwner(userId) {
                    // Fetch contact information of the owner based on the user ID
                    console.log('Contact Owner button clicked for user ID:', userId);
                    window.location.href = 'contact-owner.php?userId=' + userId;
                }

                async function fetchContactInfo(userId) {
                    try {
                        // Use AJAX or fetch API to make a request to a server-side script
                        const response = await fetch(`get_owner_info.php?userId=${userId}`);

                        const data = await response.json();

                        // Display the contact information
                        if (data.success) {
                            alert(`Owner Name: ${data.ownerName}\nOwner Email: ${data.ownerEmail}\nOwner Number: ${data.ownerNumber}`);
                        } else {
                            alert(data.message);
                        }
                    } catch (error) {
                        console.error('Error:', error);
                    }
                }
            </script>

        </body>

        </html>
<?php
    } else {
        echo "Space not found";
    }
} else {

    header("Location:vs.php");
    exit;
}



?>