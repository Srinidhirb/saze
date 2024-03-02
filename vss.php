<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap');
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

* {
color: rgb(0, 0, 0);

font-family: Lato;
font-weight: 400;
}




/* IND LISTING */
.ind_details {
margin:97px 0px 0px 66px;
padding-bottom: 72px;
}

.image_display {
height: 70vh;

width: 64%;
align-items: center;
}


/* display */
.space-info {
margin-top: 2%;
padding-left: 48px;
width: 100%;

text-align: left;
}

h1 {
margin-top: 0;
margin-bottom: 2%;
font-size: 30px;
font-weight: bold;
}

.price {
color: #3e4348;

font-weight: bold;
font-size: 1.4em;
}

.row {
display: flex;
flex-direction:column;
justify-content: space-between;
margin-top: 2%;


/* Align items vertically in the center */
margin-top: 10px;
}

.address,
.features,
.views {


font-size: 20px;
padding:10px;
padding-top:0%;
width: 90%;
/* Two items per row with a little space between them */
display: flex;
align-items: center;

}
.address p{
color: var(--Text-body-1, #222222) !important;
font-family: Lato;
font-size: 20px;
font-style: normal;
font-weight: 500;
line-height: 100%;
line-height: 2em;
}
.features p{
color: var(--Text-body-1, #222222) !important;
font-family: Lato;
font-size: 20px;
font-style: normal;
font-weight: 500;
line-height: 100%;
line-height: 2em;
}
.views p{
color: var(--Text-body-1, #A4A3A3) !important;
font-family: Lato;
font-size: 20px;
font-style: normal;
font-weight: 500;
line-height: 100%;
line-height: 2em;
}

.center{
width: 100%;
text-align:center ;
color: #222;
padding:20px;
font-family: Lato;
font-size: 20px;
font-style: normal;
font-weight: 700;
line-height: normal;
}
.icon {
margin-right: 5px;
}



@media screen and (max-width: 768px) {
.ind_details {
margin-top: 10%;
}

.image-container {
flex-direction: column;
}

.row {
flex-wrap: wrap;
font-size: 20px;
}



.details {
margin-left: 0;
}

.address,
.features,
.views {
padding: 1%;
width: 100%;
margin-top: 10px;

}
}


.top {
margin-top: 2%;
margin-bottom: 1%;
color: #222222;
font-family: Lato;
font-size: 28px;
font-style: normal;
font-weight: 700;
line-height: 110%; /* 19.8px */

}
.bottom{
margin-bottom: 2%;
color: var(--Text-body-1, #A4A3A3);
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 500;
line-height: 100%;
line-height: 2em;

}
a:hover{
color:#4AE9E9;
}

.about {
width: 90%;
color: #000;
text-align:justify;
font-family: Lato;
font-size: 24px;
font-style: normal;
font-weight: 600;
line-height: 100%; /* 24px */
}

.about p {
margin-top: 3%;
margin-bottom: 3%;
color: #4A494B;
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: 100%; /* 16px */
letter-spacing: 0.32px;
}



/* LISTING */
* {
color: rgb(0, 0, 0);

font-family: Lato;
font-weight: 400;
}

.content {
display: flex;

justify-content: center;
height: 10vh;
margin-top:7%;
padding-bottom:7%;
}

.content-div p {
padding:20px;

text-align:center;
color: var(--Text-title, #222222);
font-family: Lato;
font-size: 36px;
font-style: normal;
font-weight: 700;
line-height: normal;

}

@media only screen and (max-width: 768px) {

/* Adjust styles for smaller screens (tablets) */
.content {
margin-top: 18%;
flex-direction: column;
align-items: center;
}
}

@media only screen and (max-width: 480px) {

/* Further adjustments for even smaller screens (phones) */
.content {
margin-top: 29%;
height: 7%;
}
}

.container {
    display: flex;
    flex-wrap: wrap;
    cursor: pointer;
    padding: 17px 144px;
    padding-bottom: 0;
}


.listing-container {
border: 1px solid #ddd;
margin: 10px;
width: calc(25% - 20px);
/* 25% width with padding on both sides */
box-sizing: border-box;
border-radius: 6px;
text-align: left;
min-height: 290px;
/* Set a minimum height for each container */
display: flex;
flex-direction: column;
}
.listing-container:hover {
transform: scale(1.01);
box-shadow: 0 0 40px -10px rgba(0, 0, 0, 0.1);
}
.listing-image img {
max-width: 100%;
max-height: 100%;
height: auto;
width: auto;
object-fit: contain;
}

.listing-image {
border-radius: 6px 6px 0 0;
width: 100%;

}

.info {
margin-top: 10px;
padding-left: 10px;
margin-bottom: 5px;
color: var(--Text-body-1, #222222);
font-family: Lato;
font-size: 20px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
.info1 strong{
color: var(--Grey-primary, #CECECE);
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: normal;
}

.info1 {
font-size: 14px;
margin-bottom: 5px;
padding-left: 10px;
color: var(--Grey-primary, #717579);
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: normal;
}

.monthly-price {
font-size: 16px;
color: #4CAF50;
/* Green color, you can adjust it */
font-weight: bold;
}

/* Style for the "View Details" button */
button {
background-color: #232def;
color: white;
padding: 10px;
border: none;
cursor: pointer;
border-radius: 5px;
margin-top: auto;
/* Align the button to the bottom */
}

/* Optional: Style for the "View More" button when details are visible */
.view-more-btn.active {
background-color: #45a049;
}

@media only screen and (max-width: 1200px) {
.listing-container {
width: calc(33.33% - 20px);
/* Adjust width for three items per row */
}
}

@media only screen and (max-width: 800px) {
.listing-container {
width: calc(50% - 20px);
/* Adjust width for two items per row */
}
}

@media only screen and (max-width: 600px) {
.listing-container {
width: 100%;
/* Full width for one item per row */
}

.pagination {
flex-direction: column;
}

.pagination a {
margin: 5px 0;
}
}


.options {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 2px;
    border-radius: 4px;
    border: 1px solid #CECECE;
    padding: 16px 150px;
    color: #222;
    row-gap: 17px;
    font-family: Lato;
    font-size: 20px;
    font-style: normal;
    font-weight: 400;
    line-height: 22px;
}

.left-container,
.right-container {

display: flex;


}

.select-style {
    border-radius: 4px;
    border: 1px solid #CECECE;
    margin-right: 16px;
    padding: 2px 1px;
    color: #222;
    font-family: Lato;
    font-size: 18px;
    font-style: normal;
    font-weight: 400;
    line-height: 22px;
    height: 40px;
    width: 131px;
}

.right-container {
display: flex;
justify-content:end;

}
.amenities-container {
margin-top: 10px;
position: relative;
}

label[for="amenitiesDropdown"] {
display: block;
margin-bottom: 5px;
}

#amenitiesDropdown {
display: none;
position: absolute;
top: 30px;
right:0;
width: 600px;
background-color: #fff;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
border-radius: 4px;
padding: 10px;
z-index: 1;
}

.amenity-checkbox {
display: none;
}

.amenity-label:hover {
background-color: #7CAFD5;
color: #000000;
}

.amenity-label {
display: inline-block;
width: calc(31.33% - 10px); /* Three items in a row with margin */
margin-right: 10px;
margin-bottom: 10px;
cursor: pointer;
border: 1px solid #ccc;
border-radius: 4px;
color: rgb(0, 0, 0);
padding: 8px;
user-select: none;
transition: background-color 0.3s;
}

.amenity-checkbox:checked + .amenity-label {
background-color: #031B64;
color: #ffffff;
}


.submit-button {
padding: 10px 20px;
background-color: #031B64;
color: #fff;
border: none;
border-radius: 4px;
cursor: pointer;
font-size: 16px;
display:none;/* Initially hide the button */
}

.submit-button:hover {
background-color: #7CAFD5;
}
.submit-button1 {
padding: 10px 20px;
background-color: #031B64;
color: #fff;
border: none;
border-radius: 4px;
cursor: pointer;
font-size: 16px;
/* Initially hide the button */
}

.submit-button1:hover {
background-color: #7CAFD5;
}
#display{
align-items:endl
}
@media (max-width: 998px) {
.options,
{
flex-direction: column; /* Change to column for smaller screens */
}
.left-container,
.right-container{
padding: 10px;

flex-direction: column;
padding-top: 0;
padding-bottom: 10px;

}

.select-style {
width: 100% /* Set width for 2 items in a row with margin */
}


#display {
display: block; /* Show the button */
}

.options {
display: none; /* Initially hide the options */
}
}

/* Add additional styles as needed */



@media only screen and (max-width: 600px) {

/* Further adjustments for even smaller screens */
.content {
margin-top: 107px;
}


}

<!--.info {-->
<!--margin-top: 2%;-->
<!--font-size: larger;-->
<!--margin-left: 2%;-->
<!--font-weight: bolder;-->
<!--}-->

<!--.info1 {-->
<!--margin-top: 2%;-->
<!--font-size: larger;-->
<!--margin-left: 2%;-->
<!--}-->




.pagination {
text-align: center;
padding: 32px;
padding-bottom: 72px;
}

.pagination a {
display: inline-block;
padding: 4px 2px;
margin: 0 5px;
text-decoration: none;
background-color: #f2f2f2;
color: #333;
border-radius: 50%;
cursor: pointer;
width: 2%;
}

.pagination a:hover {
background-color: #4AE9E9;
color: white;
}

.pagination .active {
background-color: #031B64;
color: white;
}

.pagination .arrow {
font-size: 20px;
vertical-align: middle;
}
@media (max-width: 600px) {
.pagination a {
padding: 5px;
margin: 0 3px;
width: auto;
font-size: 12px;
}

.pagination .arrow {
font-size: 16px;
}
}
/* Slideshow container */



/* Responsive height adjustment for smaller screens */
@media screen and (max-width: 768px) {
.slideshow-container {
height: 100%;
width: 100%;
/* Adjust as needed for smaller screens */
}
.top{
font-size:20px;
}
}

/* Hide the images by default */
.slideshow-container {
max-width: 762px;
width:100%;
position: relative;
height: 66vh;
overflow: hidden;
}

.mySlides {
display: none;
}

.details{
width:55%;
}
.mySlides img {
width: 100%;
height: 65vh;

/* Maintain aspect ratio and cover the entire container */
}

/* Next & previous buttons */
.prev,
.next {
cursor: pointer;
position: absolute;
top: 50%;
width: auto;
margin-top: -22px;
padding: 16px;
color: white;
font-weight: bold;
font-size: 18px;
transition: 0.6s ease;
border-radius: 0 3px 3px 0;
user-select: none;
}

/* Position the "next button" to the right */
.next {
right: 0;
border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
background-color: rgba(0, 0, 0, 0.8);
}

/* Caption text */
.text {
color: #f2f2f2;
font-size: 15px;
padding: 8px 12px;
position: absolute;
bottom: 8px;
width: 100%;
text-align: center;
}

h4{
width:90%;
}
/* Number text (1/3 etc) */
.numbertext {
color: #f2f2f2;
font-size: 12px;
padding: 8px 12px;
position: absolute;
top: 0;
}

/* The dots/bullets/indicators */
.dot {
cursor: pointer;
height: 15px;
width: 15px;
background-color: #000000;
border-radius: 50%;
display: inline-block;
transition: background-color 0.6s ease;
}
.amenities-list {
list-style-type: none;
margin-bottom: 1%;

padding: 0;
display: flex;
flex-wrap: wrap;
}

.amenities-list li {
width: 25%;
/* Show 4 amenities in a row */
box-sizing: border-box;
padding: 5px;
}

/* Clear the float every 4th item to start a new row */
.amenities-list li:nth-child(5n) {
clear: both;
}

/* Responsive Styles */
@media screen and (max-width: 768px) {
.amenities-list li {
width: 50%;
/* Show 2 amenities in a row on smaller screens */
}
.amenities-list{
margin-top: 3%;
}
.amenities-list li:nth-child(3n) {
clear: none;
/* Don't clear the float on the 3rd item in each row on smaller screens */
}
}

.active,
.dot:hover {
background-color: #717171;
}

/* Fading animation */
.fade {

animation-name: fade;
animation-duration: 1.5s;
}
@media screen and (max-width: 968px) {
.slideshow-container {
height: 100%; /* Adjust height for smaller screens */
width: 100%; /* Adjust width for smaller screens */
}

.mySlides img {
width: 100%; /* Adjust image width for smaller screens */
height: 100%; /* Maintain aspect ratio */
}

/* Additional adjustments as needed for smaller screens ... */
}
/* Additional responsive adjustments as needed */
@media screen and (max-width: 480px) {
.slideshow-container {
height: 100%;
/* Adjust as needed for even smaller screens */
}
}


.left {
margin-left: 47%;
margin-top: 4%
}

.flex {
display: flex;
flex-direction: row;

}

@media (max-width: 600px) {
hr {
width: 100%;
}
.prize-cont{
width:98%!important;
}

.flex {
flex-direction: column;
margin-bottom: 15px
}
}

.prize-cont {
width: 377px;
text-align: left;
border: 2px solid #ccc;
border-radius: 10px;
padding: 20px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
/* Add box shadow */
}


.h2 {
margin-bottom: 20px;
color: #333;
font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 600;
line-height: normal;
letter-spacing: 0.5px;
}

table {
width: 100%;
border-collapse: collapse;
}

th{
color: var(--Text-title, #989797);
font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 600;
line-height: 100%; /* 18px */
}
td{
color: var(--Text-color-2, #161616);
font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 600;
line-height: 100%; /* 18px */
}
th,
td {
padding: 10px;
text-align: left;
}

.contact-button {
background-color: blue;
color: white;
padding: 10px 20px;
border: none;
border-radius: 5px;
cursor: pointer;
width: 100%;
margin-top: 3%;
}

.flex-left {
width: 66%;
}



@media screen and (max-width: 1200px) {

/* Styles for screens up to 1200px wide */
.space-info {
padding-left: 0px;
}

.views,
.address,
.features {
width: 100%;


color: var(--Text-body-1, #222222);
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: 100%; /* 16px */
}
}

@media screen and (max-width: 992px) {

/* Styles for screens up to 992px wide */
/* Styles for screens up to 992px wide */
.image_display {
width: 100%;
height: 100%;
}

.slideshow-container {
height: 100%;
}
}


@media screen and (max-width: 968px) {

/* Styles for screens up to 768px wide */
.ind_details {
margin-top: 22%;
margin-left: 0;
}

.row {
flex-direction: column;
}

.details {
width: 100%;

}
}
.
@media screen and (max-width: 480px) {

/* Styles for screens up to 480px wide (typical mobile devices) */
.content {
margin-top: 22%;
}


}



.loc{
text-align: justify;
width:90%;
}
@media screen and (max-width: 968px) {
.container {
margin-left: 0;
padding:20px !important;
}
.flex {
flex-direction: column;
/* Change to a column layout on smaller screens */
margin-left: 3%;
margin-right: 3%;
}

.flex-left {
width: 100%;
/* Full width for smaller screens */
}

.name {
margin-bottom:3%;
margin-top: 2%;
/* Adjust as needed */

color: #333;
font-family: Lato;
font-size: 24px;
font-style: normal;
font-weight: 700;
line-height: 100%; /* 24px */
}

.Amenities,
.about,
.loc {margin-bottom:2%;
text-align: justify;
width: 98%;
/* Center text on smaller screens */
}


margin-left: 3%;
/* Full width for smaller screens */
}
}

/* Further adjustments for even smaller screens */
@media screen and (max-width: 480px) {
.name {

font-size: 2.5em;
/* Adjust font size for smaller screens */
}
}

.Amenities {
width: 100%;
margin-bottom: 20px;
}



.Amenities table {
width: 362px;
border-collapse: collapse;
}

.Amenities th, .Amenities td {
border: 1px solid #ddd;
padding: 8px;
text-align: center;

}



/* Display 3 dates in a row */
.Amenities td {
width: calc(100% / 3);
height:82px;
}
.date-symbol{
height: 68px;


}
@media screen and (max-width: 970px) {
    .Amenities table {
        width:100%;
    }
}
