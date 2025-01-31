<?php
session_start();
$hide = "";
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "admin") {
        $hide = "";
    } else {
        $hide = "hide";
    }
} else {
    $hide = "hide";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
    <style>
        .hide {
            display: none;
        }

        header {
            font-weight: 500;
            background: transparent;
            backdrop-filter: blur(20px);
        }
    </style>
</head>


<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="navbar-container">
        <a class="navbar-brand" href="../views/home.php">
            <img src="../Images/brandL.png" alt="Cook&Taste Logo">
        </a>
        <button class="navbar-toggler" onclick="toggleNav()">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-links" id="navbarLinks">
        <ul class="navbar-nav">
    <li><a class="nav-link" href="../views/home.php">Home</a></li>
    <li class="dropdown">
        <a class="nav-link" href="#" id="navbarDropdown">Recipes</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../../recipes/food.php">Food</a></li>
            <li><a class="dropdown-item" href="../../recipes/desserts.php">Desserts</a></li>
            <li><a class="dropdown-item" href="../../recipes/sidedishes.php">Side Dishes</a></li>
        </ul>
    </li>
    <li><a class="nav-link" href="../views/aboutus.php">About Us</a></li>
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
    <main>
        <!-- <div class="container-top">
                <h2>Welcome to Dashboard, what function do you want to use</h2>
            </div> -->
            <br><br><br><br><br> <br>
        <div class="container">

            <div class="box">
                <div class="box1">
                    <a href="userTable.php" style="text-decoration: none;">
                        <button class="button">VIEW USERS</button>
                    </a>
                </div>
                <div class="box1">
                    <a href="recipeTable.php"style="text-decoration: none;">
                        <button class="button">VIEW RECIPES</button>
                    </a>
                </div>
              </div>
               
    </main>
</body>
</html>