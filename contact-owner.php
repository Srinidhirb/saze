<?php
// Include your database connection file
@include 'connect.php';
if (isset($_COOKIE['user_id'])) {
  $user_id = $_COOKIE['user_id'];
} else {
  $user_id = '';
  header('location:login.php');
}

// Initialize variables to avoid undefined variable errors
$ownerName = "";
$ownerEmail = "";
$ownerNumber = "";

// Check if userId is provided in the GET data
if (isset($_GET['userId'])) {
  $userId = $_GET['userId'];

  // Use a prepared statement to retrieve owner information based on the userId
  $sqlOwner = "SELECT * FROM users WHERE id = ?";

  // Prepare the statement
  $stmtOwner = $conn->prepare($sqlOwner);

  // Bind the user ID parameter
  $stmtOwner->bind_param('s', $userId);

  // Execute the statement
  if (!$stmtOwner->execute()) {
    die('Error executing statement: ' . $stmtOwner->error);
  }

  // Get the result
  $resultOwner = $stmtOwner->get_result();

  // Output owner information
  if ($resultOwner->num_rows > 0) {
    $rowOwner = $resultOwner->fetch_assoc();
    $ownerName = $rowOwner['first_name'];
    $ownerEmail = $rowOwner['email'];
    $ownerNumber = $rowOwner['number'];

    // Debugging: Display fetched owner details

    echo "No data found for the provided userId.";
  }

  // Close the statement
  $stmtOwner->close();
} else {
  echo "No userId provided in the GET data.";
}

// Fetch the latest 9 records from the combined_list table
$sqlSpaces = "SELECT * FROM combined_list ORDER BY id DESC LIMIT 9";
$resultSpaces = $conn->query($sqlSpaces);

if (!$resultSpaces) {
  die('Error executing query: ' . $conn->error);
}

// Close the database connection
$conn->close();
?>
<?php
// Include your database connection file
@include 'connect.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="website icon " href="Logo Icon 16_16.svg">
  <title>Contact-owner</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
  <link rel="stylesheet" href="header_footer.php">

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="newstyle.php">
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


  </style>
</head>

<body>
  <?php include 'header.php' ?>
  <div class="size"></div>
  <div class="contact">
    <?php
    if (isset($_GET['userId'])) {
      $userId = $_GET['userId'];

      // Use a prepared statement to retrieve owner information based on the userId
      $sqlOwner = "SELECT * FROM users WHERE id = ?";

      // Prepare the statement
      $stmtOwner = $conn->prepare($sqlOwner);

      // Bind the user ID parameter
      $stmtOwner->bind_param('s', $userId);

      // Execute the statement
      $stmtOwner->execute();

      // Get the result
      $resultOwner = $stmtOwner->get_result();

      // Output owner information
      if ($resultOwner->num_rows > 0) {
        $rowOwner = $resultOwner->fetch_assoc();
        $ownerName = $rowOwner['first_name'];
        $ownerEmail = $rowOwner['email'];
        $ownerNumber = $rowOwner['number'];
    ?>


        <div class="title">
          Owner Details
        </div>
        <div class="title-below">
          Find the owner details below
        </div>
        <div class="info">
          <span class="name"> Name : <?php echo $ownerName; ?></span>
          <span class="number"> Email Address :<?php echo  $ownerEmail; ?></span>
          <span class="mail"> Phone Number : <?php echo $ownerNumber; ?></span>
        </div>
  </div>
<?php
      }
    }
?>
</div>
<div class="heading">
  Similar Spaces
</div>

<?php
// Fetch the latest 9 records from the combined_list table
$sql = "SELECT * FROM combined_list ORDER BY RAND() LIMIT 9";
$result = $conn->query($sql);


?>
<div class="unique-container">
  <div class="swiper card_slider">
    <div class="swiper-wrapper" style=" margin-bottom:30px;">
      <!-- PHP code to fetch data from the database -->
      <?php
      function limitWords($string, $word_limit)
      {
        $words = explode(" ", $string);
        if (count($words) > $word_limit) {
          $limitedString = implode(" ", array_splice($words, 0, $word_limit));
          return $limitedString . '...'; // Add ellipsis to indicate that the text has been truncated
        } else {
          return $string;
        }
      }
      // Establish database connection


      // Loop through the data and display it in swiper slides
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <div class="swiper-slide">
            <div class="card" onclick="submitForm('<?php echo $row['id']; ?>')">
              <form action="ind_space_details.php" method="post" id="spaceForm_<?php echo $row['id']; ?>">
                <input type="hidden" name="spaceId" value="<?php echo $row['id']; ?>">
              </form>
              <div class="card-header">
                <?php
                if ($row['images'] !== "N/A") {
                  // Handle multiple images
                  $imagePaths = explode(',', $row['images']);
                  echo '<img  src="http://spacekraft.in/' . $imagePaths[0] . '"  alt="">';
                } else {
                  echo '<img  src="path/to/default/image.jpg" " alt="Default Image">';
                }
                ?>
              </div>
              <div class="card-body">
                <h2><?php echo limitWords($row['SpaceName'], 2); // Limit to 5 words 
                    ?></h2>
                <p><?php echo limitWords($row['Description'], 4); // Limit to 10 words 
                    ?></p>

                <h2><?php echo $row['SpaceArea']; ?> sq.ft</h2>
              </div>
            </div>
          </div>
      <?php
        }
      } else {
        echo "No data available";
      }
      $conn->close();
      ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>

</div>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".card_slider", {
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    freeMode: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      // When window width is <= 576px
      176: {
        slidesPerView: 1,
        spaceBetween: 10,
        centeredSlides: true, // Center-align slides
      },
      // When window width is <= 768px
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
        centeredSlides: false, // Remove center alignment
      },
      // When window width is <= 992px
      972: {
        slidesPerView: 3,
        spaceBetween: 30,
        centeredSlides: false, // Remove center alignment
      },
      // When window width is <= 1200px
      1200: {
        slidesPerView: 4,
        spaceBetween: 40,
        centeredSlides: false, // Remove center alignment
      }
      // Add more breakpoints and adjustments as needed
    }
  });
</script>
<script>
  function submitForm(spaceId) {
    document.getElementById('spaceForm_' + spaceId).submit();
  }
</script>

<?php include 'footer.php' ?>
</body>

</html>