<?php
// Include your database connection file
@include 'connect.php';
if (isset($_COOKIE['user_id'])) {
  $user_id = $_COOKIE['user_id'];
} else {
  $user_id = '';
}
// Initialize the $result variable
$result = null;

// Check if the 'City' parameter is set in the URL
if (isset($_GET['City'])) {
  // Get the value of the 'City' parameter
  $selectedCity = $_GET['City'];

  // Fetch listings based on the selected city
  $sql = "SELECT * FROM combined_list WHERE City LIKE '%$selectedCity%'";
  $result = $conn->query($sql);

  // Handle the case where no listings are found for the selected city
  if (!$result) {
    echo "Error executing query: " . $conn->error;
  }
} else {
  // Check if search parameters are provided
  if (
    isset($_GET['location']) &&
    isset($_GET['type']) &&
    isset($_GET['duration'])
  ) {
    $location = $_GET['location'];
    $type = $_GET['type'];
    $duration = $_GET['duration'];

    // Check if the search terms are not empty

  }

  // If $result is still null or if no 'City' parameter and no search parameters are provided, retrieve all listings
  if (!$result) {
    $sql = "SELECT * FROM combined_list ORDER BY id DESC LIMIT 12";
    $result = $conn->query($sql);
    

    // Handle the case where no listings are found
    if (!$result) {
      echo "Error executing query: " . $conn->error;
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
  <link rel="website icon " href="Logo Icon 16_16.svg">
  <!-- ===== Link Swiper's CSS ===== -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap">


  <!-- ===== Fontawesome CDN Link ===== -->






  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
  <link rel="stylesheet" href="https://unpkg.com/@splidejs/splide/dist/css/splide.min.css">

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

  <link rel="stylesheet" href="header_footer.php" !important>
  <link rel="stylesheet" href="newstyle.php">
  <script defer src="script.js"></script>
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


  <title>SpaceKraft</title>
</head>

<body>

  <?php
  include 'header.php';
  ?>
  <div class="main">
    <div class="center">Find Short-Term Rental Spaces

      <p>Your retail concept deserves a space that aligns with<br> your vision, whether it's for a day, a week, or a season</p>
    </div>
    <div class="search">
      <div class="search-container">
      <select class="search-input custom-dropdown" id="locationInput" name="locationInput">
          <option value="">Locations</option>

          <?php
          // Combine and select distinct city names from both tables
          $sqlCombinedList = "SELECT DISTINCT City as locationName FROM combined_list";
          $sqlLocations = "SELECT DISTINCT name as locationName FROM locations";

          $sqlUnion = "($sqlCombinedList) UNION ($sqlLocations) ORDER BY locationName ASC";
          $resultUnion = $conn->query($sqlUnion);

          if ($resultUnion->num_rows > 0) {
            while ($rowUnion = $resultUnion->fetch_assoc()) {
              $locationName = $rowUnion['locationName'];
              echo "<option value=\"$locationName\">$locationName</option>";
            }
          }
          ?>
        </select>



        <hr class="hr">

        <select class="search-input" id="typeInput">
          <option value="">Type</option>
          <option value="Art Gallery">Art Gallery</option>
          <option value="Banquet">Banquet</option>
          <option value="Kiosk">Kiosk</option>
          <option value="Lifestyle Center">Lifestyle Center</option>
          <option value="Mobile Van">Mobile Van</option>
          <option value="Photo studio">Photo studio</option>
          <option value="Restaurant">Restaurant</option>
          <option value="Shopping Center">Shopping Center</option>
          <option value="Shopshare">Shopshare</option>
          <option value="Stall">Stall</option>
          <option value="Storefront">Storefront</option>
          <option value="Warehouse">Warehouse</option>
          <option value="Window Display">Window Display</option>
        </select>




        <hr class="hr">
        <select class="search-input" id="durationInput" required>
          <option value="">Choose Duration</option>
          <option value="days ">Days </option>
          <option value="weeks">Weeks</option>
          <option value="months">Months</option>
        </select>
        <hr class="hr">
        <button style="margin-left: 2%;" class='search-round' onclick="performSearch()"><svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" style="cursor: pointer;">
            <circle cx="24" cy="24" r="24" fill="#031B64" />
            <g clip-path="url(#clip0_1_20198)">
              <path d="M34.2929 35.7071C34.6834 36.0976 35.3166 36.0976 35.7071 35.7071C36.0976 35.3166 36.0976 34.6834 35.7071 34.2929L34.2929 35.7071ZM30.1176 22.0588C30.1176 26.5096 26.5096 30.1176 22.0588 30.1176V32.1176C27.6142 32.1176 32.1176 27.6142 32.1176 22.0588H30.1176ZM22.0588 30.1176C17.6081 30.1176 14 26.5096 14 22.0588H12C12 27.6142 16.5035 32.1176 22.0588 32.1176V30.1176ZM14 22.0588C14 17.6081 17.6081 14 22.0588 14V12C16.5035 12 12 16.5035 12 22.0588H14ZM22.0588 14C26.5096 14 30.1176 17.6081 30.1176 22.0588H32.1176C32.1176 16.5035 27.6142 12 22.0588 12V14ZM27.8223 29.2365L34.2929 35.7071L35.7071 34.2929L29.2365 27.8223L27.8223 29.2365Z" fill="#F0F0F0" />
            </g>
            <defs>
              <clipPath id="clip0_1_20198">
                <rect width="24" height="24" fill="white" transform="translate(12 12)" />
              </clipPath>
            </defs>
          </svg></button>
        <button class="btn right block" onclick="performSearch()">Search</button>
        </button>
        <script>
          function performSearch() {
            // Get the selected values from the dropdowns and input
            var location = document.getElementById('locationInput').value;
            var type = document.getElementById('typeInput').value;
            var duration = document.getElementById('durationInput').value;

            // Redirect to city.php with the search parameters
            window.location.href = 'vs.php?location=' + location + '&type=' + type + '&duration=' + duration;
          }
        </script>
      </div>
    </div>
  </div>
  <div class="heading">
    <p>Recently Listed Spaces</p>
  </div>

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
      176: {
        slidesPerView: 1,
        spaceBetween: 10,
        centeredSlides: true,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
        centeredSlides: false,
      },
      972: {
        slidesPerView: 3,
        spaceBetween: 30,
        centeredSlides: false,
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 40,
        centeredSlides: false,
      },
    },
  });
