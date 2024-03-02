<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>
/* RESET */
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap');

:root {
/*========== Colors ==========*/
/*Color mode HSL(hue, saturation, lightness)*/
--first-color: hsl(38, 92%, 58%);
--first-color-light: hsl(38, 100%, 78%);
--first-color-alt: hsl(32, 75%, 50%);
--second-color: hsl(195, 75%, 52%);
--dark-color: hsl(212, 40%, 12%);
--white-color: hsl(212, 4%, 95%);
--body-color: hsl(212, 42%, 15%);
--container-color: hsl(212, 42%, 20%);

/*========== Font and typography ==========*/
/*.5rem = 8px | 1rem = 16px ...*/

--h2-font-size: 1.25rem;
--normal-font-size: 1rem;
}
* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

ul {
list-style: none;
}

a {
text-decoration: none;
color: inherit;
}

button {
background: none;
border: none;
font: inherit;
color: inherit;
}
*{


font-family: Lato;
font-weight: 400;
}




.custom-popup-container {
display: flex;
flex-direction:row;
align-items: center;
justify-content: space-between;
max-width: 100%;
margin: 20px auto;
padding: 29px;
background-color: #ffffff;
padding-left: 3%;
border-radius: 10px;
}

.custom-popup-content {
width: 100%;
max-width: 800px;
}
.custom-popup-content h1{
color: var(--Text-color, #222);
font-family: Lato;
font-size: 24px;
font-style: normal;
font-weight: 600;
line-height: normal;
}

.custom-popup-heading,
.custom-popup-subheading,
.custom-popup-text {
margin-bottom: 2%;
color: #333;
}


.custom-popup-text {
color: #666;
color: var(--Text-color, #222);
font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 400;
line-height: 148%;
}

.custom-popup-img {
width: 100%;
max-width: 600px;
border-radius: 10px;
margin-top: 20px;
}

/* Existing styles remain the same */

/* New styles for the close button */

/* Desktop styles (unchanged) */
.main{

width: 100%;
height: 90vh;
flex-shrink: 0;
background: url('1.jpg');

background-color:black;
background-repeat:no-repeat;
background-size:cover;
background-position:center;

display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
}
@media (max-width: 768px) {
.main {
height:100vh;
}
.resent{

padding-left:0px!important;
padding-right:0px!important;
}
.city{
padding-left:0px!important;
padding-right:0px!important;
}
.wrapper i{
display:none;}

.heading {

font-size: 2rem;

}
.foter{
padding:0!important;
}
.popup-content {
font-size:20px!important;}
}
.center {
color: #FFF;
text-shadow: 0px 4px 8px rgba(26, 26, 26, 0.10);
font-family: Lato;
font-size: 3rem;
font-style: normal;
font-weight: 700;
line-height: 100%; /* 48px */
letter-spacing: 0.5px;
text-align: center;
}

.center p {
padding:20px;
color: #FFF;
text-align: center;
text-shadow: 0px 4px 8px rgba(0, 0, 0, 0.25);
-webkit-text-stroke-width: 0.5;
-webkit-text-stroke-color: #0B0B0B;
font-family: Lato;
font-size: 1.5rem;
font-style: normal;
font-weight: 600;
line-height: 140%; /* 33.6px */
}

.search{
display:flex;
justify-content:center;

}


.search-container {
display: flex;
background: #FFF;
justify-content: space-between;
border-radius:40px;
align-items: center;
width: 675px;
height: 64px;
padding: 6px 6px 3px 6px;
box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.8);

}

.search-input1,
.search-input {
padding: 8px;
margin-right: 10px;
Border: none;
border-radius:40px;
width: 270px;
height: 45px;
color: #303131;
font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 500;
line-height: 100%; /* 20px */
letter-spacing: 0.5px;
}
.search-input1,
.search-input option{
width:24px;
height:24px;
}

/* Style for the dropdown container */
.search-input1 {
width: 200px; /* Adjust the width as needed */
padding: 10px;
font-size: 12px;
Border: none;
outline: none;
appearance: none;
/* Remove default arrow in some browsers */
}

.hr{

height:35px
}
/* Style for the dropdown arrow */
.search-input1::after {
content: '\25BC'; /* Unicode character for downward arrow */
position: absolute;
top: 50%;
right: 10px;
transform: translateY(-50%);
}

/* Style for the dropdown options */
.search-input1 option {
background-color: #fff;
width: 100%;
color: #000000;
font-size: 14px;
font-weight: 600;
}

/* Style for the dropdown when it's open */
.search-input1:focus {
border-color: #3498db;
box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
}

/* Style for the dropdown options when hovered */
.search-input1 option:hover {
background-color: #3498db;
color: #fff;
}

.block{
display:none;
}



/* Media query for smaller screens */
@media (max-width: 768px) {
.center {
color: #FFF;
text-shadow: 0px 4px 8px rgba(26, 26, 26, 0.10);
font-family: Lato;
font-size: 2rem;
font-style: normal;
font-weight: 700;
line-height: 100%; /* 48px */
letter-spacing: 0.5px;
text-align: center;
}

.center p {
padding:20px;
color: #FFF;
text-align: center;
text-shadow: 0px 4px 8px rgba(0, 0, 0, 0.25);
-webkit-text-stroke-width: 0.5;
-webkit-text-stroke-color: #0B0B0B;
font-family: Lato;
font-size: 1rem;
font-style: normal;
font-weight: 600;
line-height: 140%; /* 33.6px */
}
.search-container {
flex-direction: column;
width: 100%;

}
.search-container{
align-items: center;
width: 76%;
height: 9vh;
background: unset;
padding: 6px;
border: 0;

}
.search-round{
display:none;
}
.block{
display:block;
}
.hr{
display:none;
}
.search-input1,
.search-input,
.search-button {
appearence:none;
width: 38vh;
height: 42px!important;
margin-bottom: 10px;
font-size: 13px;
border-radius: 6px;
box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.8);
}
}

