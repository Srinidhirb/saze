const navEl = document.querySelector('.nav');
const hamburgerEl = document.querySelector('.hamburger');
const navItemEls = document.querySelectorAll('.nav__item');

hamburgerEl.addEventListener('click', () => {
  navEl.classList.toggle('nav--open');
  hamburgerEl.classList.toggle('hamburger--open');
});

navItemEls.forEach(navItemEl => {
  navItemEl.addEventListener('click', () => {
    navEl.classList.remove('nav--open');
    hamburgerEl.classList.remove('hamburger--open');
  });
});

// Existing script remains the same

// New functions for the popup
function openPopup() {
  document.getElementById("popupContainer").classList.add("active");
}

function closePopup() {
  document.getElementById("popupContainer").classList.remove("active");
}



/*=============== SWIPER JS ===============*/
let swiperCards = new Swiper(".card__content", {
  loop: true,
  spaceBetween: 32,
  grabCursor: true,

  pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
  },

  navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  },

  breakpoints: {
      600: {
          slidesPerView: 2,
      },
      968: {
          slidesPerView: 3,
      },
  },
});




// listing1 

function checkAndRedirect1() {
  var field1Value = document.getElementById('space_name').value;
  var field2Value = document.getElementById('space_type').value;
  var field3Value = document.getElementById('space_address').value;
  var field4Value = document.getElementById('space_city').value;
  var field5Value = document.getElementById('space_pin_code').value;
  var field6Value = document.getElementById('space_availability_date').value;

  var unfilledFields = [];

  if (!field1Value) {
    unfilledFields.push('Space Name');
  }
  if (!field2Value) {
    unfilledFields.push('Space Type');
  }
  if (!field3Value) {
    unfilledFields.push('Space Address');
  }
  if (!field4Value) {
    unfilledFields.push('City');
  }
  if (!field5Value) {
    unfilledFields.push('Pin Code');
  }
  if (!field6Value) {
    unfilledFields.push('Availability Date');
  }

  if (unfilledFields.length > 0) {
    alert('Please fill in the following fields:\n' + unfilledFields.join('\n'));
  } else {
    window.location.href = 'listing2.html';
  }
}
 
function previouspage0(){
  window.location.href= 'main.html';
}

// listing2

function checkAndRedirect() {
  var field1Value = document.getElementById('space_area').value;
  var field2Value = document.getElementById('space_des').value;
  var field3Value = document.getElementById('space_img').value;

  

  var unfilledFields = [];

  if (!field1Value) {
    unfilledFields.push('Space area');
  }
  if (!field2Value) {
    unfilledFields.push('Space Description');
  }
  if (!field3Value) {
    unfilledFields.push('Space Images');
  }
  

  if (unfilledFields.length > 0) {
    alert('Please fill in the following fields:\n' + unfilledFields.join('\n'));
  } else {
    window.location.href = 'listing3.html';
  }
}


function previouspage1(){
window.location.href= 'listing1.html';
}

// listing3

function previouspage(){
  window.location.href= 'listing2.html';
}






// Testimonials

// Fetch locations and types from the backend and populate the dropdowns
function fetchLocationsAndTypes() {
  fetch('http://localhost/spacecraft/backend.php/')
  .then(response => response.json())
  .then(data => {
  // Populate the locations dropdown
  const locationInput = document.getElementById('locationInput');
  data.locations.forEach(location => {
  const option = document.createElement('option');
  option.value = location;
  option.textContent = location;
  locationInput.appendChild(option);
  });
  
  // Populate the types dropdown
  const typeInput = document.getElementById('typeInput');
  data.types.forEach(type => {
  const option = document.createElement('option');
  option.value = type;
  option.textContent = type;
  typeInput.appendChild(option);
  });
  })
  .catch(error => console.error('Error fetching data:', error));
  }
  
  // Call the fetchLocationsAndTypes function when the page loads
  window.onload = fetchLocationsAndTypes;