<?php
session_start();
include_once '../repository/RecipeRepository.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "ID parameter not found in the URL.";
    exit();
}

$recipeRepository = new RecipeRepository();
$recipeRepository->deleteRecipeById($id);

header("location: ../views/recipeTable.php");
exit();
?>
