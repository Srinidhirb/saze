<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap');
.nav__link.active1 {
      color: #031B64!important;
      font-weight:1000!important;
    }
body {
    
    font-family: 'Lato', sans-serif;
    
  }
  
* {
  font-family: 'Lato', sans-serif;
}
a{
  text-decoration: none;
  color: inherit;
}
a:hover{
color:#4AE9E9;
}
ul{
  list-style: none;
}
  /* NORMAL STYLES */
  .header {
    position: fixed;
    top: 0;
    width: 100%;

    z-index: 1000; /* Set a high z-index value to ensure it's above other elements */
  }
  .heading{
    text-align: center;
    padding:30px;
  }
  .heading span{

    
    color:  #717579;
font-family: Lato;
font-size: 1rem;
font-style: normal;
font-weight: 500;
line-height: normal;
   
  }
  .heading p{
    padding:30px;
    color:  #131313;
font-family: Lato;
font-size: 2.5rem;
font-style: normal;
font-weight: 500;
line-height: normal;
    text-align: center;
  }
  
  
  

  
  .icon {
    margin-right: 3px;
    color: rgba(255, 255, 255, 0.17);
    
  }
   /* Add other styles as needed */
    
  .bottom-bar {
      padding: 30px;
    padding-top: 0;
    background-color: rgb(255, 255, 255);
    padding-bottom: 0;
   
  }
  @media (max-width: 947px) {
    .bottom-bar {
      padding: 3px;
    }
  }
  
  .bottom-bar__content {
    height: 80px;
    max-width: 1324px;
    margin-bottom: 10%;
    margin: 0 auto;  
    display: flex;
    
    
    justify-content: space-between;
    align-items: center;
  }
  
  .logo {
    vertical-align: middle;
    display: flex;
    column-gap: 10px;
    align-items: center;
  }
  
  .logo__img {
    height: 40px;
    width: 70%;
  }
  

  .nav {
    color: #A4A3A3;
font-family: Lato;
font-size: 24px;
font-style: normal;
font-weight: 400;
line-height: normal;
    transition: all 0.3s ease-in-out;
  }
  
  .nav__list {
    display: flex;
    column-gap: 30px;
    justify-content: center;
    align-items: center;
  }
  
  
  
  .nav__link {
    color: #222222;
font-family: Lato;
font-size: 20px;
font-style: normal;
font-weight: 400;
line-height: normal;
  }
  
  .nav__link:hover,
  .nav__link:focus {
    color: #4AE9E9;
  }
  
  .btn {
border:none;
    color: #fff;
    background-color: #031B64;
    padding: 16px 24px;
border-radius:6px;
    text-transform: capitalize;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s;
    width:auto;
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
    color:#222222;
    background-color:  #4AE9E9;
}
  
  .btn:hover {
    color:#222222!important;
    background-color:  #4AE9E9;
  }
  
  .hamburger {
    cursor: pointer;
    display: none;
  }
  
  .bar {
    height: 2px;
    width: 27px;
    background-color: #000000;
    margin: 5px 0;
    opacity: 0.8;
    transition: all 0.3s ease-in-out;
  }
  
  /* For JS */
  .nav--open {
    left: 50% !important;
  }
  
  .hamburger--open .bar:nth-child(1) {
    transform: translateY(7px) rotate(45deg);
  }
  
  .hamburger--open .bar:nth-child(2) {
    opacity: 0;
  }
  
  .hamburger--open .bar:nth-child(3) {
    transform: translateY(-7px) rotate(-45deg);
  }
  
  @media (max-width: 890px) {
    .nav {
      position: fixed;
      top: 80px;
      left: -90%;
      transform: translateX(-50%);
      background-color: rgb(255, 255, 255);
      width: 100%;
      padding: 10px 0 25px;
      color: #000000;
    }
    .bottom-bar{
      padding-left:20px;
      padding-right:20px;
    }
    .nav__list {
      flex-direction: column;
      align-items: center;
      row-gap: 20px;
    }

    .nav__link {
      font-size: 0.875rem;
    }

    .btn {
      width:auto;
      font-size: 0.688rem;
     
    }

    .hamburger {
      display: block;
      
      
    }
  
  }



  @media (max-width: 360px) {
    .top-bar__content {
      font-size: 0.625rem;
    }
    
  }
  /* Add the following styles to your existing CSS */

/* Dropdown Styles */
.dropdown {
  position: relative;
}

