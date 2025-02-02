<?php
class Recipe {
    private $id;
    private $name;
    private $description;
    private $ingredients;
    private $steps;
    private $image; // Add image property

    public function __construct($id, $name, $description, $ingredients, $steps, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->ingredients = $ingredients;
        $this->steps = $steps;
        $this->image = $image; // Initialize image property
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

    public function getImage() { // Add getter for image
        return $this->image;
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

    public function setImage($image) { 
        $this->image = $image;
    }

    public function __toString() {
        return "ID: " . $this->id . 
               ", Name: " . $this->name . 
               ", Description: " . $this->description . 
               ", Ingredients: " . $this->ingredients . 
               ", Steps: " . $this->steps . 
               ", Image: " . $this->image; 
    }
}
?>