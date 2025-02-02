<?php 
include_once __DIR__ . '/../repository/UserRepository.php';
include_once __DIR__ . '/../models/user.php';
$Error = "";
$emailError = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phoneNumber = $_POST["phoneNumber"]; 
    $birthDate = $_POST["birthDate"];  
    $role = $_POST["role"];  

    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($birthDate) || empty($phoneNumber) || empty($role)) {
        $Error = "All fields are required!";
    } else {
        $userRepository = new UserRepository();
        $userEmail = $userRepository->getUserByEmail($email); 
        if ($userEmail) {
            $emailError = "This email exists! Please try another one";
        } else {
            $user = new User(null, $firstName, $lastName, $email, $password, $phoneNumber, $birthDate, $role);
            $userRepository->insertUser ($user); 
            header("location: ../views/userTable.php");
        }
    }
}
?>