.dropdown-menu {
  display: none;
  position: absolute;
  top: 100%;
 right:0;
  width:100px!important;
  height:106px;
  background-color: #fff;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  border-radius: 5px ;
  padding:  0px;
  z-index: 100;
}
.dropdown-menu hr{
  margin:10px 0;
  width:92%;
}

.dropdown:hover .dropdown-menu {
  display: flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
  text-align:center;
}

.dropdown-menu li {
  list-style: none;
}

/* Adjustments for small screens */
@media (max-width: 890px) {

  .nav__list {
    flex-direction: column;
    align-items: center;
    row-gap: 20px;
  }

  .dropdown-menu {
    top: 0;
    left: 100%;
    min-width: 150px; /* Adjust as needed */
  }
}

/* footer */
    .foter{
  margin: 0;
   padding: 40px;
    padding-top: 0;
    background-color: rgb(255, 255, 255);
    padding-bottom: 0;
  display: grid;
  grid-template-rows: auto 1fr auto;
  font-size: 0.875rem;

  align-items: start;
  min-height: 30vh;
}
.footer {
  display: flex;
  flex-flow: row wrap;
  padding: 30px 30px 20px 10px;
  color: #000000;
  background-color: #fff;
  border-top: 1px solid #e5e5e5;

}

.footer > * {
  flex:  1 100%;
}

.footer__addr {
  margin-right: 1.25em;
 
}

.icons img{
  
 margin-top: 5%;
  width: 8%;
  margin-right: 2%;
margin-bottom: 5%;
  justify-content: space-between;
}

.footer__logo {
  
  font-weight: 400;
  text-transform: lowercase;
  font-size: 1.5rem;
}
.footer__logo img{
  margin-left: 3%;
  height: 29px;
  width: 60%;
}

.footer__addr p {
  margin-left: 6%;
  text-align:justify;
  margin-top: 1.3em;
  width:60%;
  color: var(--Text-body-1, #222222);
font-family: Lato;
font-size: 14px;
font-style: normal;
font-weight: 400;
line-height: 140%; /* 19.6px */
}

.nav__title {
 
  
  padding-bottom: 0;
  padding-top: 0;
  color: #222222;
font-family: Lato;
font-size: 18px;
font-style: normal;
font-weight: 700;
line-height: 110%; /* 19.8px */
}

.footer address {
  font-style: normal;
  color: #000000;
}

.footer__btn {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 6px;
  max-width: max-content;
  background-color: rgb(33, 33, 33, 0.07);
  border-radius: 100px;
  color: #2f2f2f;
  line-height: 0;
  margin: 0.6em 0;
  font-size: 1rem;
  width: auto;
  padding: 0 1.3em;
}



.sub_button{
margin-top: 2%;
 
    width: 71px;
  
    padding: 6px 14px;
    border-radius: 6px;
    color: white;
    font: Lato;
    font-size: 0.75rem;
    font-weight: 500;
    background-color: #031B64;

}
.sub_button:hover{
  background-color: #7CAFD5;
}

.footer ul {
    padding-left: 0;
  list-style: none;
 
}

.footer li {
  color: var(--Text-body-1, #222222);
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 500;
line-height: 100%; /* 16px */
  line-height: 2em;
}
.footer li a {
  color: var(--Text-body-1, #222222);
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 500;
line-height: 100%; /* 16px */
  line-height: 2em;
}

.footer a {
  color: var(--Text-body-1, #A4A3A3);
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 500;
line-height: 100%; /* 16px */
  text-decoration: none;
}

.footer__nav {
  display: flex;
	flex-flow: row wrap;
}

.footer__nav > * {
  flex: 1 50%;
  margin-right: 1.25em;
}

.nav__ul a {
  color: #000000;
}

.nav__ul--extra {
  column-count: 2;
  column-gap: 1.25em;
}



@media screen and (min-width: 24.375em) {
  .legal .legal__links {
    margin-left: auto;
  }
  .nav__title{
    padding: 0;
    padding-bottom:4%;
    margin:0;
  }
  .footer ul{
    
    padding: 0px;
  }
}
@media screen and (max-width: 767px){
    .footer__addr p,.footer__logo img{
        margin-left: 0%;
    }
    .footer__addr p{
      margin-bottom: 4%;
      width:100%;
    }
}
@media screen and (min-width: 40.375em) {
  .footer__nav > * {
    flex: 1;
  }
  
  .nav__item--extra {
    flex-grow: 2;
  }
  
  .footer__addr {
    flex: 1 0px;
    
  }
  
  .footer__nav {
    flex: 2 0px;
  }
}


        .size{
            height: 10vh;
        }
@media (max-width: 768px) {
.foter{
padding:0!important;
}}
/*  */