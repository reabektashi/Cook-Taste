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

   // Validate
        if (empty($firstName)) {
            $errors[] = "First name is required!";
        }
        if (empty($lastName)) {
            $errors[] = "Last name is required!";
        }

     
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Valid email is required!";
        }

      
        if ($this->userRepository->getUserByEmail($email)) {
            $errors[] = "This email already exists! Please try another one.";
        }

       
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

        if (empty($birthDate)) {
            $errors[] = "Birth date is required!";
        }

 
        if (empty($phoneNumber) || !preg_match('/^\d{8,15}$/', $phoneNumber)) {
            $errors[] = "Valid phone number (8-15 digits) is required!";
        }

        // If there are no errors, proceed with registration
        if (empty($errors)) {
            $role = 'user'; // Default role

            // To Create a new User object with the plain text password
            $user = new User(null, $firstName, $lastName, $email, $password, $phoneNumber, $birthDate, $role);
            
            // To Insert the user into the database
            $this->userRepository->insertUser($user);

           
            header("Location: ../views/login.php?success=1");
            exit();
        }

        return $errors; 
    }
}
?>
