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

  <link rel="stylesheet" href="header_footer.php">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXVP8RTRY0"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-WXVP8RTRY0'); </script>
  <style>
    
    * {
      margin: 0;
      padding: 0;
    }

    .how {
      height: 80vh;
      display: flex;
      justify-content: start;
      align-items: end;
      background-image: url('howitworks1 (1).png');
      background-position: center;
      background-size: cover;
      margin: 75px auto 0px;
      text-align: center;
      background-color: #100a0aa1;
      background-blend-mode: overlay ;
      position: relative;
      
      z-index: 18 ;
    }
    .how h1{
      margin: 0 100px 50px 50px;
      font-size: 4rem;
      text-shadow: 2px 2px 4px rgb(0, 0, 0);
      color: #ffffff;
    }


    .items {
      margin: 48px 0px;
      width: 100%;
      height: auto;
      display: flex;
      flex-direction: row;
      justify-content: space-evenly;
      flex-wrap: wrap;
      row-gap: 40px;
    }

    .items_card {

      width: 328px;

      display: flex;
      flex-direction: column;
      text-align: center;
      align-items: center;

    }

    .items_card h2 {
      margin: 24px 0px 0px;
      font-family: lato;
      font-size: 24px;
      font-weight: bold;
      color: #222222;
    }

    .abt {
      font-family: lato;
      font-size: 16px;
      font-weight: bold;
      color: #222222;
    }

    .img-text {
      display: flex;
      flex-direction: row;
      justify-content: space-evenly;
      flex-wrap: wrap;
      margin: 68px 0;
      row-gap: 20px;
      width: 100%;
    }

    .img-text img {
      width: 320px;
      flex-wrap: wrap;
      height: 340px;
    }

    .text {
      width: 450px;


      display: flex;
      flex-direction: column;
      justify-content: center;


    }

    .text h3 {
      font-size: 32px;
      font-weight: bold;
      color: #222222;
    }

    .text span {
      text-align: justify;
      margin: 23px 0px 0px;
      font-size: 16px;
      font-weight: bold;
      color: #222222;
    }

    .text button {
      width: 152px;
      height: 53px;
      color: white;
      border:none;
      font-size: 16px;
      background-color: #031B64;
      border-radius: 6px;
      margin: 24px 0px !important;
      align-items: start;
    }

    .text button:hover {
      color: #222222;
      background-color: #4AE9E9;
    }

    @media (max-width: 1024px) {
      .text {
        width: 350px;
        padding: 0px 20px;
      }
    }

    .big-img {
      background-image: url('hiw-3.png');
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
      width: 100%;
      height: 400px;
      display: flex;
      flex-direction: column;
    }

    .big-img span {
      font-size: 2rem;
      font-weight: bold;
      margin: 10% 0 0 10%;
      
      /* Adjusted for responsiveness */
      color: white;
    }

    .big-img p {
      font-size: 1rem;
      font-weight: bold;
      margin: 2% 0 0 10%;
      /* Adjusted for responsiveness */
      color: white;
    }
    .img-1 img{
          width: 550px;
        }

    /* Responsive adjustments */
    @media only screen and (max-width: 768px) {
      .big-img {
        height: 300px;
        /* Adjusted height for smaller screens */
      }

      .big-img span {
        margin: 10% 0 0 5%;
        /* Adjusted for smaller screens */
      }

      .big-img p {
        margin: 2% 0 0 5%;
        /* Adjusted for smaller screens */
      }
      .img-1 img{
          width: 320px;
        }
    }
    .img{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            row-gap: 20px;
            column-gap: 10px;
        }
       
       
  </style>

