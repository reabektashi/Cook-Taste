<?php 
include_once __DIR__ . '/../repository/RecipeRepository.php';
include_once __DIR__ . '/../models/Recipe.php';

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["recipeName"];
    $description = $_POST["description"];
    $ingredients = $_POST["ingredients"];
    $steps = $_POST["instructions"]; // Capture instructions

    // Validate input fields
    if (empty($name) || empty($description) || empty($ingredients) || empty($steps)) {
        $error = "All fields are required!";
    } else {
        // Create a new Recipe object
        $recipe = new Recipe(null, $name, $description, $ingredients, $steps);
        
        // Create a RecipeRepository instance and insert the recipe
        $recipeRepository = new RecipeRepository();
        $recipeRepository->insertRecipe($recipe);
        
        // Redirect to the recipe table page after successful insertion
        header("location: ../views/recipeTable.php");
        exit();
    }
}
?>