<?php
include_once __DIR__ . '/../database/db_connection.php'; // Ensure this path is correct

class UserRepository {
    private $connection;

    function __construct() {
        $db = new DatabaseConnection(); // Create a new instance of DatabaseConnection
        $this->connection = $db->startConnection(); // Initialize the connection
        
        // Check if the connection was successful
        if ($this->connection === null) {
            die("Database connection failed. Please check your credentials.");
        }
    }

    function getAllUsers() {
        $sql = "SELECT * FROM users";
        $statement = $this->connection->query($sql); // This line will throw an error if $this->connection is null
        $users = $statement->fetchAll(PDO::FETCH_ASSOC); // Fetch all users as an associative array
        return $users;
    }

    function insertUser ($user) {
        $conn = $this->connection;

        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $email = $user->getEmail();
        $password = $user->getPassword(); 
        $phoneNumber = $user->getPhoneNumber();
        $birthDate = $user->getBirthDate();
        $role = $user->getRole();

        $sql = "INSERT INTO users (firstName, lastName, email, password, phoneNumber, birthDate, role) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $statement = $conn->prepare($sql);
        $statement->execute([$firstName, $lastName, $email, $password, $phoneNumber, $birthDate, $role]);
    }

    function getUserByEmail($email) { 
        $conn = $this->connection;

        $sql = "SELECT * FROM users WHERE email=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$email]);
        return $statement->fetch();
    }

    function getUserById($id) {
        $conn = $this->connection;

        $sql = "SELECT * FROM users WHERE id=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch();
    }

    function updateUser ($id, $firstName, $lastName, $email, $password, $phoneNumber, $birthDate, $role) {
        $conn = $this->connection;

        $sql = "UPDATE users SET firstName=?, lastName=?, email=?, password=?, phoneNumber=?, birthDate=?, role=? WHERE id=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$firstName, $lastName, $email, $password, $phoneNumber, $birthDate, $role, $id]);
    }

    function deleteUserById($id) {
        $conn = $this->connection;

        try {
            $sql = "DELETE FROM users WHERE id=?";
            $statement = $conn->prepare($sql);
            $statement->execute([$id]);
        } catch (PDOException $e) {
            echo "Error deleting user: " . $e->getMessage();
        }
    }
}
?>
