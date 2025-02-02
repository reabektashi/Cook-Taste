<?php
include_once '../models/User.php';
include_once '../repository/UserRepository.php';

class LogInController {
    private $userRepository;

    public function __construct() {
        $this->userRepository = new UserRepository();
    }

    public function login($email, $password) {
        // Validate input fields
        if (empty($email) || empty($password)) {
            return "Please fill all fields!";
        }

        // To Get user by email
        $user = $this->userRepository->getUserByEmail($email);

        if (!$user) {
            return "Email not found!";
        } else {
            // To Check if the entered password matches the stored password
            if ($password === $user['password']) {
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role']; 

               
                header("Location: ../views/home.php");
                exit();
            } else {
                return "Incorrect password!";
            }
        }
    }
}
?>