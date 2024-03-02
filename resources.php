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
    <title>Resources</title>
    <link rel="website icon " href="Logo Icon 16_16.svg">
<title>Resources</title>
<link rel="stylesheet" href="header_footer.php">

<style>
   

   .flex{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}


.container {
    
  padding-top: 0;
  padding-bottom: 0;
    width: 88%;
    display: flex;
    flex-direction: row;

}

.left {
    width: 65%;
    height: 72.5vh;
    margin-right: 20px;
    position: relative;
}

.left img {
    width: 100%;
    height: 72vh;
    object-fit: cover;
    border-radius: 8px;
}

.right {
    width: 60%;
    display: flex;
    flex-direction: column;
    position: relative;
}

.rightchild {
    height: 35vh;
    margin-bottom: 20px;
    width: 100%;
}

.rightchild img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 8px;
}

/* Responsive styling */
@media (max-width: 1003px) {
    .how-it-works{
        padding: 0%;
    }
    .left img {
        height: 35vh;
    }
    .text{
        font-size: 1.7rem !important;
    }
    .main{
           margin-top: 15%;
    height: 50vh;
    width: 100%;
    }
    .container {
       
        flex-direction: column;
    }
    .left {
        width: 100%;
        height: 100%;
        margin-bottom: 20px;
    }
    .right {
        height: 100%;
        width: 100%; /* Adjust as needed */
    }
    .left,
    .rightchild {
        margin-right: 0;
    }
    .text,.text1,.text1b{
        font-size: 24px;
    }
}

.resource{
    position: relative;
    margin-top: 205;
}

.resource img{
    flex-direction: column;
    object-fit: cover;
    padding: 85px;
    width: 88.5%;
    height: 40vh;
    border-radius:5%;
    padding-top: 0;
    padding-bottom: 0;
}

.image-with-caption {
    position: relative;
  }
  
  .image-with-caption figcaption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    
    color: white;
    padding: 20px;
    text-align: center;
  }

  .text{
    position: absolute;
    bottom: 0%;
    color: #333;
font-family: Lato;
font-size: 34px;
background-color: antiquewhite;
font-style: normal;
font-weight: 400;
width: 100%;
line-height: normal;
letter-spacing: 0.5px;
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
    /* text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); */
  }
  /* .text2{
   position: relative;
    bottom: 0;
    top: 0%;
    font-weight: 600;
    color: #ffffff;
    background-color: #201e1e9f;
    font-size: 2.5rem;
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
  } */
  .text1{
    position: absolute;
    bottom: 52%;
    color: var(--Text-body-1, #A4A3A3);
font-family: Lato;
font-size: 24px;
width: 100%;
background-color: antiquewhite;
font-style: normal;
font-weight: 400;
line-height: normal;
letter-spacing: 0.5px;
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
    /* text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); */
  }
  .text1b{
    position: absolute;
    bottom: 2%;
    color: #333;
    width: 100%;
font-family: Lato;
font-size: 24px;
background-color: antiquewhite;
font-style: normal;
font-weight: 400;
line-height: normal;
letter-spacing: 0.5px;
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
    /* text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); */
  }
 .date{
    margin-left: 2%;
    font-weight: 600;
    color: #000000;
    font-size: 1rem;
    position: absolute;
    /* text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); */
    bottom: 92%;
 }
 .date1{
    margin-left: 2%;
    color: #000000;
    font-weight: 700;
    font-size: 1rem;
    position: absolute;
    bottom: 42%;
    /* text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); */
 }
</style>
</head>
<body>
<?php include 'header.php'?>

<h1 class='h1' id='h1'>Resources</h1>
<div class="flex" >
    <div class="container">
        <div class="left">
            <a href="blog1.php"> <img src="https://www.hubspot.com/hubfs/pop%20up%20events.png" alt="Left Image"></a>
            <div class="date">12-01-2024</div>
            <div class="text">Perks of Short-Term Rentals for Indian Businesses</div>
        </div>
        <div class="right">
            <div class="rightchild">
                <div class="date">12-01-2024</div>
                <div class="text1">The Rise of Pop-Up Culture in India: A Closer Look at Pop-Up Spaces</div>
                <a href="blog2.php"> <img src="https://cdn.shopify.com/s/files/1/1246/6441/files/Kylie_Cosmetics.jpg?v=1637343145" alt="Right Image 1"></a>

            </div>
            <div class="rightchild">
                <div class="date1">12-01-2024</div>
                <a href="blog3.php"><img src="https://media.sproutsocial.com/uploads/2023/10/Social-media-marketing-What-it-is-and-how-to-build-your-strategy.jpg" alt="Right Image 2"></a>
                <div class="text1b"> Pop-Up Shop Strategies And Marketing Tactics for Success in the Indian Business Landscape</div>
            </div>
        </div>
    </div>
    <!-- <div class="resource">
    <div>
        <img src="bg1.jpeg" alt="">
        <div class="text2">The Rise of Pop-Up Culture in India: A Closer Look at Pop-Up Spaces</div>
    </div> -->
</div>
<?php include 'footer.php'?>
</body>
</html>




    
