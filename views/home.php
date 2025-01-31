<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cook&Taste</title>
  <!-- Font Awesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../Css/style.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Navigation Bar -->
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a class="navbar-brand" href="../views/home.php">
                <img src="../Images/brandL.png" alt="Cook&Taste Logo">
            </a>
            <div class="navbar-links" id="navbarLinks">
                <ul class="navbar-nav">
                    <li><a class="nav-link" href="../views/home.php">Home</a></li>
                    <li class="dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown">Recipes</a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../views/recipes/food.php">Food</a></li>
                            <li><a class="dropdown-item" href="../views/recipes/desserts.php">Desserts</a></li>
                            <li><a class="dropdown-item" href="../views/recipes/sidedishes.php">Side Dishes</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link" href="../views/aboutus.php">About Us</a></li>
                    <li><a class="nav-link" href="../views/dashboard.php">Dashboard</a></li>
                </ul>
            </div>
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search Recipes">
                <a href="#" id="searchIcon">
                    <i class="fa fa-search"></i>
                </a>
            </div>
            <div class="icons">
                <a href="#" id="favoriteIcon" title="Favorites">
                    <i class="fa fa-heart"></i>
                </a>
                <a href="#" id="profileIcon" title="Profile" onclick="toggleModal()">
                    <i class="fa fa-user"></i>
                </a>
                <?php
                    if (isset($_SESSION['email'])) {
                        echo '<a href="../views/logout.php"></a>';
                    } else {
                        echo '<a href="../views/login.php"></a>';
                    }
                ?>
            </div>
        </div>
    </nav>

<!-- Carousel Section -->
<div id="recipeCarousel" class="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-slide-to="0" class="active" aria-label="Slide 1"></button>
            <button type="button" data-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Carousel Inner -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../Images/italian-pasta-shells-with-mushrooms-zucchini-tomato-sauce.jpg" alt="Food 1">
                <div class="carousel-caption text-start" style="left: 10%; right: auto; bottom: 10%;">
                    <h3 style="font-weight: bold; font-size: 36px;">Craving something <br> different?</h3>
                    <p style="font-size: 28px;">Our recipes are <br>here to inspire your palate!</p>
                    <button class="btn read-more-btn" style="font-size: 18px;">Read more</button>
                </div>
            </div>
            <div class="carousel-item">
            <img src="../Images/sliced-tasty-chocolate-brownie-with-cream-cutting-board-high-quality-photo.jpg" alt="Food 2">
                <div class="carousel-caption text-end" style="right: 6.2%; left: auto; bottom: 6%;">
                    <h3 style="font-weight: bold; font-size: 36px;">Elevate Your Dessert Game.</h3>
                    <p style="font-size: 28px;">Explore our cake recipes and impress <br> your family and friends!</p>
                    <button class="btn read-more-btn" style="font-size: 18px;">Read more</button>
                </div>
            </div>
            <div class="carousel-item">
            <img src="../Images/plate-with-paleo-diet-food-boiled-eggs-avocado-cucumber-nuts-cherry-strawberries-paleo-breakfast-top-view.jpg" alt="Food 3">
                <div class="carousel-caption text-start" style="left: 8%; right: auto; bottom: 10%;">
                    <h3 style="font-weight: bold; font-size: 36px;">Want your salads <br>to be healthy & delicious?</h3>
                    <p style="font-size: 28px;">Well, we're here to help you!</p>
                    <button class="btn read-more-btn" style="font-size: 18px;">Read more</button>
                </div>
            </div>
        </div>
      <!-- Controls -->
        <button class="carousel-control-prev" aria-label="Previous" onclick="prevSlide()">&lt;</button>
        <button class="carousel-control-next" aria-label="Next" onclick="nextSlide()">&gt;</button>
    </div>
    <!--Trending Now  -->
    <div class="container">
      <h2 class="heading">Trending Now</h2>
      <div class="row">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Buffalo Chicken Tacos</h5>
                  <p class="card-text">This weeknight winner is ready in under 20 minutes and is topped with a creamy, crunchy slaw and blue cheese.</p>
              </div>
              <img src="../Images/BuffaloChickenTacos.jpg" alt="Buffalo Chicken Tacos" class="card-img">
          </div>

          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Antipasto Salad</h5>
                  <p class="card-text">Combine all of the best antipasti with crisp lettuce and savory dressing for a satisfying antipasto salad.</p>
              </div>
              <img src="../Images/AntipastoSalad.jpg" alt="Antipasto Salad" class="card-img">
          </div>

          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Tiramisu Cake</h5>
                  <p class="card-text">This gorgeous two-layer cake is a tiramisu lover's dream. The fluffy mascarpone and Marsala filling uses instant vanilla pudding.</p>
              </div>
              <img src="../Images/TiramisuCake.jpg" alt="Tiramisu Cake" class="card-img">
          </div>

          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Banana Chocolate Chip Muffins</h5>
                  <p class="card-text">Turn overripe bananas into crowd-pleasing to make these chocolate-studded muffins tender, moist.</p>
              </div>
              <img src="../Images/BananaChocolateMuffins.jpg" alt="Banana Chocolate Muffins" class="card-img">
          </div>
      </div>
  </div> 
  <!--Container -->
  <div class="hero-container">
      <div class="hero-content">
          <div class="hero-text">
              <h1 class="hero-title">Explore Flavorful Dishes Tailored to Your Tastes</h1>
              <p class="hero-description">Simply choose your favorite ingredients, and we'll suggest the perfect recipes to delight your taste buds.</p>
              <button class="hero-button" 
                      onmouseover="this.style.backgroundColor='#ff6347'; this.style.transform='scale(1.1)'" 
                      onmouseout="this.style.backgroundColor='#ff7f50'; this.style.transform='scale(1)'">
                  <i class="fas fa-utensils"></i> Get Started
              </button>
          </div>
          <div class="hero-image">
              <img src="../Images/Chicken-Alfredo-Pizza-HomePage.jpg" alt="Delicious Food">
          </div>
      </div>
  </div>
 
  <!-- Footer -->
  <footer>
      <div class="social-icon">
          <a href="https://www.facebook.com/" target="_blank">
              <i class="fab fa-facebook-f"></i>
          </a>
          <a href="https://www.instagram.com/" target="_blank">
              <i class="fab fa-instagram"></i>
          </a>
          <a href="https://x.com/" target="_blank">
              <i class="fab fa-twitter"></i>
          </a>
          <a href="https://al.linkedin.com/" target="_blank">
              <i class="fab fa-linkedin-in"></i>
          </a>
      </div>
      <p>© 2024 Cook&Taste. All rights reserved.</p>
  </footer>

 <script src="../javascript/script.js"></script>
</body>
</html>
