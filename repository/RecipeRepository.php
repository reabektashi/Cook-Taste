<?php 
include_once __DIR__ . '/../database/db_connection.php';

class RecipeRepository {
    private $connection;

    function __construct() {
        $conn = new DatabaseConnection();
        $this->connection = $conn->startConnection(); 

   
        if ($this->connection === null) {
            die("Database connection failed. Please check your credentials.");
        }
    }

    function getAllRecipes() {
        $conn = $this->connection;

        if ($conn === null) {
            die("Database connection is not established.");
        }

        $sql = "SELECT * FROM recipes";
        $statement = $conn->query($sql);
        $recipes = $statement->fetchAll(PDO::FETCH_ASSOC); 

        return $recipes;
    }

    function getRecipeById($id) {
        $conn = $this->connection;

        $sql = "SELECT * FROM recipes WHERE id=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
        $recipe = $statement->fetch();

        return $recipe;
    }
    
    function insertRecipe($recipe) {
        $conn = $this->connection;

        $name = $recipe->getName();
        $description = $recipe->getDescription();
        $ingredients = $recipe->getIngredients();
        $steps = $recipe->getSteps();
        $image = $recipe->getImage(); 

        $sql = "INSERT INTO recipes (name, description, ingredients, steps, image) VALUES (?, ?, ?, ?, ?)";
        $statement = $conn->prepare($sql);
        $statement->execute([$name, $description, $ingredients, $steps, $image]); // Include image in the insert
    }

    function updateRecipe($id, $name, $description, $ingredients, $steps, $image) {
        $conn = $this->connection;

        $sql = "UPDATE recipes SET name=?, description=?, ingredients=?, steps=?, image=? WHERE id=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$name, $description, $ingredients, $steps, $image, $id]); // Include image in the update
    }

    function deleteRecipeById($id) {
        $conn = $this->connection;

        try {
            $sql = "DELETE FROM recipes WHERE id=?";
            $statement = $conn->prepare($sql);
            $statement->execute([$id]);
            header("location: ../views/recipeTable.php");
            exit();
        } catch (PDOException $e) {
            echo "Error deleting recipe: " . $e->getMessage();
        }
    }
}
?>