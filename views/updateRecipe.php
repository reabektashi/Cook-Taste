<?php
session_start();
include_once '../repository/RecipeRepository.php'; // Ensure this path is correct

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

$recipeId = isset($_GET['id']) ? $_GET['id'] : null;

if ($recipeId !== null) {
    $recipeRepository = new RecipeRepository();
    $recipe = $recipeRepository->getRecipeById($recipeId);
} else {
    echo "Error: 'id' is not set in the URL.";
}

if (isset($_POST['submitBtn'])) {
    $id = $recipeId;
    $name = $_POST["recipeName"];
    $description = $_POST["description"];
    $ingredients = $_POST["ingredients"];
    $steps = $_POST["instructions"];
    $image = $_FILES["image"]["name"];

    // Validate input fields
    if (empty($name) || empty($description) || empty($ingredients) || empty($steps) || empty($image)) {
        $error = "All fields are required!";
    } else {
        $recipeRepository->updateRecipe($id, $name, $description, $ingredients, $steps, $image);
        header("location:../views/recipeTable.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Recipe</title>
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

<div class="container">
    <div class="form-box">
        <form action="" method="POST" enctype="multipart/form-data">
            <h1>Update Recipe</h1>
            <?php if (!empty($error)): ?>
                <div class="error-message" style="color: red;"><?= $error ?></div> <!-- Display error message -->
            <?php endif; ?>
            <div class="input-group">
                <div class="input-field left">
                    <input type="text" name="recipeName" value="<?= $recipe['name'] ?>" placeholder="Recipe Name" required>
                </div>
                <div class="input-field left">
                    <textarea name="description" placeholder="Description" rows="4" required><?= $recipe['description'] ?></textarea>
                </div>
                <div class="input-field left">
                    <input type="text" name="ingredients" value="<?= $recipe['ingredients'] ?>" placeholder="Ingredients (comma-separated)" required>
                </div>
                <div class="input-field left">
                    <input type="text" name="instructions" value="<?= $recipe['steps'] ?>" placeholder="Instructions" required>
                </div>

                <div class="input-field left">
                <input type="file" name="image" id="image" onchange="displayFileName()">
                <div class="error-message" id="imageError"></div>
                <p id="errorImage" style="color: red;"></p>
                <span id="selectedFileName" class="image">
                <?= $recipe['image'] ?>
            </span>
          </div>
       </div>

    <div class="btn-group">
    <button type="submit" name="submitBtn" class="btn" style="background-color: #ff9800; color: white;">Update</button>
    <button type="button" onclick="window.location.href='../views/recipeTable.php'" class="btn" style="background-color: #ff9800; color: white;">Cancel</button>
           </div>
        </form>
    </div>
</div>

<script>
    function validateForm(event) {
        let recipeName = document.querySelector("input[name='recipeName']").value.trim();
        let description = document.querySelector("textarea[name='description']").value.trim();
        let ingredients = document.querySelector("input[name='ingredients']").value.trim();
        let instructions = document.querySelector("input[name='instructions']").value.trim();
        let imageInput = document.querySelector("input[name='image']");
        let imageError = document.getElementById("imageError");
        let isValid = true;

        // Clear previous error messages
        document.querySelectorAll('.error-message').forEach(el => el.innerText = '');

        if (recipeName === "") {
            alert("Please enter a recipe name!");
            isValid = false;
        }

        if (description === "") {
            alert("Please enter a description!");
            isValid = false;
        }

        if (ingredients === "") {
            alert("Please enter ingredients!");
            isValid = false;
        }

        if (instructions === "") {
            alert("Please enter instructions!");
            isValid = false;
        }

        if (imageUpload.files.length === 0) {
            imageError.innerText = "Please upload an image!";
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); // Prevent form submission
        }
    }
</script>

</body>
</html>