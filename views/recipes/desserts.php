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
  <title>Cook&Taste - Desserts</title>
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
                    <li><a class="nav-link" href="../../views/dashboard.php">Dashboard</a></li>
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

    <header>
        <img src="../../Images/dessertbackground.jpg" alt="Dessert Recipes Background">
        <h1>Dessert Recipes</h1>
        <p>Your guide to delicious dessert ideas!</p>
    </header>

    <div class="container">
        <div class="row">
            <!-- Recipe Card 1 -->
            <div class="recipe-card">
                <img src="../../Images/ChocolateChipBananaBreadCoffeeCake.jpg" alt="Chocolate Chip Banana Bread Coffee Cake">
                <div class="card-body">
                    <h5 class="card-title">Chocolate Chip Banana Bread Coffee Cake</h5>
                    <p class="card-text">A moist coffee cake infused with ripe bananas and dotted with rich chocolate chips.A delightful treat perfect for breakfast or dessert.</p>
                    <a href="#" class="recipe-button">View Recipe</a>
                </div>
            </div>
            <!-- Recipe Card 2 -->
            <div class="recipe-card">
                <img src="../../Images/Red-Velvet-Cake.jpg" alt="Red Velvet Cake">
                <div class="card-body">
                    <h5 class="card-title">Red Velvet Cake</h5>
                    <p class="card-text">A luscious cake with a striking red hue, featuring a velvety texture and a hint of cocoa. Frosted with creamy cream cheese icing, it's a delightful dessert for any celebration.</p>
                    <a href="#" class="recipe-button">View Recipe</a>
                </div>
            </div>
            <!-- Recipe Card 3 -->
            <div class="recipe-card">
                <img src="../../Images/Cake-Pops.jpg" alt="Cake Pops">
                <div class="card-body">
                    <h5 class="card-title">Cake Pops</h5>
                    <p class="card-text">Bite-sized treats made from crumbled cake and frosting, shaped into balls, and dipped in chocolate. Perfect for parties, these fun snacks offer a portable way to enjoy cake.</p>
                    <a href="#" class="recipe-button">View Recipe</a>
                </div>
            </div>
            <!-- Recipe Card 4 -->
    <div class="recipe-card">
        <img src="../../Images/Chocolate-Pumpkin-Muffins.jpg" alt="Pumpkin Chocolate Chip Muffins" class="recipe-image">
        <div class="card-body">
            <h5 class="card-title">Pumpkin Chocolate Chip Muffins</h5>
            <p class="card-text">Moist and fluffy muffins infused with pumpkin puree and studded with rich chocolate chips. A delightful fall treat that perfectly balances sweet and spiced flavors.</p>
            <a href="#" class="recipe-button">View Recipe</a>
        </div>
    </div>

    <!-- Recipe Card 5 -->
    <div class="recipe-card">
        <img src="../../Images/Chocolate-Pudding-Cake.jpg" alt="Chocolate Pudding Cake" class="recipe-image">
        <div class="card-body">
            <h5 class="card-title">Chocolate Pudding Cake</h5>
            <p class="card-text">Rich chocolate cake with a gooey pudding center, perfect warm with vanilla ice cream. A chocolate lover's delight! The moist, tender crumb melts in your mouth with every bite. A hint of espresso enhances the deep cocoa flavor.</p>
            <a href="#" class="recipe-button">View Recipe</a>
        </div>
    </div>

    <!-- Recipe Card 6 -->
    <div class="recipe-card">
        <img src="../../Images/Oreo-Cheesecake.jpg" alt="Oreo Cheesecake" class="recipe-image">
        <div class="card-body">
            <h5 class="card-title">Oreo Cheesecake</h5>
            <p class="card-text">opped with a rich chocolate drizzle and chunks of Oreo cookies, every bite is a perfect balance of creamy and crunchy textures. The smooth cheesecake filling melts in your mouth, while the cookie crust adds a satisfying crunch!</p>
            <a href="#" class="recipe-button">View Recipe</a>
        </div>
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