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

        // Get user by email
        $user = $this->userRepository->getUserByEmail($email);

        if (!$user) {
            return "Email not found!";
        } else {
            $storedPasswordHash = $user['password']; // Hashed password from DB

            // Debugging logs (Check PHP error log)
            error_log("Entered Password: " . $password);
            error_log("Stored Password Hash: " . $storedPasswordHash);

            // Verify password
            if (password_verify($password, $storedPasswordHash)) {
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];

                // Redirect to the home page
                header("Location: ../views/home.php");
                exit();
            } else {
                return "Incorrect password!";
            }
        }
    }
}
?>