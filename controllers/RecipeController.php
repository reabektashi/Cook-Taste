<?php 
include_once __DIR__ . '/../repository/RecipeRepository.php';
include_once __DIR__ . '/../models/Recipe.php';

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["recipeName"];
    $description = $_POST["description"];
    $ingredients = $_POST["ingredients"];
    $steps = $_POST["instructions"];

    // image upload
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $target_dir = "../Images/"; // Directory where images will be stored
        $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
        $unique_name = uniqid("recipe_", true) . "." . $imageFileType;
        $target_file = $target_dir . $unique_name;

        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $imagePath = $target_file;
        } else {
            $error = "Error uploading the image.";
        }
    } else {
        $error = "Please upload a valid image.";
    }

    // Validate input fields
    if (empty($name) || empty($description) || empty($ingredients) || empty($steps) || empty($imagePath)) {
        $error = "All fields are required!";
    } else {
        
        $recipe = new Recipe(null, $name, $description, $ingredients, $steps, $imagePath);
        
        
        $recipeRepository = new RecipeRepository();
        $recipeRepository->insertRecipe($recipe);
        
        
        header("Location: ../views/recipeTable.php");
        exit();
    }
}
?>
