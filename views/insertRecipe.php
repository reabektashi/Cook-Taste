<?php 
session_start();
include_once '../controllers/RecipeController.php';

$hide = "";
if (isset($_SESSION['role'])) {
    $hide = ($_SESSION['role'] == "admin") ? "" : "hide";
} else {
    $hide = "hide";
}

// Initialize error variable
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["recipeName"];
    $description = $_POST["description"];
    $ingredients = $_POST["ingredients"];
    $steps = $_POST["instructions"];
    
    //  image upload
    $image = $_FILES["image"]["name"];
    $target_dir = "../Images/"; // Directory where images will be stored
    $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $unique_name = uniqid("recipe_", true) . "." . $imageFileType;
    $target_file = $target_dir . $unique_name;
    $uploadOk = 1;

    
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check === false) {
        $error = "File is not an image.";
        $uploadOk = 0;
    }

    //  file size (limit: 500KB)
    if ($_FILES["image"]["size"] > 500000) {
        $error = "File is too large.";
        $uploadOk = 0;
    }

   
    if(!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
        $error = "Only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Upload image if no errors
    if ($uploadOk && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $recipe = new Recipe(null, $name, $description, $ingredients, $steps, $target_file);
        $recipeController = new RecipeController();
        try {
            $recipeController->insertRecipe($recipe);
            header("Location: ../views/recipeTable.php");
            exit();
        } catch (Exception $e) {
            $error = "Failed to insert recipe: " . $e->getMessage();
        }
    } else {
        $error = "Error uploading image. Ensure the folder exists and has write permissions.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recipe</title>
    <link rel="stylesheet" href="../Css/form.css">
    <style>.hide { display: none; }</style>
</head>
<body>
<nav class="navbar">
    <div class="navbar-container">
        <a class="navbar-brand" href="../views/home.php">
            <img src="../Images/brandL.png" alt="Cook&Taste Logo">
        </a>
    </div>
</nav>

<div class="container">
    <div class="form-box">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" onsubmit="return validateForm(event)">
            <h1>Add a Recipe</h1>
            <?php if (!empty($error)): ?>
                <div class="error-message" style="color: red;"> <?= $error ?> </div>
            <?php endif; ?>
            <div class="input-group">
                <div class="input-field">
                    <input type="text" name="recipeName" placeholder="Recipe Name" id="recipeName" required>
                </div>
                <div class="input-field">
                    <textarea name="description" placeholder="Description" id="description" required></textarea>
                </div>
                <div class="input-field">
                    <input type="text" name="ingredients" placeholder="Ingredients (comma-separated)" id="ingredients" required>
                </div>
                <div class="input-field">
                    <input type="text" name="instructions" placeholder="Instructions" id="instructions" required>
                </div>
                <div class="input-field">
                    <input type="file" name="image" id="image" required>
                </div>
            </div>
            <div class="btn-group">
                <button type="submit" name="submitRecipe" class="btn" style="background-color: #ff9800; color: white;">Submit</button>
            </div>
        </form>
    </div>
</div>
</body>
<script>
function validateForm(event) {
    let imageInput = document.getElementById("image");
    if (imageInput.files.length === 0) {
        alert("Please upload an image.");
        event.preventDefault();
    }
}
</script>
</html>
