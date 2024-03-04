<?php if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXVP8RTRY0"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-WXVP8RTRY0'); </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        a{
            color: #222222;
        }
        .res-cont {
            margin: 112px 0 0 80px;
        }

        .gray-calendar {
            color: #888;
            /* Gray color */
        }

        .res-cont .span {
            width: 100%;
            font-family: Lato;
            font-size: 44px;
            font-weight: 700;
            line-height: 77px;
            letter-spacing: 0.5px;
            text-align: left;
            color: #3D3C3C;
        }

        .main-res {
            display: flex;
            flex-direction: row;
            border-radius: 8px;
        }

        .img img {
            width: 496px;
            height: 247px;
            border-radius: 8px;
        }

        .cont {
            position: relative;
            padding-left: 65px;
            /* Adjust padding instead of left */
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .cont h2 {
            font-family: Lato;
            font-size: 24px;
            font-weight: 400;
            line-height: 24px;
            letter-spacing: 0px;
            text-align: left;
            margin: 8px 0 0 0;
            /* Remove default margin */
        }

        .cont h6 {
            font-family: Lato;
            font-size: 20px;
            font-weight: 400;
            line-height: 24px;
            letter-spacing: 0px;
            text-align: left;
            margin: 24px 144px 71px 0px;
            /* Add margin for spacing */
        }

        .details {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-top: 10px;
            /* Add margin for spacing */
            justify-content: space-between;
            width: 80%;
        }
        
        .det1,
        .det2 {
            display: flex;
            align-items: center;
        }

        .det1 {
            margin-right: 32px;
            /* Adjust margin for spacing */
        }

        .det2 a {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid;
        }

        /* Media queries for responsiveness */
        @media screen and (max-width: 950px) {
            .res-cont {
                margin: 0;
                margin-top: 102px;
            }

            .main-res {
                width: 100%;

                flex-direction: column;

            }

            .img img {
                width: 100%;
                height: auto;
            }

            .cont {
                padding: 20px 0px 0px 0px;
            }

            .cont h6 {
                margin: 10px 0px 10px 2px;
            }

            .det1,
            .det2 {
                width: 100%;
                padding: 0px;
            }

            .details {
                width: 100%;
                gap: 0px;
            }

        }

        @media screen and (max-width: 768px) {
            .res-cont .span {
                margin: 10px;
                font-size: 30px;
                line-height: 0px;
            }


        }

        .res-below {
            margin: 56px 1198px 72px 0px;
            display: flex;
            flex-direction: row;
            width: 100%;
        }

        .res-below .related {
            width: 15%;
        }

        .res-below .other-res {
            width: 80%;
        }

        .related span {
            font-family: Lato;
            font-size: 24px;
            font-weight: 500;
            line-height: 24px;
            letter-spacing: 0px;
            text-align: left;
            color: #989797;

        }

        .hr {
            margin: 10px;
            height: 363.5px;

        }

        .search-options {
            margin: 16px 4px 0px 0px;
            padding: 0%;
            line-height: 10px;
            width: 100%;
        }

        .search-options li {
            margin: 8px 0px 0px 0px;
            font-family: Lato;
            font-size: 16px;
            font-weight: 400;
            line-height: 24px;
            letter-spacing: 0px;
            text-align: left;

        }

        .card {
            width: 100%;
            /* Adjusts based on the parent container */
            max-width: 328px;
            /* Limits the maximum width */
            height: auto;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1);
            padding: 5%;
            /* Use percentage for padding */
            transition: 0.3s;
            box-sizing: border-box;
            /* Includes padding in the width calculation */
        }

        .card:hover {
            transform: scale(1.01);
        }

        .card img {
            width: 100%;
            /* Make the image responsive within its container */
            height: auto;
            /* Maintain aspect ratio */
            border-radius: 8px;
        }

        .card h2 {
            font-family: Lato;
            font-size: 1.5rem;
            /* Responsive font size */
            font-weight: 400;
            line-height: 1.2;
            text-align: left;
            color: #222222;
            margin-top: 10px;
            /* Adjust spacing */
        }

        .card p {
            font-family: Lato;
            font-size: 1rem;
            /* Responsive font size */
            font-weight: 400;
            line-height: 1.5;
            text-align: left;
            color: #222222;
            margin-top: 10px;
            /* Adjust spacing */
        }

        .details {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            /* Adjust spacing */
        }

        .date,
        .counter {
            font-size: 1rem;
            /* Responsive font size */
        }

        .date i,
        .counter i {
            margin-right: 5px;
        }

        #card {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            flex-wrap: wrap;
            row-gap: 20px;
            /* Allows cards to wrap on smaller screens */
        }

        @media screen and (max-width: 1000px) {
            .res-below {
                flex-direction: column;
            }

            .related {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .search-options {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
        }

        @media screen and (max-width: 1240px) {

            .card {
                max-width: 260px;
            }

            .hr {
                display: none;
            }

            .res-cont {
                margin: 112px 0 0 20px;
                
            }
        }

        @media screen and (max-width: 1000px) {


            .res-below .related {
                width: 95%;
                text-align: center;
                margin-right: 20px;
            }

            .res-below .other-res {
                width: 85%;
            }




            .card img {
                width: 100%;
                height: auto;
            }
        }

        @media screen and (max-width: 670px) {
            .card {
                max-width: 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="header_footer.php">
</head>

<body>

    <?php include 'header.php' ?>

    <div class="res-cont">
        <span class="span">Latest Updates</span><br />
        <div class="main-res">
            <div class="img">
                <img src="assets\img\perks-of-short-term-rentals-in-retail-industry-for-upscaled.jpg" alt="">
            </div>
            <div class="cont">
                <h2>Perks of Short-Term Rentals for Indian Businesses</h2>
                <h6>In the dynamic and fast-paced realm of Indian commerce, businesses are constantly evolving and adapting to ever-changing market...</h6>
                <div class="details">
                    <div class="det1"> <i class="fa-regular fa-calendar gray-calendar"></i>&nbsp; 12 May -2024 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa-regular fa-eye gray-calendar"></i> &nbsp; 5</div>
                    <div class="det2"><a href="blog1.php">Read More</a></div>
                </div>
            </div>

        </div>
        <div class="res-below">
            <div class="related">
                <span>Resent Post</span>
                <ul class="search-options">
                    <a href="blog1.php">
                        <li>Perks of Short-Term Rentals</li>
                    </a>
                    <a href="blog2.php">
                        <li>The Rise of Pop-Up Culture </li>
                    </a>
                    <a href="blog3.php">
                        <li> Pop-Up Shop Strategies And Marketing</li>
                    </a>
                    <a href="blog4.php">
                        <li>Pop-Up Power - Harnessing</li>
                    </a>
                </ul>
            </div>
            <hr class="hr" >
            <div id="card">
                <a href="blog2.php">
                    <div class="card">
                        <img src="assets\img\rise-of-popup-shop-culture-shopping-mall-with-man-upscaled.jpg" alt="Image">
                        <h2>The Rise of Pop-Up Culture in India: A Closer Look at Pop-Up Spaces</h2>
                        <p>In recent years, India has witnessed a flourishing of the pop-up culture, a trend that's transforming the retail...</p>
                        <div class="details">
                            <div class="date">
                                <i class="far fa-calendar"></i> 12 May -2024
                            </div>
                            <div class="counter">
                                <i class="far fa-eye"></i> 5 Views
                            </div>
                        </div>
                    </div>
                </a>
                <a href="blog3.php">
                    <div class="card">
                        <img src="assets\img\marketing-strategy-popupshop-kiosk-shopshare-upscaled.jpg" alt="Image">
                        <h2> Pop-Up Shop Strategies And Marketing Tactics for Success in the Indian ..</h2>
                        <p>In the bustling landscape of Indian commerce, where innovation and dynamism reign supreme, the...</p>
                        <div class="details">
                            <div class="date">
                                <i class="far fa-calendar"></i> 12 May -2024
                            </div>
                            <div class="counter">
                                <i class="far fa-eye"></i> 5 Views
                            </div>
                        </div>
                    </div>
                </a>
                <a href="blog4.php">
                    <div class="card">
                        <img src="assets\img\blog4.png" alt="Image">
                        <h2>Pop-Up Power - Harnessing Short-Term Retail Rentals for Seasonal Success</h2>
                        <p>In the bustling world of retail, adaptation is the name of the game. With consumer preferences shifting...</p>
                        <div class="details">
                            <div class="date">
                                <i class="far fa-calendar"></i> 19 Feb -2024
                            </div>
                            <div class="counter">
                                <i class="far fa-eye"></i> 5 Views
                            </div>
                        </div>
                    </div>
                </a>


            </div>

        </div>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>