</script>


  <div class="heading">
    <p>Discover Space Types </p>
    <span>Browse list of our favourite spaces below across India</span>
  </div>
  <div class="types-card">
    <div class="ty-cards type1" id="type1" onclick="redirectTo('Stall')"><span>Stalls</span></div>
    <div class="ty-cards type2" id="type2" onclick="redirectTo('Shopshare')"><span>Shopshare</span></div>
  </div>
  <br>
  <br>
  <div class="types-card">
    <div class="ty-cards type3" id="type3" onclick="redirectTo('Photo studio')"><span>Photo Studio</span></div>
    <div class="ty-cards type4" id="type4" onclick="redirectTo('Banquet')"><span>Banquet</span></div>
  </div>
  <script>
    function redirectTo(type) {
      window.location.href = "vs.php?type=" + type;
    }
  </script>


  <div class="heading">
    <p>Know The City</p>
  </div>
  <div class="city">

    <div class="wrapper">

      <ul class="carousel">
        <li class="card">
          <div class="img"><a href="city.php?City=Bangalore">

              <img src="city_img\Bangalore.png" alt="img" draggable="false"></a>
          </div>
          <h2>Bangalore</h2>

        </li>

        <li class="card">
          <div class="img"><a href="city.php?City=Chennai"><img src="city_img\Chennai.png" alt="img" draggable="false"></a></div>
          <h2>Chennai</h2>

        </li>


        <li class="card">
          <div class="img"><a href="city.php?City=Delhi"><img src="city_img\Delhi.png" alt="img" draggable="false"></a></div>
          <h2>Delhi</h2>

        </li>


        <li class="card">
          <div class="img"><a href="city.php?City=Jaipur"><img src="city_img\Jaipur.png" alt="img" draggable="false"></a></div>
          <h2>Jaipur</h2>

        </li>
        <li class="card">
          <div class="img"><a href="city.php?City=Kolkata"><img src="city_img\Kolkata.png" alt="img" draggable="false"></a></div>
          <h2>Kolkata</h2>

        </li>


        <li class="card">
          <div class="img"><a href="city.php?City=Pune"><img src="city_img\Pune.png" alt=" img" draggable="false"></a></div>
          <h2>Pune</h2>

        </li>
      </ul>

    </div>
    <script>
      const wrapper = document.querySelector(".wrapper");
      const carousel = document.querySelector(".carousel");
      const firstCardWidth = carousel.querySelector(".card").offsetWidth;
      const arrowBtns = document.querySelectorAll(".wrapper i");
      const carouselChildrens = [...carousel.children];

      let isDragging = false,
        isAutoPlay = true,
        startX, startScrollLeft, timeoutId;

      // Get the number of cards that can fit in the carousel at once
      let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

      // Insert copies of the last few cards to the beginning of the carousel for infinite scrolling
      carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
        carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
      });

      // Insert copies of the first few cards to the end of the carousel for infinite scrolling
      carouselChildrens.slice(0, cardPerView).forEach(card => {
        carousel.insertAdjacentHTML("beforeend", card.outerHTML);
      });

      // Scroll the carousel to an appropriate position to hide the first few duplicate cards on Firefox
      carousel.classList.add("no-transition");
      carousel.scrollLeft = carousel.offsetWidth;
      carousel.classList.remove("no-transition");

      // Add event listeners for the arrow buttons to scroll the carousel left and right
      arrowBtns.forEach(btn => {
        btn.addEventListener("click", () => {
          carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
        });
      });

      const dragStart = (e) => {
        isDragging = true;
        carousel.classList.add("dragging");
        // Records the initial cursor and scroll position of the carousel
        startX = e.pageX;
        startScrollLeft = carousel.scrollLeft;
      }

      const dragging = (e) => {
        if (!isDragging) return; // if isDragging is false return from here
        // Updates the scroll position of the carousel based on the cursor movement
        carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
      }

      const dragStop = () => {
        isDragging = false;
        carousel.classList.remove("dragging");
      }

      const infiniteScroll = () => {
        // If the carousel is at the beginning, scroll to the end
        if (carousel.scrollLeft === 0) {
          carousel.classList.add("no-transition");
          carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
          carousel.classList.remove("no-transition");
        }
        // If the carousel is at the end, scroll to the beginning
        else if (Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
          carousel.classList.add("no-transition");
          carousel.scrollLeft = carousel.offsetWidth;
          carousel.classList.remove("no-transition");
        }

        // Clear existing timeout & start autoplay if the mouse is not hovering over the carousel
        clearTimeout(timeoutId);
        if (!wrapper.matches(":hover")) autoPlay();
      };

      // Add event listeners for drag interactions
      carousel.addEventListener("mousedown", dragStart);
      carousel.addEventListener("mousemove", dragging);
      document.addEventListener("mouseup", dragStop);
      carousel.addEventListener("mouseleave", dragStop);

      // Add event listener for the infinite scrolling effect
      carousel.addEventListener("scroll", infiniteScroll);

      // Function to start autoplay
      const autoPlay = () => {
        if (isAutoPlay) {
          timeoutId = setTimeout(() => {
            carousel.scrollLeft += firstCardWidth;
          }, 4000); // Adjust the autoplay interval as needed
        }
      };

      // Start autoplay initially
      autoPlay();
    </script>
  </div>
  <!-- <div class="heading">
    <p>Testimonials</p>
    <p style="margin-top: 2%; font-size:20px; color: var(--Grey-primary, #CECECE);
