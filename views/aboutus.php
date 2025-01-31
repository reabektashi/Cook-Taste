<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cook&Taste-About Us</title>
  <!-- Font Awesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../Css/style.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>


<body>
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

 <!-- About Us Section -->
 <div class="container1">
    <h1>WHO WE ARE?</h1>
    <p>At Cook&Taste, our passion lies in curating exceptional recipes and culinary experiences. We aim to ignite the love for cooking in home chefs and food enthusiasts alike.</p>
    <p>Established in 2024, we firmly believe that anyone can craft delectable dishes with the right guidance and quality ingredients. Our diverse team includes skilled chefs, food bloggers, and nutritionists who are committed to sharing their expertise.</p>
    <p>No matter your experience level, our extensive collection of recipes is designed to inspire and challenge every cook. Embark on this culinary adventure with us and uncover exciting flavors, techniques, and ideas for your kitchen.</p>
  </div>


  <!-- Grid Section -->
 <h2>Meet Our Team</h2>
 <div class="container2">
    <div class="row">
      <div class="col">
        <div class="card">
          <img src="../Images/Staff.jpg" class="card-img" alt="Chef John" style="max-height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">Chef John</h5>
            <p class="card-text">Lead Chef & Recipe Developer</p>
            <button class="btn" onclick="openModal('staff3Modal')">More info</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="../Images/staff1.jpg" class="card-img" alt="Chef Emma" style="max-height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">Chef Emma</h5>
            <p class="card-text">Food Blogger & Nutritionist</p>
            <button class="btn" onclick="openModal('staff2Modal')">More info</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="../Images/staff2.jpg" class="card-img" alt="Chef Alex" style="max-height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">Chef Alex</h5>
            <p class="card-text">Culinary Instructor</p>
            <button class="btn" onclick="openModal('staff1Modal')">More info</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal for Member 1 -->
  <div class="modal" id="staff3Modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Chef John</h5>
          <span class="close" onclick="closeModal('staff3Modal')">&times;</span>
        </div>
        <div class="modal-body">
          <img src="../Images/Staff.jpg" alt="Chef John" class="modal-img">
          <p>Chef John is a grill master and BBQ expert with extensive knowledge in outdoor cooking techniques.</p>
          <button class="btn" onclick="closeModal('staff3Modal')">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal for Member 2 -->
  <div class="modal" id="staff2Modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Chef Emma</h5>
          <span class="close" onclick="closeModal('staff2Modal')">&times;</span>
        </div>
        <div class="modal-body">
          <img src="../Images/staff1.jpg" alt="Chef Emma" class="modal-img">
          <p>Chef Emma is a specialist in pastry and baking, with a passion for creating sweet masterpieces.</p>
          <button class="btn" onclick="closeModal('staff2Modal')">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal for Member 3 -->
  <div class="modal" id="staff1Modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Chef Alex</h5>
          <span class="close" onclick="closeModal('staff1Modal')">&times;</span>
        </div>
        <div class="modal-body">
          <img src="../Images/staff2.jpg" alt="Chef Alex" class="modal-img">
          <p>Chef Alex is an experienced culinary instructor and content creator with over 10 years of experience in the food industry.</p>
          <button class="btn" onclick="closeModal('staff1Modal')">Close</button>
        </div>
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