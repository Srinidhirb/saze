<?php
// Include your database connection code here
// For example, include 'db_connection.php'
include 'connect.php';
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
  } else {
    $user_id = '';
  }
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a database connection in $con

    // Sanitize user input (prevent SQL injection)
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    // Insert comment into the database
    $insertQuery = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";
    mysqli_query($conn, $insertQuery);

    // Redirect back to the article page or show a success message
    header("Location: blog2.php");
    exit();
}

// Fetch comments from the database
$selectQuery = "SELECT * FROM comments";
$result = mysqli_query($conn, $selectQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon " href="Logo Icon 16_16.svg">
    <title>Blog2</title>
    <link rel="stylesheet" href="header_footer.php">
    <link rel="stylesheet" href="blog.php">
    <!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXVP8RTRY0"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-WXVP8RTRY0'); </script>
</head>

<body>
    <?php include 'header.php' ?>


    <section>
        <article>
            <h2>The Rise of Pop-Up Culture in India: A Closer Look at Pop-Up Spaces
            </h2>
            <p>In recent years, India has witnessed a flourishing of the pop-up culture, a trend that's transforming the retail and business landscape. Pop-up events, shops, and experiences are temporary, yet impactful, providing a fresh and dynamic approach to traditional retail. One of the crucial catalysts behind this burgeoning movement is the availability of short-term rental spaces. Let's delve into the compelling world of pop-up culture and the pivotal role short-term rentals play in its success.
                <br>
            <div class="content">
                <div class="sub">
                    <h3>Fostering Creativity and Innovation:
                    </h3>
                    Pop-up spaces offer a canvas for entrepreneurs to unleash their creativity and experiment with unique business ideas. The temporary nature of pop-ups encourages innovation, enabling business owners to take risks and try out concepts that might not be feasible in a long-term commitment.

                </div>
                <br>
                <div class="sub">
                    <h3>Seizing Time-Limited Opportunities:
                    </h3>
                    Short-term rentals provide the flexibility and agility necessary to capitalize on time-sensitive events, holidays, or trends. Businesses can swiftly set up pop-up shops to tap into the heightened consumer interest during specific seasons, festivals, or special occasions.
                </div>
                <br>
                <div class="sub">
                    <h3>Market Testing and Customer Engagement:
                    </h3>
                    Pop-up spaces are ideal for testing new markets and gauging customer interest in a product or service. Businesses can interact directly with their target audience, gather feedback, and fine-tune their offerings based on real-time responses.

                </div>
                <br>
                <div class="sub">
                    <h3>Unlocking the Potential with Space Kraft
                    </h3>

                    In this era of dynamic and versatile business ventures, embracing the pop-up culture is a strategic move. For businesses seeking to ride this wave of innovation and creativity, Space Kraft stands as the ideal partner. With a range of short-term rental spaces perfectly suited for pop-up ventures, Space Kraft offers the platform to showcase your brand, experiment with your ideas, and engage with your audience. Join us at Space Kraft and unlock the perks of agility, creativity, and innovation for your business, propelling your brand towards unmatched success. Discover more at www.spacekraft.in.

                </div>
                <br>
                <div class="sub">
                    Pop-up culture in India is no longer just a trend; it's a powerful tool for businesses to captivate their audience, spark innovation, and thrive in the ever-evolving market. Short-term rentals provide the canvas; it's up to you to paint the masterpiece of success.
                </div>




                </p>
            </div>
            <!-- Add these lines inside the <section> tag, after the article content -->
            <div class="share-section">
                <h3>Share this article:</h3>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://spacekraft.in/blog2.php" target="_blank"><i class="fab fa-facebook fa-2x" style="color: #3b5998;"></i></a>
                <a href="https://twitter.com/intent/tweet?url=https://spacekraft.in/blog2.php&text=Check out this article!" target="_blank"><i class="fab fa-twitter fa-2x" style="color: #1da1f2;"></i></a>
                <a href="https://api.whatsapp.com/send?text=Check out this article: https://spacekraft.in/blog2.php" target="_blank"><i class="fab fa-whatsapp fa-2x" style="color: #25d366;"></i></a>
                <a href="https://www.instagram.com/your-instagram-account" target="_blank"><i class="fab fa-instagram fa-2x" style="color: #c32aa3;"></i></a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=https://spacekraft.in/blog2.php" target="_blank"><i class="fab fa-linkedin fa-2x" style="color: #0077b5;"></i></a>
                <!-- Add more share links for other platforms as needed -->
            </div>

            <div class="comment-section">
                <h3>Leave a Comment:</h3>
                <form class="comment-form" action="" method="post">
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="comment">Your Comment:</label>
                    <textarea id="comment" name="comment" rows="4" required></textarea>

                    <input type="submit" value="Submit Comment">
                </form>

            </div>
          


            </div>


        </article>
        <h4 style="text-align: center;">RELATED BLOG</h4>
        <div class="related-blogs">

            <div class="blog-box">
                <h3>Perks of Short-Term Rentals for Indian Businesses</h3>
                <p>In the dynamic and fast-paced realm of Indian commerce, businesses are constantly evolving and adapting to ever-changing market demands. To succeed in this landscape, adaptability and versatility are paramount. For enterprises seeking greater flexibility and agility in their operations, short-term rentals offer a plethora of advantages.</p>
                <a href="blog1.php">Read More</a>
            </div>

            <div class="blog-box">
                <h3>Pop-Up Shop Strategies And Marketing Tactics for Success in the Indian Business Landscape</h3>
                <p>In the bustling landscape of Indian commerce, where innovation and dynamism reign supreme, the phenomenon of pop-up shops has emerged as a game-changer. Pop-up shops are temporary retail spaces that offer a unique and engaging shopping experience to customers. This trend has gained significant traction in recent years .
                </p>
                <a href="blog3.php">Read More</a>
            </div>
        </div>
        <!-- More articles go here -->
    </section>

    <?php include 'footer.php' ?>
</body>

</html>