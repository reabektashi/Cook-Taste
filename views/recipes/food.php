<?php
session_start();
$hide = "";
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "admin")
        $hide = "";
    else
        $hide = "hide";
} else {
    $hide = "hide";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cook&Taste-Food</title>
  <!-- Font Awesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../Css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a class="navbar-brand" href="../../views/home.php">
                <img src="../../Images/brandL.png" alt="Cook&Taste Logo">
            </a>
            <div class="navbar-links" id="navbarLinks">
                <ul class="navbar-nav">
                    <li><a class="nav-link" href="../../views/home.php">Home</a></li>
                    <li class="dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown">Recipes</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../../views/recipes/food.php">Food</a></li>
                            <li><a class="dropdown-item" href="../../views/recipes/desserts.php">Desserts</a></li>
                            <li><a class="dropdown-item" href="../../views/recipes/sidedishes.php">Side Dishes</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link" href="../../views/aboutus.php">About Us</a></li>
                    <li><a class="nav-link" href="../views/dashboard.php"class="<?php echo $hide ?>">Dashboard</a></li>
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
                <a href="../../views/login.php" id="profileIcon" title="Profile" onclick="toggleModal()">
                    <i class="fa fa-user"></i>
                </a>
            </div>
        </div>
    </nav>


<header class="header">
    <img src="../../Images/foodIMG.jpg" alt="Food Recipes Background" class="header-image">
    <h1 class="header-title">Food Recipes</h1>
    <p class="header-subtitle">Your guide to delicious food ideas!</p>
</header>

<div class="container">
    <!-- Recipe Card 1 -->
    <div class="recipe-card">
        <img src="../../Images/SpaghettiCarbonara.jpg" alt="Spaghetti Carbonara" class="recipe-image">
        <h5 class="card-title">Spaghetti Carbonara</h5>
        <p class="card-text">A classic Italian pasta dish made with eggs, cheese, pancetta, and pepper.</p>
        <a href="#" class="recipe-button">View Recipe</a>
    </div>
    <!-- Recipe Card 2 -->
    <div class="recipe-card">
        <img src="../../Images/ChickenTikkaMasala.jpg" alt="Chicken Tikka Masala" class="recipe-image">
        <h5 class="card-title">Chicken Tikka Masala</h5>
        <p class="card-text">A popular dish of marinated chicken chunks in a spicy sauce.</p>
        <a href="#" class="recipe-button">View Recipe</a>
    </div>
    <!-- Recipe Card 3 -->
    <div class="recipe-card">
        <img src="../../Images/Beef-Stroganoff.jpg" alt="Beef Stroganoff" class="recipe-image">
        <h5 class="card-title">Beef Stroganoff</h5>
        <p class="card-text">A Russian dish of sautéed pieces of beef served in a sauce with sour cream.</p>
        <a href="#" class="recipe-button">View Recipe</a>
    </div>
    <!-- Recipe Card 4 -->
    <div class="recipe-card">
        <img src="../../Images/ClassicLasagna.jpg" alt="The Best Homemade Lasagna" class="recipe-image">
        <h5 class="card-title">The Best Homemade Lasagna</h5>
        <p class="card-text">A layered dish of lasagna noodles, rich meat sauce, creamy béchamel, and melted cheese. </p>
        <a href="#" class="recipe-button">View Recipe</a>
    </div>
    <!-- Recipe Card 5 -->
    <div class="recipe-card">
        <img src="../../Images/easy-pepperoni-pizza.jpg" alt="Homemade Pepperoni Pizza" class="recipe-image">
        <h5 class="card-title">Homemade Pepperoni Pizza</h5>
        <p class="card-text">A crispy crust topped with tangy sauce, melted mozzarella, and spiced pepperoni.</p>
        <a href="#" class="recipe-button">View Recipe</a>
    </div>
    <!-- Recipe Card 6 -->
    <div class="recipe-card">
        <img src="../../Images/Buttermilk-Pancakes.jpg" alt="Buttermilk Pancakes" class="recipe-image">
        <h5 class="card-title">Buttermilk Pancakes</h5>
        <p class="card-text">Fluffy, golden pancakes, perfect for a cozy breakfast stack topped with butter and syrup.</p>
        <a href="#" class="recipe-button">View Recipe</a>
    </div>
</div>
</body>
</html>


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

<script src="javascript/script.js"></script>
</body>
</html>