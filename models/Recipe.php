<?php
class Recipe {
    private $id;
    private $name;
    private $description;
    private $ingredients;
    private $steps;

    public function __construct($id, $name, $description, $ingredients, $steps) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->ingredients = $ingredients;
        $this->steps = $steps;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getIngredients() {
        return $this->ingredients;
    }

    public function getSteps() {
        return $this->steps;
    }

    
    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setIngredients($ingredients) {
        $this->ingredients = $ingredients;
    }

    public function setSteps($steps) {
        $this->steps = $steps;
    }



    // Optionally, a __toString method for debugging or display purposes
    public function __toString() {
        return "ID: " . $this->id . 
               ", Name: " . $this->name . 
               ", Description: " . $this->description . 
               ", Ingredients: " . $this->ingredients . 
               ", Steps: " . $this->steps; // <---- Missing semicolon added here
    }
}
?>