.right{
margin-left:87%;
}
/* Add additional styles as needed */

/* resent */
.resent{

padding-left:20px;
padding-right:20px;
}
        /* Your existing CSS styles */
        .unique-container {
            width: 100%;
            
        }

        .card_slider {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 90%;

        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            /* Center-align slides */
        }

       .card {
    width: 289px;
    border-radius: 8px;
    background: #fff;
    border: 1px solid #ccc;
    margin-bottom: 50px;
    transition: 0.3s;
    cursor: pointer;
}

        .card-header img {
            border-radius: 8px 8px 0px 0px;
      width: 100%;
      height:190px;
        }

        .card-body {
      padding: 20px 20px;
      text-align: justify;
      font-size: 18px;
    }

    .card-body h2 {
   font-size:16px;   padding:2px;
   color:#222222;
    }
    .card-body  p{
        padding:2px;
        font-size:14px;
        color:#717579;
    }   
    .card:hover {
      transform: scale(1.00199);
      box-shadow: 0 0 40px -10px rgba(0, 0, 0, 0.25);
    }
        .swiper-wrapper{
            margin-bottom:30px;
        }
/* cityr */
.city {

box-sizing: border-box;

display: flex;
align-items: center;
justify-content: center;

}

.wrapper {
max-width: 100%;
border-radius: 2%;
width: 87%;
position: relative;
}

.wrapper i {
top: 50%;
height: 50px;
width: 50px;
cursor: pointer;
font-size: 2.25rem;
position: absolute;
text-align: center;
line-height: 50px;
font-weight: 20px;
transform: translateY(-50%);
transition: transform 0.1s linear;
}

.wrapper i:active {
transform: translateY(-50%) scale(0.85);
}

.wrapper i:first-child {
left: -60px;
}

.wrapper i:last-child {
right: -60px;
}

.wrapper .carousel {
display: grid;
grid-auto-flow: column;
grid-auto-columns: calc((100% / 5) - 16px); /* Adjusted for 4 cards per row */
overflow-x: auto;
scroll-snap-type: x mandatory;
gap: 16px;
border-radius: 8px;
scroll-behavior: smooth;
scrollbar-width: none;
}

.carousel::-webkit-scrollbar {
display: none;
}

.carousel.no-transition {
scroll-behavior: auto;
}

.carousel.dragging {
scroll-snap-type: none;
scroll-behavior: auto;
}

.carousel.dragging .card {
cursor: grab;
user-select: none;
}

.carousel :where(.card, .img) {
display: flex;
width:100%;
justify-content: center;
align-items: center;
}

.carousel .card {
scroll-snap-align: start;
height: 250px;

list-style: none;
background: #fff;
cursor: pointer;
padding-bottom: 10px;
flex-direction: column;
border-radius: 8px;
border: 0.5px solid #D9D9D9;
margin-right: 16px; /* Add margin to create space between cards */
}

.carousel .card .img {


width: 100%;
border-radius: 20px;
}

.card .img img {
width: 100%;
fit-content:contain;
height: 190px;
padding: 0px;
border-radius: 9px;
border: 4px solid #fff;
}

