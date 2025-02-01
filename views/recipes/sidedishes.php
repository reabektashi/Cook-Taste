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
  <title>Cook&Taste-Side dishes</title>
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
 
<header>
    <img src="../../Images/sidedishesIMG.jpg" alt="Food Recipes Background">
    <h1> Side Dishes Recipes</h1>
    <p>Your guide to delicious side dishes ideas!</p>
</header>

<div class="container">
    <div class="row">
        <!-- Recipe Card 1 -->
        <div class="recipe-card">
            <img src="../../Images/Roasted-Broccoli.jpg" alt="Roasted Broccoli With Parmesan">
            <div class="card-body">
                <h5 class="card-title"> Roasted Broccoli With Parmesan</h5>
                <p class="card-text">Roasting broccoli is reliably the preparation that converts broccoli haters, young and old alike. It's fast, hands-off, and brings out its sweetness.</p>
                <a href="#" class="recipe-button">View Recipe</a>
            </div>
        </div>
        <!-- Recipe Card 2 -->
        <div class="recipe-card">
            <img src="../../Images/Korean-Potato-Salad.jpg" alt="Korean Potato Salad">
            <div class="card-body">
                <h5 class="card-title">Korean Potato Salad</h5>
                <p class="card-text">Made with creamy mashed potatoes, crisp vegetables, and a hint of sweetness, it has a uniquely smooth yet crunchy texture. Whether served at a barbecue, picnic, or alongside a hearty meal.</p>
                <a href="#" class="recipe-button">View Recipe</a>
            </div>
        </div>
        <!-- Recipe Card 3 -->
        <div class="recipe-card">
            <img src="../../Images/Oven-Roasted-Vegetables.jpg" alt="Oven Roasted Vegetables">
            <div class="card-body">
                <h5 class="card-title">Oven Roasted Vegetables</h5>
                <p class="card-text">A colorful medley of seasonal vegetables tossed in olive oil and herbs, roasted until tender and caramelized. A flavorful and healthy side dish. Perfect for pairing with any main course!</p>
                <a href="#" class="recipe-button">View Recipe</a>
            </div>
        </div>
         <!-- Recipe Card 4 -->
         <div class="recipe-card">
            <img src="../../Images/Antipasto-Salad.jpg" alt="Antipasto Salad">
            <div class="card-body">
                <h5 class="card-title">Antipasto Salad</h5>
                <p class="card-text">Combine all of the best antipasti with crisp lettuce and savory dressing for a satisfying antipasto salad. With peppers, salami, mozzarella etc.</p>
                <a href="#" class="recipe-button">View Recipe</a>
            </div>
        </div>

          <!-- Recipe Card 5 -->
          <div class="recipe-card">
            <img src="../../Images/Mashed-Potatoes.jpg" alt="Garlic Mashed Potatoes">
            <div class="card-body">
                <h5 class="card-title">Garlic Mashed Potatoes</h5>
                <p class="card-text">Creamy, buttery potatoes blended with roasted garlic for a rich and savory flavor. A classic side dish that complements nearly any meal.</p>
                <a href="#" class="recipe-button">View Recipe</a>
            </div>
        </div>
        
          <!-- Recipe Card 6 -->
          <div class="recipe-card">
            <img src="../../Images/Honey-Roasted-Carrots.jpg" alt="Honey Glazed Carrots">
            <div class="card-body">
                <h5 class="card-title">Honey Glazed Carrots</h5>
                <p class="card-text">Roast carrots with honey until crisp-tender and top with a lively dressing of fresh herbs, dates, and lemon juice.A sweet and tangy side dish.</p>
                <a href="#" class="recipe-button">View Recipe</a>
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

<script src="javascript/script.js"></script>
</body>
</html>