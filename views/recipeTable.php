<?php
session_start();
include_once '../repository/RecipeRepository.php';
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
    <title>Recipe Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .hide {
            display: none;
        }
        img {
            width: 100px; 
            height: auto; 
        }
    </style>
</head>
<body>
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
                <li><a class="nav-link" href="../views/dashboard.php" class="<?php echo $hide ?>">Dashboard</a></li>
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

<div class="table">
    <div class="box-add">
        <a href="../views/insertRecipe.php">
            <br>
            <button class="button-add">ADD RECIPE</button>
        </a>
    </div>
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Ingredients</th>
                <th>Steps</th>
                <th>Image</th> 
                <th>Actions</th>
            </tr>
            <?php
            include_once '../repository/RecipeRepository.php';
            $recipeRepository = new RecipeRepository();
            $recipes = $recipeRepository->getAllRecipes();
            foreach ($recipes as $recipe) {
                echo "
                <tr>
                    <td>{$recipe['id']}</td>
                    <td>{$recipe['name']}</td>
                    <td>{$recipe['description']}</td>
                    <td>{$recipe['ingredients']}</td>
                    <td>{$recipe['steps']}</td>
                    <td>
                        <img src='" . htmlspecialchars($recipe['image']) . "' alt='Recipe Image'> <!-- Displaying the image -->
                    </td>
                    <td>
                        <div>
                            <button class='button-update'>
                                <a href='updateRecipe.php?id={$recipe['id']}'>Update</a>
                            </button>
                            <button class='button-delete' onclick='confirmDelete({$recipe['id']})'>
                                <a href='deleteRecipe.php?id={$recipe['id']}'>Delete</a>
                            </button>
                        </div>
                    </td>
                </tr>
                ";
            }
            ?>
        </table>
    </div>
</div>

<script>
    function confirmDelete(recipeId) {
        if (confirm("Are you sure you want to delete this recipe?")) {
            window.location.href = 'deleteRecipe.php?id=' + recipeId;
        } else {
            event.preventDefault();
        }
    }
</script>
</body>
</html>