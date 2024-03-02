<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'connect.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
}

if (isset($_POST['submit'])) {
   $email = $_POST['email'];
   $password = $_POST['pass'];

   $select_users = $conn->prepare("SELECT id, password FROM users WHERE email = ? LIMIT 1");
   $select_users->bind_param("s", $email);
   $select_users->execute();
   $select_users->store_result();

   $rowCount = $select_users->num_rows;

   if ($rowCount > 0) {
      $select_users->bind_result($id, $stored_hashed_password);
      $select_users->fetch();

      if (password_verify($password, $stored_hashed_password)) {
         setcookie('user_id', $id, time() + 60 * 60 * 24 * 30, '/');
         
         if (isset($_SESSION['redirect_url'])) {
            var_dump($_SESSION['redirect_url']);
            $redirect_url = $_SESSION['redirect_url'];
            unset($_SESSION['redirect_url']); // Remove the stored redirect URL
            header('location: ' . $redirect_url);
            exit();
         } else {
            header('location: step1.php');
            exit();
         }
         
        
      } else {
         $warning_msg[] = 'Incorrect username or password!';
      }
   } else {
      $warning_msg[] = 'Incorrect username or password!';
   }

   $select_users->close();
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXVP8RTRY0"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-WXVP8RTRY0'); </script>
   <!-- custom css file link  -->
   <style>
      /* Add these styles to your existing CSS or in a separate stylesheet */

      .form-container {
         max-width: 400px;
         margin: 60px auto;
         padding: 20px;
         text-align: center;

         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         /* Add box shadow */
      }

      form {
         display: flex;
         flex-direction: column;

      }
      .form {
         display: flex;
         flex-direction: column;

      }

      input {
         width: 380px;
         height: 46px;
         border-radius: 10px;
         border: 1px solid var(--Input-Field, #828282);
         background: var(--White, #FFF);
         background: var(--White, #FFF);
      }

      h3 {
         font-size: 24px;
         margin-bottom: 20px;
      }

      ::placeholder {
         color: #717579;
         font-family: Lato;
         font-size: 14px;
         font-style: normal;
         font-weight: 400;
         line-height: normal;
         letter-spacing: 0.36px;
      }

      .box {
         width: 100%;
         padding: 10px;
         margin: 0px 0 30px 0;
         box-sizing: border-box;
      }


      .p {

         text-align: center;
         margin-top: 10px;
         color: var(--Brand-color, #031B64);
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 600;
line-height: normal;
letter-spacing: 0.359px;
      }
      .p1 {
text-align: left;
         margin-top: 10px;
         color: #333;
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: normal;
letter-spacing: 0.36px;
      }

      .btn {
         background-color: #031B64;
         display: flex;
         justify-content: center;
         align-items: center;
         color: #fff;
         padding: 10px;
         border: none;
         cursor: pointer;
         width: auto !important;
         border-radius: 5px;
         font-size: 16px;
         margin-top: 20px;
         margin-bottom: 20px;
      }

      /* Optional: Add hover effect to the button */
      .btn:hover {
         background-color: #4AE9E9;
      }

      h1 {
         color: #333;
         font-family: Lato;
         font-size: 32px;
         font-style: normal;
         font-weight: 600;
         line-height: normal;
         letter-spacing: 0.5px;
      }

      .custom-password-group {
         position: relative;
         width: 100%;
      }

      .custom-password-group .custom-eye-icon {
         position: absolute;
         top: 32%;
         right: 10px;
         transform: translateY(-50%);
         cursor: pointer;
         font-size: 1.2rem;
      }

      label {
         text-align: left;
         color: #333;
         font-family: Lato;
         font-size: 16px;
         font-style: normal;
         font-weight: 400;
         line-height: normal;
         letter-spacing: 0.36px;
         text-transform: capitalize;
         padding-bottom: 2px;
         padding-left: 2px;
      }

      .red {
         color: red;
      }
      
   </style>
   <link rel="stylesheet" href="header_footer.php">
</head>

<body>


   <?php include 'header.php' ?>
   <!-- login section starts  -->

   <section class="form-container">

      <form action="" method="post">
         <h1>Login</h1>
         <label for="email">Email ID <spam class="red">*</spam></label>
         <input type="email" name="email" required maxlength="50" placeholder="Enter your Email ID" class="box">

         <label for="pass">Password <spam class="red">*</spam></label>
         <div class="custom-password-group">
            <input type="password" id="custom-password" class="box" name="pass" required maxlength="20" placeholder="Enter Password">
            <i class="fas fa-eye custom-eye-icon" onclick="togglePasswordVisibility('custom-password')"></i>
         </div>
         <div class="form" >
          
            <!-- <a href="forgot.php" style="text-align: end;">
               <a href="forgot.php"><p class="p hover"  >Forgot a password?</p></a>
            </a> -->
            <p class="p1">Mandatory Field are marked with <spam class="red">*</spam></p>
         </div>
         
         <input type="submit" value="login now" name="submit" class="btn">
         <p class="p">don't have an account? <a href="register.php" class="hover" >Register new</a></p>
      </form>

   </section>

   <!-- login section ends -->

   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>



   <!-- custom js file link  -->
   <script src="script.js"></script>
   <script>
      if (window.history.replaceState) {
         window.history.replaceState(null, null, window.location.href);
      }

      function togglePasswordVisibility(inputId) {
         var passwordInput = document.getElementById(inputId);
         var eyeIcon = passwordInput.nextElementSibling;

         if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
         } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
         }
      }
   </script>

   <?php include 'message.php'; ?>
   <?php include 'footer.php'; ?>


</body>

</html>