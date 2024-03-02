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
  <!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXVP8RTRY0"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-WXVP8RTRY0'); </script>
  <style>
    body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .size {
      height: 10vh;
    }

    .body {
      font-family: 'Lato', sans-serif;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      width: 90%;
      height: 60vh;
    }

    a {
      text-decoration: none;
    }

    ul {
      list-style: none;
    }

    h1 {
      color: #8C97B9;
font-family: Lato;
font-size: 24px;
font-style: normal;
font-weight: 400;
line-height: normal;
    }

    .btn {
      color: #fff;
      background-color: #031B64;
      padding: 17px 20px;
      border-top-right-radius: 5%;
      border-top-left-radius: 5%;
      border-bottom-left-radius: 5%;
      border-bottom-right-radius: 5%;
      text-transform: capitalize;
      font-size: 1rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.2s;
      width: auto;
    }


    .btn:hover {

      background-color: #7CAFD5;
    }
  </style>
</head>

<body>
  <div class="size"></div>
  <div class="body">
    <?php include 'header.php' ?>
    <h1> Thank you for placing your trust in SpaceKraft to showcase your space . <br>Keep an eye out for updates . <br> We will notify you once your space is live.
    </h1>

    <button class="btn" onclick="redirectToAnotherPage()">Home</button>
  </div>
  <?php include 'footer.php' ?>
  <script>
    function redirectToAnotherPage() {
      // Replace 'target-page.html' with the actual URL of the page you want to redirect to
      window.location.href = 'index.php';
    }
  </script>
</body>

</html>