</head>
h1
<body>

  <?php
  include 'header.php';
  ?>
  <div class="how">
    <h1>How it Works</h1>
  </div>
  <div class="itmes3">
    <div class="items">
      <div class="items_card">
        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M16 26.5C15.1716 26.5 14.5 27.1716 14.5 28C14.5 28.8284 15.1716 29.5 16 29.5V26.5ZM20 29.5C20.8284 29.5 21.5 28.8284 21.5 28C21.5 27.1716 20.8284 26.5 20 26.5V29.5ZM16 18.5C15.1716 18.5 14.5 19.1716 14.5 20C14.5 20.8284 15.1716 21.5 16 21.5V18.5ZM28 21.5C28.8284 21.5 29.5 20.8284 29.5 20C29.5 19.1716 28.8284 18.5 28 18.5V21.5ZM16 10.5C15.1716 10.5 14.5 11.1716 14.5 12C14.5 12.8284 15.1716 13.5 16 13.5V10.5ZM28 13.5C28.8284 13.5 29.5 12.8284 29.5 12C29.5 11.1716 28.8284 10.5 28 10.5V13.5ZM34.5 20C34.5 20.8284 35.1716 21.5 36 21.5C36.8284 21.5 37.5 20.8284 37.5 20H34.5ZM20 41.5C20.8284 41.5 21.5 40.8284 21.5 40C21.5 39.1716 20.8284 38.5 20 38.5V41.5ZM10.1561 39.5497L10.8476 38.2185H10.8476L10.1561 39.5497ZM8.45035 37.8439L7.11923 38.5354L7.11923 38.5354L8.45035 37.8439ZM33.8439 4.45035L33.1524 5.78147V5.78147L33.8439 4.45035ZM35.5497 6.1561L34.2185 6.84756L34.2185 6.84756L35.5497 6.1561ZM10.1561 4.45035L9.46464 3.11923H9.46464L10.1561 4.45035ZM8.45035 6.1561L7.11923 5.46464V5.46464L8.45035 6.1561ZM28.0002 32.5001C27.1718 32.5001 26.5002 33.1716 26.5002 34.0001C26.5002 34.8285 27.1718 35.5001 28.0002 35.5001V32.5001ZM40.0002 35.5001C40.8286 35.5001 41.5002 34.8285 41.5002 34.0001C41.5002 33.1716 40.8286 32.5001 40.0002 32.5001V35.5001ZM35.5 28C35.5 27.1716 34.8285 26.5 34 26.5C33.1716 26.5 32.5 27.1716 32.5 28H35.5ZM32.5 39.9998C32.5 40.8283 33.1716 41.4998 34 41.4998C34.8285 41.4998 35.5 40.8283 35.5 39.9998H32.5ZM16 29.5H20V26.5H16V29.5ZM16 21.5H28V18.5H16V21.5ZM16 13.5H28V10.5H16V13.5ZM14.44 5.5H29.56V2.5H14.44V5.5ZM34.5 10.44V20H37.5V10.44H34.5ZM20 38.5H14.44V41.5H20V38.5ZM9.5 33.56V10.44H6.5V33.56H9.5ZM14.44 38.5C13.2758 38.5 12.4944 38.4988 11.8931 38.4489C11.3096 38.4004 11.0312 38.3139 10.8476 38.2185L9.46464 40.8808C10.1479 41.2357 10.8725 41.3744 11.6448 41.4386C12.3991 41.5012 13.3262 41.5 14.44 41.5V38.5ZM6.5 33.56C6.5 34.6738 6.49879 35.6009 6.56144 36.3552C6.62557 37.1275 6.7643 37.8521 7.11923 38.5354L9.78147 37.1524C9.68605 36.9688 9.5996 36.6904 9.55115 36.1069C9.50121 35.5056 9.5 34.7242 9.5 33.56H6.5ZM10.8476 38.2185C10.391 37.9813 10.0187 37.609 9.78147 37.1524L7.11923 38.5354C7.64104 39.5399 8.4601 40.359 9.46464 40.8808L10.8476 38.2185ZM29.56 5.5C30.7242 5.5 31.5056 5.50121 32.1069 5.55115C32.6904 5.5996 32.9688 5.68605 33.1524 5.78147L34.5354 3.11923C33.8521 2.7643 33.1275 2.62557 32.3552 2.56144C31.6009 2.49879 30.6738 2.5 29.56 2.5V5.5ZM37.5 10.44C37.5 9.3262 37.5012 8.39912 37.4386 7.64478C37.3744 6.87249 37.2357 6.14791 36.8808 5.46464L34.2185 6.84756C34.3139 7.03125 34.4004 7.30964 34.4489 7.89306C34.4988 8.49444 34.5 9.27584 34.5 10.44H37.5ZM33.1524 5.78147C33.609 6.01866 33.9813 6.39096 34.2185 6.84756L36.8808 5.46464C36.359 4.4601 35.5399 3.64104 34.5354 3.11923L33.1524 5.78147ZM14.44 2.5C13.3262 2.5 12.3991 2.49879 11.6448 2.56144C10.8725 2.62557 10.1479 2.7643 9.46464 3.11923L10.8476 5.78147C11.0312 5.68605 11.3096 5.5996 11.8931 5.55115C12.4944 5.50121 13.2758 5.5 14.44 5.5V2.5ZM9.5 10.44C9.5 9.27584 9.50121 8.49445 9.55115 7.89306C9.5996 7.30964 9.68605 7.03125 9.78147 6.84756L7.11923 5.46464C6.7643 6.14791 6.62557 6.87249 6.56144 7.64478C6.49879 8.39912 6.5 9.3262 6.5 10.44H9.5ZM9.46464 3.11923C8.4601 3.64104 7.64104 4.4601 7.11923 5.46464L9.78147 6.84756C10.0187 6.39096 10.391 6.01866 10.8476 5.78147L9.46464 3.11923ZM28.0002 35.5001H40.0002V32.5001H28.0002V35.5001ZM32.5 28L32.5 39.9998H35.5L35.5 28H32.5Z" fill="#031B64" />
        </svg>
        <h2> Sign up on SpaceKraft </h2><br>
        <span class="abt"> Ready to turn your empty space into profit? Easy! Just Sign up on SpaceKraft to
          get started</span>
      </div>
      <div class="items_card">
        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M14 15.9998L23.2929 6.70696C23.6834 6.31643 24.3166 6.31643 24.7071 6.70696L34 15.9998M6 23.9998L24 41.9998M16 32.9998L21.9437 26.7589C22.3374 26.3456 22.9965 26.3451 23.3909 26.7577L37 40.9998M36 23.9998C36 25.1044 35.1046 25.9998 34 25.9998C32.8954 25.9998 32 25.1044 32 23.9998C32 22.8953 32.8954 21.9998 34 21.9998C35.1046 21.9998 36 22.8953 36 23.9998ZM12.4 41.9998H35.6C37.8402 41.9998 38.9603 41.9998 39.816 41.5639C40.5686 41.1804 41.1805 40.5685 41.564 39.8158C42 38.9602 42 37.8401 42 35.5998V22.3998C42 20.1596 42 19.0395 41.564 18.1839C41.1805 17.4312 40.5686 16.8193 39.816 16.4358C38.9603 15.9998 37.8402 15.9998 35.6 15.9998H12.4C10.1598 15.9998 9.03968 15.9998 8.18404 16.4358C7.43139 16.8193 6.81947 17.4312 6.43597 18.1839C6 19.0395 6 20.1596 6 22.3998V35.5998C6 37.8401 6 38.9602 6.43597 39.8158C6.81947 40.5685 7.43139 41.1804 8.18404 41.5639C9.03968 41.9998 10.1598 41.9998 12.4 41.9998Z" stroke="#031B64" stroke-width="3" stroke-linecap="round" />
        </svg>
        <h2> Show off your Space </h2><br>
        <span class="abt"> Share the details of your space, from photos to size, amenities, availability, and pricing.
          Lay it all out, and we'll take care of the rest. </span>
      </div>
      <div class="items_card">

        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M40.0001 8.00012L19.4131 26.9758C19.2077 27.1651 19.0909 27.4318 19.0909 27.7111V39.2969C19.0909 40.2253 20.2459 40.6526 20.8501 39.9477L28.9091 30.5456M8.32047 22.8399L40.504 6.7481C41.1805 6.40988 41.973 6.91597 41.9508 7.67192L41.2194 32.541C41.2003 33.1904 40.5767 33.6494 39.951 33.4748L8.49889 24.6975C7.61754 24.4515 7.50205 23.2491 8.32047 22.8399Z" stroke="#031B64" stroke-width="3" stroke-linecap="round" />
        </svg>




        <h2>Voila! your space is live </h2><br>
        <span class="abt"> Our experts will review the info, and before you know it, your space is live and ready to attract opportunities. Start monetizing your space with SpaceKraft today!</span>
      </div>

    </div>
    <div class="img-text">
      <div class="img">
        <img src="hiw-1.png" alt="">
        <img src="hiw-2.png" alt="">
      </div>
      <div class="text">
        <h3>Unlock your Revenue Potential Today!</h3>
        <span>Transform your idle space into a thriving hotspot and unleash its earning power! List your space on SpaceKraft and gain access to global pool of millions of potential renters.

        </span>

        <a href="step1.php"> <button> List your space</button></a>
      </div>
    </div>
    <div class="big-img">
      <span>Renting a space through SpaceKraft is as simple as 1, 2, 3!</span>
      <br>
      <p>Our platform is designed for ultimate flexibility, transparency, and top-notch service, tailored
        to fuel your business growth.</p>
    </div>
  </div>
  <div class="img-text">
      
      <div class="text">
        <h3>Discover your perfect Pop-Up shop effortlessly!</h3>
        <span>With SpaceKraft's extensive collection of thousands of listings, you can seamlessly explore and submit as many inquiries as you desire.

        </span>

        <a href="vs.php"> <button> Find a space</button></a>
      </div>
      <div class="img img-1">
        <img  src="hiw4.png" alt="" width="" >
        
      </div>
    </div>
  <?php
  include 'footer.php';
  ?>



</body>

</html>