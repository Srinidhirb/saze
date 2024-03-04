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
  <link rel="website icon " href="Logo Icon 16_16.svg">
  <title>Waiting Page</title>
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
  <style>
    .wait {
      width: 70%;
      margin: 129px 0px;
      display: flex;
      flex-direction: column;

      align-items: center;
      text-align: center;
      height: auto;
    }

    .wait1 {
      display: flex;
      align-items: center;
      gap: 12px;
      font-family: Lato;
      font-size: 16px;
      font-weight: 400;
      line-height: 19px;
      letter-spacing: 0em;
      text-align: left;
      color: #222222;

    }

    .wait2 {
      margin: 36px 0px 0px 0px;
      font-family: Lato;
      font-size: 16px;
      font-weight: 400;
      line-height: 19px;
      letter-spacing: 0em;
      text-align: left;
      color: #222222;

    }

    .wait3 {
      margin: 168px 0px 0px 0px;
      display: flex;
      align-items: center;
      gap: 12px;
      font-family: Lato;
      font-size: 24px;
      font-weight: 400;
      line-height: 29px;
      letter-spacing: 0em;
      text-align: left;
      color: #8C97B9;

    }

    a {
      color: #8C97B9;
    }

    .faq-box3 {
      display: flex;
      flex-direction: column;
      row-gap: 10px;
      margin: 0px 56px 44px 40px;
      align-items: center;
    }

    .faq-box {
      width: 280px;

      display: flex;

      align-items: center;
      color: #222222;
      font-size: 1rem;
      font-weight: bold;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    #box1,
    #box2 {
      font-family: Lato;
      font-size: 18px;
      font-weight: 500;
      line-height: 18px;
      letter-spacing: 0.5px;
      text-align: left;

    }

    #box1 img {
      width: 88px;
      height: 64px;

    }

    #box2 img {
      width: 88px;
      height: 64px;
    }




    .flex {

      display: flex;
      margin: 0px 0px 0px 260px;
      flex-wrap: wrap;

    }

    .right {
      margin: 149px 0px 0px 0px;
      width: 30%;
    }

    hr {
      color: #222222;
      width: 100%;
    }
    @media only screen and (max-width: 950px) {
        .flex {
          margin: 0px;
        }
        .right {
          width: 100%; /* Take full width on small screens */
          margin-top: 20px; /* Adjust margin */
        }
        hr{
          width: 50%;
        }
        .wait{
          width: 100%;
        }
        .wait3{
          margin: 100px 0 0 0;
        }
      }
  </style>
</head>

<body>
  <?php include 'header.php'; ?>
  <div class="flex">
    <div class="wait">
      <div class="wait1"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#clip0_370_6017)">
            <path d="M12 0C9.62663 0 7.30655 0.703788 5.33316 2.02236C3.35977 3.34094 1.8217 5.21509 0.913451 7.4078C0.00519943 9.60051 -0.232441 12.0133 0.230582 14.3411C0.693605 16.6689 1.83649 18.8071 3.51472 20.4853C5.19295 22.1635 7.33115 23.3064 9.65892 23.7694C11.9867 24.2324 14.3995 23.9948 16.5922 23.0866C18.7849 22.1783 20.6591 20.6402 21.9776 18.6668C23.2962 16.6935 24 14.3734 24 12C24 8.8174 22.7357 5.76516 20.4853 3.51472C18.2348 1.26428 15.1826 0 12 0V0ZM12 22C10.0222 22 8.08879 21.4135 6.4443 20.3147C4.79981 19.2159 3.51809 17.6541 2.76121 15.8268C2.00433 13.9996 1.8063 11.9889 2.19215 10.0491C2.578 8.10929 3.53041 6.32746 4.92894 4.92893C6.32746 3.53041 8.10929 2.578 10.0491 2.19215C11.9889 1.8063 13.9996 2.00433 15.8268 2.7612C17.6541 3.51808 19.2159 4.79981 20.3147 6.4443C21.4135 8.08879 22 10.0222 22 12C22 14.6522 20.9464 17.1957 19.0711 19.0711C17.1957 20.9464 14.6522 22 12 22Z" fill="#34C759" />
          </g>
          <path d="M10.4928 16.9494C10.2298 16.9496 9.96942 16.898 9.72645 16.7974C9.48347 16.6969 9.26271 16.5494 9.0768 16.3634L5.2928 12.6644C5.10317 12.4788 4.99506 12.2254 4.99224 11.96C4.98943 11.6947 5.09215 11.4391 5.2778 11.2494C5.46345 11.0598 5.71683 10.9517 5.98219 10.9489C6.24756 10.9461 6.50317 11.0488 6.6928 11.2344L10.4858 14.9414L17.2918 8.24143C17.4837 8.07256 17.733 7.9836 17.9885 7.99284C18.244 8.00208 18.4862 8.10882 18.6655 8.29112C18.8447 8.47342 18.9473 8.71743 18.9522 8.97303C18.9571 9.22863 18.8639 9.4764 18.6918 9.66543L11.8988 16.3724C11.7139 16.5563 11.4945 16.702 11.2533 16.801C11.012 16.9 10.7536 16.9504 10.4928 16.9494Z" fill="#34C759" />
          <defs>
            <clipPath id="clip0_370_6017">
              <rect width="24" height="24" fill="white" />
            </clipPath>
          </defs>
        </svg>You’ve Successfully listed your space
      </div>
      <div class="wait2">Our Team will reach you shortly</div>
      <a href="vs.php">
        <div class="wait3">Find spaces near you <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M22.2929 24.2071C22.6834 24.5976 23.3166 24.5976 23.7071 24.2071C24.0976 23.8166 24.0976 23.1834 23.7071 22.7929L22.2929 24.2071ZM18.1176 10.5588C18.1176 15.0096 14.5096 18.6176 10.0588 18.6176V20.6176C15.6142 20.6176 20.1176 16.1142 20.1176 10.5588H18.1176ZM10.0588 18.6176C5.60806 18.6176 2 15.0096 2 10.5588H0C0 16.1142 4.50349 20.6176 10.0588 20.6176V18.6176ZM2 10.5588C2 6.10806 5.60806 2.5 10.0588 2.5V0.5C4.50349 0.5 0 5.00349 0 10.5588H2ZM10.0588 2.5C14.5096 2.5 18.1176 6.10806 18.1176 10.5588H20.1176C20.1176 5.00349 15.6142 0.5 10.0588 0.5V2.5ZM15.8223 17.7365L22.2929 24.2071L23.7071 22.7929L17.2365 16.3223L15.8223 17.7365Z" fill="#8C97B9" />
          </svg>
      </a>
    </div>
  </div>


  <div class="right">
    <div class="faq-box3">
      <a href="vs.php">
        <div class="faq-box" id="box1"><img src="faq1.png" alt=""> &nbsp; Resources</div>
      </a>
      <hr>
      <a href="step1.php">
        <div class="faq-box" id="box2"><img src="faq1.png" alt=""> &nbsp; List Another space</div>
      </a>

    </div>
  </div>
  </div>



  <?php include 'footer.php' ?>
</body>

</html>