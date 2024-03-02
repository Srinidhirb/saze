<?php

include 'connect.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
}

if (isset($_POST['submit'])) {
   $id = create_unique_id();
   $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
   $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
   $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
   $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
   $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
   $c_pass = password_hash($_POST['c_pass'], PASSWORD_DEFAULT);

   $select_users = $conn->prepare("SELECT * FROM users WHERE email = ?");
   $select_users->bind_param("s", $email);
   $select_users->execute();
   $result = $select_users->get_result();

   if ($result->num_rows > 0) {
      $warning_msg[] = 'Email already taken!';
   } else {
      if (!password_verify($_POST['c_pass'], $pass)) {
         $warning_msg[] = 'Passwords do not match!';
      } else {
         $insert_user = $conn->prepare("INSERT INTO users (id, first_name, last_name, number, email, password) VALUES (?,?,?,?,?,?)");
         $insert_user->bind_param("ssssss", $id, $first_name, $last_name, $number, $email, $c_pass);

         if ($insert_user->execute()) {
            $verify_users = $conn->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
            $verify_users->bind_param("s", $email);
            $verify_users->execute();
            $result = $verify_users->get_result();
            $row = $result->fetch_assoc();

            if ($result->num_rows > 0) {
               setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
               header('location:step1.php');
            } else {
               $error_msg[] = 'Something went wrong!';
            }
         } else {
            $error_msg[] = 'Failed to insert user data!';
         }
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="header_footer.php">
   <!-- custom css file link  -->

   <style>
      /* Add these styles to your existing CSS or in a separate stylesheet */

      .form-container {
         max-width: 400px;
         margin: 60px auto;
         padding: 20px;

         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      form {
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

      h1 {
         font-size: 24px;
         margin-bottom: 20px;
         text-align: center;
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
      }

      .red {
         color: red;
      }
      #t_and_c{
         color: #333;
font-family: Lato;
font-size: 14px;
font-style: normal;
font-weight: 400;
line-height: normal;
letter-spacing: 0.359px;
width: 15px; height:15px;
      }
      
   </style>
</head>

<body>

   <?php include 'header.php'; ?>

   <!-- register section starts  -->

   <section class="form-container">

      <form action="" method="post" onsubmit="return validateForm()">
         <h1>Signup</h1>
         <label for="first_name">First Name:<span class="red">*</span></label>
         <input type="text" id="first_name" name="first_name" required maxlength="50" placeholder="Enter your first name" class="box">

         <label for="last_name">Last Name:<span class="red">*</span></label>
         <input type="text" id="last_name" name="last_name" required maxlength="50" placeholder="Enter your last name" class="box">

         <label for="email">Email:<span class="red">*</span></label>
         <input type="email" id="email" name="email" required maxlength="50" placeholder="Enter your email" class="box">

         <label for="number">Phone Number:<span class="red">*</span></label>
         <!--<input type="number" id="number" name="number" required min="0" max="9999999999" maxlength="10" placeholder="Enter your number" class="box">-->
         <input type="text" id="number" name="number" required min="0" max="9999999999" maxlength="10" placeholder="Enter your number" class="box" inputmode="numeric" style="-moz-appearance: textfield;">


         <label for="pass">Password:<span class="red">*</span></label>
         <div class="custom-password-group">
            <input type="password" id="pass" class="box" name="pass" required maxlength="20" placeholder="Enter Password">
            <i class="fas fa-eye custom-eye-icon" onclick="togglePasswordVisibility('pass')"></i>

         </div>

         <label for="c_pass">Confirm Password:<span class="red">*</span></label>
         <div class="custom-password-group">
            <input type="password" id="c_pass" class="box" name="c_pass" required maxlength="20" placeholder="Enter Password">
            <i class="fas fa-eye custom-eye-icon" onclick="togglePasswordVisibility('c_pass')"></i>
         </div>
         <p  id="password-error" class="password-error"></p>
         <div>
            <input type="checkbox" name="terms" id="t_and_c"  required>I Agree with the <a href="terms.php">Terms & Conditions</a>

         </div>
         <h4>Mandatory Fields are marked with <span class="red">*</span></h4>
      
         <input type="submit" value="Register now" name="submit" class="btn">
         <p class="p" >Already have an account? <a href="login.php" class="hover" >Login now</a></p>
      </form>

   </section>

   <!-- register section ends -->

   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <!-- custom js file link  -->
   <script src="script.js">
      if (window.history.replaceState) {
         window.history.replaceState(null, null, window.location.href);
      }
      function validateForm() {
         var password = document.getElementById("pass").value;
         var confirmPassword = document.getElementById("c_pass").value;
         var passwordError = document.getElementById("password-error");

         if (password !== confirmPassword) {
            passwordError.textContent = "Passwords do not match.";
            return false;
         } else {
            passwordError.textContent = "";
            return true;
         }
      }
      
   </script>
   <script>
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
 

</body>

</html>