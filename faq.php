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
  <title>FAQ's</title>
  <link rel="stylesheet" href="header_footer.php">
  <!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXVP8RTRY0"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-WXVP8RTRY0'); </script>
  <style>
    .faq-heading {
      margin: 125px 0px 20px 30px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 60vh;
     width: 96%;
      background-color: #100a0aa1;
      background-blend-mode: overlay ;
      position: relative;
      
      z-index: 18 ;
      background-image: url('faq.jpg');
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      height: 60vh;


    }

    .faq-heading .heading1 {
      font-size: 36px;
      font-weight: bold;
      color: #ffffff;
    }

    .faq-heading .heading2 {
      font-size: 1rem;
      margin: 16px 0px 0px 0px;
      color: #ffffff;
    }

    .faq-center {
      display: flex;
      margin: 32px 0 0 56px;
      flex-direction: row;
      column-gap: 188px;
      justify-content: center;

    }



    @import url("https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700&display=swap");

    .accordion {
      display: flex;
      flex-direction: column;
      font-family: "Sora", sans-serif;
      max-width: 800px;
      width: 100%;
      min-width: 320px;

      padding: 0 0px;
    }



    .accordion-item {
      margin-top: 16px;
      border: 2px solid #dfdfdf;
      border-radius: 6px;
      background: #ffffff;

      box-shadow: rgba(0, 0, 0, 0.05) 1px 1px 2px 0px;
      transition: 0.3s;

    }

    .accordion-item .accordion-item-title {
      position: relative;
      margin: 0;
      display: flex;

      font-size: 18px;
      font-weight: bold;
      cursor: pointer;
      justify-content: space-between;
      flex-direction: row-reverse;
      padding: 14px 20px;
      box-sizing: border-box;
      align-items: center;
    }

    .accordion-item .accordion-item-desc {
      display: none;
      font-size: 16px;

      line-height: 22px;
      font-weight: 300;
      color: #444;
      border-top: 1px dashed #ddd;
      padding: 10px 20px 20px;
      box-sizing: border-box;
      overflow: hidden;
    }

    .accordion-item input[type="checkbox"] {
      position: absolute;
      height: 0;
      width: 0;
      opacity: 0;
    }

    .accordion-item input[type="checkbox"]:checked~.accordion-item-desc {
      display: block;
    }

    /* Default state */
    .accordion-item input[type="checkbox"]~.accordion-item-title .icon:after {
      content: "+";
      font-size: 20px;
      color: #222222;
      transition: transform 0.3s ease;
      /* Adding transition */
    }

    /* Checked state */
    .accordion-item input[type="checkbox"]:checked~.accordion-item-title .icon:after {
      content: "×";
      /* Displaying "×" instead of "-" */
      transform: rotate(45deg);
      /* Rotating the icon */
    }


    .accordion-item:first-child {
      margin-top: 0;
    }

    .accordion-item .icon {
      margin-left: 14px;
    }

    @media screen and (max-width: 767px) {
      .accordion {
        padding: 0 16px;
      }

      .accordion h1 {
        font-size: 22px;
      }
    }

    .faq-box3 {
      display: flex;
      flex-direction: column;
      row-gap: 10px;
      margin: 0px 56px 44px 40px;
      align-items: center;
    }

    .faq-box {
      width: 240px;
      height: 134px;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      font-size: 1rem;
      font-weight: bold;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    #box1 {
      background-image: url(faq1.png);
      background-size: cover;
      background-position: center;
    }

    #box2 {
      background-image: url(faq2.png);
      background-size: cover;
      background-position: center;
    }

    #box3 {
      background-image: url(faq3.png);
      background-position: center;
      background-size: cover;
    }

    @media (max-width: 1024px) {
      .faq-center {
        flex-direction: column;
        justify-content: center;
        margin: 0;
        row-gap: 30px;
      }

      .faq-heading {
        margin-left: 0;
        padding: 10px 20px;
      }
    }

   
  </style>
</head>

