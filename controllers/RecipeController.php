<?php 
include_once __DIR__ . '/../repository/RecipeRepository.php';
include_once __DIR__ . '/../models/Recipe.php';

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["recipeName"];
    $description = $_POST["description"];
    $ingredients = $_POST["ingredients"];
    $steps = $_POST["instructions"]; // Capture instructions
    $image = $_POST["image"];

    // Validate input fields
    if (empty($name) || empty($description) || empty($ingredients) || empty($steps) || empty($image)) {
        $error = "All fields are required!";
    } else {
        // Create a new Recipe object
        $recipe = new Recipe(null, $name, $description, $ingredients, $steps, $image );
        
        // Create a RecipeRepository instance and insert the recipe
        $recipeRepository = new RecipeRepository();
        $recipeRepository->insertRecipe($recipe);
        
        // Redirect to the recipe table page after successful insertion
        header("location: ../views/recipeTable.php");
        exit();
    }
}
?>