.carousel .card h2 {
color: var(--Text-color-1, #131313);
font-family: Lato;
font-size: 32px;
font-style: normal;
font-weight: 500;
line-height: normal;
}

@media screen and (max-width:1200px) {
.wrapper .carousel {
grid-auto-columns: calc((100% / 3) - 9px);
}


.carousel .card{
width:100%;
height: 35vh;
}
.card .img img{
height:27vh;

}
}

@media screen and (max-width: 600px) {
.wrapper .carousel {
grid-auto-columns: 100%;
}
}






/* Testimonials */

.Testimonials{
height: 55vh;

}
.testimonial-wrapper {
display: flex;
flex-wrap: wrap;
justify-content: center;
gap: 20px;
padding: 3% 0;
}

.testimonial-card {
background-color: #ffffff;
border-radius: 10px;
padding: 20px;
width: 300px;
height: 35vh;
box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
}

.thumbnail-area {
width: 80px;
height: 80px;
overflow: hidden;
border-radius: 50%;
margin-right: 25px;
}

.thumbnail-area img {
width: 100%;
}

.card-header {
display: flex;
align-items: center;
margin-bottom: 10px;
}

.user-info h4 {
margin: 0;
font-size: 26px;
font-weight: 600;
}

.user-info p {
margin: 5px 0 0;
font-size: 14px;
font-weight: 400;
color: #666;
}

.user-review p {
margin: 0;
font-size: 18px;
font-weight: 400;
line-height: 1.7;
color: #333;
}

.card-footer {
display: flex;
justify-content: space-between;
align-items: center;
margin-top: 10px;
font-size: 14px;
color: #666;
}

.user-rating {
display: flex;
}

.user-rating span {
color: #000;
font-size: 18px;
}

.user-rating span.active {
color: #fbc02d;
}

@media screen and (max-width: 767px) {
.testimonial-wrapper {
flex-direction: column;
align-items: center;
}

.testimonial-card {
width: 85%;
}
}



/* content */
content {
display: flex;
flex-direction: column;
align-items: center;
text-align: center;
color: #a4a3a3;
font-size: 30px;
font-family: Lato;
font-weight: 400;
}

h4 {
margin: 0; /* Remove default margin to prevent unwanted spacing */
}

button {
margin-top: 0px; /* Adjust the top margin for spacing between the h4 and buttons */
}


/* end */
/* Default styles */

.end {

display: flex;
width: 100%;

flex-direction: column;
justify-content: center;
align-items: center;
gap: 40px;
}
.button-container{

}


.btn1{
border-radius: 31px;
border: 1px solid rgba(41, 177, 229, 0.40);
background: var(--Brand-color, #031B64);
padding: 7px;
justify-content: center;
align-items: flex-end;
gap: 8px;
width: 93%;
color: #F9F9F9;
font-family: Lato;
font-size: 19px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
}
.btn span{
color: #F9F9F9;
font-family: Lato;
font-size: 24px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
.text{

color: #ADACAC;
text-align: center;
font-family: Lato;
font-size: 36px;
font-style: normal;
font-weight: 600;
line-height: normal;
letter-spacing: 0.36px;
}

.button-container {
width:60%;
display:flex;
flex-direction:coloum;
justify-content:space-around;
}
.button-container span{
color: #F9F9F9;
font-family: Lato;
font-size: 24px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
.popup-wrapper {
max-width: 900px;
margin: 50px auto;
background-color: #fff;
padding: 10px;
text-align: center;

}

.popup-content {
color: #222222;
text-align: center;
font-family: Lato;
font-size: 32px;
font-style: normal;
font-weight: 500;
line-height: normal;
letter-spacing: 0.32px;
}

.popup-actions {
padding:20px;
display: flex;
justify-content: center;
column-gap: 50px;
width:100%;
}

.popup-button {
display: flex;
padding: 16px;
justify-content: center;
align-items: flex-end;
gap: 8px;
border-radius: 6px;
background: var(--Brand-color, #031B64);
}
.popup-button span{
color: #F9F9F9;
font-family: Lato;
font-size: 1rem;
font-style: normal;
font-weight: 400;
line-height: normal;
}

.popup-button:hover {
background-color: #2980b9;
}

@media (max-width: 768px) {
.popup-wrapper {
max-width: 90%;
}
}


/* Responsive styles */

@media screen and (max-width: 768px) {
.Testimonials {
height: 82vh;}
.end{
margin-top: 10%;
}
.card__data{
font-size: 18px;
height: 30vh;
}
.end{
padding:0%;
}

.button-container button{
width: 10%;
}

.button-container button {
width: 100%; /* Make buttons take full width on smaller screens */
}
}


/* how it works */
.works {
width: 100%;
max-width: 1519px;
height: 690px;
background-image: url("howitworks1.png");
background-repeat: no-repeat;
background-size: cover; /* Adjusted to cover for responsiveness */
background-position: center;
text-align: center;
position: relative;
}

.works::before {
content: '';
position: absolute;
width: 100%;
height: 40%;
background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.9));
bottom: 0;
left: 0;
pointer-events: none;
}

.works h2 {
font-weight: 400;
font-size: 70px;
margin-top: 37%;
font-family: 'Lato', sans-serif; /* Fixed font declaration */
margin-left: 15%;
position: absolute;
color: #ffffff;
text-shadow: 2px 2px 4px rgb(0, 0, 0);
}
.list-space-container {
display: flex;
flex-direction: row;

align-items: center;
justify-content: space-between;
max-width: 100%;
margin: 20px auto;
padding: 20px;
background-color: #ffffff;

border-radius: 10px;
padding-left: 6%;
}
.list-space-content1 {
width: 100%;
max-width: 100%;
padding-left: 20%;
}

/* Media query for responsiveness */
@media screen and (max-width: 768px) {
.works {
height: 500px; /* Adjust the height for smaller screens */
}
.custom-popup-container{
flex-direction:column;
}
.list-space-container{
flex-direction:column;
}
.list-space-content1{
padding-top:5%;
width:auto;
padding-left:0;
}
.works h2 {
font-size: 40px; /* Adjust the font size for smaller screens */
margin-top: 100%; /* Move the text down in smaller screens */
margin-left: 5%; /* Adjust the margin-left for smaller screens */
}
}

.containerinfo {
display: flex;
flex-wrap: wrap;
justify-content: space-around;
padding: 20px;
background-color: #F4F7FB;
}

.box {
background-color: white;
flex: 1;
max-width: 450px;

margin: 10px;
padding: 20px;
border: 1px solid #ccc;
border-radius: 5px;
}

.box p{
margin-top: 3%;
margin-left: 8%;
color: var(--Text-color, #222);
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: 140%; /* 22.4px */
}
.box:hover{
transform: scale(1.02);
}
.box-header {
display: flex;
align-items: center;
justify-content: space-between;
margin-bottom: 10px;
}
.box-header h2{
color: #383838;
font-family: Lato;
font-size: 24px;
font-style: normal;
font-weight: 600;
line-height: normal;
}


@media (max-width: 768px) {
.containerinfo {
flex-direction: column;
}
}









.list-space-content {
width: 100%;
max-width: 100%;
padding-left: 6%;
}

.list-space-heading,
.list-space-text {
color: var(--Text-color, #222);
font-family: Lato;
font-size: 24px;
font-style: normal;
font-weight: 400;
line-height: normal;
letter-spacing: 0.5px;
}


.list-space-btn {
background-color: #333333;
color: #fff;
padding: 10px 20px;
font-size: 16px;
border: none;
cursor: pointer;
border-radius: 5px;
margin-top: 10px;
width: 32%;
height: 7vh;
}

.list-space-btn:hover {
background-color: #ff5757;
}


.contact-container {
background-image: url("hiw2.png"); /* Replace 'your-background-image-url.jpg' with your actual image URL */
background-size:cover;
background-repeat: no-repeat;
background-position: center;
height: 40vh;
display: flex;
align-items: center;
justify-content: center;
text-align: center;
}



/* FAQS */
.centered-div {
margin-top: 5%;
height: 400px; /* Set your desired height */
background-image: url('https://www.tritoncanada.ca/wp-content/uploads/2021/04/faqs-hero.jpg'); /* Replace with your background image URL */
background-size: cover;
background-position: center;
display: flex;
flex-direction: column;
justify-content: center;
color: #fff; /* Text color */
text-align: center;
padding-left: 20px; /* Adjust as needed */
}

.centered-div h1 {
font-size: 56px;
margin-bottom: 10px;
font-weight: 400;
}

.centered-div p {
font-size: 28px;
margin: 0;
}


.containerfaq {
display: flex;
justify-content: space-between;
max-width: 100%;
margin: 20px 20px; /* Adjust margin */
height: 150vh;
}

.faq-wrapper {
padding-bottom: 4%;
margin-top: 2%;
height: 120vh;
}

.faq-container {
width: 80%;
background-color: #fff;
border-radius: 10px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.faq-item {
padding: 20px;
border-bottom: 1px solid #e0e0e0;
cursor: pointer;
transition: background-color 0.3s ease-in-out;
display: flex;
justify-content: space-between;
align-items: center;
}

.faq-item:last-child {
border-bottom: none;
}

.faq-question {
font-size: 18px;
font-weight: 700;
padding-bottom: 3px;
padding-top: 3px;
}

.faq-answer {
font-size: 16px;
max-height: 0;
overflow: hidden;
transition: max-height 0.3s ease-in-out;
text-align: left; /* Adjusted to start from the left */
padding: 16px 20px; /* Adjusted padding */
width: 100%; /* Make the answer span the full width */
}

.icon-container i {
font-size: 16px;
cursor: pointer;
transition: transform 0.3s ease-in-out;
}

.icon-container i.active {
transform: rotate(45deg);
}

/* Additional CSS to toggle the answer visibility */
.faq-item.active .faq-answer {
max-height: 1000px; /* Adjust a sufficiently large value to show the answer */
}

.rightside {
width: 48%;
box-sizing: border-box;
margin-top: 3%;
height: 62vh;
}

.image-text-container {
background-color: #fff;
border-radius: 10px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
padding: 20px;
}

.image-text-item {
display: flex;
align-items: center;
margin-bottom: 10px;
}

.image-container {
width: 35%;
margin-right: 10px;
}

.image-container img {
width: 100%;
height: 100%;

}

.text-container {
font-size: 16px;
color: #333;
}

.line {
width: 80%;
height: 2px;
background-color: #ccc;
margin-top: 10px;
margin-bottom: 10px;
}
@media screen and (max-width: 768px) {
.containerfaq {
flex-direction: column;
align-items: center;
width: 100%;
}

.faq-wrapper,
.rightside {
width: 100%;
}

.faq-container {
width: 100%;
}

.image-container {
width: 50%;
margin-bottom: 10px;
}
.rightside {
width: 100%;
margin-bottom: 70px; /* Adjust the margin as needed */
}


}

.active{
font-weight:bolder;
color: #ff5757;
}


.contact {
margin: 0 auto;
width: 80%;
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a box shadow */
}

.title {
padding: 30px;
padding-bottom: 10px;
color: #222;
font-family: Lato;
font-size: 2.25rem;
font-style: normal;
font-weight: 700;
line-height: normal;
}

.title-below {
color: #222;
font-family: Lato;
font-size: 1rem;
font-style: normal;
font-weight: 400;
line-height: 100%;
/* 16px */
}

.info {
padding: 50px;
display: inline-flex;
flex-direction: row;
justify-content: space-between;
align-items: center;
gap: 48px;
color: #222;
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 600;
line-height: 100%;

letter-spacing: 0.48px;
}
/* Responsive styles for smaller screens */
@media screen and (max-width: 768px) {
.title {
font-size: 1.5rem;
padding: 20px;
}

.title-below {
font-size: 0.9rem;
}

.info {
padding: 30px;
text-align: center;
flex-direction: column;
align-items: center;
gap: 20px;
}
}


.types-card{
display: flex;
justify-content: center;
width:100%;
height:auto;
display: flex;
flex-direction: row;
justify-content: center;
flex-flow: wrap;
column-gap: 35px;
row-gap: 30px;
}

.types-card .ty-cards{
width: 578px;
display: flex;


height: 310px;
flex-direction: row;
}
.types-card .ty-cards span{
  font-size: 2rem;
 font-weight: bolder;
 font: Lato;
 color:#fdfdfd;
 text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}
.type1{
background-image: url(lptypes1.jpg);
background-position: center;
background-size: cover;
display: flex;
align-items: center;
justify-content: center;
cursor:pointer;


}
.type2{
background-image: url(lptypes2.png);
background-position: center;
background-size: cover;
display: flex;
align-items: center;
justify-content: center;

cursor:pointer;

}
.type3{
background-image: url(lptypes3.png);
cursor:pointer;

background-position: center;
background-size: cover;
display: flex;
align-items: center;
justify-content: center;

}
.type4{
background-image: url(lptypes4.png);
cursor:pointer;

background-position: center;
background-size: cover;
display: flex;
align-items: center;
justify-content: center;

}

@media screen and (max-width: 1250px){
.types-card .ty-cards{
width: 478px;
display: flex;


height: 310px;
flex-direction: row;
}
}

@media screen and (max-width: 768px){
.types-card .ty-cards{
width:80%;
}
}