<body>
  <?php include 'header.php' ?>
 
    <div class="faq-heading">
      <span class="heading1">Frequenty Asked Questions</span>
      <span class="heading2">Everything you need to know about SpaceKraft</span>
    </div>
  
  <div class="faq-center">
    <div class="faq">
      <div class="accordion">

        <div class="accordion-item">
          <input type="checkbox" id="accordion1">
          <label for="accordion1" class="accordion-item-title"><span class="icon"></span>What is SpaceKraft?</label>
          <div class="accordion-item-desc">SpaceKraft is a short-term commercial rental platform that connects property owners with businesses and individuals seeking commercial spaces for short-term use, including kiosks, pop-up shops, storefronts, event stalls, and mobile vans.</div>
        </div>

        <div class="accordion-item">
          <input type="checkbox" id="accordion2">
          <label for="accordion2" class="accordion-item-title"><span class="icon"></span>How does SpaceKraft work for property owners?</label>
          <div class="accordion-item-desc">Property owners can list their available commercial spaces on SpaceKraft. You specify rental terms, pricing, and other details. Interested renters can then discover your space, connect with you and close on the transaction. Visit How it works to know more.</div>
        </div>

        <div class="accordion-item">
          <input type="checkbox" id="accordion3">
          <label for="accordion3" class="accordion-item-title"><span class="icon"></span>What types of commercial spaces can I list on SpaceKraft?</label>
          <div class="accordion-item-desc">You can list a variety of commercial spaces, including but not limited to kiosks, popup shops, storefronts, event stalls, and mobile vans. Space types may vary based on location and availability.</div>
        </div>

        <div class="accordion-item">
          <input type="checkbox" id="accordion4">
          <label for="accordion4" class="accordion-item-title"><span class="icon"></span>What are the benefits of using SpaceKraft for property owners?</label>
          <div class="accordion-item-desc">SpaceKraft offers property owners a platform to showcase their spaces to a broad audience, facilitating bookings, and maximizing the revenue potential of their properties.</div>
        </div>

        <div class="accordion-item">
          <input type="checkbox" id="accordion5">
          <label for="accordion5" class="accordion-item-title"><span class="icon"></span>Is it necessary to have insurance for my listed commercial space?</label>
          <div class="accordion-item-desc">While insurance isn't mandatory, it's advisable to have coverage for your space.</div>
        </div>

        <div class="accordion-item">
          <input type="checkbox" id="accordion6">
          <label for="accordion6" class="accordion-item-title"><span class="icon"></span>How can I set the rental price for my space on SpaceKraft?</label>
          <div class="accordion-item-desc">You can determine the rental price for your space based on factors like location, size, amenities, and duration.</div>
        </div>

        <div class="accordion-item">
          <input type="checkbox" id="accordion7">
          <label for="accordion7" class="accordion-item-title"><span class="icon"></span>What is the typical duration of short-term rentals on SpaceKraft?</label>
          <div class="accordion-item-desc">Short-term rentals on SpaceKraft can vary in duration, including daily, weekly, and monthly options, depending on your preferences and space availability.</div>
        </div>

        <div class="accordion-item">
          <input type="checkbox" id="accordion8">
          <label for="accordion8" class="accordion-item-title"><span class="icon"></span>How can I ensure the safety and security of my rental space on SpaceKraft?</label>
          <div class="accordion-item-desc">Property owners are encouraged to implement safety and security measures for their spaces. Communication with renters and clear guidelines can also help ensure a safe and secure rental experience.</div>
        </div>

        <div class="accordion-item">
          <input type="checkbox" id="accordion9">
          <label for="accordion9" class="accordion-item-title"><span class="icon"></span>Can I provide additional services or amenities with my space, such as utilities or internet access?</label>
          <div class="accordion-item-desc">Yes, you can offer additional services or amenities with your space. SpaceKraft allows you to specify what's included, such as utilities, internet access, furnishings, and more.</div>
        </div>

        <div class="accordion-item">
          <input type="checkbox" id="accordion10">
          <label for="accordion10" class="accordion-item-title"><span class="icon"></span>Is there a fee for listing my space on SpaceKraft?</label>
          <div class="accordion-item-desc">Listing your space on SpaceKraft is currently free of charge until further updates are introduced. You have the option to enhance your listing by paying a modest premium listing fee. For detailed information, we invite you to reach out to our sales team by completing the "Contact Us" form.</div>
        </div>

      </div>

    </div>
    <div class="faq-box3">
      <a href="vs.php">
        <div class="faq-box" id="box1">Find a space</div>
      </a>
      <a href="step1.php">
        <div class="faq-box" id="box2">List space</div>
      </a>
      <a href="res.php">
        <div class="faq-box" id="box3">Resources</div>
      </a>
    </div>
  </div>
  <?php include 'footer.php' ?>
</body>

</html>