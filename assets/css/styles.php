<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>
/*=============== GOOGLE FONTS ===============*/
@import url("https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@400;500;600&display=swap");

/*=============== VARIABLES CSS ===============*/
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
  --body-font: "Bai Jamjuree", sans-serif;
  --h2-font-size: 1.25rem;
  --normal-font-size: 1rem;
}

/*=============== BASE ===============*/



a {
  text-decoration: none;
}

.img {
  display: block;

}

/*=============== CARD ===============*/
.container {

  display: flex;
  justify-content: center;
 

heightfixed;
}

.card__container {


  padding-block: 5rem;
  padding-top:2rem;
}

.card__content {
  margin-inline: 1.75rem;
  border-radius: 1.25rem;
  overflow: hidden;
  border-radius: 16px;
  height: 450px; /* Set a fixed height for the card content */
}

.card__article {
  border-radius: 16px;
border: 0.5px solid #D9D9D9;
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);

}

.card__image {
  border-radius: 16px;
border: 0.5px solid #D9D9D9;

  position: relative;

 

}

.card__data {
padding-top:.5rem;
  padding: 1.5rem 2rem;
  border-radius: 1rem;
  
  position: relative;
  z-index: 10;
}

.card__img {
  width: 90%;
  margin: 0 auto;
  position: relative;
  z-index: 5;
  height:50%;

}



.card__name {
  
  color: var(--Text-color-1, #131313);
font-family: Lato;
font-size: 32px;
font-style: normal;
font-weight: 500;
line-height: normal;
}
.card__price {
  padding:10px;
  padding-left:0%;
  color: var(--Text-body-1, #A4A3A3);
font-family: Lato;
font-size: 20px;
font-style: normal;
font-weight: 400;
line-height: normal;
}

.card__description {
  width: 328px;
  color: var(--Text-title, #989797);
font-family: Lato;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: normal;
  
}

.card__button {
  display: inline-block;

  padding: .75rem 1.5rem;
  border-radius: .25rem;
  color: var(--dark-color);
  font-weight: 600;
}

/* Swiper class */
.swiper-button-prev:after,
.swiper-button-next:after {
  content: "";
}

.swiper-button-prev,
.swiper-button-next {
  width: initial;
  height: initial;
  font-size: 3rem;
  color: var(--second-color);
  display: none;
}

.swiper-button-prev {
  left: 0;
}

.swiper-button-next {
  right: 0;
}

.swiper-pagination-bullet {
  background-color: hsl(212, 32%, 40%);
  opacity: 1;
}

.swiper-pagination-bullet-active {
  background-color: var(--second-color);
}

/*=============== BREAKPOINTS ===============*/
/* For small devices */
@media screen and (max-width: 320px) {
 
  .card__data {
    padding: 1rem;
  }
}

/* For medium devices */
@media screen and (min-width: 768px) {
  
  .card__content {
    margin-inline: 3rem;
  }

  .swiper-button-next,
  .swiper-button-prev {
    display: block;
  }
}

/* For large devices */
@media screen and (min-width: 1120px) {

  .card__container {
    max-width: 1390px;
  }

  .swiper-button-prev {
    left: -1rem;
  }
  .swiper-button-next {
    right: -1rem;
  }
}