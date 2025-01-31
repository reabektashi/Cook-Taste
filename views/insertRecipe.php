<?php 
session_start();
include_once '../controllers/RecipeController.php'; // Ensure this path is correct

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

// Initialize error variable
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["recipeName"];
    $description = $_POST["description"];
    $ingredients = $_POST["ingredients"];
    $steps = $_POST["instructions"]; // Capture instructions

    // Validate input fields
    if (empty($name) || empty($description) || empty($ingredients) || empty($steps)) {
        $error = "All fields are required!"; // Set error message if validation fails
    } else {
        // Create a new Recipe object
        $recipe = new Recipe(null, $name, $description, $ingredients, $steps);
        
        // Create a RecipeController instance and insert the recipe
        $recipeController = new RecipeController();
        
        try {
            $recipeController->insertRecipe($recipe); // Insert the recipe
            // Redirect to the recipe table page after successful insertion
            header("Location: ../views/recipeTable.php");
            exit();
        } catch (Exception $e) {
            $error = "Failed to insert recipe: " . $e->getMessage(); // Handle insertion error
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recipe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Css/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
    <style>
        .hide {
            display: none;
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

<div class="container">
    <div class="form-box">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" onsubmit="return validateForm(event)">
            <h1>Add a Recipe</h1>
            <?php if (!empty($error)): ?>
                <div class="error-message" style="color: red;"><?= $error ?></div> <!-- Display error message -->
            <?php endif; ?>
            <div class="input-group">
                <!-- Left column -->
                <div class="input-group-left">
                    <div class="input-field left">
                        <input type="text" name="recipeName" placeholder="Recipe Name" id="recipeName" required>
                    </div>
                    <div class="error-message" id="recipeNameError"></div>

                    <div class="input-field left">
                        <textarea name="description" placeholder="Description" id="description" rows="4" required></textarea>
                    </div>
                    <div class="error-message" id="descriptionError"></div>
                </div>

                <!-- Right column -->
                <div class="input-group-right">
                    <div class="input-field right">
                        <input type="text" name="ingredients" placeholder="Ingredients (comma-separated)" id="ingredients" required>
                    </div>
                    <div class="error-message" id="ingredientsError"></div>

                    <div class="input-field right">
                        <input type="text" name="instructions" placeholder="Instructions" id="instructions" required>
                    </div>
                    <div class="error-message" id="instructionsError"></div>
                </div>
            </div>

            <div class="btn-group">
    <button type="submit" name="submitRecipe" id="submit" class="btn" style="background-color: #ff9800; color: white;">Submit</button>
            </div>
        </form>
    </div>
</div>

</body>

<script>
    function validateForm(event) {
        let recipeName = document.getElementById("recipeName").value.trim();
        let recipeNameError = document.getElementById("recipeNameError");
        let description = document.getElementById("description").value.trim();
        let descriptionError = document.getElementById("descriptionError");
        let ingredients = document.getElementById("ingredients").value.trim();
        let ingredientsError = document.getElementById("ingredientsError");
        let instructions = document.getElementById("instructions").value.trim();
        let instructionsError = document.getElementById("instructionsError");

        // Clear error messages
        recipeNameError.innerText = '';
        descriptionError.innerText = '';
        ingredientsError.innerText = '';
        instructionsError.innerText = '';

        let isValid = true;

        if (recipeName === "") {
            recipeNameError.innerText = "Please enter a recipe name!";
            isValid = false;
        }

        if (description === "") {
            descriptionError.innerText = "Please enter a description!";
            isValid = false;
        }

        if (ingredients === "") {
            ingredientsError.innerText = "Please enter ingredients!";
            isValid = false;
        }

        if (instructions === "") {
            instructionsError.innerText = "Please enter instructions!";
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    }
</script>

</html>