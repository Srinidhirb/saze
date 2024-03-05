<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap');
* {
  margin: 0;
  padding: 0;
}

ul {
  list-style: none;
}

a {
  text-decoration: none;
  color: inherit;
}





/* Replace "input" with the actual selector for your input elements if needed */
input::placeholder {
  color: var(--Grey-primary, #CECECE);
font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 400;
line-height: 22px; /* 122.222% */
}
option{
  color: var(--Text-title, #989797);
font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 400;
line-height: 22px; /* 122.222% */
}

/* Add these styles to your existing styles or create a new CSS file */

/* Flatpickr calendar styles */
.flatpickr-calendar {
  background-color: #fff; /* Calendar background color */
  border: 1px solid #ddd; /* Calendar border */
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Calendar box shadow */
}

/* Header styles */
.flatpickr-months {
  background-color: #f5f5f5; /* Header background color */
  color: #333; /* Header text color */
  padding: 8px;
  border-bottom: 1px solid #ddd; /* Header border */
}

/* Days styles */
.flatpickr-days {
  display: flex;
  flex-wrap: wrap;
  margin: 0;
  padding: 8px;
}

/* Day styles */
.flatpickr-day {
  width: 32px; /* Adjust day width as needed */
  height: 32px; /* Adjust day height as needed */
  margin: 2px;
  line-height: 32px;
  text-align: center;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.flatpickr-day:hover {
  background-color: #f5f5f5; /* Day hover background color */
}

/* Today styles */
.today.flatpickr-day {
  background-color: #4285f4; /* Today's background color */
  color: #fff; /* Today's text color */
}

/* Selected day styles */
.selected.flatpickr-day {
  background-color: #4285f4; /* Selected day background color */
  color: #fff; /* Selected day text color */
}

/* Disabled day styles */
.flatpickr-disabled {
  color: #ccc; /* Disabled day text color */
  cursor: not-allowed;
}

/* Close button styles */
.flatpickr-close {
  color: #4285f4; /* Close button color */
  cursor: pointer;
  font-weight: bold;
}

/* Add your existing styles for other elements */


body {
  font-family: 'Lato', sans-serif;
  display: flex;
  flex-direction: column;
  
  margin: 0;
  padding: 0;
}

.add-listing {
  width: 90%;
  max-width: 600px;
  margin: 127px auto;
}

.name-center {
  text-align: center;
  color: var(--Text-title, #989797);
font-family: Lato;
font-size: 36px;
font-style: normal;
font-weight: 700;
line-height: normal;
}

.list-a-space-diagram {
  display: flex;
  
  align-items: center;
  margin-top: 5%;
  width: 100%;
  overflow-x: auto; /* Add overflow-x for small screens */
}
 
.step {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 180px;
  height: 70px;
  border-radius: 50%;

  background-color: rgb(255, 255, 255);
  border: 2px solid black;
}
.step-dis {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 180px;
  height: 70px;
  border-radius: 50%;

  background-color: rgb(255, 255, 255);
  border: 2px solid #A4A3A3;
}

.step h3 {
  font-size: 1.5rem;
  font-weight: bold;
}

.arrow {
  width: 40%;
}

.arrow:after {
 
  content: "";
  display: block;
  width: 110%;
  height: 1px;
  background-color: green;
  margin-top: 5px;
}

.form {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 20px;
  margin-left: 8%;
  margin-top: 10%;
  margin-right: 5%; /* Add margin-right for better spacing on small screens */
}

form {
  width: 100%;
  margin-left: 15%;
}

label {
  display: block;
  margin: 32px 0 5px;
  color: var(--Text-title, #989797);
font-family: Lato;
font-size: 20px;
font-style: normal;
font-weight: 400;
line-height: 24px; /* 120% */
}

input,
select {
  width: 70%; /* Adjust width to 100% for better responsiveness */
  padding:5px;
height: 48px;
  margin-bottom: 10px;
  box-sizing: border-box;
  border-radius: 6px;
border: 1px solid var(--Hover-pimary, #B8C0C2);
 
  height: 40px;

font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 400;
line-height: 22px; /* 122.222% */
}
.input{
  width: 50%; /* Adjust width to 100% for better responsiveness */
  padding: 8px;
  margin-bottom: 10px;
  box-sizing: border-box;
  border: 1px solid #000000; /* Set the border size and color */
  border-radius: 2px;
  height: 25px;
}


.button-container {
  display: flex;
  justify-content: right;
    width: 73%;
  margin-top: 34px;
}




.next-btn{
   width: auto;
     margin-right: 5%; 
    padding: 12px 40px;
    cursor: pointer;
    background-color: #031B64;
    color: #fff;
    border: none;
    border-radius: 6px;
    /* margin-bottom: 10px; */
    font-size: 1rem;
    font-weight: 400;
}
.back-btn{

    width: auto;
     margin-right: 5%; 
    padding: 12px 40px;
    cursor: pointer;
   background-color:white;
    color: #222222;
    border: 1px solid #828282;
    border-radius: 6px;
    /* margin-bottom: 10px; */
    font-size: 1rem;
    font-weight: 400;
}


 .back-btn:hover {
  background-color: #e9e8e8;
}
.next-btn:hover{
 background-color: #4AE9E9;
 color:#222222
 }
.red {
  color: red;
}

.space{
  margin-top: 10%;
  font-family: 'Lato', sans-serif;
}

.below{
  width: 100%;
margin-top: 3%;
  display: flex;
  flex-direction: row;
  justify-content:space-between;
  color: #000000;
 flex-wrap: nowrap;
}
.below h5{
  
font-family: Lato;
font-size: 17px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
@media screen and (max-width: 768px) {
  .below {
    flex-direction: row;
    width:100%;
  }
}

@media (max-width: 650px) {
  .form {
    margin-left: 2%;
    margin-right: 2%;
  }
}


/* Style the file input */
.file-input {
    display: none; /* Hide the file input */
}

/* Style the file input label */
.file-label {
   width:65%;
    padding: 8px 16px;
    border-radius: 6px;
border: 1px solid var(--Hover-pimary, #B8C0C2);
    
    cursor: pointer;
   
    font-size: 14px;
    margin-bottom: 10px;
}

/* Style the file input label on hover */
.file-label:hover {
    background-color: #4AE9E9;
}

.file-name{
  width: 65%;
  color: var(--Grey-primary, #989797);

font-family: Lato;
font-size: 17px;
font-style: normal;
font-weight: 400;
line-height: 20.4px; /* 120% */
}

.box{
 
  border: #000000 0.5px solid;
  width: 90%;
  display: flex;
  margin-bottom: 7%;
  flex-direction: column;
  justify-content: space-between;
  flex-wrap: wrap;
}
.right{
  width:70%;
  text-align:right;
  color: var(--Grey-primary, #CECECE);
font-family: Lato;
font-size: 17px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
.right1{
  color: var(--Text-body-1, #A4A3A3);
font-family: Lato;
font-size: 17px;
font-style: normal;
font-weight: 400;
line-height: 22px; /* 129.412% */
  margin-left: 59%;
}
.right2{
  color: var(--Text-body-1, #A4A3A3);
font-family: Lato;
font-size: 17px;
font-style: normal;
font-weight: 400;
line-height: 22px; /* 129.412% */
  margin-left: 58%;
}
.right3{
  color: var(--Text-body-1, #A4A3A3);
font-family: Lato;
font-size: 17px;
font-style: normal;
font-weight: 400;
line-height: 22px; /* 129.412% */
  margin-left: 56%;
}

.amenities-container {
  margin-top: 10px;
}

.amenities-options {
  display: flex;
  flex-wrap: wrap;
  width: 85%;
}

.amenity-checkbox {
  display: none; /* Hide the actual checkboxes */
}

.amenity-label:hover {
    background-color: #4AE9E9;
    color: #000000;
}
.amenity-label {
  
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-right: 10px;
  margin-bottom: 10px;
  color: var(--Text-body-1, #A4A3A3);
font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 400;
line-height: 22px; /* 122.222% */
  padding: 8px;
  cursor: pointer;
  user-select: none;
  flex: 0 0 calc(24.33% - 10px); /* Three labels in one row, adjust margin-right */
  transition: background-color 0.3s;
}

.amenity-checkbox:checked + .amenity-label {
  background-color: #031B64; /* Highlight the selected labels */
  color: #ffffff;
}

/* Optional: Style for the required span */
.red {
  color: red;
}


/* Optional: Style for the required span */
.red {
  color: red;
}

.active1{
  background-color:#080157;
  
}
.disabled{
  color: var(--Text-body-1, #A4A3A3);
font-family: Lato;
font-size: 22px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
.enabled{
  color: #333;
font-family: Lato;
font-size: 22px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
.active1 h3{
  color: white;
}
.com{
  background-color: rgb(128, 128, 128);
}

.green{
  background-color: green;
  color: green;
}

.small{
  color: var(--Grey-primary, #CECECE);

font-family: Lato;
font-size: 17px;
font-style: normal;
font-weight: 400;
line-height: 20.4px; /* 120% */
}

.heading-small{
  padding:56px 0px 30px 0px ;
  text-align:center;
  font-family: Lato;
font-size: 24px;
font-weight: 400;
line-height: 29px;
letter-spacing: 0em;
color: #989797;



}