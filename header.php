<header class="header">
  <div class="bottom-bar">
    <div class="bottom-bar__content">
      <a href="index.php" class="logo">
        <img class="logo__img" src="SpaceKraft Logo 1.svg" alt="logo">
      </a>

      <nav class="nav">
        <ul class="nav__list">
          <li class="nav__item">
            <a class="nav__link" href="vs.php">Find</a>
          </li>
          <li class="nav__item">
            <a class="nav__link" href="res.php">Resource</a>
          </li>
          <li class="nav__item">
            <a class="nav__link" href="faq.php">FAQ</a>
          </li>
          <li class="nav__item">
            <a class="nav__link" href="contactus.php">Contact us</a>
          </li>
          <?php if ($user_id != '') { ?>
            <li class="nav__item dropdown" style="margin-top: 2%;">
              <a href="#" class="nav__link"><svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="17.5" cy="17.5" r="17" stroke="#222222" />
                  <path d="M18 19C20.7614 19 23 16.7614 23 14C23 11.2386 20.7614 9 18 9C15.2386 9 13 11.2386 13 14C13 16.7614 15.2386 19 18 19ZM18 19C13.5817 19 10 21.6863 10 25M18 19C22.4183 19 26 21.6863 26 25" stroke="#222222" stroke-width="1.5" stroke-linecap="round" />
                </svg>
              </a>
              <ul class="dropdown-menu">
                <li class="nav__link"><a href="user-profile.php">My profile</a></li> <br>
                <li class="nav__link"><a href="user_logout.php" onclick="return confirm('logout from this website?');">Logout</a></li>
              </ul>
            </li>
          <?php } else { ?>
            <li class="nav__item">
              <a href="login.php" class="nav__link">Login </a>
            </li>
          <?php } ?>
          <li class="nav__item">
            <a class="btn" href="step1.php">Add Listing</a>
          </li>
        </ul>
      </nav>

      <div class="hamburger">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
      </div>
    </div>
  </div>
</header>

<script>
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
</script>