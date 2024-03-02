<?php
// Connection to your MySQL database
include 'connect.php';
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$confirmation_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $email = mysqli_real_escape_string($conn, $_POST["user_email"]);
    $message = mysqli_real_escape_string($conn, $_POST["comment"]);

    $sql = "INSERT INTO contact (first_name, last_name, email, message) VALUES ('$first_name', '$last_name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        $confirmation_message = "Thank you for contacting us!";
    } else {
        $confirmation_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon " href="Logo Icon 16_16.svg">
    <title>Contact Us</title>
    <link rel="stylesheet" href="header_footer.php">
    <!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXVP8RTRY0"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-WXVP8RTRY0'); </script>
    <style>
        .center {

            width: 546px;
            height: auto;




            margin: 60px 2px 60px 0;
            display: flex;


            flex-direction: row;
            box-shadow: 0px 4px 8px 0px #00000040;
            border-radius: 20px;

        }

        h3 {
            color: #222222;
            text-align: center;
            margin-bottom: 3%;
        }

        h1 {

            margin-bottom: 1%;
        }

        .top {
            height: 10vh;
        }

        .name {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        input {
            width: 100%;
            height: 50px;
            top: 32px;
            gap: 12px;

            border: 1px solid var(--Hover-pimary, #B8C0C2);
            border-radius: 6px;

            margin-bottom: 15%;
        }

        input[type=email] {
            width: 100%;
            border: 1px solid var(--Hover-pimary, #B8C0C2);
            height: 50px;
            margin-bottom: 3%;

        }

        textarea {
            border: 1px solid var(--Hover-pimary, #B8C0C2);
            border-radius: 6px;
            width: 100%;
            resize: none;

        }

        .first,
        .last,
        .email {
            width: 48%;
            display: flex;
            flex-direction: column;
            text-align: left;

        }

        .left {
            color: #222222;
            text-align: left;
            margin: 24px 0 0 0;
            font-size: 1rem;

        }

        .red {
            margin-left: 3px;
            color: #e62134;
        }

        .right {
            color: var(--Text-body-1, #717579);
            font-family: Lato;
            font-size: 17px;
            font-style: normal;
            font-weight: 400;
            line-height: 22px;
            margin: 0 0px 0 333px;
        }

        .btn {
            color: #fff;
            background-color: #031B64;
            padding: 17px 20px;

            text-transform: capitalize;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            width: auto;
            margin-bottom: 2%;
            text-align: center;
        }


        .btn:hover {

            background-color: #4AE9E9;
        }

        label {
            color: #222222;
            font-size: 1rem;
            font-weight: bold;
            text-align: left;
            padding-bottom: 6px;
        }

        .inp {
            margin: 44px 0px 0px 39px;
        }

        .button {
            margin: 40px 0px 20px 0px;
            width: 468px;
            height: 48px;
            top: 633px;
            left: 731px;
            padding: 12px 40px 12px 40px;
            border-radius: 8px;
            border: none;
            gap: 8px;
            background: #031B64;
            font-family: Lato;
            font-size: 18px;
            font-weight: 400;
            line-height: 22px;
            letter-spacing: 0em;

            color: #FFFFFF;

        }

        .button:hover {
            background-color: #4AE9E9;
            font-size: 18px;
            font-weight: 400;
            line-height: 22px;
            letter-spacing: 0em;
            color: #222222;
        }

        @media screen and (max-width: 960px) {

            .first,
            .last,
            .email {
                width: 100%;
            }

            input,
            input[type=email] {
                margin-bottom: 5%;
            }

            .btn {
                margin-bottom: 5%;
            }

            .center {
                margin: 48px 0px 0px;
                width: 90%;

                padding: 20px;
                display: block;

            }

            .inp {
                margin: 10px;
            }

            .left {
                margin-top: 2%;
                margin-bottom: 2%;

            }

            .right {
                text-align: end;
                margin: auto;
            }

            .name {
                flex-direction: column;
            }

            .button {
                width: auto;
            }
        }

        /* Add these styles to your existing CSS or create a new CSS file */




        .flex-box {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            width: 100%;

            justify-content: space-evenly;
        }

        .talk-to-us {
            height: auto;
            margin: 0px 0px 0px 2px;
            padding-bottom: 20px;
        }

        .talk-to-us p {
            margin: 16px 0px 0px 0px;
            font-family: Lato;
            font-size: 36px;
            font-weight: 700;
            line-height: 43px;
            letter-spacing: 0em;
            text-align: left;
        }

        .talk-to-us h2 {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 103px 0px 0px 0px;
            width: 90px;
            height: 30px;
            top: 157px;
            left: 172px;
            padding: 8px 6px 8px 6px;
            border-radius: 12px;
            gap: 8px;
            font-family: Lato;
            font-size: 14px;
            font-weight: 500;
            line-height: 17px;
            letter-spacing: 0em;
            text-align: left;
            background: #D2ECFF;

        }

        .talk-to-us h6 {
            margin: 32px 0px 0px 0px;
            font-family: Lato;
            font-size: 16px;
            font-weight: 500;
            line-height: 19px;
            letter-spacing: 0em;
            text-align: left;


        }

        .ticks {
            margin: 18.5px 0px 0px 0px;
            display: flex;
            flex-direction: row;
        }

        .px {
            margin: 0px 0px 0px 10px;
            font-family: Lato;
            font-size: 16px;
            font-weight: 500;
            line-height: 19px;
            letter-spacing: 0em;
            text-align: left;

        }

        .talk-to-us h5 {
            font-family: Lato;
            font-size: 16px;
            font-weight: 500;
            line-height: 19px;
            letter-spacing: 0em;
            text-align: left;
            margin: 62px 0px 0px 0px;
        }

        @keyframes typing {
            0% {
                width: 0;
            }

           

            100% {
                width: 64%;
            }
        }

        .l-s {
            font-family: Lato;
            font-size: 24px;
            font-weight: 700;
            line-height: 29px;
            letter-spacing: 0em;
            text-align: center;
            margin: 8px 60.5px 0px;
            display: inline-block;
            overflow: hidden;
            border-right: .15em solid #031B64;
            /* Adjust the color and size of the cursor */
            white-space: nowrap;
            color: #031B64;
            /* Prevent text from wrapping */
            margin-right: .2em;
            /* Adjust the distance between text and cursor */
            animation: typing 3.5s steps(60, end) ;
            display: inline-block;
        }

        @keyframes blink-caret {

            from,
            to {
                border-color: transparent;
            }

            50% {
                border-color: #031B64;
            }
        }

        textarea {
            padding: 10px 0 0 10px;
            /* Adjust the padding value as needed */
        }

        .popup {
            display: none;
            /* Hide popup by default */
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Semi-transparent background */
            overflow: auto;
        }

        .popup-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            height: 12vh;
            max-width: 250px;
        }

        .close-popup {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-popup:hover,
        .close-popup:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .popup-buttons button {
        padding: 10px 20px;
        margin: 0 10px;
        border: none;
        background: #031B64;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .popup-buttons button:hover {
        background-color: #4AE9E9;
    }
    </style>
</head>

<body>
    <?php include 'header.php' ?>

    <div class="flex-box">
        <div class="talk-to-us">

            <h2>TALK TO US</h2>

            <p>Contact Us</p>
            <h6>Get in touch with us for ...</h6>
            <div class="ticks">
                <div><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_370_6017)">
                            <path d="M12 0C9.62663 0 7.30655 0.703788 5.33316 2.02236C3.35977 3.34094 1.8217 5.21509 0.913451 7.4078C0.00519943 9.60051 -0.232441 12.0133 0.230582 14.3411C0.693605 16.6689 1.83649 18.8071 3.51472 20.4853C5.19295 22.1635 7.33115 23.3064 9.65892 23.7694C11.9867 24.2324 14.3995 23.9948 16.5922 23.0866C18.7849 22.1783 20.6591 20.6402 21.9776 18.6668C23.2962 16.6935 24 14.3734 24 12C24 8.8174 22.7357 5.76516 20.4853 3.51472C18.2348 1.26428 15.1826 0 12 0V0ZM12 22C10.0222 22 8.08879 21.4135 6.4443 20.3147C4.79981 19.2159 3.51809 17.6541 2.76121 15.8268C2.00433 13.9996 1.8063 11.9889 2.19215 10.0491C2.578 8.10929 3.53041 6.32746 4.92894 4.92893C6.32746 3.53041 8.10929 2.578 10.0491 2.19215C11.9889 1.8063 13.9996 2.00433 15.8268 2.7612C17.6541 3.51808 19.2159 4.79981 20.3147 6.4443C21.4135 8.08879 22 10.0222 22 12C22 14.6522 20.9464 17.1957 19.0711 19.0711C17.1957 20.9464 14.6522 22 12 22Z" fill="#34C759" />
                        </g>
                        <path d="M10.4928 16.9494C10.2298 16.9496 9.96942 16.898 9.72645 16.7974C9.48347 16.6969 9.26271 16.5494 9.0768 16.3634L5.2928 12.6644C5.10317 12.4788 4.99506 12.2254 4.99224 11.96C4.98943 11.6947 5.09215 11.4391 5.2778 11.2494C5.46345 11.0598 5.71683 10.9517 5.98219 10.9489C6.24756 10.9461 6.50317 11.0488 6.6928 11.2344L10.4858 14.9414L17.2918 8.24143C17.4837 8.07256 17.733 7.9836 17.9885 7.99284C18.244 8.00208 18.4862 8.10882 18.6655 8.29112C18.8447 8.47342 18.9473 8.71743 18.9522 8.97303C18.9571 9.22863 18.8639 9.4764 18.6918 9.66543L11.8988 16.3724C11.7139 16.5563 11.4945 16.702 11.2533 16.801C11.012 16.9 10.7536 16.9504 10.4928 16.9494Z" fill="#34C759" />
                        <defs>
                            <clipPath id="clip0_370_6017">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="px">Events</div>
            </div>
            <div class="ticks">
                <div><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_370_6017)">
                            <path d="M12 0C9.62663 0 7.30655 0.703788 5.33316 2.02236C3.35977 3.34094 1.8217 5.21509 0.913451 7.4078C0.00519943 9.60051 -0.232441 12.0133 0.230582 14.3411C0.693605 16.6689 1.83649 18.8071 3.51472 20.4853C5.19295 22.1635 7.33115 23.3064 9.65892 23.7694C11.9867 24.2324 14.3995 23.9948 16.5922 23.0866C18.7849 22.1783 20.6591 20.6402 21.9776 18.6668C23.2962 16.6935 24 14.3734 24 12C24 8.8174 22.7357 5.76516 20.4853 3.51472C18.2348 1.26428 15.1826 0 12 0V0ZM12 22C10.0222 22 8.08879 21.4135 6.4443 20.3147C4.79981 19.2159 3.51809 17.6541 2.76121 15.8268C2.00433 13.9996 1.8063 11.9889 2.19215 10.0491C2.578 8.10929 3.53041 6.32746 4.92894 4.92893C6.32746 3.53041 8.10929 2.578 10.0491 2.19215C11.9889 1.8063 13.9996 2.00433 15.8268 2.7612C17.6541 3.51808 19.2159 4.79981 20.3147 6.4443C21.4135 8.08879 22 10.0222 22 12C22 14.6522 20.9464 17.1957 19.0711 19.0711C17.1957 20.9464 14.6522 22 12 22Z" fill="#34C759" />
                        </g>
                        <path d="M10.4928 16.9494C10.2298 16.9496 9.96942 16.898 9.72645 16.7974C9.48347 16.6969 9.26271 16.5494 9.0768 16.3634L5.2928 12.6644C5.10317 12.4788 4.99506 12.2254 4.99224 11.96C4.98943 11.6947 5.09215 11.4391 5.2778 11.2494C5.46345 11.0598 5.71683 10.9517 5.98219 10.9489C6.24756 10.9461 6.50317 11.0488 6.6928 11.2344L10.4858 14.9414L17.2918 8.24143C17.4837 8.07256 17.733 7.9836 17.9885 7.99284C18.244 8.00208 18.4862 8.10882 18.6655 8.29112C18.8447 8.47342 18.9473 8.71743 18.9522 8.97303C18.9571 9.22863 18.8639 9.4764 18.6918 9.66543L11.8988 16.3724C11.7139 16.5563 11.4945 16.702 11.2533 16.801C11.012 16.9 10.7536 16.9504 10.4928 16.9494Z" fill="#34C759" />
                        <defs>
                            <clipPath id="clip0_370_6017">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="px">Pop-up stores</div>
            </div>
            <div class="ticks">
                <div><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_370_6017)">
                            <path d="M12 0C9.62663 0 7.30655 0.703788 5.33316 2.02236C3.35977 3.34094 1.8217 5.21509 0.913451 7.4078C0.00519943 9.60051 -0.232441 12.0133 0.230582 14.3411C0.693605 16.6689 1.83649 18.8071 3.51472 20.4853C5.19295 22.1635 7.33115 23.3064 9.65892 23.7694C11.9867 24.2324 14.3995 23.9948 16.5922 23.0866C18.7849 22.1783 20.6591 20.6402 21.9776 18.6668C23.2962 16.6935 24 14.3734 24 12C24 8.8174 22.7357 5.76516 20.4853 3.51472C18.2348 1.26428 15.1826 0 12 0V0ZM12 22C10.0222 22 8.08879 21.4135 6.4443 20.3147C4.79981 19.2159 3.51809 17.6541 2.76121 15.8268C2.00433 13.9996 1.8063 11.9889 2.19215 10.0491C2.578 8.10929 3.53041 6.32746 4.92894 4.92893C6.32746 3.53041 8.10929 2.578 10.0491 2.19215C11.9889 1.8063 13.9996 2.00433 15.8268 2.7612C17.6541 3.51808 19.2159 4.79981 20.3147 6.4443C21.4135 8.08879 22 10.0222 22 12C22 14.6522 20.9464 17.1957 19.0711 19.0711C17.1957 20.9464 14.6522 22 12 22Z" fill="#34C759" />
                        </g>
                        <path d="M10.4928 16.9494C10.2298 16.9496 9.96942 16.898 9.72645 16.7974C9.48347 16.6969 9.26271 16.5494 9.0768 16.3634L5.2928 12.6644C5.10317 12.4788 4.99506 12.2254 4.99224 11.96C4.98943 11.6947 5.09215 11.4391 5.2778 11.2494C5.46345 11.0598 5.71683 10.9517 5.98219 10.9489C6.24756 10.9461 6.50317 11.0488 6.6928 11.2344L10.4858 14.9414L17.2918 8.24143C17.4837 8.07256 17.733 7.9836 17.9885 7.99284C18.244 8.00208 18.4862 8.10882 18.6655 8.29112C18.8447 8.47342 18.9473 8.71743 18.9522 8.97303C18.9571 9.22863 18.8639 9.4764 18.6918 9.66543L11.8988 16.3724C11.7139 16.5563 11.4945 16.702 11.2533 16.801C11.012 16.9 10.7536 16.9504 10.4928 16.9494Z" fill="#34C759" />
                        <defs>
                            <clipPath id="clip0_370_6017">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="px">Short term rentals</div>
            </div>
            <h5>Turn your commercial space into hot property!</h5>
            <a href="step1.php"> <span class="l-s" id="list-your-space"><i class="fa-regular fa-hand-point-right"></i> &nbsp; &nbsp;List your space &nbsp; </span></a>

        </div>
        <div class="center">

            <div class="inp">
                <form method="post" action="">
                    <div class="name">
                        <div class="first">
                            <label for="first">First Name<span class="red">*</span></label>
                            <input type="text" id="first" name="first_name" required placeholder="Enter First name">
                        </div>
                        <div class="last">
                            <label for="last">Last Name<span class="red">*</span></label>
                            <input type="text" id="last" name="last_name" placeholder="Enter Last name">
                        </div>
                    </div>
                    <div class="mail">
                        <label for="email">Email Address<span class="red">*</span></label>
                        <input type="email" id="email" name="user_email" required style=' margin-bottom: 6%;    margin-top: 6px;' placeholder="Enter Email address">
                    </div>
                    <div class="message">
                        <label for="msg">Comments / Message</label><br>
                        <textarea id="msg" rows="8" cols="60" name="comment" maxlength="250" style='    margin-top: 6px;' placeholder="Enter comments"></textarea>
                    </div>
                    <div class="right">
                        max of 250 words
                    </div>
                    <div class="left">
                        Mandatory Field are marked with <span class="red">*</span>
                    </div>
                    <button class="button" type="submit">Send Message</button>


                </form>
            </div>
        </div>
    </div>
    <div id="popup" class="popup">
    <div class="popup-content">
        <span class="close-popup" onclick="closePopup()">&times;</span>
        <p id="popup-message"></p>
        <div class="popup-buttons">
            <button onclick="window.location.href='main.php'">Home</button>
            <button onclick="window.location.href='vs.php'">Find</button>
            
        </div>
    </div>
</div>

    <script>
        // Check if the confirmation message is not empty
        var confirmationMessage = "<?php echo $confirmation_message; ?>";
        if (confirmationMessage !== "") {
            // Show the custom popup with the confirmation message
            showPopup(confirmationMessage);
        }
        // Function to show the popup with a custom message
        function showPopup(message) {
            var popup = document.getElementById('popup');
            var popupMessage = document.getElementById('popup-message');
            popupMessage.innerHTML = message;
            popup.style.display = 'block';
        }

        // Function to close the popup
        function closePopup() {
            var popup = document.getElementById('popup');
            popup.style.display = 'none';
        }
    </script>

    <?php include 'footer.php' ?>
</body>

</html>