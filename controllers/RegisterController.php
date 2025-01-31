<?php
include_once '../repository/UserRepository.php';
include_once '../models/User.php';

class RegisterController {
    private $userRepository;

    public function __construct() {
        $this->userRepository = new UserRepository();
    }

    public function register($firstName, $lastName, $email, $password, $birthDate, $phoneNumber) {
        $errors = [];

        // Validate first and last name
        if (empty($firstName)) {
            $errors[] = "First name is required!";
        }
        if (empty($lastName)) {
            $errors[] = "Last name is required!";
        }

        // Validate email format
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Valid email is required!";
        }

        // Check if email already exists
        if ($this->userRepository->getUserByEmail($email)) {
            $errors[] = "This email already exists! Please try another one.";
        }

        // Validate password strength: minimum length, 1 uppercase letter, 1 number, and 1 special character
        if (empty($password)) {
            $errors[] = "Password is required!";
        } elseif (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters!";
        } elseif (!preg_match('/[A-Z]/', $password)) {
            $errors[] = "Password must contain at least one uppercase letter!";
        } elseif (!preg_match('/[0-9]/', $password)) {
            $errors[] = "Password must contain at least one number!";
        } elseif (!preg_match('/[\W_]/', $password)) {
            $errors[] = "Password must contain at least one special character!";
        }

        // Validate birth date
        if (empty($birthDate)) {
            $errors[] = "Birth date is required!";
        }

        // Validate phone number (numeric, between 8-15 digits)
        if (empty($phoneNumber) || !preg_match('/^\d{8,15}$/', $phoneNumber)) {
            $errors[] = "Valid phone number (8-15 digits) is required!";
        }

        // If there are no errors, proceed with registration
        if (empty($errors)) {
           
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);  // Hash the password

            $role = 'user'; // Default role

            // Create a new User object
            $user = new User(null, $firstName, $lastName, $email, $hashedPassword, $phoneNumber, $birthDate, $role);
            
            // Insert the user into the database
            $this->userRepository->insertUser($user);

            // Redirect to login page with success message
            header("Location: ../views/login.php?success=1");
            exit();
        }

        return $errors; // Return any errors encountered
    }
}
?>
