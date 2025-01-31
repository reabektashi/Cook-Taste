<?php
session_start();
include_once '../repository/UserRepository.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "ID parameter not found in the URL.";
}


$userRepository = new UserRepository();
$userRepository->deleteUserById($id);

header("location:../views/userTable.php");
?>