font-family: Lato;
font-size: 24px;
font-style: normal;
font-weight: 500;
line-height: normal;">What Our Client Says</p>
  </div>
  <div class="Testimonials">
    <div class="testimonial-wrapper">

      <div class="testimonial-card">
        <div class="card-header">
          <div class="thumbnail-area">
            <img alt="customer1" src="bg.jpg">
          </div>
          <div class="user-info">
            <h4>John Doe</h4>
            <div class="card-footer">
              <div class="user-rating">
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="active">★</span>
              </div>

            </div>

          </div>
        </div>
        <div class="user-review">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus!
            Minima, dolorum.</p>
        </div>

      </div>
      <div class="testimonial-card">
        <div class="card-header">
          <div class="thumbnail-area">
            <img alt="customer1" src="img/1.jpg">
          </div>
          <div class="user-info">
            <h4>John Doe</h4>
            <div class="card-footer">
              <div class="user-rating">
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="">★</span>
                <span class="">★</span>
              </div>

            </div>

          </div>
        </div>
        <div class="user-review">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus!
            Minima, dolorum.</p>
        </div>

      </div>
      <div class="testimonial-card">
        <div class="card-header">
          <div class="thumbnail-area">
            <img alt="customer1" src="img/1.jpg">
          </div>
          <div class="user-info">
            <h4>John Doe</h4>
            <div class="card-footer">
              <div class="user-rating">
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="">★</span>
                <span class="">★</span>
              </div>

            </div>

          </div>
        </div>
        <div class="user-review">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus!
            Minima, dolorum.</p>
        </div>

      </div>
      <div class="testimonial-card">
        <div class="card-header">
          <div class="thumbnail-area">
            <img alt="customer1" src="img/1.jpg">
          </div>
          <div class="user-info">
            <h4>John Doe</h4>
            <div class="card-footer">
              <div class="user-rating">
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="active">★</span>
                <span class="">★</span>
              </div>

            </div>

          </div>
        </div>
        <div class="user-review">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus!
            Minima, dolorum.</p>
        </div>

      </div>

   </div>

  </div> -->
  <div class="popup-wrapper">
    <div class="popup-content">
      Establish your pop-up shop for a day,
      a week, a month or even more to elevate
      your brand's visibility and drive sales
    </div>
    <div class="popup-actions">
      <a href="howitworks.php"><button class="btn"><span> How it works </span></button></a>
      <a href="step1.php"><button class="btn"><span> List your space</span></button></a>
    </div>
  </div>
  <?php
  include 'footer.php';
  ?>


  <!-- The overlay and pop-up container for login -->
  <script>
    function submitForm(spaceId) {
      document.getElementById('spaceForm_' + spaceId).submit();
    }
  </script>
  <script src="script.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>

</html>